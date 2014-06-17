<?php
define('PAY_GE_URL', 'https://www.pay.ge/pay');

class pay_ge extends APayments implements IPayment, IPaymentCallback {
    public $pay_name = "Pay.ge";
    public $settings = array();
    private $amount;
    private $inv_id;
    private $inv_desc;
    private $transaction_code;

    public $errorCodes = array(  0 => 'Ok',
                                 1 => 'Duplicate transaction',
                                -1 => 'Technical problem',
                                -2 => 'Order has been cancelled',
                                -3 => 'Error in parameter(s)' );

    public function isCallback() {
        if (!isset($_REQUEST['ordercode']))
            return false;
        else
            return true;
    }

    public function process() {
      global $sql;
      if (!$this->checkSignHash()) {
          die($this->getOutHashForXml(-3));
      }
      else {
        $inv_id = (integer)$_REQUEST['ordercode'];
        $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id AND status=0");
        if (!empty($pay_info)) {
          $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
          if (empty($pay_info['pct_id'])) {  // пополнение счёта
            $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
            // и в журнал
            $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) VALUES(NOW(), {$pay_info['userid']}, {$pay_info['paycost']}, 'PayGe', 1)");
//            return print("OK" . $inv_id);
              die($this->getOutHashForXml(0));
          }
          else {  // оплата купонов
            $pct_info = $sql->fetchOne("SELECT * FROM pey_coupons_transactions WHERE id={$pay_info['pct_id']} AND tran_status=0");
            if (!empty($pct_info) and ($pct_info['total_price'] == ($_REQUEST['amount']/100))) {
                Coupons::makeBuyOrder((int)$pay_info['pct_id']);
                die($this->getOutHashForXml(0));
            }else{
                die($this->getOutHashForXml(-1));
            }
          }
        }else{
            die($this->getOutHashForXml(1));
        }
      }
    }

    public function getForm($amount, $options = array()) {  // при пополнении баланса
        global $sql;
        $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, 'pay_ge', $amount, NOW(), 'ბალანსის შევსება')");
        $this->inv_id = $sql->lastInsertId();
        $this->inv_desc = "ბალანსის შევსება საიტზე http://" . $_SERVER['HTTP_HOST'];
        $this->amount = $amount*100;
        $output = $this->constructHtml();
        return $output;
    }

    public function getBuyForm($amount, $pct_id) {  // при покупке купона
        global $sql;
        $sql->exec("INSERT INTO pay_outcomming(payvariant, paycost, date, comments, pct_id) VALUES('pay_ge', $amount, NOW(), 'კუპონის შეძენა', '$pct_id')");
        $this->inv_id = $sql->lastInsertId();
        $this->inv_desc = "კუპონის შეძენა";
        $this->amount = intval($amount*100);
        $output = $this->constructHtml();
        return $output;
    }

    protected function constructHtml() {

      $form = '
			<form name="pay" action="' . PAY_GE_URL . '" method="post">
            <input type="hidden" name="merchant"    value="'. $this->settings['pay_ge_login'] .'" />
            <input type="hidden" name="ordercode"   value="' . $this->inv_id . '" />
            <input type="hidden" name="amount"      value="' . $this->amount . '" />
            <input type="hidden" name="currency"    value="GEL" />
            <input type="hidden" name="description" value="' . $this->inv_desc . '" />
            <input type="hidden" name="lng"         value="KA" />
            <input type="hidden" name="check"       value="' . $this->generateSignHash() . '" />
            <input type="hidden" name="testmode"    value="'. $this->settings['pay_ge_test'] .'" />
			<br/>
			<a href="" onclick="document.forms[\'pay\'].submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
      return $form;

//       $form = "<script language='javascript' type='text/javascript' src='".PAY_GE_URL."?merchant=".$this->settings['pay_ge_login']."&ordercode=".$this->inv_id."&amount=".$this->amount."&currency=GEL&description=".$this->inv_desc."&lng=KA&check=".$this->generateSignHash()."&testmode=".$this->settings['pay_ge_test']."'></script>";

//       return $form;
    }

    private function generateSignHash() {
        $str = $this->settings['pay_ge_password'] . $this->settings['pay_ge_login'] . $this->inv_id . $this->amount . "GEL" . $this->inv_desc . "KA" . $this->settings['pay_ge_test'];
        return strtoupper(hash('sha256', $str));
    }


    private function checkSignHash() {
        $this->transaction_code = $_GET['transactioncode'];
        $str =
            $_GET['status']
            . $_GET['transactioncode']
            . $_GET['date']
            . $_GET['amount']
            . $_GET['currency']
            . $_GET['ordercode']
            . $_GET['paymethod']
            . $_GET['testmode']
            . $this->settings['pay_ge_password']
        ;
        $calculatedCheck = strtoupper(hash('sha256', $str));

	    if (strcasecmp($_GET['check'], $calculatedCheck) != 0){
            return false;
        }

	    return true;
    }

    private function getOutHashForXml($resultcode){
        $mes = $this->errorCodes[$resultcode];
        $str = hash('sha256', $resultcode . $mes . $this->transaction_code . $this->settings['pay_ge_password']);
        header('Content-type: text/xml');
        $this->writelog('output', 'resultcode:'. $resultcode . ' message:'. $mes . ' transaction:'. $this->transaction_code);
        return <<<XML
<result>
<resultcode>$resultcode</resultcode>
<resultdesc>$mes</resultdesc>
<check>$str</check>
<data></data>
</result>
XML;
    }

    public function writelog($title, $data) {
        $file = 'pay_ge.log';
        $mode = (file_exists($file) && is_writeable($file)) ? "a" : "w";
        $fp = @fopen($file, $mode);
        fwrite($fp, date('Y-m-d H:i:s') . ": " . $title . ":\r\n");
        if (is_array($data))
            fwrite($fp, var_export($data, true) . "\r\n");
        else
            fwrite($fp, $data . "\r\n");
        fwrite($fp, "\r\n");
        fclose($fp);
    }

}
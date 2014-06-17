<?php
class apb_online extends APayments implements IPayment, IPaymentCallback {
    public $pay_name = "APB Online";
    public $settings = array();
    private $amount;
    private $inv_id;
    private $inv_desc;

    public function isCallback() {
        if (!isset($_REQUEST['InvId']))
            return false;
        else
            return true;
    }

    public function process() {
      global $sql;
      if (!$this->checkSignHash()) {
        exit("bad sign");
      }
      else {
        $inv_id = (integer)$_REQUEST['InvId'];
        $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id AND status=0");
        if (!empty($pay_info)) {
          $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
          if (empty($pay_info['pct_id'])) {  // пополнение счёта
            $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
            // и в журнал
            $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) VALUES(NOW(), {$pay_info['userid']}, {$pay_info['paycost']}, 'RoboKassa', 1)");
            return print("OK" . $inv_id);
          }
          else {  // оплата купонов
            $pct_info = $sql->fetchOne("SELECT * FROM pey_coupons_transactions WHERE id={$pay_info['pct_id']} AND tran_status=0");
            if (!empty($pct_info) and ($pct_info['total_price'] == $_REQUEST['OutSum'])) {
              Coupons::makeBuyOrder($pay_info['pct_id']);
              return print("OK" . $inv_id);
            }
          }
        }
      }
    }

    public function getForm($amount, $options = array()) {  // при пополнении баланса
        global $sql;
        $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, 'apb online', $amount, NOW(), 'Пополнение баланса')");
        $this->inv_id = $sql->lastInsertId();
        $this->inv_desc = "Пополнение баланса на http://" . $_SERVER['HTTP_HOST'];
        $this->amount = $amount;
        $output = $this->constructHtml();
        return $output;
    }

    public function getBuyForm($amount, $pct_id) {  // при покупке купона
        global $sql;
        $sql->exec("INSERT INTO pay_outcomming(payvariant, paycost, date, comments, pct_id) VALUES('apb online', $amount, NOW(), 'Покупка купонов', '$pct_id')");
        $this->inv_id = $sql->lastInsertId();
        $this->inv_desc = "Покупка купонов";
        $this->amount = $amount;
        $output = $this->constructHtml();
        return $output;
    }

    protected function constructHtml() {
      $form = '
			<form name="pay" action="https://online.agroprombank.com/services/ProcessPayment" method="post">
  			<input type="hidden" name="MerchantId" value="'.$this->settings['merchant_id'].'">
  			<input type="hidden" name="RequestedSum" value="'.$this->amount.'">
  			<input type="hidden" name="InvoiceId" value="'.$this->inv_id.'">
  			<input type="hidden" name="Desc" value="'.$this->inv_desc.'">
  			<input type="hidden" name="IsTest" value="0">
  			<input type="hidden" name="SignatureValue" value="'.$this->generateSignature().'">
			</form>
			<br/>
			<a href="" onclick="document.forms[\'pay\'].submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
      return $form;
    }

    private function generateSignature() {
      return md5($this->settings['merchant_id'].":".$this->amount.":".$this->inv_id.":".$this->inv_desc.":0:".$this->settings['merchant_pass']);
    }


    private function checkSignature() {
      $str = "";
      foreach ($_POST as $k => $v) {
        if ($k!="SignatureValue")
          $str .= $v.":";
      }
      $str .= $this->settings['merchant_pass'];
      if (md5($str)==$_POST['SignatureValue'])
        return true;
      else return false;
    }


    public function writelog($title, $data) {
        $file = 'apb_online.log';
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
?>
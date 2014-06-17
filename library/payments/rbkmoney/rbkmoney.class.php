<?php
class rbkmoney extends APayments implements IPayment, IPaymentCallback {
    public $pay_name = "RBK Money";
    public $settings = array();
    private $amount;
    private $inv_id;
    private $inv_desc;

    public function isCallback() {
      if (!isset($_POST['eshopId']))
        return false;
      else
        return true;
    }

    public function process() {
      global $sql;
      if (!$this->checkSignHash())
        exit("bad sign");
      if ($_POST["paymentStatus"]!=5) {
        header("HTTP/1.0 200 OK");
        exit();
      }
      $inv_id = (integer)$_POST['orderId'];
      $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id");
      if (!empty($pay_info)) {
        if ($pay_info['status']==0) {
          $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
          if (empty($pay_info['pct_id'])) {  // пополнение счёта
            $sql->exec("UPDATE users SET balance=balance+{$_POST['recipientAmount']} WHERE id={$pay_info['userid']}");
            // и в журнал
            $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) VALUES(NOW(), {$pay_info['userid']}, {$_POST['recipientAmount']}, 'RBK Money', 1)");
          }
          else {  // оплата купонов
            $pct_info = $sql->fetchOne("SELECT * FROM pey_coupons_transactions WHERE id={$pay_info['pct_id']} AND tran_status=0");
            if (!empty($pct_info) and ($pct_info['total_price'] == $_POST['recipientAmount'])) {
              Coupons::makeBuyOrder($pay_info['pct_id']);
            }
          }
        }
        header("HTTP/1.0 200 OK");
      }
    }

    public function getForm($amount, $options = array()) {  // при пополнении баланса
      global $sql;
      $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, 'rbkmoney', $amount, NOW(), 'Пополнение баланса')");
      $this->inv_id = $sql->lastInsertId();
      $this->inv_desc = "Пополнение баланса на http://" . $_SERVER['HTTP_HOST'];
      $this->amount = $amount;
      $output = $this->constructHtml();
      return $output;
    }

    public function getBuyForm($amount, $pct_id) {  // при покупке купона
      global $sql;
      $sql->exec("INSERT INTO pay_outcomming(payvariant, paycost, date, comments, pct_id) VALUES('rbkmoney', $amount, NOW(), 'Покупка купонов', '$pct_id')");
      $this->inv_id = $sql->lastInsertId();
      $this->inv_desc = "Покупка купонов";
      $this->amount = $amount;
      $output = $this->constructHtml();
      return $output;
    }

    protected function constructHtml() {
      $form = '
  			<form name="pay" action="https://rbkmoney.ru/acceptpurchase.aspx" method="post">
  			<input type="hidden" name="eshopId" value="'.$this->settings['eshop_id'].'">
  			<input type="hidden" name="orderId" value="'.$this->inv_id.'">
  			<input type="hidden" name="serviceName" value="'.$this->inv_desc.'">
  			<input type="hidden" name="recipientAmount" value="'.$this->amount.'">
  			<input type="hidden" name="recipientCurrency" value="'.$this->settings['recipient_сurrency'].'">
  			<input type="hidden" name="successUrl" value="http://'.$_SERVER['HTTP_HOST'].'/article/success.html">
  			<input type="hidden" name="failUrl" value="http://'.$_SERVER['HTTP_HOST'].'/article/fail.html">
  			<input type="hidden" name="hash" value="'.$this->generateSignHash().'">
  			<input type="hidden" name="Culture" value="ru">
  			</form>
  			<br/>
  			<a href="" onclick="document.forms[\'pay\'].submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
      return $form;
    }

    private function generateSignHash() {
      return md5($this->settings['eshop_id']."::".$this->amount."::".$this->settings['recipient_сurrency']."::"."::".$this->inv_desc."::".$this->inv_id."::"."::".$this->settings['secret_key']);
    }


    private function checkSignHash() {
	    if (md5($_POST["eshopId"]."::".$_POST["orderId"]."::".$_POST["serviceName"]."::".$_POST["eshopAccount"]."::".$_POST["recipientAmount"]."::".$_POST["recipientCurrency"]."::".$_POST["paymentStatus"]."::".$_POST["userName"]."::".$_POST["userEmail"]."::".$_POST["paymentData"]."::".$this->settings['secret_key']) == $_POST["hash"])
	      return true;
	    else
	      return false;
    }


    public function writelog($title, $data) {
      $file = 'rbkmoney.log';
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
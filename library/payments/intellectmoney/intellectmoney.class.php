<?php
define('RECIPIENT_CURRENCY', 'RUB');  //  RUB - рубли; TST - для тестов

class intellectmoney extends APayments implements IPayment, IPaymentCallback {
  public $pay_name = "Intellect Money";
  public $settings = array();
  private $amount;
  private $inv_id;
  private $inv_desc;
  private $name;
  private $email;

  public function isCallback() {
    if (!isset($_POST['eshopId']))
      return false;
    else
      return true;
  }


  public function process() {
    global $sql;
    if (!$this->checkSignature()) {
      exit("bad sign");
    }
    else {
      if ($_POST['paymentStatus']==5) {  // заказ полностью оплачен
        $inv_id = (integer)$_POST['orderId'];
        $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id AND status=0");
        if (!empty($pay_info)) {
          $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
          if (empty($pay_info['pct_id'])) {  // пополнение счёта
            $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
            // и в журнал
            $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) VALUES(NOW(), {$pay_info['userid']}, {$pay_info['paycost']}, 'IntellectMoney', 1)");
          }
          else {  // оплата купонов
            $pct_info = $sql->fetchOne("SELECT * FROM pey_coupons_transactions WHERE id={$pay_info['pct_id']} AND tran_status=0");
            if (!empty($pct_info) and ($pct_info['total_price'] == $_POST['recipientAmount'])) {
              Coupons::makeBuyOrder($pay_info['pct_id']);
            }
          }
        }
      }
    }
    echo "OK";
  }


  public function getForm($amount, $options = array()) {  // при пополнении баланса
    global $sql;
    $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, 'intellectmoney', $amount, NOW(), 'Пополнение баланса')");
    $this->inv_id = $sql->lastInsertId();
    $this->inv_desc = "Пополнение баланса на http://" . $_SERVER['HTTP_HOST'];
    $this->amount = $amount;
    $user_info = $sql->fetchOne("SELECT name, email FROM users WHERE id={$options['user_id']}");
    $this->name = $user_info['name'];
    $this->email = $user_info['email'];
    $output = $this->constructHtml();
    return $output;
  }


  public function getBuyForm($amount, $pct_id) {  // при покупке купона
    global $sql;
    $sql->exec("INSERT INTO pay_outcomming(payvariant, paycost, date, comments, pct_id) VALUES('intellectmoney', $amount, NOW(), 'Покупка купонов', '$pct_id')");
    $this->inv_id = $sql->lastInsertId();
    $this->inv_desc = "Покупка купонов";
    $this->amount = $amount;
    $user_info = $sql->fetchOne("SELECT name, email FROM users WHERE id={$_SESSION['ID']}");
    $this->name = $user_info['name'];
    $this->email = $user_info['email'];
    $output = $this->constructHtml();
    return $output;
  }


  protected function constructHtml() {
    $form = '
		<form name="pay" action="https://merchant.intellectmoney.ru/ru/" method="post">
  		<input type="hidden" name="eshopId" value="'.$this->settings['eshop_id'].'">
  		<input type="hidden" name="orderId" value="'.$this->inv_id.'">
  		<input type="hidden" name="serviceName" value="'.$this->inv_desc.'">
  		<input type="hidden" name="recipientAmount" value="'.$this->amount.'">
  		<input type="hidden" name="recipientCurrency" value="'.RECIPIENT_CURRENCY.'">
  		<input type="hidden" name="preference" value="">
      <input type="hidden" name="userName" value="'.$this->name.'">
      <input type="hidden" name="userEmail" value="'.$this->email.'">
      <input type="hidden" name="successUrl" value="http://'.$_SERVER['HTTP_HOST'].'/article/success.html">
      <input type="hidden" name="failUrl" value="http://'.$_SERVER['HTTP_HOST'].'/article/file.html">
      <input type="hidden" name="hash" value="'.$this->genSignHash().'">
		</form>
    <br/>
    <a href="" onclick="document.forms[\'pay\'].submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
		return $form;
	}


  public function checkSignature() {
    return md5($_POST['eshopId'] . '::' . $_POST['orderId'] . '::' . $_POST['serviceName'] . '::' . $_POST['eshopAccount'] . '::' . $_POST['recipientAmount'] . '::' . $_POST['recipientCurrency'] . '::' . $_POST['paymentStatus'] . '::' . $_POST['userName'] . '::' . $_POST['userEmail'] . '::' . $_POST['paymentData'] . '::' . $this->settings['secret_key']) == $_POST['hash'];
  }


  public function genSignHash(){
    return strtoupper(md5($this->settings['eshop_id'].'::'.$this->inv_id.'::'.$this->inv_desc.'::'.$this->amount.'::'.RECIPIENT_CURRENCY.'::'.$this->settings['secret_key']));
  }


  public function writelog($title, $data) {
    $file = 'intellectmoney.log';
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
<?php
class easypay extends APayments implements IPayment {
  public $pay_name = "EasyPay";
  public $settings = array();
  private $amount;
  private $inv_id;

  public function getForm($amount, $options = array()) {  // при пополнении баланса
    global $sql;
    $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, 'easypay', $amount, NOW(), 'Пополнение баланса')");
    $this->inv_id = $sql->lastInsertId();
    $this->inv_desc = "Пополнение баланса на http://".$_SERVER['HTTP_HOST'];
    $this->amount = $amount;
    $output = $this->constructHtml();
    return $output;
  }


  public function getBuyForm($amount, $pct_id) {  // при покупке купона
    global $sql;
    $sql->exec("INSERT INTO pay_outcomming(payvariant, paycost, date, comments, pct_id) VALUES('easypay', $amount, NOW(), 'Покупка купонов', '$pct_id')");
    $this->inv_id = $sql->lastInsertId();
    $this->inv_desc = "Покупка купонов";
    $this->amount = $amount;
    $output = $this->constructHtml();
    return $output;
  }


	protected function constructHtml() {
    $form = '
    <form name="pay" action="https://ssl.easypay.by/weborder/" method="post" accept-charset="cp1251">
      <input type="hidden" name="EP_MerNo" value="'.$this->settings['easypay_no'].'">
      <input type="hidden" name="EP_OrderNo" value="'.$this->inv_id.'">
      <input type="hidden" name="EP_Sum" value="'.$this->amount.'">
      <input type="hidden" name="EP_Expires" value="'.$this->settings['easypay_expiries'].'">
      <input type="hidden" name="EP_Comment" value="">
      <input type="hidden" name="EP_OrderInfo" value="'.$this->inv_desc.'">
      <input type="hidden" name="EP_Success_URL" value="http://'.$_SERVER['HTTP_HOST'].'/article/success.html">
      <input type="hidden" name="EP_Cancel_URL" value="http://'.$_SERVER['HTTP_HOST'].'/article/fail.html">
      <input type="hidden" name="EP_Hash" value="'.$this->generateSignHash().'">
	  </form>
	  <br/>
	  <a href="" onclick="document.forms[\'pay\'].submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
    return $form;
  }


  public function isCallback() {
    if (!isset($_POST['order_mer_code']))
      return false;
    else
      return true;
  }


  public function process() {
    global $sql;
    $post_params = array(
      'order_mer_code' => isset($_POST['order_mer_code']) ? $_POST['order_mer_code'] : 0,
	    'sum' => isset($_POST['sum']) ? $_POST['sum'] : 0,
	    'mer_no' => isset($_POST['mer_no']) ? $_POST['mer_no'] : '',
	    'card' => isset($_POST['card']) ? $_POST['card'] : '',
	    'purch_date' => isset($_POST['purch_date']) ? $_POST['purch_date'] : '',
	    'notify_signature' => isset($_POST['notify_signature']) ? $_POST['notify_signature'] : ''
	  );
	  if (!$this->checkSignHash($post_params))
	    exit("Неверная контрольная сумма запроса");

	  $inv_id = (integer)$post_params['order_mer_code'];
    $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id AND status=0");
    if (!empty($pay_info)) {
      $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
      if (empty($pay_info['pct_id'])) {  // пополнение счёта
        $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
        // и в журнал
        $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) VALUES(NOW(), {$pay_info['userid']}, {$pay_info['paycost']}, 'EasyPay', 1)");
        header("HTTP/1.0 200 OK");
      }
      else {  // оплата купонов
        $pct_info = $sql->fetchOne("SELECT * FROM pey_coupons_transactions WHERE id={$pay_info['pct_id']} AND tran_status=0");
        if (!empty($pct_info) and ($pct_info['total_price'] == $post_params['sum'])) {
          Coupons::makeBuyOrder($pay_info['pct_id']);
          header("HTTP/1.0 200 OK");
        }
      }
    }
  }


  private function generateSignHash() {
    return md5($this->settings['easypay_no'].$this->settings['easypay_webkey'].$this->inv_id.$this->amount);
  }


  private function checkSignHash($post_params) {
    if (md5($post_params['order_mer_code'].$post_params['sum'].$post_params['mer_no'].$post_params['card'].$post_params['purch_date'].$this->settings['easypay_webkey'])==$post_params['notify_signature'])
      return true;
    else
      return false;
  }


  public function writelog($title, $data) {
    $file = 'easypay.log';
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
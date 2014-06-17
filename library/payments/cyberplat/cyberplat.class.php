<?php
class cyberplat extends APayments implements IPayment, IPaymentCallback {
    public $pay_name = "CyberPlat";
    public $settings = array();
    private $amount;
    private $inv_id;

    public function getForm($amount, $options = array()) {
        global $sql;
        $sql->exec("INSERT INTO `pay_outcomming`(userid, payvariant, paycost, date, comments) values({$options['user_id']}, 'Cyberplat', $amount, now(), 'Пополнение баланса')");
        $this->inv_id = $sql->MaxCount("id", "pay_outcomming");
        $this->amount = $amount;
        $output = $this->constructHtml();
        return $output;
    }

    public function getBuyForm($amount, $pct_id) {  // при покупке купона.
        global $sql;
        $sql->exec("INSERT INTO `pay_outcomming`(payvariant, paycost, date, comments, pct_id) values('Cyberplat', '".$this->amount."', now(), 'Покупка купонов', '$pct_id');");
        $this->inv_id = $sql->MaxCount("id", "pay_outcomming");
        $pct_info = $sql->fetchOne("SELECT email, coupons_count FROM pey_coupons_transactions LEFT JOIN users ON pey_coupons_transactions.user_id=users.id WHERE pey_coupons_transactions.id=$pct_id");
        $this->amount = $amount;
        $output = $this->constructHtml();
        return $output;
    }

    protected function constructHtml() {
      global $main_settings;
      $output = "Ваш заказ принят. Его номер:<b>{$this->inv_id}</b>. Сумма:{$this->amount} {$main_settings['main_site_currency']}.<br/>
        Теперь вы можете оплатить его через любой терминал CyberPlat.";
      return $output;
    }


    public function isCallback() {
      if (!isset($_REQUEST['action']))
        return false;
      else
        return true;
    }


    public function process() {
      global $sql;
      if (!$this->check_sign())
        $answer = "<code>-4</code><message>{$this->error}</message>";
      elseif (!in_array($_GET['action'], array("check", "payment", "status", "cancel")))
        $answer = "<code>1</code><message>Неверный параметр action</message>";
      else {
        $answer = call_user_func(array($this, "process_".$_GET['action']), $sql);
      }
      $answer = "<?xml version='1.0' encoding='windows-1251'?><response>$answer</response>";
      $answer = iconv("utf-8", "windows-1251", $answer);
      $sign = $this->get_sign($answer);
      $answer = str_replace("</response>", "<sign>$sign</sign></response>", $answer);
      echo $answer;
    }

    private function process_check($sql) {
      $order_id = (integer)$_GET['number'];
      $pay_info = $sql->fetchOne("SELECT pay_outcomming.*, total_price
        FROM pay_outcomming LEFT JOIN pey_coupons_transactions ON pay_outcomming.pct_id=pey_coupons_transactions.id
        WHERE pay_outcomming.id=$order_id");
      if (empty($pay_info))
        $answer = "<code>2</code><message>Заказ $order_id не найден</message>";
      elseif ($pay_info['status']!=0)
        $answer = "<code>10</code><message>Заказ $order_id уже завершён</message>";
      else {
        $amount = (empty($pay_info['pct_id'])) ? $pay_info['paycost'] : $pay_info['total_price'];
        if ($amount!=$_GET['amount'])
          $answer = "<code>3</code><message>Неверная сумма заказа $order_id</message>";
        else
          $answer = "<code>0</code>";
      }
      return $answer;
    }

    private function process_payment($sql) {
      $date = date("Y-m-d\TH:i:s");
      $order_id = (integer)$_GET['number'];
      $receipt_id = mysql_escape_string($_GET['receipt']);
      $pay_info = $sql->fetchOne("SELECT pay_outcomming.*, total_price
        FROM pay_outcomming LEFT JOIN pey_coupons_transactions ON pay_outcomming.pct_id=pey_coupons_transactions.id
        WHERE pay_outcomming.id=$order_id");
      if (!preg_match("/^\d+$/", $receipt_id))
        $answer = "<code>4</code><date>$date</date><message>Неверное значение номера платежа $receipt_id</message>";
      elseif (empty($pay_info))
        $answer = "<code>2</code><date>$date</date><message>Заказ $order_id не найден</message>";
      elseif (!empty($pay_info['receipt_id']) and ($pay_info['receipt_id']!=$receipt_id))
        $answer = "<code>2</code><date>$date</date><message>Заказ $receipt_id не найден</message>";
      elseif ($pay_info['status']==1)
        $answer = "<code>0</code><authcode>$order_id</authcode><date>$date</date>";
      elseif ($pay_info['status']==2)
        $answer = "<code>10</code><authcode>$order_id</authcode><date>$date</date><message>Заказ $order_id отменён</message>";
      else {
        $amount = (empty($pay_info['pct_id'])) ? $pay_info['paycost'] : $pay_info['total_price'];
        if ($amount!=$_GET['amount'])
          $answer = "<code>3</code><authcode>$order_id</authcode><date>$date</date><message>Неверная сумма заказа $order_id</message>";
        else {
          $sql->exec("UPDATE pay_outcomming SET receipt_id='$receipt_id', status=1 WHERE id=$order_id");
  	      if (empty($pay_info['pct_id'])) {  // пополнение счёта.
            $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
            // и в журнал
            $sql->exec("INSERT INTO admin_pays (date, userid, paycost, payvar, paytype) values(now(), {$pay_info['userid']}, {$pay_info['paycost']}, 'CyberPlat', '1')");
  	      }
  	      else {  // оплата купонов.
            Coupons::makeBuyOrder($pay_info['pct_id']);
  	      }
          $answer = "<code>0</code><authcode>$order_id</authcode><date>$date</date>";
        }
      }
      return $answer;
    }

    private function process_status($sql) {
      $date = date("Y-m-d\TH:i:s");
      $receipt_id = mysql_escape_string($_GET['receipt']);
      $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE receipt_id='$receipt_id'");
      if (!preg_match("/^\d+$/", $receipt_id))
        $answer = "<code>4</code><date>$date</date><message>Неверное значение номера платежа $receipt_id</message>";
      elseif (empty($pay_info))
        $answer = "<code>6</code><date>$date</date><message>Заказ $receipt_id не найден</message>";
      elseif ($pay_info['status']==0)
        $answer = "<code>8</code><authcode>{$pay_info['id']}</authcode><date>$date</date>";
      elseif ($pay_info['status']==1)
        $answer = "<code>0</code><authcode>{$pay_info['id']}</authcode><date>$date</date>";
      elseif ($pay_info['status']==2)
        $answer = "<code>7</code><authcode>{$pay_info['id']}</authcode><date>$date</date>";
      else
        $answer = "<code>10</code><authcode>{$pay_info['id']}</authcode><date>$date</date><message>Неизвестный статус заказа</message>";
      return $answer;
    }

    private function process_cancel($sql) {
      $date = date("Y-m-d\TH:i:s");
      $receipt_id = mysql_escape_string($_GET['receipt']);
      $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE receipt_id='$receipt_id'");
      if (!preg_match("/^\d+$/", $receipt_id))
        $answer = "<code>4</code><date>$date</date><message>Неверное значение номера платежа $receipt_id</message>";
      elseif (empty($pay_info))
        $answer = "<code>9</code><date>$date</date><message>Заказ $receipt_id не найден</message>";
      elseif ($pay_info['status']==1)
        $answer = "<code>10</code><authcode>{$pay_info['id']}</authcode><date>$date</date><message>Заказ $receipt_id уже завершён</message>";
      else {
        $sql->exec("UPDATE pay_outcomming SET status=2 WHERE receipt_id='$receipt_id'");
        $answer = "<code>0</code><authcode>{$pay_info['id']}</authcode><date>$date</date>";
      }
      return $answer;
    }


    private function check_sign() {
      $n = strpos($_SERVER['QUERY_STRING'], "&sign");
      $data = substr($_SERVER['QUERY_STRING'], 0, $n);
      if (!file_exists("payments/cyberplat/pub_in.pem")) {  // Публичный ключ cyberplat
        $this->error = "Публичный ключ не найден";
        return false;
      }
      $pubkey = file_get_contents("payments/cyberplat/pub_in.pem");
      $pubkeyid = openssl_get_publickey($pubkey);
      if (!is_resource($pubkeyid)) {
        $this->error = "Публичный ключ некорректен";
        return false;
      }

			$result = openssl_verify($data, pack ("H*", $_GET['sign']), $pubkeyid);
			if ($result==1)
			  return true;
			else {
			  $this->error = "Неверная цифровая подпись";
			  return false;
			}
    }


    private function get_sign($str) {
      if (!file_exists("payments/cyberplat/private.ppk"))  // Наш приватный ключ
        exit("Закрытый ключ не найден");
      $prvkey = file_get_contents("payments/cyberplat/private.ppk");
      $prvkeyid = openssl_get_privatekey($prvkey);
      if (!is_resource($prvkeyid))
        exit("Закрытый ключ некорректен");
      openssl_sign($str, $out, $prvkeyid);
      $sign = unpack("H*", $out);
      return $sign[1];
    }


    function getPSName() {}

    function getPSDescription() {}

    public function writelog($title, $data) {
        $file = 'cyberplat.log';
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
<?php
define('PAYPAL_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr');  // Тестовый адрес - https://www.sandbox.paypal.com/cgi-bin/webscr, реальный - https://www.paypal.com/cgi-bin/webscr.

class paypal extends APayments implements IPayment, IPaymentCallback {
    public $pay_name = "PayPal";
    public $settings = array();
    private $amount;
    private $inv_id;
    private $inv_desc;


    public function getForm($amount, $options = array()) {  // при пополнении счёта.
        global $sql;
        $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, 'paypal', $amount, NOW(), 'Пополнение баланса')");
        $this->inv_id = $sql->lastInsertId();
        $this->inv_desc = "Popolnenie balansa na http://" . $_SERVER['HTTP_HOST'];
        $this->amount = $amount;
        $output = $this->constructHtml();
        return $output;
    }


    public function getBuyForm($amount, $pct_id) {  // при покупке купона.
        global $sql;
        $sql->exec("INSERT INTO pay_outcomming(payvariant, paycost, date, comments, pct_id) VALUES('onlinedengi', $amount, NOW(), 'Покупка купонов', '$pct_id')");
        $this->inv_id = $sql->lastInsertId();
        $this->inv_desc = "Pokupka kuponov";
        $this->amount = $amount;
        $output = $this->constructHtml();
        return $output;
    }


    protected function constructHtml() {
        $form = '
            <form name="pay" action="'.PAYPAL_URL.'" method="post">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="'.$this->settings['paypal_business'].'">
            <input type="hidden" name="item_number" value="'.$this->inv_id.'">
            <input type="hidden" name="item_name" value="'.$this->inv_desc.'">
            <input type="hidden" name="no_shipping" value="1">
            <input type="hidden" name="return" value="'.BASE_URL.'/article/success.html">
            <input type="hidden" name="cancel_return" value="'.BASE_URL.'/article/fail.html">
            <input type="hidden" name="notify_url" value="'.BASE_URL.'/payments/payments-callback.php">
            <input type="hidden" name="rm" value="1">
            <input type="hidden" name="amount" value="'.$this->amount.'">
            <input type="hidden" name="currency_code" value="'.$this->settings['paypal_currency'].'">
            </form>
            <br/>
            <a href="" onclick="document.forms[\'pay\'].submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
        return $form;
    }


    public function isCallback() {
      if (!isset($_POST['item_number']))
        return false;
      else return true;
    }


    public function process() {
      global $sql;
      $result = $this->IPNReturn(PAYPAL_URL, $_POST);
      if ($result == 'VERIFIED') {
        $dataresult = $this->checkIPNData($_POST);
        if ($dataresult == 'OK') {
          $inv_id = (integer)$_POST['item_number'];
          $amount = (integer)$_REQUEST['OutSum'];
          $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id AND status=0");
          if (!empty($pay_info) and ($pay_info['paycost']==$_POST['mc_gross'])) {
            $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
            if (empty($pay_info['pct_id'])) {  // пополнение баланса
              $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
              // и в журнал
              $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) VALUES(NOW(), {$pay_info['userid']}, {$pay_info['paycost']}, 'PayPal', 1)");
            }
            else {  // покупка купонов
              $pct_info = $sql->fetchOne("SELECT * FROM pey_coupons_transactions WHERE id={$pay_info['pct_id']} AND tran_status=0");
              if (!empty($pct_info))
                Coupons::makeBuyOrder($pay_info['pct_id']);
            }
          }
        }
      }
    }


    function IPNReturn($url, $data) {
        $web = parse_url($url);
        $postdata = "";
        foreach ($data as $i => $v)
            $postdata .= $i."=".urlencode($v)."&";
        $postdata .= "cmd=_notify-validate";
        $ssl = "";
        if ($web['scheme'] == "https") {
            $web['port'] = "443";
            $ssl = "ssl://";
    }
    else $web['port'] = "80";
    $fp = @fsockopen($ssl.$web['host'], $web['port'], $errnum, $errstr, 40);

    if ($fp) {
           fputs($fp, "POST $web[path] HTTP/1.1\r\n");
           fputs($fp, "Host: $web[host]\r\n");
           fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
           fputs($fp, "Content-length: ".strlen($postdata)."\r\n");
           fputs($fp, "Connection: close\r\n\r\n");
           fputs($fp, $postdata . "\r\n\r\n");
           while (!feof($fp))
                   $info[] = trim(@fgets($fp, 1024));
           fclose($fp);

           if (in_array('VERIFIED', $info))
                   $info = 'VERIFIED';
           else $info = 'INVALID';
    }
    return $info;
  }


    function checkIPNData($data) {
        global $sql;
        if (($data['business']!=$this->settings['paypal_business']) and ($data['receiver_email']!=$this->settings['paypal_business']))
            return "Invalid receiver_email";
        if ($data['mc_currency']!=$this->settings['paypal_currency'])
            return "Invalid currency";
        return 'OK';
    }

    function getPSName() {}
    function getPSDescription() {}

  public function writelog($title, $data) {
      $file = 'paypal.log';
      $mode = (file_exists($file) && is_writeable($file)) ? "a" : "w";
      $fp = @fopen($file, $mode);
      fwrite($fp, date('Y-m-d H:i:s').": ".$title.":\r\n");
      if (is_array($data))
          fwrite($fp, var_export($data, true)."\r\n");
      else fwrite($fp, $data."\r\n");
      fwrite($fp, "\r\n");
      fclose($fp);
  }
}
?>
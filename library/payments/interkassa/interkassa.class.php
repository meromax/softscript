<?php
class interkassa extends APayments implements IPayment, IPaymentCallback {
    public $pay_name = "Интеркасса";
    public $settings = array();
    private $amount;
    private $inv_id;
    private $inv_desc;

    protected $payMethods = array(
        "Платежный терминал" => "w1terminalr",
        "Яндекс деньги" => "yandexmoney",
        "Сбербанк РФ" => "sbrf",
        "VISA, MasterCard" => "liqpaycardr",
        "Уникарта" => "unicard",
        "WebCreds.com" => "webcreds",
        "RBK" => "rbkmoney",
        "Money Mail" => "moneymailr",
        "LiqPay" => "liqpayr",
        "Единый кошелек" => "w1r",
        "Почта России" => 'w1ruspostr'
    );

    public function isCallback() {
      return (!isset($_REQUEST['ik_payment_id'])) ? false : true;
    }

    public function process() {
      global $sql;
      if (strtolower($_REQUEST['ik_payment_state']) != 'success')
        exit("ik_payment_state != 'success'");
      if (!$this->checkSignature())
        exit("bad sign_hash");

      $inv_id = (integer)$_REQUEST['ik_payment_id'];
      $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id AND status=0");
      if (!empty($pay_info)) {
        $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
        if (empty($pay_info['pct_id'])) {  // пополнение счёта
          $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
          // и в журнал
          $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) VALUES(NOW(), {$pay_info['userid']}, {$pay_info['paycost']}, 'Interkassa', 1)");
        }
        else {  // оплата купонов
          $pct_info = $sql->fetchOne("SELECT * FROM pey_coupons_transactions WHERE id={$pay_info['pct_id']} AND tran_status=0");
          if (!empty($pct_info)) {
            Coupons::makeBuyOrder($inv_id);
          }
        }
      }
    }

    public function getForm($amount, $options = array()) {  // при пополнении баланса
        global $sql;
        $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, 'interkassa', $amount, NOW(), 'Пополнение баланса')");
        $this->inv_id = $sql->lastInsertId();
        $this->inv_desc = "Пополнение баланса на http://" . $_SERVER['HTTP_HOST'];
        $this->amount = $amount;
        $output = $this->constructHtml();
        return $output;
    }

    public function getBuyForm($amount, $pct_id) {  // при покупке купона
        global $sql;
        $sql->exec("INSERT INTO pay_outcomming(payvariant, paycost, date, comments, pct_id) VALUES('interkassa', $amount, NOW(), 'Покупка купонов', '$pct_id')");
        $this->inv_id = $sql->lastInsertId();
        $this->inv_desc = "Покупка купонов";
        $this->amount = $amount;
        $output = $this->constructHtml();
        return $output;
    }

    protected function constructHtml() {
        $selectList = '';
        foreach ($this->payMethods as $key => $value)
            $selectList .= '<option value="' . $value . '">' . $key . '</option>';

        return '<form name="pay" action="https://interkassa.com/lib/payment.php" method="post" accept-charset="cp1251">
      			<input type="hidden" name="ik_shop_id" value="'.$this->settings['interkassa_shop_id'].'">
      			<input type="hidden" name="ik_payment_amount" value="'.$this->amount.'">
      			<input type="hidden" name="ik_payment_id" value="'.$this->inv_id.'">
      			<input type="hidden" name="ik_payment_desc" value="'.$this->inv_desc.'">
      			<input type="hidden" name="ik_paysystem_alias" value="">
      			<input type="hidden" name="ik_baggage_fields" value="">
      			<input type="hidden" name="ik_sign_hash" value="'.$this->generateSignHash().'" >
    			</form>
    			<br/>
    			<a href="" onclick="document.forms[\'pay\'].submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
    }

    private function generateSignHash() {
        return md5(implode(':', array($this->settings['interkassa_shop_id'], $this->amount, $this->inv_id, '', '', $this->settings['interkassa_secret_key'])));
    }

    private function checkSignature() {
        return strtoupper(md5(implode(':', array(
                            $_REQUEST['ik_shop_id'],
                            $_REQUEST['ik_payment_amount'],
                            $_REQUEST['ik_payment_id'],
                            $_REQUEST['ik_paysystem_alias'],
                            $_REQUEST['ik_baggage_fields'],
                            $_REQUEST['ik_payment_state'],
                            $_REQUEST['ik_trans_id'],
                            $_REQUEST['ik_currency_exch'],
                            $_REQUEST['ik_fees_payer'],
                            $this->settings['interkassa_secret_key'])))) == $_REQUEST['ik_sign_hash'];
    }

    public function writelog($title, $data) {
        $file = 'interkassa.log';
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
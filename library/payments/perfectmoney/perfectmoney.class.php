<?php
  class perfectmoney extends APayments implements IPayment, IPaymentCallback {
    public $pay_name = "Perfect Money";
    public $settings = array();
    private $amount;
    private $inv_id;
    private $inv_desc;

    public function isCallback() {
      if (!isset($_POST['V2_HASH']))
        return false;
      else
        return true;
    }

    public function process() {
      global $sql;
      if($this->checkSignature()) {
        $inv_id = (integer)$_POST['PAYMENT_ID'];
        $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id AND status=0");
        if (!empty($pay_info)) {
          $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
          if (empty($pay_info['pct_id'])) {  // пополнение счёта
            $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
            // и в журнал
            $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) VALUES(NOW(), {$pay_info['userid']}, {$pay_info['paycost']}, 'Perfect Money', 1)");
            return print("OK" . $inv_id);
          }
          else {  // оплата купонов
            $pct_info = $sql->fetchOne("SELECT * FROM pey_coupons_transactions WHERE id={$pay_info['pct_id']} AND tran_status=0");
            if (!empty($pct_info) and ($pct_info['total_price'] == $_POST['PAYMENT_AMOUNT'])) {
              Coupons::makeBuyOrder($pay_info['pct_id']);
              return print("OK" . $inv_id);
            }
          }
        }
      }
      else
        exit("Bad signature");
    }

    public function getForm($amount, $options = array()) {  // при пополнении баланса
        global $sql;
        $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, 'Perfect Money', $amount, NOW(), 'Пополнение баланса')");
        $this->inv_id = $sql->lastInsertId();
        $this->inv_desc = "Пополнение баланса на http://" . $_SERVER['HTTP_HOST'];
        $this->amount = $amount;
        $output = $this->constructHtml();
        return $output;
    }

    public function getBuyForm($amount, $pct_id) {  // при покупке купона
        global $sql;
        $sql->exec("INSERT INTO pay_outcomming(payvariant, paycost, date, comments, pct_id) VALUES('Perfect Money', $amount, NOW(), 'Покупка купонов', '$pct_id')");
        $this->inv_id = $sql->lastInsertId();
        $this->inv_desc = "Покупка купонов";
        $this->amount = $amount;
        $output = $this->constructHtml();
        return $output;
    }

    protected function constructHtml() {
      $form = '
        <form name="pay" action="https://perfectmoney.com/api/step1.asp" method="post">
          <input type="hidden" name="PAYEE_ACCOUNT" value="'.$this->settings['pmy_account'].'">
          <input type="hidden" name="PAYEE_NAME" value="'.$_SERVER['HTTP_HOST'].'">
          <input type="hidden" name="PAYMENT_ID" value="'.$this->inv_id.'">
          <input type="hidden" name="PAYMENT_AMOUNT" value="'.$this->amount.'">
          <input type="hidden" name="PAYMENT_UNITS" value="'.$this->settings['pmy_cur'].'">
          <input type="hidden" name="STATUS_URL" value="http://'.$_SERVER['HTTP_HOST'].'/payments/payments-callback.php">
          <input type="hidden" name="STATUS_URL_METHOD" value="POST">
          <input type="hidden" name="PAYMENT_URL" value="http://'.$_SERVER['HTTP_HOST'].'/article/success.html">
          <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
          <input type="hidden" name="NOPAYMENT_URL" value="http://'.$_SERVER['HTTP_HOST'].'/article/fail.html">
          <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
          <input type="hidden" name="SUGGESTED_MEMO" value="'.$this->inv_desc.'" >
          <input type="hidden" name="INTERFACE_LANGUAGE" value="ru_RU" >
        </form>
        <br/>
			  <a href="" onclick="document.forms[\'pay\'].submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
      return $form;
	  }

    public function checkSignature() {
  		return strtoupper(md5(implode(':', array($_POST['PAYMENT_ID'], $_POST['PAYEE_ACCOUNT'], $_POST['PAYMENT_AMOUNT'], $_POST['PAYMENT_UNITS'], $_POST['PAYMENT_BATCH_NUM'], $_POST['PAYER_ACCOUNT'], strtoupper(md5($this->settings['pmy_alterpass'])), $_POST['TIMESTAMPGMT'])))) == strtoupper($_POST['V2_HASH']);
  	}

    public function writelog($title, $data) {
        $file = 'perfectmoney.log';
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
<?php
  class libertyreserve extends APayments implements IPayment, IPaymentCallback {
    public $pay_name = "LibertyReserve";
    public $settings = array();
    private $amount;
    private $inv_id;
    private $inv_desc;

    public function isCallback() {
      if (!isset($_REQUEST['lr_paidto']) or !isset($_REQUEST['lr_store']))
        return false;
      else
        return true;
    }

    public function process() {
      global $sql;
      if (!$this->checkHash())
        exit("Неверная цифровая подпись");
      if (($_REQUEST["lr_paidto"]!=strtoupper($this->settings['lr_account'])) or (stripslashes($_REQUEST["lr_store"])!=$this->settings['lr_storename']))
        exit("Неверные данные");

      $inv_id = (integer)$_REQUEST['order_id'];
      $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id AND status=0");
      if (!empty($pay_info)) {
        $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
        if (empty($pay_info['pct_id'])) {  // пополнение счёта
          $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
          // и в журнал
          $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) VALUES(NOW(), {$pay_info['userid']}, {$pay_info['paycost']}, 'LibertyReserve', 1)");
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

    public function getForm($amount, $options = array()) {  // при пополнении баланса
      global $sql;
      $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, 'libertyreserve', $amount, NOW(), 'Пополнение баланса')");
      $this->inv_id = $sql->lastInsertId();
      $this->inv_desc = "Пополнение баланса на http://" . $_SERVER['HTTP_HOST'];
      $this->amount = $amount;
      $output = $this->constructHtml();
      return $output;
    }

    public function getBuyForm($amount, $pct_id) {  // при покупке купона
      global $sql;
      $sql->exec("INSERT INTO pay_outcomming(payvariant, paycost, date, comments, pct_id) VALUES('libertyreserve', $amount, NOW(), 'Покупка купонов', '$pct_id')");
      $this->inv_id = $sql->lastInsertId();
      $this->inv_desc = "Покупка купонов";
      $this->amount = $amount;
      $output = $this->constructHtml();
      return $output;
    }

    protected function constructHtml() {
      $form = '
        <form name="pay" method="post" action="https://sci.libertyreserve.com">
          <input type="hidden" name="lr_acc" value="'.$this->settings['lr_account'].'">
          <input type="hidden" name="lr_amnt" value="'.$this->amount.'">
          <input type="hidden" name="lr_currency" value="LRUSD">
          <input type="hidden" name="lr_comments" value="'.$this->inv_desc.'">
          <input type="hidden" name="lr_merchant_ref" value="'.$this->inv_id.'">
          <!-- baggage fields -->
          <input type="hidden" name="order_id" value="'.$this->inv_id.'" />
        </form>
        <br/>
			  <a href="" onclick="document.forms[\'pay\'].submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
			return $form;
    }

    private function checkHash() {
      $lr_encrypted = (isser($_REQUEST["lr_encrypted"])) ? $_REQUEST["lr_encrypted"] : "";
      $str = $_REQUEST["lr_paidto"].":".$_REQUEST["lr_paidby"].":".stripslashes($_REQUEST["lr_store"]).":".$_REQUEST["lr_amnt"].":".$_REQUEST["lr_transfer"].":".$_REQUEST["lr_currency"].":".$this->settings['lr_securityword'];
      $hash = strtoupper(bin2hex(mhash(MHASH_SHA256, $str)));
      if ($lr_encrypted==$hash)
        return true;
      else return false;
    }

    public function writelog($title, $data) {
      $file = 'libertyreserve.log';
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
<?php
  class qiwi_ishop extends APayments implements IPayment, IPaymentCallback {
    public $pay_name = "Ishop.qiwi.ru";
    public $settings = array();
    private $amount;
    private $inv_id;
    private $inv_desc;
    private $input;

    public function getForm($amount, $options = array()) {  // при пополнении баланса
      global $sql;
      $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, 'qiwi', $amount, NOW(), 'Пополнение баланса')");
      $this->inv_id = $sql->lastInsertId();
      $this->inv_desc = "Пополнение баланса на http://" . $_SERVER['HTTP_HOST'];
      $this->amount = $amount;
      $output = $this->constructHtml();
      return $output;
    }

    public function getBuyForm($amount, $pct_id) {  // при покупке купона
      global $sql;
      $sql->exec("INSERT INTO pay_outcomming(payvariant, paycost, date, comments, pct_id) VALUES('qiwi', $amount, NOW(), 'Покупка купонов', '$pct_id')");
      $this->inv_id = $sql->lastInsertId();
      $this->inv_desc = "Покупка купонов";
      $this->amount = $amount;
      $output = $this->constructHtml();
      return $output;
    }

    protected function constructHtml() {
      $form = '
      <form name="pay" action="http://w.qiwi.ru/setInetBill_utf.do" method="post">
        <input type="hidden" name="from" value="'.$this->settings['qiwi_id'].'">
        ID Вашего QIWI-кошелька: <input type="text" name="to" value="" style="border:1px solid #888888">
        <input type="hidden" name="summ" value="'.$this->amount.'">
        <input type="hidden" name="com" value="'.$this->inv_desc.'">
        <input type="hidden" name="ifetime" value="720">
        <input type="hidden" name="check_agt" value="true">
        <input type="hidden" name="txn_id" value="'.$this->inv_id.'">
			</form>
			<br/>
			<a href="" onclick="document.forms[\'pay\'].submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
      return $form;
    }


    public function isCallback() {
      $this->input = file_get_contents('php://input');
      if (preg_match('/<txn>(.*)?<\/txn>/', $this->input)==0)
        return false;
      else
        return true;
    }


    public function process() {
      global $sql;
      preg_match('/<login>(.*)?<\/login>/', $this->input, $m1);
      preg_match('/<password>(.*)?<\/password>/', $this->input, $m2);
      preg_match('/<txn>(.*)?<\/txn>/', $this->input, $m3);
      preg_match('/<status>(.*)?<\/status>/', $this->input, $m4);
      if (($m1[1]!=$this->settings['qiwi_id']) or ($m2[1]!=strtoupper(md5($m3[1].strtoupper(md5($this->settings['qiwi_password']))))))
        $result_code = 150;
      else {
        $inv_id = (integer)$m3[1];
        $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id");
        if (!empty($pay_info)) {
          if (($pay_info['status']==0) and ($m4[1]==60)) {
            $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
            if (empty($pay_info['pct_id'])) {  // пополнение счёта
                $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
                // и в журнал
                $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) VALUES(NOW(), {$pay_info['userid']}, {$pay_info['paycost']}, 'Qiwi', 1)");
            }
            else {  // оплата купонов
                $pct_info = $sql->fetchOne("SELECT * FROM pey_coupons_transactions WHERE id={$pay_info['pct_id']} AND tran_status=0");
                if (!empty($pct_info)) {
                    Coupons::makeBuyOrder($pay_info['pct_id']);
                }
            }
          }
          $result_code = 0;
        }
        else
          $result_code = 210;
      }
      $this->sendAnswer($result_code);
    }


    private function sendAnswer($result_code) {
      $fp = fopen('qiwi_ishop/xml', 'r');
      $text = fread($fp, filesize('qiwi_ishop/xml'));
      fclose($fp);
      $text = str_replace('status', $result_code , $text);
      header('content-type: text/xml; charset=UTF-8');
      echo $text;
    }


    public function writelog($title, $data) {
      $file = 'qiwi_ishop.log';
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
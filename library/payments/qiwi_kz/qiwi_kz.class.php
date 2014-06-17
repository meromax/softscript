<?php
class qiwi_kz extends APayments implements IPayment, IPaymentCallback {
    public $pay_name = "Qiwi Казахстан";
    public $settings = array();
    private $sum;
    private $account;
    private $txn_id;

    public function getForm($sum, $options = array()) {
        global $sql;
        $sql->exec("INSERT INTO `pay_outcomming`(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, 'qiwi', $sum, now(), 'Пополнение баланса')");
        $this->account = $sql->MaxCount("id", "pay_outcomming");
        $this->sum = $sum;
        $output = $this->constructHtml();
        return $output;
    }

    public function getBuyForm($sum, $pct_id) {  // при покупке купона.
        global $sql;
        $sql->exec("INSERT INTO `pay_outcomming`(payvariant, paycost, date, comments, pct_id) values('qiwi', $sum, now(), 'Покупка купонов', '$pct_id');");
        $this->account = $sql->MaxCount("id", "pay_outcomming");
        $pct_info = $sql->fetchOne("SELECT email, coupons_count FROM pey_coupons_transactions LEFT JOIN users ON pey_coupons_transactions.user_id=users.id WHERE pey_coupons_transactions.id=$pct_id");
        $this->sum = $sum;
        $output = $this->constructHtml();
        return $output;
    }

    protected function constructHtml() {
      global $main_settings;
      $output = "Ваш платёж принят. Его номер:<b>{$this->account}</b>. Сумма:{$this->sum} {$main_settings['main_site_currency']}.<br/>
        Теперь вы можете оплатить его через любой терминал Qiwi.";
      return $output;
    }


    public function isCallback() {
      if (!isset($_GET['txn_id']))
        return false;
      else
        return true;
    }


    public function process() {
      global $sql;
      $command = (isset($_GET['command'])) ? $_GET['command'] : "";
      $this->txn_id = (isset($_GET['txn_id'])) ? (integer)$_GET['txn_id'] : 0;
      $this->sum = (isset($_GET['sum'])) ? (float)$_GET['sum'] : 0;
      $this->account = (isset($_GET['account'])) ? (integer)$_GET['account'] : 0;

      if (!in_array($command, array("check", "pay")))
        $answer = "<osmp_txn_id>{$this->txn_id}</osmp_txn_id><result>300</result><comment>Неверная команда $command</comment>";
      else
        $answer = call_user_func(array($this, "process_".$command), $sql);
      $answer = "<?xml version='1.0' encoding='UTF-8'?><response>$answer</response>";
      echo $answer;
    }

    private function process_check($sql) {
      $pay_info = $sql->fetchOne("SELECT pay_outcomming.*, total_price
        FROM pay_outcomming LEFT JOIN pey_coupons_transactions ON pay_outcomming.pct_id=pey_coupons_transactions.id
        WHERE pay_outcomming.id={$this->account}");
      if (empty($pay_info))
        $answer = "<osmp_txn_id>{$this->txn_id}</osmp_txn_id><result>5</result><comment>Неверный номер платежа {$this->account}</comment>";
      elseif ($pay_info['status']==1)
        $answer = "<osmp_txn_id>{$this->txn_id}</osmp_txn_id><result>7</result><comment>Платёж {$this->account} уже завершён</comment>";
      else {
          $answer = "<osmp_txn_id>{$this->txn_id}</osmp_txn_id><result>0</result>";
      }
      return $answer;
    }

    private function process_pay($sql) {
      $pay_info = $sql->fetchOne("SELECT pay_outcomming.*, total_price
        FROM pay_outcomming LEFT JOIN pey_coupons_transactions ON pay_outcomming.pct_id=pey_coupons_transactions.id
        WHERE pay_outcomming.id={$this->account}");
      if (empty($pay_info))
        $answer = "<osmp_txn_id>{$this->txn_id}</osmp_txn_id><prv_txn>{$this->account}</prv_txn><sum>{$this->sum}</sum><result>5</result><comment>Неверный номер платежа {$this->account}</comment>";
      elseif (($pay_info['status']==1) and ($pay_info['receipt_id']!=$this->txn_id))
        $answer = "<osmp_txn_id>{$this->txn_id}</osmp_txn_id><prv_txn>{$this->account}</prv_txn><result>7</result><comment>Платёж {$this->account} уже завершён</comment>";
      elseif (($pay_info['status']==1) and ($pay_info['receipt_id']==$this->txn_id))
        $answer = "<osmp_txn_id>{$this->txn_id}</osmp_txn_id><prv_txn>{$this->account}</prv_txn><sum>{$this->sum}</sum><result>0</result>";
      else {
        $sum = (empty($pay_info['pct_id'])) ? $pay_info['paycost'] : $pay_info['total_price'];
        if ($this->sum < $sum)
          $answer = "<osmp_txn_id>{$this->txn_id}</osmp_txn_id><prv_txn>{$this->account}</prv_txn><sum>{$this->sum}</sum><result>241</result><comment>Сумма слишком мала</comment>";
        else {
          $sql->exec("UPDATE pay_outcomming SET receipt_id='{$this->txn_id}', status=1 WHERE id={$this->account}");
  	      if (empty($pay_info['pct_id'])) {  // пополнение счёта.
            $sql->exec("UPDATE users SET balance=balance+{$this->sum} WHERE id={$pay_info['userid']}");
            // и в журнал
            $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) values(NOW(), {$pay_info['userid']}, {$this->sum}, 'Qiwi', '1')");
  	      }
  	      else {  // оплата купонов.
  	        if ($this->sum > $sum) {  // если оплаченная сумма больше суммы заказа, разницу добавляем на баланс пользователя
  	          $dsum = $this->sum - $sum;
  	          $user_id = $sql->fetchOne("SELECT user_id FROM pey_coupons_transactions WHERE id={$pay_info['pct_id']}", "user_id");
  	          $sql->exec("UPDATE users SET balance=balance+$dsum WHERE id=$user_id");
  	        }
            Coupons::makeBuyOrder($pay_info['pct_id']);
  	      }
          $answer = "<osmp_txn_id>{$this->txn_id}</osmp_txn_id><prv_txn>{$this->account}</prv_txn><sum>{$this->sum}</sum><result>0</result>";
        }
      }
      return $answer;
    }


    function getPSName() {}

    function getPSDescription() {}

    public function writelog($title, $data) {
        $file = 'qiwi_kz.log';
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
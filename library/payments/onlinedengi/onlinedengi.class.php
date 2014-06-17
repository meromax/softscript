<?php
class onlinedengi extends APayments implements IPayment, IPaymentCallback {
    public $pay_name = "ДеньгиОнлайн";
    public $settings = array();
    private $amount;
    private $inv_id;
    private $inv_name;
    private $procedure;

    public function isCallback() {
      if (!isset($_REQUEST['orderid']))
        return false;
      else
        return true;
    }

    public function process() {
      global $sql;
      if (md5($_REQUEST['amount'].$_REQUEST['userid'].$_REQUEST['paymentid'].$this->settings['secret_word'])!=$_REQUEST['key'])
        exit("Неверная цифровая подпись");

      $orderid = (integer)substr($_REQUEST['orderid'], 2);
      $procedure = (integer)substr($_REQUEST['orderid'], 0, 1);  // 1-пополнение счёта, 2-покупка купонов.
      if ($procedure == 1) {  // пополнение счёта.
          $res = $sql->fetchOne("SELECT id, status FROM pay_outcomming WHERE id=$orderid");
          if (!empty($res)) {
            if ($res['status']==0) {
              $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$orderid");
              $res = $sql->fetchOne("SELECT userid, paycost FROM pay_outcomming WHERE id=$orderid");
              $sql->exec('UPDATE users SET balance=balance+' . $res['paycost'] . ' WHERE id=' . $res['userid']);
              // и в журнал
              $sql->exec("INSERT INTO admin_pays (date, userid, paycost, payvar, paytype) values(now(),'" . $res['userid'] . "','" . $res['paycost'] . "','RoboKassa','1');");
            }
            echo "<?xml version='1.0' encoding='UTF-8'?>
              <result>
                <id>{$_REQUEST['orderid']}</id>
                <code>YES</code>
              </result>";
          }
          else
            echo "<?xml version='1.0' encoding='UTF-8'?>
              <result>
                <id>{$_REQUEST['orderid']}</id>
                <code>NO</code>
                <comment>Нет такого заказа в системе</comment>
              </result>";
      }
      elseif ($procedure == 2) {  // активация купонов.
        $order = $sql->fetchOne("SELECT tran_status FROM pey_coupons_transactions WHERE id=$orderid");
        if (empty($order))
          echo "<?xml version='1.0' encoding='UTF-8'?>
            <result>
              <id>{$_REQUEST['orderid']}</id>
              <code>NO</code>
              <comment>Нет такого заказа в системе</comment>
            </result>";
        elseif ($order['tran_status']==1)
          echo "<?xml version='1.0' encoding='UTF-8'?>
            <result>
              <id>{$_REQUEST['orderid']}</id>
              <code>YES</code>
            </result>";
        else {
          Coupons::makeBuyOrder($orderid);
          echo "<?xml version='1.0' encoding='UTF-8'?>
            <result>
              <id>{$_REQUEST['orderid']}</id>
              <code>YES</code>
            </result>";
        }
      }
    }

    protected function initForm($user_id) {
      global $sql;
      $this->procedure = 1;
      $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) values('$user_id', 'onlinedengi', '{$this->amount}', now(), 'Пополнение баланса')");
      $this->inv_id = $sql->MaxCount("id", "pay_outcomming");
      $this->inv_name = $sql->fetchOne("SELECT username FROM users WHERE id=$user_id", "username");
    }

    public function getForm($amount, $options = array()) {
      $this->amount = $amount;
      $this->initForm($options['user_id']);
      $output = $this->constructHtml();
      return $output;
    }

    public function getBuyForm($amount, $pct_id) {  // при покупке купона.
      global $sql;
      $this->procedure = 2;
      $this->inv_id = $pct_id;
      $this->amount = $amount;
      $this->inv_name = $sql->fetchOne("SELECT username
        FROM pey_coupons_transactions LEFT JOIN users ON pey_coupons_transactions.user_id=users.id
        WHERE pey_coupons_transactions.id=$pct_id", "username");
      $output = $this->constructHtml();
      return $output;
    }

    protected function constructHtml() {
      $form = '
  			<form name="pay" action="http://www.onlinedengi.ru/wmpaycheck.php" method="post">
    			<input type="hidden" name="project" value="'.$this->settings['od_project'].'">
    	    <input type="hidden" name="amount" value="'.$this->amount.'">
    	    <input type="hidden" name="nickname" value="'.$this->inv_name.'">
    	    <input type="hidden" name="source" value="'.$this->settings['od_source'].'">
    	    <input type="hidden" name="order_id" value="'.$this->procedure.'_'.$this->inv_id.'">
    	    <select name="mode_type">
    	      <option value="60">Карточкой</option>
    	      <option value="14">Qiwi-кошелёк</option>
    	      <option value="7">Яндекс-деньги</option>
    	      <option value="2">Webmoney</option>
    	      <option value="39">Мобильный Платеж Мегафон</option>
    	      <option value="45">Мобильный Платеж Билайн</option>
    	      <option value="50">Мобильный Платеж МТС</option>
    	    </select>
    	    <input type="submit" value="оплатить">
  			</form>';
  		return $form;
    }

    function getPSName() {}

    function getPSDescription() {}

    public function writelog($title, $data) {
        $file = 'onlinedengi.log';
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
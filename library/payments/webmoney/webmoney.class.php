<?php
class webmoney extends APayments implements IPayment, IPaymentCallback {
    public $pay_name = "WebMoney";
    public $settings = array();
    private $amount;
    private $inv_id;
    private $inv_desc;
    private $container;

    public function getForm($amount, $options=array()) {  // при пополнении баланса.
      global $sql;
      $sql->exec("INSERT INTO `pay_outcomming`(userid, paycost, date, comments) values({$options['user_id']}, '$amount', now(), 'Пополнение баланса')");
      $this->inv_id = $sql->MaxCount("id", "pay_outcomming");
      $this->inv_desc = "Пополнение счёта";
      $this->amount = $amount;
      $output = $this->constructHtml();
      return $output;
    }

    public function getBuyForm($amount, $options) {  // при покупке купона.
      global $sql;
      $sql->exec("INSERT INTO `pay_outcomming`(paycost, date, comments, pct_id) values('$amount', now(), 'Покупка купонов', '{$options['pct_id']}');");
      $this->inv_id = $sql->MaxCount("id", "pay_outcomming");
      $this->inv_desc = "Покупка купонов";
      $this->amount = $amount;
      $output = $this->constructHtml();
      return $output;
    }

    protected function constructHtml() {
      $form = '
			  <form name="pay" action="https://merchant.webmoney.ru/lmi/payment.asp" method="post" accept-charset="cp1251">
			  <input type="hidden" name="LMI_PAYMENT_AMOUNT" value="'.$this->amount.'">
        <input type="hidden" name="LMI_PAYMENT_DESC" value="Pay order '.$this->inv_desc.'">
        <input type="hidden" name="LMI_PAYMENT_NO" value="'.$this->inv_id.'">
        <input type="hidden" name="LMI_PAYEE_PURSE" value="'.$this->settings['wm_num'].'">
        <input type="hidden" name="LMI_SIM_MODE" value="0">
			  </form>
			  <br/>
			  <a href="" onclick="document.forms[\'pay\'].submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
			return $form;
    }


    public function isCallback() {
      if (!isset($_REQUEST['LMI_PAYMENT_NO']))
        return false;
      else {
        $this->container = $_REQUEST;
        return true;
      }
    }


    public function process() {
      global $sql;
      IF ($this->container['LMI_PREREQUEST'] == 1) {  // ЕСЛИ ЭТО ФОРМА ПРЕДВАРИТЕЛЬНОГО ЗАПРОСА
        // 1) Проверяем, есть ли товар с таким id в базе данных.
        // Если такой товар не обнаружен, то выводим ошибку и прерываем работу скрипта.
        $query = "SELECT `id`, `paycost` FROM `pay_outcomming` WHERE id=" . $this->container['LMI_PAYMENT_NO'];
        $res = $sql->fetchOne($query);
        if (!$res['id'] or $res['id'] == "")
            exit("ERR: НЕ СОВПАДАЕТ НОМЕР ПОПОЛНЕНИЯ СЧЕТА");
        // 2) Проверяем, не произошла ли подмена суммы.
        // Cравниваем стоимость товара в базе данных с той суммой, что передана нам Мерчантом.
        // Если сумма не совпадает, то выводим ошибку и прерываем работу скрипта.
        if (trim($res['paycost']) != trim($this->container['LMI_PAYMENT_AMOUNT']))
            exit("ERR: НЕВЕРНАЯ СУММА ПЛАТЕЖА " . $this->container['LMI_PAYMENT_AMOUNT']);
        // 3) Проверяем, не произошла ли подмена кошелька.
        // Cравниваем наш настоящий кошелек с тем кошельком, который передан нам Мерчантом.
        // Если кошельки не совпадают, то выводим ошибку и прерываем работу скрипта.
        if (trim($_POST['LMI_PAYEE_PURSE']) != $this->settings['wm_num'])
            exit("ERR: НЕВЕРНЫЙ КОШЕЛЕК ПОЛУЧАТЕЛЯ");

        // Если ошибок не возникло и мы дошли до этого места, то выводим YES
        echo "YES";
      }
      ELSE {  // ЕСЛИ НЕТ LMI_PREREQUEST, СЛЕДОВАТЕЛЬНО ЭТО ФОРМА ОПОВЕЩЕНИЯ О ПЛАТЕЖЕ
        // Склеиваем строку параметров
        $common_string = $this->container['LMI_PAYEE_PURSE'] . $this->container['LMI_PAYMENT_AMOUNT'] . $this->container['LMI_PAYMENT_NO'] .
                $this->container['LMI_MODE'] . $this->container['LMI_SYS_INVS_NO'] . $this->container['LMI_SYS_TRANS_NO'] .
                $this->container['LMI_SYS_TRANS_DATE'] . $this->settings['wm_secret_key'] . $this->container['LMI_PAYER_PURSE'] . $this->container['LMI_PAYER_WM'];
        $hash = strtoupper(md5($common_string));
        // Прерываем работу скрипта, если контрольные суммы не совпадают
        if ($hash != $this->container['LMI_HASH'])
            exit("ERR: НЕВЕРНАЯ КОНТРОЛЬНАЯ СУММА");

        $inv_id = $this->container['LMI_PAYMENT_NO'];
        $res = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id AND status=0");
        if (!empty($res)) {
          if ($res['paycost']!=$this->container['LMI_PAYMENT_AMOUNT'])
            exit("ERR: НЕВЕРНАЯ СУММА ПЛАТЕЖА");
          $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
          if ($res['pct_id']==0) {  // пополнение счёта
            $sql->exec('UPDATE users SET balance=balance+'.$res['paycost'].' WHERE id='.$res['userid']);
            // и в журнал
            $sql->exec("INSERT INTO admin_pays (date, userid, paycost, payvar, paytype) values(now(), '".$res['userid']."', '".$res['paycost']."', 'WebMoney', '1')");
          }
          else {  // оплата купонов
            Coupons::makeBuyOrder($res['pct_id']);
          }
        }
        return true;
      }
    }


    function getPSName() {}

    function getPSDescription() {}

    public function writelog($title, $data) {
        $file = 'webmoney.log';
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
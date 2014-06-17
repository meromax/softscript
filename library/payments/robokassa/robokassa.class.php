<?php
define('ROBOKASSA_URL', 'https://merchant.roboxchange.com/Index.aspx');
//define('ROBOKASSA_TEST_URL', 'http://test.robokassa.com/Index.aspx');
define('ROBOKASSA_TEST_URL', 'http://'.$_SERVER['HTTP_HOST'].'/payment-callback.html');

class robokassa {
    public $pay_name = "RoboKassa";
    public $settings = array();
    private $amount;
    private $inv_id;
    private $inv_desc = 'Покупка товаров';
    private $login;
    private $password;
    private $password2;
    private $pay_url;

    public function __construct($login, $password, $password2, $amount, $orderId = 0,  $testMode = 0, $description = 'Покупка товаров'){
        $this->setPayUrl($testMode);
        $this->setCredentials($login, $password, $password2);
        $this->setPayOptions($amount, $orderId, $description);
    }

    private function setCredentials($login, $password, $password2){
        $this->login = $login;
        $this->password = $password;
        $this->password2 = $password2;
    }

    private function setPayUrl($testMode){
        if($testMode==1){
            $this->pay_url = ROBOKASSA_TEST_URL;
        } else {
            $this->pay_url = ROBOKASSA_URL;
        }
    }

    private function setPayOptions($amount, $orderId, $description){
        $this->amount = $amount;
        $this->inv_id = $orderId;
        $this->inv_desc = $description;
    }

    protected function getHtmlForm() {
        $form = '
            <form name="pay" id="pay" action="' . $this->pay_url . '" method="post">
            <input type="hidden" name="MrchLogin" value="' . $this->login . '">
            <input type="hidden" name="OutSum" id="amount" value="' . $this->amount . '">
            <input type="hidden" name="InvId" id="orderId" value="' . $this->inv_id . '">
            <input type="hidden" name="Desc" value="' . $this->inv_desc . '">
            <input type="hidden" name="SignatureValue" value="' . $this->generateSignHash() . '">
            <input type="hidden" name="Culture" value="ru">
            </form>';
        return $form;
    }

    public function getForm(){
        return $this->getHtmlForm();
    }

    private function generateSignHash() {
        return md5($this->login . ":" . $this->amount . ":" . $this->inv_id . ":" . $this->password);
    }


    private function checkSignHash() {
        if(strtoupper(md5($_REQUEST["OutSum"].":".$_REQUEST["InvId"].":".$this->password2))==strtoupper($_REQUEST["SignatureValue"])){
            return true;
        } else{
            return false;
        }
    }






    public function isCallback() {
        if (!isset($_REQUEST['InvId']))
            return false;
        else
            return true;
    }

    public function process() {
      global $sql;
      if (!$this->checkSignHash()) {
        exit("bad sign");
      }
      else {
        $inv_id = (integer)$_REQUEST['InvId'];
        $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id AND status=0");
        if (!empty($pay_info)) {
          $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
          if (empty($pay_info['pct_id'])) {  // пополнение счёта
            $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
            // и в журнал
            $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) VALUES(NOW(), {$pay_info['userid']}, {$pay_info['paycost']}, 'RoboKassa', 1)");
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
    }




    public function writelog($title, $data) {
        $file = 'robokassa.log';
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
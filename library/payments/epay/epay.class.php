<?php
define('EPAY_URL', 'https://epay.kkb.kz');  // https://epay.kkb.kz - рабочий; http://3dsecure.kkb.kz - для тестов
include("kkb.utils.php");

class epay extends APayments implements IPayment, IPaymentCallback {
    public $pay_name = "EPay";
    public $settings = array();
    private $amount;
    private $count;
    private $inv_id;
    private $inv_desc;
    private $email;

    public function getForm($amount, $options = array()) {
        global $sql;
        $sql->exec("INSERT INTO `pay_outcomming`(userid, payvariant, paycost, date, comments) values({$options['user_id']}, 'epay', $amount, now(), 'Пополнение баланса')");
        $this->inv_id = $sql->MaxCount("id", "pay_outcomming");
        $this->inv_desc = "Пополнение баланса на ".$_SERVER['HTTP_HOST'];
        $this->email = $sql->GetOne("email", "users WHERE id='".$options['user_id']."'");
        $this->amount = $amount;
        $this->count = "";
        $output = $this->constructHtml();
        return $output;
    }

    public function getBuyForm($amount, $pct_id) {  // при покупке купона.
        global $sql;
        $sql->exec("INSERT INTO `pay_outcomming`(payvariant, paycost, date, comments, pct_id) values('epay', '{$this->amount}', now(), 'Покупка купонов', '$pct_id')");
        $this->inv_id = $sql->MaxCount("id", "pay_outcomming");
        $this->inv_desc = "Покупка купонов";
        $pct_info = $sql->fetchOne("SELECT email, coupons_count FROM pey_coupons_transactions LEFT JOIN users ON pey_coupons_transactions.user_id=users.id WHERE pey_coupons_transactions.id=$pct_id");
        $this->email = $pct_info['email'];
        $this->amount = $amount;
        $this->count = $pct_info['coupons_count'];
        $output = $this->constructHtml();
        return $output;
    }

    protected function constructHtml() {
      $signed_order_b64 = process_request($this->inv_id, $this->settings['currency_id'], $this->amount, "payments/epay/config.ini");
      $appendix = "
        <document>
          <item name='".$this->inv_desc."' quantity='".$this->count."' amount='".$this->amount."'/>
        </document>";
      $appendix = base64_encode($appendix);
      $form = "
        <form name='pay' action='".EPAY_URL."/jsp/process/logon.jsp' method='post'>
        <input type='hidden' name='Signed_Order_B64' value='$signed_order_b64'>
        <input type='hidden' name='email' value='".$this->email."'>
        <input type='hidden' name='BackLink' value='http://".$_SERVER['HTTP_HOST']."/article/success.html'>
        <input type='hidden' name='FailureBackLink' value='http://".$_SERVER['HTTP_HOST']."/article/fail.html'>
        <input type='hidden' name='PostLink' value='http://".$_SERVER['HTTP_HOST']."/payments-callback.php'>
        <input type='hidden' name='appendix' value='$appendix'>
        <br/>
			  <a href='' onclick='document.forms[\"pay\"].submit(); return false;'><img src='/inc/templates/'.getCurrentTemplate().'/images/bye.png'></a>";
      return $form;
    }


    public function isCallback() {
      if (!isset($_REQUEST['response']))
        return false;
      else
        return true;
    }

    public function process() {
      global $sql;
      $result = process_response(stripslashes($_REQUEST['response']), "payments/epay/config.ini");
      if (is_array($result)) {
        if (in_array("ERROR", $result)) {
          if ($result["ERROR_TYPE"]=="ERROR")
            echo "System error:".$result["ERROR"];
          elseif ($result["ERROR_TYPE"]=="system")
            echo "Bank system error > Code: '".$result["ERROR_CODE"]."' Text: '".$result["ERROR_CHARDATA"]."' Time: '".$result["ERROR_TIME"]."' Order_ID: '".$result["RESPONSE_ORDER_ID"]."'";
          elseif ($result["ERROR_TYPE"]=="auth")
            echo "Bank system user autentication error > Code: '".$result["ERROR_CODE"]."' Text: '".$result["ERROR_CHARDATA"]."' Time: '".$result["ERROR_TIME"]."' Order_ID: '".$result["RESPONSE_ORDER_ID"]."'";
      	}
        elseif (in_array("DOCUMENT", $result)) {
      	  $inv_id = (integer)$result['ORDER_ORDER_ID'];
      	  $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id");
      	  if (!empty($pay_info)) {
            if ($pay_info['status']==0) {
              //  автоматическое списание суммы:
        	      $xml = process_complete($result['PAYMENT_REFERENCE'], $result['PAYMENT_APPROVAL_CODE'], $inv_id, $this->settings['currency_id'], $result['PAYMENT_AMOUNT'], "payments/epay/config.ini");
        	      $xml = urlencode($xml);
        	      $curl = curl_init(EPAY_URL."/jsp/remote/control.jsp?$xml");
                curl_setopt($curl, CURLOPT_HEADER, 0);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
                curl_exec($curl);
                curl_close($curl);
      	      // ---
      	      $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
      	      if (empty($pay_info['pct_id'])) {  // пополнение счёта.
                $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
                // и в журнал
                $sql->exec("INSERT INTO admin_pays (date, userid, paycost, payvar, paytype) values(now(), {$pay_info['userid']}, {$pay_info['paycost']}, 'ePay', '1')");
      	      }
      	      else {  // оплата купонов.
                $pct = $sql->fetchOne("SELECT total_price FROM pey_coupons_transactions WHERE id={$pay_info['pct_id']} AND tran_status=0");
                if (!empty($pct) and ($pct['total_price']==$result['ORDER_AMOUNT'])) {
                  Coupons::makeBuyOrder($pay_info['pct_id']);
                }
      	      }
            }
      	    echo 0;
          }
          else echo "No this order id ($inv_id) in system";
        }
      }
      else echo "System error ".$result;
    }

    static protected function includeConfig($classname) {
        $path = BASE_PATH . DIRECTORY_SEPARATOR . 'payments' . DIRECTORY_SEPARATOR . $classname . '.cfg.php';
        if (file_exists($path)) {
            include_once $path;
        }
    }

    function getPSName() {}

    function getPSDescription() {}

    public function writelog($title, $data) {
        $file = 'epay.log';
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
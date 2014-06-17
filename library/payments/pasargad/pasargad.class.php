<?php
include("RSAProcessor.class.php");
include("parser.php");

class pasargad extends APayments implements IPayment, IPaymentCallback {
  public $pay_name = "Pasargad";
  public $settings = array();
  private $amount;
  private $inv_id;
  private $timestamp;


  public function getForm($amount, $options = array()) {
    global $sql;
    $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, 'pasargad', $amount, NOW(), 'Пополнение баланса')");
    $this->inv_id = $sql->lastInsertId();
    $this->amount = $amount;
    $output = $this->constructHtml();
    return $output;
  }


  public function getBuyForm($amount, $pct_id) {  // при покупке купона.
    global $sql;
    $sql->exec("INSERT INTO pay_outcomming(payvariant, paycost, date, comments, pct_id) VALUES('pasargad', $amount, NOW(), 'Покупка купонов', '$pct_id')");
    $this->inv_id = $sql->lastInsertId();
    $this->amount = $amount;
    $output = $this->constructHtml();
    return $output;
  }


  protected function constructHtml() {
    $this->timestamp = date("Y/m/d H:i:s");
    $sign = $this->generateSign();

    $form = '
			<form name="pay" action="https://epayment.bankpasargad.com/gateway.aspx" method="post">
			<input type="hidden" name="invoiceNumber" value="'.$this->inv_id.'">
                        <input type="hidden" name="invoiceDate" value="'.$this->timestamp.'">
			<input type="hidden" name="amount" value="'.$this->amount.'">
			<input type="hidden" name="terminalCode" value="'.$this->settings['terminal_code'].'">
			<input type="hidden" name="merchantCode" value="'.$this->settings['merchant_code'].'">
                        <input type="hidden" name="redirectAddress" value="http://'.$_SERVER['HTTP_HOST'].'/payments/payments-callback.php">
			<input type="hidden" name="timeStamp" value="'.$this->timestamp.'">
			<input type="hidden" name="action" value="1003">
			<input type="hidden" name="sign" value="'.$sign.'">
			</form>
			<br/>
			<a href="" onclick="document.forms[\'pay\'].submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
    return $form;
  }


  private function generateSign() {
    $processor = new RSAProcessor(BASE_PATH."/payments/pasargad/certificate.xml", RSAKeyType::XMLFile);
    $data = "#".$this->settings['merchant_code']."#".$this->settings['terminal_code']."#".$this->inv_id."#".$this->timestamp."#".$this->amount."#"."http://".$_SERVER['HTTP_HOST']."/payments/payments-callback.php"."#".'1003'."#".$this->timestamp."#";
    $data = sha1($data,true);
    $data = $processor->sign($data);
    return base64_encode($data);
  }


  public function isCallback() {
    if (!isset($_GET['tref']))
      return false;
    else
      return true;
  }

    public function process() {
        global $sql;
        $answer = post2https($_GET['tref'], 'https://epayment.bankpasargad.com/CheckTransactionResult.aspx');
        $answer = makeXMLTree($answer);
        $this->writelog('answer', $answer);

        if (strtolower($answer['resultObj']['result']) == 'true') {
            $inv_id = (int) $answer['resultObj']['invoiceNumber'];
            $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id AND status=0");
            if (!empty($pay_info)) {
                $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
                if (empty($pay_info['pct_id'])) {  // пополнение счёта
                    $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
                    $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) VALUES(NOW(), {$pay_info['userid']}, {$pay_info['paycost']}, 'pasargad', 1)");
                } else {  // оплата купонов
                    $pct_info = $sql->fetchOne("SELECT * FROM pey_coupons_transactions WHERE id={$pay_info['pct_id']} AND tran_status=0");
                    $this->writelog('pct_info', $pct_info);
                    if (!empty($pct_info) and ($pct_info['total_price'] == $answer['resultObj']['amount'])) {
                        Coupons::makeBuyOrder($pay_info['pct_id']);
                    }
                }
            }
            header("Location: /article/success.html");
        } else {
            header("Location: /article/fail.html");
        }
    }


  public function writelog($title, $data) {
    $file = 'pasargad.log';
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
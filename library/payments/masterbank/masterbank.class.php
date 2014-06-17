<?php
define('MB_FORM_URL', 'https://web3ds.masterbank.ru/cgi-bin/cgi_link');  // https://web3ds2.masterbank.ru/cgi-bin/cgi_link - для тестов; https://web3ds.masterbank.ru/cgi-bin/cgi_link - реальный.

class masterbank extends APayments implements IPayment, IPaymentCallback {
  public $pay_name = "МастерБанк";
  public $settings = array();
	private $amount;
	private $inv_id;
	private $inv_desc;
	private $email;
	private $procedure;  // 1-пополнение счёта, 2-покупка купонов.

	protected function initForm($user_id) {
		global $sql;
		$sql->exec("INSERT INTO `pay_outcomming`(userid, paycost, date, comments) values('".$user_id."', '".$this->amount."', now(), 'Пополнение баланса')");
		$this->inv_id = $sql->MaxCount("id","pay_outcomming");
		$this->inv_desc = "Popolnenie balansa na http://".$_SERVER['HTTP_HOST'];
		$this->email = $sql->GetOne("email", "users WHERE id='".$user_id."';");
	}


	public function getForm($amount, $options = array()) {  // при пополнении счёта.
	  $this->amount = $amount;
	  $this->procedure = 1;
	  $this->initForm($options['user_id']);
		$output = $this->constructHtml();
		return $output;
	}


	public function getBuyForm($amount, $pct_id) {  // при покупке купона.
	  $this->inv_id = $pct_id;
	  $this->inv_desc = "Pokupka kuponov";
	  $this->amount = $amount;
	  $this->procedure = 2;
	  $output = $this->constructHtml();
		return $output;
	}


	protected function constructHtml() {
	  $inv_id = ($this->procedure==1) ? $this->inv_id*100 : $this->inv_id;  // чтобы не пересеклись с $inv_id для операций покупки купонов.
		$form = '
			<form name="pay" action="'.MB_FORM_URL.'" method="post">
			<input type="hidden" name="AMOUNT" value="'.$this->amount.'">
			<input type="hidden" name="CURRENCY" value="RUB">
			<input type="hidden" name="ORDER" value="'.$inv_id.'">
			<input type="hidden" name="DESC" value="'.$this->inv_desc.'">
			<input type="hidden" name="MERCH_NAME" value="brunix.ru">
			<input type="hidden" name="MERCH_URL" value="http://brunix.ru">
			<input type="hidden" name="MERCHANT" value="'.$this->_password.'">
			<input type="hidden" name="TERMINAL" value="'.$this->_ID.'">
			<input type="hidden" name="TRTYPE" value="0">
			<input type="hidden" name="MERC_GMT" value="+3">
			<input type="hidden" name="TIMESTAMP" value="'.gmdate('YmdHis').'">
			<input type="hidden" name="BACKREF" value="http://brunix.ru/payments-callback.php">
			</form>
			<br/>
			<a href="" onclick="document.forms[\'pay\'].submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
		return $form;
	}

  public function isCallback() {
	  if (!isset($_REQUEST['RESULT']))
	    return false;
	  else return true;
	}

	public function process() {
	  global $sql;
	  if (($_REQUEST['RESULT']==0) and ($_REQUEST['TRTYPE']=='0')) {
	    if ($_REQUEST['ORDER']>10000000) {  // пополнение баланса
	      $inv_id = (integer)$_REQUEST['ORDER']/100;
	      $res = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id='$inv_id'");
	      if (!empty($res) and ($res['paycost']==$_REQUEST['AMOUNT'])) {
	        if ($res['status']==1)
	          $tr_type = 24;
	        else {
  	        $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id='$inv_id'");
            $sql->exec('UPDATE users SET balance=balance+'.$res['paycost'].' WHERE id='.$res['userid']);
    			  // и в журнал
    			  $sql->exec("INSERT INTO admin_pays (date, userid, paycost, payvar, paytype) values(now(),'".$res['userid']."','".$res['paycost']."','МастерБанк','1');");
    			  $tr_type = 21;
	        }
	        $this->getAnswerForm($tr_type);
	      }
	    }
	    else {  // покупка купонов
	      $inv_id = (integer)$_REQUEST['ORDER'];
  	    $pct = $sql->fetchOne("SELECT * FROM pey_coupons_transactions WHERE id=$inv_id");
  	    if (!empty($pct) and ($pct['total_price']==$_REQUEST['AMOUNT'])) {
  	      if ($pct['tran_status']==1)
  	        $tr_type = 24;
  	      else {
  	        $tr_type = 21;
  	        Coupons::makeBuyOrder($inv_id);
  	      }
  	      $this->getAnswerForm($tr_type);
  	    }
	    }
	  }
	}

	protected function getAnswerForm($tr_type) {
	  $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, MB_FORM_URL);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSLVERSION, 3);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "AMOUNT=".$_REQUEST['AMOUNT']."&CURRENCY=RUB&ORDER=".$_REQUEST['ORDER']."&RRN=".$_REQUEST['RRN']."&INT_REF=".$_REQUEST['INT_REF']."&TERMINAL=".$this->_ID."&TIMESTAMP=".gmdate('YmdHis')."&TRTYPE=".$tr_type);
    $response = curl_exec($ch);
    curl_close($ch);
	}

	function getPSName() {}
	function getPSDescription() {}

  public function writelog($title, $data) {
  	$file='masterbank.log';
  	$mode = (file_exists($file) && is_writeable($file)) ? "a" : "w";
  	$fp = @fopen($file, $mode);
  	fwrite($fp, date('Y-m-d H:i:s').": ".$title.":\r\n");
  	if (is_array($data))
  		fwrite($fp, var_export($data, true)."\r\n");
  	else fwrite($fp, $data."\r\n");
  	fwrite($fp, "\r\n");
  	fclose($fp);
  }

}
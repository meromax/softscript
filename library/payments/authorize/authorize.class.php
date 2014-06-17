<?php
include('authorize_curl.class.php');
define('AUTHORIZE_URL', 'https://test.authorize.net/gateway/transact.dll');  //  https://secure.authorize.net/gateway/transact.dll - рабочий; https://test.authorize.net/gateway/transact.dll - для тестов

class authorize extends APayments implements IPayment, IPaymentCallback {
    public $pay_name = "Authorize";
    public $settings = array();
    public $amount;
    private $inv_id;
    private $inv_desc;

    public function getForm($amount, $options = array()) {
        global $sql;
        $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, 'authorize', $amount, NOW(), 'Пополнение баланса')");
        $this->inv_id = $sql->lastInsertId();
        $this->inv_desc = "Пополнение баланса на http://" . $_SERVER['HTTP_HOST'];
        $this->amount = $amount;
        $output = $this->constructHtml();
        return $output;
    }

    public function getBuyForm($amount, $pct_id) {  // при покупке купона.
        global $sql;
        $sql->exec("INSERT INTO pay_outcomming(payvariant, paycost, date, comments, pct_id) VALUES('authorize', $amount, NOW(), 'Покупка купонов', '$pct_id')");
        $this->inv_id = $sql->lastInsertId();
        $this->inv_desc = "Покупка купонов";
        $this->amount = $amount;
        $output = $this->constructHtml();
        return $output;
    }

    protected function constructHtml() {
        return '<div class="authorize_form">
				<form id="pay" name="pay" action="'.AUTHORIZE_URL.'" method="post">
					<input type="text" name="x_first_name" value="" placeholder="Имя"/>
					<input type="text" name="x_last_name" value="" placeholder="Фамилия"/></br>
					<input type="text" name="x_card_num" value="" placeholder="Номер карты"/></br>
					<input type="text" name="x_card_code" value="" placeholder="CCV"/></br>
					<label for="x_exp_date">Дата завершения действия карты в формате MM/YY</label></br>
					<input class="exp_date" type="text" name="x_exp_date" value="" placeholder="03/14"/></br>
					<input type="hidden" name="x_login" value="'.$this->settings['api_login_id'].'" />
					<input type="hidden" name="x_tran_key" value="'.$this->settings['transaction_key'].'" />
					<input type="hidden" name="x_version" value="3.1" />
					<input type="hidden" name="x_delim_data" value="TRUE" />
					<input type="hidden" name="x_delim_char" value="|" />
					<input type="hidden" name="x_type" value="AUTH_CAPTURE" />
					<input type="hidden" name="x_method" value="CC" />
					<input type="hidden" name="x_invoice_num" value="'.$this->inv_id.'" />
					<input type="hidden" name="x_amount" value="'.$this->amount.'" />
					<input type="hidden" name="x_description" value="'.$this->inv_desc.'" />
					<input type="hidden" name="x_address" value="" />
					<input type="hidden" name="x_city" value="" />
					<input type="hidden" name="x_zip" value="" />
					<input type="hidden" name="x_country" value="" />
					<input type="hidden" name="x_phone" value="" />
					<input type="hidden" name="x_customer_ip" value="'.$_SERVER['REMOTE_ADDR'].'" />
					<input type="hidden" name="x_duplicate_window" value="120" />
					<input type="hidden" name="x_relay_response" value="FALSE" />
				</form>
				</div>
			<br/>
			<div id="status"></div>
			<a href="" onclick="document.pay.submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
    }


    public function isCallback() {
        if (!isset($_REQUEST['cc']))
            return false;
        else
            return true;
    }


    public function process() {
        global $sql;
        $inv_id = (integer)$_POST['invoice_num'];
        $amount = (float)$_POST['amount'];

        $a = new authorize_curl($this->settings['api_login_id'], $this->settings['transaction_key']);
        $a->cc = $_POST['cc'];
        $a->expdate = $_POST['expdate'];
        $a->ccv = $_POST['ccv'];
        $a->trans_id = 1;
        $a->invoice_num = $inv_id;
        $a->amount = $amount;
        $a->description = $_POST['descript'];
        $a->email = $_POST['email'];
        $a->first_name = $_POST['first_name'];
        $a->last_name = $_POST['last_name'];
        $a->phone = $_POST['phone'];
        $a->country = $_POST['country'];
        $a->city = $_POST['city'];
        $a->address = $_POST['address'];
        $a->zip = $_POST['zip'];
        $result = $a->request();
        if ($result) {  // ??
            $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id AND status=0");
            if (!empty($pay_info)) {
                $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
                if (empty($pay_info['pct_id'])) {  // пополнение счёта
                    $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
                    // и в журнал
                    $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) VALUES(NOW(), {$pay_info['userid']}, {$pay_info['paycost']}, 'RoboKassa', 1)");
                }
                else {  // оплата купонов
                    $pct_info = $sql->fetchOne("SELECT * FROM pey_coupons_transactions WHERE id={$pay_info['pct_id']} AND tran_status=0");
                    if (!empty($pct_info) and ($pct_info['total_price'] == $_REQUEST['OutSum'])) {
                        Coupons::makeBuyOrder($pay_info['pct_id']);
                    }
                }
            }
            header("Location: /article/success.html");
        }
        else
          header("Location: /article/fail.html");
    }


    public function writelog($title, $data) {
        $file = 'authorize.log';
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

<?php
class twocheckout extends APayments implements IPayment, IPaymentCallback {
    public $pay_name = "2checkout";
    public $settings = array();
    protected $payMethods = array(
        "Credit Card" => "CC",
        "PayPal" => "PPI");
    private $amount;
    private $inv_id;
    private $inv_desc;

    public function getForm($amount, $options = array()) {
        global $sql;
        $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, '2checkout', $amount, NOW(), 'Пополнение баланса')");
        $this->inv_id = $sql->lastInsertId();
        $this->inv_desc = "Пополнение баланса на http://" . $_SERVER['HTTP_HOST'];
        $this->amount = $amount;
        $output = $this->constructHtml();
        return $output;
    }

    public function getBuyForm($amount, $pct_id) {  // при покупке купона.
        global $sql;
        $sql->exec("INSERT INTO pay_outcomming(payvariant, paycost, date, comments, pct_id) VALUES('2checkout', $amount, NOW(), 'Покупка купонов', '$pct_id')");
        $this->inv_id = $sql->lastInsertId();
        $this->inv_desc = "Покупка купонов";
        $this->amount = $amount;
        $output = $this->constructHtml();
        return $output;
    }

    protected function constructHtml() {
        $selectList = '';
        foreach ($this->payMethods as $key => $value)
            $selectList .= '<option value="' . $value . '">' . $key . '</option>';
        return '<form name="pay" action="https://www.2checkout.com/checkout/purchase" method="post" enctype="application/x-www-form-urlencoded" accept-charset="cp1251">
			<input type="hidden" name="sid" value="'.$this->settings['2checkout_sid'].'">
			<input type="hidden" name="total" value="'.$this->amount.'">
			<input type="hidden" name="cart_order_id" value="'.$this->inv_id.'">
			<input type="hidden" name="custom" value="'.$this->inv_desc.'">
			<input type="hidden" name="tco_currency" value="USD">
			<input type="hidden" name="x_Receipt_Link_URL" value="'.$_SERVER['HTTP_HOST'].'/payments/payments-callback.php">
			</form>
			<br/>
			<a href="" onclick="document.forms[\'pay\'].submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
    }

    /**
     * Для обработки ответа от сервера
     */
    public function isCallback() {
        if (!isset($_REQUEST['ik_payment_id']))
            return false;
        else
            return true;
    }

    public function process() {
        global $sql;
        $inv_id = (integer)$_REQUEST['InvId'];
        $amount = (float)$_REQUEST['OutSum'];

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
    }

    public function writelog($title, $data) {
        $file = '2checkout.log';
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
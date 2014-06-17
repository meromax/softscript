<?php

class authorize_curl {
	private $api_login_id;
	private $transaction_key;

	public $cc; //номер кредитной карты
	public $expdate; //дата окончания действия карты
	public $ccv; //ccv код карты

	public $trans_id;//номер транзакции - это должен быть уникальный номер, например номер заказа
	public $invoice_num;//номер счета фактуры - уникальный номер это может быть номер заказа или id пользователя
	public $amount;//стоимость товара услуги - эти деньги будут сняты с карты покупателя
	public $description;//описание товара или услуги

	public $tax;
	public $shipping;
	public $first_name;
	public $last_name;
	public $address;
	public $city;
	public $state;
	public $zip;
	public $country;
	public $email;
	public $phone;

	function __construct($api_login_id, $transaction_key) {
	  $this->api_login_id = $api_login_id;
	  $this->transaction_key = $transaction_key;
	}

	public function request() {
    $postParams = array(
      'x_login' => $this->api_login_id,
      'x_tran_key' => $this->transaction_key,
    	"x_version" => "3.1",
    	"x_delim_data" => "TRUE",
    	"x_delim_char" => "|",
    	"x_type" => "AUTH_CAPTURE",
    	//"x_test_request" => "TRUE",
    	"x_method" => "CC",
    	"x_card_num" => $this->cc,
    	"x_exp_date" => $this->expdate,
    	"x_card_code" => $this->cvv,
    	"x_trans_id" => $this->trans_id,
    	"x_invoice_num" => $this->invoice_num,
    	"x_amount" => $this->amount,
    	"x_description" => $this->description,
      //"x_tax" => $this->tax,
      //"x_freight" => $this->shipping,
      "x_first_name" => $this->first_name,
      "x_last_name" => $this->last_name,
      "x_address" => $this->address,
      "x_city" => $this->city,
      //"x_state" => $this->state,
      "x_zip" => $this->zip,
      "x_country" => $this->country,
      "x_email" => $this->email,
      "x_phone" => $this->phone,
    	"x_customer_ip" => $_SERVER['REMOTE_ADDR'],
    	"x_duplicate_window" => '120'//in seconds
    );
		return $this->send($postParams);
	}

	private function send($postParams) {
	  $post_string = "";
    foreach ($postParams as $key => $value)
      $post_string .= "$key=" . urlencode($value) . "&";
    $post_string = rtrim( $post_string, "& " );
    $request = curl_init($this->_postUrl); // initiate curl object
    curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
		curl_setopt($request, CURLOPT_POST,1);
    curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
    curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
    $post_response = curl_exec($request); // execute curl post and store results in $post_response
    curl_close($request); // close curl object
    return $post_response;
	}

}
?>
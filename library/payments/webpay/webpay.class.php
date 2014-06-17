<?php
define('WEBPAY_URL', 'https://secure.sandbox.webpay.by:8843');  // Адрес системы оплаты (https://secure.sandbox.webpay.by:8843 - для тестов; https://secure.webpay.by - реальный)
define('BILLING_URL', 'https://sandbox.webpay.by');  // Адрес биллинга (https://sandbox.webpay.by - для тестов; https://billing.webpay.by - реальный)

class webpay extends APayments implements IPaymentCallback {
  public $pay_name = "WebPay";
  public $settings = array();
  private $inv_id;


  public function isCallback() {
    if (!isset($_REQUEST['transaction_id']) and !isset($_REQUEST['wsb_tid']))
      return false;
    else
      return true;
  }


	public function getForm($amount, $options) {  // при пополнении баланса
	  global $sql;
	  $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, 'webpay', $amount, NOW(), 'Пополнение баланса')");
    $this->inv_id = $sql->lastInsertId();
    $goods_description = array('name'=>array("Пополнение счёта на http://".$_SERVER['HTTP_HOST']),
                               'quantity' => array(1),
                               'money' => array($amount));
    $fields = $this->fill_fields($goods_description);
    $output = $this->constructHtml($fields);
    return $output;
	}

  public function getBuyForm($amount, $pct_id) {  // при покупке купона
    global $sql;
    $comments = 'Покупка купонов';
    $sql->exec("INSERT INTO pay_outcomming(payvariant, paycost, date, comments, pct_id) VALUES('webpay', $amount, NOW(), '$comments', $pct_id)");
    $this->inv_id = $sql->lastInsertId();
    $this->amount = $amount;
    $goods_description = array('name'=>array("Покупка купонов"),
                               'quantity' => array(1),
                               'money' => array($amount));
    $fields = $this->fill_fields($goods_description);
    $output = $this->constructHtml($fields);
    return $output;
  }


  protected function fill_fields($goods_description) {
    global $sql;
		$count_of_names = count($goods_description['name']);
		$count_of_quantity = count($goods_description['quantity']);
		$count_of_money = count($goods_description['money']);

		// Проверка на одинаковое количество элементов вложенных массивов
		if ($count_of_quantity == $count_of_money) {
			if($count_of_names == $count_of_quantity) {
				if($count_of_names == $count_of_money) {
					$count_of_items = $count_of_money;
				}
			} else {
				print('Массив товаров не корректен!');
				return;
			}
		} else {
			print('Массив товаров не корректен!');
			return;
		}

		// Случайная последовательность символов участвующих в формировании электронной подписи заказа
		$wsb_seed = time(); // Оставляем как есть

		// Название магазина, которое будет отображаться на форме оплаты.
		$wsb_store = $this->settings['wsb_store']; // Например BeInSport

		// Идентификатор магазина в системе WebPay
		$wsb_storeid = $this->settings['wsb_storeid']; // Например для BeInSport id = 195499955

		// Идентификатор заказа, присваиваемый магазином
		$wsb_order_num = $this->inv_id;

		// Идентификатор языка формы оплаты
		$wsb_language_id = 'russian'; // Возможные варианты: russian, english;

		/*
			Поле указывающие на проведение тестовой оплаты
			1 — производить тестовую оплату
			В тестовой среде Sandbox значение данного поля
			игнорируется
		*/
		$wsb_test = 1;	// Для боевой версии укажешь здесь 0

		// Версия формы оплаты
		$wsb_version = 2; // Оставь как есть.

		// Идентификатор валюты. Буквенный трехзначный код валюты согласно ISO4271
		$wsb_currency_id = 'BYR'; // Покуда все рассчетные операции у нас в Белоруских рублях. Оставляем.

		// URL адрес на который возвращается покупатель в случае успешной оплаты
		$wsb_return_url = 'http://'.$_SERVER['HTTP_HOST'].'/payments/payments-callback.php';

		// URL адрес на который возвращается покупатель в случае не успешной оплаты
		$wsb_cancel_return_url = 'http://'.$_SERVER['HTTP_HOST'].'/article/fail.html';

		/*
			Данный URL вызывается вне зависимости от того, был ли
			переход по URL в поле wsb_return_url или нет. Основное
			назначение это URL, это оповестить сайт о успешной
			оплате, в случае, если пользователь не нажал кнопку
			«Завершить» на форме оплаты.
		*/
		$wsb_notify_url = 'http://'.$_SERVER['HTTP_HOST'].'/payments/payments-callback.php';

		// Секретный ключ
		$secret_key = $this->settings['secret_key'];

		// Поле, значением которого является сумма налога, в белорусских рублях, добавляемая к общей сумме заказа
		$wsb_tax = 0;

		// Поле, значением которого является сумма доставки
		$wsb_shipping_price = 0;

		// Поле определяющие наименование(способа) доставки, например ты можешь здесь написать "Доставка курьером"
		$wsb_shipping_name = 'none'; // Если указанно значение 'none', то данное поле не включается в форму оплаты.

		// Поле названия скидки
		$wsb_discount_name = 'none';

		// Поле, значением которого является сумма скидки, в белорусских рублях, вычитаемая из общей суммы заказа
		$wsb_discount_price = 0;

		// Электронный адрес покупателя
    $wsb_email = $sql->getOne("email", "users where id='".$_SESSION['ID']."'"); // Аналогично, если 'none', тогда поле не включаем в форму оплаты.

		// Контактный телефон покупателя
		$wsb_phone = $sql->getOne("mobile", "users where id='".$_SESSION['ID']."'"); // Аналогично, если 'none', тогда не включаем в форму оплаты.

		// Внутренний уникальный идентификатор пластиковой карточки
		$wsb_icn = 'none'; // Аналогично, если 'none', тогда поле не включаем в форму оплаты.

		// Урезанный (триммированный) номер банковской карточки
		$wsb_card = 'none'; // Аналогично, если 'none', тогда поле не включаем в форму оплаты.

		// Заполнение названий, количества, стоимости товаров
		$wsb_invoice_item = array();
		// Наименование единицы товара
		$wsb_invoice_item['n'] = array();
		/*
			Количество единиц товара, целое число обозначающие,
			количество единиц товара каждого наименования
		*/
		$wsb_invoice_item['quantity'] = array();
		/*
			Цена единицы товара, целое число определяющее
			стоимость каждой единицы товара (указывается в
			белорусских рублях)
		*/
		$wsb_invoice_item['price'] = array();
		for($i = 0; $i < $count_of_items; $i++) {
			$wsb_invoice_item['n']['wsb_invoice_item_name['."$i".']' ] = $goods_description['name'][$i];
			$wsb_invoice_item['quantity']['wsb_invoice_item_quantity['."$i".']' ] = $goods_description['quantity'][$i];
			$wsb_invoice_item['price']['wsb_invoice_item_price['."$i".']' ] =  $goods_description['money'][$i];
		}

		/*
			Данное поле является вычисляемым. Значение этого поля
			является общей суммой оплаты заказа.
			Оплата не будет произведена, если wsb_total
			и посчитанное значения товаров не будут совпадать.
			Покупателю будет отображена ошибка.
			Cм. правила суммирования в мануале разработчика
		*/
		$wsb_total = $this->calculate_total_sum($goods_description, $wsb_tax, $wsb_shipping_price, $wsb_discount_price);

		// Подготовка к вычислению цифровой подписи
		$signature = array(
			'wsb_seed' => $wsb_seed,
			'wsb_storeid' => $wsb_storeid,
			'wsb_order_num' => $wsb_order_num,
			'wsb_test' => $wsb_test,
			'wsb_currency_id' => $wsb_currency_id,
			'wsb_total' => $wsb_total,
			'secret_key' => $secret_key,
		);
		/*
			Контрольное значение (электронная подпись) заказа
			результат выполнения функции sha1 (для версии 2. см.
			поле wsb_version), либо md5, если версия протокола не
			указана. Данное значение является hex-последовательностью
		*/
		$wsb_signature = $this->generate_signature($signature);

		$fields = array(
			// Поле не содержит значения и обозначает тип запроса
			'*scart' => '',
			'wsb_storeid' => $wsb_storeid,
			'wsb_store' => $wsb_store,
			'wsb_order_num' => $wsb_order_num,
			'wsb_currency_id' =>  $wsb_currency_id,
			'wsb_version' => $wsb_version,
			'wsb_language_id' => $wsb_language_id,
			'wsb_seed' => $wsb_seed,
			'wsb_signature' => $wsb_signature,
			'wsb_return_url' => $wsb_return_url,
			'wsb_cancel_return_url' => $wsb_cancel_return_url,
			'wsb_notify_url' => $wsb_notify_url,
			'wsb_test' => $wsb_test,
			'wsb_invoice_item' => $wsb_invoice_item,
			'wsb_tax' => "$wsb_tax",
			'wsb_shipping_name' => $wsb_shipping_name,
			'wsb_shipping_price' => "$wsb_shipping_price",
			'wsb_discount_name' => $wsb_discount_name,
			'wsb_discount_price' => "$wsb_discount_price",
			'wsb_total' => $wsb_total,
			'wsb_email' => $wsb_email,
			'wsb_phone' => $wsb_phone,
			'wsb_icn' => $wsb_icn,
			'wsb_card' => $wsb_card,
		);
		return $fields;
  }


  protected function calculate_total_sum($goods_description, $wsb_tax, $wsb_shipping_price, $wsb_discount_price) {
  	if(is_array($goods_description)) {
  		$totalSum = 0;
  		foreach($goods_description['quantity'] as $key => $quantity) {
  			$totalSum += $quantity * $goods_description['money'][$key];
  		}
  		$totalSum = $totalSum + $wsb_tax;
  		$totalSum = $totalSum - $wsb_shipping_price - $wsb_discount_price;
  		return $totalSum;
  	}
  }


  protected function generate_signature($signature) {
		$str = '';
		foreach($signature as $key => $value) {
			$str .= $value;
		}
		$wsb_signature = sha1($str);
		return $wsb_signature;
  }


	protected function constructHtml($fields) {
  	$form = '<form name="webpay" id="webpay" action="'.WEBPAY_URL.'" method="post">';
  	foreach($fields as $key => $value) {
  		if (($key != 'wsb_invoice_item') and ($value !== 'none'))
  		  $form .= '<input type="hidden" name="' .$key. '"' . ' value="' .$value .'">';
  		if ($key == 'wsb_invoice_item') {
  			$wsb_invoice_item = $value;
  			foreach($wsb_invoice_item['n'] as $key2 => $value2) {
  				$form .= '<input type="hidden" name="' .$key2. '"' . ' value="' .$value2 .'">';
  			}
  			foreach($wsb_invoice_item['quantity'] as $key2 => $value2) {
  				$form .= '<input type="hidden" name="' .$key2. '"' . ' value="' .$value2 .'">';
  			}
  			foreach($wsb_invoice_item['price'] as $key2 => $value2) {
  				$form .= '<input type="hidden" name="' .$key2. '"' . ' value="' .$value2 .'">';
  			}
  		}
  	}
  	$form .= '</form>';
  	$form .= '<a href="" onclick="document.forms[\'webpay\'].submit(); return false;"><img title="" alt="" src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
  	return $form;
	}


	public function process() {
	  global $sql;
	  $type_transaction = (isset($_REQUEST['transaction_id'])) ? 1 : 2;  // 1 - notify_url, 2 - return_url
    $tid = ($type_transaction==1) ? $_REQUEST['transaction_id'] : $_REQUEST['wsb_tid'];
    $response = $this->get_transaction($tid);
    if (empty($response))
      $this->errorPay($type_transaction, 'Empty response');
    else {
      $response_obj = simplexml_load_string($response);
      if (empty($response_obj))
        $this->errorPay($type_transaction, 'Response invalid');
      else {
        $payment_type = $response_obj->fields->payment_type;
        if (($payment_type!=1) and ($payment_type!=4))
          $this->errorPay($type_transaction, 'Order is not successful');
        else {
          $inv_id = ($type_transaction==1) ? $_REQUEST['site_order_id'] : $_REQUEST['wsb_order_num'];
          $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$inv_id");
          if ($pay_info['status']==1)
            $this->successPay($type_transaction);
          else {
            $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$inv_id");
            if (empty($pay_info['pct_id'])) {  // пополнение счёта
              $res = $sql->fetchOne("SELECT userid, paycost FROM pay_outcomming WHERE id=$inv_id");
              $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
              // и в журнал
              $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) VALUES(NOW(), {$pay_info['userid']}, {$pay_info['paycost']}, 'WebPay', '1');");
              $this->successPay($type_transaction);
            }
            else {  // оплата купонов
              $pct_info = $sql->fetchOne("SELECT * FROM pey_coupons_transactions WHERE id={$pay_info['pct_id']} AND tran_status=0");
              if (empty($pct_info))
                $this->errorPay($type_transaction, 'pey_coupons_transactions.id is invalid');
              else {
                Coupons::makeBuyOrder($pay_info['pct_id']);
                $this->successPay($type_transaction);
              }
            }
          }
        }
      }
    }
  }


  private function errorPay($type, $meesge) {
    if ($type==1)
      exit($meesge);
    else {
      header("Location: /article/fail.html");
      exit();
    }
  }

  private function successPay($type) {
    if ($type==1)
      header('HTTP/1.0 200 OK');
    else
      header("Location: /article/success.html");
    exit();
  }


  public function get_transaction($wsb_tid) {
    $postdata = '*API=&API_XML_REQUEST='.urlencode('
      <?xml version="1.0" encoding="ISO-8859-1" ?>
      <wsb_api_request>
        <command>get_transaction</command>
        <authorization>
          <username>'.$this->settings['webpay_name'].'</username>
          <password>'.md5($this->settings['webpay_pw']).'</password>
        </authorization>
        <fields>
          <transaction_id>'.$wsb_tid.'</transaction_id>
        </fields>
      </wsb_api_request>');
    $curl = curl_init(BILLING_URL);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
  }


	public function writelog($title, $data) {
  	$file = 'webpay.log';
  	$mode = (file_exists($file) && is_writeable($file)) ? "a" : "w";
  	$fp = @fopen($file, $mode);
  	fwrite($fp, $title.":\r\n");
  	if (is_array($data))
  		fwrite($fp, var_export($data, true)."\r\n");
  	else fwrite($fp, $data."\r\n");
  	fwrite($fp, "\r\n");
  	fclose($fp);
  }
}
?>
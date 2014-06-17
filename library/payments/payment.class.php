<?php
define('PAYMENT_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'payments');
define('PAYMENT_HOST', $_SERVER['SERVER_NAME']);

interface IPayment {
  /**
   * Класс, обязан генерировать форму, данные с которой будут передаваться напрямую сервису
   * платежной системы (скрытые поля, идентификатор магазина  и т.д.)
   *
   * @param $amount float сумма
   * @param $options array дополнительнае параметры
   * @return string html форма
   */
  public function getForm($amount, $options = array());
}

interface IPaymentCallback {
  /**
   * Метод вызывается при поступленни запроса от ПС/СМС сервиса.
   * Также может использоваться для инифиализации переменных запроса.
   * Должен возвратить булев, true - если будет использоваться этот
   * класс для обработки, false - для того чтобы передать вызов следующему
   * обработчику.
   *
   * @return boolean
   */
  public function isCallback();

  /**
   * Собственно обработка запроса. После выполнения этого метода - сценарий
   * обработки запроса останавливатся.
   *
   */
  public function process();
}


abstract class APayments {
  protected $payMethods = array();

  public function getPayMethods() {
    return $this->payMethods;
  }
}


class CPayment {
  protected $paymentDir;

  /**
   * Возвращает объект - который можно использовать для создания и заполнения форм
   * для платежныйх систем. Порядок покдлючения файлов следеющий:
   *  $method = 'default' (для примера)
   *
   *  1. Будет подключен файл payments/default.class.php -
   *     который должен содержать определение класс default
   *  2. (Необязательно), файл с конфигурационными переменными - payment/default.cfg.php
   *
   * @param $method имя метода
   * @return APayments
   */
  static public function getPayMethod($method) {
    $obj = null;
    if (file_exists(BASE_PATH."/payments/".$method."/".$method.".class.php")) {
      include(BASE_PATH."/payments/".$method."/".$method.".class.php");
      $obj = new $method;
      self::includeConfig($obj, $method);
    }

    if (!is_null($obj)) {
        return $obj;
    } else {
        throw new Exception('Не найден соответвующий класс обработки для выбранной платежной системы.');
    }
  }

  /**
   * Возвращает массив объетов со всеми доступными методами оплаты
   *
   * @return array
   */
  static public function getAllPayments() {
    $payments = array();
    $dir = opendir(BASE_PATH."/payments");
    while (($file=readdir($dir))!==false) {
      if ((strstr($file,'.')==false) and is_dir(BASE_PATH."/payments/".$file)) {
        $classname = $file;
        include(BASE_PATH."/payments/".$classname."/".$classname.".class.php");
        $obj = new $classname;
        self::includeConfig($obj, $classname);
        $payments[] = $obj;
      }
    }
    closedir($dir);
    return $payments;
  }

  static protected function includeConfig($obj, $classname) {
    $pay_settings = Settings::getSettingsByKey('payments');
    if (isset($pay_settings[$classname]))
      $obj->settings = $pay_settings[$classname];
  }
}
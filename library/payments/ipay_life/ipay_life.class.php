<?php
if( !defined('IPAY_LIFE_URL') )
define('IPAY_LIFE_URL', 'https://gate.besmart.by/ipaylife/!iSOU.Login');  // https://besmart.serveftp.net:4443/pls/ipay/!iSOU.Login - для тестов, https://gate.besmart.by/ipaylife/!iSOU.Login - реальный.

class ipay_life extends APayments implements IPayment, IPaymentCallback {
  public $pay_name = "IPay-life";
  public $settings = array();
  private $amount;
  private $inv_id;

  public function getForm($amount, $options=array()) {  // при пополнении баланса
    global $sql;
    $sql->exec("INSERT INTO pay_outcomming(userid, payvariant, paycost, date, comments) VALUES({$options['user_id']}, 'iPay-life', $amount, NOW(), 'Пополнение баланса')");
    $this->inv_id = $sql->lastInsertId();
    $this->amount = $amount;
    $output = $this->constructHtml();
    return $output;
  }


  public function getBuyForm($amount, $pct_id) {  // при покупке купона
    global $sql;
    $sql->exec("INSERT INTO pay_outcomming(payvariant, paycost, date, comments, pct_id) VALUES('iPay-life', $amount, NOW(), 'Покупка купонов', $pct_id)");
    $this->inv_id = $sql->lastInsertId();
    $this->amount = $amount;
    $output = $this->constructHtml();
    return $output;
  }

  protected function constructHtml() {
    return '
      <form name="ipay" action="'.IPAY_LIFE_URL.'" method="post" accept-charset="cp1251">
      <input type="hidden" name="srv_no" value="'.$this->settings['ipay_life_srvno'].'">
      <input type="hidden" name="pers_acc" value="'.$this->inv_id.'">
      <input type="hidden" name="amount" value="'.$this->amount.'">
      <input type="hidden" name="amount_editable" value="N">
      <input type="hidden" name="provider_url" value="'.BASE_URL.'">
      </form>
      <a href="" onclick="document.forms[\'ipay\'].submit(); return false;"><img src="/inc/templates/'.getCurrentTemplate().'/images/bye.png"></a>';
  }

  public function isCallback() {
//$_SERVER['HTTP_SERVICEPROVIDER_SIGNATURE'] = "SALT+MD5: 681B4F040405AA0A1D560CC14A096103";
    if (!isset($_POST['XML']) || !isset($_SERVER['HTTP_SERVICEPROVIDER_SIGNATURE']))
      return false;
    else
      return true;
  }

  public function process() {
    global $sql;
    $xml_string = str_replace("\r", "", stripslashes($_POST['XML']));
    if (strlen($xml_string) < 10)  // вообще есть ли хоть что нибудь в теле запроса - если нет - мы его обрабоать не можем
      exit("Некорректный запрос: $xml_string");

    if (stristr($_SERVER['HTTP_SERVICEPROVIDER_SIGNATURE'], md5($this->settings['ipay_mts_secretkey'].$xml_string)) != false)
      $secretkey = $this->settings['ipay_mts_secretkey'];
    elseif (stristr($_SERVER['HTTP_SERVICEPROVIDER_SIGNATURE'], md5($this->settings['ipay_life_secretkey'].$xml_string)) != false)
      $secretkey = $this->settings['ipay_life_secretkey'];
    else
      exit("Неверная контрольная сумма запроса");

    $this->request = simplexml_load_string($xml_string);
    if (! $this->request)
      exit("Ошибка входящих данных, невозможно прочитать XML-данные");

    $RequestType = (string)$this->request->RequestType;
    $pay_id = (integer)$this->request->PersonalAccount;
    $pay_info = $sql->fetchOne("SELECT * FROM pay_outcomming WHERE id=$pay_id");
    if (empty($pay_info)) {
      $response = '<?xml version="1.0" encoding="windows-1251" ?>'.
                  '<ServiceProvider_Response>'.
                    '<Error>'.
                      '<ErrorLine>Заказ номер '.$pay_id.' не существует. Начните оплату заново с сайта '.$_SERVER['SERVER_NAME'].'.</ErrorLine>'.
                    '</Error>'.
                  '</ServiceProvider_Response>';
    }
    elseif ((($RequestType=='ServiceInfo') or ($RequestType=='TransactionStart')) and ($pay_info['ipay_block']==1)) {
      $response = '<?xml version="1.0" encoding="windows-1251" ?>'.
                  '<ServiceProvider_Response>'.
                    '<Error>'.
                      '<ErrorLine>Заказ номер '.$pay_id.' находится в процессе оплаты</ErrorLine>'.
                    '</Error>'.
                  '</ServiceProvider_Response>';
    }
    elseif ($pay_info['status']==1) {
      $response = '<?xml version="1.0" encoding="windows-1251" ?>'.
                  '<ServiceProvider_Response>'.
                    '<Error>'.
                      '<ErrorLine>Заказ номер '.$pay_id.' уже оплачен</ErrorLine>'.
                    '</Error>'.
                  '</ServiceProvider_Response>';
    }
    elseif ($pay_info['status']==2) {
      $response = '<?xml version="1.0" encoding="windows-1251" ?>'.
                  '<ServiceProvider_Response>'.
                    '<Error>'.
                      '<ErrorLine>Заказ номер '.$pay_id.' отменён. Начните оплату заново с сайта '.$_SERVER['SERVER_NAME'].'.</ErrorLine>'.
                    '</Error>'.
                  '</ServiceProvider_Response>';
    }
    else {
      switch ($RequestType) {
        case 'ServiceInfo':
          $name = $sql->fetchOne('SELECT `name` FROM `users` WHERE id='.$pay_info['userid'], 'name');
          $response = '<?xml version="1.0" encoding="windows-1251" ?>'.
                      '<ServiceProvider_Response>'.
                        '<ServiceInfo>'.
                          '<Amount>'.
                            '<Debt>'.round($pay_info['paycost']).'</Debt>'.
                          '</Amount>'.
                          '<Name>'.
                            '<Surname>'.substr($name, 0, 30).'</Surname>'.
                          '</Name>'.
                          '<Info xml:space="preserve">'.
                            '<InfoLine>Заказ # '.$pay_id.'</InfoLine>'.
                          '</Info>'.
                        '</ServiceInfo>'.
                      '</ServiceProvider_Response>';
          break;
        case 'TransactionStart':
          $sql->exec("UPDATE pay_outcomming SET ipay_block=1 WHERE id=$pay_id");
          $response = '<?xml version="1.0" encoding="windows-1251" ?>'.
                      '<ServiceProvider_Response>'.
                        '<TransactionStart>'.
                          '<ServiceProvider_TrxId>'.$pay_id.'</ServiceProvider_TrxId>'.
                          '<Info xml:space="preserve">'.
                            '<InfoLine>'.$pay_info['comments'].'</InfoLine>'.
                          '</Info>'.
                        '</TransactionStart>'.
                      '</ServiceProvider_Response>';
          break;
        case 'TransactionResult':
          $sql->exec("UPDATE pay_outcomming SET ipay_block=0 WHERE id=$pay_id");
          if (isset($this->request->TransactionResult->ErrorText)) {
            $sql->exec("UPDATE `pay_outcomming` SET `status`=2 WHERE `id`=".$pay_id);
            $response = '<?xml version="1.0" encoding="windows-1251" ?>'.
                        '<ServiceProvider_Response>'.
                          '<TransactionResult>'.
                            '<Info xml:space="preserve">'.
                              '<InfoLine>Операция отменена</InfoLine>'.
                            '</Info>'.
                          '</TransactionResult>'.
                        '</ServiceProvider_Response>';
          }
          else {
            $sql->exec("UPDATE pay_outcomming SET status=1 WHERE id=$pay_id");
            if (empty($pay_info['pct_id'])) {  // пополнение счёта
              $sql->exec("UPDATE users SET balance=balance+{$pay_info['paycost']} WHERE id={$pay_info['userid']}");
              // и в журнал
              $sql->exec("INSERT INTO admin_pays(date, userid, paycost, payvar, paytype) VALUES(NOW(), {$pay_info['userid']}, {$pay_info['paycost']}, 'iPay', '1');");
            }
            else {  // оплата купонов
              $pct_info = $sql->fetchOne("SELECT * FROM pey_coupons_transactions WHERE id={$pay_info['pct_id']} AND tran_status=0");
              if (!empty($pct_info))
                Coupons::makeBuyOrder($pct_info['id']);
            }
            $response = '<?xml version="1.0" encoding="windows-1251" ?>'.
                        '<ServiceProvider_Response>'.
                          '<TransactionResult>'.
                            '<Info xml:space="preserve">'.
                              '<InfoLine>Спасибо!</InfoLine>'.
                            '</Info>'.
                          '</TransactionResult>'.
                        '</ServiceProvider_Response>';
          }
      }
    }
    $response = iconv("utf-8", "windows-1251", $response);
    $shop_sign = md5($secretkey.$response);
    header("ServiceProvider-Signature: SALT+MD5: $shop_sign");
    header('Content-type: text/xml; charset=windows-1251');
    echo $response;
  }


  public function getPSName() {}

  public function getPSDescription() {}

  public function writelog($title, $data) {
    $file = 'ipay.log';
    $mode = (file_exists($file) && is_writeable($file)) ? "a" : "w";
    $fp = @fopen($file, $mode);
    if ($fp) {
      fwrite($fp, $title.":\r\n");
      if (is_array($data))
          fwrite($fp, var_export($data, true)."\r\n");
      else fwrite($fp, $data."\r\n");
      fwrite($fp, "\r\n");
      fclose($fp);
    }
  }

}
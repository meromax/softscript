<?php
include_once ROOT . 'application/models/ContentManagerDb.php';
include_once ROOT . 'application/models/UsersDb.php';
include_once ROOT . 'application/models/LangDb.php';
include_once ROOT . 'application/models/OrdersDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Ajax_IndexController extends System_Controller_Action {
    
	protected $content;
	protected $user;
	protected $language;
    protected $orders;
	
    public function init() {
        parent::init();
        $this->content = new ContentManagerDb();
        $this->user = new UsersDb();
        $this->language = new LangDb();
        $this->orders = new OrdersDb();
    }

    public function setCountryPriceAction(){
        $country_id = $this->_getParam('country_id');
        $cd_count = $this->_getParam('cdcount');

        $country = $this->orders->getCountryById($country_id);

        if($country['symbol']=='$'){
            $amount_val = $country['symbol'].($country['price']*$cd_count);
            $dostavka =  $country['symbol'].$country['dostavka'];
            $total = $country['symbol'].($country['price']*$cd_count+$country['dostavka']);
        } else {
            $amount_val = ($country['price']*$cd_count)." ".$country['symbol'];
            $dostavka =  $country['dostavka']." ".$country['symbol'];
            $total = ($country['price']*$cd_count+$country['dostavka'])." ".$country['symbol'];
        }

        ob_clean();
        echo $amount_val."|".
             $dostavka."|".
             $total."|".
             $country['title']."|".
             $country['title_short'];

    }
    
    public function indexAction() {
        $email = $this->_getParam('email');
        $password = $this->_getParam('password');
        
        $error = 0;
        ob_start();
        if($this->user->checkEmail($email)&&$this->user->validateEmail($email)&&$this->user->checkPasswordWithEmail($email, $password)){
        	if(!$this->user->checkUserBlock($email)){
        		$error = -1;
        	} else {
        		$error = 1;
        	}
        }
        
        ob_clean();
        echo $error;
    }

    public function acceptOrderAction() {
        $order_id = $this->_getParam('order_id');
        $status   = $this->_getParam('status');

        $error = 1;
        ob_start();

        $this->orders->updateOrderStatus($order_id, $status);

        ob_clean();
        echo $error;
    }


    public function restorePasswordAction() {
        $email = $this->_getParam('restore_email');

        $error = 0;
        ob_start();
        if($this->user->validateEmail($email)){
        	if(!$this->user->checkEmail($email)){
        		$error = 1;
        	} else {
        		$error = 0;


                $password = $this->user->generatePassword();
                $this->user->updatePasswordByEmail($email, $password);
                //************************ E-mail to user **********************************

	            $emailTxt = new Zend_Config_Xml(ROOT.'configs/project/email.xml', 'email');

	            Zend_Loader::loadClass('Zend_Mail');    /** Loading Zend_Mail */
	            $mail = new Zend_Mail();
	            $mail -> addHeader('X-MailGenerator', $_SERVER['HTTP_HOST'].' mail machine');
	            $this->user->getUserDataByEmail($email);
	            $this -> smarty -> assign('user', $user = $this->user->getUserDataByEmail($email));
                $this -> smarty -> assign('password', $password);
	            $mailBody = $this -> smarty -> fetch('registration/restore_password.tpl');

	            $mail -> setBodyHtml($mailBody,'UTF-8');
	            $mail -> setFrom('no-reply@'.$_SERVER['HTTP_HOST'], 'no-reply@'.$_SERVER['HTTP_HOST']);
	            $mail -> addTo($email, $user['first_name']);
	            $subject = '=?UTF-8?B?'.base64_encode($this->frontendLangParams['TITLE__PASSWORD_RESTORE']).'?=';
	            $mail -> setSubject($subject);

	            /** Send email */
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	            $mail->send();



        	}
        } else {
            $error = 2;
        }

        ob_clean();
        echo $error;
    }
    
    public function checkBeforeRegisterAction(){
    	$error = '';
    	$name = $this->_getParam('reg_name');
    	$email = $this->_getParam('reg_email');
    	$password = $this->_getParam('reg_password');
    	$re_password = $this->_getParam('reg_re_password');
    	
    	if($name==''){
    		$error = $this->frontendLangParams['VALIDATION__ENTER_THE_NAME'];
    	} elseif($email=='' || !$this->user->validateEmail($email)){
    		$error = $this->frontendLangParams['VALIDATION__EMAIL_IS_NOT_CORRECT'];
    	} elseif($this->user->checkEmail($email)){
    		$error = $this->frontendLangParams['VALIDATION__EMAIL_EXIST'];
    	} elseif($password=='' || strlen($password)<3){
    		$error = $this->frontendLangParams['VALIDATION__PASSWEORD_NOT_LESS3_SYMBOL'];
    	} elseif($password!=$re_password){
    		$error = $this->frontendLangParams['VALIDATION__PASSWEORDS_NOT_MATCH'];
    	}
    	echo $error;
    }

    public function checkEmailAction(){
    	$error = '';
    	$name = $this->_getParam('order_user_name');
    	$email = $this->_getParam('order_user_email');

    	if($name==''){
    		$error = $this->frontendLangParams['VALIDATION__ENTER_THE_NAME'];
    	} elseif($email=='' || !$this->user->validateEmail($email)){
    		$error = $this->frontendLangParams['VALIDATION__EMAIL_IS_NOT_CORRECT'];
    	} elseif($this->user->checkEmail($email)){
    		$error = $this->frontendLangParams['VALIDATION__EMAIL_EXIST'];
    	}
    	echo $error;
    }

    public function getLanguagesByChoosedLangIdAction() {
        $languages_to = $this->language->getAllLanguagesWithoutChoosed(1);
        $this -> smarty -> assign('languages_to', $languages_to);
        if(sizeof($languages_to)>0){
        	echo $this -> smarty -> fetch('languages/languages_to.tpl');
        } else {
        	echo '';
        }
    }   
    
    public function saveProfileAction(){
        ob_start();
    	$data = $this->_getAllParams();
    	$error = "";
    	if($data['profile_name']==""){
    		$error = "Поле 'Ваше Имя' не должно быть пустым...";
    	} elseif($data['profile_current_password']!=""&&!$this->user->checkPasswordWithEmail($data['profile_email'], $data['profile_current_password'])){
    		$error = "Укажите правильно текущий пароль...";
    	} elseif(($data['profile_new_password']!=$data['profile_new_re_password'])&&$data['profile_new_password']!=""&&$data['profile_new_re_password']!=""){
    		$error = "Пароли не совпадают...";
    	} elseif(($data['profile_new_password']==$data['profile_new_re_password'])&&$data['profile_new_password']!=""&&$data['profile_new_re_password']!=""){
            if(strlen($data['profile_new_password'])<6){
                $error = "Пароль должен быть не меньше 6 символов...";
            } elseif(!$this->user->checkPasswordWithEmail($data['profile_email'], $data['profile_current_password'])) {
                $error = "Не верный пароль...";
            }
    	}
        if($error==""){
            $this->user->updateProfile($data, $this->userId);
            echo "1";
        } else {
            echo $error;
        }
    }
}
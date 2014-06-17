<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

/** Load database object model */
include_once ROOT . 'application/models/UsersDb.php';

include_once ROOT . 'application/models/AuthModel.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

include_once ROOT . 'application/models/UsersDb.php';

include_once ROOT . 'application/models/OrdersDb.php';

class Registration_IndexController extends System_Controller_Action
{
	private $Errors = array();
	
    /** Users Db object model */
    private $UserDB;
    /** Registration session handler */
    private $RegistrationNamespaces;
    
	private $ContentLang;

    private $orders;
	
	
    public function init()
    {
        parent::init();
        
    	if($this -> auth -> CheckAuth()){
        	$this->_redirect('/');
        }
        $this->RegistrationNamespace = new Zend_Session_Namespace('Registration');
        
        if(!isset($this->RegistrationNamespace -> registerTimelimit))
        $this->RegistrationNamespace -> registerTimelimit = 1;
        
        /** User have 15 minutes to complete registration process */
        $this->RegistrationNamespace -> setExpirationSeconds(900, 'registerTimelimit');
        
        /** Setting database `user` table model */
        $this -> UserDB = new UsersDb();
        
        $this->ContentLang = new ContentManagerDb();
        
        //$this->Member = new MemberDb();
        
    }

    public function indexAction() {

    }
    
    public function checkemailAction(){
    	ob_clean();
    	echo $this->UserDB->checkEmail2($this->_getParam('email'));
    }
    
    public function joinnowpageAction(){
//        print_r($this->_getAllParams());
//        die();
    	if($this->_hasParam('reg_post')&&$this->_getParam('reg_post')==1){
    		
	    	$error = '';
	    	$name = $this->_getParam('reg_name');
	    	$email = $this->_getParam('reg_email');
	    	$password = $this->_getParam('reg_password');
	    	$re_password = $this->_getParam('reg_re_password');
	    	
	    	if($name==''){
	    		$error = $this->frontendLangParams['VALIDATION__ENTER_THE_NAME'];
	    	} elseif($email=='' || !$this->UserDB->validateEmail($email)){
	    		$error = $this->frontendLangParams['VALIDATION__EMAIL_IS_NOT_CORRECT'];
	    	} elseif($this->UserDB->checkEmail($email)){
	    		$error = $this->frontendLangParams['VALIDATION__EMAIL_EXIST'];
	    	} elseif($password=='' || strlen($password)<3){
	    		$error = $this->frontendLangParams['VALIDATION__PASSWEORD_NOT_LESS3_SYMBOL'];
	    	} elseif($password!=$re_password){
	    		$error = $this->frontendLangParams['VALIDATION__PASSWEORDS_NOT_MATCH'];
	    	}


	    	if($error==''){   		

	    		$dataArray = $this->_getAllParams();
//                echo "<pre>";
//                print_r($dataArray);
//                die();
				$currUserId = $this->UserDB->simpleRegisterUser($dataArray);

				//************************ E-mail to user **********************************
				
	            $emailTxt = new Zend_Config_Xml(ROOT.'configs/project/email.xml', 'email');
	        
	            Zend_Loader::loadClass('Zend_Mail');    /** Loading Zend_Mail */
	            $mail = new Zend_Mail();
	            $mail -> addHeader('X-MailGenerator', $_SERVER['HTTP_HOST'].' mail machine');
	        
	            $this -> smarty -> assign('user', $dataArray);
	            $mailBody = $this -> smarty -> fetch('registration/reg_mail.tpl');
	        
	            $mail -> setBodyHtml($mailBody,'UTF-8');
	            $mail -> setFrom('no-reply@'.$_SERVER['HTTP_HOST'], 'no-reply@'.$_SERVER['HTTP_HOST']);
	            $mail -> addTo($dataArray['reg_email'], $dataArray['reg_name']);
	            $subject = '=?UTF-8?B?'.base64_encode("Регистрация на сайте ".$_SERVER['HTTP_HOST']).'?=';
	            $mail -> setSubject($subject);
	        
	            /** Send email */
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	            $mail->send();

				if(isset($_SESSION['order'])){

					$Auth = new Auth();

					$Auth->Authorize($dataArray['reg_email'], md5($dataArray['reg_password']));
                    $_SESSION['order']['user_id'] = $currUserId;
                    $this->orders = new OrdersDb();
                    $this->orders->addOrder($_SESSION['order']);
                    unset($_SESSION['order']);
                    $this->_redirect("/orders/page/1");
                    $this -> smarty -> assign('action', 'registration');
                    $this -> smarty -> assign('PageBody', 'registration/reg_complete_and_order.tpl');
                    $this -> smarty -> assign('meta_title', $this->frontendLangParams['TITLE__REGISTRATION_COMPLETED']);
                    $this -> smarty -> display('layouts/sub.tpl');
				} else {
                    $Auth = new Auth();
					$Auth->Authorize($dataArray['reg_email'], md5($dataArray['reg_password']));
					//$this->_redirect("/regcomplete.html");
                    $this->_redirect("/profile.html");
				}
				$this->_redirect("/profile.html");
	    	} else {
    			$this->_redirect("/joinnow.html");
    	   	}

    	} else {
		        $this -> smarty -> assign('PageBody', 'registration/join_form.tpl');
		        $this -> smarty -> assign('meta_title', $_SERVER['HTTP_HOST'].' - '.$this->frontendLangParams['TITLE__REGISTRATION']);
		        $this -> smarty -> display('layouts/sub.tpl');
	    }
    }

    public function joinnowpage2Action(){

    	if($this->_hasParam('reg_post')&&$this->_getParam('reg_post')==1){

	    	$error = '';
	    	$name = $this->_getParam('order_user_name');
	    	$email = $this->_getParam('order_user_email');
            $phone = $this->_getParam('order_user_phone');
            $tmp_pass = $this->UserDB->generatePassword();
	    	$password = $tmp_pass;
	    	$re_password = $tmp_pass;
            
            $dataArray = $this->_getAllParams();
       	    $dataArray['reg_name']     = $name;
            $dataArray['reg_email']    = $email;
            $dataArray['reg_password'] = $password;

            if($phone!=''){
                $dataArray['reg_phone'] = $phone;
            }




	    	if($name==''){
	    		$error = $this->frontendLangParams['VALIDATION__ENTER_THE_NAME'];
	    	} elseif($email=='' || !$this->UserDB->validateEmail($email)){
	    		$error = $this->frontendLangParams['VALIDATION__EMAIL_IS_NOT_CORRECT'];
	    	} elseif($this->UserDB->checkEmail($email)){
	    		$error = $this->frontendLangParams['VALIDATION__EMAIL_EXIST'];
	    	} elseif($password=='' || strlen($password)<3){
	    		$error = $this->frontendLangParams['VALIDATION__PASSWEORD_NOT_LESS3_SYMBOL'];
	    	} elseif($password!=$re_password){
	    		$error = $this->frontendLangParams['VALIDATION__PASSWEORDS_NOT_MATCH'];
	    	}


	    	if($error==''){


				$currUserId = $this->UserDB->simpleRegisterUser($dataArray);

				//************************ E-mail to user **********************************

	            $emailTxt = new Zend_Config_Xml(ROOT.'configs/project/email.xml', 'email');

	            Zend_Loader::loadClass('Zend_Mail');    /** Loading Zend_Mail */
	            $mail = new Zend_Mail();
	            $mail -> addHeader('X-MailGenerator', $_SERVER['HTTP_HOST'].' mail machine');

	            $this -> smarty -> assign('user', $dataArray);
	            $mailBody = $this -> smarty -> fetch('registration/reg_mail.tpl');

	            $mail -> setBodyHtml($mailBody,'UTF-8');
	            $mail -> setFrom('no-reply@'.$_SERVER['HTTP_HOST'], 'no-reply@'.$_SERVER['HTTP_HOST']);
	            $mail -> addTo($dataArray['reg_email'], $dataArray['reg_name']);
	            $subject = '=?UTF-8?B?'.base64_encode($this->frontendLangParams['TITLE__REGISTRATION_ON_SITE']).'?=';
	            $mail -> setSubject($subject);

	            /** Send email */
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	            $mail->send();

				if(isset($_SESSION['order'])){

					$Auth = new Auth();

					$Auth->Authorize($dataArray['reg_email'], md5($dataArray['reg_password']));
                    $_SESSION['order']['user_id'] = $currUserId;
                    $this->orders = new OrdersDb();
                    $this->orders->addOrder($_SESSION['order']);
                    unset($_SESSION['order']);

                    $this -> smarty -> assign('action', 'registration');
                    $this -> smarty -> assign('PageBody', 'registration/reg_complete_and_order.tpl');
                    $this -> smarty -> assign('meta_title', $this->frontendLangParams['TITLE__REGISTRATION_COMPLETED']);
                    $this -> smarty -> display('layouts/sub.tpl');
                    $this->_redirect("/orders/page/1");
				} else {
                    $this->_redirect("/profile.html");
					//$this->_redirect("/regcomplete.html");

				}
				//$this->_redirect("/regcomplete.html");


	    	} else {
    			//$this->_redirect("/");
    	   	}

    	} else {
		        $this -> smarty -> assign('PageBody', 'registration/join_form.tpl');
		        $this -> smarty -> assign('meta_title', $_SERVER['HTTP_HOST'].' - '.$this->frontendLangParams['TITLE__REGISTRATION']);
		        $this -> smarty -> display('layouts/sub.tpl');
	    }
    }

	public function mail_utf8($to, $subject = '(No subject)', $message = '', $from) { 
	  $header = 'MIME-Version: 1.0' . "\n" . 'Content-type: text/plain; charset=UTF-8' 
	    . "\n" . 'From: Yourname <' . $from . ">\n"; 
	  mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header); 
	} 
	
	/**
	 * Registration complete action
	 *
	 */
    public function regcompleteAction(){
    	$this -> smarty -> assign('action', 'registration');
        $this -> smarty -> assign('PageBody', 'registration/reg_complete.tpl');
    	$this -> smarty -> assign('meta_title', $this->frontendLangParams['TITLE__REGISTRATION_COMPLETED']);
    	$this -> smarty -> display('layouts/sub.tpl');
    }

}
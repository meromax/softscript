<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

/** Load database object model */
include_once ROOT . 'application/models/UsersDb.php';

/** Load database object model */
include_once ROOT . 'application/models/AuthModel.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

class Login_IndexController extends System_Controller_Action
{
    private $table;
    private $User;
    
    private $Errors = array();

    public function indexAction()
    {
    	
        if($this -> auth -> CheckAuth()){
        	$this->_redirect('/profile.html');
        } elseif($this -> _request -> getParam('retrieve_pass')) {
            $this -> _forward('index', 'Lostpassword', 'login');
        } elseif($this -> _request -> getParam('login_email') && $this -> _request -> getParam('login_password')) {
            $this -> _forward('auth');
        } else {
			$_SESSION['error_login'] = "Incorrect email or password!";
			$this->_redirect("/");
        }
    }
    
    public function loginpageAction(){
		if(!isset($_SESSION['loginNamespace'])){
	    	if(isset($_SESSION['error_login'])){
	    		$this -> smarty -> assign('error_login',$_SESSION['error_login']);
	    		unset($_SESSION['error_login']);
	    	}
			$this -> smarty -> assign('PageBody', 'login/login_form.tpl');
	    	$this -> smarty -> assign('Title', 'Login page');
	    	$this -> smarty -> display('layouts/main.tpl');
		} else {
			$this->_redirect('/profile.html');
		}
    }
    
    public function authAction() {

        $email = $this -> _request -> getParam('login_email');
        $password = md5($this -> _request -> getParam('login_password'));

        $Auth = new Auth();

        if($Auth -> Authorize($email, $password)) {
        	if($Auth->GetAuthInfo()->active==0){
        		$Auth->Logout();
	            $_SESSION['error_login'] = "Incorrect email or password!";
				$this->_redirect("/loginpage.html");
        	}
        	$this->User = new UsersDb();
        	$userdata = $this->User->getUserDataByEmail($email);
        	if(isset($_SESSION['reg_complete'])){
        		unset($_SESSION['reg_complete']);
	    		if($userdata->member_type==1){
					//$this -> _redirect('/myaccount.html');
					$this -> _redirect('/');
	    		} else {
	    			//$this -> _redirect('/myaccount.html');
	    			$this -> _redirect('/');
	    		}
        	} else {
        		//$this -> _redirect('/myaccount.html');
        		$this -> _redirect('/profile.html');
        	}
        	
        	/** check confirmed_falg */ 
        	
        	if($userdata->active==1) {
	        	if(isset($_SESSION['reg_complete'])){
	        		unset($_SESSION['reg_complete']);
	        		if($userdata->member_type==1){
	        			$this -> _redirect('/myaccount.html');
	        		} else {
	        			$this -> _redirect('/myaccount.html');
	        		}
	        	} else {
	        		$this -> _redirect('/myaccount.html');
	        	}
	            
        	} else {
        		$Err = new Zend_Config_Xml(ROOT . 'configs/error_messages/messages.xml', 'errors');
        		$msg[] = "You have been sent a confirmation email. You must click the link in the email to login.";
	            /** Preparing warning block */
	            $this -> smarty -> assign('WarnTitle', $Err -> error_block_title);
	            $this -> smarty -> assign('WarnMessages', $msg);
	            $errBlock = $this -> smarty -> fetch('warningBlock.tpl');
	            
	            /** Output */
	            $this -> smarty -> assign('PageBody', 'login/login.tpl');
	            $this -> smarty -> assign('warningBlock', $errBlock);
	            $this -> smarty -> assign('Title', 'Login Please');
	            $this -> smarty -> display('layouts/main.tpl');
	            $Auth->Logout();
	            $_SESSION['error_login'] = "Incorrect email or password or you forgot to activate your accout!";
				$this->_redirect("/loginpage.html");
        	}
        }
        else
        {
        	
	            $_SESSION['error_login'] = "Incorrect email or password!";
				$this->_redirect("/loginpage.html");
        }
    }
    
    public function wrongloginAction(){
    	unset($_SESSION['email'], $_SESSION['security_question']);
		$this -> smarty -> assign('PageBody', 'login/incorrect_login.tpl');
        $this -> smarty -> assign('Title', 'Login Please');
        $this -> smarty -> display('layouts/main.tpl');
    }
    
    public function notactiveAction(){
		$this -> smarty -> assign('PageBody', 'login/not_active_account.tpl');
    	$this -> smarty -> assign('Title', 'Your accout is not activated or blocked!');
    	$this -> smarty -> display('layouts/main.tpl');
    }
    
    public function forgotpassAction(){
    	$email = $this->_getParam("email");
    	$this -> Errors= array();
    	if(!$this -> _getParam('check_button_press')){
    		
			$title = $this -> Content -> getPageByLink('_PasswordRecovery');
			$TopMainInformation ="<span style='font-size:18px; color:#0172ba;'>&nbsp;&nbsp;".$title['title']."</span>";
			$this -> smarty -> assign('TopMainInformation', $TopMainInformation);
			$this -> smarty -> assign('PageBody', 'login/forgot_email.tpl');
	        $this -> smarty -> assign('Title', 'Login Please');
	        $this -> smarty -> display('layouts/main.tpl');
    	} else {
    		
			$Err = new Zend_Config_Xml(ROOT . 'configs/error_messages/messages.xml', 'errors');
			
		
	        Zend_Loader::loadClass('Zend_Validate');
	        Zend_Loader::loadClass('Zend_Validate_StringLength');
	        Zend_Loader::loadClass('Zend_Validate_Alnum');
	        Zend_Loader::loadClass('Zend_Validate_Alpha');
	        Zend_Loader::loadClass('Zend_Validate_Digits');
	        Zend_Loader::loadClass('Zend_Validate_EmailAddress');
			
			$this -> User = new Users();
	        $emailChain = new Zend_Validate();
	        $emailChain -> addValidator(new Zend_Validate_EmailAddress());
	        
	        /** MX checking for email */
	
	        $result = $this -> User -> checkEmail($email);
	        
	        //print_r($check); die();
	        if(!$emailChain -> isValid($email)){
	            $error = $this -> Content -> getPageByLink('_Error_Invalid_Email');
	            $this -> Errors[] = $error['title'];
	            $_SESSION['error_email']=1;
	        } else {
	        	$check = $this -> User -> checkMemberQuestionByEmail($email); 
	        	//print_r($check); 
				if(!intval($check)){
		            $error = $this -> Content -> getPageByLink('_Error_Exist_Email');
		            $this -> Errors[] = $error['title'];
				}
				$_SESSION['error_email']=1;
	        }
	        
	        /** ------------- Validate spam code ------------- */
	        $code = $this -> request -> getParam('code');
	        $epasswordChain = new Zend_Validate();
	        $epasswordChain -> addValidator(new Zend_Validate_StringLength(6, 40))
	                        -> addValidator(new Zend_Validate_Alnum(true));
	        
	        if($_SESSION['confirm_code']!=$code)
	        {
	            //$this -> Errors[] = $Err -> invalid_spamcode;
	            $error = $this -> Content -> getPageByLink('_Error_Invalid_Spamcode');
	            $this -> Errors[] = $error['title'];
	            $_SESSION['error_code']=1;
	        } 
	        
			if(sizeof($this->Errors)!=0){
				unset($_SESSION['errors']);
				$_SESSION['errors'] = implode("<br />",$this -> Errors);
				$this->_redirect('/login/forgotpassemail');
			} else {
				$password = $this -> User -> generatePassword();
				$this -> User -> updatePasswordByEmail($email, $password);
				$this-> _redirect('/login/recoverycompleted');
			}

    	}
    }
    
    public function forgotpassemailAction(){

			if(isset($_SESSION['errors'])){
    			$this -> smarty -> assign('msg', $_SESSION['errors']);
    			unset($_SESSION['errors']);
    		}
    		

			if(isset($_SESSION['error_email'])){
    			$this -> smarty -> assign('error_email', $_SESSION['error_email']);
    			unset($_SESSION['error_email']);
    		}
    		

			if(isset($_SESSION['error_code'])){
    			$this -> smarty -> assign('error_code', $_SESSION['error_code']);
    			unset($_SESSION['error_code']);
    		}

			$title = $this -> Content -> getPageByLink('_PasswordRecovery');
			$TopMainInformation ="<span style='font-size:18px; color:#0172ba;'>&nbsp;&nbsp;".$title['title']."</span>";
			$this -> smarty -> assign('TopMainInformation', $TopMainInformation);
			$this -> smarty -> assign('PageBody', 'login/forgot_email.tpl');
	        $this -> smarty -> assign('Title', 'Login Please');
	        $this -> smarty -> display('layouts/main.tpl');
    }
    
    
    
    
    public function answerAction(){

    	$Errors = "";
    	$this -> User = new Users();
    	
    	
    	if(!$this -> _getParam('check_button_press')){
    		if(isset($_SESSION['errors'])){
    			$this -> smarty -> assign('msg', $_SESSION['errors']);
    			unset($_SESSION['errors']);
    		}
			$this -> smarty -> assign('email', $_SESSION['email']);
			$this -> smarty -> assign('question', $_SESSION['security_question']);
			$this -> smarty -> assign('PageBody', 'login/forgot_secret_answer.tpl');
	    	$this -> smarty -> assign('Title', 'Login Please');
	    	$this -> smarty -> display('layouts/main.tpl');
    	} else {
    		
    		if($this-> User -> checkAnswer($this -> _getParam('security_answer'))==1){
    		$new_password = $this-> User -> generatePassword();
    		$this -> User -> updatePasswordByEmail($_SESSION['email'], $new_password);
			//******************************EMAIL******************************************
	        Zend_Loader::loadClass('Zend_Mail');    /** Loading Zend_Mail */
	        $mail = new Zend_Mail();
	        
	        /** Preparing mail body */
	        $this -> smarty -> assign('email',     $_SESSION['email']);
	        $this -> smarty -> assign('password',  $new_password);
	        $mailBody = $this -> smarty -> fetch('login/mail.tpl');
	        /** ------------------- */
	        
	        $mail -> setBodyHtml($mailBody);
	        $mail -> setFrom("admin@lenders.com", "Administrator");
	        $mail -> addTo($_SESSION['email'],$_SESSION['email']);
	        $mail -> setSubject("New password!");
	        
	        /** Send email */
	        $mail->send();
			//******************************END EMAIL***************************************
    			$this-> _redirect('/login/answersuccess');
    		} else {
    			$_SESSION['errors'] = "Wrong security answer";
    			$this-> _redirect('/login/answer');
    		}
    	}
    }
    
    public function recoverycompletedAction(){
		$title = $this -> Content -> getPageByLink('_PasswordRecoveryCompletedHeader');
		$TopMainInformation ="<span style='font-size:18px; color:#0172ba;'>&nbsp;&nbsp;".$title['title']."</span>";
		$this -> smarty -> assign('TopMainInformation', $TopMainInformation);
		$this -> smarty -> assign('PageBody', 'login/password_recovery_completed.tpl');
    	$this -> smarty -> assign('Title', 'Password recovery completed!');
    	$this -> smarty -> display('layouts/main.tpl');
    }
    
    public function showCaptionAction()
    {
		$im=imagecreatefromjpeg('library/caption/image2.jpg');
		$color = imagecolorallocate($im, 108, 108, 108);
		$str=rand(10000,99999);
		$_SESSION['confirm_code']=$str;
		$this->RegistrationNamespace->confirm_code = $str;// = new Zend_Session_Namespace('Registration');
		imagettftext ($im, rand(24,26), 0, 1, 30, $color, "library/caption/CANDYBT.ttf", $str);
		imagejpeg($im);
		imagedestroy ($im);
    }
    
    public function logoutAction()
    {
        $this -> auth -> Logout();
        $this -> _redirect('/');
    }
}
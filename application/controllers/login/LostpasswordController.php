<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

/** Load database object model */
include_once ROOT . 'application/models/UsersDb.php';

class Login_LostPasswordController extends System_Controller_Action
{

    private $UserDB;
    
    private $Errors;

    public function init()
    {
        parent::init();
        $this -> UserDB = new UsersDb();
    }
    
    public function forgotpasswordAction(){
    	$this -> smarty -> assign('message', '<span style="color:#007700; font-size:12px;">Please enter your email and click submit.<br />After that, you will be sent a new password to access your account!</span>');
		$this -> smarty -> assign('PageBody', 'login/forgotpassword_form.tpl');
		$this -> smarty -> assign('Title', 'Password Retrival! Email has been sent.');
		$this -> smarty -> display('layouts/main.tpl');
    }
    
    public function changepassword2Action(){
    	$email = $this->_getParam('forgotpassword_email');
    	if($this->UserDB->checkEmail($email)){
           /** Send email with instructions */
            $emailTxt = new Zend_Config_Xml(ROOT . 'configs/project/email.xml', 'lost_password');

            Zend_Loader::loadClass('Zend_Mail');    /** Loading Zend_Mail */
            $mail = new Zend_Mail();
            $mail -> addHeader('X-MailGenerator', $emailTxt -> email_generator);

            /** Preparing mail body */
            $password = $this->UserDB->generatePassword(8);
            $this -> smarty -> assign('email', $email);
            $this -> smarty -> assign('password', $password);
            $mailBody = $this -> smarty -> fetch('login/forgot_password_mail.tpl');

            $mail -> setBodyHtml($mailBody, 'UTF-8');
            $mail -> setFrom('support@'.$_SERVER['HTTP_HOST'], '=?UTF-8?B?'.base64_encode("Служба поддержки").'?=');
            $mail -> addTo($email, $email);

            $subject = '=?UTF-8?B?'.base64_encode("Новый пароль к вашему личному кабинету на сайте http://".$_SERVER['HTTP_HOST']).'?=';

            $mail -> setSubject($subject);

            /** Send email */
            $mail->send();

            $this->UserDB->updatePasswordByEmail($email, $password);
            $this->_redirect("/rcomplete.html");
    	}
    }
    
    public function rpasswordcompleteAction(){
		$this -> smarty -> assign('PageBody', 'login/forgotpassword_success.tpl');
		$this -> smarty -> assign('Title', 'Password recovery complete.');
		$this -> smarty -> display('layouts/main.tpl');
    }
    
    public function checkemailAction(){
    	ob_clean();
    	echo $this->UserDB->checkEmail($this->_getParam('email'));
    }

    public function indexAction()
    {
    	//echo "asd"; die();
        $email = trim($this -> _request -> getParam('email'));
        $check = $this -> UserDB -> changePasswordCheckEmail($email);
        if($check != 0)
        {
        	echo "test";
            /** Generating activation key */
            require_once(ROOT . 'backend/security/ActivationKey.php');
            $generator = new ActivationKey();
            $key = substr($generator -> generate(),0,8);
            
            $id = $check['member_id'];
            
            /** Update password change key */
            $this -> UserDB -> updatePasswordChangeKey($key, $id);
            
            /** Send email with instructions */
            $emailTxt = new Zend_Config_Xml(ROOT . 'configs/project/email.xml', 'lost_password');

            Zend_Loader::loadClass('Zend_Mail');    /** Loading Zend_Mail */
            $mail = new Zend_Mail();
            $mail -> addHeader('X-MailGenerator', $emailTxt -> email_generator);

            /** Preparing mail body */
            $this -> smarty -> assign('vkey', $key);
            $this -> smarty -> assign('host', $_SERVER['HTTP_HOST']);
            $mailBody = $this -> smarty -> fetch('login/lost_password_mail.tpl');

            $mail -> setBodyHtml($mailBody);
            $mail -> setFrom($emailTxt -> from_email, $emailTxt -> from_name);
            $mail -> addTo($check['email'], $check['email']);
            $mail -> setSubject($emailTxt -> email_title);

            /** Send email */
            $mail->send();
            
            /** Print message to user that Password Change email was sent */
            $this -> smarty -> assign('PageBody', 'login/change_password_mail_sent.tpl');
            $this -> smarty -> assign('Title', 'Password Retrival! Email has been sent.');
            $this -> smarty -> display('layouts/main.tpl');
        }
        else
        {
        	echo "sdf";
            $Err = new Zend_Config_Xml(ROOT . 'configs/error_messages/messages.xml', 'errors');
            
            $msg = array($Err -> password_recovery_email_incorrect);
            
            /** Preparing warning block */
            $this -> smarty -> assign('WarnTitle', $Err -> error_block_title);
            $this -> smarty -> assign('WarnMessages', $msg);
            $errBlock = $this -> smarty -> fetch('warningBlock.tpl');
            
            /** Output */
            $this -> smarty -> assign('PageBody', 'login/login.tpl');
            $this -> smarty -> assign('warningBlock', $errBlock);
            $this -> smarty -> assign('Title', $Err -> password_recovery_email_incorrect);
            $this -> smarty -> display('layouts/main.tpl');
        }
    }
    
    public function changePasswordAction()
    {
        $key = $this -> _request -> getParam('change_pass_code');
        
        $check = $this -> UserDB -> changePasswordCheckPasswordChangeKey($key);
        //print_r($check);
        if($check != 0)
        {
            $ChangePasswordNamespace = new Zend_Session_Namespace('ChangePassword');
            $ChangePasswordNamespace -> userid = $check['member_id'];
            
            /** If user submit form to Change Password */
            if($this -> _request -> getParam('change_password_ok'))
            {
                /** Getting passwords */
                $password = $this -> _request -> getParam('password');
                $re_password = $this -> _request -> getParam('re_password');
                
                /** Load error config */
                $Err = new Zend_Config_Xml(ROOT . 'configs/error_messages/messages.xml', 'errors');
                
                /** Load validator */
                Zend_Loader::loadClass('Zend_Validate');
                Zend_Loader::loadClass('Zend_Validate_StringLength');
                Zend_Loader::loadClass('Zend_Validate_Alnum');
                
                /** ------------- Validate password ------------- */
                $passwordChain = new Zend_Validate();
                $passwordChain -> addValidator(new Zend_Validate_StringLength(6, 40))
                               -> addValidator(new Zend_Validate_Alnum(true));
                
                if(!$passwordChain -> isValid($password))
                {
                    $this -> Errors[] = $Err -> invalid_password;
                }
                
                else
                {
                    if($password != $re_password) $this -> Errors[] = $Err -> passwords_mismatch;
                }
                
                /** ------------- If validation is over ------------- */
                if(count($this -> Errors) != 0)
                {
                    /** Preparing warning block */
                    $this -> smarty -> assign('WarnTitle', $Err -> error_block_title);
                    $this -> smarty -> assign('WarnMessages', $this -> Errors);
                    $errBlock = $this -> smarty -> fetch('warningBlock.tpl');
                    
                    $this -> smarty -> assign('warningBlock', $errBlock);
                    $this -> smarty -> assign('PageBody', 'login/change_password.tpl');
                    $this -> smarty -> assign('Title', 'Password Change form');
                    $this -> smarty -> assign('username', $check['email']);
                    $this -> smarty -> display('layouts/main.tpl');
                }
                
                /** If no Errors found during validation */
                else
                {
                    /** Change Password session namespace */
                    $ChangePasswordNamespace = new Zend_Session_Namespace('ChangePassword');
                    $id = $ChangePasswordNamespace -> userid;
                    
                    /** Remove Password Change key to close Change Password process */
                    $this -> UserDB -> removePasswordChangeKey($id);
                    /** Update to a new user password */
                    $this -> UserDB -> updateUserPassword($id, sha1($password));
                    
                    /** Send confirmation email that password have been changed */
                    $emailTxt = new Zend_Config_Xml(ROOT . 'configs/project/email.xml', 'lost_password');
        
                    Zend_Loader::loadClass('Zend_Mail');    /** Loading Zend_Mail */
                    $mail = new Zend_Mail();
                    $mail -> addHeader('X-MailGenerator', $emailTxt -> email_generator);
        
                    /** Preparing mail body */
                    $this -> smarty -> assign('username', $check['email']);
                    $this -> smarty -> assign('password', $password);
                    $mailBody = $this -> smarty -> fetch('login/password_changed_mail.tpl');
        
                    $mail -> setBodyHtml($mailBody);
                    $mail -> setFrom($emailTxt -> from_email, $emailTxt -> from_name);
                    $mail -> addTo($check['email'], $check['email']);
                    $mail -> setSubject($emailTxt -> password_changed_email_title);
        
                    /** Send email */
                    $mail->send();
                    
                    /** Print success message */
                    $this -> smarty -> assign('PageBody', 'login/change_password_success.tpl');
                    $this -> smarty -> assign('Title', 'Password have changed successfuly');
                    $this -> smarty -> display('layouts/main.tpl');
                }
            }
            
            else
            {
                $this -> smarty -> assign('PageBody', 'login/change_password.tpl');
                $this -> smarty -> assign('Title', 'Password Change form');
                $this -> smarty -> assign('username', $check['email']);
                $this -> smarty -> display('layouts/main.tpl');
            }
        }
        
        else
        {
            $this -> smarty -> assign('PageBody', 'login/change_password_error.tpl');
            $this -> smarty -> assign('Title', 'Password Change Failed!');
            $this -> smarty -> display('layouts/main.tpl');
        }
    }
}
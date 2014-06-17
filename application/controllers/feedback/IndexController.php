<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

include_once ROOT . 'application/models/ContentManagerDb.php';
include_once ROOT . 'application/models/UsersDb.php';


class Feedback_IndexController extends System_Controller_Action
{
	protected $content;
    public $user;
    public function init() {
        parent::init();
        $this->content = new ContentManagerDb();
        $this -> user = new UsersDb();
        $this->smarty->assign('menuActive', 'feedback');
    }
    
    public function indexAction() {

        $this->smarty->assign('current_menu', "feedback");
        $this->smarty->assign('day_num', date("w"));

        if(isset($_SESSION['loginNamespace'])){
            $this -> smarty -> assign('userData', $this->user->getUserById($this->userId));
        }


        $item = $this->content->getPageByLink("contacts.html", $this->lang_id);
        $this -> smarty -> assign('feedbackText', $item['text']);
        $this -> smarty -> assign('PageBody', 'feedback/index.tpl');
        $this -> smarty -> assign('Title', 'Обратная связь');
        $this -> smarty -> display('layouts/main.tpl');
    }
    
    public function doAction() {
    	
    	$params = $this->_getAllParams();
        $static_settings = $this->static_settings->getSettingsById(1);
    	$email_to = $static_settings->settings_email1;

        //$email_to = "boncevicha@gmail.com";

        Zend_Loader::loadClass('Zend_Mail');    /** Loading Zend_Mail */
        $mail = new Zend_Mail();
        $mail -> addHeader('X-MailGenerator', "Mail machine");
        
        $from = trim(strip_tags($params['email']));
        $fname= trim(strip_tags($params['name']));
        $message = $params['message'];
        //echo $email_to; die();
        //print_r($params); die();
        /** Preparing mail body */
        $this -> smarty -> assign('name', $fname);
        $this -> smarty -> assign('email', $params['email']);
        $this -> smarty -> assign('message', $message);
        $mailBody = $this -> smarty -> fetch('feedback/mail.tpl');
        /** ------------------- */
        $mail -> setBodyHtml($mailBody, 'UTF-8');
        $from2 = "=?utf-8?b?" . base64_encode($fname). "?=";
        $mail -> setFrom($from, $from2);
        $mail -> addTo($email_to, $email_to);
        $title = "Сообщение от возможно потенциального клиента http://".$_SERVER['HTTP_HOST']."";
	    $subject = "=?utf-8?b?" . base64_encode($title) . "?=";
        $mail -> setSubject($subject);
        
        /** Send email */
        $mail->send();
        $_SESSION['msg'] = "<span style='color:green;'>Email successfully sent!</span>";
    	$this->_redirect('/message-sent.html');
    }
    
    public function sentAction() {
    	if(isset($_SESSION['msg'])&&$_SESSION['msg']!=""){
    		unset($_SESSION['msg']);
            $this -> smarty -> assign('feedbackComplete', $this->content->getPageByLink("message-sent.html", $this->lang_id));
	        $this -> smarty -> assign('PageBody', 'feedback/complete.tpl');
	        $this -> smarty -> assign('Title', 'Contacts');
	        $this -> smarty -> display('layouts/sub.tpl');
    	} else {
    		$this->_redirect('/feedback.html');
    	}
    }
}
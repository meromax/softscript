<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

include_once ROOT . 'application/models/ContentManagerDb.php';
include_once ROOT . 'application/models/SettingsDb.php';

class Contact_IndexController extends System_Controller_Action 
{
	protected $content;
    public $settings;
    public function init() {
        parent::init();
        $this->content = new ContentManagerDb();
        $this->settings = new SettingsDb();
    }
    
    public function indexAction() {

    }
    
    public function orderOnlineAction(){
        $this -> smarty -> assign('item',  $item = $this->Content->getPageByLink("order-online", $this->lang_id));
        $this -> smarty -> assign('meta_title', $item['meta_title']);
        $this -> smarty -> assign('meta_keywords', $item['meta_keywords']);
        $this -> smarty -> assign('meta_description', $item['meta_description']);

        $this -> smarty -> assign('PageBody', 'contact/index.tpl');
        $this -> smarty -> display('layouts/sub.tpl');
    }

    public function sendAction() {
        $settings = $this -> settings -> getSettingsById($this->lang_id);

        $params = $this->_getAllParams();
        $email_to = $settings->settings_email2;

        Zend_Loader::loadClass('Zend_Mail');    /** Loading Zend_Mail */
        $mail = new Zend_Mail();
        $mail -> addHeader('X-MailGenerator', "mail machine");

        $email   = trim(strip_tags($params['email']));
        $name    = trim(strip_tags($params['name']));
        $phone   = trim(strip_tags($params['phone']));
        $message = trim(strip_tags($params['message']));
        $message = str_replace(chr(13),'<br>',$message);

        /** Preparing mail body */
        $this -> smarty -> assign('name', $name);
        $this -> smarty -> assign('email', $email);
        $this -> smarty -> assign('phone', $phone);
        $this -> smarty -> assign('message', $message);
        $mailBody = $this -> smarty -> fetch('contact/mail.tpl');
        /** ------------------- */
        $mail -> setBodyHtml($mailBody, 'UTF-8');

        if($email!=""){
            $email_from = $email;
        } else {
            $email_from = $settings->settings_email3;
        }
        if($name!=""){
            $name_from = "=?utf-8?b?" . base64_encode($name). "?=";
        } else {
            $name_from = $settings->settings_email3;
        }
        $mail -> setFrom($email_from, $name_from);
        $mail -> addTo(trim(strip_tags($email_to)), trim(strip_tags($email_to)));
        $subject = "=?utf-8?b?" . base64_encode("Заказ") . "?=";
        $mail -> setSubject($subject);

        /** Send email */
        $mail->send();
        $_SESSION['msg'] = "<span style='color:green;'>Email successfully sent!</span>";
        $this->_redirect('/order-online-complete/');
    }

    public function orderOnlineCompleteAction(){
        if(isset($_SESSION['msg'])&&$_SESSION['msg']!=""){
            unset($_SESSION['msg']);
            $this -> smarty -> assign('item',  $item = $this->Content->getPageByLink("order-online-complete", $this->lang_id));
            $this -> smarty -> assign('meta_title', $item['meta_title']);
            $this -> smarty -> assign('meta_keywords', $item['meta_keywords']);
            $this -> smarty -> assign('meta_description', $item['meta_description']);

            $this -> smarty -> assign('PageBody', 'contact/complete.tpl');
            $this -> smarty -> display('layouts/sub.tpl');
        } else {
            $this->_redirect('/order-online/');
        }
    }
}
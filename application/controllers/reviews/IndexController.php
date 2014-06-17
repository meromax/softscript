<?php
include_once ROOT . 'application/models/ContentManagerDb.php';
include_once ROOT . 'application/models/SettingsDb.php';
include_once ROOT . 'application/models/ReviewsDb.php';
/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Reviews_IndexController extends System_Controller_Action {

    protected $content;
    public $settings;
    protected $reviews;

    public function init() {
        parent::init();
        
		if(!isset($_SESSION['loginNamespace'])){
			//$this->_redirect('/');
		}        
        $this->content = new ContentManagerDb();
        $this->settings = new SettingsDb();
        $this->smarty->assign('menuActive', 'reviews');
        $this->reviews = new ReviewsDb();
    }
    
    public function indexAction() {


        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->reviews->getPagesCount2($this->lang_id)<=1 ))
            ||($this->_getParam('page')>1&&$this->reviews->getPagesCount2($this->lang_id)<$this->_getParam('page'))
        ){
            $this->_redirect("/reviews/page/1");
        }
        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;

        $items = $this->reviews->getReviewsForPage2($this->lang_id, $page);

//        echo "<pre>";
//        print_r($items);
//        die();

        $this->smarty->assign('items', $items);
        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->reviews->getPagesCount2($this->lang_id));

        $this -> smarty->assign('meta_title', "Отзывы");
        $this -> smarty->assign('meta_keywords', "Отзывы");
        $this -> smarty->assign('meta_description', "Отзывы");

        $this->smarty->assign('PageBody', 'reviews/index.tpl');
        $this->smarty->display('layouts/sub.tpl');

    }

    public function sendAction() {
        $settings = $this -> settings -> getSettingsById($this->lang_id);

        $params = $this->_getAllParams();
        $params['user_id'] = $this->userId;
        $this->reviews->add($params);

        $email_to = $settings->settings_email1;

        Zend_Loader::loadClass('Zend_Mail');    /** Loading Zend_Mail */
        $mail = new Zend_Mail();
        $mail -> addHeader('X-MailGenerator', "mail machine");

        $email = trim(strip_tags($params['email']));
        $name       = trim(strip_tags($params['name']));
        $phone      = trim(strip_tags($params['phone']));
        $message    = trim(strip_tags($params['message']));
        $message = str_replace(chr(13),'<br>',$message);

        /** Preparing mail body */
        $this -> smarty -> assign('name', $name);
        $this -> smarty -> assign('email', $email);
        $this -> smarty -> assign('phone', $phone);
        $this -> smarty -> assign('message', $message);
        $mailBody = $this -> smarty -> fetch('reviews/mail.tpl');
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
        $subject = "=?utf-8?b?" . base64_encode("Новый отзыв на сайте http://".$_SERVER['HTTP_HOST']) . "?=";
        $mail -> setSubject($subject);

        /** Send email */
        $mail->send();
        $_SESSION['msg'] = "<span style='color:green;'>Email successfully sent!</span>";
        $this->_redirect('/reviews-complete');
    }

    public function completeAction() {
        if(isset($_SESSION['msg'])&&$_SESSION['msg']!=""){
            unset($_SESSION['msg']);
            $this -> smarty -> assign('item',  $item = $this->Content->getPageByLink("reviews-complete", $this->lang_id));
            $this -> smarty -> assign('meta_title', $item['meta_title']);
            $this -> smarty -> assign('meta_keywords', $item['meta_keywords']);
            $this -> smarty -> assign('meta_description', $item['meta_description']);
            $this -> smarty -> assign('PageBody', 'reviews/complete.tpl');

            $this -> smarty -> display('layouts/sub.tpl');
        } else {
            $this->_redirect('/reviews/page/1');
        }
    }

}
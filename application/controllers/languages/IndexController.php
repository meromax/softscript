<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Languages_IndexController extends System_Controller_Action {
    
    public function init() {
        parent::init();
    }
    
    public function indexAction() {

//    	$data = $_SESSION['prev_info']['prev_param'];
//    	
//    	if($data['module']=='articles'&&$data['action']=='view'){
//    		$this->_redirect("/articles_page1.html");
//    	} elseif($data['module']=='news'&&$data['action']=='view'){
//    		$this->_redirect("/news_page1.html");
//    	} elseif($data['module']=='links'&&$data['action']=='view'){
//    		$this->_redirect("/view_links1.html");
//    	} elseif($data['module']=='search'&&$data['action']=='search'){
//    		$this->_redirect("/");
//    	} else {
//    		$this->_redirect($_SESSION['prev_info']['prev_url']);
//    	}
		$this->_redirect("/");
    }
}
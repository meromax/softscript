<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

include_once ROOT . 'application/models/ContentManagerDb.php';

class Service_IndexController extends System_Controller_Action 
{
	protected $content;
    public function init() {
        parent::init();
        $this->content = new ContentManagerDb();
    }
    
    public function indexAction() {
    	//$service = $this -> Content -> getPageByLink('service.html');
    	$service = $this -> content -> getPageByKeyAndLangId('service_page', $_SESSION['lang']);
    	$this -> smarty -> assign('page_title', $service['title']);
    	$this -> smarty -> assign('page_text', $service['text']);
        $this -> smarty -> assign('PageBody', 'service/index.tpl');
        $this -> smarty -> assign('Title', 'Service');
        $this -> smarty -> display('layouts/main.tpl');
    }
}
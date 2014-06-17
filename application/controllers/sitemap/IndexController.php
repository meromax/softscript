<?php
include_once ROOT . 'application/models/ContentManagerDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Sitemap_IndexController extends System_Controller_Action {
    
	protected $Content;
    public function init() {
        parent::init();
        $this->Content = new ContentManagerDb();
    }
    
    public function indexAction() {
    	$this->smarty->assign('static_pages', $data = $this->Content->getAllPagesByType($this->lang_id));
    	$this->smarty->assign('static_pages_count', sizeof($data));
        $this->smarty->assign('Title', 'Site Map');
        $this->smarty->assign('PageBody', 'sitemap/show_items.tpl');
        $this->smarty->display('layouts/main.tpl');
    }
}
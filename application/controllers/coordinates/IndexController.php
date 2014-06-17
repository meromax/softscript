<?php
include_once ROOT . 'application/models/ContentManagerDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Coordinates_IndexController extends System_Controller_Action {
    
	protected $content;
    public function init() {
        parent::init();
        $this->content = new ContentManagerDb();
    }
    
    public function indexAction() {
    	$this->smarty->assign('item', $this->content->getPageByLink('coordinates.html',$this->lang_id));
        $this->smarty->assign('Title', 'Coordinates');
        $this->smarty->assign('PageBody', 'coordinates/page.tpl');
        $this->smarty->display('layouts/main.tpl');
    }
}
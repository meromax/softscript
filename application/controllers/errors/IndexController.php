<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Errors_IndexController extends System_Controller_Action {
	

    public function init() {
        parent::init();
    }
    public function indexAction() {
        $this -> smarty -> assign('PageBody', 'error_page.tpl');
        $this -> smarty -> display('layouts/main.tpl');
    }

    public function comingSoonAction() {
        $this -> smarty -> assign('PageBody', 'coming_soon_page.tpl');
        $this -> smarty -> display('layouts/main.tpl');
    }
    
}
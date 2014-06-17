<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

include_once ROOT . 'application/models/ContentManagerDb.php';
include_once ROOT . 'application/models/SectionsDb.php';

class Map_IndexController extends System_Controller_Action 
{
	protected $content;
    protected $sections;
    public function init() {
        parent::init();
        $this->content = new ContentManagerDb();
        $this->sections = new SectionsDb();
    }
    
    public function indexAction() {
        $this -> smarty -> assign('pages', $this -> content -> getAllPagesByTypeCustom($this ->lang_id, '1'));
        $this -> smarty -> assign('sections', $this -> sections -> getAllSections($this ->lang_id));
        $this -> smarty -> assign('pages2', $this -> content -> getAllPagesByTypeCustom($this ->lang_id, '0'));
        $this -> smarty -> assign('PageBody', 'map/index.tpl');
        $this -> smarty -> display('layouts/sub.tpl');
    }
}
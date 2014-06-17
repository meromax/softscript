<?php
include_once ROOT . 'application/models/PriceDb.php';
include_once ROOT . 'application/models/FilesDb.php';
include_once ROOT . 'application/models/ContentManagerDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Price_IndexController extends System_Controller_Action {
    
	private $price;
	private $file;
	protected $content;
    public function init() {
        parent::init();
        $this->price = new PriceDb();
        $this->file = new FilesDb();
        $this->content = new ContentManagerDb();
    }
    
    public function indexAction() {
    	
        $main_pic = $this -> content -> getPageByKeyAndLangId('price-list', $_SESSION['lang']);
    	$this -> smarty -> assign('main_image_path', '/images/pages/'.$main_pic['image']);    	
    	
    	$this->smarty->assign('price', $this->price->getAllPrice($this->lang_id));
    	$this->smarty->assign('files', $files = $this->file->getAllFiles($this->lang_id));
    	$this->smarty->assign('files_count', sizeof($files));
        $this->smarty->assign('PageBody', 'price/show_items.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }
    
    public function getfileAction(){
    	$data = $this -> file -> getFileItemById($this->_getParam('id'));
    	$this -> file -> getFile('tmp/files/', $data['file_name'], $this->_getParam('id')); 
    }
}
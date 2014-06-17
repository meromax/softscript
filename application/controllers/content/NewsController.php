<?php
include_once ROOT . 'application/models/NewsDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Content_NewsController extends System_Controller_Action {
    
    public function init() {
        parent::init();
    }
    
    public function viewAction() {
    	$this->smarty->assign('news_link', 'active');
    	$item = $this -> News -> getNewsById($this->_getParam('id'));
        $this->smarty->assign('item', $item);
        $this->smarty->assign('Title', $item['news_title']);
        $this->smarty->assign('PageBody', 'news/show_item.tpl');
        $this->smarty->display('layouts/main.tpl');
    }
    
    public function pageAction() {
		$this->smarty->assign('news_link', 'active');
		if($this->_hasParam('page')){
			if($this->_getParam('page')==0){
				$page=1;
			} else {
				$page=$this->_getParam('page');
			}
			
			if($this->_getParam('page')>$this->News->getPagesCount()){
				$this->_redirect('/news/page/1');
			}
		}

    	$items = $this->News->getNewsForPage($page-1);
    	
    	$this->smarty->assign('items', $items);
        $this->smarty->assign('Title', 'News');
        $this->smarty->assign('page_num', $page);
        $this->smarty->assign('page_count', $this->News->getPagesCount());
        $this->smarty->assign('PageBody', 'news/show_items.tpl');
        $this->smarty->display('layouts/main.tpl');
    }
    
    public function dateAction() {
    	$this->smarty->assign('news_link', 'active');
        $date = $this->_hasParam('date')?($this->_getParam('date')):date('Y-m-d'); 
        $items = $this->News->getNewsByDate($date);
        $this->smarty->assign('no_paging', true);
        $this->smarty->assign('items', $items);
        $this->smarty->assign('Title', 'News items');
        $this->smarty->assign('PageBody', 'news/show_items.tpl');
        $this->smarty->display('layouts/main.tpl');
    }
}
<?php
include_once ROOT . 'application/models/DealsDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Novelty_IndexController extends System_Controller_Action {
    
	protected $deals;
    public function init() {
        parent::init();
        $this->deals = new DealsDb();
    }

    public function indexAction() {

        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->deals->getDealsPagesCount($this->lang_id, 0)<=1 ))
            ||($this->_getParam('page')>1&&$this->deals->getDealsPagesCount($this->lang_id, 0)<$this->_getParam('page'))
        ){

            $this->_redirect("/deals/page/1");
        }
        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $items = $this->deals->getDealsForPage($this->lang_id, 0, $page);

        $this->smarty->assign('items', $items);
        $this->smarty->assign('meta_title', "Новинки");
        $this->smarty->assign('meta_keywords', "Новинки");
        $this->smarty->assign('meta_description', "Новинки");
        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->deals->getDealsPagesCount($this->lang_id, 0));
        $this->smarty->assign('PageBody', 'novelty/show_items.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }
    
    public function viewAction() {
    	$item = $this -> deals -> getDealByLink($this->_getParam('link'));
        $this->smarty->assign('item', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('Title', $item['new_title']);
        $this->smarty->assign('PageBody', 'novelty/show_item.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }
    


}
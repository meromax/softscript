<?php
include_once ROOT . 'application/models/NewsDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class News_IndexController extends System_Controller_Action {
    
	protected $News;
    public function init() {
        parent::init();
        $this->News = new NewsDb();
        $this->smarty->assign('menuActive', 'news');
    }
    
    public function viewAction() {
    	$this->smarty->assign('news_link', 'active');
    	$item = $this -> News -> getNewById($this->_getParam('new_id'));
        $this->smarty->assign('item', $item);
        $this->smarty->assign('leftMenuActive', 'news');
        $this->smarty->assign('path', '<a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>&nbsp;<a class="main" href="/news.html">Новости</a>&nbsp;<span class="main">/</span>&nbsp;'.stripslashes(strip_tags($item['new_title'])));
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('Title', $item['new_title']);
        $this->smarty->assign('PageBody', 'news/show_item.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }
    
    public function indexAction() {
//print_r($this->_getAllParams());
    	if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->News->getPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this->News->getPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			
			//$this->_redirect("/".$_SESSION['lang_title']."/0/news.html");
		}
    	$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
    	$items = $this->News->getNewsForPage($this->lang_id, $page);

		$this->smarty->assign('lang_title',$_SESSION['lang_title']);
    	$this->smarty->assign('items', $items);
        $this->smarty->assign('leftMenuActive', 'news');
        $this->smarty->assign('path', '<a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>&nbsp;Новости');
        $this->smarty->assign('Title', 'News');
        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->News->getPagesCount($this->lang_id));
        $this->smarty->assign('PageBody', 'news/show_items.tpl');
        $this->smarty->display('layouts/sub.tpl');
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
<?php
include_once ROOT . 'application/models/PortfolioDb.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

include_once ROOT . 'application/models/SectionsDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Portfolio_IndexController extends System_Controller_Action {
    
	protected $Portfolio;
	protected $content;

    public function init() {
        parent::init();
        $this->Portfolio = new PortfolioDb();
        $this->content = new ContentManagerDb();
    }
    
    public function viewAction() {
    	
        $main_pic = $this -> content -> getPageByKeyAndLangId('portfolio', $_SESSION['lang']);
    	$this -> smarty -> assign('main_image_path', '/images/pages/'.$main_pic['image']);     	
    	
    	$item = $this -> Portfolio -> getPortfolioById($this->_getParam('portfolio_id'));
        $this->smarty->assign('item', $item);
        $this->smarty->assign('Title', $item['portfolio_title']);
        $this->smarty->assign('PageBody', 'portfolio/show_item.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }
    
    public function indexAction() {
    	
    	
        $main_pic = $this -> content -> getPageByKeyAndLangId('portfolio', $_SESSION['lang']);
    	$this -> smarty -> assign('main_image_path', '/images/pages/'.$main_pic['image']);    	
    	
    	$section  = $this->_getParam('section');
    	$category = $this->_getParam('category');
    	$this->smarty->assign('section_id', $section);
    	$this->smarty->assign('category_id', $category);
    	
    	if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->Portfolio->getNewPortfolioPagesCount($this->lang_id, $section, $category)<=1 ))
			||($this->_getParam('page')>1&&$this->Portfolio->getNewPortfolioPagesCount($this->lang_id, $section, $category)<$this->_getParam('page'))
		){
			$this->_redirect("/portfolio_page1.html");
		}
    	$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
 
    	$items = $this->Portfolio->getNewPortfolioForPage($this->lang_id, $section, $category, $page);
    	
    	$this->smarty->assign('items', $items);
    	$this->smarty->assign('items_count', sizeof($items));
        $this->smarty->assign('Title', 'Portfolio');
        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->Portfolio->getNewPortfolioPagesCount($this->lang_id, $section, $category));
        $this->smarty->assign('PageBody', 'portfolio/show_items.tpl');
        $this->smarty->display('layouts/sub.tpl');
        
    }    
    
    public function pageAction() {
    	
    	
        $main_pic = $this -> content -> getPageByKeyAndLangId('portfolio', $_SESSION['lang']);
    	$this -> smarty -> assign('main_image_path', '/images/pages/'.$main_pic['image']);    	
    	
    	
    	
    	if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->Portfolio->getPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this->Portfolio->getPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/portfolio_page1.html");
		}
    	$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
 
    	$items = $this->Portfolio->getPortfolioForPage($this->lang_id, $page);
    	
    	$this->smarty->assign('items', $items);
    	$this->smarty->assign('items_count', sizeof($items));
        $this->smarty->assign('Title', 'Portfolio');
        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->Portfolio->getPagesCount($this->lang_id));
        $this->smarty->assign('PageBody', 'portfolio/show_items.tpl');
        $this->smarty->display('layouts/sub.tpl');
        
    }
}
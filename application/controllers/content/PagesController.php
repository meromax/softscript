<?php

include_once ROOT . 'application/models/ContentManagerDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Content_PagesController extends System_Controller_Action 
{
    protected $Content;
    public function init() {
        parent::init();
        
        $this->Content = new ContentManagerDb();
    }
    
    public function indexAction() {
        $this -> _redirect('/');
    }
        
    public function pagebyidAction() {
        if( $this -> _hasParam('id')) {
            $page = $this -> Content -> getPageById($this -> _getParam('id'));
            $this -> smarty -> assign('page_content', $page );
        } else {
            $this -> _redirect('/');
        }
    }
    
    public function pagebylinkAction() {
        if( $this -> _hasParam('link')) {
        	if($this->_getParam('link')=='main.html'){
        		$this -> _redirect('/');
        	}
			$item = $this->Content->getPageByLink($this -> _getParam('link'), $this->lang_id);
            $this->smarty->assign('path', '<a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>&nbsp;'.stripslashes(strip_tags($item['title'])));
	    	$this->smarty->assign('content', $item);
	        $this->smarty->assign('PageBody', 'content/page.tpl');
	        $this->smarty->display('layouts/sub.tpl');            
        } else {
            $this -> _redirect('/');
        }
    }
    
    public function headerpagesAction() {
        $this -> smarty -> assign('header_pages', $this -> Content -> getHeaderPages());
    }
    
    public function footerpagesAction() {
        $this -> smarty -> assign('footer_pages', $this -> Content -> getFooterPages());
    }
    
    public function footerAction() {
        $this -> smarty -> assign('footer_page', $this -> Content -> getPageByLink('footer'));
        $this -> smarty -> assign('footer_pages', $this -> Content -> getFooterPages());
    }

    /***** STATIC PAGES ***/
    public function aboutCompanyAction() {
        $item = $this->Content->getPageByLink("about-company.html", $this->lang_id);
        $this->smarty->assign('menuActive', 'about-company');
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function documentationAction() {
        $item = $this->Content->getPageByLink("documentation.html", $this->lang_id);
        $this->smarty->assign('menuActive', 'documentation');
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function shopsAction() {
        $item = $this->Content->getPageByLink("shops.html", $this->lang_id);
        $this->smarty->assign('menuActive', 'shops');
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function actionsAction() {
        $item = $this->Content->getPageByLink("actions.html", $this->lang_id);
        $this->smarty->assign('menuActive', 'actions');
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function wholesalersAction() {
        $item = $this->Content->getPageByLink("wholesalers.html", $this->lang_id);
        $this->smarty->assign('menuActive', 'wholesalers');
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function deliveryAction() {
        $item = $this->Content->getPageByLink("delivery.html", $this->lang_id);
        $this->smarty->assign('menuActive', 'delivery');
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function partnersAction() {
        $item = $this->Content->getPageByLink("partners.html", $this->lang_id);
        $this->smarty->assign('path', '<a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>&nbsp;'.stripslashes(strip_tags($item['title'])));
        $this->smarty->assign('menuActive', 'partners');
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }


    public function specialsAction() {
        $item = $this->Content->getPageByLink("specials.html", $this->lang_id);
        $this->smarty->assign('path', '<a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>&nbsp;'.stripslashes(strip_tags($item['title'])));
        $this->smarty->assign('menuActive', 'specials');
        $this->smarty->assign('leftMenuActive', 'specials');
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function howDoOrderAction() {
        $item = $this->Content->getPageByLink("how-do-order.html", $this->lang_id);
        $this->smarty->assign('menuActive', 'how-do-order');
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function paymentMethodsAction() {
        $item = $this->Content->getPageByLink("payment-methods.html", $this->lang_id);
        $this->smarty->assign('path', '<a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>&nbsp;'.stripslashes(strip_tags($item['title'])));
        $this->smarty->assign('menuActive', 'payment-methods');
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }


    public function contactsAction() {
        $item = $this->Content->getPageByLink("contacts.html", $this->lang_id);
        $this->smarty->assign('path', '<a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>&nbsp;'.stripslashes(strip_tags($item['title'])));
        $this->smarty->assign('menuActive', 'contacts');
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }


    public function usefulAction() {
        if($this->_hasParam('link')&&$this->_getParam('link')!=''){
            $item = $this->Content->getPageByLink($this->_getParam('link'), $this->lang_id);
        } else {
            $item = $this->Content->getPageByLink("useful", $this->lang_id);
        }
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function kontrafactAction() {
        $item = $this->Content->getPageByLink("kontrafact", $this->lang_id);
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function plusAction() {
        $item = $this->Content->getPageByLink("plus", $this->lang_id);
        $this->smarty->assign('rightBannersMenu', 'plus');
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function advantagesAction() {
        $item = $this->Content->getPageByLink("advantages", $this->lang_id);
        $this->smarty->assign('rightBannersMenu', 'advantages');
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function paymentAction() {
        $item = $this->Content->getPageByLink("payment", $this->lang_id);
        $this->smarty->assign('rightBannersMenu', 'payment');
        $this->smarty->assign('content', $item);
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'content/page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }



}
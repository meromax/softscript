<?php
include_once ROOT . 'application/models/SectionsDb.php';
include_once ROOT . 'application/models/ProductsDb.php';


/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Search_IndexController extends System_Controller_Action {
    
    protected $products;
    protected $sections;
    public function init() {
        parent::init();
        $this->products = new ProductsDb();
        $this->sections = new SectionsDb();
    }

    public function indexAction() {
        $search_words = $this->_getParam('search_input');
        if($search_words==""){
            $search_words = "~";
        }
        $this->_redirect("/search/search-words/".$search_words);
    }

    public function searchAction() {

        $search_words = $this->_getParam('search_words');
        $search_words = preg_replace("/([\s\x{0}\x{0B}]+)/i", " ", trim($search_words));
        if($search_words!='search'&&$search_words!=''&&$search_words!='~'){

            $this->smarty->assign('search_words', $search_words);
            $products = $this->products->searchByWordLike($this->lang_id, $search_words);
//
//            print_r($products);
//            die();

            $this->smarty->assign('products', $products);


            $sections = $this -> sections -> getAllSections($this->lang_id);
            $this->smarty->assign('sections', $sections);


            $this->smarty->assign('max_price', $max = $this -> products -> searchMaxProductsPrice($search_words));

            $this->smarty->assign('min_price', $this -> products -> searchMinProductsPrice($search_words));

        }

        $this->smarty->assign('Title', 'Поиск товаров');
        $this->smarty->assign('PageBody', 'search/index.tpl');
        $this->smarty->display('layouts/main.tpl');
    }

}
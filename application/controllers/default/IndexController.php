<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

include_once ROOT . 'application/models/ContentManagerDb.php';
include_once ROOT . 'application/models/BannersDb.php';
include_once ROOT . 'application/models/ProductsDb.php';
include_once ROOT . 'application/models/SectionsDb.php';
include_once ROOT . 'application/models/NewsDb.php';

class IndexController extends System_Controller_Action {
	
	protected $content;
    protected $banners;
    protected $products;
    protected $sections;
    protected $deals;
    protected $news;
	
    public function init() {
        parent::init();
        $this->content = new ContentManagerDb();
        $this->banners = new BannersDb();
        $this->products = new ProductsDb();
        $this->sections = new SectionsDb();

        $this->news = new NewsDb();

        $sections = $this->sections->getAllSections($this->lang_id);

        for($i=0; $i<sizeof($sections); $i++){
            $sections[$i]['categories'] = $this->sections->getAllSubSections($sections[$i]['id'], $this->lang_id);
        }
        $this->smarty->assign('sections', $sections);

        $this->smarty->assign('menuActive', 'index');

    }
    public function indexAction() {

        $this -> smarty -> assign('mainAboutCompany',  $this->Content->getPageByLink("about-company.html",$this->lang_id));
        $this -> smarty -> assign('mainDelivery', $this->Content->getPageByLink("delivery.html",$this->lang_id));

        $this -> smarty -> assign('latestNews', $this->news->getLast10News($this->lang_id));


        $this -> smarty -> assign('latestProducts', $this->products->getLastProducts($this->lang_id));
        $this -> smarty -> assign('popularProducts', $this->products->getLastProducts($this->lang_id,4));

        $products = $this -> products -> getActionsProducts($this->lang_id);

        for($i=0; $i<sizeof($products); $i++){
            if($products[$i]['category_id']==0){
                $section = $this->sections->getSectionById($products[$i]['section_id']);
                $link = "/catalog/sec/".strip_tags(stripslashes($section['link']))."/product/".strip_tags(stripslashes($products[$i]['link']))."/";
                $products[$i]['link'] = $link;
                $products[$i]['section_link'] = $section['link'];

            } else {
                $section = $this->sections->getSectionById($products[$i]['section_id']);
                $category = $this->sections->getSubSectionById($products[$i]['category_id']);
                $link = "/catalog/".strip_tags(stripslashes($section['link']))."/".strip_tags(stripslashes($category['link']))."/".strip_tags(stripslashes($products[$i]['link']))."/";
                $products[$i]['link'] = $link;
                $products[$i]['section_link'] = $section['link'];
                $products[$i]['category_link'] = $category['link'];
            }

        }
        $this->smarty->assign('products', $products);

//        $categories = $this -> sections -> getLast6SubSections('1,2', $this->lang_id);
//
//        for($i=0; $i<sizeof($categories); $i++){
//            $item = $this -> sections -> getSectionById($categories[$i]['section_id']);
//            $categories[$i]['link2'] = "/catalog-cat/".strip_tags(stripslashes($item['link']))."/".strip_tags(stripslashes($categories[$i]['link']))."/";
//        }
//        $this->smarty->assign('categories', $categories);

        $this -> smarty -> assign('PageBody', 'default/index.tpl');
        $this -> smarty -> display('layouts/main.tpl');
    }
    
}
<?php
include_once ROOT . 'application/models/SectionsDb.php';
include_once ROOT . 'application/models/ProductsDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Catalog_IndexController extends System_Controller_Action {
    
	protected $sections;
    protected $products;
	
    public function init() {
        parent::init();
        $this->sections = new SectionsDb();
        $this->products = new ProductsDb();

        $this->smarty->assign('menuActive', 'catalog');
    }
    
    public function indexAction() {
    	$sections = $this -> sections -> getAllSections($this->lang_id);
        $this->smarty->assign('sections', $sections);

        $products = $this -> products -> getAllMainProducts($this->lang_id);
        $this->smarty->assign('products', $products);

        $this->smarty->assign('max_price', $max = $this -> products -> getMaxProductsPrice($this->lang_id));

        $this->smarty->assign('min_price', $this -> products -> getMinProductsPrice($this->lang_id));

        $this->smarty->assign('PageBody', 'catalog/index.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }    
        
    
    public function sectionbylinkAction() {

    	$item = $this -> sections -> getSectionByLink($this -> _getParam('link'), $this->lang_id);
        $this->smarty->assign('item', $item);
        
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
               
//        $sections = $this -> sections -> getAllSectionsWithoutCurrent($item['id'], $this->lang_id);
//        $this->smarty->assign('sections', $sections);
        
		if($this->_hasParam('link')){
			$this->smarty->assign('activeLink', $this->_getParam('link'));	
		}
		
        $this->smarty->assign('PageBody', 'sections/index.tpl');
        $this->smarty->display('layouts/sub.tpl');
    } 
    
    public function categorybylinkAction() {
    	
    	$item = $this -> sections -> getSubSectionByLink($this -> _getParam('link'), $this->lang_id);
        $this->smarty->assign('item', $item);
        
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
               
        $this->smarty->assign('PageBody', 'sections/index.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }       
    
    
    
    
    public function viewAction() {
    	$item = $this -> sections -> getSectionById($this->_getParam('section_id'));
        $this->smarty->assign('item', $item);
        $this -> smarty -> assign('main_image_path', '/images/sections/'.$item['image']);
        $this->smarty->assign('Title', $item['title']);
        $this->smarty->assign('PageBody', 'sections/show_item.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }
    
    public function sectioncatAction(){
    	
    	$section_id = $this->_getParam('section_id');
    	$this->smarty->assign('section_id', $section_id);
    	
    	$category_id = $this->_getParam('category_id');
    	$this->smarty->assign('category_id', $category_id);

		$banners = $this->Portfolio->getPortfolioBySecCat($section_id, $category_id, $this->lang_id);
		if(sizeof($banners)>0){
			for($i=0; $i<sizeof($banners); $i++){
				$banners[$i]['image'] = "portfolio/".$banners[$i]['portfolio_image']; 
			}
			if(sizeof($banners)>2){
				$this->smarty->assign('slider', 1);
			}
			$this->smarty->assign('banners', $banners);
		}     	
		//print_r($banners);
    	if($category_id!=0){
    		   		
    		
    		$category = $this->sections->getSubSectionById($category_id);
    		if(sizeof($banners)<=0){
				$this -> smarty -> assign('main_image_path', '/images/categories/'.$category['image']);
    		}
			$this->smarty->assign('category', $category);
	        $this->smarty->assign('meta_title', strip_tags(stripslashes($category['title'])));
	        $this->smarty->assign('PageBody', 'sections/show_item.tpl');					
    	} else {
    		$section = $this->sections->getSectionById($section_id);
    		if(sizeof($banners)<=0){
    			$this -> smarty -> assign('main_image_path', '/images/sections/'.$section['image']);
    		}
    		$this->smarty->assign('section', $section);
    		$this->smarty->assign('categories', $this->sections->getAllSubSections($section_id, $this->lang_id));
	        $this->smarty->assign('meta_title', strip_tags(stripslashes($section['title'])));
	        $this->smarty->assign('PageBody', 'sections/show_items.tpl');    		
    	}
        $this->smarty->display('layouts/sub.tpl');    	
    }
}
<?php
include_once ROOT . 'application/models/SectionsDb.php';
include_once ROOT . 'application/models/DealsDb.php';
include_once ROOT . 'application/models/FilesDb.php';
include_once ROOT . 'application/models/UsersDb.php';
include_once ROOT . 'application/models/BrandsDb.php';

include_once ROOT . 'application/models/OptionsDb.php';

include_once ROOT . 'application/models/FilesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Products_IndexController extends System_Controller_Action {
    
	protected $sections;
    protected $deals;
    protected $File;
    protected $users;
    protected $brands;
    protected $options;
    protected $files;
	
    public function init() {
        parent::init();
        $this->sections = new SectionsDb();
        $this->products = new ProductsDb();
        $this->File = new FilesDb();
        $this->users = new UsersDb();
        $this->brands = new BrandsDb();
        $this->options = new OptionsDb();
        $this->files = new FilesDb();


        $sections = $this->sections->getAllSections($this->lang_id);

        for($i=0; $i<sizeof($sections); $i++){
            $sections[$i]['categories'] = $this->sections->getAllSubSections($sections[$i]['id'], $this->lang_id);
        }

        $this->smarty->assign('sections', $sections);


    }

    public function indexAction() {
        $product = $this -> products -> getProductByLink($this -> _getParam('productlink'), $this->lang_id);

        $productSlider = $this->products->setForSlider($product['images']);
        $this->smarty->assign('productSlider',$productSlider);

        if($product['category_id']==0){
            $section = $this->sections->getSectionById($product['section_id']);
            $this->smarty->assign('currProductSection', $section);
            $link = "/catalog/".strip_tags(stripslashes($section['link']))."/".strip_tags(stripslashes($product['link']))."/";
            $product['link'] = $link;
            $product['section_link'] = $section['link'];



        } else {
            $section = $this->sections->getSectionById($product['section_id']);
            $this->smarty->assign('currProductSection', $section);
            $category = $this->sections->getSubSectionById($product['category_id']);
            $this->smarty->assign('currProductCategory', $category);
            $this->smarty->assign('activeLeftCategory', $category['link']);

            $link = "/catalog/".strip_tags(stripslashes($section['link']))."/".strip_tags(stripslashes($category['link']))."/".strip_tags(stripslashes($product['link']))."/";
            $product['link'] = $link;
            $product['section_link'] = $section['link'];
            $product['category_link'] = $category['link'];
        }


        $this->smarty->assign('currUrl',"http://".$_SERVER['HTTP_HOST'].$product['link']);
        $this->smarty->assign('currProduct',1);
        $this->smarty->assign('section', $this -> sections -> getSectionByLink($this -> _getParam('sectionlink'), $this->lang_id));

        $product = $this -> products -> getProductByLink($this -> _getParam('productlink'), $this->lang_id);
        $product['images_count'] = sizeof($product['images']);
        $this->smarty->assign('product', $product);

        $reviews = $this -> products -> getProductsReviews($product['id']);

        for($i=0; $i<sizeof($reviews); $i++){
            $reviews[$i]['comments'] = $this -> products -> getProductsReviewsComments($reviews[$i]['id']);
        }

        $this->smarty->assign('productsReviews', $reviews);

        $this->smarty->assign('meta_title', $product['meta_title']);
        $this->smarty->assign('meta_keywords', $product['meta_keywords']);
        $this->smarty->assign('meta_description', $product['meta_description']);

        if($this->_hasParam('sectionlink')){
            $this->smarty->assign('activeLink', $this->_getParam('sectionlink'));
        }

        // related products
        $relatedProducts = $this->products->getActiveRecommendedProducts($product['id'], 0);
        $section1Data = $this->sections->getSectionById(1);
        $sectionData = $this->sections->getSectionById($product['section_id']);
        $this->smarty->assign('activeLeftSection', $sectionData['link']);

        $products = $this->products->getAllProductsWithoutCurrentId($this->lang_id, $product['id'], $product['section_id']);

        $path = '<a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>
                 <a class="main" href="/catalog/'.stripslashes(strip_tags($section1Data['link'])).'/">Каталог</a>&nbsp;<span class="main">/</span>
                 <a class="main" href="/catalog/'.stripslashes(strip_tags($sectionData['link'])).'/">'.stripslashes(strip_tags($sectionData['title'])).'</a>
                 <span class="main">/</span>&nbsp;'.stripslashes(strip_tags($product['title']));

        $this->smarty->assign('backLink', "/catalog/".$sectionData['link']."/");

        $this->smarty->assign('relatedProducts', $relatedProducts);


        // all products from category
        $categoryProducts = $this->products->getActiveProductsFromCategoryWithoutCurrent($product['id'], $product['category_id']);
        $this->smarty->assign('categoryProducts', $categoryProducts);

        $this->smarty->assign('path', $path);

        for($i=0; $i<sizeof($products); $i++){
            if($products[$i]['category_id']==0){
                $section = $this->sections->getSectionById($products[$i]['section_id']);
                $link = "/catalog/".strip_tags(stripslashes($section['link']))."/".strip_tags(stripslashes($products[$i]['link']))."/";
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
        $this->smarty->assign('PageBody', 'products/product.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function downloadAction() {
        $product = $this -> products -> getProductByHash($this -> _getParam('hash'));
        $productFiles = $this -> products -> getAllProductsFiles($product['id']);

        $scripts_path = 'tmp/files/';
        $downloads_path = 'tmp/downloads/';

        $zipFile = 'package_'.$this -> _getParam('hash')."_".time().".zip";
        $zip = new ZipArchive;

        $res = $zip->open($downloads_path.$zipFile, ZipArchive::CREATE);
        if ($res === TRUE) {
            for($i=0; $i<sizeof($productFiles); $i++){
                $zip->addFile($scripts_path.$productFiles[$i]['filename'], $productFiles[$i]['filename_original']);
            }
            $zip->close();
        }
        $this->files->getFile($downloads_path, $zipFile, $product['title'].".zip");
        @unlink($downloads_path.$zipFile);
    }

}
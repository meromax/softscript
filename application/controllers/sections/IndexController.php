<?php
include_once ROOT . 'application/models/SectionsDb.php';
include_once ROOT . 'application/models/ProductsDb.php';
include_once ROOT . 'application/models/FilesDb.php';
include_once ROOT . 'application/models/UsersDb.php';
include_once ROOT . 'application/models/BrandsDb.php';

include_once ROOT . 'application/models/OptionsDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Sections_IndexController extends System_Controller_Action {
    
	protected $sections;
    protected $products;
    protected $File;
    protected $users;
    protected $brands;
    protected $options;
	
    public function init() {
        parent::init();
        $this->sections = new SectionsDb();
        $this->products = new ProductsDb();
        $this->File = new FilesDb();
        $this->users = new UsersDb();
        $this->brands = new BrandsDb();
        $this->options = new OptionsDb();

        $sections = $this->sections->getAllSections($this->lang_id);

        for($i=0; $i<sizeof($sections); $i++){
            $sections[$i]['categories'] = $this->sections->getAllSubSections($sections[$i]['id'], $this->lang_id);
        }

        $this->smarty->assign('sections', $sections);


    }

    public function catalogSectionsAction(){

        $sectionLink = $this->_getParam('link');

        if($sectionLink == "0"){
            $sectionId = 0;
        } else {

            $section = $this -> sections -> getSectionByLink($sectionLink, $this->lang_id);
            $sectionId = $section['id'];
            $this->smarty->assign('currSection', $section);
        }

        $this->smarty->assign('activeLeftSection', $sectionLink);


        $categoryLink = $this->_getParam('category');
        if($categoryLink == "0"){
            $categoryId = 0;
        } else {
            $category = $this -> sections -> getSubSectionByLink($categoryLink, $this->lang_id);
            $categoryId = $category['id'];
            $this->smarty->assign('currCategory', $category);
        }
        $this->smarty->assign('activeLeftCategory', $categoryLink);


        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->products->getProductsFrontSCPagesCount($this->lang_id, $sectionId, $categoryId)<=1 ))
            ||($this->_getParam('page')>1&&$this->products->getProductsFrontSCPagesCount($this->lang_id, $sectionId, $categoryId)<$this->_getParam('page'))
        ){
            $this->_redirect("/catalog/page/1");
        }

        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;

        $products = $this->products->getProductsFrontSCForPage($this->lang_id, $sectionId, $categoryId, $page);

        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->products->getProductsFrontSCPagesCount($this->lang_id, $sectionId, $categoryId));

        $this->smarty->assign('products', $products);

        $this->smarty->assign('meta_title', "Каталог товаров");
        $this->smarty->assign('meta_keywords', "Каталог товаров");
        $this->smarty->assign('meta_description', "Каталог товаров");

        $this->smarty->assign('menuActive', 'production');

        $this->smarty->assign('PageBody', 'sections/catalog_sections.tpl');
        $this->smarty->display('layouts/sub.tpl');


    }

    public function sectionAction(){
        //unset($_SESSION['filter']);
        $sectionLink = $this->_getParam('link');

        if($sectionLink == "0"){
            $sectionId = 0;
        } else {

            $section = $this -> sections -> getSectionByLink($sectionLink, $this->lang_id);
            $sectionId = $section['id'];
            $this->smarty->assign('currSection', $section);
            $this->smarty->assign('currSec', $sectionId);
        }

//        echo "<pre>";
//        print_r($_SESSION['filter']);
//        die();
        /* FILTER */
        if(isset($_SESSION['filter']['currSec'.$sectionId])){
            $data = $_SESSION['filter']['currSec'.$sectionId];

            $activeOptions = $this->products->getActiveOptionsProperties($data['options']);

            $this->smarty->assign('priceFrom', $data['price_from']);
            $this->smarty->assign('priceTo', $data['price_to']);
        }

        /*options*/
        $optionsIds = $this->sections->getSectionOptionsIds($section['id']);
        $options = $this->options->getAllSectionOptionsWithProperties($optionsIds);

        if(isset($activeOptions)&&sizeof($activeOptions)>0){
            for($i=0; $i<sizeof($activeOptions); $i++){
                $optionPropertyData = explode(":", $activeOptions[$i]);
                $optionId   = $optionPropertyData[0];
                $propertyId = $optionPropertyData[1];

                for($j=0; $j<sizeof($options); $j++){
                    if($options[$j]['id']==$optionId){
                        for($k=0; $k<sizeof($options[$j]['properties']); $k++){
                            if($options[$j]['properties'][$k]['id']==$propertyId){
                                $options[$j]['properties'][$k]['selected'] = 1;
                            } else {
                                $options[$j]['properties'][$k]['selected'] = 0;
                            }
                        }
                    }
                }
            }
        }


        $this->smarty->assign('options', $options);


        $this->smarty->assign('activeLeftSection', $sectionLink);


        $categoryLink = $this->_getParam('category');
        if($categoryLink == "0"){
            $categoryId = 0;
        } else {
            $category = $this -> sections -> getSubSectionByLink($categoryLink, $this->lang_id);
            $categoryId = $category['id'];
            $this->smarty->assign('currCategory', $category);
        }
        $this->smarty->assign('activeLeftCategory', $categoryLink);


        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->products->getProductsFrontSCPagesCount($this->lang_id, $sectionId, $categoryId)<=1 ))
            ||($this->_getParam('page')>1&&$this->products->getProductsFrontSCPagesCount($this->lang_id, $sectionId, $categoryId)<$this->_getParam('page'))
        ){
            $this->_redirect("/section/".$this -> _getParam('link')."/page/1");
        }

        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        //die("asd");
        $products = $this->products->getProductsFrontSCForPage($this->lang_id, $sectionId, $categoryId, $page);
        //print_r($products);
        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->products->getProductsFrontSCPagesCount($this->lang_id, $sectionId, $categoryId));

        $this->smarty->assign('products', $products);

        $this->smarty->assign('meta_title', $section['meta_title']);
        $this->smarty->assign('meta_keywords', $section['meta_keywords']);
        $this->smarty->assign('meta_description', $section['meta_description']);


        $this->smarty->assign('menuActive', "catalog");


        $this->smarty->assign('PageBody', 'sections/catalog_sections2.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function catalogAction() {

        $sectionLink = $this->_getParam('section');

        if($sectionLink == "0"){
            $sectionId = 0;
        } else {

            $section = $this -> sections -> getSectionByLink($sectionLink, $this->lang_id);
            $sectionId = $section['id'];
            $this->smarty->assign('currSection', $section);
        }

        $this->smarty->assign('activeLeftSection', $sectionLink);


        $categoryLink = $this->_getParam('category');
        if($categoryLink == "0"){
            $categoryId = 0;
        } else {
            $category = $this -> sections -> getSubSectionByLink($categoryLink, $this->lang_id);
            $categoryId = $category['id'];
            $this->smarty->assign('currCategory', $category);
        }
        $this->smarty->assign('activeLeftCategory', $categoryLink);


        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->products->getProductsFrontSCPagesCount($this->lang_id, $sectionId, $categoryId)<=1 ))
            ||($this->_getParam('page')>1&&$this->products->getProductsFrontSCPagesCount($this->lang_id, $sectionId, $categoryId)<$this->_getParam('page'))
        ){
            $this->_redirect("/catalog/sec/".$this -> _getParam('link')."/page/1");
        }

        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;

        $products = $this->products->getProductsFrontSCForPage($this->lang_id, $sectionId, $categoryId, $page);

        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->products->getProductsFrontSCPagesCount($this->lang_id, $sectionId, $categoryId));

        $this->smarty->assign('products', $products);

        $this->smarty->assign('meta_title', $section['meta_title']." :: ".$category['meta_title']);
        $this->smarty->assign('meta_keywords', $category['meta_keywords']);
        $this->smarty->assign('meta_description', $category['meta_description']);

        $this->smarty->assign('menuActive', "catalog");


        $this->smarty->assign('PageBody', 'sections/catalog.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function indexAction() {

        $this->smarty->assign('activeLeftSection', $this -> _getParam('sectionlink'));
        $item = $this -> sections -> getSectionByLink($this -> _getParam('sectionlink'), $this->lang_id);
        $this->smarty->assign('secLink', $this -> _getParam('sectionlink'));
        $template = $item['template'];



        /* FILTER */
        if(isset($_SESSION['filter']['currSec'.$item['id']])){
            $data = $_SESSION['filter']['currSec'.$item['id']];

            $activeOptions = $this->products->getActiveOptionsProperties($data['options']);

            $this->smarty->assign('priceFrom', $data['price_from']);
            $this->smarty->assign('priceTo', $data['price_to']);
        }

        /* brands list */
        $brandsList = $this -> getBrandsList($item['id'],1);

        if(sizeof($brandsList)>0){
            $brandsList = $this -> setBrandsListTo3Column($brandsList);

            if(isset($brandsList[0])){
                $this->smarty->assign('brandsList1', $brandsList[0]);
                if(isset($brandsList[1])){
                    $this->smarty->assign('brandsList2', $brandsList[1]);
                    if(isset($brandsList[2])){
                        $this->smarty->assign('brandsList3', $brandsList[2]);
                    }
                }
            }
            $this->smarty->assign('brandsList', $brandsList);
        }


        /*options*/
        $optionsIds = $this->sections->getSectionOptionsIds($item['id']);
        $options = $this->options->getAllSectionOptionsWithProperties($optionsIds);

        if(isset($activeOptions)&&sizeof($activeOptions)>0){
            for($i=0; $i<sizeof($activeOptions); $i++){
                $optionPropertyData = explode(":", $activeOptions[$i]);
                $optionId   = $optionPropertyData[0];
                $propertyId = $optionPropertyData[1];

                for($j=0; $j<sizeof($options); $j++){
                    if($options[$j]['id']==$optionId){
                        for($k=0; $k<sizeof($options[$j]['properties']); $k++){
                            if($options[$j]['properties'][$k]['id']==$propertyId){
                                $options[$j]['properties'][$k]['selected'] = 1;
                            } else {
                                $options[$j]['properties'][$k]['selected'] = 0;
                            }
                        }
                    }
                }
            }
        }


        $this->smarty->assign('options', $options);

//        echo "<pre>";
//        print_r($activeOptions);
//        echo "<hr>";
//        echo "<pre>";
//        print_r($options);
//        die();


        $this->smarty->assign('item', $item);
        $items = $this -> sections -> getAllSections($this->lang_id);


        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->products->getProductsFrontPagesCount($this->lang_id, $item['id'], 0)<=1 ))
            ||($this->_getParam('page')>1&&$this->products->getProductsFrontPagesCount($this->lang_id, $item['id'], 0)<$this->_getParam('page'))
        ){
            $this->_redirect("/catalog/sec/".$this -> _getParam('link')."/page/1");
        }

        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;

        $products = $this->products->getProductsFrontForPage($this->lang_id, $item['id'], 0, $page);

        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->products->getProductsFrontPagesCount($this->lang_id, $item['id'], 0));


        for($i=0; $i<sizeof($products); $i++){
            if($products[$i]['category_id']==0){
                $section = $this->sections->getSectionById($products[$i]['section_id']);
                $link = "/catalog/sec/".strip_tags(stripslashes($section['link']))."/product/".strip_tags(stripslashes($products[$i]['link']));
                $products[$i]['link'] = $link;
                $products[$i]['section_link'] = $section['link'];

            } else {
                $section = $this->sections->getSectionById($products[$i]['section_id']);
                $category = $this->sections->getSubSectionById($products[$i]['category_id']);
                $link = "/catalog/".strip_tags(stripslashes($section['link']))."/".strip_tags(stripslashes($category['link']))."/".strip_tags(stripslashes($products[$i]['link']));
                $products[$i]['link'] = $link;
                $products[$i]['section_link'] = $section['link'];
                $products[$i]['category_link'] = $category['link'];
            }

        }

        $this->smarty->assign('products', $products);

        $this->smarty->assign('activeLeftMenu', $this -> _getParam('link'));
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);

        if($this->_hasParam('link')){
            $this->smarty->assign('activeLink', $this->_getParam('link'));

        }

        $this->smarty->assign('path', '<a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>&nbsp;<a class="main" href="/catalog/'.stripslashes(strip_tags($item['link'])).'/">Каталог</a>&nbsp;<span class="main">/</span>&nbsp;'.stripslashes(strip_tags($item['title'])));

        $this->smarty->assign('PageBody', 'sections/template_section_page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function archiveAction() {

        $this->smarty->assign('activeLeftSection', $this -> _getParam('sectionlink'));
        $item = $this -> sections -> getSectionByLink($this -> _getParam('sectionlink'), $this->lang_id);
        $this->smarty->assign('secLink', $this -> _getParam('sectionlink'));
        $template = $item['template'];


        /* FILTER */
        if(isset($_SESSION['filter']['currSec'.$item['id']])){
            $data = $_SESSION['filter']['currSec'.$item['id']];

            $activeOptions = $this->products->getActiveOptionsProperties($data['options']);

            $this->smarty->assign('priceFrom', $data['price_from']);
            $this->smarty->assign('priceTo', $data['price_to']);
        }


        /* brands list */
        $brandsList = $this -> getBrandsList($item['id'], 0);



        if(sizeof($brandsList)>0){
            $brandsList = $this -> setBrandsListTo3Column($brandsList);

            if(isset($brandsList[0])){
                $this->smarty->assign('brandsList1', $brandsList[0]);
                if(isset($brandsList[1])){
                    $this->smarty->assign('brandsList2', $brandsList[1]);
                    if(isset($brandsList[2])){
                        $this->smarty->assign('brandsList3', $brandsList[2]);
                    }
                }
            }
            $this->smarty->assign('brandsList', $brandsList);
        }

        /*options*/
        $optionsIds = $this->sections->getSectionOptionsIds($item['id']);
        $options = $this->options->getAllSectionOptionsWithProperties($optionsIds);

        if(isset($activeOptions)&&sizeof($activeOptions)>0){
            for($i=0; $i<sizeof($activeOptions); $i++){
                $optionPropertyData = explode(":", $activeOptions[$i]);
                $optionId   = $optionPropertyData[0];
                $propertyId = $optionPropertyData[1];

                for($j=0; $j<sizeof($options); $j++){
                    if($options[$j]['id']==$optionId){
                        for($k=0; $k<sizeof($options[$j]['properties']); $k++){
                            if($options[$j]['properties'][$k]['id']==$propertyId){
                                $options[$j]['properties'][$k]['selected'] = 1;
                            } else {
                                $options[$j]['properties'][$k]['selected'] = 0;
                            }
                        }
                    }
                }
            }
        }

        $this->smarty->assign('options', $options);


        $this->smarty->assign('item', $item);
        $items = $this -> sections -> getAllSections($this->lang_id);


        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->products->getProductsFrontPagesCount($this->lang_id, $item['id'], 0, 0)<=1 ))
            ||($this->_getParam('page')>1&&$this->products->getProductsFrontPagesCount($this->lang_id, $item['id'], 0, 0)<$this->_getParam('page'))
        ){
            $this->_redirect("/catalog/sec/".$this -> _getParam('link')."/page/1");
        }

        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;

        $products = $this->products->getProductsFrontForPage($this->lang_id, $item['id'], 0, $page, 0);

        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->products->getProductsFrontPagesCount($this->lang_id, $item['id'], 0, 0));


        for($i=0; $i<sizeof($products); $i++){
            if($products[$i]['category_id']==0){
                $section = $this->sections->getSectionById($products[$i]['section_id']);
                $link = "/catalog/sec/".strip_tags(stripslashes($section['link']))."/product/".strip_tags(stripslashes($products[$i]['link']));
                $products[$i]['link'] = $link;
                $products[$i]['section_link'] = $section['link'];

            } else {
                $section = $this->sections->getSectionById($products[$i]['section_id']);
                $category = $this->sections->getSubSectionById($products[$i]['category_id']);
                $link = "/catalog/".strip_tags(stripslashes($section['link']))."/".strip_tags(stripslashes($category['link']))."/".strip_tags(stripslashes($products[$i]['link']));
                $products[$i]['link'] = $link;
                $products[$i]['section_link'] = $section['link'];
                $products[$i]['category_link'] = $category['link'];
            }

        }

        $this->smarty->assign('products', $products);

        $this->smarty->assign('activeLeftMenu', $this -> _getParam('link'));
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);

        if($this->_hasParam('link')){
            $this->smarty->assign('activeLink', $this->_getParam('link'));

        }

        $this->smarty->assign('path', '<a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>&nbsp;<a class="main" href="/catalog/'.stripslashes(strip_tags($item['link'])).'/">Каталог</a>&nbsp;<span class="main">/</span>&nbsp;'.stripslashes(strip_tags($item['title'])));

        $this->smarty->assign('PageBody', 'sections/template_archive_section_page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function indexBrandAction() {

        $this->smarty->assign('activeLeftSection', $this -> _getParam('sectionlink'));
        $item = $this -> sections -> getSectionByLink($this -> _getParam('sectionlink'), $this->lang_id);
        $this->smarty->assign('secLink', $this -> _getParam('sectionlink'));
        $template = $item['template'];


        /* FILTER */
        if(isset($_SESSION['filter']['currSec'.$item['id']])){
            $data = $_SESSION['filter']['currSec'.$item['id']];

            $activeOptions = $this->products->getActiveOptionsProperties($data['options']);

            $this->smarty->assign('priceFrom', $data['price_from']);
            $this->smarty->assign('priceTo', $data['price_to']);
        }

        $this->smarty->assign('brandLink', $this -> _getParam('brandlink'));
        $currBrand = $this->brands->getBrandByLink($this -> _getParam('brandlink'));


        /* brands list */
        $brandsList = $this -> getBrandsList($item['id'],1);

        if(sizeof($brandsList)>0){
            $brandsList = $this -> setBrandsListTo3Column($brandsList);

            if(isset($brandsList[0])){
                $this->smarty->assign('brandsList1', $brandsList[0]);
                if(isset($brandsList[1])){
                    $this->smarty->assign('brandsList2', $brandsList[1]);
                    if(isset($brandsList[2])){
                        $this->smarty->assign('brandsList3', $brandsList[2]);
                    }
                }
            }
            $this->smarty->assign('brandsList', $brandsList);
        }

        /*options*/
        $optionsIds = $this->sections->getSectionOptionsIds($item['id']);
        $options = $this->options->getAllSectionOptionsWithProperties($optionsIds);

        if(isset($activeOptions)&&sizeof($activeOptions)>0){
            for($i=0; $i<sizeof($activeOptions); $i++){
                $optionPropertyData = explode(":", $activeOptions[$i]);
                $optionId   = $optionPropertyData[0];
                $propertyId = $optionPropertyData[1];

                for($j=0; $j<sizeof($options); $j++){
                    if($options[$j]['id']==$optionId){
                        for($k=0; $k<sizeof($options[$j]['properties']); $k++){
                            if($options[$j]['properties'][$k]['id']==$propertyId){
                                $options[$j]['properties'][$k]['selected'] = 1;
                            } else {
                                $options[$j]['properties'][$k]['selected'] = 0;
                            }
                        }
                    }
                }
            }
        }

        $this->smarty->assign('options', $options);

        $this->smarty->assign('item', $item);
        $items = $this -> sections -> getAllSections($this->lang_id);


        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->products->getProductsFrontPagesCount($this->lang_id, $item['id'], $currBrand['id'])<=1 ))
            ||($this->_getParam('page')>1&&$this->products->getProductsFrontPagesCount($this->lang_id, $item['id'],  $currBrand['id'])<$this->_getParam('page'))
        ){
            $this->_redirect("/catalog/sec/".$this -> _getParam('link')."/page/1");
        }

        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;

        $products = $this->products->getProductsFrontForPage($this->lang_id, $item['id'],  $currBrand['id'], $page);

        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->products->getProductsFrontPagesCount($this->lang_id, $item['id'],  $currBrand['id']));


        for($i=0; $i<sizeof($products); $i++){
            if($products[$i]['category_id']==0){
                $section = $this->sections->getSectionById($products[$i]['section_id']);
                $link = "/catalog/sec/".strip_tags(stripslashes($section['link']))."/product/".strip_tags(stripslashes($products[$i]['link']));
                $products[$i]['link'] = $link;
                $products[$i]['section_link'] = $section['link'];

            } else {
                $section = $this->sections->getSectionById($products[$i]['section_id']);
                $category = $this->sections->getSubSectionById($products[$i]['category_id']);
                $link = "/catalog/sec/".strip_tags(stripslashes($section['link']))."/".strip_tags(stripslashes($category['link']))."/".strip_tags(stripslashes($products[$i]['link']));
                $products[$i]['link'] = $link;
                $products[$i]['section_link'] = $section['link'];
                $products[$i]['category_link'] = $category['link'];
            }

        }

        $this->smarty->assign('products', $products);

        $this->smarty->assign('activeLeftMenu', $this -> _getParam('link'));
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);

        if($this->_hasParam('link')){
            $this->smarty->assign('activeLink', $this->_getParam('link'));

        }

        $this->smarty->assign('path', '<a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>&nbsp;<a class="main" href="/catalog/'.stripslashes(strip_tags($item['link'])).'/">Каталог</a>&nbsp;<span class="main">/</span>&nbsp;'.stripslashes(strip_tags($item['title'])));

        $this->smarty->assign('PageBody', 'sections/template_section_brand_page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function archiveBrandAction() {

        $this->smarty->assign('activeLeftSection', $this -> _getParam('sectionlink'));
        $item = $this -> sections -> getSectionByLink($this -> _getParam('sectionlink'), $this->lang_id);
        $this->smarty->assign('secLink', $this -> _getParam('sectionlink'));
        $template = $item['template'];

        /* FILTER */
        if(isset($_SESSION['filter']['currSec'.$item['id']])){
            $data = $_SESSION['filter']['currSec'.$item['id']];

            $activeOptions = $this->products->getActiveOptionsProperties($data['options']);

            $this->smarty->assign('priceFrom', $data['price_from']);
            $this->smarty->assign('priceTo', $data['price_to']);
        }

        $this->smarty->assign('brandLink', $this -> _getParam('brandlink'));
        $currBrand = $this->brands->getBrandByLink($this -> _getParam('brandlink'));


        /* brands list */
        $brandsList = $this -> getBrandsList($item['id'], 0);

        if(sizeof($brandsList)>0){
            $brandsList = $this -> setBrandsListTo3Column($brandsList);

            if(isset($brandsList[0])){
                $this->smarty->assign('brandsList1', $brandsList[0]);
                if(isset($brandsList[1])){
                    $this->smarty->assign('brandsList2', $brandsList[1]);
                    if(isset($brandsList[2])){
                        $this->smarty->assign('brandsList3', $brandsList[2]);
                    }
                }
            }
            $this->smarty->assign('brandsList', $brandsList);
        }

        /*options*/
        $optionsIds = $this->sections->getSectionOptionsIds($item['id']);
        $options = $this->options->getAllSectionOptionsWithProperties($optionsIds);

        if(isset($activeOptions)&&sizeof($activeOptions)>0){
            for($i=0; $i<sizeof($activeOptions); $i++){
                $optionPropertyData = explode(":", $activeOptions[$i]);
                $optionId   = $optionPropertyData[0];
                $propertyId = $optionPropertyData[1];

                for($j=0; $j<sizeof($options); $j++){
                    if($options[$j]['id']==$optionId){
                        for($k=0; $k<sizeof($options[$j]['properties']); $k++){
                            if($options[$j]['properties'][$k]['id']==$propertyId){
                                $options[$j]['properties'][$k]['selected'] = 1;
                            } else {
                                $options[$j]['properties'][$k]['selected'] = 0;
                            }
                        }
                    }
                }
            }
        }

        $this->smarty->assign('options', $options);


        $this->smarty->assign('item', $item);
        $items = $this -> sections -> getAllSections($this->lang_id);


        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->products->getProductsFrontPagesCount($this->lang_id, $item['id'], $currBrand['id'], 0)<=1 ))
            ||($this->_getParam('page')>1&&$this->products->getProductsFrontPagesCount($this->lang_id, $item['id'],  $currBrand['id'], 0)<$this->_getParam('page'))
        ){
            $this->_redirect("/catalog/sec/".$this -> _getParam('link')."/page/1");
        }

        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;

        $products = $this->products->getProductsFrontForPage($this->lang_id, $item['id'],  $currBrand['id'], $page, 0);

        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->products->getProductsFrontPagesCount($this->lang_id, $item['id'],  $currBrand['id'], 0));


        for($i=0; $i<sizeof($products); $i++){
            if($products[$i]['category_id']==0){
                $section = $this->sections->getSectionById($products[$i]['section_id']);
                $link = "/catalog/sec/".strip_tags(stripslashes($section['link']))."/product/".strip_tags(stripslashes($products[$i]['link']));
                $products[$i]['link'] = $link;
                $products[$i]['section_link'] = $section['link'];

            } else {
                $section = $this->sections->getSectionById($products[$i]['section_id']);
                $category = $this->sections->getSubSectionById($products[$i]['category_id']);
                $link = "/catalog/sec/".strip_tags(stripslashes($section['link']))."/".strip_tags(stripslashes($category['link']))."/".strip_tags(stripslashes($products[$i]['link']));
                $products[$i]['link'] = $link;
                $products[$i]['section_link'] = $section['link'];
                $products[$i]['category_link'] = $category['link'];
            }

        }

        $this->smarty->assign('products', $products);

        $this->smarty->assign('activeLeftMenu', $this -> _getParam('link'));
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);

        if($this->_hasParam('link')){
            $this->smarty->assign('activeLink', $this->_getParam('link'));

        }

        $this->smarty->assign('path', '<a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>&nbsp;<a class="main" href="/catalog/'.stripslashes(strip_tags($item['link'])).'/">Каталог</a>&nbsp;<span class="main">/</span>&nbsp;'.stripslashes(strip_tags($item['title'])));

        $this->smarty->assign('PageBody', 'sections/template_archive_section_brand_page.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }


    public function findAction(){
//        echo "<pre>";
//        print_r($this->_getAllParams());
//        die();
        if($this->_hasParam('reset')&&$this->_getParam('reset')==1){
            unset($_SESSION['filter']);
        } else {
            $_SESSION['filter']['currSec'.$this->_getParam('currSec')] = $this->_getAllParams();
        }
        //die();
        $this->_redirect($this->_getParam('prevUrl'));
    }
    

    
    public function sectionbylinkAction() {
        $this->smarty->assign('activeLeftSection', $this -> _getParam('link'));
    	$item = $this -> sections -> getSectionByLink($this -> _getParam('link'), $this->lang_id);
        $template = $item['template'];


        /* brands list */
        $brandsList = $this -> getBrandsList($item['id']);

        if(sizeof($brandsList)>0){
            $brandsList = $this -> setBrandsListTo3Column($brandsList);

            if(isset($brandsList[0])){
                $this->smarty->assign('brandsList1', $brandsList[0]);
                if(isset($brandsList[1])){
                    $this->smarty->assign('brandsList2', $brandsList[1]);
                    if(isset($brandsList[2])){
                        $this->smarty->assign('brandsList3', $brandsList[2]);
                    }
                }
            }
            $this->smarty->assign('brandsList', $brandsList);
        }


        $this->smarty->assign('item', $item);
        $items = $this -> sections -> getAllSections($this->lang_id);

        $products = $this->products->getAllProductsByType($this->lang_id, $item['id']);

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

        $categories = $this->sections->getAllSubSections($item['id'], $this->lang_id);
        for($i=0; $i<sizeof($categories); $i++){
            $categories[$i]['products'] = $this->products->getAllProducts($this->lang_id, $item['id'], $categories[$i]['id']);
        }
        $this->smarty->assign('sub_products', $categories);

        $this->smarty->assign('activeLeftMenu', $this -> _getParam('link'));
        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);

        if($this->_hasParam('link')){
            $this->smarty->assign('activeLink', $this->_getParam('link'));

        }

        $this->smarty->assign('path', '<a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>&nbsp;<a class="main" href="/catalog/'.stripslashes(strip_tags($item['link'])).'/">Каталог</a>&nbsp;<span class="main">/</span>&nbsp;'.stripslashes(strip_tags($item['title'])));

        $this->smarty->assign('PageBody', 'sections/template1.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function getBrandsList($sectionId, $active){

        $brandsIds = $this->products->getBrandsIdsWithProductsBySectionId($sectionId);
        if(sizeof($brandsIds)>0){
            $brandsIdsArray = array();
            foreach($brandsIds as $value){
                $brandsIdsArray[] = $value['brand_id'];
            }
            $brandsIds = implode(',', $brandsIdsArray);

            $brandsList = $this->brands->getSortedBrands($this->lang_id, $brandsIds);

            for($i=0; $i<sizeof($brandsList); $i++){
                $brandsList[$i]['pCount'] = $this->products ->getProductsCountByBrandIdAndSectionId($brandsList[$i]['id'] ,$sectionId, $active);
            }
//            echo "<pre>";
//            print_r($brandsList);
//            die();
            $brandsListNew = array();

            for($i=0; $i<sizeof($brandsList); $i++){
                if($brandsList[$i]['pCount']>0){
                    $brandsListNew[] = $brandsList[$i];
                }
            }

            return $brandsListNew;
        } else {
            return array();
        }

    }

    public function setBrandsListTo3Column($brandsList){
        $brands = array();
        $counter = 0;

        $recordCount = ceil(sizeof($brandsList)/3);

        $currCount = 0;
        $column = array();


        for($i=0; $i<sizeof($brandsList); $i++){

            $currCount++;
            $column[] = $brandsList[$i];

            if($currCount>$recordCount-1&&$counter<2){
                $brands[$counter] = $column;
                $column = array();
                if($counter<2){
                    $counter++;
                    $currCount=0;
                }

                if($counter==2){
                    $column = array();
                    for($j=$i+1; $j<sizeof($brandsList); $j++){
                        $column[] = $brandsList[$j];
                    }
                    $brands[2] = $column;
                    $counter++;
                }
            }

        }

        return $brands;

    }

    public function productbylinkAction() {
        $product = $this -> products -> getProductByLink($this -> _getParam('productlink'), $this->lang_id);

//        echo "<pre>";
//        print_r($product);
//        die();

        //set images for slider
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
        $relatedProducts = $this->products->getActiveRecommendedProducts($product['id']);
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
//        for($i=0; $i<sizeof($products); $i++){
//            $products[$i]['section'] = $this -> _getParam('sectionlink');
//        }
        $this->smarty->assign('products', $products);


        $this->smarty->assign('PageBody', 'sections/product.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function categorybylinkAction() {

        $section = $this -> sections -> getSectionByLink($this -> _getParam('sectionlink'), $this->lang_id);
        $category = $this -> sections -> getSubSectionByLink($this -> _getParam('categorylink'), $this->lang_id);

        $this->smarty->assign('section', $section);
        $this->smarty->assign('category',$category);

        $this->smarty->assign('activeLeftSection', $this -> _getParam('sectionlink'));
        $this->smarty->assign('activeLeftCategory',$this -> _getParam('categorylink'));

        $products = $this->products->getAllProducts($this->lang_id, $section['id'], $category['id']);

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

        $this->smarty->assign('meta_title', $category['meta_title']);
        $this->smarty->assign('meta_keywords', $category['meta_keywords']);
        $this->smarty->assign('meta_description', $category['meta_description']);



        $path = '<a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>
                 <a class="main" href="/catalog/'.stripslashes(strip_tags($section['link'])).'/">Каталог</a>&nbsp;<span class="main">/</span>&nbsp;
                 <a class="main" href="/catalog/'.stripslashes(strip_tags($section['link'])).'/">'.stripslashes(strip_tags($section['title'])).'</a>&nbsp;<span class="main">/</span>
                 '.stripslashes(strip_tags($category['title']));

        $this->smarty->assign('path', $path);

        if(!$section['template']){
            $this->smarty->assign('PageBody', 'sections/index2.tpl');
        } else {
            $this->smarty->assign('PageBody', 'sections/index.tpl');
        }

        $this->smarty->display('layouts/sub.tpl');
    }
    
//    public function categorybylinkAction() {
//
//    	$item = $this -> sections -> getSubSectionByLink($this -> _getParam('link'), $this->lang_id);
//        $this->smarty->assign('item', $item);
//
//        $this->smarty->assign('meta_title', $item['meta_title']);
//        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
//        $this->smarty->assign('meta_description', $item['meta_description']);
//
//        $this->smarty->assign('PageBody', 'sections/index.tpl');
//        $this->smarty->display('layouts/sub.tpl');
//    }
    
    
    
    
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

    public function getFileAction(){
        $fileId = $this->_getParam('id');
        $file = $this -> products -> getFileById($fileId);
        $path = './tmp/files/';
        $this -> File -> getFile($path, $file['filename'], $file['filename_original']);
    }

    /************************************************************************************************/
    /************************************* REVIEWS **************************************************/
    /************************************************************************************************/
    public function addReviewAction(){
        if(isset($_SESSION['loginNamespace']['storage'])){
            $data = array();
            $data['description'] = $this->_getParam('review');
            $data['product_id']  = $this->_getParam('product_id');
            $data['user_id']     = $_SESSION['loginNamespace']['storage']->id;
            $data['username']    = $_SESSION['loginNamespace']['storage']->first_name;
            $this -> products -> addReview($data);
            echo 1;
        } else {
            echo 2;
        }
    }

    public function addReviewCommentAction(){
        if(isset($_SESSION['loginNamespace']['storage'])){
            $data = array();
            $data['description'] = $this->_getParam('review_comment');
            $data['review_id']   = $this->_getParam('review_id');
            $data['user_id']     = $_SESSION['loginNamespace']['storage']->id;
            $data['username']    = $_SESSION['loginNamespace']['storage']->first_name;
            $this -> products -> addReviewComment($data);
            echo 1;
        } else {
            echo 2;
        }
    }
}
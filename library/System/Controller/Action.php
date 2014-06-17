<?php

Zend_Loader::loadClass('Zend_Controller_Action');
/** Load database object model */
include_once ROOT . 'application/models/AuthModel.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

include_once ROOT . 'application/models/LangDb.php';

include_once ROOT . 'application/models/SettingsDb.php';

include_once ROOT . 'application/models/SectionsDb.php';

include_once ROOT . 'application/models/ReviewsDb.php';

include_once ROOT . 'application/models/UsersDb.php';

include_once ROOT . 'application/models/NewsDb.php';

include_once ROOT . 'application/models/ProductsDb.php';

include_once ROOT . 'application/models/OrdersDb.php';

include_once ROOT . 'application/models/BannersDb.php';

class System_Controller_Action extends Zend_Controller_Action
{
    protected $db;

    protected $smarty;
    
    protected $Content;

    protected $news;

    protected $banners;
    
    public $auth;

    public $request;
    
    public $lang_id;
    
    public $settings;
    
    protected $lang;
    
    protected $static_settings;
    
    public $member_id = 0;
    
    protected $sections;
    
    protected $reviews;
    
	protected $users;

    protected $products;
	
	public $userId;
	
	public $frontendLangParams;

    public $path = array();
	
    public function init()
    {
        $this -> db = Zend_Registry::get('db');

        Zend_Db_Table_Abstract::setDefaultAdapter($this->db);
        $this -> smarty = Zend_Registry::get('smarty');
        $this -> request = $this -> getRequest();
        $this->users = new UsersDb();
        $this -> auth = new Auth();
		$this -> smarty -> assign('site_url', SITE_URL);
		$this -> smarty -> assign('site_url2', "http://".$_SERVER['HTTP_HOST']);

        $this -> Content = new ContentManagerDb();

        $this->Content->setCharset();

        if($this -> auth -> CheckAuth()) {
        	$this -> smarty -> assign('UserLogedIn', true);
        	$this->userId = $_SESSION['loginNamespace']['storage']->id;
            $userInfo = $this -> users -> getUserById($this->userId);
//            echo "<pre>";
//            print_r($userInfo);
//            die();
            $this -> smarty -> assign('userInfo', $userInfo);
        }
        $this->lang = new LangDb();


        $this -> smarty -> assign('current_menu', $this -> _getParam('module'));
        
        $this -> smarty -> assign('curr_pos', $this->_getAllParams());
        
        
		//*****************************************************************************
		//******************************* Language ************************************
		//*****************************************************************************
		//unset($_SESSION); die();
		if($this->_hasParam('lang_title')){
			$currLang = $this->lang->getLangByLangName($this->_getParam('lang_title'));
			$_SESSION['lang'] = $currLang['lang_id'];
			$_SESSION['lang_title'] = $currLang['short_title_lower'];				
		} else {
			if(!isset($_SESSION['lang'])){
				$_SESSION['lang'] = 1;
				$_SESSION['lang_title'] = "ru";				
			}
		}
		
		$this->lang_id = $_SESSION['lang'];
		$this->smarty->assign('activeLanguage', $this->lang->getLangByLangName($_SESSION['lang_title']));
		
		$this->frontendLangParams = $this->lang->getFrontendLangParams($_SESSION['lang_title']);
		$this -> smarty -> assign('frontendLangParams', $this->frontendLangParams);		
		

        $this -> smarty -> assign('lang_title', $_SESSION['lang_title']);
		$this -> smarty -> assign('lang_id', $_SESSION['lang']);
		$this -> smarty -> assign('request_uri', $_SERVER['REQUEST_URI']);

		if($this->_getParam('module')!='languages'){
			$_SESSION['prev_info']['prev_url'] = $_SERVER['REQUEST_URI'];
			$_SESSION['prev_info']['prev_param'] = $this->_getAllParams();
		}

		//*****************************************************************************
		//******************************* LANGUAGES ***********************************
		//*****************************************************************************		
		$this->smarty->assign('languages', $languages = $this->Content->getLanguagesWithoutCurrent($this->lang_id));
		$this->smarty->assign('languages_count', sizeof($languages));
		
		//*****************************************************************************
		//******************************* SECTIONS ************************************
		//*****************************************************************************
		$this->sections  = new SectionsDb();
		$sectionsList = $this->sections->getAllSectionsByType($this->lang_id);
		for($i=0; $i<sizeof($sectionsList); $i++){
			$sectionsList[$i]['categoriesList'] = $this->sections->getAllSubSections($sectionsList[$i]['id'], $this->lang_id);
		}
		$this->smarty->assign('sectionsList', $sectionsList);
		
		$sectionsBottomMenu = $this->sections->getAllSectionsByType($this->lang_id,1);
		for($i=0; $i<sizeof($sectionsBottomMenu); $i++){
			$sectionsBottomMenu[$i]['categoriesBottomMenu'] = $this->sections->getAllSubSections($sectionsBottomMenu[$i]['id'], $this->lang_id);
		}
		$this->smarty->assign('sectionsBottomMenu', $sectionsBottomMenu);

        //*****************************************************************************
        //******************************* POPULAR PRODUCTS ****************************
        //*****************************************************************************
//        $this->reviews = new ReviewsDb();
//        $review = $this->reviews->getLastItem($this->lang_id);
//        if(!empty($review)){
//            $user = $this->users->getUserById($review['user_id']);
//            $review['user_name'] = $user['first_name']." ".$user['last_name'];
//        }
//        $this->smarty->assign('review', $review);


        //*****************************************************************************
		//******************************* products ************************************
		//*****************************************************************************		
		$this->products = new ProductsDb();
		$products = $this -> products -> getPopular4Products($this->lang_id);
        for($i=0; $i<sizeof($products); $i++){
            if($products[$i]['category_id']==0){
                $section = $this->sections->getSectionById($products[$i]['section_id']);
                $link = "/catalog/sec/".strip_tags(stripslashes($section['link']))."/product/".strip_tags(stripslashes($products[$i]['link']))."/";
                $products[$i]['link'] = $link;
                $products[$i]['section_link'] = $section['link'];

            } else {

                $section = $this->sections->getSectionById($products[$i]['section_id']);
                $category = $this->sections->getSubSectionById($products[$i]['category_id']);
                $link = "/catalog/sec/".strip_tags(stripslashes($section['link']))."/".strip_tags(stripslashes($category['link']))."/".strip_tags(stripslashes($products[$i]['link']))."/";
                $products[$i]['link'] = $link;
                $products[$i]['section_link'] = $section['link'];
                $products[$i]['category_link'] = $category['link'];

            }

        }
		$this->smarty->assign('popularProducts', $products);
		

		
		//*****************************************************************************
		//******************************* SETTINGS ************************************
		//*****************************************************************************
		$data = $this->Content->getSettingsByLangId($_SESSION['lang']);

		$this->settings = $data;
		$this -> smarty -> assign('settings', $data);

        $this -> smarty -> assign('top_phone', $this->Content->getPageByLink('top-phone.html', $this->lang_id));
		$this -> smarty -> assign('footer_text', $this->Content->getPageByLink('footer.html', $this->lang_id));

		
		$this->static_settings = new SettingsDb();
        $static_settings = $this->static_settings->getSettingsById(1);
        $this->smarty->assign('static_settings', $static_settings);

        $this->smarty->assign('meta_title', stripslashes($static_settings->settings_meta_title));
        $this->smarty->assign('meta_description', stripslashes($static_settings->settings_meta_description));
        $this->smarty->assign('meta_keywords', stripslashes($static_settings->settings_meta_keywords));
		
		//*****************************************************************************
		//******************************* Left Navigation *****************************
		//*****************************************************************************
        $left_navigation = $this->sections->getAllSections($this->lang_id);

		$this->smarty->assign('left_navigation', $left_navigation);
        $this->smarty->assign('left_navigation_count', sizeof($left_navigation));

        $this->smarty->assign('section1', $this->sections->getSectionById(1));
        $this->smarty->assign('section2', $this->sections->getSectionById(2));
        $this->smarty->assign('section3', $this->sections->getSectionById(3));
        $this->smarty->assign('section4', $this->sections->getSectionById(4));
        $this->smarty->assign('section5', $this->sections->getSectionById(5));
        $this->smarty->assign('section6', $this->sections->getSectionById(6));

        $this->banners = new BannersDb();
        $this -> smarty -> assign('mainBanners', $this->banners->getAllBanners($this->lang_id));

//		$this->reviews = new ReviewsDb();
//		$this->smarty->assign('one_review', $this->reviews->getItemById(1));
        //*****************************************************************************
        //******************************* Shopping Cart *******************************
        //*****************************************************************************
        if(isset($_SESSION['shopping_cart'])&&sizeof($_SESSION['shopping_cart'])>0){
            $orders = new OrdersDb();
            if(isset($_SESSION['shopping_cart_skidka'])){
                $skidka = $_SESSION['shopping_cart_skidka'];
            } else {
                $skidka = 0;
            }
            $shopping_cart = $orders->calculate($_SESSION['shopping_cart'], $skidka);
            $this->smarty->assign('total_count', $shopping_cart['total_count']);
            $this->smarty->assign('total_price', $shopping_cart['total_price']);
            $this->smarty->assign('total_price_s', $shopping_cart['total_price_s']);
            $this->smarty->assign('skidka', $shopping_cart['skidka']);
        } else {
            $this->smarty->assign('total_count', 0);
            $this->smarty->assign('total_price', 0);
            $this->smarty->assign('total_price_s', 0);
            $this->smarty->assign('skidka', 0);
        }

        if(isset($_SESSION['new_product_added'])&&$_SESSION['new_product_added']==1){
            $this->smarty->assign('new_product_added', 1);
            unset($_SESSION['new_product_added']);
        }

        //unset($_SESSION['shopping_cart']);

        //*****************************************************************************
        //******************************* PATH ****************************************
        //*****************************************************************************
        $controller = $this->_getParam('controller');
        $action = $this->_getParam('action');
        $module = $this->_getParam('module');
        if($controller=='index'&&$action=='index'&&$module=='default'){
            //$this->smarty->assign('path', '');
        } else {
//            if($module=='content'&&$controller=='pages'){
//                //die();
//                if($this->_hasParam('link')){
//                    echo $this->_getParam('link'); die();
//                    $pageData = $this->Content->getPageByLink($this->_getParam('link'), $this->lang_id);
//                    print_r($pageData); die();
//                    $this->smarty->assign('path', '<a href="/">Главная</a> / '.stripslashes(strip_tags($pageData['title'])));
//                } else {
//                    $pageData = $this->Content->getPageByLink($action, $this->lang_id);
//                    $this->smarty->assign('path', '<a href="/">Главная</a> / '.stripslashes(strip_tags($pageData['title'])));
//                }
//            }
//            if($module=='map'&&$controller=='index'){
//                $this->smarty->assign('path', '<a href="/">Главная</a> / Карта сайта');
//            }
//            if($module=='reviews'&&$controller=='index'){
//                $pageData = $this->Content->getPageByLink("reviews", $this->lang_id);
//                $this->smarty->assign('path', '<a href="/">Главная</a> / '.stripslashes(strip_tags($pageData['title'])));
//            }
//            if($module=='contact'&&$controller=='index'){
//                $pageData = $this->Content->getPageByLink("order-online", $this->lang_id);
//                $this->smarty->assign('path', '<a href="/">Главная</a> / '.stripslashes(strip_tags($pageData['title'])));
//            }
//            if($module=='search'&&$controller=='index'){
//                $this->smarty->assign('path', '<a href="/">Главная</a> / Поиск по каталогу');
//            }
//            if($module=='news'&&$controller=='index'){
//                if($action=='index'){
//                    $this->smarty->assign('path', '<a href="/">Главная</a> / Новости');
//                } else {
//                    $this->news = new NewsDb();
//                    if($this->_hasParam('new_id')){
//                        $pageData =$this->news->getNewById($this->_getParam('new_id'));
//                        $this->smarty->assign('path', '<a href="/">Главная</a> / '.stripslashes(strip_tags($pageData['new_title'])));
//                    } else{
//                        $this->smarty->assign('path', '<a href="/">Главная</a> / Новости');
//                    }
//
//                }
//            }
//            if($module=='sections'&&$controller=='index'){
//                if($this->_hasParam('link')){
//                    $pageData =$this->sections->getSectionByLink($this->_getParam('link'), $this->lang_id);
//                    $this->smarty->assign('path', '<a href="/">Главная</a> / <a href="/catalog/">Каталог</a> / '.stripslashes(strip_tags($pageData['title'])));
//                }elseif($this->_hasParam('sectionlink')){
//                    $pageData =$this->sections->getSectionByLink($this->_getParam('sectionlink'), $this->lang_id);
//
//                    if($this->_hasParam('productlink')){
//                        $product = new ProductsDb();
//                        $pageData2 = $product->getProductByLink($this -> _getParam('productlink'), $this->lang_id);
//                        $this->smarty->assign('path', '<a href="/">Главная</a> / <a href="/catalog/">Каталог</a> / <a href="/catalog/'.$pageData['link'].'/">'.stripslashes(strip_tags($pageData['title'])).'</a> / '.stripslashes(strip_tags($pageData2['title'])));
//                    } else {
//                        $this->smarty->assign('path', '<a href="/">Главная</a> / <a href="/catalog/">Каталог</a> / '.stripslashes(strip_tags($pageData['title'])));
//                    }
//                } else {
//                    $this->smarty->assign('path', '<a href="/">Главная</a> / Каталог');
//                }
//            }
            //print_r($this->_getAllParams());
            //$this->smarty->assign('path', '');
        }





    }

    public function getInstance()
    {
        return $this;
    }

    public function debug($data, $title = '')
    {
        if(!empty($title))
        $title = '<b style="color: red;">' . $title . '</b>';
        Zend_Debug::dump($data, $title);
    }

}

?>
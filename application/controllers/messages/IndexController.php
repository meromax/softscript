<?php
include_once ROOT . 'application/models/OrdersDb.php';

include_once ROOT . 'application/models/LangDb.php';

include_once ROOT . 'application/models/TThemesDb.php';

include_once ROOT . 'application/models/TDirectionPriceDb.php';

include_once ROOT . 'application/models/SettingsDb.php';

include_once ROOT . 'application/models/FilesDb.php';
/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Messages_IndexController extends System_Controller_Action {
    
	protected $orders;
	protected $languages;
	protected $ttemes;
	protected $tdp;
    protected $files;
	protected $sett;
	
    public function init() {
        parent::init();
        
		if(!isset($_SESSION['loginNamespace'])){
			//$this->_redirect('/');
		}        
        
        $this->orders = new OrdersDb();
        $this->languages = new LangDb();
        $this->ttemes = new TThemesDb();
        $this->tdp = new TDirectionPriceDb();
        $this->files = new FilesDb();
        $this->sett  = new SettingsDb();
    }
    
    public function indexAction() {
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> orders ->getOrdersPagesCountByUserId($this->userId)<=1 ))
			||($this->_getParam('page')>1&&$this -> orders ->getOrdersPagesCountByUserId($this->userId)<$this->_getParam('page'))
		){
			$this->_redirect("/orders/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $orders = $this -> orders -> getOrdersForPageByUserId($page, $this->userId);

        for($i=0; $i<sizeof($orders); $i++){
            if(mb_strlen($orders[$i]['filename_original'], 'utf-8')>14){
                $orders[$i]['filename_original'] = mb_substr($orders[$i]['filename_original'], 0, 11, 'utf-8')." ...";
            }
            if(mb_strlen($orders[$i]['filename_original'], 'utf-8')>14){
                $orders[$i]['filename_original'] = mb_substr($orders[$i]['filename_original'], 0, 11, 'utf-8')." ...";
            }
        }

        $this -> smarty -> assign('orders', $orders);
       
        $this -> smarty -> assign('page_count', $this -> orders ->getOrdersPagesCountByUserId($this->userId));
        $this->smarty->assign('page_num', $page+1);
        
        $this -> smarty -> assign('orderscount', sizeof($orders));
        
        $this -> smarty -> assign('PageBody', 'orders/index.tpl');
        $this -> smarty -> assign('Title', $this->frontendLangParams['TITLE__ORDERS']);
        $this -> smarty -> display('layouts/sub.tpl');
    }

    public function viewAction(){
    	$order = $this->orders->getOrderById($this->_getParam('orderId'));
    	$tdata = explode("|", $order['translation']);
    	$langFrom = $this->languages->getLangById($tdata[0]);
    	$langTo   = $this->languages->getLangById($tdata[1]);
    	$ttheme   = $this->ttemes->getTranslationThemeById($order['translation_theme']);
    	
    	$order['langFrom'] = $langFrom;
    	$order['langTo'] = $langTo;
    	$order['ttheme'] = $ttheme;
    	
    	$order['pay_status_title'] = $this->frontendLangParams['STATUSES__STATUS'.$order['pay_status']];
    	
    	$tdpData = $this->tdp->getTranslationDirectionPriceById($langFrom['lang_id'], $langTo['lang_id']);
    	
    	$totalPrice = $this->getAmount($tdpData, $order['letters_count']);
    	
    	$totalPrice = (int)$totalPrice + (int)$ttheme['price'];
    	
    	$order['totalPrice'] = $totalPrice;

    	$this -> smarty -> assign('order', $order);
        $this -> smarty -> assign('PageBody', 'orders/view.tpl');
        $this -> smarty -> assign('Title', $this->frontendLangParams['TITLE__ORDERS']);
        $this -> smarty -> display('layouts/sub.tpl');    	
    }
    
    public function previewOrderAction(){

        $filenames = $this->files->uploadFileAdd(time(), '/orders_files/');


        $langFrom = $this->languages->getLangById($this->_getParam('lang_from_id'));
        $langTo = $this->languages->getLangById($this->_getParam('lang_to_id'));
    	$ttheme   = $this->ttemes->getTranslationThemeById($this->_getParam('ttheme_id'));


       	$order['langFrom'] = $langFrom;
    	$order['langTo'] = $langTo;
    	$order['ttheme'] = $ttheme;
        $order['translation_text'] = $this->_getParam('translation_text');
        $order['translation_text_letters_count'] = mb_strlen($order['translation_text'],'utf-8');

        $tdpData = $this->tdp->getTranslationDirectionPriceById($this->_getParam('lang_from_id'), $this->_getParam('lang_to_id'));
        
        if($filenames!=''){
            $order['filenames'] = $filenames;
            $order['file_letters_count'] = mb_strlen(file_get_contents("./orders_files/".$filenames[1]));
            $order['totalFilePrice'] = $this->getAmount($tdpData, $order['file_letters_count']);
        }


        if($order['translation_text']!=''){
            $filename = $this->files->createFile($order['translation_text']);
            $order['filename'] = $filename;
            $order['file_letters_count2'] = $order['translation_text_letters_count'];
            $order['totalFilePrice2'] = $this->getAmount($tdpData, $order['translation_text_letters_count']);
        }



        $order['totalTextPrice'] = $this->getAmount($tdpData, $order['translation_text_letters_count']);

        if(isset($order['totalFilePrice'])){
            $order['totalPrice'] = (int)$order['totalFilePrice'];
            $order['letters_count'] = (int)$order['file_letters_count'];
            $order['totalPrice'] = (int)$order['totalPrice'] + (int)$ttheme['price'];
        }

        if(isset($order['totalFilePrice2'])){
            $order['totalPrice2'] = (int)$order['totalTextPrice'];
            $order['letters_count2'] = (int)$order['translation_text_letters_count'];
            $order['totalPrice2'] = (int)$order['totalPrice2'] + (int)$ttheme['price'];
        }


        $_SESSION['order'] = $order;

    	$this -> smarty -> assign('order', $order);
        $this -> smarty -> assign('PageBody', 'orders/preview.tpl');
        $this -> smarty -> assign('Title', $this->frontendLangParams['TITLE__ORDERS']);
        $this -> smarty -> display('layouts/sub.tpl');     	
    }

    public function previewOrder2Action(){

        $filenames = $this->files->uploadFileAdd(time(), '/orders_files/');


        $langFrom = $this->languages->getLangById($this->_getParam('lang_from_id'));
        $langTo = $this->languages->getLangById($this->_getParam('lang_to_id'));
    	$ttheme   = $this->ttemes->getTranslationThemeById($this->_getParam('ttheme_id'));


       	$order['langFrom'] = $langFrom;
    	$order['langTo'] = $langTo;
    	$order['ttheme'] = $ttheme;
        $order['translation_text'] = $this->_getParam('translation_text');
        $order['translation_text_letters_count'] = mb_strlen($order['translation_text'],'utf-8');

        $tdpData = $this->tdp->getTranslationDirectionPriceById($this->_getParam('lang_from_id'), $this->_getParam('lang_to_id'));

        if($filenames!=''){
            $order['filenames'] = $filenames;
            $order['file_letters_count'] = mb_strlen(file_get_contents("./orders_files/".$filenames[1]));
            $order['totalFilePrice'] = $this->getAmount($tdpData, $order['file_letters_count']);
        }


        if($order['translation_text']!=''){
            $filename = $this->files->createFile($order['translation_text']);
            $order['filename'] = $filename;
            $order['file_letters_count2'] = $order['translation_text_letters_count'];
            $order['totalFilePrice2'] = $this->getAmount($tdpData, $order['translation_text_letters_count']);
        }



        $order['totalTextPrice'] = $this->getAmount($tdpData, $order['translation_text_letters_count']);

        if(isset($order['totalFilePrice'])){
            $order['totalPrice'] = (int)$order['totalFilePrice'];
            $order['letters_count'] = (int)$order['file_letters_count'];
            $order['totalPrice'] = (int)$order['totalPrice'] + (int)$ttheme['price'];
        }

        if(isset($order['totalFilePrice2'])){
            $order['totalPrice2'] = (int)$order['totalTextPrice'];
            $order['letters_count2'] = (int)$order['translation_text_letters_count'];
            $order['totalPrice2'] = (int)$order['totalPrice2'] + (int)$ttheme['price'];
        }


        $_SESSION['order'] = $order;

    	$this -> smarty -> assign('order', $order);
        $this -> smarty -> assign('PageBody', 'orders/preview2.tpl');
        $this -> smarty -> assign('Title', $this->frontendLangParams['TITLE__ORDERS']);
        $this -> smarty -> display('layouts/sub.tpl');
    }

    public function saveAction(){

        if(isset($_SESSION['order'])){
            $_SESSION['order']['user_id'] = $this->userId;
            $this->orders->addOrder($_SESSION['order']);
            unset($_SESSION['order']);
            $this->_redirect("/complete.html");
        } else {
            $this->_redirect("/orders/page/1");
        }

    }


    public function save2Action(){

        if(isset($_SESSION['order'])){
            $_SESSION['order']['user_id'] = $this->userId;
            $this->orders->addOrder($_SESSION['order']);
            unset($_SESSION['order']);
            $this->_redirect("/complete.html");
        } else {
            $this->_redirect("/orders/page/1");
        }

    }

    public function getAmount($data, $letters_count){
    	//echo $letters_count; die();
    	if(!empty($data)){
    		if((int)$letters_count<(int)$data['letters_count']){
    			return $data['price'];
    		} else {
    			return $data['price']*(intval($letters_count)/intval($data['letters_count']));
    		}
    	} else {
    		return 0;
    	}
    }
    
    public function completeAction(){
        $this->smarty->assign('Title', 'Order Completed');
        $this->smarty->assign('PageBody', 'orders/complete.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }    
    
    public function getfileAction(){
        $type = $this->_getParam('type');
    	$orderId = $this->_getParam('id');
		$orderData = $this -> orders -> getUserOrder($this->userId, $orderId);
		if(!empty($orderData)){
            if($type==''){
    		    $this -> files -> getFile('orders_files/', $orderData['filename'], $orderData['filename_original']);
            } else {
                $this -> files -> getFile('orders_files/', $orderData['filename2'], $orderData['filename_original2']);
            }
		}
    }    
    
    public function getfiletAction(){
    	$orderId = $this->_getParam('id');
		$orderData = $this -> orders -> getUserReadyOrder($this->userId, $orderId);
		if(!empty($orderData)){
    		$this -> files -> getFile('orders_files/', $orderData['filename_translated'], $orderData['filename_translated_original']);    	
		}
    } 
    
    
    public function step1Action(){
    	$_SESSION['order']['sitetype_id'] = $this->_getParam('sitetype');
    	$_SESSION['order']['cms_id'] = $this->_getParam('cms');
    	$this->_redirect('/step2_page1.html');
    }
    
    public function paymentAction(){
        if(isset($_SESSION['loginNamespace']['storage']->member_id)&&isset($_SESSION['order'])){
        
	    	$_SESSION['order']['member_id'] = $_SESSION['loginNamespace']['storage']->member_id;
	    	
	    	$sitetype = $this->site->getSiteTypesItemById($_SESSION['order']['sitetype_id']);
	    	$cms      = $this->site->getCMSItemById($_SESSION['order']['cms_id']);
	    	$design   = $this->site->getDesignItemById($_SESSION['order']['design_id']);
	    	$_SESSION['order']['price'] = number_format($sitetype['price']+$cms['price']+$design['price'],2);
	    	$this->smarty->assign('sitetype', $sitetype);
	    	$this->smarty->assign('cms', $cms);
	    	$this->smarty->assign('design', $design);
	    	$this->smarty->assign('order', $_SESSION['order']);
	    	//$this->order->addOrder($_SESSION['order']);
	    	        	
        	//print_r($_SESSION['order']);
        	$settings = $this->sett->getSettingsById(1);
        	
        	
    		
    		if(isset($settings->settings_roboxchange_testmode)){
    			$this->smarty->assign('testmode', 1);
    		} else {
    			
				//print_r($_SESSION['order']);
		    	$sitetype = $this->site->getSiteTypesItemById($_SESSION['order']['sitetype_id']);
		    	$cms      = $this->site->getCMSItemById($_SESSION['order']['cms_id']);
		    	$design   = $this->site->getDesignItemById($_SESSION['order']['design_id']);
		    	//real account
				//$mrh_login = "demo";
				//$mrh_pass1 = "Morbid11";
		    	//demo accaunt
		    	$static_settings = $this->sett->getSettingsById(1);

				$mrh_login = $static_settings->settings_roboxchange_username;
				$mrh_pass1 = $static_settings->settings_roboxchange_password;
				$this->smarty->assign('mrh_login', $mrh_login);
				$this->smarty->assign('mrh_pass1', $mrh_pass1);
				
				// ����� ������
				// number of order
				$inv_id = 0;
				$this->smarty->assign('inv_id', $inv_id);
				// �������� ������
				// order description
				//$inv_desc = iconv('windows-1251','utf-8',"����������� ������������ �� ROBOKASSA");
				$inv_desc = $sitetype['title'];
				$this->smarty->assign('inv_desc', $inv_desc);
				// ����� ������
				// sum of order
				$out_summ = '0.01';//_SESSION['order']['price'];
				$this->smarty->assign('out_summ', $out_summ);
				// ��� ������
				// code of goods
				$shp_item = 1;
				$this->smarty->assign('shp_item', $shp_item);
				// ������������ ������ �������
				// default payment e-currency
				$in_curr = "PCR";
				$this->smarty->assign('in_curr', $in_curr);
				// ����
				// language
				$culture = "ru";
				$this->smarty->assign('culture', $culture);
				// ���������
				// encoding
				$encoding = "utf-8";
				$this->smarty->assign('encoding', $encoding);
				// ������������ �������
				// generate signature
				$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");
				
		    	$this->smarty->assign('crc', $crc);
		    	
		    	$url = "https://merchant.roboxchange.com/Handler/MrchSumPreview.ashx?".
			      "MrchLogin=$mrh_login&OutSum=$out_summ&InvId=$inv_id&IncCurrLabel=$in_curr".
			      "&Desc=$inv_desc&SignatureValue=$crc&Shp_item=$shp_item".
			      "&Culture=$culture&Encoding=$encoding";
    			$_SESSION['rorboxchange_form'] = $url;
    			//echo $url;
    			$this->smarty->assign('url', $url);
    			$this->smarty->assign('testmode', 0);
    		}
	        $this->smarty->assign('Title', 'Login Or Registration');
	        $this->smarty->assign('PageBody', 'order/payment.tpl');
	        $this->smarty->display('layouts/sub.tpl');
    	} else {
    		$this->_redirect('/login_or_reg.html');
    	}
    }
    
    public function payAction(){
    	
    	$settings = $this->sett->getSettingsById(1);
    	if(isset($settings->settings_roboxchange_testmode)){
    		
	    	$sitetype = $this->site->getSiteTypesItemById($_SESSION['order']['sitetype_id']);
	    	$cms      = $this->site->getCMSItemById($_SESSION['order']['cms_id']);
	    	$design   = $this->site->getDesignItemById($_SESSION['order']['design_id']);
	    	$_SESSION['order']['price'] = number_format($sitetype['price']+$cms['price']+$design['price'],2);
	    	$this->order->addOrder($_SESSION['order']);
			unset($_SESSION['order']);
			
    		$this->_redirect("/payment_success.html");
    	} else {
    		$this->_redirect("/payment_success.html");
    	}
    }
    
    
    public function paymentresultAction(){

    }
    
    public function paymentsuccessAction(){
        $this->smarty->assign('Title', 'Order successfully paid');
        $this->smarty->assign('PageBody', 'order/payment_success.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }
    
    public function paymentfailAction(){
        $this->smarty->assign('Title', 'Order successfully paid');
        $this->smarty->assign('PageBody', 'order/payment_fail.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }
    
    
    
    public function precompleteAction(){
    	$_SESSION['order']['sitename']  = $this->_getParam('sitename');
    	$_SESSION['order']['domain']    = $this->_getParam('domain').$this->_getParam('domain_zone');
    	if(!isset($_SESSION['loginNamespace']['storage']->member_id)){
    		$this->_redirect('/login_or_reg.html');	
    	} else {
	    	$this->_redirect('/payment.html');
    	}
    }
    
    public function pageAction() {

    	if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->News->getPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this->News->getPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/news_page1.html");
		}
    	$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
    	$items = $this->News->getNewsForPage($this->lang_id, $page);
    	
    	$this->smarty->assign('items', $items);
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
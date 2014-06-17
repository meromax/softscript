<?php
include_once ROOT . 'application/models/SitesDb.php';

include_once ROOT . 'application/models/OrdersDb.php';

include_once ROOT . 'application/models/SettingsDb.php';
/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Order_IndexController extends System_Controller_Action {
    
	protected $site;
	protected $order;
	protected $sett;z
	
    public function init() {
        parent::init();
        $this->site = new SitesDb();
        $this->order = new OrdersDb();
        $this->sett  = new SettingsDb();
        //print_r($_SESSION['order']);
    }
    
    public function getcmsAction(){
    	$sitetype_id = $this->_getParam('sitetype_id');
    	$cms = $this->site->getCMSBySiteTypeId($sitetype_id);

    	if(sizeof($cms)>0){
	    	$str = '<select name="cms" id="cms">';
	    	for($i=0; $i<sizeof($cms); $i++){
	    		$str .= '<option value="'.$cms[$i]['id'].'">'.trim(stripslashes($cms[$i]['title'])).'</option>';
	    	}
	    	$str .= '</select>';
    	} else {
	    	$str = '<select name="cms" id="cms" disabled><option> -------- </option></select>';
    	}
    	ob_clean();
    	echo $str;
    }
    
    public function choosingAction(){
        $this->smarty->assign('Title', 'Design Choice');
        $this->smarty->assign('PageBody', 'search/chooser_main.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }
    
    
    public function step1Action(){
    	$_SESSION['order']['sitetype_id'] = $this->_getParam('sitetype');
    	$_SESSION['order']['cms_id'] = $this->_getParam('cms');
    	$this->_redirect('/step2_page1.html');
    }
    
    public function step2Action(){

//    	if(!isset($_SESSION['loginNamespace']['storage']->member_id)){
//    		$this->_redirect('/loginpage.html');
//    	} elseif(isset($_SESSION['order']['cms_id'])){
	    	$cms_id = $_SESSION['order']['cms_id'];
	    	$sitetype_id = $_SESSION['order']['sitetype_id'];
	
	        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
				||!$this->_hasParam('page')
				||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->site->getDesignPagesCount2($this->lang_id, $cms_id, $sitetype_id)<=1 ))
				||($this->_getParam('page')>1&&$this->site->getDesignPagesCount2($this->lang_id, $cms_id, $sitetype_id)<$this->_getParam('page'))
			){
				$this->_redirect("/step2_page1.html");
			}
	    	$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
	 
	    	$items = $this->site->getDesignForPage2($this->lang_id, $cms_id, $sitetype_id, $page);
	    	
	    	$this->smarty->assign('items', $items);
	        $this->smarty->assign('Title', 'Design Choice');
	        $this->smarty->assign('page_num', $page+1);
	        $this->smarty->assign('page_count', $this->site->getDesignPagesCount2($this->lang_id, $cms_id, $sitetype_id));
	        $this->smarty->assign('PageBody', 'design/show_items.tpl');
	        $this->smarty->display('layouts/sub.tpl');
//    	} else {
//    		$this->_redirect("/");
//    	}
    }
    
    public function prestep3Action(){
//        if(!isset($_SESSION['loginNamespace']['storage']->member_id)){
//    		$this->_redirect('/loginpage.html');
//    	}
    	 $_SESSION['order']['design_id'] = $this->_getParam('design_id');
    	 $this->_redirect('/step3.html');
    }
    
    public function step3Action(){
//        if(!isset($_SESSION['loginNamespace']['storage']->member_id)){
//    		$this->_redirect('/loginpage.html');
//    	} else
		if(isset($_SESSION['order']['design_id'])){
	        $this->smarty->assign('item', $item = $this -> site->getDesignItemById($_SESSION['order']['design_id']));
	        $this->smarty->assign('Title', $item['design_title']);
	        $this->smarty->assign('PageBody', 'design/show_item.tpl');
	        $this->smarty->display('layouts/sub.tpl');
    	} else {
    		$this->_redirect('/step2_page1.html');
    	}
    }
    
    
    public function loginorregAction(){
        if(!isset($_SESSION['loginNamespace']['storage']->member_id)&&isset($_SESSION['order'])){
	        $this->smarty->assign('Title', 'Login Or Registration');
	        $this->smarty->assign('PageBody', 'order/login_or_reg.tpl');
	        $this->smarty->display('layouts/sub.tpl');
    	} else {
    		$this->_redirect('/loginpage.html');
    	}
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
    public function completeAction(){
        //if(isset($_SESSION['loginNamespace']['storage']->member_id)){
	        $this->smarty->assign('Title', 'Order Completed');
	        $this->smarty->assign('PageBody', 'order/complete.tpl');
	        $this->smarty->display('layouts/sub.tpl');
//    	} else {
//    		$this->_redirect('/loginpage.html');
//    	}
    }
	
	
	public function whoisAction(){
		
		include (ROOT."library/whois/class.whois.php");
		set_time_limit(30);
		$whois_checker = new WhoisChecker();
		$whois = new Whois;

		$whois_domen = $this->_getParam('domain');
		$top_level_domain = $this->_getParam('domain_zone');
		
		$checked_domain = $whois_domen . $top_level_domain;
		
        switch ($top_level_domain) {
	        case '.com':
	        case '.net':
		        $whois_checker->add(new WhoisStriposChecker('No match for', $top_level_domain));
		        $whois_server = 'whois.verisign-grs.com';
		        break;

            case '.org':
	            $whois_checker->add(new WhoisStriposChecker('NOT FOUND', $top_level_domain));
	            $whois_server = 'whois.pir.org';
	            break;

            case '.info':
            	$whois_checker->add(new WhoisStriposChecker('NOT FOUND', $top_level_domain));
                $whois_server = 'whois.afilias.net';
                break;

            case '.biz':
                $whois_checker->add(new WhoisStriposChecker('Not found:', $top_level_domain));
                $whois_server = 'whois.biz';
                break;

            case '.su':
            case '.ru':
                $whois_checker->add(new WhoisStriposChecker('No entries found for', $top_level_domain));
                $whois_server = 'whois.ripn.net';
                break;

            case '.ws':
	            $whois_checker->add(new WhoisStriposChecker('No match for', $top_level_domain));
	            $whois_server = 'whois.website.ws';
	            break;

            case '.us':
	            $whois_checker->add(new WhoisStriposChecker('Not found', $top_level_domain));
	            $whois_server = 'whois.nic.us';
	            break;

            case '.name':
	            $whois_checker->add(new WhoisStriposChecker('No match.', $top_level_domain));
	            $whois_server = 'whois.nic.name';
	            break;

            case '.in':
                $whois_checker->add(new WhoisStriposChecker('NOT FOUND', $top_level_domain));
                $whois_server = 'whois.inregistry.net';
                break;

            case '.eu':
                $whois_checker->add(new WhoisRegexpChecker('#^Status:\s+FREE#mi', $top_level_domain));
                $whois_server = 'whois.eu';
            break;

            default:
                $whois_server = null;
                break;
            }
 
			if ($whois_server) {
				$whois->connect($whois_server);
				if (!$whois->query($checked_domain)) {
					echo whois_t('<div>' . whois_escape($whois->error()) . '</div>');
					continue;
				}
				$whois_result = $whois->result();
				$whois->disconnect();

				if (defined('WHOIS_DEBUG')) {
                	echo '<pre>' . whois_t('Проверяемый домен: ') . whois_escape($checked_domain) . "\n" . whois_t("Ответ с сервера ")
                            . whois_escape($whois_server) . ":\n\n" . print_r($whois_result, 1) . '</pre>';
                }

				$whois_result = $whois_checker->check($whois_result);
				$whois_checker->removeAll();
				ob_clean();
				echo $whois_result;
           }
          
	}
    
    
    public function viewAction() {
    	$this->smarty->assign('news_link', 'active');
    	$item = $this -> News -> getNewById($this->_getParam('new_id'));
        $this->smarty->assign('item', $item);
        $this->smarty->assign('Title', $item['new_title']);
        $this->smarty->assign('PageBody', 'news/show_item.tpl');
        $this->smarty->display('layouts/sub.tpl');
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
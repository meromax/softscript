<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/PriceDb.php';

include_once ROOT . 'application/models/SitesDb.php';

include_once ROOT . 'application/models/CountryDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_priceController extends System_Controller_AdminAction 
{
    private $price;
    private $site;
    private $country;

    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()) $this -> _redirect('/admin');
        
        $this->price = new PriceDb();
        $this->site = new SitesDb();
        $this->country = new CountryDb();
    }
    
    public function indexAction() {
        $sites = $this->site->getAllSites();

        if($this->_hasParam('site')){
            $siteId = $this->_getParam('site');
        } else {
            $siteId = $sites[0]['id'];
        }

        $this -> smarty -> assign('price', $this -> price -> getAllItems($siteId));
        $this -> smarty -> assign('sites', $sites);
        $this -> smarty -> assign('siteId', $siteId);

        $this -> smarty -> assign('countries', $this->country->getAllItems());

        $this -> smarty -> assign('PageBody', 'admin/price/list.tpl');
        $this -> smarty -> assign('Title', 'Price - List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }

    public function saveItemAction(){
        ob_start();
        $itemId = $this->_getParam('itemId');
        $this->price->updateItem($itemId, $this->_getAllParams());
        ob_clean();
        echo $itemId;
    }

    public function getFlagAction(){
        ob_start();
        $countryId = $this->_getParam('countryId');
        $country = $this->country->getItemById($countryId);
        ob_clean();
        echo '<img src="/images/countries/'.$country['cod3'].'.png" style="border:1px solid #000;" width="22" height="15">';
    }

    public function addCountryAction(){
        $currSite = $this->_getParam('curr_site');

        $countryId = $this->_getParam('country');
        $country = $this->country->getItemById($countryId);

        $dataArray = array();
        $dataArray['title'] = $country['title'];
        $dataArray['title_short'] = $country['cod3'];
        $dataArray['symbol'] = "none";
        $dataArray['price']  = "none";
        $dataArray['dostavka'] = "none";
        $dataArray['position'] = 0;
        $dataArray['site_id'] = $currSite;

        $this->price->createItem($dataArray);
        $this->_redirect('/admin/price/index/site/'.$currSite);
    }
    
    public function addPriceAction() {
        $this -> smarty -> assign('action', 'addprice');
        
        
        if( !$this->_hasParam('step') ) {
        	$this -> smarty -> assign('State', '1');
            $this -> smarty -> assign('PageBody', 'admin/price/add_modify.tpl');
            $this -> smarty -> assign('Title', 'Price Manager: Add Price');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $price_id = $this -> price -> createPriceItem($dataArray);
            
            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
	         	$filename = $this -> price -> uploadPicture($price_id);
	        	if($filename!=""){
	        		$this -> price -> updateImage($price_id, $filename);
	        	}         
            }             
            $this->_redirect('/admin/price/index/page/1');
        }
    }
    
    
    public function modifyPriceAction() {
        $this -> smarty -> assign('action', 'modifyprice');
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('price', $price = $this -> price -> getPriceById($this -> _getParam('price_id')));

            $this -> smarty -> assign('price_id', $this -> _getParam('price_id'));
            $this -> smarty -> assign('PageBody', 'admin/price/add_modify.tpl');
            $this -> smarty -> assign('Title', 'Modify Price');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$price_id = $this -> _getParam('price_id');
        	
        	$this -> price -> modifyPrice($price_id, $dataArray);
            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
	         	$filename = $this -> price -> uploadPicture($price_id);
	        	if($filename!=""){
	        		$this -> price -> updateImage($price_id, $filename);
	        	}         
            }
            $this->_redirect('/admin/price/index/page/1');
        }
    }
    
    public function deleteAction() {
        $this -> price -> deleteItem($this -> _getParam('price_id'));
        $this -> _redirect('/admin/price/index/site/'.$this -> _getParam('siteId'));
    }
  
}
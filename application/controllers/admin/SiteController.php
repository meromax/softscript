<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/SitesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_SiteController extends System_Controller_AdminAction 
{
    private $site;
    private $file;

    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()) $this -> _redirect('/admin');
        
        $this->site = new SitesDb();
    }

    public function indexAction() {

        $this -> smarty -> assign('sites', $this -> site -> getAllSites());
        $this -> smarty -> assign('PageBody', 'admin/site/list.tpl');
        $this -> smarty -> assign('Title', 'Price - List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }

    public function saveItemAction(){
        ob_start();
        $itemId = $this->_getParam('itemId');
        $this->site->updateItem($itemId, $this->_getAllParams());
        ob_clean();
        echo $itemId;
    }


    public function addSiteAction(){

        $site = $this->_getParam('site');
        $domain = str_replace("http://","",$site);
        $dataArray = array();
        $dataArray['title'] = $site;
        $dataArray['url'] = $site;
        $dataArray['domain'] = $domain;
        $dataArray['company_id']  = "none";
        $dataArray['cel'] = "none";

        $this->site->createItem($dataArray);
        $this->_redirect('/admin/site/index');
    }

    public function deleteAction() {
        $this -> site -> deleteItem($this -> _getParam('id'));
        $this -> _redirect('/admin/site/index');
    }
    
  
}
<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/DeliveryDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_DeliveryController extends System_Controller_AdminAction
{
    private $delivery;

    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()) $this -> _redirect('/admin');
        
        $this->delivery = new DeliveryDb();

        $this -> smarty -> assign('adminTopMenu', 'delivery');
    }
    
    public function indexAction() {
    	
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> delivery -> getItemsPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> delivery -> getItemsPagesCount($this->lang_id) < $this->_getParam('page'))
		){
			$this->_redirect("/admin/delivery/index/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('destinations', $d = $this -> delivery -> getItemsForPage($this->lang_id, $page));
//        print_r($d);
//        die();
       
        $this -> smarty -> assign('countpage', $this -> delivery ->getItemsPagesCount($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/delivery/items_list.tpl');
        $this -> smarty -> assign('Title', 'Destination List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function addAction() {
        $this -> smarty -> assign('action', 'add');

        if( !$this->_hasParam('step') ) {
        	$this -> smarty -> assign('State', '1');
            $this -> smarty -> assign('PageBody', 'admin/delivery/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Manager: Add');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $this -> delivery -> createItem($dataArray);
            $this->_redirect('/admin/delivery/index/page/1');
        }
    }
    
    public function modifyAction() {
        $this->checkForId();
        $this -> smarty -> assign('action', 'modify');

        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('destination', $link = $this -> delivery ->getItemById($this -> _getParam('id')));
            $this -> smarty -> assign('destination_id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/delivery/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Modify: '.$link['destination']);
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$this -> delivery -> modifyItem($this -> _getParam('id'), $dataArray);
            $this->_redirect('/admin/delivery/index/page/1');
        }
    }
    
    private function checkForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/delivery/index/page/1');
        }
    }
    
    public function deleteAction() {
        $this->checkForId();
        $this -> delivery -> deleteItem($this -> _getParam('id'));
        $this -> _redirect('/admin/delivery/index/page/1');
    }
  
}
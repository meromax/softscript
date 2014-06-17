<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/LinksDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_LinksController extends System_Controller_AdminAction 
{
    private $links;

    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()) $this -> _redirect('/admin');
        
        $this->links = new LinksDb();
    }
    
    public function indexAction() {
    	
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> links -> getLinksItemsPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> links -> getLinksItemsPagesCount($this->lang_id) < $this->_getParam('page'))
		){
			$this->_redirect("/admin/links/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('links', $this -> links -> getLinksItemsForPage($this->lang_id, $page));
       
        $this -> smarty -> assign('countpage', $this -> links ->getLinksItemsPagesCount($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/links/items_list.tpl');
        $this -> smarty -> assign('Title', 'Links List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function addlinkAction() {
        $this -> smarty -> assign('action', 'addlink');

        if( !$this->_hasParam('step') ) {
        	$this -> smarty -> assign('State', '1');
            $this -> smarty -> assign('PageBody', 'admin/links/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Links Manager: Add Link');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $link_id = $this -> links -> createLinksItem($dataArray);
            $this->_redirect('/admin/links/page/1');
        }
    }
    
    public function modifyAction() {
        $this->checkForId();
        $this -> smarty -> assign('action', 'modify');

        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('link', $link = $this -> links ->getLinksItemById($this -> _getParam('id')));
            $this -> smarty -> assign('link_id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/links/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Modify Link: '.$link['title']);
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$this -> links -> modifyLinksItem($this -> _getParam('id'), $dataArray);
            $this->_redirect('/admin/links/page/1');
        }
    }
    
    private function checkForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/links/page/1');
        }
    }
    
    public function deleteAction() {
        $this->checkForId();
        $this -> links -> deleteLinksItem($this -> _getParam('id'));
        $this -> _redirect('/admin/links/page/1');
    }
  
}
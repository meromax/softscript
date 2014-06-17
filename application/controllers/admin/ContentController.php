<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

include_once ROOT . 'application/models/FilesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');

class Admin_ContentController extends System_Controller_AdminAction 
{
    public $Content;
    public $File;
    
    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()) $this -> _redirect('/admin');
        
        $this->Content = new ContentManagerDb();
        $this->File = new FilesDb();

        $this -> smarty -> assign('adminLeftMenu', 'content');
        $this -> smarty -> assign('adminLeftMenuSub', 'content');
    }
    
    public function indexAction() {

        $pages = $this -> Content -> getAllPages($this->lang_id);
        $this -> smarty -> assign('pages', $pages);
        $this -> smarty -> assign('PageBody', 'admin/content/pages_list.tpl');
        $this -> smarty -> assign('title', 'Контент::Статические страницы');
        $this -> smarty -> display('admin/index.tpl');
    }
    
    public function addpageAction() {
        $this -> smarty -> assign('action', 'addpage');
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('PageBody', 'admin/content/add_modify_page.tpl');
            $this -> smarty -> assign('Title', 'Add new page');
            $this -> smarty -> display('admin/index.tpl');
        } else {
           
			$data = $this->_getAllParams();
			$data['lang_id'] = $this->lang_id;
            $page_id = $this -> Content -> createPage($data);
            if($_FILES['image']['name']!=""){
	            $filename = $this -> File -> uploadPicture($page_id, ROOT."images/pages/", '574', '293', '_big');
	            $this -> File -> uploadPicture($page_id, ROOT."images/pages/", '130', '59', '_small'); 
	        	$this -> Content -> updateImage($page_id, $filename);
        	}
            $this->_redirect('/admin/content');
        }
    }
    
    public function modifypageAction() {
        $this->checkForId();
        $this -> smarty -> assign('action', 'modifypage');
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('page', $page = $this -> Content -> getPageById($this -> _getParam('id')));
            $this -> smarty -> assign('PageBody', 'admin/content/add_modify_page.tpl');
            $this -> smarty -> assign('Title', 'Modify page: '.$page['title']);
            $this -> smarty -> display('admin/index.tpl');
        } else {
			$data = $this->_getAllParams();
			$data['lang_id'] = $this->lang_id;
            $this -> Content -> modifyPage($this -> _getParam('id'),$data);
            
            if($_FILES['image']['name']!=""){
	            $filename = $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/pages/", '574', '293', '_big');
	            $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/pages/", '130', '59', '_small'); 
	       		$this -> Content -> updateImage($this -> _getParam('id'), $filename);
            }
            $this->_redirect('/admin/content');
        }
    }
    
    public function moveupAction() {
        if( $this->_hasParam('id') ) {
            $this -> Content -> moveUp($this -> _getParam('id'));
        }
        $this->_redirect('/admin/content');
    }
    
    public function movedownAction() {
        if( $this->_hasParam('id') ) {
            $this -> Content -> moveDown($this -> _getParam('id'));
        }
        $this -> _redirect('/admin/content');
    }
    
    
    public function checkexistpagelinkAction(){
    	$page_link = $this->_getParam('page_link');
    	
    	if($this->_getParam('modify_id')){
    		$modify_id = $this->_getParam('modify_id');
    	} else {
    		$modify_id=0;
    	}
    	$data = $this->Content->checkExistPageLink($page_link, $this->lang_id, $modify_id);
    	ob_clean();
    	echo sizeof($data);
    }
    
    public function deleteAction() {
        $this->checkForId();
        $this -> Content -> deletePage($this -> _getParam('id'));
        $this -> _redirect('/admin/content');
    }
    
    private function checkForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/content');
        }
    }
}
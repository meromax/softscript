<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/BrandsDb.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

include_once ROOT . 'application/models/FilesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_BrandsController extends System_Controller_AdminAction
{
    private $sections;
    private $content;
    private $File;
    
    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()){
         	$this -> _redirect('/admin');	
        } else {
	        $this -> brands = new BrandsDb();
	        $this -> content = new ContentManagerDb();
	        $this->File = new FilesDb();
        }

        $this -> smarty -> assign('adminTopMenu', 'brands');
        
    }    
    
    
    //***************************************************************************
    //*******************************  SECTIONS *********************************
    //***************************************************************************        
    public function indexAction() {

		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> brands ->getBrandsPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> brands ->getBrandsPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/brands/index/page/1");
		}
		
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('sections', $this -> brands -> getBrandsForPage($this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> brands ->getBrandsPagesCount($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/brands/items_list.tpl');
        $this -> smarty -> assign('Title', 'Brands List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function addAction() {
        $this -> smarty -> assign('action', 'add');
        
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('PageBody', 'admin/brands/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Brands Manager: Add Brand');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $this -> brands -> add($dataArray);
            $this->_redirect('/admin/brands/index/page/1');
        }
    }
    
    public function modifyAction() {
        $this->checkSectionForId();
        $this -> smarty -> assign('action', 'modify');
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('item', $section = $this -> brands -> getBrandById($this -> _getParam('id')));
            $this -> smarty -> assign('id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/brands/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Modify Brand: '.$section['title']);
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$dataArray['id'] = $this -> _getParam('id');
        	$this -> brands -> modify($dataArray);

            $this->_redirect('/admin/brands/index/page/1');
        }
    }
    
    private function checkSectionForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/brands/index/page/1');
        }
    }
    
    public function deleteAction() {
        $this->checkSectionForId();
        $this -> brands -> delete($this -> _getParam('id'));
        $this -> _redirect('/admin/brands/index/page/1');
    }

}
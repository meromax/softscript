<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/FaqDb.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_FaqController extends System_Controller_AdminAction 
{
    private $faq;
    private $content;
    
    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()){
         	$this -> _redirect('/admin');	
        } else {
	        $this -> faq = new FaqDb();
	        $this -> content = new ContentManagerDb(); 
        }
        
    }    
    
    
    //***************************************************************************
    //******************************* FAQ SECTIONS ******************************
    //***************************************************************************        
    public function sectionsAction() {
    	
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> faq ->getSectionsItemsPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> faq ->getSectionsItemsPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/faq/sections/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('faq_sections', $t=$this -> faq -> getSectionsItemsForPage($this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> faq ->getSectionsItemsPagesCount($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/faq/sections/items_list.tpl');
        $this -> smarty -> assign('Title', 'Faq Sections List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function addsectionAction() {
        $this -> smarty -> assign('action', 'addsection');
        
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('PageBody', 'admin/faq/sections/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Sections Manager: Add Section');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $this -> faq -> addSectionsItem($dataArray);
            $this->_redirect('/admin/faq/sections/page/1');
        }
    }
    
    public function modifysectionAction() {
        $this->checkSectionForId();
        $this -> smarty -> assign('action', 'modifysection');
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('item', $section = $this -> faq -> getSectionsItemById($this -> _getParam('id')));

            $this -> smarty -> assign('id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/faq/sections/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Modify Section: '.$section['title']);
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$this -> faq -> modifySectionsItem($this -> _getParam('id'), $dataArray);
            $this->_redirect('/admin/faq/sections/page/1');
        }
    }
    
    private function checkSectionForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/faq/sections/page/1');
        }
    }
    
    public function deletesectionAction() {
        $this->checkSectionForId();
        $this -> faq -> deleteSectionsItem($this -> _getParam('id'));
        $this -> _redirect('/admin/faq/sections/page/1');
    }
    
    //***************************************************************************
    //******************************* FAQ CONTENT *******************************
    //*************************************************************************** 
    
    public function contentAction() {
    	//print_r($this->_getAllParams()); die();
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> faq ->getContentItemsPagesCount($section, $this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> faq ->getContentItemsPagesCount($section, $this->lang_id) <$this->_getParam('page'))
		){
			$this->_redirect("/admin/faq/content/page/1");
		}
		$section = $this->_getParam('section');
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('faq_content', $this -> faq -> getContentItemsForPage($section, $this->lang_id, $page));
       	$this -> smarty -> assign('cur_section_id', $section);
        $this -> smarty -> assign('sections',  $this -> faq ->getAllSectionsItems($this->lang_id));
        $this -> smarty -> assign('countpage', $this -> faq ->getContentItemsPagesCount($section, $this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/faq/content/items_list.tpl');
        $this -> smarty -> assign('Title', 'Faq Content');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function additemAction() {
        $this -> smarty -> assign('action', 'additem');

        if( !$this->_hasParam('step') ) {
        	$this -> smarty -> assign('sections',  $this -> faq ->getAllSectionsItems($this->lang_id));
            $this -> smarty -> assign('PageBody', 'admin/faq/content/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Items Manager: Add Item');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $this -> faq -> addContentItem($dataArray);
            $this->_redirect('/admin/faq/content/page/1');
        }
    }
    
    public function modifyitemAction() {
        $this->checkItemForId();
        $this -> smarty -> assign('action', 'modifyitem');
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('item', $item = $this -> faq -> getContentItemById($this -> _getParam('id')));
        	$this -> smarty -> assign('sections',  $this -> faq ->getAllSectionsItems($this->lang_id));
            $this -> smarty -> assign('id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/faq/content/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Modify Item: '.$item['title']);
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$this -> faq -> modifyContentItem($this -> _getParam('id'), $dataArray);
            $this->_redirect('/admin/faq/content/page/1');
        }
    }
    
    private function checkItemForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/faq/content/page/1');
        }
    }
    
    public function deleteitemAction() {
        $this->checkItemForId();
        $this -> faq -> deleteContentItem($this -> _getParam('id'));
        $this -> _redirect('/admin/faq/content/page/1');
    }
    

  
}
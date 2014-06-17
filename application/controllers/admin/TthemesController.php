<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/TThemesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_TthemesController extends System_Controller_AdminAction 
{
    private $tthemes;

    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()) $this -> _redirect('/admin');
        
        $this->tthemes = new TThemesDb();
    }
    
    public function indexAction() {
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> tthemes ->getPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> tthemes ->getPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/tthemes/index/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('tthemes', $this -> tthemes -> getTthemesForPage($this->lang_id, $page));
       
        $this -> smarty -> assign('countpage', $this -> tthemes ->getPagesCount($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/tthemes/list.tpl');
        $this -> smarty -> assign('Title', 'Translations Themes List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function addAction() {
        $this -> smarty -> assign('action', 'add');
       
        if( !$this->_hasParam('step') ) {
        	$this -> smarty -> assign('State', '1');
            $this -> smarty -> assign('PageBody', 'admin/tthemes/add_modify.tpl');
            $this -> smarty -> assign('Title', 'Translations Tthemes Manager: Add Ttheme');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $this -> tthemes -> addItem($dataArray);
            $this->_redirect('/admin/tthemes/index/page/1');
        }
    }
    
    public function modifyAction() {
        $this->checkForId();
        $this -> smarty -> assign('action', 'modify');
        
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('ttheme', $ttheme = $this -> tthemes -> getTranslationThemeById($this -> _getParam('id')));

            $this -> smarty -> assign('id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/tthemes/add_modify.tpl');
            $this -> smarty -> assign('Title', 'Modify Item: '.$ttheme['title']);
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$this -> tthemes -> modifyItem($this -> _getParam('id'), $dataArray);
            $this->_redirect('/admin/tthemes/index/page/1');
        }
    }
    
    private function checkForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/tthemes/index/page/1');
        }
    }
    
    public function deleteAction() {
        $this->checkForId();
        $this -> tthemes -> delete($this -> _getParam('id'));
        $this -> _redirect('/admin/tthemes/index/page/1');
    }
  
}
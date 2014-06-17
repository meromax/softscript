<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/NewsDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_newsController extends System_Controller_AdminAction 
{
    private $news;

    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()) $this -> _redirect('/admin');
        
        $this->news = new NewsDb();
        $this -> smarty -> assign('adminLeftMenu', 'content');
        $this -> smarty -> assign('adminLeftMenuSub', 'news');
    }
    
    public function indexAction() {
    	
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> news ->getPagesCount2($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> news ->getPagesCount2($this->lang_id)<$this->_getParam('page'))
		){
			//$this->_redirect("/admin/news/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('news', $this -> news -> getNewsForPage2($this->lang_id, $page));
       
        $this -> smarty -> assign('countpage', $this -> news ->getPagesCount2($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/news/news_list.tpl');
        $this -> smarty -> assign('Title', 'News List');
        $this -> smarty -> display('admin/index.tpl');
    }
    
    public function pageAction() {
		//print_r($this->_getAllParams()); die();
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> news ->getPagesCount2($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> news ->getPagesCount2($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/news/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('news', $this -> news -> getNewsForPage2($this->lang_id, $page));
       
        $this -> smarty -> assign('countpage', $this -> news ->getPagesCount2($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/news/news_list.tpl');
        $this -> smarty -> assign('Title', 'News List');
        $this -> smarty -> display('admin/index.tpl');
    }
    
    public function addAction() {
        $this -> smarty -> assign('action', 'add');
        
        
        if( !$this->_hasParam('step') ) {
        	$this -> smarty -> assign('State', '1');
        	$this -> smarty -> assign('StateMsg','<br /><span style="color:red">Settings will be available after saving current product!</span>');
            $this -> smarty -> assign('PageBody', 'admin/news/add_modify_new.tpl');
            $this -> smarty -> assign('Title', 'News Manager: Add New');
            $this -> smarty -> display('admin/index.tpl');;
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $new_id = $this -> news -> createNewItem($dataArray);
        	$filename = $this -> news -> uploadPicture($new_id);
        	if($filename!=""){
        		$dataArray['filename'] = $filename;
        		$dataArray['lang_id'] = $this->lang_id;
        		$this -> news -> modifyNew($new_id, $dataArray);
        	}
            $this->_redirect('/admin/news/page/0');
        }
    }
    
    public function modifyAction() {
        $this->checkForId();
        $this -> smarty -> assign('action', 'modify');
        
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('new', $new = $this -> news -> getNewById($this -> _getParam('new_id')));

            $this -> smarty -> assign('new_id', $this -> _getParam('new_id'));
            $this -> smarty -> assign('PageBody', 'admin/news/add_modify_new.tpl');
            $this -> smarty -> assign('Title', 'Modify New Item: '.$new['new_title']);
            $this -> smarty -> display('admin/index.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$filename = $this -> news -> uploadPicture($this -> _getParam('new_id'));
        	
        	if($filename!=""){
        		$dataArray['filename'] = $filename;
        	}
        	$this -> news -> modifyNew($this -> _getParam('new_id'), $dataArray);
            $this->_redirect('/admin/news/page/0');
        }
    }
    
    private function checkForId() {
        if( !$this -> _hasParam('new_id') ) {
            $this -> _redirect('/admin/news/page/1');
        }
    }
    
    public function deleteAction() {
        $this->checkForId();
        $this -> news -> deleteNew($this -> _getParam('new_id'));
        $this -> _redirect('/admin/news/page/0');
    }
  
}
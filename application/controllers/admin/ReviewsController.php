<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/ReviewsDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_ReviewsController extends System_Controller_AdminAction 
{
    private $reviews;

    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()) $this -> _redirect('/admin');
        
        $this->reviews = new ReviewsDb();
        $this -> smarty -> assign('adminTopMenu', 'reviews');
    }
    
    public function indexAction() {
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> reviews ->getPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> reviews ->getPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			//$this->_redirect("/admin/reviews/index/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
		
		
        $this -> smarty -> assign('reviews', $this -> reviews -> getReviewsForPage($this->lang_id, $page));
       
        $this -> smarty -> assign('countpage', $this -> reviews ->getPagesCount($this->lang_id));
        $this -> smarty -> assign('page', $page+1);
        $this -> smarty -> assign('PageBody', 'admin/reviews/list.tpl');
        $this -> smarty -> assign('Title', 'Reviews List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function addAction() {
        $this -> smarty -> assign('action', 'add');
       
        if( !$this->_hasParam('step') ) {
        	$this -> smarty -> assign('State', '1');
            $this -> smarty -> assign('PageBody', 'admin/reviews/add_modify.tpl');
            $this -> smarty -> assign('Title', 'Reviews Manager: Add Review');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $this -> reviews -> createItem($dataArray);
            $this->_redirect('/admin/reviews/page/1');
        }
    }
    
    public function modifyAction() {
        $this->checkForId();
        $this -> smarty -> assign('action', 'modify');
        
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('new', $new = $this -> news -> getNewById($this -> _getParam('new_id')));

            $this -> smarty -> assign('review_id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/reviews/add_modify.tpl');
            $this -> smarty -> assign('Title', 'Modify New Item: '.$new['new_title']);
            $this -> smarty -> display('layouts/adminmain.tpl');
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
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/reviews/index/page/1');
        }
    }
    
    public function deleteAction() {
        $this->checkForId();
        $this -> reviews -> delete($this -> _getParam('id'));
        $this -> _redirect('/admin/reviews/index/page/1');
    }
    
    /**
     * Ajax method for changing review status active/passive(1/0)
     *
     */
    public function changeReviewStatusAction(){
		$this->reviews->changeReviewStatus($this->_getParam('id'));
		$review = $this->reviews->getItemById($this->_getParam('id'));
		echo (int)$review['active'];  	
    }    
  
}
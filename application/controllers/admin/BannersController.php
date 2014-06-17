<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/BannersDb.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

include_once ROOT . 'application/models/FilesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_BannersController extends System_Controller_AdminAction 
{
    private $banners;
    private $content;
    private $File;
    
    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()){
         	$this -> _redirect('/admin');	
        } else {
	        $this -> banners = new BannersDb();
	        $this -> content = new ContentManagerDb();
	        $this->File = new FilesDb();
        }
        $this -> smarty -> assign('adminLeftMenu', 'banners');
    }    
       
    public function indexAction() {

		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> banners ->getBannersPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> banners ->getBannersPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/banners/index/page/1");
		}
		
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('banners', $this -> banners -> getBannersForPage($this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> banners ->getBannersPagesCount($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/banners/items.tpl');
        $this -> smarty -> assign('Title', 'Banners List');
        $this -> smarty -> display('admin/index.tpl');
    }
    
    public function addbannerAction() {
        $this -> smarty -> assign('action', 'addbanner');
        
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('PageBody', 'admin/banners/add_modify.tpl');
            $this -> smarty -> assign('Title', 'Banners Manager: Add Banner');
            $this -> smarty -> display('admin/index.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $banner_id = $this -> banners -> createBanner($dataArray);

            if($dataArray['type']==0){
                $width_b = 964;
                $height_b = 375;
                $width_s = 150;
                $height_s = 58;
            } else {
                $width_b = 964;
                $height_b = 375;
                $width_s = 150;
                $height_s = 58;
            }

            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
	         	$filename = $this -> File -> uploadPicture($banner_id, ROOT."images/banners/", $width_b, $height_b, '_big');
	            $this -> File -> uploadPicture($banner_id, ROOT."images/banners/", $width_s, $height_s, '_small');
	             
	        	if($filename!=""){
	        		$this -> banners -> updateImage($banner_id, $filename);
	        	}         
            }   
            
            $this->_redirect('/admin/banners/index/page/1');
        }
    }
    
    public function modifybannerAction() {
        $this -> smarty -> assign('action', 'modifybanner');
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('banner', $banner = $this -> banners -> getBannerById($this -> _getParam('id')));
            $this -> smarty -> assign('id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/banners/add_modify.tpl');
            $this -> smarty -> assign('Title', 'Modify Banner: '.$banner['title']);
            $this -> smarty -> display('admin/index.tpl');
        } else {
        	//print_r($this->_getAllParams());die();
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$dataArray['id'] = $this -> _getParam('id');
        	$this -> banners -> modifyBanner($dataArray);
            if($dataArray['type']==0){
                $width_b = 964;
                $height_b = 375;
                $width_s = 150;
                $height_s = 58;
            } else {
                $width_b = 964;
                $height_b = 375;
                $width_s = 150;
                $height_s = 58;
            }
        	if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
	         	$filename = $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/banners/",  $width_b, $height_b, '_big');
	            $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/banners/",  $width_s, $height_s, '_small');

	        	if($filename!=""){
	        		$this -> banners -> updateImage($this -> _getParam('id'), $filename);
	        	}    
        	}
        	     	
            $this->_redirect('/admin/banners/index/page/1');
        }
    }
    
    public function deleteAction() {
        $this -> banners -> deleteBanner($this -> _getParam('id'));
        $this -> _redirect('/admin/banners/index/page/1');
    }
    

}
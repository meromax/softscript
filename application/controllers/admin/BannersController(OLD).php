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
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function addbannerAction() {
        $this -> smarty -> assign('action', 'addbanner');
        
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('PageBody', 'admin/banners/add_modify.tpl');
            $this -> smarty -> assign('Title', 'Banners Manager: Add Banner');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $banner_id = $this -> banners -> createBanner($dataArray);
            
            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
	         	$filename = $this -> File -> uploadPicture($banner_id, ROOT."images/banners/", '478', '277', '_big');
	            $this -> File -> uploadPicture($banner_id, ROOT."images/banners/", '150', '87', '_small');
	             
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
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	//print_r($this->_getAllParams());die();
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$dataArray['id'] = $this -> _getParam('id');
        	$this -> banners -> modifyBanner($dataArray);
        	
        	if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
	         	$filename = $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/banners/", '478', '277', '_big');
	            $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/banners/", '150', '87', '_small');

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
    
    //***************************************************************************
    //*******************************  CATEGORIES *******************************
    //***************************************************************************        
    public function categoriesAction() {

    	$section_id      = $this->_getParam('section_id');
    	$this -> smarty -> assign('section_id', $section_id);
    	$spage           = $this->_getParam('spage');
    	$this -> smarty -> assign('spage', $spage);
    	
    	$this -> smarty -> assign('section', $this->sections->getSectionById($section_id));
    	
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> banners ->getSubSectionsPagesCount($section_id, $this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> banners ->getSubSectionsPagesCount($section_id, $this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/sections/categories/section_id/".$section_id."/spage/".$spage."/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
		
        $this -> smarty -> assign('categories', $this -> banners -> getSubSectionsForPage($section_id, $this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> banners ->getSubSectionsPagesCount($section_id, $this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/sections/categories/items_list.tpl');
        $this -> smarty -> assign('Title', 'Categories List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function addcategoryAction() {
        $this -> smarty -> assign('action', 'addcategory');
        
    	$section_id      = $this->_getParam('section_id');
    	$this -> smarty -> assign('section_id', $section_id);
    	$spage           = $this->_getParam('spage');
    	$this -> smarty -> assign('spage', $spage);
        
    	$this -> smarty -> assign('section', $this->sections->getSectionById($section_id));
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('PageBody', 'admin/sections/categories/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Categories Manager: Add Category');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $sub_section_id = $this -> banners -> createSubSection($dataArray);
            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
	         	$filename = $this -> File -> uploadPicture($sub_section_id, ROOT."images/categories/", '712', '322', '_big');
	            $this -> File -> uploadPicture($sub_section_id, ROOT."images/categories/", '80', '36', '_small'); 
	        	if($filename!=""){
	        		$this -> banners -> updateImage2($sub_section_id, $filename);
	        	}    
            }        
            
            $this->_redirect("/admin/sections/categories/section_id/".$section_id."/spage/".$spage."/page/1");
        }
    }
    
    public function modifycategoryAction() {
        $this->checkCategoryForId();
        $this -> smarty -> assign('action', 'modifycategory');
        
    	$section_id      = $this->_getParam('section_id');
    	$this -> smarty -> assign('section_id', $section_id);
    	$spage           = $this->_getParam('spage');
    	$this -> smarty -> assign('spage', $spage);
    	
    	$this -> smarty -> assign('section', $this->sections->getSectionById($section_id));
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('item', $category = $this -> banners -> getSubSectionById($this -> _getParam('id')));
            $this -> smarty -> assign('id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/sections/categories/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Modify Category: '.$category['title']);
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$dataArray['id'] = $this -> _getParam('id');
        	$dataArray['section_id'] = $section_id;
        	$this -> banners -> modifySubSection($dataArray);
        	
        	if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
	         	$filename = $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/categories/", '712', '322', '_big');
	            $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/categories/", '80', '36', '_small'); 
	        	if($filename!=""){
	        		$this -> banners -> updateImage2($this -> _getParam('id'), $filename);
	        	}    
        	}      	
        	     	
            $this->_redirect("/admin/sections/categories/section_id/".$section_id."/spage/".$spage."/page/1");
        }
    }
    
    private function checkCategoryForId() {
    	$section_id      = $this->_getParam('section_id');
    	$spage           = $this->_getParam('spage');
   	
        if( !$this -> _hasParam('id') ) {
            $this->_redirect("/admin/sections/categories/section_id/".$section_id."/spage/".$spage."/page/1");
        }
    }
    
    public function deletecategoryAction() {
        $this->checkSectionForId();
    	$section_id      = $this->_getParam('section_id');
    	$spage           = $this->_getParam('spage');
    	$content_page_id = $this->_getParam('content_page_id');
        $this -> banners -> deleteSubSection($this -> _getParam('id'));
        $this->_redirect("/admin/sections/categories/section_id/".$section_id."/spage/".$spage."/page/1");
    }
    
    public function getcategoriesAction(){
    	$section_id = $this->_getParam('section_id');
    	$cat_selected_id = $this->_getParam('cat_selected_id');
    	$categories = $this->sections->getAllSubSections($section_id, $this->lang_id);
    	$out = '<option value="0"> --------------- </option>';
		for($i=0; $i<sizeof($categories); $i++){
			if($categories[$i]['id']==$cat_selected_id){
				$out .= '<option value="'.$categories[$i]['id'].'" selected>'.stripslashes(strip_tags($categories[$i]['title'])).'</option>';
			} else {
				$out .= '<option value="'.$categories[$i]['id'].'">'.stripslashes(strip_tags($categories[$i]['title'])).'</option>';	
			}
			
		}
		ob_clean();
		echo $out;    	
    	
    }
}
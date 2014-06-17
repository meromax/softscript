<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/SectionsDb.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

include_once ROOT . 'application/models/FilesDb.php';

include_once ROOT . 'application/models/OptionsDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_SectionsController extends System_Controller_AdminAction 
{
    private $sections;
    private $content;
    private $File;

    private $options;
    
    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()){
         	$this -> _redirect('/admin');	
        } else {
	        $this -> sections = new SectionsDb();
	        $this -> content = new ContentManagerDb();
	        $this->File = new FilesDb();

            $this->options = new OptionsDb();
        }

        $this -> smarty -> assign('adminLeftMenu', 'products');
        $this -> smarty -> assign('adminLeftMenuSub', 'sections');
    }    
    
    
    //***************************************************************************
    //*******************************  SECTIONS *********************************
    //***************************************************************************        
    public function indexAction() {

		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> sections ->getSectionsPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> sections ->getSectionsPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/sections/index/page/1");
		}
		
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('sections', $this -> sections -> getSectionsForPage($this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> sections ->getSectionsPagesCount($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/sections/sections/items_list.tpl');
        $this -> smarty -> assign('Title', 'Sections List');
        $this -> smarty -> display('admin/index.tpl');
    }
    
    public function addsectionAction() {
        $this -> smarty -> assign('action', 'addsection');

        if( !$this->_hasParam('step') ) {

            $this -> smarty -> assign('options', $options = $this -> options -> getAllOption($this->lang_id));

            $this -> smarty -> assign('PageBody', 'admin/sections/sections/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Sections Manager: Add Section');
            $this -> smarty -> display('admin/index.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;


            $section_id = $this -> sections -> createSection($dataArray);

            $this->setOptions($section_id, $dataArray['options']);
            
            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($section_id, ROOT."images/sections/", '393', '259', '_big');
                $this -> File -> uploadPicture($section_id, ROOT."images/sections/", '288', '190', '_middle');
                $this -> File -> uploadPicture($section_id, ROOT."images/sections/", '88', '58', '_small');
                $this -> File -> uploadPicture($section_id, ROOT."images/sections/", '96', '96', '_square');
                $this -> File -> uploadPicture($section_id, ROOT."images/sections/", '800', '527', '_large');
	             
	        	if($filename!=""){
	        		$this -> sections -> updateImage($section_id, $filename);
	        	}         
            }   
            
            $this->_redirect('/admin/sections/index/page/1');
        }
    }
    
    public function modifysectionAction() {
        $this->checkSectionForId();
        $this -> smarty -> assign('action', 'modifysection');
        if( !$this->_hasParam('step') ) {

            $this -> smarty -> assign('item', $section = $this -> sections -> getSectionById($this -> _getParam('id')));
            $this -> smarty -> assign('id', $this -> _getParam('id'));

            $sectionOptions = $this -> sections -> getSectionOptions($this -> _getParam('id'));

            $allOptions = $this -> options -> getAllOption($this->lang_id);

            for($i=0; $i<sizeof($allOptions); $i++){
                $allOptions[$i]['selected'] = 0;
                for($j=0; $j<sizeof($sectionOptions); $j++){
                    if($allOptions[$i]['id']==$sectionOptions[$j]['option_id']){
                        $allOptions[$i]['selected'] = 1;
                        continue;
                    }
                }
            }

//            echo "<pre>";
//            print_r($allOptions);
//            die();
            $this -> smarty -> assign('options', $allOptions);

            $this -> smarty -> assign('PageBody', 'admin/sections/sections/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Modify Section: '.$section['title']);
            $this -> smarty -> display('admin/index.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$dataArray['id'] = $this -> _getParam('id');

//            echo "<pre>";
//            print_r($dataArray);
//            die();
            $this->setOptions($dataArray['id'], $dataArray['options']);

        	$this -> sections -> modifySection($dataArray);
        	
        	if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/sections/", '393', '259', '_big');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/sections/", '288', '190', '_middle');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/sections/", '88', '58', '_small');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/sections/", '96', '96', '_square');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/sections/", '800', '527', '_large');
	        	if($filename!=""){
	        		$this -> sections -> updateImage($this -> _getParam('id'), $filename);
	        	}    
        	}
        	     	
            $this->_redirect('/admin/sections/index/page/1');
        }
    }

    public function setOptions($sectionId, $options){
        $this -> sections -> deleteSectionOptions($sectionId);
        foreach($options as $value){
            $this -> sections -> addSectionOption($sectionId, $value);
        }
    }
    
    private function checkSectionForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/sections/index/page/1');
        }
    }
    
    public function deletesectionAction() {
        $this->checkSectionForId();
        $this -> sections -> deleteSection($this -> _getParam('id'));
        $this -> _redirect('/admin/sections/index/page/1');
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
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> sections ->getSubSectionsPagesCount($section_id, $this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> sections ->getSubSectionsPagesCount($section_id, $this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/sections/categories/section_id/".$section_id."/spage/".$spage."/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
		
        $this -> smarty -> assign('categories', $this -> sections -> getSubSectionsForPage($section_id, $this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> sections ->getSubSectionsPagesCount($section_id, $this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/sections/categories/items_list.tpl');
        $this -> smarty -> assign('Title', 'Categories List');
        $this -> smarty -> display('admin/index.tpl');
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
            $this -> smarty -> display('admin/index.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $sub_section_id = $this -> sections -> createSubSection($dataArray);
            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($sub_section_id, ROOT."images/categories/", '393', '259', '_big');
                $this -> File -> uploadPicture($sub_section_id, ROOT."images/categories/", '288', '190', '_middle');
                $this -> File -> uploadPicture($sub_section_id, ROOT."images/categories/", '88', '58', '_small');
                $this -> File -> uploadPicture($sub_section_id, ROOT."images/categories/", '96', '96', '_square');
                $this -> File -> uploadPicture($sub_section_id, ROOT."images/categories/", '800', '527', '_large');

	        	if($filename!=""){
	        		$this -> sections -> updateImage2($sub_section_id, $filename);
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
            $this -> smarty -> assign('item', $category = $this -> sections -> getSubSectionById($this -> _getParam('id')));
            $this -> smarty -> assign('id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/sections/categories/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Modify Category: '.$category['title']);
            $this -> smarty -> display('admin/index.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$dataArray['id'] = $this -> _getParam('id');
        	$dataArray['section_id'] = $section_id;
        	$this -> sections -> modifySubSection($dataArray);
        	
        	if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/categories/", '393', '259', '_big');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/categories/", '288', '190', '_middle');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/categories/", '88', '58', '_small');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/categories/", '96', '96', '_square');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/categories/", '800', '527', '_large');

	        	if($filename!=""){
	        		$this -> sections -> updateImage2($this -> _getParam('id'), $filename);
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
        $this -> sections -> deleteSubSection($this -> _getParam('id'));
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

    public function ajaxGetCategoriesAction(){
        $sectionId = $this->_getParam('section_id');
        $categoryId = $this->_getParam('category_id');

        $categories = $this->sections->getAllSubSections($sectionId, $this->lang_id);
        ob_start();
        $out_str  = '<select id="category" name="category" class="span2 m-wrap">';
        if($categoryId==0){
            $out_str .= '<option value="0" selected="selected"> ------------------- </option>';
        } else {
            $out_str .= '<option value="0"> ------------------- </option>';
        }

        for($i=0; $i<sizeof($categories); $i++){
            if($categoryId==$categories[$i]['id']){
                $out_str .= '<option value="'.$categories[$i]['id'].'" selected="selected">'.stripslashes($categories[$i]['title']).'</option>';
            } else {
                $out_str .= '<option value="'.$categories[$i]['id'].'">'.stripslashes($categories[$i]['title']).'</option>';
            }
        }
        $out_str .= '</select>';
        ob_clean();
        echo $out_str;

    }
}
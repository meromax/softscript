<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/OptionsDb.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

include_once ROOT . 'application/models/FilesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_OptionsController extends System_Controller_AdminAction
{
    private $options;
    private $content;
    private $File;
    
    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()){
         	$this -> _redirect('/admin');	
        } else {
	        $this -> options = new OptionsDb();
	        $this -> content = new ContentManagerDb();
	        $this->File = new FilesDb();
        }

        $this -> smarty -> assign('adminTopMenu', 'options');
        
    }    
    
    
    //***************************************************************************
    //*******************************  OPTIONS **********************************
    //***************************************************************************        
    public function indexAction() {

		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> options -> getOptionsPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> options -> getOptionsPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/options/index/page/1");
		}
		
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;

        $options =  $this -> options -> getOptionsForPage($this->lang_id, $page);

        for($i=0; $i<sizeof($options); $i++){
            $options[$i]['count'] = sizeof($this->options->getAllProperties($options[$i]['id'], $this->lang_id));
        }

        $this -> smarty -> assign('options', $options);
        $this -> smarty -> assign('countpage', $this -> options -> getOptionsPagesCount($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/options/options/items_list.tpl');
        $this -> smarty -> assign('Title', 'Options List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function addOptionAction() {
        $this -> smarty -> assign('action', 'add-option');
        
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('PageBody', 'admin/options/options/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Options Manager: Add Option');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;

            $this -> options -> addOption($dataArray);
            $this->_redirect("/admin/options/index/page/1");
        }
    }
    
    public function modifyOptionAction() {
        $this->checkOptionForId();
        $this -> smarty -> assign('action', 'modify-option');
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('item', $option = $this -> options -> getOptionById($this -> _getParam('id')));
            $this -> smarty -> assign('id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/options/options/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Modify Option: '.$option['title']);
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$dataArray['id'] = $this -> _getParam('id');
        	$this -> options -> modifyOption($dataArray);
            $this->_redirect("/admin/options/index/page/1");
        }
    }
    
    private function checkOptionForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/options/index/page/1');
        }
    }
    
    public function deleteOptionAction() {
        $this->checkOptionForId();
        $this -> options -> deleteOption($this -> _getParam('id'));
        $this -> _redirect('/admin/options/index/page/1');
    }


    
    //***************************************************************************
    //*******************************  PROPERTIES *******************************
    //***************************************************************************        
    public function propertiesAction() {
    	$option_id      = $this->_getParam('option_id');
    	$this -> smarty -> assign('option_id', $option_id);
    	$spage           = $this->_getParam('spage');
    	$this -> smarty -> assign('spage', $spage);
    	
    	$this -> smarty -> assign('option', $this->options->getOptionById($option_id));

		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> options ->getPropertiesPagesCount($option_id, $this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> options ->getPropertiesPagesCount($option_id, $this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/options/properties/option_id/".$option_id."/spage/".$spage."/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        //echo $option_id; die();
        $this -> smarty -> assign('properties', $this -> options -> getPropertiesForPage($option_id, $this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> options ->getPropertiesPagesCount($option_id, $this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/options/properties/items_list.tpl');
        $this -> smarty -> assign('Title', 'Properties List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function addPropertyAction() {
        $this -> smarty -> assign('action', 'add-property');
        
    	$option_id = $this->_getParam('option_id');
    	$this -> smarty -> assign('option_id', $option_id);
    	$spage = $this->_getParam('spage');
    	$this -> smarty -> assign('spage', $spage);
        
    	$this -> smarty -> assign('section', $this->options->getOptionById($option_id));
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('PageBody', 'admin/options/properties/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Properties Manager: Add Value');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $this -> options -> addProperty($dataArray);
            $this->_redirect("/admin/options/properties/option_id/".$option_id."/spage/".$spage."/page/1");
        }
    }
    
    public function modifyPropertyAction() {
        $this->checkPropertyForId();
        $this -> smarty -> assign('action', 'modify-property');
        
    	$option_id = $this->_getParam('option_id');
    	$this -> smarty -> assign('option_id', $option_id);
    	$spage = $this->_getParam('spage');
    	$this -> smarty -> assign('spage', $spage);
        $this -> smarty -> assign('page', $this -> _getParam('page'));
    	
    	$this -> smarty -> assign('option', $this->options->getOptionById($option_id));
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('item', $property = $this -> options -> getPropertyById($this -> _getParam('id')));
            $this -> smarty -> assign('id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/options/properties/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Modify Property: '.$property['title']);
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$dataArray['id'] = $this -> _getParam('id');
        	$dataArray['option_id'] = $option_id;
        	$this -> options -> modifyProperty($dataArray);
            $this->_redirect("/admin/options/properties/option_id/".$option_id."/spage/".$spage."/page/".$this -> _getParam('page'));
        }
    }
    
    private function checkPropertyForId() {
    	$option_id = $this->_getParam('option_id');
    	$spage = $this->_getParam('spage');
   	
        if( !$this -> _hasParam('id') ) {
            $this->_redirect("/admin/options/properties/option_id/".$option_id."/spage/".$spage."/page/1");
        }
    }
    
    public function deletePropertyAction() {
        $this->checkPropertyForId();
    	$option_id = $this->_getParam('option_id');
    	$spage = $this->_getParam('spage');
        $this -> options -> deleteProperty($this -> _getParam('id'));
        $this->_redirect("/admin/options/properties/option_id/".$option_id."/spage/".$spage."/page/1");
    }
    
    public function getPropertiesAction(){
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

    public function ajaxGetPropertiesAction(){
        $sectionId = $this->_getParam('section_id');
        $categoryId = $this->_getParam('category_id');

        $categories = $this->sections->getAllSubSections($sectionId, $this->lang_id);
        ob_start();
        $out_str  = '<select id="category" name="category" class="input">';
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
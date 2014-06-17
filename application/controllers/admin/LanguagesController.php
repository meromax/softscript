<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/LangDb.php';

include_once ROOT . 'application/models/FilesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_LanguagesController extends System_Controller_AdminAction 
{
    private $languages;
    private $files;
    
    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()){
         	$this -> _redirect('/admin');	
        } else {
	        $this -> languages = new LangDb();
	        $this -> files = new FilesDb();
        }
        
    }    
     
    public function indexAction() {

		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> languages ->getLanguagesPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> languages ->getLanguagesPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/languages/index/page/1");
		}
		
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('languageslist', $this -> languages ->getLanguagesForPage($page));
        $this -> smarty -> assign('countpage', $this -> languages ->getLanguagesPagesCount());
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/languages/items_list.tpl');
        $this -> smarty -> assign('Title', 'Languages List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function addAction() {
        $this -> smarty -> assign('action', 'add');
        
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('PageBody', 'admin/languages/add_modify.tpl');
            $this -> smarty -> assign('Title', 'Languages Manager: Add Language');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = array();
        	
        	//$title = strtolower(iconv('utf-8', 'windows-1251', $this->_getParam('title')));
        	//$title = iconv('windows-1251','utf-8', strtoupper($title[0]).substr($title, 1, strlen($title)));
        	$title = $this->_getParam('title');
        	
        	$short_title_lower = strtolower(iconv('utf-8', 'windows-1251', $this->_getParam('short_title')));
        	
        	$short_title = iconv('windows-1251','utf-8', strtoupper($short_title_lower));
        	$short_title_lower = iconv('windows-1251','utf-8', strtolower(iconv('utf-8', 'windows-1251', $this->_getParam('short_title'))));
        	
        	
        	$dataArray['title'] = $title;
        	$dataArray['short_title'] = $short_title;
        	$dataArray['short_title_lower'] = $short_title_lower;
        	$dataArray['position'] = (int)$this->_getParam('position');
        	
        	$this->languages->createLanguageFolder($short_title_lower);
        	
			$lang_id = $this->languages->addLanguage($dataArray);


            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
	         	$filename = $this -> files -> uploadPicture($lang_id, ROOT."languages/".$short_title_lower."/", '32', '22', '_flag');
	             
	        	if($filename!=""){
	        		$this -> languages -> updateImage($lang_id, $filename);
	        	}         
            }   
            
            $this->_redirect('/admin/languages/index/page/1');
        }
    }
    
    public function modifyAction() {
        $this->checkLaguageForId();
        $this -> smarty -> assign('action', 'modify');
        if( !$this->_hasParam('step') ) {
        	$langData = $this->languages->getLangById($this->_getParam('id'));
        	$file_content = $this->languages->getTranslationFile($langData['short_title_lower']);
        	$language = $this -> languages -> getLangById($this -> _getParam('id'));
        	
        	$language['file_content'] = iconv('windows-1251', 'utf-8', $file_content);
        	//$language['file_content'] = iconv('utf-8','windows-1251', $file_content);
        	
            $this -> smarty -> assign('language', $language);
            $this -> smarty -> assign('id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/languages/add_modify.tpl');
            $this -> smarty -> assign('Title', 'Modify Language: '.$language['title']);
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	
//        	echo "<pre>";
//        	print_r($this->_getAllParams());
//        	die();
        	
        	$lang_id = $this->_getParam('id');
        	
        	$dataArray = array();
        	
        	//$title = strtolower(iconv('utf-8', 'windows-1251', $this->_getParam('title')));
        	//$title = iconv('windows-1251','utf-8', strtoupper($title[0]).substr($title, 1, strlen($title)));
        	
        	$title = $this->_getParam('title');
        	
        	$short_title_lower = strtolower(iconv('utf-8', 'windows-1251', $this->_getParam('short_title')));
        	
        	$short_title = iconv('windows-1251','utf-8', strtoupper($short_title_lower));
        	$short_title_lower = iconv('windows-1251','utf-8', strtolower(iconv('utf-8', 'windows-1251', $this->_getParam('short_title'))));
        	
        	
        	$dataArray['title'] = $title;
        	$dataArray['short_title'] = $short_title;
        	$dataArray['short_title_lower'] = $short_title_lower;
        	$dataArray['position'] = (int)$this->_getParam('position');

        	$this->languages->modifyLanguage($lang_id, $dataArray);
			
        	$file_content = iconv("utf-8", "windows-1251", $this->_getParam('description'));
        	//$file_content = $this->_getParam('description');
        	$this->languages->updateTranslationFile($short_title_lower , $file_content);
        	
            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
	         	$filename = $this -> files -> uploadPicture($lang_id, ROOT."languages/".$short_title_lower."/", '32', '22', '_flag');
	             
	        	if($filename!=""){
	        		$this -> languages -> updateImage($lang_id, $filename);
	        	}         
            }
        	     	
            $this->_redirect('/admin/languages/index/page/1');
        }
    }
    
    private function checkLaguageForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/languages/index/page/1');
        }
    }
    
    public function deleteAction() {
        $this->checkLaguageForId();
        
        $langData = $this->languages->getLangById($this->_getParam('id'));
        $this->languages->deleteLanguageFolder($langData['short_title_lower'], $langData['flag_image']."_flag.jpg");
        
        $this -> languages -> delete($this -> _getParam('id'));
        $this -> _redirect('/admin/languages/index/page/1');
    }
    
    /**
     * Ajax method for check data before add new language
     *
     */
    public function checkBeforeAddAction(){
    	if($this->_hasParam('id')){
    		$id = $this->_getParam('id');
    	} else {
    		$id = 0; 
    	}
    	
    	if($this->_hasParam('title')&&$this->_getParam('title')==''){
    		$error = 1;
    	} elseif ($this->_hasParam('title')&&$this->languages->checkExistLanguageTitle($this->_getParam('title'), $id)){
    		$error = 2;
    	} elseif ($this->_hasParam('short_title')&&$this->_getParam('short_title')==''){
    		$error = 3;
    	} elseif ($this->_hasParam('short_title')&&$this->languages->checkExistLanguageShortTitle($this->_getParam('short_title'), $id)){
    		$error = 4;
    	} elseif ($this->_hasParam('short_title')&&strlen($this->_getParam('short_title'))<2){
    		$error = 5;
    	} elseif ($this->_hasParam('position')&& $this->_getParam('position')==''){
    		$error = 6;
    	} else {
    		$error = 0;
    	}
    	
    	echo $error;
    }    
    
}
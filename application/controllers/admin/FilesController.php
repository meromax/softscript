<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/FilesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_filesController extends System_Controller_AdminAction 
{
    private $files;

    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()) $this -> _redirect('/admin');

        $this->files = new FilesDb();
        $this -> smarty -> assign('adminTopMenu', 'files');
    }
    
    public function indexAction() {
    	
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> files ->getPagesCount2($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> files ->getPagesCount2($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/files/index/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;

        $files = $this -> files -> getFilesForPage2($this->lang_id, $page);
        for($i=0; $i<sizeof($files); $i++){
            $tmpData = explode(md5($files[$i]['id'])."_", $files[$i]['file_name']);
            $files[$i]['file_name_original'] = $tmpData[1];
            $tmpData = explode(".", $files[$i]['file_name']);
            $files[$i]['file_ext'] = strtolower($tmpData[sizeof($tmpData)-1]);
        }

//        echo "<pre>";
//        print_r($files);
//        die();


        $this -> smarty -> assign('files', $files);
       
        $this -> smarty -> assign('countpage', $this -> files ->getPagesCount2($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/files/files_list.tpl');
        $this -> smarty -> assign('Title', 'Files List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    

    public function addFileAction() {
    	//print_r($this->_getAllParams()); 
    	//print_r($_FILES);
    	//die();
        $this -> smarty -> assign('action', 'add-file');
        
        
        if( !$this->_hasParam('step') ) {
        	$this -> smarty -> assign('State', '1');
            $this -> smarty -> assign('PageBody', 'admin/files/add_modify_file.tpl');
            $this -> smarty -> assign('Title', 'Files Manager: Add Files Item');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $id = $this -> files -> createFileItem($dataArray);
        	$filename = $this -> files -> uploadFile($id);
        	if($filename!=""){
        		$dataArray['filename'] = $filename;
        		$dataArray['lang_id'] = $this->lang_id;
        		$this -> files -> modifyFileItem($id, $dataArray);
        	}
            $this->_redirect('/admin/files/index/page/1');
        }
    }
    
    public function modifyFileAction() {
        $this->checkForId();

        $this -> smarty -> assign('action', 'modify-file');
        
        
        if( !$this->_hasParam('step') ) {
            $file = $this -> files -> getFileItemById($this -> _getParam('id'));

            $tmpData = explode(md5($file['id'])."_", $file['file_name']);
            $file['file_name_original'] = $tmpData[1];
            $tmpData = explode(".", $file['file_name']);
            $file['file_ext'] = strtolower($tmpData[sizeof($tmpData)-1]);
//            echo "<pre>";
//            print_r($file);
//            die();
            $this -> smarty -> assign('item', $file);

            $this -> smarty -> assign('id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/files/add_modify_file.tpl');
            $this -> smarty -> assign('Title', 'Modify Files Item: '.$file['title']);
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();

//                        echo "<pre>";
//            print_r($dataArray);
//            die();

        	$dataArray['lang_id'] = $this->lang_id;
        	$filename = $this -> files -> uploadFile($this -> _getParam('id'));
        	if($filename!=""){
        		$dataArray['filename'] = $filename;
        	}
        	$this -> files -> modifyFileItem($this -> _getParam('id'), $dataArray);
            $this->_redirect('/admin/files/index/page/1');
        }
    }
    
    private function checkForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/files/index/page/1');
        }
    }
    
    public function deleteAction() {
        $this->checkForId();
        $this -> files -> deleteFileItem($this -> _getParam('id'));
        $this -> _redirect('/admin/files/index/page/1');
    }
    
    public function getfileAction(){
    	$data = $this -> files -> getFileItemById($this->_getParam('id'));
    	$this -> files -> getFile2('tmp/files/', $data['file_name'], $this->_getParam('id'));
    }
  
}
<?php

include_once ROOT . 'application/models/ContentManagerDb.php';
include_once ROOT . 'application/models/FilesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Content_IndexController extends System_Controller_Action 
{
    protected $file;
    public function init() {
        parent::init();
    }
    
    public function indexAction() {
        $this -> _redirect('/');
    }

    public function getFileAction(){
//        $this->file = new FilesDb();
//        $file_id = $this->_getParam('file_id');
//        $data = $this -> files -> getFileItemById($file_id);
//        print_r($data); die();
        //$this -> files -> getFile2('tmp/files/', $data['file_name'], $file_id);
    }
}
<?php

include_once ROOT . 'application/models/ContentManagerDb.php';
include_once ROOT . 'application/models/FilesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Content_FilesController extends System_Controller_Action
{
    protected $file;
    public function init() {
        parent::init();
    }
    
    public function indexAction() {
        $this->file = new FilesDb();
        $file_id = $this->_getParam('file_id');
        $data = $this -> file -> getFileItemById($file_id);
        $this -> file -> getFile2('tmp/files/', $data['file_name'], $file_id);
    }
}
<?php

include_once ROOT . 'application/models/ContentManagerDb.php';
include_once ROOT . 'application/models/FilesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Documentation_IndexController extends System_Controller_Action
{
    protected $content;
    protected $files;
    public function init() {
        parent::init();
        
        $this->content = new ContentManagerDb();
        $this->files = new FilesDb();
        $this->smarty->assign('menuActive', 'documentation');
    }
    
    public function indexAction() {
        $item = $this->Content->getPageByLink("documentation.html", $this->lang_id);
        $this->smarty->assign('content', $item);

        $documents = $this->files->getAllFiles($this->lang_id);

        for($i=0; $i<sizeof($documents); $i++){
            $tmpData = explode(md5($documents[$i]['id'])."_", $documents[$i]['file_name']);
            $documents[$i]['file_name_original'] = $tmpData[1];
            $tmpData = explode(".", $documents[$i]['file_name']);
            $documents[$i]['file_ext'] = strtolower($tmpData[sizeof($tmpData)-1]);
        }
        $this->smarty->assign('documents', $documents);
//        echo "<pre>";
//        print_r($documents);
//        die();

        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('PageBody', 'documentation/index.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

}
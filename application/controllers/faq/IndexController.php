<?php
include_once ROOT . 'application/models/FaqDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Faq_IndexController extends System_Controller_Action {
    
	protected $faq;
    public function init() {
        parent::init();
        $this->faq = new FaqDb();
    }
    
    public function indexAction() {

		$faq_section_print = array();
		$faq_sections = $this->faq->getAllSectionsItems($this->lang_id);
		
		for($i=0; $i<sizeof($faq_sections); $i++){
			$data = $this->faq->getAllContentItemsBySectionId($faq_sections[$i]['id'], $this->lang_id);
			if(sizeof($data)>0){
				$faq_sections[$i]['content'] = $data;
				$faq_section_print[] = $faq_sections[$i];
			}
		}
    	$this->smarty->assign('items', $faq_section_print);
        $this->smarty->assign('Title', 'FAQ');
        $this->smarty->assign('PageBody', 'faq/show_items.tpl');
        $this->smarty->display('layouts/main.tpl');
    }
}
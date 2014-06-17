<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/CalculatorDb.php';

include_once ROOT . 'application/models/LangDb.php';

include_once ROOT . 'application/models/TThemesDb.php';


/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_CalculatorController extends System_Controller_AdminAction 
{
    protected $calc;
    protected $languages;
    protected $tthemes;
   
    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()){
        	$this -> _redirect('/admin');
        }
		
		$this->calc = new CalculatorDb();
		$this->languages =new LangDb();
		$this->tthemes = new TThemesDb();
    }
    
     
    public function indexAction() {
    	
    	$langsData = $this->languages->getAllLanguages();
    	
    	if(!isset($_GET['lang_from'])){
    		$this->_redirect("/admin/calculator/index?lang_from=".$langsData[0]['lang_id']);
    	} else {
    		$lang_from = $_GET['lang_from'];
    	}
    	
    	$this -> smarty -> assign('calc_languages', $langsData);
    	
    	$langsDataWithoutChoosed = $this->languages->getAllLanguagesWithoutChoosed($lang_from);

    	for($i=0; $i<sizeof($langsDataWithoutChoosed); $i++){
    		$langParams = $this->languages->checkExistTDP($lang_from, $langsDataWithoutChoosed[$i]['lang_id']);
    		if($langParams){
    			$langsDataWithoutChoosed[$i]['price'] = $langParams['price'];
    			$langsDataWithoutChoosed[$i]['letters_count'] = $langParams['letters_count'];
    		} else {
				$langsDataWithoutChoosed[$i]['price'] = "";
    			$langsDataWithoutChoosed[$i]['letters_count'] = "";    			
    		}
    	}
  	
    	
    	$this -> smarty -> assign('calc_languages_to', $langsDataWithoutChoosed);
    	
    	$this -> smarty -> assign('lang_from', $lang_from);    	
        $this -> smarty -> assign('PageBody', 'admin/calculator/index.tpl');
        $this -> smarty -> assign('Title', 'Calculator');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function updateAction(){
    	$lang_from_id = $this->_getParam('lang_from');
    	
    	$translations_directions = array();
    	
    	$data = $this->_getAllParams();

    	foreach ($data as $key => $value){
    		if(substr($key, 0, 10) == 'calc_price'){
    			$data = explode("calc_price", $key);
    			$translations_directions[] = array('lang_to_id' => $data[1]);
    			$translations_directions[] = array($key => $value);
    		} elseif (substr($key, 0, 8) == 'calc_let'){
    			$translations_directions[] = array($key => $value);
    		}
    	}

    	for ($i=0; $i<sizeof($translations_directions); $i+=3){

    			$lang_to_id = $translations_directions[$i]['lang_to_id'];
    			$price = $translations_directions[$i+1]['calc_price'.$lang_to_id];
    			$letters_count = $translations_directions[$i+2]['calc_letters_count'.$lang_to_id];
    			
				$dataArray = array();
				$dataArray['lang_from_id'] = $lang_from_id;
				$dataArray['lang_to_id'] = $lang_to_id;
				$dataArray['price'] = $price;
				$dataArray['letters_count'] = $letters_count;
    				    			
    			if($this->languages->checkExistTDP($lang_from_id, $lang_to_id)){
    				if($dataArray['price']!=''&&$dataArray['letters_count']!=''){
    					$this->languages->updateTDP($dataArray);
    				}
    			} else {
    				if($dataArray['price']!=''&&$dataArray['letters_count']!=''){
    					$this->languages->addTDP($dataArray);
    				}
    			}
    	}
		$this->_redirect('/admin/calculator/index?lang_from='.$lang_from_id);
    }
    
}
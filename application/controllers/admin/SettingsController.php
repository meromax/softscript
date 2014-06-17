<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/SettingsDb.php';


/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_SettingsController extends System_Controller_AdminAction 
{
    
    protected $sett;
   
    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()){
        	$this -> _redirect('/admin');
        }

		$this->sett = new SettingsDb();

        $this -> smarty -> assign('adminLeftMenu', 'settings');
    }
    
     
    public function pageAction() {
    	$this -> smarty -> assign('admin_settings', $this->sett->getSettingsById($this->lang_id));
        $this -> smarty -> assign('PageBody', 'admin/settings/form.tpl');
        $this -> smarty -> assign('Title', 'Settings');
        $this -> smarty -> display('admin/index.tpl');
    }
    
    public function updateAction(){
    	$settings_id = $this->_getParam('settings_id');
    	$settings = json_encode($this->_getAllParams());
    	$this->sett->updateSettings($settings, $this->lang_id);
		$this->_redirect('/admin/settings/page');
    }
    
}
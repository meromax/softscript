<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');

/** Load Area Control model */
include_once ROOT . 'application/models/AdminAreaControlModel.php';

class Prarea_IndexController extends System_Controller_AdminAction
{
    
    public function init()
    {
        parent::init();
        
        //$adm=new AdminAreaControl();
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()) $this -> _redirect('/admin');
      
        //$adm->refreshAdminLastLogin();
        $this -> smarty -> assign('adminLeftMenu', 'dashboard');
    }
    
    /**
     * Index action for prArea_IndexController
     * 
     * @link /prarea(/index)
     */
    public function indexAction()
    {
        
        $this -> smarty -> assign('PageBody', 'admin/default/index.tpl');
        $this -> smarty -> assign('Title', 'Administration Panel');
        $this -> smarty -> display('admin/index.tpl');
        
    }
     
}
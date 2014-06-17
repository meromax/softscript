<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

/** Load Area Control model */
include_once ROOT . 'application/models/AreaControlModel.php';

class Area_IndexController extends System_Controller_Action
{
    
    public function init()
    {
        parent::init();
        
        /** Check for user access */
        if(!AreaControl::checkAccess()) $this -> _redirect('/login');
    }
    
    /**
     * Index action for Area_IndexController
     * 
     * @link /area(/index)
     */
    public function indexAction()
    {
        $this->_redirect('/area/profile');        
    }
}
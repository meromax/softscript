<?php

/** Load Database object model */
include_once ROOT . 'application/models/UsersDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Users_ProfileController extends System_Controller_Action
{
    /** Db object */
    public $UserDB;
    
    public function init()
    {
        parent::init();
        $this -> UserDB = new Users();
    }
    
    public function indexAction()
    {
        echo 'Bad request';
    }
    
    /**
     * Checking username existance
     * @todo output: 1 - if username is already exists
     *               0 - if username is available for registration
     */
    public function ViewAction()
    {
        
        $username = $this -> _request -> getParam('username');
        
        $result = $this -> UserDB -> getUserDataByUsername($username);
        $this -> smarty -> assign('FullImage', md5($result -> id) . '_full.jpg');
        $this -> smarty -> assign('userData', $result);
        $this -> smarty -> assign('PageBody', 'users/profile.tpl');
        $this -> smarty -> display('layouts/main.tpl');
    }
}
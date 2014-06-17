<?php

/** Load Database object model */
include_once ROOT . 'application/models/UsersDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Api_IndexController extends System_Controller_Action
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
    public function checkUsernameAction()
    {
        $username = $this -> _request -> getParam('ApiRequest');
        $result = $this -> UserDB -> checkUsername($username);
        echo $result;
    }
}
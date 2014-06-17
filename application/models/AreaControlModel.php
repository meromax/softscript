<?php

/** Load User model */
include_once ROOT . 'application/models/UsersDb.php';

class AreaControl
{
    private $userInfo;
    
    /** Users Db object model */
    private $Users;
    
    public function __construct()
    {
        $this -> userInfo = Zend_Auth::getInstance() -> getStorage() -> read();
        
        $this -> Users = new Users();
    }
    
    public function getProfileType()
    {
        return $this -> userInfo -> member_id;
    }
    
    public function getUserData()
    {
    	//print_r($this -> userInfo);
        return $this -> userInfo;
    }
    
    /** Wrapper for method Auth::CheckAuth() */
    public function checkAccess()
    {
        $controller = System_Controller_Action::getInstance();
        if($controller -> auth -> CheckAuth())   return true;
        else                                     return false;
    }
    
    /**
     * Refresh current user session Auth Data
     * Can be used after profile updating
     * 
     * @uses Zend_Auth
     */
    public function refreshUserData()
    {
        $userId = $this -> userInfo -> member_id;
        
        $refreshed = $this -> Users -> getUserDataById($userId);
        Zend_Auth::getInstance() -> getStorage() -> write($refreshed);
    }    
    
}
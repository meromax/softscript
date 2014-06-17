<?php

/** Load Admin model */
include_once ROOT . 'application/models/AdminDb.php';


class AdminAreaControl
{
    private $adminInfo;
   	private $user;
    
    /** Admin Db object model */
    private $Admin;
   
    
    public function __construct()
    {
        $this -> adminInfo = Zend_Auth::getInstance() -> getStorage() -> read();
        $this -> Admin = new Admin_tbl();
    }
    
   
    
    public function getUserData()
    {
        return $this -> adminInfo;
    }
    
    /** Wrapper for method Auth::CheckAuth() */
    public function checkAccess()
    {
        $controller = System_Controller_AdminAction::getInstance();
        
        if($controller -> auth -> CheckAuth()){
        	return true;
        } else {
        	return false;
        }
    }
    
    public function checkAdmin()
    {
    	$this->user = Zend_Auth::getInstance() -> getStorage() -> read();
        if($this->user->status){
        	return 1;
        } else {
        	return 0;
        }
    }    
    
   
    
}
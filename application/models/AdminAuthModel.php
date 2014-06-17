<?php

/** Load Auth adapter */
Zend_Loader::loadClass('Zend_Auth');
Zend_Loader::loadClass('Zend_Auth_Storage_Session');
Zend_Loader::loadClass('Zend_Auth_Adapter_DbTable');
/** Load Admin model */
include_once ROOT . 'application/models/AdminDb.php';


class AuthAdmin
{
    /**
     * Database object
     *
     * @var object
     */
    private $db;
     /** Admin Db object model */
    private $Admin;
    
    /**
     * Authenticate adapter object
     *
     * @var object
     */
    private $authAdapter;
    
    public $message;
    
    /**
     * Class constructor
     * Initialize AuthAdmin
     */
    public function __construct()
    {
        /** Get database object from registry */
        $this -> db = Zend_Registry::get('db');
        
        /** Configure the instance with constructor parameters */
        $this -> authAdapter = new Zend_Auth_Adapter_DbTable($this -> db);
        $this -> authAdapter -> setTableName('admin_tbl')
                             -> setIdentityColumn('email')
                             -> setCredentialColumn('pw');
        $this -> Admin = new Admin_tbl();
    }
    
    /**
     * Authorization method
     *
     * @param string $username
     * @param string $password
     */
    public function Authorize($username, $password)
    {
        /** Set the input credential values from a login form */
        $this -> authAdapter -> setIdentity($username)
                             -> setCredential($password);
                             
        /** Perform the authentication query, saving the result */
        $auth = Zend_Auth::getInstance();
        $auth -> setStorage(new Zend_Auth_Storage_Session('loginAdmin'));
            
        $result = $auth -> authenticate($this -> authAdapter);
        /** If Auth failed */
        if(!$result -> isValid())
        {
            $Err = new Zend_Config_Xml(ROOT . 'configs/error_messages/messages.xml', 'errors');
            
            /** Clear Identity */
            $auth -> clearIdentity();
            
            /** Getting Error code */
            switch ($result -> getCode())
            {
                case Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND:
                    /** do stuff for nonexistent identity **/
                    $this -> message = $Err -> login_username_not_found;
                    break;
            
                case Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID:
                    /** do stuff for invalid credential **/
                    $this -> message = $Err -> login_invalid_password;
                    break;
            }
            
            /** Failed user Auth */
            return false;
        } 
        
        /** If Auth success */
        else
        {
            /** Write authentication query, saving the result */
            $auth -> getStorage() -> write($this -> authAdapter -> getResultRowObject());
            
            /** Tell to system that no message exists */
            $this -> message = false;
            $this -> refreshAdminLastLogin();
            
            /** Success user auth */
            return true;
        }

    }
    
    /**
     * Check for user loged in
     *
     * @return boolean
     */
    public function checkAuth()
    {
        $auth = Zend_Auth::getInstance();
        $auth -> setStorage(new Zend_Auth_Storage_Session('loginAdmin'));
        if($auth -> getIdentity())  return true;
        else    return false;
    }
    
    /**
     * Getting Auth info of current user
     *
     * @return object
     */
    public function getAuthInfo()
    {
        $auth = Zend_Auth::getInstance();
        $auth -> setStorage(new Zend_Auth_Storage_Session('loginAdmin'));
        
        return Zend_Auth::getInstance() -> getStorage() -> read();
    }
    
    /**
     * Logout user
     */
    public function Logout()
    {
        Zend_Auth::getInstance() -> clearIdentity();
        Zend_Auth::getInstance() -> setStorage(new Zend_Auth_Storage_Session('loginAdmin'));
        Zend_Auth::getInstance() -> getStorage() -> clear();
    }
    /**
     * Refresh current admin 
     * 
     * @uses Zend_Auth
     */
    public function refreshAdminLastLogin()
    { 
         $qqq = Zend_Auth::getInstance() -> getStorage() -> read();
         $adminId=$qqq->id; 
         $refreshed = $this -> Admin -> updateAdminLastLogin($adminId);
       
    }    
}
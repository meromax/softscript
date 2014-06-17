<?php

/** Load Auth adapter */
Zend_Loader::loadClass('Zend_Auth');
Zend_Loader::loadClass('Zend_Auth_Storage_Session');
Zend_Loader::loadClass('Zend_Auth_Adapter_DbTable');


class Auth
{
    /**
     * Database object
     *
     * @var object
     */
    private $db;
    
    /**
     * Authenticate adapter object
     *
     * @var object
     */
    private $authAdapter;
    
    public $message;
    
    /**
     * Class constructor
     * Initialize Auth
     */
    public function __construct()
    {
        /** Get database object from registry */
        $this -> db = Zend_Registry::get('db');
        
        /** Configure the instance with constructor parameters */
        $this -> authAdapter = new Zend_Auth_Adapter_DbTable($this -> db);
        $this -> authAdapter -> setTableName('users')
                             -> setIdentityColumn('email')
                             -> setCredentialColumn('password');
    }
    
    /**
     * Authorization method
     *
     * @param string $username
     * @param string $password
     */
    public function Authorize($email, $password)
    {
        /** Set the input credential values from a login form */
        $this -> authAdapter -> setIdentity($email)
                             -> setCredential($password);
                             
        /** Perform the authentication query, saving the result */
        $auth = Zend_Auth::getInstance();
        $auth -> setStorage(new Zend_Auth_Storage_Session('loginNamespace'));
            
        $result = $auth -> authenticate($this -> authAdapter);
		//print_r($result); die();
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
            
            /** Success user auth */
            return true;
        }

    }
    
    /**
     * Check for user loged in
     *
     * @return boolean
     */
    public function CheckAuth()
    {
        $auth = Zend_Auth::getInstance();
        $auth -> setStorage(new Zend_Auth_Storage_Session('loginNamespace'));
        if($auth -> getIdentity())  return true;
        else    return false;
    }
    
    /**
     * Getting Auth info of current user
     *
     * @return object
     */
    public function GetAuthInfo()
    {
        $auth = Zend_Auth::getInstance();
        $auth -> setStorage(new Zend_Auth_Storage_Session('loginNamespace'));
        
        return Zend_Auth::getInstance() -> getStorage() -> read();
    }
    
    /**
     * Logout user
     */
    public function Logout()
    {
        Zend_Auth::getInstance() -> clearIdentity();
        Zend_Auth::getInstance() -> setStorage(new Zend_Auth_Storage_Session('loginNamespace'));
        Zend_Auth::getInstance() -> getStorage() -> clear();
    }
}
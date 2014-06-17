<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');

/** Load Area Control model */
include_once ROOT . 'application/models/AdminAreaControlModel.php';
/** Load User model */
include_once ROOT . 'application/models/UsersDb.php';


class Prarea_UsersController extends System_Controller_AdminAction
{
    /** Users Db object model */
    private $Users;
    public function init()
    {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()) $this -> _redirect('/admin');
       $this -> Users = new Users();
    }
    
    /**
     * Index action for prArea_IndexController
     * 
     * @link /prarea(/index)
     */
    public function indexAction()
    {
        
        $auth = Zend_Auth::getInstance();
        $qqq = Zend_Auth::getInstance() -> getStorage() -> read();
       
        $allUsers = $this -> Users -> getAllUserData();
       //var_dump($allUsers);
        $this -> smarty -> assign('users', $allUsers);
        $this -> smarty -> assign('PageBody', 'admin/users.tpl');
        $this -> smarty -> assign('Title', 'Users');
        $this -> smarty -> display('layouts/adminmain.tpl');
        
    }
      /**
     * Index action for prArea_IndexController
     * 
     * @link /prarea(/index)
     */
    public function deactAction()
    {
        
        $auth = Zend_Auth::getInstance();
        $qqq = Zend_Auth::getInstance() -> getStorage() -> read();
        
        $request = $this->getRequest();
        $id = $request->getParam('opt_id');

       // var_dump($id);
        $this -> Users -> deactivateUserProfile($id);
        $allUsers = $this -> Users -> getAllUserData();
       //var_dump($allUsers);
        $this -> smarty -> assign('users', $allUsers);
        $this -> smarty -> assign('PageBody', 'admin/users.tpl');
        $this -> smarty -> assign('Title', 'Users');
        $this -> smarty -> display('layouts/adminmain.tpl');
        
    }
         /**
     * Index action for prArea_IndexController
     * 
     * @link /prarea(/index)
     */
    public function viewAction()
    {
        $request = $this->getRequest();
       $username = $request->getParam('email');
        //echo $username;
       // var_dump($this->getRequest()->getParams());
        $result = $this -> Users -> getUserDataByUsername($email);
        
        $this -> smarty -> assign('FullImage', md5($result -> id) . '_full.jpg');
        $this -> smarty -> assign('userData', $result);
        $this -> smarty -> assign('PageBody', 'users/profile.tpl');
        $this -> smarty -> display('layouts/adminmain.tpl');
        
    }
 
    
}
<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');

class Admin_IndexController extends System_Controller_AdminAction
{
    private $table;

    public function indexAction()
    {
        if($this -> auth -> CheckAuth()) $this -> _redirect('/prarea');
        
        elseif($this -> _request -> getParam('pw') && $this -> _request -> getParam('username'))
        {
            $this -> _forward('auth');
        }
        
        else
        {
            $this -> smarty -> assign('Title', 'Администраторская панель :: Авторизация');
            $this -> smarty -> display('admin/login.tpl');
        }
    }
    
    public function authAction()
    {
        /** Load database object model */
        include_once ROOT . 'application/models/AdminAuthModel.php';
        
        $username = $this -> _request -> getParam('username');
        $password = $this -> _request -> getParam('pw');
        
        $Auth = new AuthAdmin();
        
        if($Auth -> Authorize($username, $password))
        {
            $this -> _redirect('/prarea');
        }
        else
        {
            $Err = new Zend_Config_Xml(ROOT . 'configs/error_messages/messages.xml', 'errors');
            
            $msg = array();
            $msg[] = $Auth -> message;
            
            /** Preparing warning block */
            $this -> smarty -> assign('WarnTitle', $Err -> error_block_title);
            $this -> smarty -> assign('WarnMessages', $msg);
            //print_r($msq);
            //die();
            $errBlock = $this -> smarty -> fetch('warningBlock.tpl');
            

            $this -> smarty -> assign('warningBlock', $errBlock);
            $this -> smarty -> assign('Title', 'Администраторская панель :: Авторизация');
            $this -> smarty -> display('admin/login.tpl');
        }
    }
    
    public function logoutAction()
    {
        $this -> auth -> Logout();
        $this -> _redirect('/admin');
    }
}
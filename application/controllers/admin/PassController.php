<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_PassController extends System_Controller_AdminAction 
{
	const ADMIN_TABLE = 'admin_tbl';
    private $Portfolios;
    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()) $this -> _redirect('/admin');
        
   }
    
    public function indexAction() {
        if(isset($_SESSION['successMessage'])){
            $this -> smarty -> assign('successMessage', $_SESSION['successMessage']);
            unset($_SESSION['successMessage']);
        }
        $this -> smarty -> assign('PageBody', 'admin/pass/change_password.tpl');
        $this -> smarty -> assign('Title', 'Password Change');
        $this -> smarty -> display('admin/index.tpl');
    }
    
    public function changePassAction(){
    	$password    = $this -> request -> getParam('password');
    	$re_password = $this -> request -> getParam('re_password');
    	
    	if($password==$re_password){
	        $data = array('pw'=>$password);
	        $this -> db -> update(self::ADMIN_TABLE, $data, 'id = 1');
	        $_SESSION['successMessage'] = 'Пароль изменен успешно!';
	        $this->_redirect('/admin/pass');
    	} else {
            $this->_redirect('/admin/pass');
    	}
    }

}
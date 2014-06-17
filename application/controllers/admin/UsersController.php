<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/UsersDb.php';


/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_UsersController extends System_Controller_AdminAction
{
   
    private $users;
    
    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()){
        	$this -> _redirect('/admin');
        }
	
		$this -> users = new UsersDb();

        $this -> smarty -> assign('adminLeftMenu', 'users');
	}
    
    /**
     * Show list of a users
     *
     */
    
    public function indexAction() {

		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> users ->getPagesCount()<=1 ))
			||($this->_getParam('page')>1&&$this -> users ->getPagesCount()<$this->_getParam('page'))
		){
			$this->_redirect("/admin/users/index/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('users', $this -> users -> getUsersForPage($page));
       
        $this -> smarty -> assign('countpage', $this -> users ->getPagesCount());
        $this -> smarty -> assign('page', $page+1);
        $this -> smarty -> assign('PageBody', 'admin/users/list.tpl');
        $this -> smarty -> assign('Title', 'Users List');
        $this -> smarty -> display('admin/index.tpl');
        
    }
    
    public function viewAction(){
     	$this -> smarty -> assign('item', $this->users->getUserById($this->_getParam('id')));
        $this -> smarty -> assign('PageBody', 'admin/users/view.tpl');
        $this -> smarty -> assign('Title', 'User View ');
        $this -> smarty -> display('admin/index.tpl');
    }
    
    public function deleteAction() {
		if($this->_hasParam('id')){
			$this -> users ->delete($this->_getParam('id'));
			$this -> _redirect( '/admin/users/index/page/1');
		}
    }
    

    /**
     * Ajax method for changing user status active/passive(1/0)
     *
     */
    public function changeUserStatusAction(){
		$this->users->changeUserStatus($this->_getParam('id'));
		$user = $this->users->getUserById($this->_getParam('id'));
		echo (int)$user['active'];  	
    }	
    
}
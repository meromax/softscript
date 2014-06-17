<?php
/** Load User model */
include_once ROOT . 'application/models/UsersDb.php';
/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Areap_IndexController extends System_Controller_Action
{
	/** Users Db object model */
    private $Users;
    /** Errors array */
    private $Errors = array();
    
    public function init()
    {
        parent::init();
        $this->Users = new Users();
		//echo $this->_getParam("memberid");

    }
    
    /**
     * Index action for Area_IndexController
     * 
     * @link /area(/index)
     */
    public function indexAction()
    {
       $this->_redirect('profile'); 
    }
    // show public profile
    protected function profileAction ()
    {	
    	if($this->_getParam("memberid")){
	    	$userdata = $this->Users->getUserDataById($this->_getParam("memberid"));
	    	if(!empty($userdata)) {
		    	//print_r($userdata);
		    	$this->smarty->assign('userData',  $userdata);
		        $this->smarty->assign('PageBody', 'areap/public_profile.tpl');
		        $this->smarty->assign('Title', 'View Profile');
		        $this->smarty->display('layouts/main.tpl');
	    	} else {
	    		$this->_redirect('/');
	    	}
    	} else {
    		$this->_redirect('/');
    	}
    }
}
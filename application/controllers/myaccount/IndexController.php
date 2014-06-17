<?php

/** Load Database object model */
include_once ROOT . 'application/models/UsersDb.php';

include_once ROOT . 'application/models/MembersDb.php';

include_once ROOT . 'application/models/FilesDb.php';

include_once ROOT . 'application/models/OrdersDb.php';

include_once ROOT . 'application/models/SitesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class MyAccount_IndexController extends System_Controller_Action
{
    /** Db object */
    public $UserDB;
    public $Member;
    protected $files;
    protected $orders;
    protected $site;
   
    public function init()
    {
        parent::init();
		if(!isset($_SESSION['loginNamespace'])){
			$this->_redirect('/loginpage.html');
		}
        $this -> UserDB = new Users();
        $this -> Member = new MemberDb();
        $this -> files  = new FilesDb();
        $this -> orders = new OrdersDb();
        $this -> site   = new SitesDb();
     }
    
    public function indexAction() {
        $orders = $this -> orders -> getUsersOrders($this->member_id);
        for($i=0; $i<sizeof($orders); $i++){
        	$orders[$i]['sitetype'] = $this->site->getSiteTypesItemById($orders[$i]['sitetype_id']);
        	$orders[$i]['cms'] = $this->site->getCMSItemById($orders[$i]['cms_id']);
        	$orders[$i]['design'] = $this->site->getDesignItemById($orders[$i]['design_id']);
        }

        $this -> smarty -> assign('orders', $orders);
        $this -> smarty -> assign('member_info', $this->Member->getMemberById($this->member_id));
        $this -> smarty -> assign('orders_count', sizeof($orders));
        $this -> smarty -> assign('PageBody', 'myaccount/main.tpl');
        $this -> smarty -> assign('Title', 'My Account');
        $this -> smarty -> display('layouts/sub.tpl');
    }
    
    public function checkemailAction(){
    	ob_clean();
    	if($_SESSION['loginNamespace']['storage']->member_email==$this->_getParam('email')){
    		echo 0;
    	} else {
    		echo $this->UserDB->checkEmail2($this->_getParam('email'));
    	}
    }
    
    public function getfileAction(){
    	$data = $this -> files -> getFileItemById($this->_getParam('id'));
    	$this -> files -> getFile('tmp/files/', $data['file_name'], $this->_getParam('id')); 
    }
    
    
    public function updatepasswordAction(){
    	$data = $this->_getAllParams();
    	$old_password = $data['old_password'];
    	$new_password = $data['new_password'];
    	
    	$member_id = $_SESSION['loginNamespace']['storage']->member_id;
    	$memData   = $this->Member->getMemberById($member_id); 
    	$member_password = $_SESSION['loginNamespace']['storage']->member_password;
    	
    	if($memData['member_password']==md5($old_password)){
    		ob_clean();
    		$dataArray['member_id'] = $member_id;
    		$dataArray['new_password'] = md5($new_password);
    		$this->Member->updatePassword($dataArray);
    		// mail to user
	        $emailTxt = new Zend_Config_Xml(ROOT.'configs/project/email.xml', 'email');
	        
	        Zend_Loader::loadClass('Zend_Mail');    /** Loading Zend_Mail */
	        $mail = new Zend_Mail();
	        $mail -> addHeader('X-MailGenerator', $emailTxt -> email_generator);
	        
	        $this -> smarty -> assign('new_password', $new_password);
	        $this -> smarty -> assign('user_mail', 1);
	        $mailBody = $this -> smarty -> fetch('myaccount/change_password_mail.tpl');
	        
	        $mail -> setBodyHtml($mailBody,'UTF-8');
	        $mail -> setFrom('Mailer-Daemon@digital.com', $emailTxt -> from_name);
	        $mail -> addTo($memData['member_email']);
	        $subject = '=?UTF-8?B?'.base64_encode($this->settings['password_changed_mail']).'?=';
	        $mail -> setSubject($subject);
	        
	        /** Send email */
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	        $mail->send();
    		
    		ob_clean();
    		echo "";
    	} else {
    		ob_clean();
    		echo 1;
    	}
    }
    
    public function updateinfoAction(){
    	$data = $this->_getAllParams();
    	$member_id = $_SESSION['loginNamespace']['storage']->member_id;
    	ob_clean();
    	$data['member_id'] = $member_id;
    	$this->Member->updateInfo($data);
    	echo "";
    }
}
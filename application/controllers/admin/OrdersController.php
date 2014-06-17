<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/OrdersDb.php';

include_once ROOT . 'application/models/UsersDb.php';

include_once ROOT . 'application/models/LangDb.php';

include_once ROOT . 'application/models/FilesDb.php';

include_once ROOT . 'application/models/TThemesDb.php';

include_once ROOT . 'application/models/SitesDb.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

include_once ROOT . 'application/models/SettingsDb.php';

include_once ROOT . 'application/models/ProductsDb.php';
/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_OrdersController extends System_Controller_AdminAction 
{
    
    protected $orders;
    
    protected $users;
    
    protected $languages;
    
    protected $files;
    
    protected $tthemes;

    protected $site;

    protected $content;

    protected $settings;

    protected $products;

    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()){
        	$this -> _redirect('/admin');
        }

		$this->orders = new OrdersDb();
		$this->users = new UsersDb();
		$this->languages = new LangDb();
		$this->files = new FilesDb();
		$this->tthemes = new  TThemesDb();
        $this->site = new SitesDb();
        $this->settings = new SettingsDb();
        $this->products = new ProductsDb();

        $this -> smarty -> assign('adminLeftMenu', 'orders');
    }
    
     
    public function indexAction() {
        //unset($_SESSION['fhost'], $_SESSION['fstatus'], $_SESSION['faction_pay'], $_SESSION['admin_filter']);
        if(isset($_SESSION['fhost'])&&isset($_SESSION['fstatus'])&&isset($_SESSION['faction_pay'])){
            $this -> smarty -> assign('fhost', $_SESSION['fhost']);
            $this -> smarty -> assign('fstatus', $_SESSION['fstatus']);
            $this -> smarty -> assign('faction_pay', $_SESSION['faction_pay']);
        } else {
            $this -> smarty -> assign('fhost', "");
            $this -> smarty -> assign('fstatus', "");
            $this -> smarty -> assign('faction_pay', 2);
        }

		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> orders ->getAdminOrdersPagesCount()<=1 ))
			||($this->_getParam('page')>1&&$this -> orders ->getAdminOrdersPagesCount()<$this->_getParam('page'))
		){
			$this->_redirect("/admin/orders/index/page/1");
		}
		
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;

		$ordersData = $this -> orders ->getAdminOrdersForPage($page);

        for($i=0; $i<sizeof($ordersData); $i++){
            if($ordersData[$i]['user_id']>0){
                $userData = $this->users->getUserById($ordersData[$i]['user_id']);
                $ordersData[$i]['client_name'] = $userData['first_name'];
            } else {
                $ordersData[$i]['client_name'] = '';
            }
        }

        //die();
        $this -> smarty -> assign('sites', $this->site->getAllSites());
        $this -> smarty -> assign('orders', $ordersData);
        $this -> smarty -> assign('countpage', $this -> orders ->getAdminOrdersPagesCount());
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/orders/items_list.tpl');
        $this -> smarty -> assign('Title', 'Orders List');
        $this -> smarty -> display('admin/index.tpl');
    }

    public function filterAction(){


        if($this->_hasParam('filter_status')){
            //print_r($this->_getAllParams()); die();

            if($this->_getParam('filter_type')==0){
                //echo $this->_getParam('filter_type'); die();
                unset($_SESSION['fstatus'],$_SESSION['admin_filter']);
                $this->_redirect('/admin/orders/index/page/1');
            }
            $filter = '';

            if($this->_getParam('filter_status')!=""){
                if($filter!=""){
                    $filter .=" AND status=".(int)$this->_getParam('filter_status')." ";
                } else {
                    $filter .=" WHERE status=".(int)$this->_getParam('filter_status')." ";
                }
            }

            if($filter!=''){
                $_SESSION['fstatus'] = $this->_getParam('filter_status');
                $_SESSION['admin_filter'] = $filter;
            }

        }
        //echo $filter; die();
//        echo "<pre>";
//        print_r($_SESSION);
//        die();
        $this->_redirect('/admin/orders/index/page/1');
    }

    public function resetAction(){
        unset($_SESSION['admin_filter']);
        $this->_redirect('/admin/orders/index/page/1');
    }

    public function viewAction() {

        $this -> smarty -> assign('action', 'view');
        $orderData = $this->orders->getOrderById($this->_getParam('id'));
        $this -> smarty -> assign('order', $orderData);
        $cart = (array)json_decode($orderData['products'], true);
        for($i=0; $i<sizeof($cart); $i++){
            $pInfo = $this -> products -> getProductMainImageById($cart[$i]['id']);
            $cart[$i]['image'] = $pInfo['image'];
        }
//        echo "<pre>";
//        print_r($cart);
//        die();
        $this -> smarty -> assign('cart', $cart);

        $this -> smarty -> assign('page', $this->_getParam('page'));
        $this -> smarty -> assign('PageBody', 'admin/orders/view.tpl');
        $this -> smarty -> assign('Title', 'View Order');
        $this -> smarty -> display('admin/index.tpl');
    }

    public function modifyAction() {
        $this -> smarty -> assign('action', 'modify-order');
        $orderData = $this->orders->getOrderById($this->_getParam('id'));
        $this -> smarty -> assign('order', $orderData);
        $this -> smarty -> assign('page', $this->_getParam('page'));
        $this -> smarty -> assign('PageBody', 'admin/orders/modify.tpl');
        $this -> smarty -> assign('Title', 'Modify Order');
        $this -> smarty -> display('admin/index.tpl');
    }

    public function modifyOrderAction() {
        $this->orders->updateOrder($this->_getParam('id'), $this->_getAllParams());
        $this->_redirect('/admin/orders/view/id/'.$this->_getParam('id')."/page/".$this->_getParam('page'));
    }
    
    public function getfileAction(){
        $type = $this->_getParam('type');
		$orderData = $this -> orders -> getOrderById($this->_getParam('id'));
		if(!empty($orderData)){
            if($type==''){
    		    $this -> files -> getFile('orders_files/', $orderData['filename'], $orderData['filename_original']);
            } else {
                $this -> files -> getFile('orders_files/', $orderData['filename2'], $orderData['filename_original2']);
            }
		}
    }
    
    public function getfiletAction(){
		$orderData = $this -> orders -> getOrderById($this->_getParam('id'));
		if(!empty($orderData)){
    		$this -> files -> getFile('orders_files/', $orderData['filename_translated'], $orderData['filename_translated_original']);    	
		}
    }    
    


    
	public function changeactiveAction()
	{
		$id = $this -> _getParam('id');
		$this -> orders -> changeOrderStatus($id);
		$this -> _redirect( '/admin/orders/index/status/'.$this -> _getParam('status').'/page/1');
	}

    public function deleteItemsAction(){
        $idsArray = explode(",",$this->_getParam('ids'));
        for($i=0; $i<sizeof($idsArray); $i++){
            $this -> orders ->deleteOrder($idsArray[$i]);
        }
        $this->_redirect('/admin/orders/index/page/'.$this->_getParam('currPage'));
    }

    public function sendSmsAction(){
        //error_reporting(E_ALL);
        //$this->sendSms(148);
    }

    public function sendPeymentLink($orderId){
        $this->content = new ContentManagerDb();
        $emailText = $this->content->getPageByLink('payment-email');
        $emailTitle = stripslashes($emailText['title']);
        $emailText  = $emailText['text'];
        $order = $this->orders->getOrderById($orderId);
        $emailText = str_replace("###order_number###",$order['id'],$emailText);
        $paymentLink = "http://".$_SERVER['HTTP_HOST']."/payment/pay-code/".md5($order['email'].$order['id']);
        $paymentLink = "<a href='".$paymentLink."'>".$paymentLink."</a>";
        $emailText = str_replace("###payment_link###",$paymentLink,$emailText);

        //************************ E-mail to user **********************************
        $settings = $this->settings->getSettingsById(1);
        $emeil = $settings->settings_email1;
        $emailTxt = new Zend_Config_Xml(ROOT.'configs/project/email.xml', 'email');

        Zend_Loader::loadClass('Zend_Mail');    /** Loading Zend_Mail */
        $mail = new Zend_Mail();
        $mail -> addHeader('X-MailGenerator', $_SERVER['HTTP_HOST'].' mail machine');

        $mail -> setBodyHtml($emailText,'UTF-8');
        $mail -> setFrom($emeil, $emailTitle);
        $mail -> addTo($order['email'], $order['name']);
        $subject = '=?UTF-8?B?'.base64_encode($emailTitle).'?=';
        $mail -> setSubject($subject);
        /** Send email */
        //$headers  = 'MIME-Version: 1.0' . "\r\n";
        //$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $mail->send();
    }

    public function acceptOrderAction() {
        $order_id = $this->_getParam('order_id');
        $status   = $this->_getParam('status');

        $error = 1;
        ob_start();
//        print_r($this->_getAllParams());
//        die();
        $this->orders->updateOrderStatus($order_id, $status);

        if($status==4){
            $this->sendPeymentLink($order_id);
        }

        ob_clean();
        echo $error;
    }
	
    public function deleteAction() {
		if($this->_hasParam('id')){
			$this -> orders ->deleteOrder($this->_getParam('id'));
		}
		$this -> _redirect( '/admin/orders/index/page/1');
    }
    
}
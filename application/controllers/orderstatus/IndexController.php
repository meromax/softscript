<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');
include_once ROOT . 'application/models/AuthModel.php';
include_once ROOT . 'application/models/MembersDb.php';
include_once ROOT . 'application/models/OrdersDb.php';
include_once ROOT . 'application/models/ProductsDb.php';

class OrderStatus_IndexController extends System_Controller_Action 
{
	private $member;
	private $order;
	private $products;
	
    public function init() {
        parent::init();
        
        $this->member   = new MemberDb();
        $this->order    = new OrdersDb();
        $this->products = new ProductsDb();
        
//		if(!isset($_SESSION['loginNamespace'])){
//			$this->_redirect('/loginpage.html');
//		}
    }
    
    
   
    public function indexAction() {
    	if(isset($_SESSION['warning_message'])&&$_SESSION['warning_message']!=""){
    		$this -> smarty -> assign('warning_message', $_SESSION['warning_message']);
    		unset($_SESSION['warning_message']);
    	}
        $this -> smarty -> assign('PageBody', 'orderstatus/index.tpl');
        $this -> smarty -> assign('Title', 'Pet Id Me - Order Status');
        $this -> smarty -> display('layouts/main.tpl');
    }
    
    public function getorderstatusAction() {
    	
    	
    	if($this->_hasParam("mode")&&$this->_getParam("mode")!=""){
    		
    		$mode = $this->_getParam("mode");
    		
    		if($mode==1){
    			
    			$order_number = $this->_getParam("order_number");
    			$order_email  = $this->_getParam("order_email");
    			$order_zip    = $this->_getParam("order_zip");
    			
    			$orderData = $this->order->getOrderById($order_number);
    			if(sizeof($orderData)<=1){
    				$_SESSION['warning_message'] = "This order is not found!";
    				$this->_redirect("/orderstatus.html");
    			} else {
    				
					$products_ids = explode("|",$orderData['products_ids']);
					$productsData = array();
					$total_price = 0;
					$products_count = 0;
					for($i=0; $i<sizeof($products_ids); $i++){
						$prodData = explode(":",$products_ids[$i]);
						$currentProduct = $this->products->getProductById($prodData[0]);
						$productsData[$i]['product_info']  = $currentProduct;
						$productsData[$i]['product_count'] = $prodData[1];
						$productsData[$i]['product_amount_total'] = $currentProduct['product_price']*$prodData[1];
						$total_price +=  $productsData[$i]['product_amount_total'];
					}
					
					$orderData['products_info'] = $productsData;
					
					$orderData['order_total_price'] = $total_price;
					
					$orderData['products_count'] = sizeof($products_ids);
    			
    				$memberData = $this->member->getMemberById($orderData['member_id']);
    				
    				$memberData['member_phone'] = substr($memberData['member_phone'],0,3)."-".substr($memberData['member_phone'],3,3)."-".substr($memberData['member_phone'],6,4);
    				
    				$memberData['credit_card_number'] = substr($memberData['credit_card_number'],12,4);
    				
    				$orderData['member_info'] = $memberData;
    				
	    			$orderData["mode"] = $mode;
	    			
	    			$orderData["order_number"] = $order_number;
	    			$orderData["order_email"]  = $order_email;
	    			$orderData["order_zip"]    = $order_zip;
    				
    				$_SESSION['orderstatusdata'] = $orderData;
    				
    				$this->_redirect("/orderstatus2.html");
    			}

    		} else {
    			//print_r($this->_getAllParams());
    			$order_name = $this->_getParam("order_name");
    			$order_card3  = $this->_getParam("order_card3");
    			$order_card4  = $this->_getParam("order_card4");
    			
    			$mdata = $this->member->getMembersByFirsLastCardDigits($order_name, $order_card3, $order_card4);
    			
    			//print_r($mdata); die();
    			
    			//print_r(sizeof($mdata)); die();
    			
    			if(sizeof($mdata)>0){
	    			//$orderData = $this->order->getLastOrderByMemberId($mdata['member_id']);
	    			
	    			for($i=0; $i<sizeof($mdata); $i++){
	    				$ids[] = $mdata[$i]['member_id'];
	    			}
	    			//print_r($ids); die();
	    			$member_ids = implode(',',$ids);
    			//print_r($ids); die();
	    			
	    			$orderData = $this->order->getOrdersByMemberIds($member_ids);
	    			
	    			//print_r(sizeof($orderData)); die();
	    
	    			//print_r($mdata); die();
	    			
	    			//$orderData = $this->order->getOrderById($order_number);

	    			if(sizeof($orderData)<=0){
	    				$_SESSION['warning_message'] = "This order is not found!";
	    				$this->_redirect("/orderstatus.html");
	    			} else {
	    				
	    				for($k=0; $k<sizeof($orderData); $k++){
	    				
								$products_ids = explode("|",$orderData[$k]['products_ids']);
								$productsData = array();
								$total_price = 0;
								$products_count = 0;
								for($i=0; $i<sizeof($products_ids); $i++){
									$prodData = explode(":",$products_ids[$i]);
									$currentProduct = $this->products->getProductById($prodData[0]);
									$productsData[$i]['product_info']  = $currentProduct;
									$productsData[$i]['product_count'] = $prodData[1];
									$productsData[$i]['product_amount_total'] = $currentProduct['product_price']*$prodData[1];
									$total_price +=  $productsData[$i]['product_amount_total'];
								}
								
								$orderData[$k]['products_info'] = $productsData;
								
								$orderData[$k]['order_total_price'] = $total_price;
								
								$orderData[$k]['products_count'] = sizeof($products_ids);
			    			
			    				$memberData = $this->member->getMemberById($orderData[$k]['member_id']);
			    				
			    				$memberData['member_phone'] = substr($memberData['member_phone'],0,3)."-".substr($memberData['member_phone'],3,3)."-".substr($memberData['member_phone'],6,4);
			    				
			    				$memberData['credit_card_number'] = substr($memberData['credit_card_number'],12,4);
			    				
			    				$orderData[$k]['member_info'] = $memberData;
			    				
				    			$orderData[$k]["mode"] = $mode;
				    			
				    			$orderData[$k]["order_name"]  = $order_name;
				    			$orderData[$k]["order_card3"] = $order_card3;
				    			$orderData[$k]["order_card4"] = $order_card4;
				    			
	    				}
		    			
//		    			echo "<pre>";
//		    			print_r($orderData);
//		    			echo "</pre>";

		    			//die();
		    			
	    				
	    				$_SESSION['orderstatusdata'] = $orderData;
	    				$_SESSION['orderslist'] = 1;
	    				$this->_redirect("/orderstatus_list.html");
	    			}
	    			
	    		} else {
					$_SESSION['warning_message'] = "This order is not found!";
					$this->_redirect("/orderstatus.html");
	    		}
    		} 

    	} else {
    		$this->_redirect("/orderstatus.html");
    	}
    }
    
    public function showorderstatusAction(){
    	unset($_SESSION['orderslist']);
    	if(isset($_SESSION['orderstatusdata'])){
    		$this -> smarty -> assign('order_status', $_SESSION['orderstatusdata']);
    		if(!isset($_SESSION['loginNamespace'])){
	        	$this -> smarty -> assign('PageBody', 'orderstatus/order_status.tpl');
    		} else {
    			$this -> smarty -> assign('PageBody', 'orderstatus/order_status2.tpl');
    		}
	        $this -> smarty -> assign('Title', 'Pet Id Me - Order Status');
	        $this -> smarty -> display('layouts/main.tpl');
    	} else {
    		$this->_redirect("/orderstatus.html");
    	}
    }
    
    public function vieworderstatusAction(){
    	unset($_SESSION['orderslist']);
		$order_number = $this->_getParam("order_number");
				
		$orderData = $this->order->getOrderById($order_number);
		if(sizeof($orderData)<=1){
			$_SESSION['warning_message'] = "This order is not found!";
			$this->_redirect("/orderstatus.html");
		} else {
			
			$products_ids = explode("|",$orderData['products_ids']);
			$productsData = array();
			$total_price = 0;
			$products_count = 0;
			for($i=0; $i<sizeof($products_ids); $i++){
				$prodData = explode(":",$products_ids[$i]);
				$currentProduct = $this->products->getProductById($prodData[0]);
				$productsData[$i]['product_info']  = $currentProduct;
				$productsData[$i]['product_count'] = $prodData[1];
				$productsData[$i]['product_amount_total'] = $currentProduct['product_price']*$prodData[1];
				$total_price +=  $productsData[$i]['product_amount_total'];
			}
			
			$orderData['products_info'] = $productsData;
			
			$orderData['order_total_price'] = $total_price;
			
			$orderData['products_count'] = sizeof($products_ids);
		
			$memberData = $this->member->getMemberById($orderData['member_id']);
			
			$memberData['member_phone'] = substr($memberData['member_phone'],0,3)."-".substr($memberData['member_phone'],3,3)."-".substr($memberData['member_phone'],6,4);
			
			$memberData['credit_card_number'] = substr($memberData['credit_card_number'],12,4);
			
			$orderData['member_info'] = $memberData;
			
			//print_r($orderData['member_info']); die();
			
			$orderData["mode"] = 1;
			$orderData["order_number"] = $order_number;
			$orderData["order_email"]  = $orderData['member_info']['member_email'];
			$orderData["order_zip"]    = $orderData['member_info']['member_zip'];
			
			$_SESSION['orderstatusdata'] = $orderData;
			
			$this->_redirect("/orderstatus2.html");
		}
    }
    
    public function orderstatuslistAction(){
    	
    	if(isset($_SESSION['orderstatusdata'])&&isset($_SESSION['orderslist'])){
//    		echo "<pre>";
//    		print_r($_SESSION['orderstatusdata']);
//    		echo "</pre>";
    		$this -> smarty -> assign('order_status_list', $_SESSION['orderstatusdata']);
    		$this -> smarty -> assign('orders_count', sizeof($_SESSION['orderstatusdata']));
	        $this -> smarty -> assign('PageBody', 'orderstatus/order_status_list.tpl');
	        $this -> smarty -> assign('Title', 'Pet Id Me - Order Status List');
	        $this -> smarty -> display('layouts/main.tpl');
    	} else {
    		$this->_redirect("/orderstatus.html");
    	}
    	
    }
    
   
    public function printAction(){
    	
		if(isset($_SESSION['orderstatusdata'])){
    		$this -> smarty -> assign('order_status', $_SESSION['orderstatusdata']);
	        $this -> smarty -> assign('Title', 'Pet Id Me - Order Status');
	        $this -> smarty -> display('orderstatus/print.tpl');
    	}
    	
    }
    
    //*****************************************************************************************
    //************************************* MY ORDERS *****************************************
    //*****************************************************************************************
	
    public function myordersAction() {
    	
		if(!isset($_SESSION['loginNamespace'])){
			$this->_redirect('/loginpage.html');
		}
    	
    	$member_id = $_SESSION['loginNamespace']['storage'] -> member_id;
    	
		$page = 0;
		
        $this -> smarty -> assign('orders', $orders =  $this -> order -> getOrdersForPageByMemberId($page, $member_id));
       
        $this -> smarty -> assign('countpage', $this -> order ->getPagesCountByMemberId($member_id));

        $this -> smarty -> assign('page',$page+1);
        
        $this -> smarty -> assign('orderscount', sizeof($orders));
        
        $this -> smarty -> assign('PageBody', 'myorders/index.tpl');
        $this -> smarty -> assign('Title', 'Pet Id Me - My Orders');
        $this -> smarty -> display('layouts/main.tpl');
    }
    
    public function myorderspageAction() {
    	
		if(!isset($_SESSION['loginNamespace'])){
			$this->_redirect('/loginpage.html');
		}
    	
    	$member_id = $_SESSION['loginNamespace']['storage'] -> member_id;
    	
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> order ->getPagesCountByMemberId($member_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> order ->getPagesCountByMemberId($member_id)<$this->_getParam('page'))
		){
			$this->_redirect("/myorders.html");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('orders', $orders = $this -> order -> getOrdersForPageByMemberId($page, $member_id));
       
        $this -> smarty -> assign('countpage', $this -> order ->getPagesCountByMemberId($member_id));
        $this -> smarty -> assign('page',$page+1);
        
        $this -> smarty -> assign('orderscount', sizeof($orders));
        
        $this -> smarty -> assign('PageBody', 'myorders/index.tpl');
        $this -> smarty -> assign('Title', 'Pet Id Me - My Orders');
        $this -> smarty -> display('layouts/main.tpl');
    }
    
}
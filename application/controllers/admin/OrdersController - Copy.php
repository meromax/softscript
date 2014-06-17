<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/OrdersDb.php';

include_once ROOT . 'application/models/MembersDb.php';

include_once ROOT . 'application/models/SitesDb.php';


/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_OrdersController extends System_Controller_AdminAction 
{
    
    protected $Orders;
    
    protected $Member;
    
    protected $site;
    
   
    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()){
        	$this -> _redirect('/admin');
        }

		$this->Orders = new OrdersDb();
		
		$this->Member = new MemberDb();
		
		$this->site = new SitesDb();
    }
    
     
    public function indexAction() {
        //print_r($this->_getAllParams()); //die();

        if(!$this->_hasParam("status")){
        	$status = -1;
        } elseif($this->_hasParam("status")&&$this->_getParam('status')!=1&&$this->_getParam('status')!=0&&$this->_getParam('status')!=-1){
        	$status = -1;
        } else {
        	$status = $this->_getParam('status');
        }
		
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> Orders ->getPagesCount(-1)<=1))
			||($this->_getParam('page')>1&&$this -> Orders ->getPagesCount($status)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/orders/all/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
		$orders = $this -> Orders -> getOrdersByStatusForPage($status, $page);

        for($i=0; $i<sizeof($orders); $i++){
        	$orders[$i]['sitetype'] = $this->site->getSiteTypesItemById($orders[$i]['sitetype_id']);
        	$orders[$i]['cms'] = $this->site->getCMSItemById($orders[$i]['cms_id']);
        	$orders[$i]['design'] = $this->site->getDesignItemById($orders[$i]['design_id']);
        }
        $this -> smarty -> assign('orders', $orders);
        $this -> smarty -> assign('status', $status);
        $this -> smarty -> assign('countpage', $this -> Orders ->getPagesCount($status));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/orders/orders_list.tpl');
        $this -> smarty -> assign('Title', 'Orders');
        $this -> smarty -> display('layouts/adminmain.tpl');
        
    }
    
    public function activeAction() {
        if(isset($_SESSION['member_type'])){
        	$member_type = $_SESSION['member_type'];
        } else {
        	$member_type = '-1';
        }
		if( ($this->_hasParam('members_page')&&$this->_getParam('members_page')==0)
			||!$this->_hasParam('members_page')
			||(($this->_hasParam('members_page')&&$this->_getParam('members_page')>1) && ($this -> Member ->getPagesCount(1, $this -> _getParam('member_type'))<=1 ))
			||($this->_getParam('members_page')>1&&$this -> Member ->getPagesCount(1, $this -> _getParam('member_type'))<$this->_getParam('members_page'))
		){
			$this->_redirect("/admin/members/membertype/".$member_type."/active/1");
		}
		$members_page = $this->_hasParam('members_page')?((int)$this->_getParam('members_page')-1):0;
        $this -> smarty -> assign('Members',  $this -> Member -> getMembersByStatusForPage(1, $members_page, $this -> _getParam('member_type')));
        
        $this -> smarty -> assign('member_type', $member_type);
        $this -> smarty -> assign('page_type', 'active');
        $this -> smarty -> assign('countpage', $this -> Member ->getPagesCount(1, $this -> _getParam('member_type')));
        $this -> smarty -> assign('members_page',$members_page+1);
        $this -> smarty -> assign('PageBody', 'admin/members/members_list.tpl');
        $this -> smarty -> assign('Title', 'Members Active List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function blockedAction() {
        if(isset($_SESSION['member_type'])){
        	$member_type = $_SESSION['member_type'];
        } else {
        	$member_type = '-1';
        }
		if( ($this->_hasParam('members_page')&&$this->_getParam('members_page')==0)
			||!$this->_hasParam('members_page')
			||(($this->_hasParam('members_page')&&$this->_getParam('members_page')>1) && ($this -> Member ->getPagesCount(0, $this -> _getParam('member_type'))<=1 ))
			||($this->_getParam('members_page')>1&&$this -> Member ->getPagesCount(0, $this -> _getParam('member_type'))<$this->_getParam('members_page'))
		){
			$this->_redirect("/admin/members/membertype/".$member_type."/blocked/1");
		}
		$members_page = $this->_hasParam('members_page')?((int)$this->_getParam('members_page')-1):0;
        $this -> smarty -> assign('Members',  $this -> Member -> getMembersByStatusForPage(0, $members_page, $this -> _getParam('member_type')));
        
        $this -> smarty -> assign('member_type', $member_type);
        $this -> smarty -> assign('page_type', 'blocked');
        $this -> smarty -> assign('countpage', $this -> Member ->getPagesCount(0, $this -> _getParam('member_type')));
        $this -> smarty -> assign('members_page',$members_page+1);
        $this -> smarty -> assign('PageBody', 'admin/members/members_list.tpl');
        $this -> smarty -> assign('Title', 'Members Blocked List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    
	public function changeactiveAction()
	{
		$id = $this -> _getParam('id');
		$this -> Orders -> changeOrderStatus($id);
		$this -> _redirect( '/admin/orders/index/status/'.$this -> _getParam('status').'/page/1');
	}
	
	public function changestatusAction()
	{
		$id = $this -> _getParam('order_id');
		$ostatus = $this -> _getParam('ostatus');
		
		if($ostatus==0){
			$this -> smarty -> assign('ostatus', "placed");
		} elseif ($ostatus==1){
			$this -> smarty -> assign('ostatus', "in process");
		} elseif ($ostatus==2){
			$this -> smarty -> assign('ostatus', "shipped");
		} elseif ($ostatus==3){
			$this -> smarty -> assign('ostatus', "on hold");
		}
		
		$orderData  = $this->Orders->getOrderById($id);
		$this -> smarty -> assign('order_number', $orderData['id']);
		
		$memberData = $this->Member->getMemberById($orderData['member_id']);
		$this -> smarty -> assign('member', $memberData);
		 
		//print_r($memberData); die();
		
		//print_r($this->_getAllParams()); die();
		$this -> Orders -> changeOrderStatusById($id, $ostatus);
		
		/** Send notification email that order status have been changed */
		
//		$emailTxt = new Zend_Config_Xml(ROOT . 'configs/project/email.xml', 'order_status');
//		
//		Zend_Loader::loadClass('Zend_Mail');    /** Loading Zend_Mail */
//		$mail = new Zend_Mail();
//		$mail -> addHeader('X-MailGenerator', $emailTxt -> email_generator);
//		
//		/** Preparing mail body */
//		$mailBody = $this -> smarty -> fetch('admin/orders/order_status_changed_mail.tpl');
//		
//		$mail -> setBodyHtml($mailBody);
//		$mail -> setFrom($emailTxt -> from_email, $emailTxt -> from_name);
//		$mail -> addTo($memberData['member_email'], $memberData['member_email']);
//		$mail -> setSubject($emailTxt -> email_title);
//		
//		/** Send email */
//		$mail->send();
		
		//******************************************************************
		
		
		
		$this -> _redirect( '/admin/orders/index/status/'.$this -> _getParam('status').'/page/1');
	}
	
   
    
  
    public function deleteAction() {
		if($this->_hasParam('id')){
			$this -> Orders ->deleteOrder($this->_getParam('id'));
		}
		if($this->_hasParam('status')){
			$this -> _redirect( '/admin/orders/index/status/'.$this->_getParam('status').'/page/1');
		} else {
			$this -> _redirect( '/admin/orders/index/status/-1/page/1');
		}
    }
    
     
	public function showorderAction(){
		$order = $this -> Orders ->getOrderById($this-> _getParam('id'));
		
		//print_r($order);
		
		$productsIds       = explode("|", $order['products_ids']);
		
		$products_pets_ids = explode("|", $order['products_pets_ids']);
		//print_r($order['products_pets_ids']); echo "<hr>";
		
		$products = array();
		$total_price = 0;
		$currency = 0;

		for($i=0; $i<sizeof($productsIds); $i++){
			
			$product = explode(":", $productsIds[$i]);
			$products[$i]['info']        = $this->Products->getProductById($product[0]);
			
			$products[$i]['count']       = $product[1];
			$products[$i]['price_count'] = $product[1]*$products[$i]['info']['product_price'];
			$total_price += $products[$i]['price_count'];
			$currency = $products[$i]['info']['currency'];

			$product = explode(":", $products_pets_ids[$i]);
			$products[$i]['image'] = $product[3]; 
			$products[$i]['pdf']   = $product[4];
			
			
			$product2 = explode(":", $productsIds[$i]);
			if(isset($product2[2])){	
				$products[$i]['giftinfo']   = $product2[2];
			}
			
			if($i==0){
				$products[$i]['print'] = 1;
			} elseif($i>0){
				if($products[$i-1]['pdf']!=$products[$i]['pdf']){
					$products[$i]['print'] = 1;
				} else {
					$products[$i]['print'] = 0;
				}
			}
		}
		
		$this -> smarty -> assign('member', $this->Member->getMemberById($order['member_id']));
        $this -> smarty -> assign('order', $products);
        $this -> smarty -> assign('cinfo', $order);
        $this -> smarty -> assign('total_price', $total_price);
        $this -> smarty -> assign('currency', $currency);
        $this -> smarty -> assign('id', $this-> _getParam('id'));
        $this -> smarty -> assign('status', $this-> _getParam('status'));
        $this -> smarty -> assign('PageBody', 'admin/orders/view_order.tpl');
        $this -> smarty -> assign('Title', 'View Order');
        $this -> smarty -> display('layouts/adminmain.tpl');
	}
	
	public function createAction(){
		//http://webmasters.by/
		
		$order_id = $this->_getParam('id');
		$order = $this->Orders->getOrderById($order_id);
		$member = $this->Member->getMemberById($order['member_id']);

		//paths
		$domains_path = "Z:/home/";
		$cms_path = ROOT."files/cms/";
		$templates_path = ROOT."files/templates/";
		$unzip_path = 'Z:\usr\local\bin\unzip';
		
		//create domain
		$res = $this->Orders->createDomain($domains_path, $order['domain']);
		if($res){ 
			echo "- Domain <b>".$order['domain']."</b> is created!<br />";	
		} else {
			echo "- Domain <b>".$order['domain']."</b> already exist!<br />";
		}
		
		//move cms archive
		$move_path = $domains_path.$order['domain']."/www/";
		$cms = $this->site->getCMSItemById($order['cms_id']);
		$res = $this->Orders->copyArchive($cms['archive_name'], $cms_path, $move_path);
		if($res){ 
			echo "- CMS is moved!<br />";	
		} else {
			echo "- Erorrs in moving!<br />";
		}
		
		//unzip cms archive
		$this->Orders->unzipArchive($unzip_path, $move_path.$cms['archive_name'], $move_path);
	
		//move cms theme or template
		$design = $this->site->getDesignItemById($order['design_id']);
		$cms_name = strtolower(trim($cms['title']));
		
		//echo $design['archive_name']."<br />";
		//echo $cms_name."<br />";
		switch ($cms_name){
			case 'wordpress':
				$locate_theme_path='wp-content/themes/';
				break;
			case 'joomla':
				$locate_theme_path='templates/';
				break;
			case 'magento':		
				$locate_theme_path='skin/frontend/';
				break;
		}
		//echo $locate_theme_path."<br />";
		$move_path = $domains_path.$order['domain']."/www/";

		$res = $this->Orders->copyArchive($design['archive_name'], $templates_path, $move_path.$locate_theme_path);
		if($res){ 
			echo "- Template is moved!<br />";	
		} else {
			echo "- Erorrs in moving!<br />";
		}
		
		//unzip template
		$this->Orders->unzipArchive($unzip_path, $move_path.$locate_theme_path.$design['archive_name'], $move_path.$locate_theme_path);
		
		//create sql-file database
		$dump_path = $move_path."/dump/";
		
		$sql = "CREATE DATABASE `".str_replace(".","",$order['domain'])."`;";
		$this->Orders->createFile($dump_path, 'database.sql', $sql);
		echo "- File <b>database.sql</b> is created!<br />";
		
		switch ($cms_name){
			case 'wordpress':
				
				$tmp = explode(md5($design['design_id'])."_", $design['archive_name']);
				$template_name = str_replace(".zip","",$tmp[1]);
				
				//create sql-file update
				$sql  = "UPDATE `wp_options` SET option_value='http://".$order['domain']."' WHERE option_name='siteurl';";
				$sql .= "UPDATE `wp_options` SET option_value='".$order['sitename']."' WHERE option_name='blogname';";
				$sql .= "UPDATE `wp_options` SET option_value='".$order['sitename']."' WHERE option_name='blogdescription';";
				$sql .= "UPDATE `wp_options` SET option_value='".$member['member_email']."' WHERE option_name='admin_email';";
				$sql .= "UPDATE `wp_options` SET option_value='http://".$order['domain']."' WHERE option_name='home';";
				$sql .= "UPDATE `wp_options` SET option_value='".$template_name."' WHERE option_name='template';";
				$sql .= "UPDATE `wp_options` SET option_value='".$template_name."' WHERE option_name='stylesheet';";
				$sql .= "UPDATE `wp_options` SET option_value='".$template_name."' WHERE option_name='current_theme';";
				$this->Orders->createFile($dump_path, 'update.sql', $sql);
				echo "- File <b>update.sql</b> is created!<br />";
				
				//update config file
				str_replace("define('DB_NAME', 'wp_rus');","",$file);
				str_replace("define('DB_USER', 'root');","",$file);
				str_replace("define('DB_PASSWORD', '');","",$file);

//				$str  = "<?php define('DB_NAME', 'wp_rus');";
//				$str .= "define('DB_USER', 'root');";
//				$str .= "define('DB_PASSWORD', ''); //";
				
				
//				$str  = "<?php define('DB_NAME', '".str_replace(".","",$order['domain'])."');";
//				$str .= "define('DB_USER', '".str_replace(".","",$order['domain'])."');";
//				$str .= "define('DB_PASSWORD', '".md5($order['domain'])."'); //";
				$this->Orders->createFileAdd($move_path, 'wp-config.php', $str);
				

				
				
				break;
			case 'joomla':

				break;
			case 'magento':		

				break;
		}
		
		
		die();
		
	}
    
}
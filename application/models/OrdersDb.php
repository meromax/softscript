<?php

class OrdersDb
{
    const ORDERS_TABLE = 'orders';
    const ORDERS_PER_PAGE = 20;
    const ORDERS_PER_PAGE2 = 20;

    const CURRENCY_TABLE = 'currency';
    const PAYMENT_TRANSACTIONS_TABLE = 'transactions';

    protected $db;
        
    public function __construct()
    {
        $this -> db = Zend_Registry::get('db');
    }
    
    public function getOrdersForPage($page_num, $limit = -1, $status = -1){
    	
    	if($status==-1){
    		$addsql = " ";
    	} else {
    		$addsql = " WHERE pay_status=".$status." ";
    	}
        $limit = $limit == -1?self::ORDERS_PER_PAGE:$limit;
       	$query = 'SELECT * FROM '.self::ORDERS_TABLE.$addsql.' ORDER BY post_date DESC LIMIT '.($page_num*$limit).', '.$limit;
        $orders = $this -> db -> fetchAll($query);
        
        for($i=0; $i<sizeof($orders); $i++){
        	 $orders[$i]['user'] = $this -> db -> fetchRow('SELECT * FROM users WHERE id = ?', $orders[$i]['user_id']);
        }
        
        return $orders;
    } 
    
    public function getOrderqPagesCount($status = -1) {
    	if($status==-1){
    		$addsql = " ";
    	} else {
    		$addsql = " WHERE pay_status=".$status." ";
    	} 
    	   	
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::ORDERS_TABLE.$addsql);
        return ceil($count['count']/self::ORDERS_PER_PAGE);
    }


    public function getAdminOrdersForPage($page_num, $limit = -1, $status = -1){
        unset($_SESSION['admin_filter']);
        if(isset($_SESSION['admin_filter'])){
            $add_sql = $_SESSION['admin_filter'];
        } else {
            $add_sql = "";
        }
        $limit = $limit == -1?self::ORDERS_PER_PAGE:$limit;
       	$query = 'SELECT * FROM '.self::ORDERS_TABLE.$add_sql.' ORDER BY post_date DESC LIMIT '.($page_num*$limit).', '.$limit;
        $orders = $this -> db -> fetchAll($query);

        return $orders;
    }

    public function getAllOrdersByStatuses(){
        $query = 'SELECT * FROM '.self::ORDERS_TABLE.' WHERE status IN (1,2,3) ORDER BY id DESC';
        return $this -> db -> fetchAll($query);
    }

    public function getAdminOrdersPagesCount($status = -1) {
        if(isset($_SESSION['admin_filter'])){
            $add_sql = $_SESSION['admin_filter'];
        } else {
            $add_sql = "";
        }

        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::ORDERS_TABLE.$add_sql);
        return ceil($count['count']/self::ORDERS_PER_PAGE);
    }

    
    public function getOrdersForPageByUserId($page_num, $user_id, $limit = -1){

        $limit = $limit == -1?self::ORDERS_PER_PAGE:$limit;
       	$query = 'SELECT * FROM '.self::ORDERS_TABLE.' WHERE user_id = ? ORDER BY post_date DESC LIMIT '.($page_num*$limit).', '.$limit ;
        return $this -> db -> fetchAll($query, $user_id);
    } 
    
    public function getOrdersPagesCountByUserId($user_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::ORDERS_TABLE." WHERE user_id = ?", $user_id);
        return ceil($count['count']/self::ORDERS_PER_PAGE);
    }        
    
    public function addOrder($dataArray) {


        $data = array(
			'cd_count'    => $dataArray['total_count'],
			'price'       => $dataArray['price'],
			'total_price' => $dataArray['price'],
            'sprice'      => $dataArray['total_price_s'],
            'skidka'      => $dataArray['skidka'],
			'name'        => $dataArray['name'],
            'dostavka'    => $dataArray['dostavka'],
            'address'     => $dataArray['address'],
            'email'       => $dataArray['email'],
            'phone'       => $dataArray['phone'],
            'comment'     => $dataArray['message'],
            'products'    => $dataArray['products'],
            'user_id'     => $dataArray['userId'],
            'post_date'   => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::ORDERS_TABLE, $data);
        return $this -> db -> lastInsertId();
    }

    public function updateOrder($id, $dataArray) {
        $data = array(
            'country'     => $dataArray['country'],
            'name'        => $dataArray['name'],
            'zip'         => $dataArray['zip'],
            'city'        => $dataArray['city'],
            'address'     => $dataArray['address'],
            'comment'     => $dataArray['comment'],
            'status'      => $dataArray['status'],
            'email'       => $dataArray['email'],
            'phone'       => $dataArray['phone'],
            'action_pay'  => $dataArray['action_pay'],
            'post_number' => $dataArray['post_number']
        );
        $this -> db -> update(self::ORDERS_TABLE, $data, 'id = '.$id);
    }

    public function addPaymentTransaction($orderId, $price, $paymentMethod, $userId) {
        $data = array(
            'order_id'       => $orderId,
            'price'          => $price,
            'payment_method' => $paymentMethod,
            'user_id'        => $userId,
            'payment_date'   => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::PAYMENT_TRANSACTIONS_TABLE, $data);
        return $this -> db -> lastInsertId();
    }

    public function payedOrder($id) {
        $data = array(
            'payed'  => 1,
            'status' => 1
        );
        $this -> db -> update(self::ORDERS_TABLE, $data, 'id = '.$id);
    }

	public function changeOrderStatus($pay_status, $id){
		$this -> db -> query("UPDATE ".self::ORDERS_TABLE." SET pay_status = ? WHERE id=?", array($pay_status, $id));
	}   
	
	public function updateTranslatedFileById($id, $filename_translated_original, $filename_translated){
		$data = array(
            'filename_translated_original' => $filename_translated_original,
            'filename_translated' => $filename_translated
        );		
		$this -> db -> update(self::ORDERS_TABLE, $data, 'id = '.$id);
	}

    public function getUsersOrders($userId) {
        return $this -> db -> fetchAll('SELECT * FROM '.self::ORDERS_TABLE.' WHERE user_id='.$userId.' ORDER BY post_date');
    }

    public function getUsersOrdersPayed($userId) {
        return $this -> db -> fetchAll('SELECT * FROM '.self::ORDERS_TABLE.' WHERE user_id='.$userId.' AND status=1 ORDER BY post_date');
    }
    
    public function deleteOrder($id) {
        $this -> db -> delete(self::ORDERS_TABLE, 'id = '.$id);
    }
    
    
    public function getOrdersForPageByMemberId($page_num, $member_id, $limit = -1){
    	
        $limit = $limit == -1?self::ORDERS_PER_PAGE2:$limit;
       	$query = 'SELECT * FROM '.self::ORDERS_TABLE.' WHERE member_id='.$member_id.' ORDER BY post_date DESC LIMIT '.($page_num*$limit).', '.$limit;
        $order = $this -> db -> fetchAll($query);
        
        for($i=0; $i<sizeof($order); $i++){
        	 $order[$i]['user'] = $this -> db -> fetchRow('SELECT * FROM members WHERE member_id = ?', $order[$i]['member_id']);
        }
        
        return $order;
    }
    
    public function getPagesCountByMemberId($member_id){
    	
   		$query = 'SELECT count(*) as orders_count FROM '.self::ORDERS_TABLE.' WHERE member_id='.$member_id;
        $count = $this -> db -> fetchRow($query);
        return ceil($count['orders_count']/self::ORDERS_PER_PAGE2);
    }
    
    
    
    public function getPagesCount($status = -1){
    	
    	if($status==-1){
    		$addsql = " ";
    	} else {
    		$addsql = " WHERE status=".$status." ";
    	}
   		$query = 'SELECT count(*) as orders_count FROM '.self::ORDERS_TABLE.$addsql;
        $count = $this -> db -> fetchRow($query);
        return ceil($count['orders_count']/self::ORDERS_PER_PAGE);
    }
    
    public function getOrders() {
        return $this -> db -> fetchAll('SELECT * FROM '.self::ORDERS_TABLE.' ORDER BY post_date DESC');
    }
 
    public function getOrdersByDate($date) {
        return $this -> db -> fetchAll('SELECT * FROM '.self::ORDERS_TABLE.' WHERE DATE_FORMAT(post_date, \'%Y-%m-%d\') = ? ORDER BY post_date DESC', $date);
    }
    
    public function getOrderById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::ORDERS_TABLE.' WHERE id = ?', $id);
    }

    public function getOrderByCode($code) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::ORDERS_TABLE.' WHERE md5(concat(email,id)) = ?', $code);
    }
    
    public function getUserOrder($user_id, $id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::ORDERS_TABLE.' WHERE user_id = ? AND id = ?', array($user_id, $id));
    }    
    
    public function getUserReadyOrder($user_id, $id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::ORDERS_TABLE.' WHERE user_id = ? AND id = ? AND pay_status=4', array($user_id, $id));
    }    
    
    public function getLastOrderByMemberId($member_id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::ORDERS_TABLE.' WHERE member_id = '.$member_id.' ORDER BY id DESC');
    }
    
    public function getOrdersByMemberIds($member_ids) {
        return $this -> db -> fetchAll('SELECT * FROM '.self::ORDERS_TABLE.' WHERE member_id IN ('.$member_ids.') ORDER BY id DESC');
    }


    public function getCCountries($siteId=1) {
        return $this -> db -> fetchAll('SELECT * FROM '.self::CURRENCY_TABLE.' WHERE site_id='.$siteId.' ORDER BY position');
    }

    public function getCountryById($id)
    {
        return $this -> db -> fetchRow('SELECT * FROM '.self::CURRENCY_TABLE.' WHERE id = ?', $id);
    }
    
    //************************************************************************************
    //******************************* CREATE DOMAIN **************************************
    //************************************************************************************

    
    public function createDomain($path, $domain_name, $www_dir){
		if(@mkdir($path.$domain_name, 0777, true)){
			if(@mkdir($path.$domain_name."/".$www_dir, 0777, true)){
				return 1;
			} else {
				return 0;
			}
			return 1;
		} else {
			return 0;
		}

    }
    
    public function removeDomain($path, $domain_name){
    	$directory = $path.$domain_name;
		$dir=@opendir($directory);
		while(($file=@readdir($dir))){
	 		if(is_file($directory."/".$file)){ 
	 			@unlink($directory."/".$file);
	 		} elseif(is_dir($directory."/".$file) && $file!="." && $file!=".."){
				$this->removeDomain($directory."/".$file, $domain_name);
			}
		}

		@closedir($dir);
		@rmdir($directory);
		return 1;
    }
    
    public function copyArchive($archive_name, $path_from, $path_to){
		if (!copy($path_from.$archive_name, $path_to.$archive_name)) {
			return 0;
		} else {
			return 1;
		}
    }
    
    public function unzipArchive($unzip_path, $archive_path, $locate_path){
    	@exec("$unzip_path -u $archive_path -d $locate_path");

    }
    
    public function createDataBase($query) {
        return $this -> db -> query($query);
    }
    
    public function createFile($path,$name, $str){
    	$fp = fopen($path.$name,"w");
    	fwrite($fp, $str);
    	fclose($fp);
    }
    public function createFileAdd($path,$name, $str){
    	$fp = fopen($path.$name,"r+");
    	fwrite($fp, $str);
    	fclose($fp);
    }
    public function createFileAddEnd($path,$name, $str){
    	$fp = fopen($path.$name,"a+");
    	fwrite($fp, $str);
    	fclose($fp);
    }
    
    public function updateCreatedStatus($order_id, $status) {
        $data = array(
            'created'       => $status
        );
        $this -> db -> update(self::ORDERS_TABLE, $data, 'id = '.$order_id);
        return true;
    }
    
    public function updateFile($path,$name, $str){
    	$fp = fopen($path.$name,"w");
    	fwrite($fp, $str);
    	fclose($fp);
    }
    
    //********************** currency by country *********************************
    public function getAdminCBCForPage($page_num, $limit = -1, $status = -1){

        if(isset($_SESSION['admin_filter'])){
            $add_sql = $_SESSION['admin_filter'];
        } else {
            $add_sql = "";
        }
        $limit = $limit == -1?self::ORDERS_PER_PAGE:$limit;
        $query = 'SELECT * FROM '.self::ORDERS_TABLE.$add_sql.' ORDER BY post_date DESC LIMIT '.($page_num*$limit).', '.$limit;
        $orders = $this -> db -> fetchAll($query);

        return $orders;
    }

    public function getAdminCBCPagesCount($status = -1) {
        if(isset($_SESSION['admin_filter'])){
            $add_sql = $_SESSION['admin_filter'];
        } else {
            $add_sql = "";
        }

        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::ORDERS_TABLE.$add_sql);
        return ceil($count['count']/self::ORDERS_PER_PAGE);
    }

    public function updateOrderStatus($order_id, $status) {
        $data = array(
            'status'   => $status
        );
        $this -> db -> update(self::ORDERS_TABLE, $data, 'id = '.$order_id);
        return true;
    }





    //***************** Shopping Cart ************************** /
    public function calculate($data, $skidka){
        $shopping_cart = array();
        $total_count = 0;
        $total_price = 0;
        for($i=0; $i<sizeof($data); $i++){
            $price = $data[$i]['price'];
            $count = $data[$i]['count'];
            $total_price = $total_price + ($price*$count);
            $total_count = $total_count + $count;
        }
        $shopping_cart['total_count'] = $total_count;
        $shopping_cart['total_price'] = $total_price;
        $shopping_cart['total_price_s'] = $total_price-intval(($total_price*$skidka)/100);
        $shopping_cart['skidka'] = $skidka;
        return $shopping_cart;
    }
    
    


    
}
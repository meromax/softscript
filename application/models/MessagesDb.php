<?php

class MessagesDb
{
    const ORDERS_TABLE = 'orders';
    const ORDERS_PER_PAGE = 10;
    const ORDERS_PER_PAGE2 = 10;
    
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
    
    public function getOrdersPagesCount($status = -1) {
    	if($status==-1){
    		$addsql = " ";
    	} else {
    		$addsql = " WHERE pay_status=".$status." ";
    	} 
    	   	
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::ORDERS_TABLE.$addsql);
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
//        echo "<pre>";
//        print_r($dataArray);
//        diE();
        $translation = $dataArray['langFrom']['lang_id']."|". $dataArray['langTo']['lang_id'];

        $data = array(
			'translation'       => $translation,
			'translation_theme' => $dataArray['ttheme']['id'],
			'filename_original' => $dataArray['filenames'][0],
			'filename'          => $dataArray['filenames'][1],
			'filename_original2' => 'text_file.txt',
			'filename2'          => $dataArray['filename'],
			'pay_status'        => 1,
        	'price'             => $dataArray['totalPrice'],
            'price2'             => $dataArray['totalPrice2'],
            'letters_count'     => $dataArray['letters_count'],
            'letters_count2'     => $dataArray['letters_count2'],
            'user_id'           => $dataArray['user_id'],
            'post_date'   => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::ORDERS_TABLE, $data);
        return $this -> db -> lastInsertId();
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

    public function getUsersOrders($member_id) {
        return $this -> db -> fetchAll('SELECT * FROM '.self::ORDERS_TABLE.' WHERE status!=4 AND member_id='.$member_id.' ORDER BY post_date');
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
    
    public function sendAccessMail(){
    	
    }
    
    


    
}
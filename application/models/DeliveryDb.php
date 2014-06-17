<?php

class DeliveryDb
{
    const DESTINATIONS_TABLE = 'delivery';
    const DESTINATIONS_PER_PAGE = 5;
    
    protected $db;
    
    public function __construct() {
        $this -> db = Zend_Registry::get('db');
    }
    
    public function getItemsForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::DESTINATIONS_PER_PAGE:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::DESTINATIONS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    }
    
    public function getItemsPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::DESTINATIONS_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::DESTINATIONS_PER_PAGE);
    }    
    
    public function createItem($dataArray) {
        $data = array(
            'destination' => $dataArray['destination'],
            'price'	      => $dataArray['price'],
        	'position'	  => $dataArray['position'],
        	'lang_id'	  => $dataArray['lang_id']
        );
        $this -> db ->insert(self::DESTINATIONS_TABLE, $data);
        return $this -> db -> lastInsertId();
    }
    
    public function modifyItem($id, $dataArray) {
        $data = array(
            'destination' => $dataArray['destination'],
            'price'	      => $dataArray['price'],
            'position'	  => $dataArray['position'],
            'lang_id'	  => $dataArray['lang_id']
        );
        $this -> db -> update(self::DESTINATIONS_TABLE, $data, 'id = '.$id);
        return true;
    }
    
    public function deleteItem($id) {
        $this -> db -> delete(self::DESTINATIONS_TABLE, 'id = '.$id);
    }
    
    public function getItemById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::DESTINATIONS_TABLE.' WHERE id = ?', $id);
    }
}
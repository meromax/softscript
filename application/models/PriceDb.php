<?php

class PriceDb
{
    const CURRENCY_TABLE = 'currency';
    
    const CURRENCY_PER_PAGE = 5;

    protected $db;
    
    
        
    public function __construct()
    {
        $this -> db = Zend_Registry::get('db');
    }
    
    public function getAllItems($site_id){
        return $this -> db -> fetchAll('SELECT * FROM '.self::CURRENCY_TABLE.' WHERE site_id='.$site_id.' ORDER BY position');
    }

    public function getItemsForPage($lang_id, $page_num, $limit = -1){
        $limit = $limit == -1?self::PRICE_PER_PAGE:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::CURRENCY_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position DESC LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    }
    
    public function getPagesCount($site_id){
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::CURRENCY_TABLE.' WHERE site_id='.$site_id);
        return ceil($count['count']/self::CURRENCY_PER_PAGE);
    }
    
    
    public function createItem($dataArray){
        $data = array(
            'title'       => $dataArray['title'],
            'title_short' => $dataArray['title_short'],
            'symbol'      => $dataArray['symbol'],
            'price'       => $dataArray['price'],
            'dostavka'    => $dataArray['dostavka'],
            'position'    => $dataArray['position'],
            'site_id'     => $dataArray['site_id']
        );
        $this -> db ->insert(self::CURRENCY_TABLE, $data);
        return $this -> db -> lastInsertId();
    }
    
    public function updateItem($id, $dataArray){
        $data = array(
            'title_short' => $dataArray['title_short'],
            'symbol'      => $dataArray['symbol'],
            'price'       => $dataArray['price'],
            'dostavka'    => $dataArray['dostavka'],
            'position'    => $dataArray['position']
        );
        $this -> db -> update(self::CURRENCY_TABLE, $data, 'id = '.$id);
        return true;
    }

    public function deleteItem($id){
        $this -> db -> delete(self::CURRENCY_TABLE, 'id = '.$id);
    }
    
    public function getItemById($id) {
        $data =  $this -> db -> fetchRow('SELECT * FROM '.self::CURRENCY_TABLE.' WHERE id = ?', $id);
        return $data;
    }
}
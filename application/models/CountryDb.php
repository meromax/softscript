<?php

class CountryDb
{
    const COUNTRIES_TABLE = 'countries';
    
    const COUNTRIES_PER_PAGE = 5;

    protected $db;
    
    
        
    public function __construct()
    {
        $this -> db = Zend_Registry::get('db');
    }
    
    public function getAllItems(){
        return $this -> db -> fetchAll('SELECT * FROM '.self::COUNTRIES_TABLE.' ORDER BY title');
    }

    public function getItemsForPage($lang_id, $page_num, $limit = -1){
        $limit = $limit == -1?self::COUNTRIES_PER_PAGE:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::COUNTRIES_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position DESC LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    }
    
    public function getPagesCount($site_id){
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::COUNTRIES_TABLE.' WHERE site_id='.$site_id);
        return ceil($count['count']/self::COUNTRIES_PER_PAGE);
    }

    public function addItem($dateArray){
        $data = array(
            'title' => $dateArray['title'],
            'cod2'  => $dateArray['cod2'],
            'cod3'  => $dateArray['cod3']
        );
        $this -> db ->insert(self::COUNTRIES_TABLE, $data);
        return $this -> db -> lastInsertId();
    }
    
    public function createItem($dateArray){
        $data = array(
            'description' => $dateArray['description'],
        	'position'    => $dateArray['position'],
        	'currency'    => $dateArray['currency'],
        	'price'       => $dateArray['price'],
        	'lang_id'     => $dateArray['lang_id'],
            'date'        => new Zend_Db_Expr('NOW()')
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
        $data =  $this -> db -> fetchRow('SELECT * FROM '.self::COUNTRIES_TABLE.' WHERE id = ?', $id);
        return $data;
    }
}
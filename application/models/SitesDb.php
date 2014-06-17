<?php

class SitesDb
{
    const SITES_TABLE = 'sites';

    const ITEMS_PER_PAGE  = 10;
    
    protected $db;
    
    
        
    public function __construct()
    {
        $this -> db = Zend_Registry::get('db');
    }

    public function getAllSites() {
        return $this -> db -> fetchAll('SELECT * FROM '.self::SITES_TABLE.' ORDER BY id');
    }

    public function getSitesForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::ITEMS_PER_PAGE:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::SITES_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY id DESC LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    }
    
    public function getSitesPagesCount() {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::SITES_TABLE);
        return ceil($count['count']/self::ITEMS_PER_PAGE);
    }

    public function getSiteOptionByDomain($domain){
        return $this -> db -> fetchRow("SELECT * FROM ".self::SITES_TABLE." WHERE domain='".$domain."'");
    }


    
    public function createItem($dataArray) {
        $data = array(
            'title'      => $dataArray['title'],
            'url'        => $dataArray['url'],
            'domain'     => $dataArray['domain'],
            'company_id' => $dataArray['company_id'],
        	'cel'        => $dataArray['cel']
        );
        $this -> db ->insert(self::SITES_TABLE, $data);
        return $this -> db -> lastInsertId();
    }

    public function updateItem($id, $dataArray){
        $data = array(
            'company_id' => $dataArray['companyId'],
            'cel'        => $dataArray['cel']
        );
        $this -> db -> update(self::SITES_TABLE, $data, 'id = '.$id);
        return true;
    }
    
    public function modifySiteTypesItem($id, $dateArray) {
        $data = array(
            'title'       => $dateArray['title'],
            'description' => $dateArray['description'],
            'price'       => $dateArray['price'],
            'position'    => $dateArray['position'],
        	'lang_id'     => $dateArray['lang_id']
        );
        $this -> db -> update(self::SITETYPES_TABLE, $data, 'id = '.$id);
    }
    
    public function deleteItem($id) {
        $this -> db -> delete(self::SITES_TABLE, 'id = '.$id);
    }

}
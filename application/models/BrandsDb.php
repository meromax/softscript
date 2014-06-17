<?php

class BrandsDb
{
    const BRANDS_TABLE = 'brands';
    const BRANDS_PER_PAGE  = 50;

    protected $db;

    public function __construct(){
        $this -> db = Zend_Registry::get('db');
    }

    public function getBrandByLink($link, $lang_id=1) {
    	$sql = 'SELECT * FROM `'.self::BRANDS_TABLE.'` WHERE lang_id='.$lang_id.' AND link="'.$link.'"';
        return $this -> db -> fetchRow($sql);
    }    
    
    public function getAllBrandsWithoutCurrent($curr_brand_id, $lang_id=1) {
    	$sql = 'SELECT * FROM `'.self::BRANDS_TABLE.'` WHERE lang_id='.$lang_id.' AND id!='.$curr_brand_id.' ORDER BY `position`';
        return $this -> db -> fetchAll($sql);
    }     
    
    public function getAllBrands($lang_id){
        return $this -> db -> fetchAll('SELECT * FROM '.self::BRANDS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY title');
    }

    public function getSortedBrands($lang_id, $brandsIds){
        return $this -> db -> fetchAll('SELECT * FROM '.self::BRANDS_TABLE.' WHERE lang_id='.$lang_id.' AND id IN ('.$brandsIds.') ORDER BY title');
    }
    
    public function getBrandsForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::BRANDS_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::BRANDS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY title LIMIT '.($page_num*$limit).', '.$limit);
    }
    
    public function getBrandsPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::BRANDS_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::BRANDS_PER_PAGE);
    }
    
    public function add($data) {
        $dataArray = array(
        	'link'             => $data['link'],
            'title'            => $data['title'],
            'description'      => trim($data['description']),
			'meta_title'       => $data['meta_title'],
        	'meta_description' => $data['meta_description'],
        	'meta_keywords'    => $data['meta_keywords'],
            'post_date'        => new Zend_Db_Expr('NOW()'),
        	'lang_id'          => $data['lang_id']
        );
        $this -> db ->insert(self::BRANDS_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }
    
    public function modify($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => $data['title'],
            'description'      => trim($data['description']),
            'meta_title'       => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords'    => $data['meta_keywords'],
            'lang_id'          => $data['lang_id']
        );
        $this -> db -> update(self::BRANDS_TABLE, $dataArray, 'id = '.$data['id']);
    }
    
    public function delete($id){
        $this -> db -> delete(self::BRANDS_TABLE, 'id = '.$id);
    }
    
    public function getBrandById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::BRANDS_TABLE.' WHERE id = ?', $id);
    }
}
<?php

class BannersDb
{
    const BANNERS_TABLE = 'banners';
    const BANNERS_PER_PAGE  = 2;
    
    protected $db;

    public function __construct(){
        $this -> db = Zend_Registry::get('db');
    }
    
    //*********************************************************************************
    //****************************** Sections *****************************************
    //*********************************************************************************
    
    public function getAllBanners($lang_id, $type=0){
        return $this -> db -> fetchAll('SELECT * FROM '.self::BANNERS_TABLE.' WHERE lang_id='.$lang_id.' AND type='.$type.' ORDER BY position');
    }
    
    public function getBannersForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::BANNERS_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::BANNERS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY type, position LIMIT '.($page_num*$limit).', '.$limit);
    }
    
    public function getBannersPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::BANNERS_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::BANNERS_PER_PAGE);
    }
    
    public function createBanner($data) {
        $dataArray = array(
            'title'            => $data['title'],
            'description'      => $data['description'],
        	'link'             => $data['link'],
        	'meta_title'       => $data['meta_title'],
			'meta_description' => $data['meta_description'],
			'meta_keywords'    => $data['meta_keywords'],
			'meta_link_title'  => $data['meta_link_title'],        
        	'position'         => $data['position'],
            'type'             => $data['type'],
        	'lang_id'          => $data['lang_id'],
            'date'             => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::BANNERS_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }
    
    public function modifyBanner($data) {
        $dataArray = array(
            'title'            => $data['title'],
            'description'      => $data['description'],
        	'link'             => $data['link'],
        	'meta_title'       => $data['meta_title'],
			'meta_description' => $data['meta_description'],
			'meta_keywords'    => $data['meta_keywords'],
			'meta_link_title'  => $data['meta_link_title'],        
        	'position'         => $data['position'],
            'type'             => $data['type'],
            'lang_id'          => $data['lang_id']
        );
        $this -> db -> update(self::BANNERS_TABLE, $dataArray, 'id = '.$data['id']);
    }
    
    public function updateImage($id, $filename){
        $this -> db -> update(self::BANNERS_TABLE, array('image' => $filename), 'id = '.$id);
    } 
    
    public function deleteBanner($id){
        $this -> db -> delete(self::BANNERS_TABLE, 'id = '.$id);
    }
    
    public function getBannerById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::BANNERS_TABLE.' WHERE id = ?', $id);
    }
}
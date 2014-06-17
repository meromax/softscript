<?php

class LinksDb
{
    const LINKS_TABLE = 'links';
    const LINKS_PER_PAGE = 5;
    
    protected $db;
    
    public function __construct() {
        $this -> db = Zend_Registry::get('db');
    }
    
    public function getLinksByNumber($lang_id, $limit) {
        return $this -> db -> fetchAll('SELECT * FROM '.self::LINKS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY date DESC LIMIT 0,'.$limit);
    }
    
    public function getLinksItemsForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::LINKS_PER_PAGE:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::LINKS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY date DESC LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    }
    
    public function getLinksItemsPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::LINKS_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::LINKS_PER_PAGE);
    }    
    
    public function createLinksItem($dateArray) {
        $data = array(
            'title'			=> $dateArray['title'],
            'description'	=> $dateArray['description'],
        	'url'			=> $dateArray['url'],
        	'lang_id'		=> $dateArray['lang_id'],
            'date'			=> new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::LINKS_TABLE, $data);
        return $this -> db -> lastInsertId();
    }
    
    public function modifyLinksItem($id, $dateArray) {
        $data = array(
            'title'			=> $dateArray['title'],
            'description'	=> $dateArray['description'],
        	'url'			=> $dateArray['url'],
        	'lang_id'		=> $dateArray['lang_id']
        );
        $this -> db -> update(self::LINKS_TABLE, $data, 'id = '.$id);
        return true;
    }
    
    public function deleteLinksItem($id) {
        $this -> db -> delete(self::LINKS_TABLE, 'id = '.$id);
    }
    
    public function getLinksItemById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::LINKS_TABLE.' WHERE id = ?', $id);
    }
    
    public function searchLinksByWord($lang_id, $search){
	   	$sql = 'SELECT * FROM '.self::LINKS_TABLE.' WHERE lang_id='.$lang_id.' AND MATCH(title, description) AGAINST("'.$search.'")';
		return $this -> db -> fetchAll($sql);
    }
}
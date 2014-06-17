<?php
class ContentManagerDb
{
    const PAGES_TABLE = 'pages';
    const LANGUAGES_TABLE = 'languages';
    
    protected $db;
    
    public function __construct()
    {
        $this -> db = Zend_Registry::get('db');
    }
    
    public function getAllPagesByType($lang_id, $type='') {
    	if($type==''){
    		$sql = 'SELECT * FROM `'.self::PAGES_TABLE.'` WHERE lang_id='.$lang_id.' ORDER BY title';
    	} else {
    		$sql = 'SELECT * FROM `'.self::PAGES_TABLE.'` WHERE lang_id='.$lang_id.' AND type='.$type.' ORDER BY title';
    	}
        return $this -> db -> fetchAll($sql);
    }

    public function getAllPagesByTypeCustom($lang_id, $type='') {
        if($type==''){
            $sql = 'SELECT * FROM `'.self::PAGES_TABLE.'` WHERE lang_id='.$lang_id.' ORDER BY title';
        } else {
            $sql = 'SELECT * FROM `'.self::PAGES_TABLE.'` WHERE lang_id='.$lang_id.' AND type IN ('.$type.') ORDER BY position';
        }
        return $this -> db -> fetchAll($sql);
    }
    
    
    
    public function getAllPages($lang_id) {
        return $this -> db -> fetchAll('SELECT * FROM `'.self::PAGES_TABLE.'` WHERE lang_id='.$lang_id.' ORDER BY type DESC');
    }
    
    public function getPageById($id) 
    {
        return $this -> db -> fetchRow('SELECT * FROM `'.self::PAGES_TABLE.'` WHERE page_id = ?', $id);
    }
    
    public function getPageByLink($link, $lang_id=0) {
    	if($lang_id!=0){
    		$sql = 'SELECT * FROM `'.self::PAGES_TABLE.'` WHERE lang_id='.$lang_id.' AND link="'.$link.'"';
    	} else {
    		$sql = 'SELECT * FROM `'.self::PAGES_TABLE.'` WHERE link="'.$link.'"';
    	}
        return $this -> db -> fetchRow($sql);
    }
    
    public function getHeaderPages() {
        return $this -> db -> fetchAll('SELECT page_id, title, link, text, modification_date, header_enabled, footer_enabled from `'.self::PAGES_TABLE.'` WHERE header_enabled = 1 ORDER BY position');
    }
    
    public function getFooterPages() {
        return $this -> db -> fetchAll('SELECT page_id, title, link, text, modification_date, header_enabled, footer_enabled from `'.self::PAGES_TABLE.'` WHERE footer_enabled = 1 ORDER BY position');
    }
    
    public function modifyPage($id, $dataArray) {
        $data = array(
        	'title'             => $dataArray['title'],
            'link' 			    => $dataArray['link'],
            'modification_date' => new Zend_Db_Expr('CURDATE()'),
            'description_short' => $dataArray['description_short'],
            'text' 			    => str_replace('\"','"',$dataArray['text']),
//        	'type' 			    => 2,
            'meta_title'       => $dataArray['meta_title'],
            'meta_description' => $dataArray['meta_description'],
            'meta_keywords'    => $dataArray['meta_keywords'],
            'meta_link_title'  => $dataArray['meta_link_title'],
        	'lang_id' 		    => $dataArray['lang_id']
        );
        $this -> db -> update(self::PAGES_TABLE, $data, 'page_id = '.$id);
        return true;
    }
    
    public function updateImage($id, $filename){
        $this -> db -> update(self::PAGES_TABLE, array('image' => $filename), 'page_id = '.$id);
    } 
    
    public function moveUp($id) 
    {
        $cur_page = $this -> getPageById($id);
        $data = array(
            'position' => new Zend_Db_Expr( 'position + 1' )
        );
        $this -> db -> update(self::PAGES_TABLE, $data, 'position = '.((int)$cur_page['position']-1));
        $data = array(
            'position' => new Zend_Db_Expr( 'position - 1' )
        );
        $this -> db -> update(self::PAGES_TABLE, $data, 'page_id = '.$id);
    }
    
    public function moveDown($id) 
    {
        $cur_page = $this -> getPageById($id);
        $data = array(
            'position' => new Zend_Db_Expr( 'position - 1' )
        );
        $this -> db -> update(self::PAGES_TABLE, $data, 'position = '.((int)$cur_page['position']+1));
        $data = array(
            'position' => new Zend_Db_Expr( 'position + 1' )
        );
        $this -> db -> update(self::PAGES_TABLE, $data, 'page_id = '.$id);
    }
    
    public function createPage($dataArray) {
    	   
        $data = array(
        	'title'             => $dataArray['title'],
            'link' 			    => $dataArray['link'],
            'modification_date' => new Zend_Db_Expr('CURDATE()'),
            'description_short' => $dataArray['description_short'],
            'text' 			    => str_replace('\"','"',$dataArray['text']),
        	'type' 			    => 0,
            'meta_title'       => $dataArray['meta_title'],
            'meta_description' => $dataArray['meta_description'],
            'meta_keywords'    => $dataArray['meta_keywords'],
            'meta_link_title'  => $dataArray['meta_link_title'],
        	'lang_id' 		    => $dataArray['lang_id']
        );
        $this -> db ->insert(self::PAGES_TABLE, $data);
        return $this -> db -> lastInsertId();
    }
    
    public function deletePage($id) 
    {
        $page = $this -> getPageById($id);
        if( $page['title'] != 'footer' )
            $this -> db -> delete(self::PAGES_TABLE, 'page_id = '.$id);
        
        $this->db->update(self::PAGES_TABLE, array('position'=>new Zend_Db_Expr('position-1')), 'position>'.$page['position']);
    }
    
    public function getPageByKeyAndLangId($key, $lang_id) {
        return $this -> db -> fetchRow('SELECT * from `'.self::PAGES_TABLE.'` WHERE `key` = "'.$key.'" AND lang_id='.$lang_id);
    }
    
    public function setCharset() 
    {
    	header('Content-Type: text/html; charset=utf-8');
        return $this -> db -> query('SET NAMES utf8');
    }
    
    public function getSettingsByLangId($lang_id) {
        $data = $this -> db -> fetchAll('SELECT * FROM `'.self::PAGES_TABLE.'` WHERE lang_id='.$lang_id.' AND type!=0');
        $dataOut = array();
        for($i=0; $i<sizeof($data); $i++){
        	$data[$i]['title'] = str_replace("<br />","<br>",$data[$i]['title']);
        	$dataOut[$data[$i]['key']] = stripslashes(strip_tags($data[$i]['title'],'<br>'));
        }
        return $dataOut;
    }    
    
    public function getLanguages(){
    	return $this -> db -> fetchAll('SELECT * FROM `'.self::LANGUAGES_TABLE.'` ORDER BY lang_id');
    }
    
    public function getLanguageById($lang_id){
        return $this -> db -> fetchRow('SELECT * FROM `'.self::LANGUAGES_TABLE.'` WHERE lang_id = ?', $lang_id);
    }
    
    public function getLanguagesWithoutCurrent($lang_id){
    	return $this -> db -> fetchAll('SELECT * FROM `'.self::LANGUAGES_TABLE.'` WHERE lang_id!=? ORDER BY lang_id', $lang_id);
    }    
    
    public function checkExistPageLink($page_link, $lang_id, $modify_id) {
    	if($modify_id==0){
			$sql = 'SELECT * FROM '.self::PAGES_TABLE.' WHERE type=0 AND lang_id='.$lang_id.' AND link="'.$page_link.'"';
		} else {
			$sql = 'SELECT * FROM '.self::PAGES_TABLE.' WHERE type=0 AND lang_id='.$lang_id.' AND link="'.$page_link.'" AND page_id!='.$modify_id;
		}
        return $this -> db -> fetchAll($sql);
    }
    
    public function searchContentByWord($lang_id, $search){
	   	$sql = 'SELECT * FROM '.self::PAGES_TABLE.' WHERE lang_id='.$lang_id.' AND type IN (0,2) AND MATCH(title, text) AGAINST("'.$search.'")';
		$data = $this -> db -> fetchAll($sql);
		return $data;
    }

    
}
<?php

class FaqDb
{
    const FAQ_SECTION_TABLE = 'faq_sections';
    const FAQ_SECTION_PER_PAGE = 10;
    
    const FAQ_CONTENT_TABLE = 'faq_content';
    const FAQ_CONTENT_PER_PAGE = 10;
    
    protected $db;
    
    public function __construct()
    {
        $this -> db = Zend_Registry::get('db');
    }
    
    //*******************************************************************************
    //************************** FAQ SECTION ****************************************
    //*******************************************************************************
    
    public function getAllSectionsItems($lang_id) {
    	$sql = 'SELECT * FROM '.self::FAQ_SECTION_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY title';
        return $this -> db -> fetchAll($sql);
    }
    
    public function getSectionsItemsForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::FAQ_SECTION_PER_PAGE:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::FAQ_SECTION_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY date DESC LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    }
    
    public function getSectionsItemsPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::FAQ_SECTION_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::FAQ_SECTION_PER_PAGE);
    }   
    
    public function addSectionsItem($dateArray) {
        $data = array(
            'title'			=> $dateArray['title'],
            'description'	=> $dateArray['description'],
        	'lang_id'        => $dateArray['lang_id'],
            'date'			=> new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::FAQ_SECTION_TABLE, $data);
        return $this -> db -> lastInsertId();
    }
    
    public function modifySectionsItem($id, $dateArray) {
        $data = array(
            'title'       => $dateArray['title'],
            'description' => $dateArray['description'],
        	'lang_id'        => $dateArray['lang_id']
        );
        $this -> db -> update(self::FAQ_SECTION_TABLE, $data, 'id = '.$id);
    }
    
    public function deleteSectionsItem($id) {
        $this -> db -> delete(self::FAQ_SECTION_TABLE, 'id = '.$id);
    }
        
    public function getSectionsItemById($id) {
        $data =  $this -> db -> fetchRow('SELECT * FROM '.self::FAQ_SECTION_TABLE.' WHERE id = ?', $id);
        return $data;
    }  
    
    //*******************************************************************************
    //************************** FAQ CONTENT ****************************************
    //*******************************************************************************
    
    public function getAllContentItemsBySectionId($section, $lang_id) {
        return $this -> db -> fetchAll('SELECT * FROM '.self::FAQ_CONTENT_TABLE.' WHERE faq_section_id='.$section.' AND lang_id='.$lang_id.' ORDER BY date DESC');;
    }
    
    public function getContentItemsForPage($section, $lang_id, $page_num, $limit = -1) {
    	
        $limit = $limit == -1?self::FAQ_CONTENT_PER_PAGE:$limit;
        
        if($section==0){
        	$sql ='SELECT * FROM '.self::FAQ_CONTENT_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY date DESC LIMIT '.($page_num*$limit).', '.$limit;
        } else {
        	$sql ='SELECT * FROM '.self::FAQ_CONTENT_TABLE.' WHERE faq_section_id='.$section.' AND lang_id='.$lang_id.' ORDER BY date DESC LIMIT '.($page_num*$limit).', '.$limit;
        }
        
        $data = $this -> db -> fetchAll($sql);
        return $data;
    }
    
    public function getContentItemsPagesCount($section, $lang_id) {
    	if($section==0){
    		$sql = 'SELECT count(*) as count FROM '.self::FAQ_CONTENT_TABLE.' WHERE lang_id='.$lang_id;
    	} else {
    		$sql = 'SELECT count(*) as count FROM '.self::FAQ_CONTENT_TABLE.' WHERE faq_section_id='.$section.' AND lang_id='.$lang_id;
    	}
        $count = $this -> db -> fetchRow($sql);
        return ceil($count['count']/self::FAQ_CONTENT_PER_PAGE);
    }   
    
    public function addContentItem($dateArray) {
        $data = array(
            'title'			 => $dateArray['title'],
            'description'	 => $dateArray['description'],
        	'faq_section_id' => $dateArray['section'],
        	'lang_id'        => $dateArray['lang_id'],
            'date'			 => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::FAQ_CONTENT_TABLE, $data);
        return $this -> db -> lastInsertId();
    }
    
    public function modifyContentItem($id, $dateArray) {
        $data = array(
            'title'       => $dateArray['title'],
            'description' => $dateArray['description']
        );
        $this -> db -> update(self::FAQ_CONTENT_TABLE, $data, 'id = '.$id);
    }
    
    public function deleteContentItem($id) {
        $this -> db -> delete(self::FAQ_CONTENT_TABLE, 'id = '.$id);
    }
        
    public function getContentItemById($id) {
        $data =  $this -> db -> fetchRow('SELECT * FROM '.self::FAQ_CONTENT_TABLE.' WHERE id = ?', $id);
        return $data;
    }

}
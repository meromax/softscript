<?php

class SectionsDb
{
    const SECTIONS_TABLE = 'sections';
    const SECTIONS_PER_PAGE  = 20;
    
    const SECTIONS_SUB_TABLE = 'sections_sub';
    const SECTIONS_SUB_PER_PAGE  = 20;

    const SECTIONS_OPTIONS_TABLE = 'sections_options';
    
    protected $db;
    
    
        
    public function __construct(){
        $this -> db = Zend_Registry::get('db');
    }
    
    //*********************************************************************************
    //****************************** Sections *****************************************
    //*********************************************************************************
    
    public function getSectionByLink($link, $lang_id=1) {
    	$sql = 'SELECT *, UPPER(title) AS titleUpper FROM `'.self::SECTIONS_TABLE.'` WHERE lang_id='.$lang_id.' AND link="'.$link.'"';
        return $this -> db -> fetchRow($sql);
    }    
    
    public function getAllSectionsWithoutCurrent($curr_sec_id, $lang_id=1) {
    	$sql = 'SELECT * FROM `'.self::SECTIONS_TABLE.'` WHERE lang_id='.$lang_id.' AND id!='.$curr_sec_id.' ORDER BY `position`';
        return $this -> db -> fetchAll($sql);
    }     
    
    public function getAllSections($lang_id){
        return $this -> db -> fetchAll('SELECT *, UPPER(title) AS titleUpper FROM '.self::SECTIONS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position');
    }
    
    public function getAllSectionsByType($lang_id, $type=0){
        return $this -> db -> fetchAll('SELECT * FROM '.self::SECTIONS_TABLE.' WHERE lang_id='.$lang_id.' AND type='.$type.' ORDER BY position');
    }    
    
    public function getSectionsForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::SECTIONS_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::SECTIONS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
    }
    
    public function getSectionsPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::SECTIONS_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::SECTIONS_PER_PAGE);
    }
    
    public function createSection($data) {
        $dataArray = array(
        	'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short'=> $data['description_short'],
            'description'      => $data['description'],
			'meta_title'       => $data['meta_title'],
        	'meta_description' => $data['meta_description'],
        	'meta_keywords'    => $data['meta_keywords'],
        	'meta_link_title'  => $data['meta_link_title'],
        	'position'         => $data['position'],
        	'lang_id'          => $data['lang_id'],
        	'type'             => $data['section_type'],
            'template'         => $data['template'],
            'post_date'        => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::SECTIONS_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }
    
    public function modifySection($data) {
        $dataArray = array(
        	'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short'=> $data['description_short'],
            'description'      => $data['description'],
			'meta_title'       => $data['meta_title'],
        	'meta_description' => $data['meta_description'],
        	'meta_keywords'    => $data['meta_keywords'],
        	'meta_link_title'  => $data['meta_link_title'],
        	'position'		   => $data['position'],
			'type'             => $data['section_type'],
            'template'         => $data['template'],
            'lang_id'     => $data['lang_id']
        );
        $this -> db -> update(self::SECTIONS_TABLE, $dataArray, 'id = '.$data['id']);
    }
    
    public function updateImage($id, $filename){
        $this -> db -> update(self::SECTIONS_TABLE, array('image' => $filename), 'id = '.$id);
    } 
    
    public function deleteSection($id){
        $this -> db -> delete(self::SECTIONS_TABLE, 'id = '.$id);
    }
    
    public function getSectionById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::SECTIONS_TABLE.' WHERE id = ?', $id);
    }

    public function addSectionOption($sectionId, $optionId) {
        $dataArray = array(
            'section_id'  => $sectionId,
            'option_id'   => $optionId
        );
        $this -> db ->insert(self::SECTIONS_OPTIONS_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function deleteSectionOptions($sectionId){
        $this -> db -> delete(self::SECTIONS_OPTIONS_TABLE, 'section_id = '.$sectionId);
    }

    public function getSectionOptions($sectionId){
        return $this -> db -> fetchAll('SELECT * FROM '.self::SECTIONS_OPTIONS_TABLE.' WHERE section_id = '.$sectionId);
    }

    public function getSectionOptionsIds($sectionId){
        $data = $this->getSectionOptions($sectionId);

        $optionsIds = array();
        foreach($data as $value){
            $optionsIds[] = $value['option_id'];
        }
        return implode(",", $optionsIds);
    }

    public function getSectionsWithCategories($lang_id){
        $sections = $this -> db -> fetchAll('SELECT * FROM '.self::SECTIONS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position');
        for($i=0; $i<sizeof($sections); $i++){
            $sections[$i]['categories'] = $this->getAllSubSections($sections[$i]['id'], $lang_id);
        }
        return $sections;
    }
    
    //*********************************************************************************
    //****************************** Sub Sections *************************************
    //*********************************************************************************
    public function getSubSectionByLink($link, $lang_id=1) {
    	$sql = 'SELECT * FROM `'.self::SECTIONS_SUB_TABLE.'` WHERE lang_id='.$lang_id.' AND link="'.$link.'"';
        return $this -> db -> fetchRow($sql);
    } 
    
    public function getAllSubSections($section_id, $lang_id){
        return $this -> db -> fetchAll('SELECT * FROM '.self::SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$section_id.' ORDER BY position');
    }

    public function getLast6SubSections($sections_ids, $lang_id){
        return $this -> db -> fetchAll('SELECT * FROM '.self::SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id.' AND section_id IN ('.$sections_ids.') ORDER BY post_date DESC LIMIT 0,6');
    }
    
    public function getSubSectionsForPage($section_id, $lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::SECTIONS_SUB_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$section_id.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
    }
    
    public function getSubSectionsPagesCount($section_id, $lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$section_id);
        return ceil($count['count']/self::SECTIONS_SUB_PER_PAGE);
    }

    public function getSubSectionsCustomForPage($section_id, $lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::SECTIONS_SUB_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$section_id.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
    }

    public function getSubSectionsCustomPagesCount($section_id, $lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$section_id);
        return ceil($count['count']/self::SECTIONS_SUB_PER_PAGE);
    }

    public function getSubSectionsAllForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::SECTIONS_SUB_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY section_id LIMIT '.($page_num*$limit).', '.$limit);
    }

    public function getSubSectionsAllPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::SECTIONS_SUB_PER_PAGE);
    }
    
    public function createSubSection($data) {
        $dataArray = array(
        	'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short'=> $data['description_short'],
            'description'      => $data['description'],
			'meta_title'       => $data['meta_title'],
        	'meta_description' => $data['meta_description'],
        	'meta_keywords'    => $data['meta_keywords'],
        	'meta_link_title'  => $data['meta_link_title'],
        	'position'         => $data['position'],
            'price'            => $data['price'],
        	'lang_id'          => $data['lang_id'],
            'post_date'        => new Zend_Db_Expr('NOW()'),
        	'section_id'       => $data['section_id']
        );
        $this -> db ->insert(self::SECTIONS_SUB_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }
    
    public function modifySubSection($data) {
        $dataArray = array(
        	'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short'=> $data['description_short'],
            'description'      => $data['description'],
			'meta_title'       => $data['meta_title'],
        	'meta_description' => $data['meta_description'],
        	'meta_keywords'    => $data['meta_keywords'],
        	'meta_link_title'  => $data['meta_link_title'],
        	'position'         => $data['position'],
            'price'            => $data['price'],
            'lang_id'          => $data['lang_id'],
        	'section_id'       => $data['section_id']
        );
        $this -> db -> update(self::SECTIONS_SUB_TABLE, $dataArray, 'id = '.$data['id']);
    }
    
    public function updateImage2($id, $filename){
        $this -> db -> update(self::SECTIONS_SUB_TABLE, array('image' => $filename), 'id = '.$id);
    } 
    
    public function deleteSubSection($id){
        $this -> db -> delete(self::SECTIONS_SUB_TABLE, 'id = '.$id);
    }
    
    public function getSubSectionById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::SECTIONS_SUB_TABLE.' WHERE id = ?', $id);
    }
}
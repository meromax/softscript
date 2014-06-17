<?php

class OptionsDb
{
    const OPTIONS_TABLE = 'options';
    const OPTIONS_PER_PAGE  = 20;
    
    const OPTIONS_PROPERTIES_TABLE = 'options_properties';
    const OPTIONS_PROPERTIES_PER_PAGE  = 20;
    
    protected $db;
    
    
        
    public function __construct(){
        $this -> db = Zend_Registry::get('db');
    }
    
    //*********************************************************************************
    //****************************** Sections *****************************************
    //*********************************************************************************
    
    public function getOptionByLink($link, $lang_id=1) {
    	$sql = 'SELECT *, UPPER(title) AS titleUpper FROM `'.self::OPTIONS_TABLE.'` WHERE lang_id='.$lang_id.' AND link="'.$link.'"';
        return $this -> db -> fetchRow($sql);
    }    
    
    public function getAllOptionsWithoutCurrent($curr_sec_id, $lang_id=1) {
    	$sql = 'SELECT * FROM `'.self::OPTIONS_TABLE.'` WHERE lang_id='.$lang_id.' AND id!='.$curr_sec_id.' ORDER BY `position`';
        return $this -> db -> fetchAll($sql);
    }     
    
    public function getAllOption($lang_id){
        return $this -> db -> fetchAll('SELECT *, UPPER(title) AS titleUpper FROM '.self::OPTIONS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position');
    }

    
    public function getAllOptionByType($lang_id, $type=0){
        return $this -> db -> fetchAll('SELECT * FROM '.self::OPTIONS_TABLE.' WHERE lang_id='.$lang_id.' AND type='.$type.' ORDER BY position');
    }    
    
    public function getOptionsForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::OPTIONS_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::OPTIONS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY title LIMIT '.($page_num*$limit).', '.$limit);
    }
    
    public function getOptionsPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::OPTIONS_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::OPTIONS_PER_PAGE);
    }
    
    public function addOption($data) {
        $dataArray = array(
        	'link'             => $data['link'],
            'title'            => str_replace('"',"&#34;",$data['title']),
            'description'      => $data['description'],
            'position'         => $data['position'],
			'meta_title'       => str_replace('"',"&#34;",$data['meta_title']),
        	'meta_description' => str_replace('"',"&#34;",$data['meta_description']),
        	'meta_keywords'    => str_replace('"',"&#34;",$data['meta_keywords']),
        	'position'         => $data['position'],
        	'lang_id'          => $data['lang_id'],
            'post_date'        => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::OPTIONS_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }
    
    public function modifyOption($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => str_replace('"',"&#34;",$data['title']),
            'description'      => $data['description'],
            'position'         => $data['position'],
            'meta_title'       => str_replace('"',"&#34;",$data['meta_title']),
            'meta_description' => str_replace('"',"&#34;",$data['meta_description']),
            'meta_keywords'    => str_replace('"',"&#34;",$data['meta_keywords']),
            'position'         => $data['position'],
            'lang_id'     => $data['lang_id']
        );
        $this -> db -> update(self::OPTIONS_TABLE, $dataArray, 'id = '.$data['id']);
    }
    
    public function updateImage($id, $filename){
        $this -> db -> update(self::OPTIONS_TABLE, array('image' => $filename), 'id = '.$id);
    } 
    
    public function deleteOption($id){
        $this -> db -> delete(self::OPTIONS_TABLE, 'id = '.$id);
    }
    
    public function getOptionById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::OPTIONS_TABLE.' WHERE id = ?', $id);
    }


    public function getAllOptionWithProperties($lang_id){

        $options = $this -> db -> fetchAll('SELECT * FROM '.self::OPTIONS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position');

        $fullOptions = array();

        for($i=0; $i<sizeof($options); $i++){
            $properties = $this->getAllProperties($options[$i]['id'], $lang_id);
            if(sizeof($properties)>0){
                $options[$i]['properties'] = $properties;
                $fullOptions[] = $options[$i];
            }
        }

        return $fullOptions;
    }

    public function getAllOptionWithPropertiesCustom($optionsIds, $productId=0, $lang_id=1){
        if($optionsIds!=""){
            $options = $this -> db -> fetchAll('SELECT * FROM '.self::OPTIONS_TABLE.' WHERE id IN ('.$optionsIds.') AND lang_id='.$lang_id.' ORDER BY title');

            $fullOptions = array();

            for($i=0; $i<sizeof($options); $i++){
                $properties = $this->getAllProperties($options[$i]['id'], $lang_id);
                if(sizeof($properties)>0){
                    $options[$i]['properties'] = $properties;
                    $fullOptions[] = $options[$i];
                }
            }
            return $fullOptions;
        } else {
            return array();
        }

    }

    public function getAllSectionOptionsWithProperties($optionsIds, $lang_id=1){
        if($optionsIds!=""){
            $options = $this -> db -> fetchAll('SELECT * FROM '.self::OPTIONS_TABLE.' WHERE id IN ('.$optionsIds.') AND lang_id='.$lang_id.' ORDER BY title');

            $fullOptions = array();

            for($i=0; $i<sizeof($options); $i++){
                $properties = $this->getAllProperties($options[$i]['id'], $lang_id);
                if(sizeof($properties)>0){
                    $options[$i]['properties'] = $properties;
                    $fullOptions[] = $options[$i];
                }
            }
            return $fullOptions;
        } else {
            return array();
        }

    }


    
    //*********************************************************************************
    //****************************** PROPERTIES ***************************************
    //*********************************************************************************
    public function getPropertyByLink($link, $lang_id=1) {
    	$sql = 'SELECT * FROM `'.self::OPTIONS_PROPERTIES_TABLE.'` WHERE lang_id='.$lang_id.' AND link="'.$link.'"';
        return $this -> db -> fetchRow($sql);
    } 
    
    public function getAllProperties($option_id, $lang_id){
        return $this -> db -> fetchAll('SELECT * FROM '.self::OPTIONS_PROPERTIES_TABLE.' WHERE lang_id='.$lang_id.' AND option_id='.$option_id.' ORDER BY position');
    }

    public function getLast6Properties($options_ids, $lang_id){
        return $this -> db -> fetchAll('SELECT * FROM '.self::OPTIONS_PROPERTIES_TABLE.' WHERE lang_id='.$lang_id.' AND section_id IN ('.$options_ids.') ORDER BY post_date DESC LIMIT 0,6');
    }
    
    public function getPropertiesForPage($option_id, $lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::OPTIONS_PROPERTIES_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::OPTIONS_PROPERTIES_TABLE.' WHERE lang_id='.$lang_id.' AND option_id='.$option_id.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
    }
    
    public function getPropertiesPagesCount($option_id, $lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::OPTIONS_PROPERTIES_TABLE.' WHERE lang_id='.$lang_id.' AND option_id='.$option_id);
        return ceil($count['count']/self::OPTIONS_PROPERTIES_PER_PAGE);
    }
    
    public function addProperty($data) {
        $dataArray = array(
        	'link'             => $data['link'],
            'title'            => str_replace('"',"&#34;",$data['title']),
            'description'      => $data['description'],
			'meta_title'       => str_replace('"',"&#34;",$data['meta_title']),
        	'meta_description' => str_replace('"',"&#34;",$data['meta_description']),
        	'meta_keywords'    => str_replace('"',"&#34;",$data['meta_keywords']),
        	'position'         => $data['position'],
        	'lang_id'          => $data['lang_id'],
            'post_date'        => new Zend_Db_Expr('NOW()'),
        	'option_id'        => $data['option_id']
        );
        $this -> db ->insert(self::OPTIONS_PROPERTIES_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }
    
    public function modifyProperty($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => str_replace('"',"&#34;",$data['title']),
            'description'      => $data['description'],
            'meta_title'       => str_replace('"',"&#34;",$data['meta_title']),
            'meta_description' => str_replace('"',"&#34;",$data['meta_description']),
            'meta_keywords'    => str_replace('"',"&#34;",$data['meta_keywords']),
            'position'         => $data['position']
        );
        $this -> db -> update(self::OPTIONS_PROPERTIES_TABLE, $dataArray, 'id = '.$data['id']);
    }
    
    public function updateImage2($id, $filename){
        $this -> db -> update(self::OPTIONS_PROPERTIES_TABLE, array('image' => $filename), 'id = '.$id);
    } 
    
    public function deleteProperty($id){
        $this -> db -> delete(self::OPTIONS_PROPERTIES_TABLE, 'id = '.$id);
    }
    
    public function getPropertyById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::OPTIONS_PROPERTIES_TABLE.' WHERE id = ?', $id);
    }
}
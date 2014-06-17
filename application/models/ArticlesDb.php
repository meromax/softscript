<?php

class ArticlesDb
{
    const ARTICLES_TABLE = 'articles';
    
    const ARTICLES_PER_PAGE = 10;
    
    const ARTICLES_SECTIONS_TABLE = 'articles_sections';
    const ARTICLES_SECTIONS_PER_PAGE  = 20;

    const ARTICLES_SECTIONS_SUB_TABLE = 'articles_sections_sub';
    const ARTICLES_SECTIONS_SUB_PER_PAGE  = 20;
    
    protected $db;
    
    
        
    public function __construct()
    {
        $this -> db = Zend_Registry::get('db');
    }

    public function getArticleByLink($link, $lang_id=1) {
        $sql = 'SELECT * FROM `'.self::ARTICLES_TABLE.'` WHERE lang_id='.$lang_id.' AND link="'.$link.'"';
        return $this -> db -> fetchRow($sql);
    }

    public function getAllArticles() {
        return $this -> db -> fetchAll('SELECT * FROM '.self::ARTICLES_TABLE.' ORDER BY post_date DESC');
    }

    public function getArticlesForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::ARTICLES_PER_PAGE:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::ARTICLES_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY post_date DESC LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    }

    public function getPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as articles_count FROM '.self::ARTICLES_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['articles_count']/self::ARTICLES_PER_PAGE);
    }

    public function getFrontArticlesForPage($lang_id, $page_num, $section=0, $category=0, $limit = -1) {
        $addSql = '';
        if($section>0){
            $addSql = ' AND section_id='.$section;
            if($category>0){
                $addSql = ' AND category_id='.$category;
            }
        }
        $limit = $limit == -1?self::ARTICLES_PER_PAGE:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::ARTICLES_TABLE.' WHERE lang_id='.$lang_id.$addSql.' ORDER BY post_date DESC LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    }
    
    public function getFrontPagesCount($lang_id, $section=0, $category=0) {
        $addSql = '';
        if($section>0){
            $addSql = ' AND section_id='.$section;
            if($category>0){
                $addSql = ' AND category_id='.$category;
            }
        }
        $count = $this -> db -> fetchRow('SELECT count(*) as articles_count FROM '.self::ARTICLES_TABLE.' WHERE lang_id='.$lang_id.$addSql);
        return ceil($count['articles_count']/self::ARTICLES_PER_PAGE);
    }
    
    public function createArticleItem($dateArray) {
        $data = array(
            'title'             => $dateArray['title'],
            'link'              => $dateArray['link'],
            'description_short' => $dateArray['description_short'],
            'description'       => $dateArray['description'],
            'section_id'        => $dateArray['section'],
            'category_id'       => $dateArray['category'],
            'meta_title'        => $dateArray['meta_title'],
            'meta_description'  => $dateArray['meta_description'],
            'meta_keywords'     => $dateArray['meta_keywords'],
            'meta_link_title'   => $dateArray['meta_link_title'],
        	'lang_id'           => $dateArray['lang_id'],
            'post_date'         => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::ARTICLES_TABLE, $data);
        return $this -> db -> lastInsertId();
    }
    
    function uploadPicture($article_id){
        set_time_limit(120);
        require_once ('Uploader/class.upload.php');
        $path =  'images/articles/';
        $allowedExt = array('jpeg', 'jpg', 'gif', 'png', 'bmp');
        $ext = substr($_FILES['image']['name'], - 3) && (substr($_FILES['image']['name'], - 4, - 3) == '.');

        if (in_array($ext, $allowedExt) && $_FILES['image']['name'] != ''){
        	
           $Uploader = new upload($_FILES['image']);
            if ($Uploader->uploaded) {
            	$Uploader->image_text_y = 0;
            	$Uploader->image_text_alignment = 'C';
                $Uploader->file_overwrite = true;
                $Uploader->file_auto_rename = false;
                $Uploader->image_resize = true;
                $Uploader->image_ratio_crop = true;
                $Uploader->image_convert = 'jpg';
                $Uploader->mime_check = true;
                $Uploader->file_new_name_body = md5($article_id)."_small";
                $Uploader->image_x = 99;
                $Uploader->image_y = 99;
                //$Uploader->image_ratio_y = true;
                $Uploader->Process($path);
				if ($Uploader->processed) {
					$image_small =  md5($article_id)."_small";
				}
            }
            
           $Uploader = new upload($_FILES['image']);
            if ($Uploader->uploaded) {
                $Uploader->file_overwrite = true;
                $Uploader->file_auto_rename = false;
                $Uploader->image_resize = true;
                $Uploader->image_ratio_crop = true;
                $Uploader->image_convert = 'jpg';
                $Uploader->mime_check = true;
                $Uploader->file_new_name_body = md5($article_id)."_middle";
                $Uploader->image_x = 100;
                $Uploader->image_y = 100;
                //$Uploader->image_ratio_y = true;
                $Uploader->Process($path);
				if ($Uploader->processed) {
					$image_middle =  md5($article_id)."_middle";
				}
            }
            
           $Uploader = new upload($_FILES['image']);
            if ($Uploader->uploaded) {
                $Uploader->file_overwrite = true;
                $Uploader->file_auto_rename = false;
                $Uploader->image_convert = 'jpg';
                $Uploader->mime_check = true;
                $Uploader->file_new_name_body = md5($article_id)."_original";
                $Uploader->Process($path);
				if ($Uploader->processed) {
					$image_original =  md5($article_id)."_original";
				}
            }

        }
        return md5($article_id);
    }
    
    public function modifyArticle($id, $dateArray) {

        $data = array(
            'title'             => $dateArray['title'],
            'link'              => $dateArray['link'],
            'description_short' => $dateArray['description_short'],
            'description'       => $dateArray['description'],
            'section_id'        => $dateArray['section'],
            'category_id'       => $dateArray['category'],
            'meta_title'        => $dateArray['meta_title'],
            'meta_description'  => $dateArray['meta_description'],
            'meta_keywords'     => $dateArray['meta_keywords'],
            'meta_link_title'   => $dateArray['meta_link_title'],
        );

        $this -> db -> update(self::ARTICLES_TABLE, $data, 'id = '.$id);
        return true;
    }
    
    public function deleteArticle($id) 
    {
        $this -> db -> delete(self::ARTICLES_TABLE, 'id = '.$id);
    }
    
    public function getLastArticleId() 
    {
        $arr = $this -> db -> fetchRow('SELECT MAX(article_id) FROM '.self::ARTICLES_TABLE);
        return $arr['MAX(article_id)'];
    }
    
    public function getArticleById($id) {
        $data =  $this -> db -> fetchRow('SELECT * FROM '.self::ARTICLES_TABLE.' WHERE id = ?', $id);
        return $data;
    }
    
    public function searchArticlesByWord($lang_id, $search){
	   	$sql = 'SELECT * FROM '.self::ARTICLES_TABLE.' WHERE lang_id='.$lang_id.' AND MATCH(article_title, article_description) AGAINST("'.$search.'")';
		return $this -> db -> fetchAll($sql);
    }


    //*********************************************************************************
    //****************************** Sections *****************************************
    //*********************************************************************************

    public function getSectionByLink($link, $lang_id=1) {
        $sql = 'SELECT * FROM `'.self::ARTICLES_SECTIONS_TABLE.'` WHERE lang_id='.$lang_id.' AND link="'.$link.'"';
        return $this -> db -> fetchRow($sql);
    }

    public function getAllSectionsWithoutCurrent($curr_sec_id, $lang_id=1) {
        $sql = 'SELECT * FROM `'.self::ARTICLES_SECTIONS_TABLE.'` WHERE lang_id='.$lang_id.' AND id!='.$curr_sec_id.' ORDER BY `position`';
        return $this -> db -> fetchAll($sql);
    }

    public function getAllSections($lang_id){
        return $this -> db -> fetchAll('SELECT * FROM '.self::ARTICLES_SECTIONS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position');
    }

    public function getAllSectionsByType($lang_id, $type=0){
        return $this -> db -> fetchAll('SELECT * FROM '.self::ARTICLES_SECTIONS_TABLE.' WHERE lang_id='.$lang_id.' AND type='.$type.' ORDER BY position');
    }

    public function getSectionsForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::ARTICLES_SECTIONS_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::ARTICLES_SECTIONS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
    }

    public function getSectionsPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::ARTICLES_SECTIONS_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::ARTICLES_SECTIONS_PER_PAGE);
    }

    public function createSection($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short' => $data['description_short'],
            'description'      => trim($data['description']),
            'meta_title'       => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords'    => $data['meta_keywords'],
            'meta_link_title'  => $data['meta_link_title'],
            'position'         => $data['position'],
            'lang_id'          => $data['lang_id'],
            'post_date'        => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::ARTICLES_SECTIONS_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function modifySection($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short' => $data['description_short'],
            'description'      => $data['description'],
            'meta_title'       => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords'    => $data['meta_keywords'],
            'meta_link_title'  => $data['meta_link_title'],
            'position'		   => $data['position'],
            'lang_id'     => $data['lang_id']
        );
        $this -> db -> update(self::ARTICLES_SECTIONS_TABLE, $dataArray, 'id = '.$data['id']);
    }

    public function updateImage($id, $filename){
        $this -> db -> update(self::ARTICLES_SECTIONS_TABLE, array('image' => $filename), 'id = '.$id);
    }

    public function deleteSection($id){
        $this -> db -> delete(self::ARTICLES_SECTIONS_TABLE, 'id = '.$id);
    }

    public function getSectionById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::ARTICLES_SECTIONS_TABLE.' WHERE id = ?', $id);
    }

    public function getSectionsWithCategories($lang_id){
        $sections = $this -> db -> fetchAll('SELECT * FROM '.self::ARTICLES_SECTIONS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position');
        for($i=0; $i<sizeof($sections); $i++){
            $sections[$i]['categories'] = $this->getAllSubSections($sections[$i]['id'], $lang_id);
        }
        return $sections;
    }


    //*********************************************************************************
    //****************************** Sub Sections *************************************
    //*********************************************************************************

    public function getSubSectionByLink($link, $lang_id=1) {
        $sql = 'SELECT * FROM `'.self::ARTICLES_SECTIONS_SUB_TABLE.'` WHERE lang_id='.$lang_id.' AND link="'.$link.'"';
        return $this -> db -> fetchRow($sql);
    }

    public function getAllSubSections($section_id, $lang_id){
        return $this -> db -> fetchAll('SELECT * FROM '.self::ARTICLES_SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$section_id.' ORDER BY position');
    }

    public function getLast6SubSections($ARTICLES_SECTIONS_ids, $lang_id){
        return $this -> db -> fetchAll('SELECT * FROM '.self::ARTICLES_SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id.' AND section_id IN ('.$ARTICLES_SECTIONS_ids.') ORDER BY post_date DESC LIMIT 0,6');
    }

    public function getSubSectionsForPage($section_id, $lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::ARTICLES_SECTIONS_SUB_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::ARTICLES_SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$section_id.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
    }

    public function getSubSectionsPagesCount($section_id, $lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::ARTICLES_SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$section_id);
        return ceil($count['count']/self::ARTICLES_SECTIONS_SUB_PER_PAGE);
    }

    public function getSubSectionsCustomForPage($section_id, $lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::ARTICLES_SECTIONS_SUB_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::ARTICLES_SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$section_id.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
    }

    public function getSubSectionsCustomPagesCount($section_id, $lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::ARTICLES_SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$section_id);
        return ceil($count['count']/self::ARTICLES_SECTIONS_SUB_PER_PAGE);
    }

    public function getSubSectionsAllForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::ARTICLES_SECTIONS_SUB_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::ARTICLES_SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY section_id LIMIT '.($page_num*$limit).', '.$limit);
    }

    public function getSubSectionsAllPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::ARTICLES_SECTIONS_SUB_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::ARTICLES_SECTIONS_SUB_PER_PAGE);
    }

    public function createSubSection($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short' => $data['description_short'],
            'description'      => $data['description'],
            'meta_title'       => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords'    => $data['meta_keywords'],
            'meta_link_title'  => $data['meta_link_title'],
            'position'         => $data['position'],
            'lang_id'          => $data['lang_id'],
            'post_date'        => new Zend_Db_Expr('NOW()'),
            'section_id'       => $data['section_id']
        );
        $this -> db ->insert(self::ARTICLES_SECTIONS_SUB_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function modifySubSection($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short' => $data['description_short'],
            'description'      => $data['description'],
            'meta_title'       => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords'    => $data['meta_keywords'],
            'meta_link_title'  => $data['meta_link_title'],
            'position'         => $data['position'],
            'lang_id'          => $data['lang_id'],
            'section_id'       => $data['section_id']
        );
        $this -> db -> update(self::ARTICLES_SECTIONS_SUB_TABLE, $dataArray, 'id = '.$data['id']);
    }

    public function updateImage2($id, $filename){
        $this -> db -> update(self::ARTICLES_SECTIONS_SUB_TABLE, array('image' => $filename), 'id = '.$id);
    }

    public function deleteSubSection($id){
        $this -> db -> delete(self::ARTICLES_SECTIONS_SUB_TABLE, 'id = '.$id);
    }

    public function getSubSectionById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::ARTICLES_SECTIONS_SUB_TABLE.' WHERE id = ?', $id);
    }
    

}
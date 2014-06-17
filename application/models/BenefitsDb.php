<?php

class BenefitsDb
{
    const BENEFITS_TABLE = 'benefits';
    
    const BENEFITS_PER_PAGE  = 5;
    
    const BENEFITS_PER_PAGE2 = 5;
    
    protected $db;
    
    
        
    public function __construct()
    {
        $this -> db = Zend_Registry::get('db');
    }
    
    public function getAllBenefits($lang_id) {
        return $this -> db -> fetchAll('SELECT * FROM '.self::BENEFITS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position');
    }
    
    public function getLast5News($lang_id) {
        return $this -> db -> fetchAll('SELECT * FROM '.self::NEWS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY new_date DESC LIMIT 0,5');
    }
    
    
    public function getNewsForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::NEWS_PER_PAGE:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::NEWS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY new_date DESC LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    }
    
    public function getNewsForPage2($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::NEWS_PER_PAGE2:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::NEWS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY new_date DESC LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    }
    
    public function getPagesCount2($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as news_count FROM '.self::NEWS_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['news_count']/self::NEWS_PER_PAGE2);
    }
    
    public function getPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as news_count FROM '.self::NEWS_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['news_count']/self::NEWS_PER_PAGE);
    }
    
    
    public function createNewItem($dateArray) {
        $data = array(
            'new_title'       => $dateArray['title'],
            'new_description' => $dateArray['description'],
        	'lang_id'         => $dateArray['lang_id'],
            'new_date' => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::NEWS_TABLE, $data);
        return $this -> db -> lastInsertId();
    }
    
    function uploadPicture($new_id){
        set_time_limit(120);
        require_once ('Uploader/class.upload.php');
        $path =  'images/news/';
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
                $Uploader->file_new_name_body = md5($new_id)."_small";
                $Uploader->image_x = 99;
                $Uploader->image_y = 99;
                //$Uploader->image_ratio_y = true;
                $Uploader->Process($path);
				if ($Uploader->processed) {
					$image_small =  md5($new_id)."_small";
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
                $Uploader->file_new_name_body = md5($new_id)."_middle";
                $Uploader->image_x = 100;
                $Uploader->image_y = 100;
                //$Uploader->image_ratio_y = true;
                $Uploader->Process($path);
				if ($Uploader->processed) {
					$image_middle =  md5($new_id)."_middle";
				}
            }
            
           $Uploader = new upload($_FILES['image']);
            if ($Uploader->uploaded) {
                $Uploader->file_overwrite = true;
                $Uploader->file_auto_rename = false;
                $Uploader->image_convert = 'jpg';
                $Uploader->mime_check = true;
                $Uploader->file_new_name_body = md5($new_id)."_original";
                $Uploader->Process($path);
				if ($Uploader->processed) {
					$image_original =  md5($new_id)."_original";
				}
            }

        }
        return md5($new_id);
    }
    
    public function modifyNew($id, $dateArray) {
    	//print_r($dateArray); die();
    	if(isset($dateArray['filename'])&&$dateArray['filename']!=""){
	        $data = array(
	            'new_title'       => $dateArray['title'],
	            'new_description' => $dateArray['description'],
	            'lang_id'         => $dateArray['lang_id'],
	            'new_image'       => $dateArray['filename']
	        );
    	} else {
	        $data = array(
	            'new_title'       => $dateArray['title'],
	            'new_description' => $dateArray['description'],
	            'lang_id'         => $dateArray['lang_id']
	        );
    	}
        $this -> db -> update(self::NEWS_TABLE, $data, 'new_id = '.$id);
        return true;
    }
    
    public function deleteNew($id) 
    {
        $this -> db -> delete(self::NEWS_TABLE, 'new_id = '.$id);
        @unlink("images/news/".md5($id)."_small.jpg");
        @unlink("images/news/".md5($id)."_middle.jpg");
        @unlink("images/news/".md5($id)."_original.jpg");
    }
    
    public function getLastNewId() 
    {
        $arr = $this -> db -> fetchRow('SELECT MAX(id) FROM '.self::NEWS_TABLE);
        return $arr['MAX(id)'];
    }
    
    public function getNewById($id) {
        $data =  $this -> db -> fetchRow('SELECT * FROM '.self::NEWS_TABLE.' WHERE new_id = ?', $id);
        return $data;
    }
    
    public function searchNewsByWord($lang_id, $search){
	   	$sql = 'SELECT * FROM '.self::NEWS_TABLE.' WHERE lang_id='.$lang_id.' AND MATCH(new_title, new_description) AGAINST("'.$search.'")';
		$data = $this -> db -> fetchAll($sql);
//		if(sizeof($data)==0){
//		   	$sql = 'SELECT * FROM '.self::NEWS_TABLE.' WHERE lang_id='.$lang_id.' AND new_title LIKE "'.$search.'" OR new_description LIKE "'.$search.'"';
//			$data = $this -> db -> fetchAll($sql);
//		}
		return $data;
    }
    

}
<?php

class PortfolioDb
{
    const PORTFOLIO_TABLE = 'portfolio';
    
    const PORTFOLIO_PER_PAGE = 8;
    
    const PORTFOLIO_PER_PAGE2 = 5;
    
    protected $db;
    
    
        
    public function __construct()
    {
        $this -> db = Zend_Registry::get('db');
    }
    
    public function getAllPortfolio() {
        return $this -> db -> fetchAll('SELECT * FROM '.self::PORTFOLIO_TABLE.' ORDER BY portfolio_date DESC');
    }
    
    public function getLast6Portfolio($lang_id, $limit = 6) {
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::PORTFOLIO_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY portfolio_date DESC LIMIT 0, '.$limit);
        return $data;
    }    
    
    public function getPortfolioForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::PORTFOLIO_PER_PAGE:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::PORTFOLIO_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY portfolio_date DESC LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    }
    
    public function getPortfolioForPage2($section_id, $category_id, $lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::PORTFOLIO_PER_PAGE2:$limit;
        $add_sql='';
        if($section_id!=0){
        	$add_sql=' AND section_id='.$section_id;
        	if($category_id!=0){
        		$add_sql .= ' AND category_id='.$category_id; 
        	}
        }
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::PORTFOLIO_TABLE.' WHERE lang_id='.$lang_id.$add_sql.' ORDER BY portfolio_date DESC LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    }
    
    public function getPortfolioForPage3($section_id, $category_id, $lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::PORTFOLIO_PER_PAGE:$limit;
        $add_sql='';
        if($section_id!=0){
        	$add_sql=' AND section_id='.$section_id;
        	if($category_id!=0){
        		$add_sql .= ' AND category_id='.$category_id; 
        	}
        }
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::PORTFOLIO_TABLE.' WHERE lang_id='.$lang_id.$add_sql.' ORDER BY portfolio_date DESC LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    }    
    
    public function getPagesCount2($section_id, $category_id, $lang_id) {
        $add_sql='';
        if($section_id!=0){
        	$add_sql=' AND section_id='.$section_id;
        	if($category_id!=0){
        		$add_sql .= ' AND category_id='.$category_id; 
        	}
        }    	
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::PORTFOLIO_TABLE.' WHERE lang_id='.$lang_id.$add_sql);
        return ceil($count['count']/self::PORTFOLIO_PER_PAGE2);
    }    
    
    public function getPortfolioBySecCat($section_id, $category_id, $lang_id) {
        $add_sql='';
        if($section_id!=0){
        	$add_sql=' AND section_id='.$section_id;
        	if($category_id!=0){
        		$add_sql .= ' AND category_id='.$category_id; 
        	}
        }
        return $this -> db -> fetchAll('SELECT * FROM '.self::PORTFOLIO_TABLE.' WHERE lang_id='.$lang_id.$add_sql.' ORDER BY portfolio_date DESC');
    }        
    
    
    public function getPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::PORTFOLIO_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::PORTFOLIO_PER_PAGE);
    }
    
    public function getNewPortfolioForPage($lang_id, $section, $category, $page_num, $limit = -1) {
        $limit = $limit == -1?self::PORTFOLIO_PER_PAGE:$limit;
        
        if($section==0){
        	$add_sql = " ";
        } else {
        	if($category==0){
        		$add_sql = " AND section_id=".$section;
        	} else {
        		$add_sql = " AND section_id=".$section." AND category_id=".$category;
        	}
        }
        
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::PORTFOLIO_TABLE.' WHERE lang_id='.$lang_id.$add_sql.' ORDER BY portfolio_date DESC LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    } 

    public function getNewPortfolioPagesCount($lang_id, $section, $category) {
        if($section==0){
        	$add_sql = " ";
        } else {
        	if($category==0){
        		$add_sql = " AND section_id=".$section;
        	} else {
        		$add_sql = " AND section_id=".$section." AND category_id=".$category;
        	}
        }    	
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::PORTFOLIO_TABLE.' WHERE lang_id='.$lang_id.$add_sql);
        return ceil($count['count']/self::PORTFOLIO_PER_PAGE);
    }
    
    
    public function createPortfolioItem($dateArray) {
        $data = array(
        	'section_id'            => $dateArray['section_id'],
        	'category_id'           => $dateArray['category_id'],
            'portfolio_title'       => $dateArray['title'],
            'portfolio_description' => $dateArray['description'],
        	'portfolio_link'        => $dateArray['link'],
        	'portfolio_date'        => new Zend_Db_Expr('NOW()'),
        	'lang_id'               => $dateArray['lang_id']
        );
        $this -> db ->insert(self::PORTFOLIO_TABLE, $data);
        return $this -> db -> lastInsertId();
    }
    
    function uploadPicture($portfolio_id){
        set_time_limit(120);
        require_once ('Uploader/class.upload.php');
        $path =  'images/portfolio/';
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
                $Uploader->file_new_name_body = md5($portfolio_id)."_small";
                $Uploader->image_x = 99;
                $Uploader->image_y = 99;
                //$Uploader->image_ratio_y = true;
                $Uploader->Process($path);
				if ($Uploader->processed) {
					$image_small =  md5($portfolio_id)."_small";
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
                $Uploader->file_new_name_body = md5($portfolio_id)."_middle";
                $Uploader->image_x = 280;
                $Uploader->image_y = 128;
                //$Uploader->image_ratio_y = true;
                $Uploader->Process($path);
				if ($Uploader->processed) {
					$image_middle =  md5($portfolio_id)."_middle";
				}
            }
            
           $Uploader = new upload($_FILES['image']);
            if ($Uploader->uploaded) {
                $Uploader->file_overwrite = true;
                $Uploader->file_auto_rename = false;
                $Uploader->image_convert = 'jpg';
                $Uploader->mime_check = true;
                $Uploader->file_new_name_body = md5($portfolio_id)."_original";
                $Uploader->Process($path);
				if ($Uploader->processed) {
					$image_original =  md5($portfolio_id)."_original";
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
                $Uploader->file_new_name_body = md5($portfolio_id)."_big";
                $Uploader->image_x = 880;
                $Uploader->image_y = 442;
                //$Uploader->image_ratio_y = true;
                $Uploader->Process($path);
				if ($Uploader->processed) {
					$image_middle =  md5($portfolio_id)."_big";
				}
            }

        }
        chmod("/".$path.md5($portfolio_id)."_small.jpg", 777);
        chmod("/".$path.md5($portfolio_id)."_middle.jpg", 777);
        chmod("/".$path.md5($portfolio_id)."_original.jpg", 777); 
        chmod("/".$path.md5($portfolio_id)."_big.jpg", 777);       
        return md5($portfolio_id);
    }
    
    public function modifyPortfolio($id, $dateArray) {
    	//print_r($dateArray); die();
    	if(isset($dateArray['filename'])&&$dateArray['filename']!=""){
	        $data = array(
	        	'section_id'            => $dateArray['section_id'],
	        	'category_id'           => $dateArray['category_id'],	        
	            'portfolio_title'       => $dateArray['title'],
	            'portfolio_description' => $dateArray['description'],
	        	'portfolio_link'        => $dateArray['link'],
	            'portfolio_image'       => $dateArray['filename'],
	        	'lang_id'               => $dateArray['lang_id']
	        );
    	} else {
	        $data = array(
	            'portfolio_title'       => $dateArray['title'],
	            'portfolio_description' => $dateArray['description'],
	        	'portfolio_link'        => $dateArray['link'],
	        	'lang_id'               => $dateArray['lang_id']
	        );
    	}
        $this -> db -> update(self::PORTFOLIO_TABLE, $data, 'portfolio_id = '.$id);
        return true;
    }
    
    public function deletePortfolio($id) 
    {
        $this -> db -> delete(self::PORTFOLIO_TABLE, 'portfolio_id = '.$id);
        @unlink("images/portfolio/".md5($id)."_small.jpg");
        @unlink("images/portfolio/".md5($id)."_middle.jpg");
        @unlink("images/portfolio/".md5($id)."_original.jpg");
        @unlink("images/portfolio/".md5($id)."_big.jpg");
    }
    
    public function getLastPortfolioId() 
    {
        $arr = $this -> db -> fetchRow('SELECT MAX(portfolio_id) FROM '.self::PORTFOLIO_TABLE);
        return $arr['MAX(portfolio_id)'];
    }
    
    public function getPortfolioById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::PORTFOLIO_TABLE.' WHERE portfolio_id = ?', $id);
    }
    

}
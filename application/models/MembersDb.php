<?php
Zend_Loader::loadClass('Zend_Feed_Rss');
Zend_Loader::loadClass('Zend_Feed_Exception');

class MemberDb
{
    const MEMBERS_TABLE = 'members';
    const MEMBERS_PER_PAGE = 20;
    
    protected $db;
        
    public function __construct()
    {
        $this -> db = Zend_Registry::get('db');
    }
    
    public function getMembersByStatusForPage($status = -1, $page_num, $membertype = -1, $limit = -1) {
        $limit = $limit == -1?self::MEMBERS_PER_PAGE:$limit;
        if($membertype==-1){
        	if($status==-1){
        		$addquery1 = ' ';
        	} else {
        		$addquery1 = ' ';
        	}
        } else {
        	if($status==-1){
        		$addquery2 = ' WHERE member_type='.$membertype.' ';
        	} else {
        		$addquery2 = ' AND member_type='.$membertype.' ';
        	}
        }
        
        if($status==-1){
        	if($membertype == -1){
        		$addquery1 = ' ';
        	} else {
        		$addquery1 = ' WHERE member_type='.$membertype.' ';
        	}
        	$query = 'SELECT * FROM '.self::MEMBERS_TABLE.$addquery1.' ORDER BY member_creation_date DESC LIMIT '.($page_num*$limit).', '.$limit;
        } else {
        	if($membertype == -1){
        		$addquery2 = ' ';
        	} else {
        		$addquery2 = ' AND member_type='.$membertype.' ';
        	}
        	$query = 'SELECT * FROM '.self::MEMBERS_TABLE.' WHERE member_active=' .$status.$addquery2.' ORDER BY member_creation_date DESC LIMIT '.($page_num*$limit).', '.$limit;
        }
        return $this -> db -> fetchAll($query);
    }
    
    public function getPagesCount($status = -1, $membertype = -1) {
        if($membertype==-1){
        	if($status==-1){
        		$addquery1 = ' ';
        	} else {
        		$addquery1 = ' ';
        	}
        } else {
        	if($status==-1){
        		$addquery2 = ' WHERE member_type='.$membertype.' ';
        	} else {
        		$addquery2 = ' AND member_type='.$membertype.' ';
        	}
        }
    	if($status==-1){
        	if($membertype == -1){
        		$addquery1 = ' ';
        	} else {
        		$addquery1 = ' WHERE member_type='.$membertype.' ';
        	}
    		$query = 'SELECT count(*) as members_count FROM '.self::MEMBERS_TABLE.$addquery1;
    	} else {
        	if($membertype == -1){
        		$addquery2 = ' ';
        	} else {
        		$addquery2 = ' AND member_type='.$membertype.' ';
        	}
    		$query = 'SELECT count(*) as members_count FROM '.self::MEMBERS_TABLE.' WHERE member_active='.$status.$addquery2;
    	}
        $count = $this -> db -> fetchRow($query);
        return ceil($count['members_count']/self::MEMBERS_PER_PAGE);
    }
    
	public function changeMemberActive( $member_id )
	{
		$sql = "UPDATE ".self::MEMBERS_TABLE." SET member_active = NOT member_active WHERE member_id=$member_id";
		$this -> db -> query( $sql );
	}
	
	
	
    
    public function getAllMembers() 
    {
        return $this -> db -> fetchAll('SELECT * FROM '.self::MEMBERS_PER_PAGE.' ORDER BY member_creation_date DESC');
    }
    
    public function getMembersForPage($page_num, $limit = -1) {
        $limit = $limit == -1?self::MEMBERS_PER_PAGE:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::MEMBERS_TABLE.' ORDER BY post_date DESC, id LIMIT '.($page_num*$limit).', '.$limit);
        for($i=0; $i<sizeof($data); $i++){
        	$tempImagesArr = explode(",",$data[$i]['images']);
        	if(sizeof($tempImagesArr)==0){
        		for($j=0; $j<5; $j++){
        			$currArr[$j] = "";
        		}
        		$data[$i]['images'] = $currArr;
        		$data[$i]['images_titles'] = $currArr;
        		
        	} else {
        		$data[$i]['images'] = $tempImagesArr;
        		$tempImagesTitlesArr = explode("|",$data[$i]['images_titles']);
        		$data[$i]['images_titles'] = $tempImagesTitlesArr;
        	}
        }
        return $data;
    }
    
    public function getMembersByMemberType($member_type=4) {
    	if($member_type!=-1){
    		$data =  $this -> db -> fetchAll('SELECT * FROM '.self::MEMBERS_TABLE.' WHERE member_type=? ORDER BY member_creation_date DESC', $member_type); 
    	} elseif ($member_type==-1){
    		$data =  $this -> db -> fetchAll('SELECT * FROM '.self::MEMBERS_TABLE.' WHERE member_type=1 OR member_type=4 ORDER BY member_creation_date DESC'); 
    	}
    	return $data;
        
    }
    
    public function getClients() {
        return $this -> db -> fetchAll('SELECT * FROM '.self::MEMBERS_TABLE.' WHERE member_type=? ORDER BY member_creation_date DESC', $member_type);
    }
 
    public function getMembersByDate($date) {
        return $this -> db -> fetchAll('SELECT * FROM '.self::MEMBERS_TABLE.' WHERE DATE_FORMAT(member_creation_date, \'%Y-%m-%d\') = ? ORDER BY member_creation_date DESC', $date);
    }
    
    public function getMemberById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::MEMBERS_TABLE.' WHERE member_id = ?', $id);
    }
    
    public function getPortfoliosForMonth($month, $year) {
    	return $this-> db -> fetchPairs('SELECT DATE_FORMAT(post_date, \'%d\') as date_day, id FROM '.self::MEMBERS_TABLE.' where post_date >= ? and post_date<=? GROUP BY date_day',array($year.'-'.$month.'-1', $year.'-'.$month.'-31'));
    }
    
    public function getLast3Portfolios() {
        return $this -> db -> fetchAll('SELECT P* FROM '.self::MEMBERS_TABLE.' ORDER BY project_date DESC LIMIT 0,3');
    }
    
    public function createPortfolioItem($title,$project_date,$public,$project_tags, $description) {
    	
		$arrdate = explode("/",$project_date);
    	$pr_date = date("Y-m-d", mktime(0, 0, 0, $arrdate[1], $arrdate[0], $arrdate[2]));
        $data = array(
            'title' => $title,
            'project_date' => $pr_date,
            'public' => (int)$public,
            'project_tags' => $project_tags,
            'post_date' => new Zend_Db_Expr('NOW()'),
            'description'=>$description

        );
        $this -> db ->insert(self::MEMBERS_TABLE, $data);
        return $this -> db -> lastInsertId();
    }
    
    public function modifyPortfolio($id, $title,$project_date,$public,$project_tags, $description) {
		$arrdate = explode("/",$project_date);
    	$pr_date = date("Y-m-d", mktime(0, 0, 0, $arrdate[1], $arrdate[0], $arrdate[2]));
        $data = array(
            'title' => $title,
            'project_date' => $pr_date,
            'public' => (int)$public,
            'project_tags' => $project_tags,
            'post_date' => new Zend_Db_Expr('NOW()'),
            'description'=>$description

        );
        $this -> db -> update(self::MEMBERS_TABLE, $data, 'id = '.$id);
        return true;
    }
    
    public function deleteMember($id) 
    {
        $this -> db -> delete(self::MEMBERS_TABLE, 'member_id = '.$id);
    }
    
    public function getLastPortfolioId() 
    {
        $arr = $this -> db -> fetchRow('SELECT MAX(id) FROM '.self::MEMBERS_TABLE);
        return $arr['MAX(id)'];
    }
    
    public function createDirectoryForPortfolio($id) 
    {
        @mkdir(ROOT."images/portfolios/".$id,0777);
    }
    
    public function saveUploadedPicturesToPortfolio($portfolio_id,$picture_name, $picture_title){
    	$data = $this -> db -> fetchRow('SELECT * FROM '.self::MEMBERS_TABLE.' WHERE id = ?', $portfolio_id);
    	//print_r($data);
    	//echo $data['title'];
    	
    	$pictures_str        = $data['images'];
    	$pictures_titles_str = $data['images_titles'];
    	
    	if(trim($picture_title)==""){
    		$picture_title = "default_picture";
    	}
    	
    	if($pictures_str==""){
    		$pictures_db        = $picture_name;
    		$pictures_titles_db = $picture_title;
    	} else {
    		$pictures_str .= ",".$picture_name;
    		$pictures_db = $pictures_str;
    		
    		$pictures_titles_str .= "|".$picture_title;
    		$pictures_titles_db = $pictures_titles_str;
    	}
    	
		$data = array('images'=>$pictures_db,'images_titles'=>$pictures_titles_db);
    	$this -> db -> update(self::MEMBERS_TABLE, $data, 'id = '.$portfolio_id);
    	return true;
    }
    
    public function loadPicturesToList($portfolio_id){
    	$data = $this -> db -> fetchRow('SELECT * FROM '.self::MEMBERS_TABLE.' WHERE id = ?', $portfolio_id);
    	$images_str = $data['images'];
    	$images_arr = explode(",",$images_str);
    	return $images_arr;
    }
    
    public function loadTitlesToList($portfolio_id){
    	$data = $this -> db -> fetchRow('SELECT * FROM '.self::MEMBERS_TABLE.' WHERE id = ?', $portfolio_id);
    	$images_titles_str = stripslashes($data['images_titles']);
    	$images_titles_arr = explode("|",$images_titles_str);
    	return $images_titles_arr;
    }
    
    public function UpdateImagesTitlesInPortfolio($ImgArr, $TitleArr){
    	
    }
    
    public function DelImagFromPortfolio($imgname,$portfolio_id){
    	$imagesArr = $this->loadPicturesToList($portfolio_id);
    	$titlesArr = $this->loadTitlesToList($portfolio_id);
    	
    	for($i=0;$i<sizeof($imagesArr); $i++){
    		if($imagesArr[$i]==$imgname){
    			@unlink("images/portfolios/".$portfolio_id."/".$imgname);
    			for($j=$i; $j<sizeof($imagesArr)-1; $j++){
    				$imagesArr[$j] = $imagesArr[$j+1];
    				$titlesArr[$j] = $titlesArr[$j+1];
    			}
    			unset($imagesArr[$j]);
    			unset($titlesArr[$j]);
    			break;
    		}
    	}

    	$imagesStr = implode(",",$imagesArr);
    	$titlesStr = implode("|",$titlesArr);
    	
    	 $data = array(
            'images' => $imagesStr,
            'images_titles'=>$titlesStr

        );
        $this -> db -> update(self::MEMBERS_TABLE, $data, 'id = '.$portfolio_id);
    }
    
    public function getMemberByFirsLastCardDigits($first, $last) {
    	$sql = 'SELECT * FROM '.self::MEMBERS_TABLE.' WHERE credit_card_number LIKE "'.$first.'%" AND credit_card_number LIKE "%'.$last.'" ORDER BY member_id DESC';
    	//echo $sql; die();
        return $this -> db -> fetchRow($sql);
    }
    
    public function getMembersByFirsLastCardDigits($name, $first, $last) {
    	$sql = 'SELECT * FROM '.self::MEMBERS_TABLE.' WHERE credit_card_number LIKE "'.$first.'%" AND credit_card_number LIKE "%'.$last.'" AND credit_card_name LIKE "%'.$name.'"  ORDER BY member_id DESC';
    	//echo $sql; die();
        return $this -> db -> fetchAll($sql);
    }
    
    
}
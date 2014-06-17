<?php

class ReviewsDb
{
	const TABLE_NAME = 'reviews';
	const USERS_TABLE = 'users';
	const ITEMS_PER_PAGE = 10;
    const ITEMS_PER_PAGE2 = 5;
	
    protected $db;
    
    public function __construct() {
        $this -> db = Zend_Registry::get('db');
    }
    
    public function getReviewsForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::ITEMS_PER_PAGE:$limit;
        
        $sql_str = 'SELECT '.self::TABLE_NAME.'.*, '.self::USERS_TABLE.'.first_name, '.self::USERS_TABLE.'.last_name
        			FROM '.self::TABLE_NAME.' 
        			LEFT JOIN '.self::USERS_TABLE.'
					ON '.self::TABLE_NAME.'.user_id='.self::USERS_TABLE.'.id
        			WHERE '.self::TABLE_NAME.'.lang_id='.$lang_id.' 
        			GROUP BY '.self::TABLE_NAME.'.id
        			ORDER BY post_date 
        			DESC LIMIT '.($page_num*$limit).', '.$limit;
        return $this -> db -> fetchAll($sql_str);
    }


    public function getPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::TABLE_NAME.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::ITEMS_PER_PAGE);
    }

    public function getReviewsForPage2($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::ITEMS_PER_PAGE2:$limit;

        $sql_str = 'SELECT '.self::TABLE_NAME.'.*, '.self::USERS_TABLE.'.first_name, '.self::USERS_TABLE.'.last_name
        			FROM '.self::TABLE_NAME.'
        			LEFT JOIN '.self::USERS_TABLE.'
					ON '.self::TABLE_NAME.'.user_id='.self::USERS_TABLE.'.id
        			WHERE '.self::TABLE_NAME.'.lang_id='.$lang_id.' AND '.self::TABLE_NAME.'.active=1
        			GROUP BY '.self::TABLE_NAME.'.id
        			ORDER BY post_date
        			DESC LIMIT '.($page_num*$limit).', '.$limit;
        return $this -> db -> fetchAll($sql_str);
    }

    public function getPagesCount2($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::TABLE_NAME.' WHERE lang_id='.$lang_id.' AND active=1');
        return ceil($count['count']/self::ITEMS_PER_PAGE2);
    }

    public function add($params) {
        $data = array(
            'text'       => $params['message'],
            'user_id'    => $params['user_id'],
            'lang_id'    => 1,
            'post_date'  => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::TABLE_NAME, $data);
        return $this -> db -> lastInsertId();
    }
    
    public function getItemById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::TABLE_NAME.' WHERE id = ?', $id);
    }
    
    public function getLastItem($lang_id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::TABLE_NAME.' WHERE active=1 AND lang_id=? ORDER BY post_date DESC LIMIT 0,1', $lang_id);
    }

    public function delete($id){
        $this -> db -> delete(self::TABLE_NAME, 'id = '.$id);
    }

    
    public function changeReviewStatus($id){
		$this -> db -> query('UPDATE '.self::TABLE_NAME .' SET `active` = NOT `active` WHERE id = ?', $id);
    }
}
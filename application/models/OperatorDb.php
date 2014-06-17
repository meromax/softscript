<?php

class OperatorDb
{
	const TABLE_NAME = 'admin_tbl';
	const ITEMS_PER_PAGE = 10;
	protected $db;
	
    public function __construct()
    {
        $this -> db = Zend_Registry::get('db');
    }
    	
    
    public function getOperatorsForPage($page_num, $limit = -1) {
        $limit = $limit == -1?self::ITEMS_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::TABLE_NAME.' WHERE status=0 ORDER BY name LIMIT '.($page_num*$limit).', '.$limit);
    }    
    
    public function getPagesCount() {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::TABLE_NAME.' WHERE status=0');
        return ceil($count['count']/self::ITEMS_PER_PAGE);
    } 
        
    /** Retrieve user data by user id
     * 
     * @param integer $id
     * @return array
     */
    public function getOperatorById($id)
    {
		return $this -> db -> fetchRow('SELECT * FROM '.self::TABLE_NAME.' WHERE id = ?', $id);    	
    }
    
    public function getOperatorDataByEmail($email)
    {
        return $this -> db -> fetchRow('SELECT * FROM '.self::TABLE_NAME.' WHERE email=?', $email);
    }

    public function changeOperatorStatus($id){
		$this -> db -> query('UPDATE '.self::TABLE_NAME .' SET `active` = NOT `active` WHERE id = ?', $id);
    }   
    
    public function delete($id){
        $this -> db -> delete(self::TABLE_NAME, 'id='.$id);
    } 

    public function addOperator($dateArray) {
    	$emailData = explode("@", $dateArray['email']);
        $data = array(
            'name'     => $dateArray['name'],
            'username' => $emailData[0],
            'email'    => $dateArray['email'],
			'pw'       => $dateArray['password']
        );
        $this -> db ->insert(self::TABLE_NAME, $data);
        return $this -> db -> lastInsertId();
    }
    
    public function modifyOperator($id, $dateArray) {
    	$emailData = explode("@", $dateArray['email']);
        $data = array(
            'name'     => $dateArray['name'],
            'username' => $emailData[0],
            'email'    => $dateArray['email'],
			'pw'       => $dateArray['password']
        );
        $this -> db -> update(self::TABLE_NAME, $data, 'id = '.$id);
    }
    
	public function validateEmail($email) {
		
		if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)){
			return 1;					
		} else {
			return 0;
		}
	}

}
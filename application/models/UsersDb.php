<?php

class UsersDb
{
	const USERS_TABLE = 'users';
	const ITEMS_PER_PAGE = 4;
	protected $db;
	
    public function __construct()
    {
        $this -> db = Zend_Registry::get('db');
    }
    	
    
    public function getUsersForPage($page_num, $limit = -1) {
        $limit = $limit == -1?self::ITEMS_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::USERS_TABLE.' ORDER BY first_name, last_name LIMIT '.($page_num*$limit).', '.$limit);
    }    
    
    public function getPagesCount() {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::USERS_TABLE);
        return ceil($count['count']/self::ITEMS_PER_PAGE);
    } 
        
    /** Retrieve user data by user id
     * 
     * @param integer $id
     * @return array
     */
    public function getUserById($id)
    {
		return $this -> db -> fetchRow('SELECT * FROM '.self::USERS_TABLE.' WHERE id = ?', $id);    	
    }
    
    public function getUserDataByEmail($email)
    {
        return $this -> db -> fetchRow('SELECT * FROM users WHERE email=?', $email);
    }

    public function changeUserStatus($id){
		$this -> db -> query('UPDATE '.self::USERS_TABLE .' SET `active` = NOT `active` WHERE id = ?', $id);
    }   
    
    public function delete($id){
        $this -> db -> delete(self::USERS_TABLE, 'id='.$id);
    }     

       
   /**
     * Check email for existance
     *
     * @param string $email
     * @return integer(0/1)
     */
    public function checkEmail($email)
    {
		$result = $this -> db -> fetchRow('SELECT * FROM '.self::USERS_TABLE.' WHERE email = ?', $email);    	

		if(!empty($result)) {
			return 1;
		} else {
			return 0;
		}
    }
    
    public function checkUserBlock($email)
    {
		$result = $this -> db -> fetchRow('SELECT * FROM '.self::USERS_TABLE.' WHERE email = ?', $email);    	

		if(!empty($result)&&$result['active']==1) {
			return 1;
		} else {
			return 0;
		}
    }    
    
    public function checkPasswordWithEmail($email, $password)
    {
		$result = $this -> db -> fetchRow('SELECT * FROM '.self::USERS_TABLE.' WHERE email = ? AND password=?', array($email, md5($password)));    	

		if(!empty($result)) {
			return 1;
		} else {
			return 0;
		}
    }    
    
	public function validateEmail($email) {
		
		if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)){
			return 1;					
		} else {
			return 0;
		}
	}
	
	
    
    
    
    /**
     * Check user email for existance
     *
     * @param string $email
     * @return integer(0/1)
     */
	public function checkEmail1($email)
    {
        $where = $this -> getAdapter() -> quoteInto('member_email = ?', $email);
        $result = $this -> fetchRow($where);
        
        if($result !== null) return 1;
        else return 0;
    }
    
    public function checkEmail2($email){
        $where = array('member_email = ?' => $email);
        $result = $this -> fetchRow($where);
        
        if($result !== NULL) return 1;
        else return 0;
    }
    
    public function changePasswordCheckEmail($email)
    {
        $where = array('member_email = ?'      => $email,
                       'member_confirmed_flag = ?' => 1);
        $result = $this -> fetchRow($where);
        
        if($result !== NULL) return $result -> toArray();
        else return 0;
    }
    
    public function changePasswordCheckPasswordChangeKey($key)
    {
    	
        $where = array('member_temp_password = ?'      => $key,
                       'member_confirmed_flag = ?'           => 1);
        $result = $this -> fetchRow($where);
        
        if($result !== NULL){
        	return $result -> toArray();
        } else{
        	return 0;
        }
    }
    
    public function removePasswordChangeKey($id)
    {
        $toInsert = array('temp_password' => NULL);
        $where = $this -> getAdapter() -> quoteInto('member_id = ?', $id);
        $this -> update($toInsert, $where);
    }
    
    public function updateUserPassword($id, $password)
    {
        $toInsert = array('member_password' => $password);
        $where = $this -> getAdapter() -> quoteInto('member_id = ?', $id);
        $this -> update($toInsert, $where);
    }
    
    public function simpleRegisterUser($dataArray)
    {
        $toInsert = array();
       	$toInsert['first_name']      = $dataArray['reg_name'];
        $toInsert['email']    = $dataArray['reg_email'];
        $toInsert['password'] = md5($dataArray['reg_password']);
        if(isset($dataArray['reg_phone'])&&$dataArray['reg_phone']!=''){
            $toInsert['phone']      = $dataArray['reg_phone'];
        }
        $toInsert['active']   = 1;
        $toInsert['creation_date'] = new Zend_Db_Expr('CURDATE()');
        $this -> db ->insert(self::USERS_TABLE, $toInsert);
        return $this -> db -> lastInsertId();        
    }

    public function updateProfile($dataArray, $userId)
    {
    	//print_r($dataArray); die();

        $toUpdate = array();
        $toUpdate['first_name'] = $dataArray['profile_name'];
        $toUpdate['phone']      = $dataArray['profile_phone'];

        if($dataArray['profile_current_password']!=""&&$dataArray['profile_new_password']!=""&&$dataArray['profile_new_re_password']!=""){
            $toUpdate['password'] = md5($dataArray['profile_new_password']);
        }

        $this -> db ->update(self::USERS_TABLE, $toUpdate, 'id='.$userId);
    }
    
    public function updateRegUserInfo($dataArray, $member_id)
    {
    	//print_r($dataArray); die();
    	
        $toInsert = array();
        $toInsert['member_firstname']     = $dataArray['member_firstname'];
        $toInsert['member_lastname']      = $dataArray['member_lastname'];
        $toInsert['member_email']         = $dataArray['member_email'];
        
        if($dataArray['member_re_password']!=""){
        	$toInsert['member_password']      = md5($dataArray['member_password']);
        }
        
        $toInsert['member_phone']         = $dataArray['member_phone'];
        
        $toInsert['member_address']       = $dataArray['shipping_address'];
        $toInsert['member_city']          = $dataArray['shipping_city'];
        $toInsert['member_country']       = $dataArray['shipping_country'];
        $toInsert['member_state']         = $dataArray['shipping_state'];
        $toInsert['member_zip']           = $dataArray['shipping_zip'];
        
        $toInsert['billing_address']       = $dataArray['billing_address'];
        $toInsert['billing_city']          = $dataArray['billing_city'];
        $toInsert['billing_country']       = $dataArray['billing_country'];
        $toInsert['billing_state']         = $dataArray['billing_state'];
        $toInsert['billing_zip']           = $dataArray['billing_zip'];
        
        $toInsert['credit_card_type']      = $dataArray['credit_card_type'];
        $toInsert['credit_card_name']      = $dataArray['credit_card_name'];
        $toInsert['credit_card_number']    = $dataArray['credit_card_number'];
        $toInsert['credit_card_code']      = $dataArray['credit_card_code'];
        $toInsert['credit_card_exp_month'] = $dataArray['credit_card_exp_month'];
        $toInsert['credit_card_exp_year']  = $dataArray['credit_card_exp_year'];
        
	    $where = $this -> getAdapter() -> quoteInto('member_id = ?', $member_id);
        $this -> update($toInsert, $where);
    }


    public function registerUser($dataArray)
    {
    	//print_r($dataArray); die();
        $toInsert = array();
        $toInsert['member_firstname']     = $dataArray['member_firstname'];
        $toInsert['member_lastname']      = $dataArray['member_lastname'];
        $toInsert['member_email']         = $dataArray['member_email'];
        $toInsert['member_password']      = md5($dataArray['member_password']);
        $toInsert['member_phone']         = $dataArray['member_phone'];
        
        $toInsert['member_address']       = $dataArray['shipping_address'];
        $toInsert['member_city']          = $dataArray['shipping_city'];
        $toInsert['member_country']       = $dataArray['shipping_country'];
        $toInsert['member_state']         = $dataArray['shipping_state'];
        $toInsert['member_zip']           = $dataArray['shipping_zip'];
        
        $toInsert['billing_address']       = $dataArray['billing_address'];
        $toInsert['billing_city']          = $dataArray['billing_city'];
        $toInsert['billing_country']       = $dataArray['billing_country'];
        $toInsert['billing_state']         = $dataArray['billing_state'];
        $toInsert['billing_zip']           = $dataArray['billing_zip'];
        
        $toInsert['credit_card_type']      = $dataArray['credit_card_type'];
        $toInsert['credit_card_name']      = $dataArray['credit_card_name'];
        $toInsert['credit_card_number']    = $dataArray['credit_card_number'];
        $toInsert['credit_card_code']      = $dataArray['credit_card_code'];
        $toInsert['credit_card_exp_month'] = $dataArray['credit_card_exp_month'];
        $toInsert['credit_card_exp_year']  = $dataArray['credit_card_exp_year'];
        
        
        
        
        //$toInsert['member_confirm_key']   = $dataArray['member_confirm_key'];
        $toInsert['member_active']        = 1;

        $toInsert['member_creation_date'] = new Zend_Db_Expr('CURDATE()');
        $this -> insert($toInsert);
        
		$result = $this -> getAdapter() -> query('SELECT max(member_id) AS member_id FROM members');
        $object = $result -> fetchObject();
        
        return $object->member_id;
    }
    
    public function registerUser2($dataArray, $member_type=0)
    {
    	//print_r($dataArray); die();
        $toInsert = array();
        $toInsert['member_firstname']    = $dataArray['member_firstname'];
        $toInsert['member_lastname']     = $dataArray['member_lastname'];
        $toInsert['member_company']      = $dataArray['member_company'];
        
        $toInsert['member_email']        = $dataArray['member_email'];
        $toInsert['member_password']     = md5($dataArray['member_password']);
        
        $toInsert['member_address']      = $dataArray['member_address'];
        $toInsert['member_city']         = $dataArray['member_city'];
        $toInsert['member_state']        = $dataArray['member_state'];
        $toInsert['member_zip']          = $dataArray['member_zip'];
        
        $toInsert['member_office']       = $dataArray['member_office'];
        $toInsert['member_cell']         = $dataArray['member_cell'];
        $toInsert['member_fax']          = $dataArray['member_fax'];
        
        $toInsert['member_type']            = $member_type;
        $toInsert['member_active']          = 1;
        $toInsert['member_creation_date'] = new Zend_Db_Expr('CURDATE()');
        $this -> insert($toInsert);
        return $this -> getAdapter() ->lastInsertId("members");
    }
    
    public function updateUser($dataArray, $member_type=0, $member_id)
    {
    	header('Content-type: text/html; charset=UTF-8');
    	//print_r($dataArray); die();
        $toInsert = array();
        $toInsert['member_firstname']    = $dataArray['member_firstname'];
        $toInsert['member_lastname']     = $dataArray['member_lastname'];
        $toInsert['member_company']      = $dataArray['member_company'];
        
        $toInsert['member_email']        = $dataArray['member_email'];
        
        $toInsert['member_password']     = md5($dataArray['member_password']);
        
        
        $toInsert['member_address']      = $dataArray['member_address'];
        $toInsert['member_city']         = $dataArray['member_city'];
        $toInsert['member_state']        = $dataArray['member_state'];
        $toInsert['member_zip']          = $dataArray['member_zip'];
        
        $toInsert['member_office']       = $dataArray['member_office'];
        $toInsert['member_cell']         = $dataArray['member_cell'];
        $toInsert['member_fax']          = $dataArray['member_fax'];
        
        $toInsert['member_type']          = $member_type;

        $where = $this -> getAdapter() -> quoteInto('member_id = ?', $member_id);
        $this -> update($toInsert, $where);
        
    }
    
    public function completeRegistrationIndividual($dataArray, $username)
    {
        $toInsert = array();
        $toInsert = $dataArray;
        $where = $this -> getAdapter() -> quoteInto('member_screenname = ?', $username);
        $this -> update($toInsert, $where);
    }
    
    public function updatePasswordChangeKey($key, $id)
    {
        $toInsert = array('member_temp_password' => $key);
        $where = $this -> getAdapter() -> quoteInto('member_id = ?', $id);
        $this -> update($toInsert, $where);        
    }
    
    public function completeRegistrationBusiness($dataArray, $screenname)
    {
        $toInsert = array();
        /** Adding input data to insertion array */
        $toInsert = $dataArray;
        $where = $this -> getAdapter() -> quoteInto('member_screenname = ?', $screenname);
        $this -> update($toInsert, $where);
    }
    
    public function updateUserInfo($dataArray, $id)
    {
        $toInsert = array();
        /** Adding input data to insertion array */
        $toInsert = $dataArray;
        $where = $this -> getAdapter() -> quoteInto('id = ?', $id);
        $this -> update($toInsert, $where);
    }
    
    public function activateUserProfileByCode($code)
    {
        $toInsert = array();
        $toInsert['member_confirm_flag'] = 1;
        $toInsert['member_confirm_key'] = "";
        $toInsert['member_active'] = 1;
        $where = $this -> getAdapter() -> quoteInto('member_confirm_key = ?', $code);
        if($this -> update($toInsert, $where)) return true;
        else                                   return false;
    }
    
    /** Retrieve user data by user id
     * 
     * @param string $username
     * @return object
     */
    public function getUserDataByUsername($email)
    {
        $result = $this -> getAdapter() -> query('SELECT * FROM users WHERE email=:email', array('email' => $email));
        $object = $result -> fetchObject();
        
        return $object;
    }
    
    /** Retrieve user data by user id
     * 
     * @param string $username
     * @return object
     */
    public function getUserIdByUsername($username_email)
    {
        $result = $this -> getAdapter() -> query('SELECT * FROM users WHERE member_email=:member_email', array('member_email' => $member_email));
        $object = $result -> fetchObject();

        return $object->member_id;
    }

    public function getUserByEmail($email)
    {
        return $this -> db -> fetchAll('SELECT * FROM users WHERE email=:user_email', array('user_email' => $email));
    }

    public function getUserByName($name)
    {
        return $this -> db -> fetchAll("SELECT * FROM users WHERE first_name LIKE '".$name."%'");
    }
    /**
     * Enter description here...
     *
     * @param unknown_type $code
     * @return unknown
     */
     public function deactivateUserProfile($id)
    {
        $toInsert = array();
        $toInsert['member_active'] = 'not_active';
        $where = $this -> getAdapter() -> quoteInto('member_id = ?', $id);
        if($this -> update($toInsert, $where)) return true;
        else                                   return false;
    }
    /** Retrieve all user data
     * 
     *  @return object
     */
    public function getAllUserData()
    {
        $result = $this -> getAdapter() -> query('SELECT * FROM members');
        $object = $result -> fetchAll();
        
        return $object;
    }
    
    
	function generatePassword($length = 8){
	  $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
	  $numChars = strlen($chars);
	  $string = '';
	  for ($i = 0; $i < $length; $i++) {
	    $string .= substr($chars, rand(1, $numChars) - 1, 1);
	  }
	  return $string;
	}
	
    public function updatePasswordByEmail($email, $password)
    {
        $password = md5($password);
    	$this -> db -> query("UPDATE ".self::USERS_TABLE." SET password='{$password}' WHERE email='{$email}'");
    }
    
	/**
	 * Get user secret question by email
	 *
	 * @param string $email
	 * @return string
	 */
	public function checkMemberQuestionByEmail($email)
    {
        $result = $this -> getAdapter() -> query('SELECT * FROM members WHERE member_email=:email', array('email' => $email));
        $object = $result -> fetchObject();
        if(isset($object)&&!empty($object)){
        	return 1;
        }
        else {
        	return 0;
        }
    }
    
    
}
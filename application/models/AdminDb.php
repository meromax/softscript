<?php

class Admin_tbl extends Zend_Db_Table_Abstract
{
	protected $_name = 'admin_tbl';
	
    /**
     * Check admin for existance
     *
     * @param string $username
     * @return integer(0/1)
     */
	public function checkAdminUsername($username)
    {   $result=null;
        $where = $this -> getAdapter() -> quoteInto('username = ?', $username);
        $result = $this -> fetchRow($where);
        
        if($result !== NULL) return 1;
        else return 0;
    }
    /**
     * Check admin 
     *
     * @param string $username
     * @return object($result)
     */
	public function checkAdminInfo($username)
    {   $result = null;
        $where = $this -> getAdapter() -> quoteInto('username = ?', $username);
        $result = $this -> fetchRow($where);
        
        return $result;
       
    }
    /** Retrieve update admin last_use
     * 
     * @param integer $id
     * 
     */
     public function updateAdminLastLogin($id)
    {
        $toInsert = array();
        
        /** Adding input data to insertion array */
        $toInsert['last_login']        = new Zend_Db_Expr('CURDATE()');
        $where = $this -> getAdapter() -> quoteInto('id = ?', $id);
        $this -> update($toInsert, $where);
    }
    /**
     * Check user email for existance
     *
     * @param string $email
     * @return integer(0/1)
     */
	public function checkEmail($email)
    {   $result=null;
        $where = $this -> getAdapter() -> quoteInto('email = ?', $email);
        $result = $this -> fetchRow($where);
        
        if($result !== null) return 1;
        else return 0;
    }
}
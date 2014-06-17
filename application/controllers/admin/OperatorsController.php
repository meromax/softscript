<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/OperatorsDb.php';


/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_OperatorsController extends System_Controller_AdminAction 
{
   
    private $operators;
    
    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess() || !AdminAreaControl::checkAdmin()){
        	$this -> _redirect('/admin');
        }
	
		$this -> operators = new OperatorsDb();
		
	}
    
    /**
     * Show list of a operators
     *
     */
    
    public function indexAction() {

		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> operators ->getPagesCount()<=1 ))
			||($this->_getParam('page')>1&&$this -> operators ->getPagesCount()<$this->_getParam('page'))
		){
			$this->_redirect("/admin/operators/index/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('operators', $this -> operators -> getOperatorsForPage($page));
       
        $this -> smarty -> assign('countpage', $this -> operators ->getPagesCount());
        $this -> smarty -> assign('page', $page+1);
        $this -> smarty -> assign('PageBody', 'admin/operators/list.tpl');
        $this -> smarty -> assign('Title', 'Operators List');
        $this -> smarty -> display('layouts/adminmain.tpl');
        
    }
    
    public function addAction() {
        $this -> smarty -> assign('action', 'add');
       
        if( !$this->_hasParam('step') ) {
        	$this -> smarty -> assign('State', '1');
            $this -> smarty -> assign('PageBody', 'admin/operators/add_modify.tpl');
            $this -> smarty -> assign('Title', 'Operators: Add Operator');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
            $this -> operators -> addOperator($dataArray);
            $this->_redirect('/admin/operators/index/page/1');
        }
    }
    
    public function modifyAction() {

        $this -> smarty -> assign('action', 'modify');
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('operator', $operator = $this -> operators -> getOperatorById($this -> _getParam('id')));
            $this -> smarty -> assign('PageBody', 'admin/operators/add_modify.tpl');
            $this -> smarty -> assign('Title', 'Modify Operator');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$this -> operators -> modifyOperator($this -> _getParam('id'), $dataArray);
            $this->_redirect('/admin/operators/index/page/1');
        }
    }    
    
    public function deleteAction() {
		if($this->_hasParam('id')){
			$this -> operators ->delete($this->_getParam('id'));
			$this -> _redirect( '/admin/operators/index/page/1');
		}
    }
    

    /**
     * Ajax method for changing operator status active/passive(1/0)
     *
     */
    public function changeOperatorStatusAction(){
		$this->operators->changeOperatorStatus($this->_getParam('id'));
		$user = $this->operators->getOperatorById($this->_getParam('id'));
		echo (int)$user['active'];  	
    }	
    
    /**
     * Ajax method for check data before add new operator
     *
     */
    public function checkBeforeAddAction(){
    	if($this->_hasParam('id')){
    		$id = $this->_getParam('id');
    	} else {
    		$id = 0; 
    	}
    	
    	if($this->_hasParam('name')&&$this->_getParam('name')==''){
    		$error = 1;
    	} elseif ($this->_hasParam('name')&&strlen($this->_getParam('name'))<3){
    		$error = 2;
    	} elseif ($this->_hasParam('email')&&$this->_getParam('email')==''){
    		$error = 3;
    	} elseif ($this->_hasParam('email')&&$this->operators->checkEmail($this->_getParam('email'), $id)){
    		$error = 4;
    	} elseif ($this->_hasParam('email')&&!$this->operators->validateEmail($this->_getParam('email'))){
    		$error = 5;
    	} elseif ($this->_hasParam('password')&&$this->_getParam('password')==''){
    		$error = 6;
    	} elseif ($this->_hasParam('password')&&strlen($this->_getParam('name'))<3){
    		$error = 7;
    	} else {
    		$error = 0;
    	}
    	
    	echo $error;
    }

    public function generatePasswordAction(){
    	echo $this->operators->generatePassword();
    }
    
}
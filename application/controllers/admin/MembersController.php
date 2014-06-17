<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/MembersDb.php';

include_once ROOT . 'application/models/UsersDb.php';


/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_MembersController extends System_Controller_AdminAction 
{
    private $members;
    
    private $UserDB;
    
    private $Errors = array();
    
   
    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()){
        	$this -> _redirect('/admin');
        }
		$this -> members = new MemberDb();
		
		$this -> UserDB = new Users();
		
	}
    
    /**
     * Show list of a members
     *
     */
    
    public function indexAction() {

		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> members ->getPagesCount()<=1 ))
			||($this->_getParam('page')>1&&$this -> members ->getPagesCount()<$this->_getParam('page'))
		){
			$this->_redirect("/admin/members/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('items', $this -> members -> getMembersForPage($page));
       
        $this -> smarty -> assign('countpage', $this -> members ->getPagesCount());
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/members/list.tpl');
        $this -> smarty -> assign('Title', 'Members List');
        $this -> smarty -> display('layouts/adminmain.tpl');
        
    }
    
    public function viewAction(){
     	$this -> smarty -> assign('item', $this->members->getMemberById($this->_getParam('id')));
        $this -> smarty -> assign('PageBody', 'admin/members/view.tpl');
        $this -> smarty -> assign('Title', 'Member View ');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function deleteAction() {
		if($this->_hasParam('id')){
			$this -> members ->deleteMember($this->_getParam('id'));
			$this -> _redirect( '/admin/members/page/1');
		}
    }
    
	public function changeActiveAction() {
		$member_id = $this -> _getParam('id');
		$this -> members -> changeMemberActive($member_id);
		$this -> _redirect( '/admin/members/page/1');
	}
	
	public function getfileAction(){
		//print_r($this->_getAllParams()); die();
		if($this->_hasParam('id2'))	{
			$id = $this->_getParam('id2');
			$filetype = "2";
		} elseif($this->_hasParam('id3')) {
			$id = $this->_getParam('id3');
			$filetype = "3";
		}
		
		$data  = $this -> part_quote ->getPartQuoteById($id);
		
		if($filetype=="2"){
			$fullpath = "/tmp/partquote_files/".$data['file2d'];
			$filename = $data['file2d'];
		} else {
			$fullpath = "/tmp/partquote_files/".$data['file3d'];
			$filename = $data['file3d'];
		}
		//print_r($filename);die();

//		$mm_type="application/octet-stream";
		
//		header("Cache-Control: public");
//		//header("Pragma: hack");
//		header("Content-Type: " . $mm_type);
//		header("Content-Length: " .(string)(filesize($fullpath)) );
//		header('Content-Disposition: attachment; filename="'.$filename.'"');
//		header("Content-Transfer-Encoding: binary\n");

//		header('Content-type: application/octet-stream');
//		header('Content-Disposition: attachment; filename="'.$filename.'"');
//		header("Content-Length: " .(string)(filesize($fullpath)) );
//		readfile($filename);
		
		$filename = $_SERVER['DOCUMENT_ROOT'] . $fullpath;
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header('Content-disposition: attachment; filename='.basename($filename));
		header("Content-Type: application/octet-stream");
		header("Content-Transfer-Encoding: binary");
		header('Content-Length: '. filesize($filename));
		readfile($filename);
	}
    
}
<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/ForumDb.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_ForumController extends System_Controller_AdminAction
{
    private $forum;
    private $content;

    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()){
         	$this -> _redirect('/admin');	
        } else {
	        $this -> forum = new ForumDb();
	        $this -> content = new ContentManagerDb();
        }

        $this -> smarty -> assign('adminTopMenu', 'forum');
        
    }    
    
    
    //***************************************************************************
    //*******************************  FORUM TOPIC ******************************
    //***************************************************************************        
    public function indexAction() {

		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> forum ->getForumTopicsPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> forum ->getForumTopicsPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/forum/index/page/1");
		}
		
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('sections', $this -> forum -> getForumTopicsForPage($this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> forum ->getForumTopicsPagesCount($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/forum/forum/items_list.tpl');
        $this -> smarty -> assign('Title', 'Forum Topics List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function addForumAction() {
        $this -> smarty -> assign('action', 'add-forum');
        
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('PageBody', 'admin/forum/forum/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Forum Manager: Add Forum');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $forum_id = $this -> forum -> addForum($dataArray);
            
//            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
//	         	$filename = $this -> File -> uploadPicture($section_id, ROOT."images/sections/", '577', '336', '_big');
//	            $this -> File -> uploadPicture($section_id, ROOT."images/sections/", '130', '76', '_small');
//
//	        	if($filename!=""){
//	        		$this -> sections -> updateImage($section_id, $filename);
//	        	}
//            }
            
            $this->_redirect('/admin/forum/index/page/1');
        }
    }
    
    public function modifyForumAction() {
        $this->checkForumForId();
        $this -> smarty -> assign('action', 'modify-forum');
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('item', $forum = $this -> forum -> getForumTopicById($this -> _getParam('id')));
            $this -> smarty -> assign('id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/forum/forum/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Modify Forum: '.$forum['title']);
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$dataArray['id'] = $this -> _getParam('id');
        	$this -> forum -> modifyForum($dataArray);
        	
//        	if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
//	         	$filename = $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/sections/", '577', '336', '_big');
//	            $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/sections/", '130', '76', '_small');
//	        	if($filename!=""){
//	        		$this -> sections -> updateImage($this -> _getParam('id'), $filename);
//	        	}
//        	}
        	     	
            $this->_redirect('/admin/forum/index/page/1');
        }
    }
    
    private function checkForumForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/forum/index/page/1');
        }
    }
    
    public function deleteForumAction() {
        $this->checkForumForId();
        $this -> forum -> deleteForum($this -> _getParam('id'));
        $this -> _redirect('/admin/forum/index/page/1');
    }

    public function changeForumActiveAction(){
        $this -> forum -> changeForumActive($this->_getParam('id'));
        $forumTopic = $this -> forum -> getForumTopicById($this->_getParam('id'));
        echo (int)$forumTopic['active'];
    }
    
    //***************************************************************************
    //*******************************  FORUM COMMENTS ***************************
    //***************************************************************************
    public function commentsAction() {

    	$forum_id      = $this->_getParam('forum_id');
    	$this -> smarty -> assign('forum_id', $forum_id);
    	$spage           = $this->_getParam('spage');
    	$this -> smarty -> assign('spage', $spage);
    	
    	$this -> smarty -> assign('forum', $this -> forum -> getForumTopicById($forum_id));
    	
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> forum ->getForumTopicCommentsPagesCount($forum_id, $this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> forum ->getForumTopicCommentsPagesCount($forum_id, $this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/forum/comments/forum_id/".$forum_id."/spage/".$spage."/page/1");

		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
		
        $this -> smarty -> assign('comments', $this -> forum -> getForumTopicCommentsForPage($forum_id, $this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> forum ->getForumTopicCommentsPagesCount($forum_id, $this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/forum/comments/items_list.tpl');
        $this -> smarty -> assign('Title', 'Forum Comments List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }

    public function changeCommentActiveAction(){
        $this -> forum -> changeCommentActive($this->_getParam('id'));
        $pr = $this -> forum -> getForumCommentById($this->_getParam('id'));
        echo (int)$pr['active'];
    }

    public function deleteCommentAction() {
        $forum_id      = $this->_getParam('forum_id');
        $comment_id      = $this->_getParam('comment_id');
        $spage           = $this->_getParam('spage');
        $this -> forum -> deleteComment($comment_id);
        $this->_redirect("/admin/forum/comments/forum_id/".$forum_id."/spage/".$spage."/page/1");
    }
    
    public function addAnswerAction() {
        $this -> smarty -> assign('action', 'add-answer');

    	$section_id      = $this->_getParam('section_id');
    	$this -> smarty -> assign('section_id', $section_id);
    	$spage           = $this->_getParam('spage');
    	$this -> smarty -> assign('spage', $spage);

    	$this -> smarty -> assign('section', $this->sections->getSectionById($section_id));

        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('PageBody', 'admin/forum/answers/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Categories Manager: Add Category');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $sub_section_id = $this -> sections -> createSubSection($dataArray);
            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
	         	$filename = $this -> File -> uploadPicture($sub_section_id, ROOT."images/categories/", '589', '442', '_big');
                $this -> File -> uploadPicture($sub_section_id, ROOT."images/categories/", '217', '160', '_middle');
	            $this -> File -> uploadPicture($sub_section_id, ROOT."images/categories/", '150', '113', '_small');
                $this -> File -> uploadPicture($sub_section_id, ROOT."images/categories/", '1000', '', '_original');
	        	if($filename!=""){
	        		$this -> sections -> updateImage2($sub_section_id, $filename);
	        	}
            }

            $this->_redirect("/admin/forum/answers/section_id/".$section_id."/spage/".$spage."/page/1");
        }
    }

    public function modifyAnswerAction() {
        $this->checkCategoryForId();
        $this -> smarty -> assign('action', 'modify-answer');

    	$section_id      = $this->_getParam('section_id');
    	$this -> smarty -> assign('section_id', $section_id);
    	$spage           = $this->_getParam('spage');
    	$this -> smarty -> assign('spage', $spage);

    	$this -> smarty -> assign('section', $this->sections->getSectionById($section_id));

        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('item', $category = $this -> sections -> getSubSectionById($this -> _getParam('id')));
            $this -> smarty -> assign('id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/forum/answers/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Modify Category: '.$category['title']);
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$dataArray['id'] = $this -> _getParam('id');
        	$dataArray['section_id'] = $section_id;
        	$this -> sections -> modifySubSection($dataArray);

        	if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
	         	$filename = $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/categories/", '589', '442', '_big');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/categories/", '217', '160', '_middle');
	            $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/categories/", '150', '113', '_small');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/categories/", '1000', '', '_original');
	        	if($filename!=""){
	        		$this -> sections -> updateImage2($this -> _getParam('id'), $filename);
	        	}
        	}

            $this->_redirect("/admin/sections/categories/section_id/".$section_id."/spage/".$spage."/page/1");
        }
    }

    private function checkCategoryForId() {
    	$section_id      = $this->_getParam('section_id');
    	$spage           = $this->_getParam('spage');

        if( !$this -> _hasParam('id') ) {
            $this->_redirect("/admin/forum/answers/section_id/".$section_id."/spage/".$spage."/page/1");
        }
    }

    public function deleteAnswerAction() {
        $this->checkSectionForId();
    	$section_id      = $this->_getParam('section_id');
    	$spage           = $this->_getParam('spage');
    	$content_page_id = $this->_getParam('content_page_id');
        $this -> sections -> deleteSubSection($this -> _getParam('id'));
        $this->_redirect("/admin/forum/answers/section_id/".$section_id."/spage/".$spage."/page/1");
    }
}
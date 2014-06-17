<?php
include_once ROOT . 'application/models/ForumDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Forum_IndexController extends System_Controller_Action {
    
	protected $forum;
    public function init() {
        parent::init();
        $this->forum = new ForumDb();
    }

    public function indexAction() {
        $this->smarty->assign('menuActive', 'forum');

        $this->_setParam('page',1);
        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->forum->getForumTopicsPagesCountFront($this->lang_id)<=1 ))
            ||($this->_getParam('page')>1&&$this->forum->getForumTopicsPagesCountFront($this->lang_id)<$this->_getParam('page'))
        ){

            $this->_redirect("/forum/page/1");
        }
        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $items = $this->forum->getForumTopicsForPageFront($this->lang_id, $page);

        $this->smarty->assign('lang_title',$_SESSION['lang_title']);
        $this->smarty->assign('items', $items);
        $this->smarty->assign('meta_title', 'Форум');
        $this->smarty->assign('meta_keywords', 'Форум');
        $this->smarty->assign('meta_description', 'Форум');

        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->forum->getForumTopicsPagesCountFront($this->lang_id));
        $this->smarty->assign('PageBody', 'forum/show_items.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function pageAction() {
        $this->smarty->assign('menuActive', 'forum');

        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->forum->getForumTopicsPagesCountFront($this->lang_id)<=1 ))
            ||($this->_getParam('page')>1&&$this->forum->getForumTopicsPagesCountFront($this->lang_id)<$this->_getParam('page'))
        ){

            $this->_redirect("/forum/page/1");
        }
        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $items = $this->forum->getForumTopicsForPageFront($this->lang_id, $page);

        $this->smarty->assign('lang_title',$_SESSION['lang_title']);
        $this->smarty->assign('items', $items);
        $this->smarty->assign('meta_title', 'Форум');
        $this->smarty->assign('meta_keywords', 'Форум');
        $this->smarty->assign('meta_description', 'Форум');

        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->forum->getForumTopicsPagesCountFront($this->lang_id));
        $this->smarty->assign('PageBody', 'forum/show_items.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }
    
    public function viewAction() {
        $this->smarty->assign('menuActive', 'forum');
    	$item = $this -> forum -> getForumTopicById($this->_getParam('id'));
        if($item['active']==0){
            $this -> _redirect('/forum.html');
        }
        $this->smarty->assign('item', $item);

        $answers = $this -> forum -> getForumAnswers($this->_getParam('id'));
        $this->smarty->assign('answers', $answers);

        $this->smarty->assign('meta_title', $item['meta_title']);
        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
        $this->smarty->assign('meta_description', $item['meta_description']);
        $this->smarty->assign('Title', $item['title']);
        $this->smarty->assign('PageBody', 'forum/show_item.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function addCommentAction(){
        if(isset($_SESSION['loginNamespace']['storage'])){
            $data = array();
            $data['description'] = strip_tags($this->_getParam('comment'));
            $data['user_id']     = $_SESSION['loginNamespace']['storage']->id;
            $data['username']    = $_SESSION['loginNamespace']['storage']->first_name;
            $data['forum_id']    = $this->_getParam('forum_id');
            if(strlen($data['description'])>500){
                echo 3;
            } else {
                $this -> forum -> addForumComment($data);
                echo 1;
            }
        } else {
            echo 2;
        }
    }
    
}
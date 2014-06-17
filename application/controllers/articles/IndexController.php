<?php
include_once ROOT . 'application/models/ArticlesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Articles_IndexController extends System_Controller_Action {
    
	protected $articles;
    public $sections;

    public function init() {
        parent::init();
        $this->articles = new ArticlesDb();
        $sections = $this->articles->getSectionsWithCategories($this->lang_id);
        $this->smarty->assign('sections', $sections);
        $this->smarty->assign('menuActive', 'articles');
    }

    public function pageAction() {

        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->articles->getPagesCount($this->lang_id)<=1 ))
            ||($this->_getParam('page')>1&&$this->articles->getPagesCount($this->lang_id)<$this->_getParam('page'))
        ){
            $this->_redirect("/articles/page/1");
        }
        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;

        $items = $this->articles->getArticlesForPage($this->lang_id, $page);
        $this->smarty->assign('articles', $items);
        $this->smarty->assign('articlesCount', sizeof($items));
        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->articles->getPagesCount($this->lang_id));
        $this->smarty->assign('pagingUrl', '/articles/page');

        $this->smarty->assign('title', 'Статьи');
        $this->smarty->assign('meta_title', 'Статьи');
        $this->smarty->assign('meta_keywords', 'Статьи');
        $this->smarty->assign('meta_description', 'Статьи');
        $this->smarty->assign('PageBody', 'articles/index.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function sectionAction() {

        $this->smarty->assign('currSection', $currSection = $this->articles->getSectionByLink($this->_getParam('link'), $this->lang_id));

        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->articles->getFrontPagesCount($this->lang_id, $currSection['id'])<=1 ))
            ||($this->_getParam('page')>1&&$this->articles->getFrontPagesCount($this->lang_id, $currSection['id'])<$this->_getParam('page'))
        ){
            $this->_redirect("/articles/section/".$currSection['link']."/page/1");
        }
        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;

        $items = $this->articles->getFrontArticlesForPage($this->lang_id, $page, $currSection['id']);
        $this->smarty->assign('articles', $items);
        $this->smarty->assign('articlesCount', sizeof($items));
        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->articles->getFrontPagesCount($this->lang_id, $currSection['id']));
        $this->smarty->assign('pagingUrl', '/articles/section/'.$currSection['link'].'/page');



        $this->smarty->assign('title', 'Статьи::'.stripslashes(strip_tags($currSection['title'])));
        $this->smarty->assign('meta_title', 'Статьи::'.stripslashes(strip_tags($currSection['meta_title'])));
        $this->smarty->assign('meta_keywords', 'Статьи::'.stripslashes(strip_tags($currSection['meta_keywords'])));
        $this->smarty->assign('meta_description', 'Статьи::'.stripslashes(strip_tags($currSection['meta_description'])));
        $this->smarty->assign('PageBody', 'articles/index.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

    public function categoryAction() {

        $this->smarty->assign('currCategory', $currCategory = $this->articles->getSubSectionByLink($this->_getParam('link'), $this->lang_id));
        $this->smarty->assign('currSection', $currSection = $this->articles->getSectionById($currCategory['section_id'], $this->lang_id));

        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->articles->getFrontPagesCount($this->lang_id, $currSection['id'], $currCategory['id'])<=1 ))
            ||($this->_getParam('page')>1&&$this->articles->getFrontPagesCount($this->lang_id, $currSection['id'], $currCategory['id'])<$this->_getParam('page'))
        ){
            $this->_redirect("/articles/category/".$currCategory['link']."/page/1");
        }
        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;

        $items = $this->articles->getFrontArticlesForPage($this->lang_id, $page, $currSection['id'], $currCategory['id']);
        $this->smarty->assign('articles', $items);
        $this->smarty->assign('articlesCount', sizeof($items));
        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->articles->getFrontPagesCount($this->lang_id, $currSection['id'], $currCategory['id']));
        $this->smarty->assign('pagingUrl', '/articles/category/'.$currCategory['link'].'/page');

        $this->smarty->assign('title', 'Статьи::'.stripslashes(strip_tags($currCategory['title'])));
        $this->smarty->assign('meta_title', 'Статьи::'.stripslashes(strip_tags($currCategory['meta_title'])));
        $this->smarty->assign('meta_keywords', 'Статьи::'.stripslashes(strip_tags($currCategory['meta_keywords'])));
        $this->smarty->assign('meta_description', 'Статьи::'.stripslashes(strip_tags($currCategory['meta_description'])));
        $this->smarty->assign('PageBody', 'articles/index.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }
    
    public function viewAction() {
        $this->smarty->assign('menuActive', 'articles');
    	$item = $this -> articles -> getArticleByLink($this->_getParam('link'));

        $this->smarty->assign('currCategory', $this->articles->getSubSectionById($item['category_id'], $this->lang_id));
        $this->smarty->assign('currSection', $this->articles->getSectionById($item['section_id'], $this->lang_id));

        $this->smarty->assign('item', $item);
        $this->smarty->assign('meta_title', $item['title']);
        $this->smarty->assign('meta_keywords', $item['title']);
        $this->smarty->assign('meta_description', $item['title']);
        $this->smarty->assign('PageBody', 'articles/view.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }

}
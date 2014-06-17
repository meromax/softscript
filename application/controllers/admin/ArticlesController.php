<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/ArticlesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_articlesController extends System_Controller_AdminAction 
{
    private $articles;

    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()) $this -> _redirect('/admin');
        
        $this->articles = new ArticlesDb();

        $this -> smarty -> assign('adminLeftMenu', 'content');
        $this -> smarty -> assign('adminLeftMenuSub', 'articles');
    }
    
    public function indexAction() {
    	
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> articles ->getPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> articles ->getPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			//$this->_redirect("/admin/news/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('articles', $this -> articles -> getArticlesForPage($this->lang_id, $page));
       
        $this -> smarty -> assign('countpage', $this -> articles ->getPagesCount($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/articles/list.tpl');
        $this -> smarty -> assign('Title', 'Articles List');
        $this -> smarty -> display('admin/index.tpl');
    }
    
    public function pageAction() {
		//print_r($this->_getAllParams()); die();
		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> articles ->getPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> articles ->getPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/articles/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('articles', $this -> articles -> getArticlesForPage($this->lang_id, $page));
       
        $this -> smarty -> assign('countpage', $this -> articles ->getPagesCount($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/articles/list.tpl');
        $this -> smarty -> assign('Title', 'Articles List');
        $this -> smarty -> display('admin/index.tpl');
    }
    
    public function addAction() {
        $this -> smarty -> assign('action', 'add');
        $this -> smarty -> assign('sections', $this -> articles -> getAllSections($this->lang_id));
        
        if( !$this->_hasParam('step') ) {
        	$this -> smarty -> assign('State', '1');
        	$this -> smarty -> assign('StateMsg','<br /><span style="color:red">Settings will be available after saving current product!</span>');
            $this -> smarty -> assign('PageBody', 'admin/articles/add_modify.tpl');
            $this -> smarty -> assign('Title', 'Articles Manager: Add Article');
            $this -> smarty -> display('admin/index.tpl');;
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $article_id = $this -> articles -> createArticleItem($dataArray);
       		$dataArray['lang_id'] = $this->lang_id;
       		$this -> articles -> modifyArticle($article_id, $dataArray);
            $this->_redirect('/admin/articles/page/0');
        }
    }
    
    public function modifyAction() {
        $this->checkForId();
        $this -> smarty -> assign('action', 'modify');
        $this -> smarty -> assign('sections', $this -> articles -> getAllSections($this->lang_id));
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('item', $article = $this -> articles -> getArticleById($this -> _getParam('article_id')));

            $this -> smarty -> assign('article_id', $this -> _getParam('article_id'));
            $this -> smarty -> assign('PageBody', 'admin/articles/add_modify.tpl');
            $this -> smarty -> assign('Title', 'Modify Article Item: '.$article['title']);
            $this -> smarty -> display('admin/index.tpl');
        } else {
        	$dataArray = $this->_getAllParams();

        	$dataArray['lang_id'] = $this->lang_id;
        	$this -> articles -> modifyArticle($this -> _getParam('article_id'), $dataArray);
            $this->_redirect('/admin/articles/page/0');
        }
    }
    
    private function checkForId() {
        //print_r($this->_getAllParams()); die();
        if( !$this -> _hasParam('article_id') ) {
            $this -> _redirect('/admin/articles/page/1');
        }
    }
    
    public function deleteAction() {
        $this->checkForId();
        $this -> articles -> deleteArticle($this -> _getParam('article_id'));
        $this -> _redirect('/admin/articles/page/1');
    }


    //***************************************************************************
    //*******************************  SECTIONS *********************************
    //***************************************************************************
    public function sectionsAction() {

        $this -> smarty -> assign('adminLeftMenuSub', 'articles_sections');

        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> articles ->getSectionsPagesCount($this->lang_id)<=1 ))
            ||($this->_getParam('page')>1&&$this -> articles ->getSectionsPagesCount($this->lang_id)<$this->_getParam('page'))
        ){
            $this->_redirect("/admin/articles/sections/page/1");
        }

        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('sections', $this -> articles -> getSectionsForPage($this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> articles ->getSectionsPagesCount($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/articles/sections/items_list.tpl');
        $this -> smarty -> assign('Title', 'Sections List');
        $this -> smarty -> display('admin/index.tpl');
    }

    public function addsectionAction() {
        $this -> smarty -> assign('adminLeftMenuSub', 'articles_sections');

        $this -> smarty -> assign('action', 'addsection');

        if( !$this->_hasParam('step') ) {

            $this -> smarty -> assign('PageBody', 'admin/articles/sections/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Sections Manager: Add Section');
            $this -> smarty -> display('admin/index.tpl');
        } else {
            $dataArray = $this->_getAllParams();
            $dataArray['lang_id'] = $this->lang_id;


            $section_id = $this -> articles -> createSection($dataArray);

            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($section_id, ROOT."images/articles/sections/", '393', '259', '_big');
                $this -> File -> uploadPicture($section_id, ROOT."images/articles/sections/", '288', '190', '_middle');
                $this -> File -> uploadPicture($section_id, ROOT."images/articles/sections/", '88', '58', '_small');
                $this -> File -> uploadPicture($section_id, ROOT."images/articles/sections/", '96', '96', '_square');
                $this -> File -> uploadPicture($section_id, ROOT."images/articles/sections/", '800', '527', '_large');

                if($filename!=""){
                    $this -> articles -> updateImage($section_id, $filename);
                }
            }

            $this->_redirect('/admin/articles/sections/page/1');
        }
    }

    public function modifysectionAction() {
        $this -> smarty -> assign('adminLeftMenuSub', 'articles_sections');

        $this->checkSectionForId();
        $this -> smarty -> assign('action', 'modifysection');
        if( !$this->_hasParam('step') ) {

            $this -> smarty -> assign('item', $section = $this -> articles -> getSectionById($this -> _getParam('id')));
            $this -> smarty -> assign('id', $this -> _getParam('id'));

            $this -> smarty -> assign('PageBody', 'admin/articles/sections/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Modify Section: '.$section['title']);
            $this -> smarty -> display('admin/index.tpl');
        } else {
            $dataArray = $this->_getAllParams();
            $dataArray['lang_id'] = $this->lang_id;
            $dataArray['id'] = $this -> _getParam('id');


            $this -> articles -> modifySection($dataArray);

            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/articles/sections/", '393', '259', '_big');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/articles/sections/", '288', '190', '_middle');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/articles/sections/", '88', '58', '_small');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/articles/sections/", '96', '96', '_square');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/articles/sections/", '800', '527', '_large');
                if($filename!=""){
                    $this -> articles -> updateImage($this -> _getParam('id'), $filename);
                }
            }

            $this->_redirect('/admin/articles/sections/page/1');
        }
    }

    private function checkSectionForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/articles/sections/page/1');
        }
    }

    public function deletesectionAction() {
        $this->checkSectionForId();
        $this -> articles -> deleteSection($this -> _getParam('id'));
        $this -> _redirect('/admin/articles/sections/page/1');
    }

    //***************************************************************************
    //*******************************  CATEGORIES *******************************
    //***************************************************************************
    public function categoriesAction() {
        $this -> smarty -> assign('adminLeftMenuSub', 'articles_sections');

        $section_id      = $this->_getParam('section_id');
        $this -> smarty -> assign('section_id', $section_id);
        $spage           = $this->_getParam('spage');
        $this -> smarty -> assign('spage', $spage);

        $this -> smarty -> assign('section', $this->articles->getSectionById($section_id));

        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> articles ->getSubSectionsPagesCount($section_id, $this->lang_id)<=1 ))
            ||($this->_getParam('page')>1&&$this -> articles ->getSubSectionsPagesCount($section_id, $this->lang_id)<$this->_getParam('page'))
        ){
            $this->_redirect("/admin/articles/categories/section_id/".$section_id."/spage/".$spage."/page/1");
        }
        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;

        $this -> smarty -> assign('categories', $this -> articles -> getSubSectionsForPage($section_id, $this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> articles ->getSubSectionsPagesCount($section_id, $this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/articles/categories/items_list.tpl');
        $this -> smarty -> assign('Title', 'Categories List');
        $this -> smarty -> display('admin/index.tpl');
    }

    public function addcategoryAction() {
        $this -> smarty -> assign('adminLeftMenuSub', 'articles_sections');

        $this -> smarty -> assign('action', 'addcategory');

        $section_id      = $this->_getParam('section_id');
        $this -> smarty -> assign('section_id', $section_id);
        $spage           = $this->_getParam('spage');
        $this -> smarty -> assign('spage', $spage);

        $this -> smarty -> assign('section', $this->articles->getSectionById($section_id));

        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('PageBody', 'admin/articles/categories/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Categories Manager: Add Category');
            $this -> smarty -> display('admin/index.tpl');
        } else {
            $dataArray = $this->_getAllParams();
            $dataArray['lang_id'] = $this->lang_id;
            $sub_section_id = $this -> articles -> createSubSection($dataArray);
            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($sub_section_id, ROOT."images/articles/categories/", '393', '259', '_big');
                $this -> File -> uploadPicture($sub_section_id, ROOT."images/articles/categories/", '288', '190', '_middle');
                $this -> File -> uploadPicture($sub_section_id, ROOT."images/articles/categories/", '88', '58', '_small');
                $this -> File -> uploadPicture($sub_section_id, ROOT."images/articles/categories/", '96', '96', '_square');
                $this -> File -> uploadPicture($sub_section_id, ROOT."images/articles/categories/", '800', '527', '_large');

                if($filename!=""){
                    $this -> articles -> updateImage2($sub_section_id, $filename);
                }
            }

            $this->_redirect("/admin/articles/categories/section_id/".$section_id."/spage/".$spage."/page/1");
        }
    }

    public function modifycategoryAction() {
        $this -> smarty -> assign('adminLeftMenuSub', 'articles_sections');
        $this->checkCategoryForId();
        $this -> smarty -> assign('action', 'modifycategory');

        $section_id      = $this->_getParam('section_id');
        $this -> smarty -> assign('section_id', $section_id);
        $spage           = $this->_getParam('spage');
        $this -> smarty -> assign('spage', $spage);

        $this -> smarty -> assign('section', $this->articles->getSectionById($section_id));

        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('item', $category = $this -> articles -> getSubSectionById($this -> _getParam('id')));
            $this -> smarty -> assign('id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/articles/categories/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Modify Category: '.$category['title']);
            $this -> smarty -> display('admin/index.tpl');
        } else {
            $dataArray = $this->_getAllParams();
            $dataArray['lang_id'] = $this->lang_id;
            $dataArray['id'] = $this -> _getParam('id');
            $dataArray['section_id'] = $section_id;
            $this -> articles -> modifySubSection($dataArray);

            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/articles/categories/", '393', '259', '_big');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/articles/categories/", '288', '190', '_middle');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/articles/categories/", '88', '58', '_small');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/articles/categories/", '96', '96', '_square');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/articles/categories/", '800', '527', '_large');

                if($filename!=""){
                    $this -> articles -> updateImage2($this -> _getParam('id'), $filename);
                }
            }

            $this->_redirect("/admin/articles/categories/section_id/".$section_id."/spage/".$spage."/page/1");
        }
    }

    private function checkCategoryForId() {
        $section_id      = $this->_getParam('section_id');
        $spage           = $this->_getParam('spage');

        if( !$this -> _hasParam('id') ) {
            $this->_redirect("/admin/articles/categories/section_id/".$section_id."/spage/".$spage."/page/1");
        }
    }

    public function deletecategoryAction() {
        $this->checkSectionForId();
        $section_id      = $this->_getParam('section_id');
        $spage           = $this->_getParam('spage');
        $content_page_id = $this->_getParam('content_page_id');
        $this -> articles -> deleteSubSection($this -> _getParam('id'));
        $this->_redirect("/admin/articles/categories/section_id/".$section_id."/spage/".$spage."/page/1");
    }

    public function getcategoriesAction(){
        $section_id = $this->_getParam('section_id');
        $cat_selected_id = $this->_getParam('cat_selected_id');
        $categories = $this->articles->getAllSubSections($section_id, $this->lang_id);
        $out = '<option value="0"> --------------- </option>';
        for($i=0; $i<sizeof($categories); $i++){
            if($categories[$i]['id']==$cat_selected_id){
                $out .= '<option value="'.$categories[$i]['id'].'" selected>'.stripslashes(strip_tags($categories[$i]['title'])).'</option>';
            } else {
                $out .= '<option value="'.$categories[$i]['id'].'">'.stripslashes(strip_tags($categories[$i]['title'])).'</option>';
            }

        }
        ob_clean();
        echo $out;

    }

    public function ajaxGetCategoriesAction(){
        $sectionId = $this->_getParam('section_id');
        $categoryId = $this->_getParam('category_id');

        $categories = $this->articles->getAllSubSections($sectionId, $this->lang_id);
        ob_start();
        $out_str  = '<select id="category" name="category" class="input">';
        if($categoryId==0){
            $out_str .= '<option value="0" selected="selected"> ------------------- </option>';
        } else {
            $out_str .= '<option value="0"> ------------------- </option>';
        }

        for($i=0; $i<sizeof($categories); $i++){
            if($categoryId==$categories[$i]['id']){
                $out_str .= '<option value="'.$categories[$i]['id'].'" selected="selected">'.stripslashes($categories[$i]['title']).'</option>';
            } else {
                $out_str .= '<option value="'.$categories[$i]['id'].'">'.stripslashes($categories[$i]['title']).'</option>';
            }
        }
        $out_str .= '</select>';
        ob_clean();
        echo $out_str;

    }

  
}
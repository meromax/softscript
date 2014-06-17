<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/PortfolioDb.php';

include_once ROOT . 'application/models/SectionsDb.php';

include_once ROOT . 'application/models/FilesDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_PortfolioController extends System_Controller_AdminAction 
{
    private $portfolio;
    private $sections; 
    private $file;        

    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()) $this -> _redirect('/admin');
        
        $this->portfolio = new PortfolioDb();
		$this->sections = new SectionsDb();    
		$this->file = new FilesDb();		    
    }
    
    public function indexAction() {
    	
		$section_id = $this->_getParam('section_id');
		$this -> smarty -> assign('sel_section_id', $section_id);    	
		
		$category_id = $this->_getParam('category_id');
		$this -> smarty -> assign('sel_category_id', $category_id); 		

		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> portfolio ->getPagesCount2($section_id, $category_id, $this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> portfolio ->getPagesCount2($section_id, $category_id, $this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/portfolio/index/page/1/section_id/0/category_id/0");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
		
		$this -> smarty -> assign('sections', $this -> sections->getAllSections($this->lang_id));
		$this -> smarty -> assign('categories', $this -> sections->getAllSubSections($section_id, $this->lang_id));
		
		$portfolioData = $this -> portfolio -> getPortfolioForPage2($section_id, $category_id, $this->lang_id, $page);

        $this -> smarty -> assign('portfolio', $portfolioData);
       
        $this -> smarty -> assign('countpage', $this -> portfolio ->getPagesCount2($section_id, $category_id, $this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/portfolio/items.tpl');
        $this -> smarty -> assign('Title', 'Portfolio List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }    
    
    public function pageAction() {

		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> portfolio ->getPagesCount2($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> portfolio ->getPagesCount2($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/portfolio/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('portfolio', $this -> portfolio -> getPortfolioForPage2($this->lang_id, $page));
       
        $this -> smarty -> assign('countpage', $this -> portfolio ->getPagesCount2($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/portfolio/items.tpl');
        $this -> smarty -> assign('Title', 'Portfolio List');
        $this -> smarty -> display('layouts/adminmain.tpl');
    }
    
    public function addPortfolioAction() {
        $this -> smarty -> assign('action', 'addportfolio');
        
		$section_id = $this->_getParam('section_id');
		$this -> smarty -> assign('sel_section_id', $section_id);    	
		
		$category_id = $this->_getParam('category_id');
		$this -> smarty -> assign('sel_category_id', $category_id);        
        
		$this -> smarty -> assign('sections', $this -> sections->getAllSections($this->lang_id));        
        
        if( !$this->_hasParam('step') ) {
        	$this -> smarty -> assign('State', '1');
        	$this -> smarty -> assign('StateMsg','<br /><span style="color:red">Settings will be available after saving current product!</span>');
            $this -> smarty -> assign('PageBody', 'admin/portfolio/add_modify_portfolio.tpl');
            $this -> smarty -> assign('Title', 'Articles Manager: Add Article');
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
            $portfolio_id = $this -> portfolio -> createPortfolioItem($dataArray);
        	$filename = $this -> portfolio -> uploadPicture($portfolio_id);
        	if($filename!=""){
        		$dataArray['filename'] = $filename;
        		$dataArray['lang_id'] = $this->lang_id;
        		$this -> portfolio -> modifyPortfolio($portfolio_id, $dataArray);
        	}
            $this->_redirect('/admin/portfolio/index/page/1/section_id/0/category_id/0');
        }
    }
    
    public function modifyPortfolioAction() {
        $this->checkForId();
        $this -> smarty -> assign('action', 'modifyportfolio');
        
		$section_id = $this->_getParam('section_id');
		$this -> smarty -> assign('sel_section_id', $section_id);    	
		
		$category_id = $this->_getParam('category_id');
		$this -> smarty -> assign('sel_category_id', $category_id);        
        
		$this -> smarty -> assign('sections', $this -> sections->getAllSections($this->lang_id));        
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('portfolio', $portfolio = $this -> portfolio -> getPortfolioById($this -> _getParam('portfolio_id')));
            $this -> smarty -> assign('portfolio_id', $this -> _getParam('portfolio_id'));
            $this -> smarty -> assign('PageBody', 'admin/portfolio/add_modify_portfolio.tpl');
            $this -> smarty -> assign('Title', 'Modify Portfolio Item: '.$portfolio['portfolio_title']);
            $this -> smarty -> display('layouts/adminmain.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
        	$dataArray['lang_id'] = $this->lang_id;
        	$filename = $this -> portfolio -> uploadPicture($this -> _getParam('portfolio_id'));
        	if($filename!=""){
        		$dataArray['filename'] = $filename;
        	}
        	$this -> portfolio -> modifyPortfolio($this -> _getParam('portfolio_id'), $dataArray);
            $this->_redirect('/admin/portfolio/index/page/1/section_id/0/category_id/0');
        }
    }
    
    private function checkForId() {
        if( !$this -> _hasParam('portfolio_id') ) {
            $this->_redirect('/admin/portfolio/index/page/1/section_id/0/category_id/0');
        }
    }
    
    public function deleteAction() {
        $this->checkForId();
        $this -> portfolio -> deletePortfolio($this -> _getParam('portfolio_id'));
        $this->_redirect('/admin/portfolio/index/page/1/section_id/0/category_id/0');
    }
  
}
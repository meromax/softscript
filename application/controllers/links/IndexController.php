<?php
include_once ROOT . 'application/models/LinksDb.php';
include_once ROOT . 'application/models/ContentManagerDb.php';
include_once ROOT . 'application/models/CountryDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Links_IndexController extends System_Controller_Action {
    
	protected $links;
	protected $content;
    protected $country;
    public function init() {
        parent::init();
        $this->links = new LinksDb();
        $this->content = new ContentManagerDb();
        $this->country = new CountryDb();
    }
    
    public function viewlinksAction() {

		$this->smarty->assign('current_menu', 'catalog');
		
    	if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this-> links -> getLinksItemsPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this-> links -> getLinksItemsPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/view_links1.html");
		}
    	$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
    	
    	
		
    	$items = $this->links->getLinksItemsForPage($this->lang_id, $page);
    	
    	$this->smarty->assign('items', $items);
        $this->smarty->assign('Title', 'Links');
        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->links->getLinksItemsPagesCount($this->lang_id));
        $this->smarty->assign('PageBody', 'links/show_items.tpl');
        $this->smarty->display('layouts/main.tpl');
    }
    
    public function viewAction() {
    	$this->smarty->assign('current_menu', 'catalog');
    	$this->smarty->assign('links_link', 'active');
    	$item = $this -> links -> getLinksItemById($this->_getParam('link_id'));
        $this->smarty->assign('item', $item);
        $this->smarty->assign('Title', $item['title']);
        $this->smarty->assign('PageBody', 'links/show_item.tpl');
        $this->smarty->display('layouts/main.tpl');
    }
    
    public function pageAction() {
		$this->smarty->assign('article_link', 'active');
		if($this->_hasParam('page')){
			if($this->_getParam('page')==0){
				$page=1;
			} else {
				$page=$this->_getParam('page');
			}
			
			if($this->_getParam('page')>$this->Links->getPagesCount()){
				$this->_redirect('/article/page/1');
			}
		}

    	$items = $this->Links->getLinksForPage($page-1);
    	
    	$this->smarty->assign('items', $items);
        $this->smarty->assign('Title', 'Links');
        $this->smarty->assign('page_num', $page);
        $this->smarty->assign('page_count', $this->Links->getPagesCount());
        $this->smarty->assign('PageBody', 'links/show_items.tpl');
        $this->smarty->display('layouts/main.tpl');
    }
    
    public function linksAction(){
    	$this->smarty->assign('item', $this->content->getPageByLink('links.html',$this->lang_id));
        $this->smarty->assign('Title', 'Links');
        $this->smarty->assign('PageBody', 'links/page.tpl');
        $this->smarty->display('layouts/main.tpl');
    }

    public function parseAction(){
//        header('Content-Type: text/html; charset=windows-1251');
//        $handle = fopen ("images/countries/countries.txt", "r");
//        while (!feof ($handle)) {
//            $buffer = fgets($handle, 4096);
//            $bufferNew = explode("|", $buffer);
//            $dataArray = array();
//            $dataArray['title'] = $bufferNew[2];
//            $dataArray['cod2']  = $bufferNew[1];
//            $dataArray['cod3']  = $bufferNew[0];
//            //file_put_contents("images/countries/".$bufferNew[0].".jpg", file_get_contents("http://flags.ehf.eu/1/3d/".$bufferNew[0].".jpg"));
//            //file_put_contents("images/countries/".$bufferNew[0].".jpg", file_get_contents("http://www.skdps.com/calendar/flags/".$bufferNew[0].".gif"));
//            file_put_contents("images/countries/".$bufferNew[0].".png", file_get_contents("http://progetti.arstecnica.it/sol/export/225/sol/sol/public/images/flags/".$bufferNew[0].".png"));
//
//            //$this->country->addItem($dataArray);
//            //http://progetti.arstecnica.it/sol/export/225/sol/sol/public/images/flags/ANT.png
//            echo $buffer;
//        }
//        fclose ($handle);
        //$this->country->addItem();
    }
}
<?php

Zend_Loader::loadClass('Zend_Controller_Action');
/** Load database object model */
include_once ROOT . 'application/models/AdminAuthModel.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

include_once ROOT . 'application/models/LangDb.php';

class System_Controller_AdminAction extends Zend_Controller_Action
{
    protected $db;

    protected $smarty;

    public $auth;

    public $request;
    
    public $Content;
    
    public $lang_id;
    
    public $lang;

    public function init()
    {
        $this -> db = Zend_Registry::get('db');
        Zend_Db_Table_Abstract::setDefaultAdapter($this -> db);
        $this -> smarty = Zend_Registry::get('smarty');
        $this -> request = $this -> getRequest();
        $this -> auth = new AuthAdmin();
        $this -> lang = new LangDb();

        $this -> smarty -> assign('site_url', SITE_URL);

        if($this -> auth -> CheckAuth()) {
            $this -> smarty -> assign('loginAdmin', true);
            $this -> smarty -> assign('loginAdminInfo',$_SESSION['loginAdmin']['storage']);
        } else {
            $this -> smarty -> assign('loginAdmin', false);
        }
        
        $this->smarty->assign('imgDir','/images/admin');
        $this -> Content = new ContentManagerDb();
        
        $this->Content->setCharset();
        
        $this -> smarty -> assign('languages', $this->Content->getLanguages());
        
   		//*****************************************************************************
		//******************************* Language ************************************
		//*****************************************************************************
		if($this->_hasParam('admin_lang')){
			$currLang = $this->lang->getLangById($this->_getParam('admin_lang'));
			$_SESSION['admin_lang'] = $currLang['lang_id'];
		} else {
			if(!isset($_SESSION['admin_lang'])){
				$_SESSION['admin_lang'] = 1;
			}
		}
		
		$this->lang_id = $_SESSION['admin_lang'];

		$this -> smarty -> assign('admin_lang_id', $_SESSION['admin_lang']);
		$this -> smarty -> assign('request_uri', $_SERVER['REQUEST_URI']);
		
		$this->smarty->assign('activeLanguage', $this->lang->getLangById($_SESSION['admin_lang']));

		if($_SESSION['admin_lang']==1){
			$cur_admin_lang = $this->Content->getLanguageById(2);
			$cur_active_admin_lang = $this->Content->getLanguageById(1);
			$this -> smarty -> assign('cur_active_admin_lang', $cur_active_admin_lang);
			$this -> smarty -> assign('cur_admin_lang', $cur_admin_lang);
			$this -> smarty -> assign('admin_lang_info', $this->Content->getLanguageById(2));
		} else {
			$cur_admin_lang = $this->Content->getLanguageById(1);
			$cur_active_admin_lang = $this->Content->getLanguageById(2);
			$this -> smarty -> assign('cur_active_admin_lang', $cur_active_admin_lang);
			$this -> smarty -> assign('cur_admin_lang', $cur_admin_lang);
			$this -> smarty -> assign('admin_lang_info', $this->Content->getLanguageById(1));
		}
		
		$this -> smarty -> assign('lang_short_title', "ru");
		$this -> smarty -> assign('adminLangParams', $this->lang->getAdminLangParams("ru"));		

		
		
		
    }

    public function getInstance()
    {
        return $this;
    }

    public function debug($data, $title = '')
    {
        if(!empty($title))
        $title = '<b style="color: red;">' . $title . '</b>';
        Zend_Debug::dump($data, $title);
    }

}

?>
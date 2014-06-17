<?php

class LangDb
{
    const LANGUAGES_TABLE = 'languages';
    const LANGUAGES_PER_PAGE  = 10;	
    
	const TRANSLATIONS_DIRECTION_PRICE_TABLE = 'translations_direction_price';
    
    protected $db;
    
    public function __construct() {
        $this -> db = Zend_Registry::get('db');
    }
    
    function getAdminLangParams($lang_name){
    	
		$file_array = file(ROOT."languages/".$lang_name."/backand.ini");

		while ( list( $line_num, $line ) = each($file_array )):
			if($line[0]!="/"&&$line[0]!=""&&$line[0]!="*"){
				$data = explode("=", $line);
				$params[$data[0]] = iconv("windows-1251", "UTF-8", $data[1]);
			}
		endwhile;
		return $params;
    }
    
    function getFrontendLangParams($lang_name){
    	

		$file_array = file(ROOT."languages/".$lang_name."/frontend2.ini");
		
		//$file_array = file_get_contents(ROOT."languages/".$lang_name."/frontend.ini");
		//$file_array = base64_decode($file_array);
		//file_put_contents(ROOT."languages/".$lang_name."/frontend2.ini", $file_array);
		//$file_array = file($file_array);
		//print_r($file_array); die();
		//print_r($file_array); die();
		while ( list( $line_num, $line ) = each($file_array)):
			if($line[0]!="/"&&$line[0]!=""&&$line[0]!="*"){
				$data = explode("=", $line);
				$params[$data[0]] = iconv("windows-1251", "UTF-8", $data[1]);
			}
		endwhile;
		return $params;
    }
    
    public function getLanguagesForPage($page_num, $limit = -1) {
        $limit = $limit == -1?self::LANGUAGES_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::LANGUAGES_TABLE.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
    }
    
    public function getLanguagesPagesCount() {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::LANGUAGES_TABLE);
        return ceil($count['count']/self::LANGUAGES_PER_PAGE);
    }

    public function getLangById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::LANGUAGES_TABLE .' WHERE lang_id = ?', $id);
    }
    
    public function getLangByLangName($lang_name) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::LANGUAGES_TABLE .' WHERE short_title_lower = ?', strtolower($lang_name));
    }    
    
    public function getAllLanguages() {
    	$sql = 'SELECT * FROM '.self::LANGUAGES_TABLE.' ORDER BY title';
        return $this -> db -> fetchAll($sql);
    } 

    public function getAllLanguagesWithoutChoosed($choosed_lang_id) {
    	$sql = 'SELECT * FROM '.self::LANGUAGES_TABLE.' WHERE lang_id!='.$choosed_lang_id.' ORDER BY position';
        return $this -> db -> fetchAll($sql);
    }  
    
    public function delete($id) {
        $this -> db -> delete(self::LANGUAGES_TABLE, 'lang_id = '.$id);
    }    
    
    public function checkExistTDP($lang_from_id, $lang_to_id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::TRANSLATIONS_DIRECTION_PRICE_TABLE.' WHERE lang_from_id = ? AND lang_to_id = ?', array($lang_from_id, $lang_to_id));
    }    

    /**
     * Add Translations Direction Price For Letters Count
     *
     * @param  array $dateArray
     * @return int last inserted id
     */
    public function addTDP($dataArray) {
        $data = array(
            'lang_from_id'  => $dataArray['lang_from_id'],
            'lang_to_id'    => $dataArray['lang_to_id'],
        	'price'         => $dataArray['price'],
            'letters_count' => $dataArray['letters_count']
        );
     
        $this -> db ->insert(self::TRANSLATIONS_DIRECTION_PRICE_TABLE , $data);
        return $this -> db -> lastInsertId();
    } 
    
    /**
     * Update Translations Direction Price For Letters Count
     * 
     * @param  array $dateArray
     * @param  boolean true
     */    
    public function updateTDP($dataArray) {
    	
        $data = array(
        	'price'         => $dataArray['price'],
            'letters_count' => $dataArray['letters_count']
        );
        $this -> db -> update(self::TRANSLATIONS_DIRECTION_PRICE_TABLE , $data, 'lang_from_id = '.$dataArray['lang_from_id'] . ' AND lang_to_id = '.$dataArray['lang_to_id']);
        return true;
    } 
    
   /**
     * Check language title for existance
     *
     * @param string $language_title
     * @return integer(0/1)
     */
    public function checkExistLanguageTitle($language_title, $id = 0)
    {
    	//$language_title = iconv('windows-1251', 'utf-8', strtolower(iconv('utf-8', 'windows-1251', $language_title)));
    	//$language_title = mb_detect_encoding($language_title, 'utf-8');

    	if($id){
			$result = $this -> db -> fetchRow('SELECT * FROM '.self::LANGUAGES_TABLE.' WHERE lang_id!=? AND LOWER(title) = ?', array($id, $language_title));    	    		
    	} else {
			$result = $this -> db -> fetchRow('SELECT * FROM '.self::LANGUAGES_TABLE.' WHERE LOWER(title) = ?', $language_title);    	
    	}

		if(!empty($result)) {
			return 1;
		} else {
			return 0;
		}
    }  
    
   /**
     * Check language short title for existance
     *
     * @param string $language_short_title
     * @return integer(0/1)
     */
    public function checkExistLanguageShortTitle($language_short_title, $id = 0)
    {
    	$language_short_title = iconv('windows-1251', 'utf-8', strtolower(iconv('utf-8', 'windows-1251', $language_short_title)));
    	if($id){
			$result = $this -> db -> fetchRow('SELECT * FROM '.self::LANGUAGES_TABLE.' WHERE lang_id!=? AND LOWER(short_title) = ?', array($id, $language_short_title));    	    		
    	} else {
			$result = $this -> db -> fetchRow('SELECT * FROM '.self::LANGUAGES_TABLE.' WHERE LOWER(short_title) = ?', $language_short_title);    	
    	}

		if(!empty($result)) {
			return 1;
		} else {
			return 0;
		}
    } 

    
    public function addLanguage($dataArray) {
        $data = array(
            'title'             => $dataArray['title'],
            'short_title'       => $dataArray['short_title'],
            'short_title_lower' => $dataArray['short_title_lower'],
			'position'          => $dataArray['position']
        );
        $this -> db ->insert(self::LANGUAGES_TABLE, $data);
        return $this -> db -> lastInsertId();
    }
    
    public function modifyLanguage($id, $dataArray) {
        $data = array(
            'title'             => $dataArray['title'],
            'short_title'       => $dataArray['short_title'],
            'short_title_lower' => $dataArray['short_title_lower'],
			'position'          => $dataArray['position']
        );
        
        $this -> db -> update(self::LANGUAGES_TABLE, $data, 'lang_id = '.$id);
    }  

    public function updateImage($id, $filename){
        $data = array(
            'flag_image'             => $filename
        );
        $this -> db -> update(self::LANGUAGES_TABLE, $data, 'lang_id = '.$id);    	
    }
    
    public function createLanguageFolder($folderName){
    	$oldumask = @umask(0);
		@mkdir('languages/'.$folderName, 0777); 
		@umask($oldumask);
		
		@copy('languages/ru/index.html' , 'languages/'.$folderName.'/index.html');
		
		@copy('languages/ru/frontend2.ini' , 'languages/'.$folderName.'/frontend.ini');
		$file_content = file_get_contents('languages/'.$folderName.'/frontend.ini');
		file_put_contents('languages/'.$folderName.'/frontend.ini', base64_encode($file_content));
		
		chmod('languages/'.$folderName.'/frontend.ini', 0777);
		@copy('languages/ru/backand.ini' , 'languages/'.$folderName.'/backand.ini');
		
		
    }
    
    public function deleteLanguageFolder($folderName, $filename){
    	@unlink('languages/'.$folderName.'/index.html');
    	@unlink('languages/'.$folderName.'/frontend.ini');
    	@unlink('languages/'.$folderName.'/backand.ini');
    	@unlink('languages/'.$folderName.'/'.$filename);
    	@rmdir('languages/'.$folderName);
    }
    
    public function getTranslationFile($folderName){
    	return base64_decode(file_get_contents('languages/'.$folderName.'/frontend.ini'));
    }
    
    public function updateTranslationFile($folderName , $data){
    	file_put_contents('languages/'.$folderName.'/frontend.ini', base64_encode($data));
		file_put_contents('languages/'.$folderName.'/frontend2.ini', $data);
    }
}
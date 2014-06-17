<?php

class SettingsDb
{
    const SETTINGS_TABLE = 'settings';
    
    protected $db;
        
    public function __construct() {
    	
        $this -> db = Zend_Registry::get('db');
    }
    
    
    public function updateSettings($settings, $lang_id=1) {
        $data = array(
            'value'       => $settings
        );
        $this -> db -> update(self::SETTINGS_TABLE, $data, 'lang_id='.$lang_id);
    }
    
    public function getSettingsById($lang_id) {
        $data = $this -> db -> fetchRow('SELECT value FROM '.self::SETTINGS_TABLE.' WHERE lang_id=?', $lang_id);
        return json_decode($data['value']);
    }
}
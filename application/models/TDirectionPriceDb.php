<?php

class TDirectionPriceDb
{
    const TABLE_NAME = 'translations_direction_price';
    const ITEMS_PER_PAGE = 10;
    
    protected $db;
    
    public function __construct()
    {
        $this -> db = Zend_Registry::get('db');
    }
    
    public function getTranslationDirectionPriceById($langFromId, $langToId) {
        $data =  $this -> db -> fetchRow('SELECT * FROM '.self::TABLE_NAME .' WHERE lang_from_id = ? AND lang_to_id=?', array($langFromId, $langToId));
        return $data;
    }
}
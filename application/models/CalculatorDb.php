<?php

class CalculatorDb
{
	const LANGUAGES_TABLE = 'languages';
	const TTHEMES_TABLE = 'translations_themes';
	
	protected $db;
    
    public function __construct()
    {
        $this -> db = Zend_Registry::get('db');
    }

}
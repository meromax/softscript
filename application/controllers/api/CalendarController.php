<?php

/**
 * CalendarController
 * 
 * @author
 * @version 
 */
	
Zend_Loader::loadClass('System_Controller_Action');

class Api_CalendarController extends System_Controller_Action
{
	public function init() {
		parent::init();
	}
	
	/**
	 * The default action - show the home page
	 */
    public function indexAction() 
    {
        $year = $this->_hasParam('year')?$this->_getParam('year'):date('Y');
        $month = $this->_hasParam('month')?$this->_getParam('month'):date('m');
        
        include_once(LIB_ROOT.'/calendar/class.Calendar.php');
        $calendar = new Calendar ($year, $month);
        $calendar->setTableWidth('100%');
        $calendar->setDayNameFormat('%a');
        $calendar->setDates($this->News->getNewsForMonth($month, $year));
        
        $lmonth = $month-1;
        $lyear = $year;
        if( $lmonth == 0 ) {
        	$lmonth = 12;
        	$lyear = $year-1;
        }
        
        $nmonth = $month+1;
        $nyear = $year;
        if( $nmonth == 13 ) {
            $nmonth = 1;
            $nyear = $year+1;
        }
        
        echo "<center><a href='javascript:generateCal(".$lmonth.",".$lyear.")'>&lt;</a><b>&nbsp;".$calendar->getFullMonthName().", ".$year."&nbsp;</b><a href='javascript:generateCal(".$nmonth.",".$nyear.")'>&gt;</a></center>";
        echo $calendar->display(); 
    }
}
		

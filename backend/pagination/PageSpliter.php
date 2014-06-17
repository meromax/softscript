<?php

/**
 * Class PageSpliter
 * This class creates page navigation on the fly
 * You only needs to define how many items you have
 * and how many items you want to display on your
 * pages.
 * You can also use help methods for full ruling
 *
 * @package PageSpliter
 * @author Paul Yakubtes <fatalistik@gmail.com>
 * @copyright GPL lisence
 * @version 1.0
 * 
 */
class PageSpliter
{
    
    private $_totalItems = null;
    
    private $_itemsPerPage = null;
    
    private $_template = null;
    
    private $_delimiter = null;
    
    private $_sideArrows = array('left' => null , 'right' => null);
    
    private $_linksNumbers = 10;
    
    private $_totalPages = null;
    
    private $_currPage = 1;
    
    private $_output = null;
    
    /**
     * Class constructor
     * 
     * @param integer $totalItems
     * @param integer $itemsPerPage = 10
     */
    function __construct ($totalItems, $itemsPerPage = 10)
    {
        if (isset($totalItems))
            $this->_totalItems = $totalItems; else
            die('First argument "totalItems" must be not empty');
        
        $this->_itemsPerPage = $itemsPerPage;
        
        $this->_totalPages = ceil($this->_totalItems / $this->_itemsPerPage);
    }
    
    /**
     * Loading template for pagination digits
     * 
     * @param string $path
     * @example File contents: <a href="page/%s" title="%s">%s</a>
     */
    public function LoadDigitTemplate ($path)
    {
        $this->_template = file_get_contents($path);
    
    }
    
    /**
     * Setting delimeter for separating navigation links
     * 
     * @param string $value
     */
    public function setDelimiter ($value)
    {
        $this->_delimiter = $value;
    }
    
    /**
     * Setting <Prev> <Next> navigation html templates
     * [0] => path_to_template // for left arrow
     * [1] => path_to_template // for right arrow
     * 
     * Templates must in following formats:
     * <a href="page/%s" title="Prev"><img src="images/left.gif" alt="Left" /></a>
     * 
     * @param array $arrows
     */
    public function setSideArrows (array $arrows)
    {
        $arr_left = file_get_contents($arrows[0]);
        $arr_right = file_get_contents($arrows[1]);
        $this->_sideArrows['left'] = $arr_left;
        $this->_sideArrows['right'] = $arr_right;
    }
    
    /**
     * Setting current page number
     * 
     * @param integer $pageNumber
     */
    public function setCurrPage ($pageNumber)
    {
        if (is_numeric($pageNumber)) {
            if ($pageNumber <= $this->_totalPages)
                $this->_currPage = $pageNumber;
        }
    }
    
    /**
     * Setting how many page links will be displayed at once
     * 
     * @param integer $number
     */
    public function setLinksNumbers ($number)
    {
        $this->_linksNumbers = $number;
    }
    
    /**
     * Process page navigation
     * 
     * @return string // $this->_output
     */
    public function Make ()
    {
        $arrow_left = null;
        $arrow_right = null;
        
        /** Checking for side arrows */
        if (! is_null($this->_sideArrows['left']) && ! is_null($this->_sideArrows['right'])) {
            
            /** Values for left arrow */
            if ($this->_currPage == 1) {
                $arrLeftDisplay = false;
            } else {
                $arrLeftIncr = $this->_currPage - 1;
                $arrLeftDisplay = true;
            }
            
            /** Values for right arrow */
            if ($this->_currPage == $this->_totalPages) {
                $arrRightDisplay = false;
            } else {
                $arrRightIncr = $this->_currPage + 1;
                $arrRightDisplay = true;
            }
            
            if ($arrLeftDisplay === true)
                $arrow_left = sprintf($this->_sideArrows['left'], $arrLeftIncr);
            if ($arrRightDisplay === true)
                $arrow_right = sprintf($this->_sideArrows['right'], $arrRightIncr);
        }
        
        /** Output left arrow */
        $this->_output .= $arrow_left;
        
        $middleNum = round($this->_linksNumbers / 2);
        if (($this->_totalPages - $middleNum) < 0 || ($this->_currPage - $middleNum) < 0) {
            $i = $this->_currPage;
            $middleNum = $this->_linksNumbers;
        } else {
            $i = $this->_currPage - $middleNum;
        }
        
        while ($i <= $this->_currPage + $middleNum && $i <= $this->_totalPages) {
            
            if ($i == $this->_currPage)
                $this->_output .= '<span style="background-color:#CCCCCC;">' . sprintf($this->_template, $i, $i, $i) . '</span>'; else
                $this->_output .= sprintf($this->_template, $i, $i, $i);
            
            /** Setting delimiter between page links */
            if (! is_null($this->_delimiter) && $i < $this->_totalPages)
                $this->_output .= $this->_delimiter;
            
            /** Increment cycle */
            $i ++;
        }
        
        $ii = $this->_totalPages - 2;
        
        if ($this->_linksNumbers < $this->_totalPages + 3 && $i < $this->_totalPages) {
            $this->_output .= ' ... ';
            
            while ($ii <= $this->_totalPages) {
                
                if ($ii >= $i) {
                    $this->_output .= sprintf($this->_template, $ii, $ii, $ii);
                    
                    /** Setting delimiter between page links */
                    if (! is_null($this->_delimiter) && $ii < $this->_totalPages)
                        $this->_output .= $this->_delimiter;
                }
                
                /** Increment cycle */
                $ii ++;
            }
        }
        
        /** Output right arrow */
        $this->_output .= $arrow_right;
        
        return $this->_output;
    }
}
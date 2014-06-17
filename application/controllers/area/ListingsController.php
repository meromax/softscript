<?php

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

/** Load Area Control model */
include_once ROOT . 'application/models/AreaControlModel.php';

/** Load options database model */
include_once ROOT . 'application/models/OptionsDb.php';

/** Load Listings database model */
include_once ROOT . 'application/models/ListingsDbModel.php';

/**
 * Listing controller
 * 
 * @uses System/Controller/Action.php
 * @link /area/listings
 * @package Area_Listings
 * @subpackage Video
 * @since October 8, 2007
 * @version 0.1
 *
 */
class Area_ListingsController extends System_Controller_Action
{
    private $YouTubeApi;

    /** Area Control */
    private $AreaControl;

    private $Options;

    /** Listings DB object model */
    private $Listings;

    private $Errors = array();

    public function init()
    {
        parent::init();

        /** Check for user access */
        if(!AreaControl::checkAccess()) $this -> _redirect('/login');

        $this -> AreaControl = new AreaControl();

        $this -> Listings = new Listings();

        $this -> Options = new OptionsDb();
    }

    /**
     * Index action for Area_ListingsController
     * 
     * @link /area(/index)
     */
    public function indexAction()
    {
        /**
         * Adding new Listing
         * IE hack to process image buttons
         */
        if($this -> _request -> getParam('add_listing')
        && !$this -> _request -> getParam('ListingValidated')
        && !$this -> _request -> getParam('ListingAdded'))
        $this -> _forward('ValidateListing');

        else
        {
            /** If Listing submition is validated with errors */
            if($this -> _request -> getParam('ListingValidated'))
            {
                $Err = new Zend_Config_Xml(ROOT . 'configs/error_messages/messages.xml', 'errors');
                /** Preparing warning block */
                $this -> smarty -> assign('WarnTitle', $Err -> error_block_title);
                $this -> smarty -> assign('WarnMessages', $this -> _request -> getParam('Errors'));
                $errBlock = $this -> smarty -> fetch('warningBlock.tpl');
    
                $this -> smarty -> assign('warningBlock', $errBlock);
            }
            
            $this -> smarty -> assign('PageBody', 'area/listings.tpl');
            /** Use Calendar js lib */
            $this -> smarty -> assign('UseCalendar', true);
            /** Use Interface js lib */
            $this -> smarty -> assign('UseInterface', true);

            $listings = $this -> Listings -> getListingsByUserId($this -> AreaControl -> getUserData() -> id) -> toArray();
            $this -> smarty -> assign('Listings', array_reverse($listings));
            
            $this -> smarty -> assign('CategoryList', $this -> Options -> getCategoryList());
            $this -> smarty -> assign('IndustryList', $this -> Options -> getIndustiresList());
            $this -> smarty -> assign('ListingType', $this -> Options -> getListingTypesList());
            
            $this -> smarty -> assign('EducationLevel', $this -> Options -> getDegreeEducationList());
            $this -> smarty -> assign('Experience', $this -> Options -> getExperienceList());
            $this -> smarty -> assign('Salary', $this -> Options -> getSalaryList());
            
            $this -> smarty -> assign('ProfileType', $this -> AreaControl -> getUserData() -> acc_type);

            $this -> smarty -> assign('Title', 'Listings');

            $this -> smarty -> display('layouts/main.tpl');
        }
    }

    public function ValidateListingAction()
    {
        $Err = new Zend_Config_Xml(ROOT . 'configs/error_messages/messages.xml', 'errors');

        $dataArray = array();


        /** External Link empty validation */
        if(!$dataArray['ext_link'] = $this -> _request -> getParam('ext_link'))
            $dataArray['ext_link'] = '';
        
        /** Title empty validation */
        if(!$dataArray['title'] = $this -> _request -> getParam('title'))
        $this -> Errors[] = $Err -> empty_listing_title;

        /**
         * Description empty validation
         * Input data is quote shielding automaticaly
         */
        if(!$dataArray['description'] = $this -> _request -> getParam('description'))
        $this -> Errors[] = $Err -> empty_listing_description;

        /**
         * Tags empty validation
         * Input data is quote shielding automaticaly
         */
        if(!$dataArray['tags'] = $this -> _request -> getParam('tags'))
        $this -> Errors[] = $Err -> empty_listing_tags;
        else
        {
            $pattern = "/^[a-z0-9_-\s]{2,500}$/i";
            if(preg_match($pattern, $dataArray['tags'], $matches))
            {
                $dataArray['tags'] = trim(preg_replace('|\s+|', ' ', $dataArray['tags']));
            }
            else
            $this -> Errors[] = $Err -> restricted_listing_tags;
        }
        
        /**
         * Description empty and right format validation
         * @todo /^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/i
         */
        if(!$dataArray['date_expire'] = $this -> _request -> getParam('date_expire'))
            $this -> Errors[] = $Err -> empty_date;
        else
        {
            $pattern = "/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/i";
            if(preg_match($pattern, $dataArray['date_expire'], $matches))
            {
                $dataArray['date_expire'] = trim($matches[0]);
            }
            else
            $this -> Errors[] = $Err -> bad_date_format;
        }

        /** Category empty validation */
        if(!$dataArray['category'] = $this -> _request -> getParam('category'))
        $this -> Errors[] = $Err -> empty_listing_category;

        /** Industry empty validation */
        if(!$dataArray['industry'] = $this -> _request -> getParam('industry'))
        $this -> Errors[] = $Err -> empty_listing_industry;

        /** Type empty validation */
        if(!$dataArray['type'] = $this -> _request -> getParam('type'))
        $this -> Errors[] = $Err -> empty_listing_type;
        
        /** Position validation */
        if($this -> _request -> getParam('position'))
            $dataArray['position'] = $this -> _request -> getParam('position');
            
        /** Education Level validation */
        if($this -> _request -> getParam('education'))
            $dataArray['education'] = $this -> _request -> getParam('education');
        
        /** Experience validation */
        if($this -> _request -> getParam('experience'))
            $dataArray['experience'] = $this -> _request -> getParam('experience');

        /** Salary validation */
        if($this -> _request -> getParam('salary'))
            $dataArray['salary'] = $this -> _request -> getParam('salary');
        
        /** Getting user id */
        $dataArray['user_id'] = $this -> AreaControl -> getUserData() -> id;

        if(count($this -> Errors) != 0)
        {
            $this -> _request -> setParam('ListingValidated', true);
            $this -> _request -> setParam('Errors', $this -> Errors);
            $this -> _forward('index');
        }
        elseif(count($this -> Errors) == 0 && $this -> _request -> getParam('allow_edit') != 1)
        {
            $this -> _request -> setParam('dataArray', $dataArray);
            $this -> _forward('AddListing');
        }
        else
        {
            $this -> _request -> setParam('dataArray', $dataArray);
            $this -> _forward('UpdateListing');
        }
    }
    
    public function AddListingAction()
    {
        if($this -> _request -> getParam('dataArray'))
        {
            if($this -> Listings -> addListing($this -> _request -> getParam('dataArray')))
            {
                $this -> _request -> setParam('ListingAdded', true);
                $this -> smarty -> assign('warningBlock', '<center><h4 style="color: green;"><b>Listing have been successfully added!</b></h4></center>');
                
                /** Hack to clear POST data to prevent dasplaying after adding */
                $_POST = array();
                $this -> _forward('index');
            }
        }
    }
    
    protected function UpdateListingAction()
    {
        if($this -> _request -> getParam('dataArray'))
        {
            if($this -> Listings -> updateListing($this -> _request -> getParam('dataArray'),
                                                $this -> _request -> getParam('listing_id'),
                                                $this -> AreaControl -> getUserData() -> id))
            {
                $this -> _request -> setParam('ListingAdded', true);
                $this -> smarty -> assign('warningBlock', '<center><h4 style="color: green;"><b>Listing have been successfully updated!</b></h4></center>');
                
                /** Hack to clear POST data to prevent dasplaying after adding */
                $_POST = array();
                $this -> _forward('index');
            }
            else
                echo 'Error, while updating listing!';
        }
    }
    
    public function DeleteListingAction()
    {
        $listingId = $this -> _request -> getParam('id');
        if($this -> Listings -> deleteListing($listingId, $this -> AreaControl -> getUserData() -> id))
        {
            $this -> smarty -> assign('warningBlockCenter', '<center><h4 style="color: green;"><b>Listing have been deleted!</b></h4></center>');
            $this -> _redirect('/area/listings');
        }
    }

}
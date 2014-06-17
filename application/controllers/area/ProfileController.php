<?php

/** Load User model */
include_once ROOT . 'application/models/UsersDb.php';
/** Load Area Control model */
include_once ROOT . 'application/models/AreaControlModel.php';
/** Load date model */
include_once ROOT . 'application/models/DateModel.php';
/** Loading location database model */
include_once ROOT . 'application/models/LocationsDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');
/**
 * Profile controller
 * 
 * @uses System/Controller/Action.php
 * @link /area/profile
 * @package Area_Profile
 * @subpackage Profile
 * @since September 14, 2007
 * @version 0.1
 *
 */
class Area_ProfileController extends System_Controller_Action
{
    /** Db object */
    private $LocationsDb;
    /** Area Control */
    private $AreaControl;
    /** Define profile type */
    private $ProfileType;
    /** Users Db object model */
    private $Users;
    /** Locations Db object model */
    private $Locations;
    private $Errors = array();

    public function init ()
    {
        parent::init();
        /** Check for user access */
        if (! AreaControl::checkAccess())
            $this->_redirect('/login');
        $this->LocationsDb = new LocationsDb();
        $this->AreaControl = new AreaControl();
        $this->ProfileType = "individual";
        $this->Users = new Users();
        $this->Locations = new LocationsDb();
    }

    /**
     * Index action for Area_ProfileController
     * 
     * @link /area/profile(/index)
     */
    public function indexAction ()
    {
        if ($this->_request->getParam('update_user_info') && ! $this->_request->getParam('ValidationComplete'))
            $this->_forward('ValidateProfile'); elseif ($this->_request->getParam('update_avatar') && ! $this->_request->getParam('ImageUploaded'))
            $this->_forward('UpdateAvatar'); elseif ($this->_request->getParam('ImageUploaded') === true)
            $this->_forward($this->ProfileType . 'profile'); elseif ($this->_request->getParam('delete_avatar') && ! $this->_request->getParam('AvatarDeleted'))
            $this->_forward('DeleteAvatar'); else
            $this->_forward($this->ProfileType . 'profile');
    }

    /**
     * Forward method to initiate "Individual" profile action
     */
    protected function IndividualProfileAction ()
    {
        //var_dump($this -> _request -> getParams());
        $this->AreaControl->refreshUserData();
        $userData = $this->AreaControl->getUserData();
        //echo $userData -> username;
        $this->smarty->assign('PageBody', 'area/' . $this->ProfileType . '/profile.tpl');
        $this->smarty->assign('Title', 'Profile edit');
        $this->smarty->assign('YearSelect', YearSelect());
        $this->smarty->assign('DaySelect', DaySelect());
        $this->smarty->assign('MonthSelect', MonthSelect());
        //$this->smarty->assign('ContryList', $this->Locations->getCountryList());
        //$this->smarty->assign('RegionList', $this->Locations->getRegionsByCountryId($userData->country));
        //$this->smarty->assign('CityList', $this->Locations->getCitiesByRegionId($userData->region));
        $this->smarty->assign('userData', $userData);
        /** Plug Interface javascript */
        $this->smarty->assign('UseInterface', true);
        /** Plug Interface Css */
        $this->smarty->assign('AddCss', 'imagebox.css');
        /** Assign full user image/avatar */
        $this->smarty->assign('FullImage', md5($userData->member_id));
        //echo md5($userData->member_id) . '_full.jpg';
        /** Image uploading SUCCESS message */
        if ($this->_request->getParam('ImageUploaded') === true) {
            $this->getResponse()->setHeader('Pragma', 'no-cache', true);
            $this->getResponse()->setHeader('Cache-Control', 'no-cache, must-revalidate', true);
            $this->getResponse()->setHeader('Vary', 'Content-ID', true);
            $this->getResponse()->setHeader('Content-ID', md5(microtime(true)), true);
            $this->getResponse()->setHeader('Last-Modified', gmdate("D, d M Y H:i:s") . " GMT", true);
            $this->getResponse()->setHeader('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT', true);
            $this->smarty->assign('ImageUploadMessage', '<center><h3 style="color: green;"><b>Your photo is successfully updated!</b></h3></center>');
        } /** Image uploading FAILED message */
        elseif ($this->_request->getParam('ImageUploaded') === false) {
            $this->smarty->assign('ImageUploadMessage', '<center><h3 style="color: red;"><b>Your photo updating failed!</b></h3></center>');
        }
        /** Image delete SUCCESS message */
        if ($this->_request->getParam('AvatarDeleted') === true) {
            $this->smarty->assign('ImageUploadMessage', '<center><h3 style="color: green;"><b>Your photo is successfully deleted!</b></h3></center>');
        }
        /** Profile updating SUCCESS message */
        if ($this->_request->getParam('UpdateSuccess') === true) {
            $this->smarty->assign('warningBlock', '<center><h3 style="color: green;"><b>Profile is successfully updated!</b></h3></center>');
        } /** Profile updating FAILED message */
        elseif ($this->_request->getParam('UpdateSuccess') === false) {
            $Err = new Zend_Config_Xml(ROOT . 'configs/error_messages/messages.xml', 'errors');
            /** Preparing warning block */
            $this->smarty->assign('WarnTitle', $Err->error_block_title);
            $this->smarty->assign('WarnMessages', $this->_request->getParam('Errors'));
            $errBlock = $this->smarty->fetch('warningBlock.tpl');
            $this->smarty->assign('warningBlock', $errBlock);
        }
        $this->smarty->display('layouts/main.tpl');
    }

     /**
     * Forward method to Validate profile after submission
     */
    protected function ValidateProfileAction ()
    {
        $Err = new Zend_Config_Xml(ROOT . 'configs/error_messages/messages.xml', 'errors');
        Zend_Loader::loadClass('Zend_Validate');
        Zend_Loader::loadClass('Zend_Validate_StringLength');
        Zend_Loader::loadClass('Zend_Validate_Alnum');
        Zend_Loader::loadClass('Zend_Validate_Alpha');
        Zend_Loader::loadClass('Zend_Validate_Digits');
        Zend_Loader::loadClass('Zend_Validate_EmailAddress');
        Zend_Loader::loadClass('Zend_Validate_Regex');
        $inputParams = array();
        if ($this->_request->getParam('update_type') != 'contacts') {
            /** ------------- Validate firstname if it set ------------- */
            $inputParams['firstname'] = $this->_request->getParam('firstname');
            if ($this->_request->getParam('firstname')) {
                $firstnameChain = new Zend_Validate();
                $firstnameChain->addValidator(new Zend_Validate_StringLength(2, 20))->addValidator(new Zend_Validate_Alpha());
                if (! $firstnameChain->isValid($inputParams['firstname'])) {
                    $this->Errors[] = $Err->invalid_firstname;
                }
            }
            /** ------------- Validate lastname if it set ------------- */
            $inputParams['lastname'] = $this->_request->getParam('lastname');
            if ($this->_request->getParam('lastname')) {
                $lastnameChain = new Zend_Validate();
                $lastnameChain->addValidator(new Zend_Validate_StringLength(2, 20))->addValidator(new Zend_Validate_Alpha());
                if (! $lastnameChain->isValid($inputParams['lastname'])) {
                    $this->Errors[] = $Err->invalid_lastname;
                }
            }
            /** ------------- Validate zip postal code if it set ------------- */
            $inputParams['zip'] = $this->_request->getParam('zip');
            if ($this->_request->getParam('zip')) {
                $zipChain = new Zend_Validate();
                $zipChain->addValidator(new Zend_Validate_StringLength(5, 7));
                if (! $zipChain->isValid($inputParams['zip'])) {
                    $this->Errors[] = $Err->invalid_zip;
                }
            }
            
            /** ------------- Validate company name if it set ------------- */
            if ($this->ProfileType == 'business') {
                $inputParams['company_name'] = $this->_request->getParam('company_name');
                if ($this->_request->getParam('company_name')) {
                    $company_nameChain = new Zend_Validate();
                    $company_nameChain->addValidator(new Zend_Validate_StringLength(2, 30))->addValidator(new Zend_Validate_Alpha());
                    if (! $company_nameChain->isValid($inputParams['company_name'])) {
                        $this->Errors[] = $Err->invalid_company_name;
                    }
                }
            }
            
            /** ------------- Validate Birthday ------------- */
            $birthdayChain = new Zend_Validate();
            $birthdayChain->addValidator(new Zend_Validate_Digits());
            if (! $birthdayChain->isValid($this->_request->getParam('month')))
                $this->Errors[] = $Err->month_notselected;
            if (! $birthdayChain->isValid($this->_request->getParam('day')))
                $this->Errors[] = $Err->day_notselected;
            if (! $birthdayChain->isValid($this->_request->getParam('year')))
                $this->Errors[] = $Err->year_notselected;
            /** If no Errors make date in right format */
            if (count($this->Errors) == 0)
                $inputParams['birthday'] = $this->_request->getParam('year') . '-' . $this->_request->getParam('month') . '-' . $this->_request->getParam('day');
            /** ------------- Check for gender param ------------- */
            $inputParams['gender'] = $this->_request->getParam('gender');
            /** ------------- Check for country param ------------- */
            $inputParams['country'] = $this->_request->getParam('country');
            /** ------------- Check for region param ------------- */
            $inputParams['region'] = $this->_request->getParam('region');
            /** ------------- Check for city param ------------- */
            $inputParams['city'] = $this->_request->getParam('city');
        }
        
        /** Business profile parameters */
        if ($this->ProfileType == 'business') {
            /** ------------- Check for category param ------------- */
            $inputParams['category'] = $this->_request->getParam('category');
            /** ------------- Check for position param ------------- */
            $inputParams['position'] = $this->_request->getParam('position');
            /** ------------- Check for industry param ------------- */
            $inputParams['industry'] = $this->_request->getParam('industry');
            /** ------------- Check for firm_size param ------------- */
            $inputParams['firm_size'] = $this->_request->getParam('firm_size');
        }
        if ($this->_request->getParam('update_type') == 'contacts') {
            /** ------------- Validate Current school if it set ------------- */
            $inputParams['current_school'] = $this->_request->getParam('current_school');
            /** ------------- Validate Past school if it set ------------- */
            $inputParams['past_school'] = $this->_request->getParam('past_school');
            /** ------------- Validate Current occupation if it set ------------- */
            $inputParams['occupation'] = $this->_request->getParam('occupation');
            /** ------------- Validate My areas of interest if it set ------------- */
            $inputParams['interest'] = $this->_request->getParam('interest');
            /** ------------- Validate Additional information if it set ------------- */
            $inputParams['information'] = $this->_request->getParam('information');
            /** ------------- Validate AIM if it set ------------- */
            $inputParams['aim_msg'] = $this->_request->getParam('aim_msg');
            /** ------------- Validate ICQ if it set ------------- */
            $inputParams['icq'] = $this->_request->getParam('icq');
            if ($this->_request->getParam('icq')) {
                $phoneChain = new Zend_Validate();
                $phoneChain->addValidator(new Zend_Validate_StringLength(5, 13))->addValidator(new Zend_Validate_Digits());
                if (! $phoneChain->isValid($inputParams['icq'])) {
                    $this->Errors[] = $Err->invalid_icq;
                }
            }
            /** ------------- Validate Yahoo if it set ------------- */
            $inputParams['yahoo'] = $this->_request->getParam('yahoo');
            /** ------------- Validate MSN if it set ------------- */
            $inputParams['msn_msg'] = $this->_request->getParam('msn_msg');
            /** ------------- Validate GTalk if it set ------------- */
            $inputParams['gtalk'] = $this->_request->getParam('gtalk');
            /** ------------- Validate phone number if it set ------------- */
            $inputParams['phone'] = $this->_request->getParam('phone');
            if ($this->_request->getParam('phone')) {
                $phoneChain = new Zend_Validate();
                $phoneChain->addValidator(new Zend_Validate_StringLength(5, 18))->addValidator(new Zend_Validate_Regex("([8|+][0-9|-| ]{5,18})"));
                if (! $phoneChain->isValid($inputParams['phone'])) {
                    $this->Errors[] = $Err->invalid_phone;
                }
            }
            /** ------------- Validate cellular phone number if it set ------------- */
            $inputParams['cell_phone'] = $this->_request->getParam('cell_phone');
            if ($this->_request->getParam('cell_phone')) {
                $phoneChain = new Zend_Validate();
                $phoneChain->addValidator(new Zend_Validate_StringLength(5, 18))->addValidator(new Zend_Validate_Regex("([8|+][0-9|-| ]{5,18})"));
                if (! $phoneChain->isValid($inputParams['cell_phone'])) {
                    $this->Errors[] = $Err->invalid_cell_phone;
                }
            }
        }
        $this->_request->setParam('inputParams', $inputParams);
        $this->_request->setParam('Errors', $this->Errors);
        $this->_request->setParam('ValidationComplete', true);
        $this->_forward('UpdateProfile');
    }

    protected function UpdateProfileAction ()
    {
        if (count($this->_request->getParam('Errors')) == 0) {
            $this->Users->updateUserInfo($this->_request->getParam('inputParams'), $this->AreaControl->getUserData()->id);
            $this->AreaControl->refreshUserData();
            $this->_request->setParam('UpdateSuccess', true);
            $this->_forward('index');
        } else {
            $this->_request->setParam('UpdateSuccess', false);
            $this->_forward('index');
        }
    }

    protected function UpdateAvatarAction ()
    {
        set_time_limit(120);
        require_once ('Uploader/class.upload.php');
        $allowedExt = array('jpeg', 'jpg', 'gif', 'png');
        $ext = substr($_FILES['avatar']['name'], - 3) && (substr($_FILES['avatar']['name'], - 4, - 3) == '.');
        /** Check for allowed extensions */
        if (in_array($ext, $allowedExt) && $_FILES['avatar']['name'] != '') {
            $Uploader = new upload($_FILES['avatar']);
            if ($Uploader->uploaded) {
                /** ---------- Create full 500x500 pixel image */
                $Uploader->file_overwrite = true;
                $Uploader->file_auto_rename = false;
                $Uploader->file_new_name_body = md5($this->AreaControl->getUserData()->id) . '_full';
                $Uploader->image_resize = true;
                $Uploader->image_ratio_crop = true;
                $Uploader->image_x = 500;
                $Uploader->image_y = 500;
                $Uploader->image_reflection_height = 50;
                $Uploader->image_reflection_opacity = 50;
                /** Set text up to image */
                $Uploader->image_text = 'LifesLadder.com! The Social Network Site.';
                $Uploader->image_text_color = '#FFFFFF';
                $Uploader->image_text_background = '#000000';
                $Uploader->image_text_background_percent = 50;
                $Uploader->image_text_padding = 5;
                $Uploader->image_text_font = 2;
                $Uploader->image_text_x = - 5;
                $Uploader->image_text_y = - 5;
                $Uploader->image_convert = 'jpg';
                $Uploader->mime_check = true;
                /** Process */
                $Uploader->Process(ROOT . 'images/users');
                if ($Uploader->processed) {
                    $this->_request->setParam('ImageUploaded', false);
                    $this->_forward('index');
                }
                /** ---------- Create big 126x126 pixel image */
                $Uploader->file_overwrite = true;
                $Uploader->file_auto_rename = false;
                $Uploader->file_new_name_body = md5($this->AreaControl->getUserData()->id) . '_big';
                $Uploader->image_resize = true;
                $Uploader->image_ratio_crop = true;
                $Uploader->image_x = 126;
                $Uploader->image_y = 126;
                $Uploader->image_convert = 'jpg';
                $Uploader->mime_check = true;
                /** Process */
                $Uploader->Process(ROOT . 'images/users');
                if ($Uploader->processed) {
                    $this->_request->setParam('ImageUploaded', false);
                    $this->_forward('index');
                }
                /** ---------- Create medium 48x48 pixel image */
                $Uploader->file_overwrite = true;
                $Uploader->file_auto_rename = false;
                $Uploader->file_new_name_body = md5($this->AreaControl->getUserData()->id) . '_med';
                $Uploader->image_resize = true;
                $Uploader->image_ratio_crop = true;
                $Uploader->image_x = 48;
                $Uploader->image_y = 48;
                $Uploader->image_convert = 'jpg';
                $Uploader->mime_check = true;
                /** Process */
                $Uploader->Process(ROOT . 'images/users');
                if ($Uploader->processed) {
                    $this->_request->setParam('ImageUploaded', false);
                    $this->_forward('index');
                }
                /** ---------- Create small 16x16 pixel image */
                $Uploader->file_overwrite = true;
                $Uploader->file_auto_rename = false;
                $Uploader->file_new_name_body = md5($this->AreaControl->getUserData()->id) . '_small';
                $Uploader->image_resize = true;
                $Uploader->image_ratio_crop = true;
                $Uploader->image_x = 16;
                $Uploader->image_y = 16;
                $Uploader->image_convert = 'jpg';
                $Uploader->mime_check = true;
                /** Process */
                $Uploader->Process(ROOT . 'images/users');
                /** If Process successful */
                if ($Uploader->processed) {
                    $Uploader->Clean();
                    /** Update user profile with just uploaded image */
                    $inputParams = array(
                                    'image' => md5($this->AreaControl->getUserData()->id) . '_big.jpg');
                    $this->Users->updateUserInfo($inputParams, $this->AreaControl->getUserData()->id);
                    $this->AreaControl->refreshUserData();
                    $this->_request->setParam('ImageUploaded', true);
                    $this->_forward('index');
                } else /** If Process failed */
                {
                    $this->_request->setParam('ImageUploaded', false);
                    $this->_request->setParam('update_avatar', false);
                    $this->_forward('index');
                }
            } else /** If file is not uploaded */
            {
                $this->_request->setParam('ImageUploaded', false);
                $this->_request->setParam('update_avatar', false);
                $this->_forward('index');
            }
        } else /** If file extension is not exists in allowed list */
        {
            $this->_request->setParam('ImageUploaded', false);
            $this->_request->setParam('update_avatar', false);
            $this->_forward('index');
        }
        //var_dump($_FILES['avatar']);
    }

    protected function DeleteAvatarAction ()
    {
        /** Update user profile with just uploaded image */
        $inputParams = array('image' => '');
        $this->Users->updateUserInfo($inputParams, $this->AreaControl->getUserData()->id);
        $this->AreaControl->refreshUserData();
        $this->_request->setParam('AvatarDeleted', true);
        $this->_forward('index');
    }

    /**
     * experienceEducation action for Area_ProfileController
     * 
     * @link /area/profile/experienceEducation
     */
    public function experienceEducationAction ()
    {
        echo 'QQQ';
    }
}
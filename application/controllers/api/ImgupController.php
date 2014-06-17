<?php

/**
 * ImgupController
 * 
 * @author
 * @version 
 */
	
Zend_Loader::loadClass('System_Controller_Action');

include_once ROOT . 'application/models/AreaControlModel.php';

class Api_ImgupController extends System_Controller_Action
{
	private $AreaControl;
	
    public function init() {
        parent::init();
        
        if(!AreaControl::checkAccess()) $this -> _redirect('/login');
        
        $this->AreaControl = new AreaControl();
    }
	/**
	 * The default action - show the home page
	 */
    public function formAction() 
    {
        $this->smarty->display('area/extras/uploader_form.tpl');    
    }
    
    public function uploadAction() {
    	@mkdir(ROOT . 'images/users/'.$this->_getParam('step'));
        set_time_limit(120);
        require_once ('Uploader/class.upload.php');
        $allowedExt = array('jpeg', 'jpg', 'gif', 'png');
        $ext = substr($_FILES['image']['name'], - 3) && (substr($_FILES['image']['name'], - 4, - 3) == '.');
        /** Check for allowed extensions */
        
        if (in_array($ext, $allowedExt) && $_FILES['image']['name'] != '') {
            $Uploader = new upload($_FILES['image']);
            if ($Uploader->uploaded) {
            	echo '1';
                /** ---------- Create full 500x500 pixel image */
                $Uploader->file_overwrite = true;
                $Uploader->file_auto_rename = false;
                $file_name = md5($this->AreaControl->getUserData()->id.time());
                if( $this->_getParam('type') != 'back' ) {
                	$Uploader->file_new_name_body = 'big_'.$file_name;
	                $Uploader->image_resize = true;
	                $Uploader->image_ratio_crop = true;
	                $Uploader->image_x = 500;
	                $Uploader->image_y = 500;
	                $Uploader->image_reflection_height = 50;
	                $Uploader->image_reflection_opacity = 50;
	                /** Set text up to image */
	                $Uploader->image_text = 'Law School Link';
	                $Uploader->image_text_color = '#FFFFFF';
	                $Uploader->image_text_background = '#000000';
	                $Uploader->image_text_background_percent = 50;
	                $Uploader->image_text_padding = 5;
	                $Uploader->image_text_font = 2;
	                $Uploader->image_text_x = - 5;
	                $Uploader->image_text_y = - 5;
	                $Uploader->image_convert = 'jpg';
	                $Uploader->mime_check = true;
                } else {
                	$Uploader->file_new_name_body = 'back_'.$file_name;
                }
                /** Process */
                $Uploader->Process(ROOT . 'images/users/'.$this->_getParam('step'));
                if( $this->_getParam('type') != 'back' ) {
	                /** ---------- Create big 126x126 pixel image */
	                $Uploader->file_overwrite = true;
	                $Uploader->file_auto_rename = false;
	                $Uploader->file_new_name_body = 'small_'.$file_name;
	                $Uploader->image_resize = true;
	                $Uploader->image_ratio_crop = true;
	                $Uploader->image_x = 91;
	                $Uploader->image_y = 91;
	                $Uploader->image_convert = 'jpg';
	                $Uploader->mime_check = true;
	                $Uploader->image_convert = 'jpg';
	                /** Process */
	                $Uploader->Process(ROOT . 'images/users/'.$this->_getParam('step'));
                }
                
                if ($Uploader->processed) {
                    $Uploader->Clean();
                    /** Update user profile with just uploaded image */
                    $info = $this->insertPathsToDb($file_name);
                    
                    $this->smarty->assign('info', $info);
                    $this->smarty->assign('type', $this->_getParam('type'));
                    $this->smarty->assign('step', $this->_getParam('step'));
                    $this->smarty->assign('random', rand(100,100000000));
                    $this->smarty->display('area/extras/uploader_form.tpl');
                }
            } else /** If file is not uploaded */
            {
                $this->_request->setParam('ImageUploaded', false);
                $this->_request->setParam('update_avatar', false);
            }
        } else /** If file extension is not exists in allowed list */
        {
            $this->_request->setParam('ImageUploaded', false);
            $this->_request->setParam('update_avatar', false);
        }
    }
    
    private function insertPathsToDb($file_name) {
    	$table = $this->_getParam('step');
    	
    	switch($table) {
    		case 'hs':	
    		  include_once(ROOT.'application/models/HSchoolDb.php');
    		  $db = new HSchoolDb();
    		  $db->updateImage($this->_getParam('type'), $this->AreaControl->getUserData()->id, $file_name);
    		break;
    		case 'cl':
    		  include_once(ROOT.'application/models/CollegeDb.php');
              $db = new CollegeDb();
              $db->updateImage($this->_getParam('type'), $this->AreaControl->getUserData()->id, $file_name);
    		break;
    		case 'pg':
    		  include_once(ROOT.'application/models/PostgradDb.php');
              $db = new PostgradDb();
              $db->updateImage($this->_getParam('type'), $this->AreaControl->getUserData()->id, $file_name);
    		break;
    	}
    	
    	return $db->getAllInfo($this->AreaControl->getUserData()->id);
    }
}
		

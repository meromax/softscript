<?php

class FilesDb
{
    const FILES_TABLE = 'files';
    
    const FILES_PER_PAGE  = 5;
    
    const FILES_PER_PAGE2 = 5;
    
    protected $db;
    
    public function __construct() {
        $this -> db = Zend_Registry::get('db');
    }
    
    public function getAllFiles($lang_id) {
        return $this -> db -> fetchAll('SELECT * FROM '.self::FILES_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY date DESC');
    }
    
    public function getFilesForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::FILES_PER_PAGE:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::FILES_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    }
    
    public function getFilesForPage2($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::FILES_PER_PAGE2:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::FILES_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
        return $data;
    }
    
    public function getPagesCount2($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::FILES_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::FILES_PER_PAGE2);
    }
    
    public function getPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::FILES_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::FILES_PER_PAGE);
    }
    
    
    public function createFileItem($dateArray) {
        $data = array(
            'title'       => $dateArray['title'],
            'description' => $dateArray['description'],
            'position'    => $dateArray['position'],
        	'lang_id'         => $dateArray['lang_id'],
            'date' => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::FILES_TABLE, $data);
        return $this -> db -> lastInsertId();
    }
    
    public function modifyFileItem($id, $dateArray) {
    	//print_r($dateArray); die();
    	if(isset($dateArray['filename'])&&$dateArray['filename']!=""){
	        $data = array(
	            'title'       => $dateArray['title'],
	            'description' => $dateArray['description'],
                'position'    => $dateArray['position'],
	            'lang_id'     => $dateArray['lang_id'],
	            'file_name'   => $dateArray['filename']
	        );
    	} else {
	        $data = array(
	            'title'       => $dateArray['title'],
	            'description' => $dateArray['description'],
                'position'    => $dateArray['position'],
	            'lang_id'     => $dateArray['lang_id']
	        );
    	}
        $this -> db -> update(self::FILES_TABLE, $data, 'id = '.$id);
        return true;
    }
    
    public function deleteFileItem($id) {
    	$data = $this->getFileItemById($id);
        $this -> db -> delete(self::FILES_TABLE, 'id = '.$id);
        @unlink("tmp/files/".$data['file_name']);
    }
    
    public function getLastFileItemId() {
        $arr = $this -> db -> fetchRow('SELECT MAX(id) FROM '.self::FILES_TABLE);
        return $arr['MAX(id)'];
    }
    
    public function getFileItemById($id) {
        $data =  $this -> db -> fetchRow('SELECT * FROM '.self::FILES_TABLE.' WHERE id = ?', $id);
        return $data;
    } 
    
    function uploadFile($id, $path = '/tmp/files/'){
    	
        set_time_limit(120);
        $uploaddir =  $_SERVER['DOCUMENT_ROOT'].$path;

		if (move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir .$_FILES['file']['name'])) {
			if(is_file($uploaddir.$_FILES['file']['name'])){
				rename($uploaddir.$_FILES['file']['name'], $uploaddir.md5($id)."_".$_FILES['file']['name']);
			}
		    print "File is valid, and was successfully uploaded.";
		    $file_out = md5($id)."_".$_FILES['file']['name'];
		} else {
		    print "There some errors!";
		    $file_out= "";
		}
        return $file_out;
    }
    
    function uploadTranslatedFile($id, $filename, $ext, $path = '/tmp/files/'){
    	
        set_time_limit(120);
        $uploaddir =  $_SERVER['DOCUMENT_ROOT'].$path;

		if (move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir .$_FILES['file']['name'])) {
			if(is_file($uploaddir.$_FILES['file']['name'])){
				rename($uploaddir.$_FILES['file']['name'], $uploaddir.$filename."_translated.".$ext);
			}
		    //print "File is valid, and was successfully uploaded.";
		    $file_out[] = $_FILES['file']['name'];
		    $file_out[] = $filename."_translated.".$ext;
		} else {
		    //print "There some errors!";
		    $file_out = array();
		}
        return $file_out;
    }

    function createFile($text, $path = './orders_files/'){
        $filename = "text_file_".md5(time()).".txt";
        $fp = fopen($path.$filename, "w");
        fwrite($fp, $text);
        fclose($fp);
        return $filename;
    }
    
    function uploadFileAddOld($id, $path = '/tmp/files/'){

        set_time_limit(120);
        $uploaddir =  $_SERVER['DOCUMENT_ROOT'].$path;
		if (move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir .$_FILES['file']['name'])) {
			if(is_file($uploaddir.$_FILES['file']['name'])){
				rename($uploaddir.$_FILES['file']['name'], $uploaddir.md5($_FILES['file']['name'].$id).".txt");
			}
		    //print "File is valid, and was successfully uploaded.";
		    $file_out[0] = $_FILES['file']['name'];
            $file_out[1] = md5($_FILES['file']['name'].$id).".txt";
            return $file_out;
		} else {
		    //print "There some errors!";
		    return "";
		}
    }

    function uploadFileAdd($id, $path = '/tmp/files/'){

        set_time_limit(120);
        $uploaddir =  $_SERVER['DOCUMENT_ROOT'].$path;

        $ext = $this->getExtFile($_FILES['file']['name']);

        if($ext!=''){
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir .$_FILES['file']['name'])) {
                if(is_file($uploaddir.$_FILES['file']['name'])){
                    rename($uploaddir.$_FILES['file']['name'], $uploaddir.md5($_FILES['file']['name'].$id).".".$ext);
                }
                //print "File is valid, and was successfully uploaded.";
                $file_out[0] = $_FILES['file']['name'];
                //$file_out[0] = 'uploaded_file';
                $file_out[1] = md5($_FILES['file']['name'].$id).".".$ext;
                return $file_out;
            } else {
                //print "There some errors!";
                return "";
            }
        } else {
            return "";
        }
    }

    function uploadFileAddCustom($id, $counter='', $path = '/tmp/files/'){

        set_time_limit(120);
        $uploaddir =  $_SERVER['DOCUMENT_ROOT'].$path;

        $ext = $this->getExtFile($_FILES['file'.$counter]['name']);

        if($ext!=''){
            if (move_uploaded_file($_FILES['file'.$counter]['tmp_name'], $uploaddir .$_FILES['file'.$counter]['name'])) {
                if(is_file($uploaddir.$_FILES['file'.$counter]['name'])){
                    rename($uploaddir.$_FILES['file'.$counter]['name'], $uploaddir.md5($_FILES['file'.$counter]['name'].$id).".".$ext);
                }
                //print "File is valid, and was successfully uploaded.";
                $file_out['filename_original'] = $_FILES['file'.$counter]['name'];
                //$file_out[0] = 'uploaded_file';
                $file_out['filename'] = md5($_FILES['file'.$counter]['name'].$id).".".$ext;
                $file_out['ext'] = $ext;
                return $file_out;
            } else {
                //print "There some errors!";
                return "";
            }
        } else {
            return "";
        }
    }

    
    function uploadPicture($id, $path, $width='', $height='', $image_postfix=''){
        set_time_limit(120);
        require_once ('Uploader/class.upload.php');
        $allowedExt = array('jpeg', 'jpg', 'gif', 'png', 'bmp');
        $ext = substr($_FILES['image']['name'], - 3) && (substr($_FILES['image']['name'], - 4, - 3) == '.');

        if (in_array($ext, $allowedExt) && $_FILES['image']['name'] != ''){

           $Uploader = new upload($_FILES['image']);
           if($width==''&&$height==''){
             if ($Uploader->uploaded) {
                $Uploader->file_overwrite = true;
                $Uploader->file_auto_rename = false;
                $Uploader->image_convert = 'jpg';
                $Uploader->mime_check = true;
                $Uploader->file_new_name_body = md5($id).$image_postfix;
                $Uploader->Process($path);
				if ($Uploader->processed) {
					$image_original =  md5($id).$image_postfix;
				}
             }
           } else if($width==''&&$height!=''){

               if ($Uploader->uploaded) {
                   $Uploader->image_text_y = 0;
                   $Uploader->image_text_alignment = 'C';
                   $Uploader->file_overwrite = true;
                   $Uploader->file_auto_rename = false;
                   $Uploader->image_resize = true;
                   $Uploader->image_ratio_crop = true;
                   $Uploader->image_convert = 'jpg';
                   $Uploader->mime_check = true;
                   $Uploader->file_new_name_body = md5($id).$image_postfix;
                   //$Uploader->image_x = $width;
                   $Uploader->image_y = $height;
                   $Uploader->image_ratio_x = true;
                   $Uploader->Process($path);
                   if ($Uploader->processed) {
                       $image =  md5($id).$image_postfix;
                   }
               }
           } else if($width!=''&&$height==''){

               if ($Uploader->uploaded) {
                   $Uploader->image_text_y = 0;
                   $Uploader->image_text_alignment = 'C';
                   $Uploader->file_overwrite = true;
                   $Uploader->file_auto_rename = false;
                   $Uploader->image_resize = true;
                   $Uploader->image_ratio_crop = true;
                   $Uploader->image_convert = 'jpg';
                   $Uploader->mime_check = true;
                   $Uploader->file_new_name_body = md5($id).$image_postfix;
                   $Uploader->image_x = $width;
                   //$Uploader->image_y = $height;
                   $Uploader->image_ratio_y = true;
                   $Uploader->Process($path);
                   if ($Uploader->processed) {
                       $image =  md5($id).$image_postfix;
                   }
               }
           } else {

	            if ($Uploader->uploaded) {
	            	$Uploader->image_text_y = 0;
	            	$Uploader->image_text_alignment = 'C';
	                $Uploader->file_overwrite = true;
	                $Uploader->file_auto_rename = false;
	                $Uploader->image_resize = true;
	                $Uploader->image_ratio_crop = true;
	                $Uploader->image_convert = 'jpg';
	                $Uploader->mime_check = true;
	                $Uploader->file_new_name_body = md5($id).$image_postfix;
	                $Uploader->image_x = $width;
	                $Uploader->image_y = $height;
	                $Uploader->Process($path);
					if ($Uploader->processed) {
						$image =  md5($id).$image_postfix;
					}
	            }
           }
         }
         
        return md5($id);
    }

    function uploadCustomPicture($id, $fileCounter='', $path, $width='', $height='', $image_postfix=''){
        set_time_limit(120);
        require_once ('Uploader/class.upload.php');
        $allowedExt = array('jpeg', 'jpg', 'gif', 'png', 'bmp');
        $ext = substr($_FILES['image'.$fileCounter]['name'], - 3) && (substr($_FILES['image'.$fileCounter]['name'], - 4, - 3) == '.');

        if (in_array($ext, $allowedExt) && $_FILES['image'.$fileCounter]['name'] != ''){

            $Uploader = new upload($_FILES['image'.$fileCounter]);
            if($width==''&&$height==''){
                if ($Uploader->uploaded) {
                    $Uploader->file_overwrite = true;
                    $Uploader->file_auto_rename = false;
                    $Uploader->image_convert = 'jpg';
                    $Uploader->mime_check = true;
                    $Uploader->file_new_name_body = md5($id).$image_postfix;
                    $Uploader->Process($path);
                    if ($Uploader->processed) {
                        $image_original =  md5($id).$image_postfix;
                    }
                }
            } else if($width==''&&$height!=''){

                if ($Uploader->uploaded) {
                    $Uploader->image_text_y = 0;
                    $Uploader->image_text_alignment = 'C';
                    $Uploader->file_overwrite = true;
                    $Uploader->file_auto_rename = false;
                    $Uploader->image_resize = true;
                    $Uploader->image_ratio_crop = true;
                    $Uploader->image_convert = 'jpg';
                    $Uploader->mime_check = true;
                    $Uploader->file_new_name_body = md5($id).$image_postfix;
                    //$Uploader->image_x = $width;
                    $Uploader->image_y = $height;
                    $Uploader->image_ratio_x = true;
                    $Uploader->Process($path);
                    if ($Uploader->processed) {
                        $image =  md5($id).$image_postfix;
                    }
                }
            } else if($width!=''&&$height==''){

                if ($Uploader->uploaded) {
                    $Uploader->image_text_y = 0;
                    $Uploader->image_text_alignment = 'C';
                    $Uploader->file_overwrite = true;
                    $Uploader->file_auto_rename = false;
                    $Uploader->image_resize = true;
                    $Uploader->image_ratio_crop = true;
                    $Uploader->image_convert = 'jpg';
                    $Uploader->mime_check = true;
                    $Uploader->file_new_name_body = md5($id).$image_postfix;
                    $Uploader->image_x = $width;
                    //$Uploader->image_y = $height;
                    $Uploader->image_ratio_y = true;
                    $Uploader->Process($path);
                    if ($Uploader->processed) {
                        $image =  md5($id).$image_postfix;
                    }
                }
            } else {

                if ($Uploader->uploaded) {
                    $Uploader->image_text_y = 0;
                    $Uploader->image_text_alignment = 'C';
                    $Uploader->file_overwrite = true;
                    $Uploader->file_auto_rename = false;
                    $Uploader->image_resize = true;
                    $Uploader->image_ratio_crop = true;
                    $Uploader->image_convert = 'jpg';
                    $Uploader->mime_check = true;
                    $Uploader->file_new_name_body = md5($id).$image_postfix;
                    $Uploader->image_x = $width;
                    $Uploader->image_y = $height;
                    $Uploader->Process($path);
                    if ($Uploader->processed) {
                        $image =  md5($id).$image_postfix;
                    }
                }
            }
        }

        return md5($id);
    }
    
    public function getFile($path, $filename, $filename_original){
		$file = $path.$filename;
	    if (file_exists($file)) {
            // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
            // если этого не сделать файл будет читаться в память полностью!
            if (ob_get_level()) {
                ob_end_clean();
            }
		    header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header('Content-Disposition: attachment; filename='.basename($filename_original));
		    header('Content-Transfer-Encoding: binary');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		    header('Pragma: public');
		    header('Content-Length: ' . filesize($file));
		    ob_clean();
		    flush();
		    readfile($file);
	    	//exit;
		}
    }    

    public function getFile2($path, $filename, $id){
		$file = $path.$filename;
		$data = explode(md5($id)."_", $filename);

	    if (file_exists($file)) {
		    header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header('Content-Disposition: attachment; filename='.basename($data[1]));
		    header('Content-Transfer-Encoding: binary');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		    header('Pragma: public');
		    header('Content-Length: ' . filesize($file));
		    ob_clean();
		    flush();
		    readfile($file);
	    	exit;
		}
    }
    /**
     * @param $filename - path to file and filename
     * @return string
     */
    function docxToText($filename = 'tmp/test.docx'){
        $zip = new ZipArchive;
        if ($zip->open($filename) === TRUE) {
            $xmlString = $zip->getFromName('word/document.xml');
            $zip->close();
            return trim(strip_tags($xmlString));
        } else {
            return 'failed';
        }
    }

    function getDocxFileLettersCount($filename = 'tmp/test.docx'){
        $zip = new ZipArchive;
        if ($zip->open($filename) === TRUE) {
            $xmlString = $zip->getFromName('word/document.xml');
            $zip->close();
            return mb_strlen(trim(strip_tags($xmlString)),'utf8');
        } else {
            return 'failed';
        }
    }

    function getExtFile($filename){
        $data = @explode(".", $filename);
        if(isset($data[sizeof($data)-1])){
            return strtolower($data[sizeof($data)-1]);
        } else {
            return '';
        }
    }

}
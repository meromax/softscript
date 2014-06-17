<?php

/** Load YouTube remote video model */
include_once ROOT . 'application/models/YouTubeModel.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

/** Load Area Control model */
include_once ROOT . 'application/models/AreaControlModel.php';

/** Load Videos DB object model */
include_once ROOT . 'application/models/VideoDbModel.php';

/** Load XML Processor */
include_once ROOT . 'backend/xml/xmlProcessor.php';

class Api_VideoController extends System_Controller_Action
{
    /** Db object */
    private $YouTubeApi;
    
    private $AreaControl;
    
    private $VideosDb;

    public function init()
    {
        parent::init();
        $this -> YouTubeApi = new YouTube();
        $this -> AreaControl = new AreaControl();
        $this -> VideosDb = new Videos(); 
    }

    public function indexAction()
    {
        echo 'Bad request';
    }

    /**
     * Getting video file information from YouTube.com inn XML fromat
     * 
     * @return SimpleXMLElement || string ('Bad request')
     */
    public function YouTubeGetVideoAction()
    {
        if($id = $this -> _request -> getParam('ApiRequest'))
        {
            /** Validate YouTube link */
            if(list(, $tubeUrl) = explode('=', $id))
            {
                /** Change content-type to text/xml */
                $this -> getResponse() -> setHeader('Content-type', 'text/xml', true);
                $response = $this -> YouTubeApi -> getVideoById(trim($tubeUrl));

                /** SimpleXMLElement object */
                echo $response -> asXML();
            }
            else
                echo "Bad url!";
        }
        else
            echo 'Bad request';
    }
    
    /**
     * Getting video from database by id an user_id
     * and convert it to XML document
     */
    public function GetVideoAction()
    {
        if($id = $this -> _request -> getParam('ApiRequest'))
        {
            $userId = $this -> AreaControl -> getUserData() -> id;
            $video = $this -> VideosDb -> getVideoById($id, $userId);

            /** Change content-type to text/xml */
            $this -> getResponse() -> setHeader('Content-type', 'text/xml', true);
            
            if($video !== null)
            {
                $video = $video -> toArray();
                
                //foreach($video as $vid_ind => $vid_val)
                //{
                //    $video[$vid_ind] = stripcslashes($vid_val);
                    //echo $video[$vid];
                //}
                
                $xml = new XmlProcessor();
                echo $xml -> arrayToXml($video);
            }
            else
                echo 'Bad request!';
        }
        else
            echo 'Bad request';
    }
}
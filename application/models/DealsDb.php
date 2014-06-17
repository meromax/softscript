<?php

class DealsDb
{
    const DEALS_TABLE = 'deals';
    const DEALS_PER_PAGE  = 10;

    const DEALS_IMAGES_TABLE = 'deals_images';
    const DEALS_IMAGES_PER_PAGE  = 10;

    const DEALS_SECTIONS_TABLE = 'deals_sections';
    const DEALS_SECTIONS_PER_PAGE  = 10;

    const DEALS_CATEGORIES_TABLE = 'deals_categories';
    const DEALS_CATEGORIES_PER_PAGE  = 10;

    const DEALS_CITIES_TABLE = 'deals_cities';
    const DEALS_CITIES_PER_PAGE  = 20;

    const DEALS_COMMENTS_TABLE = 'deals_comments';
    const DEALS_COMMENTS_PER_PAGE  = 10;

    const DEALS_COMPANIES_TABLE = 'deals_companies';
    const DEALS_COMPANIES_PER_PAGE  = 10;

    const DEALS_COMPANIES_IMAGES_TABLE = 'deals_companies_images';
    const DEALS_COMPANIES_IMAGES_PER_PAGE  = 10;

    const DEALS_COUPONS_TABLE = 'deals_coupons';
    const DEALS_COUPONS_PER_PAGE  = 10;

    const DEALS_NOMINALS_TABLE = 'deals_nominals';
    const DEALS_NOMINALS_PER_PAGE  = 10;

    const DEALS_RECOMMENDED_TABLE = 'deals_recommended';

    const DEALS_SETTINGS_TABLE = 'deals_settings';


    protected $db;
    
    public function __construct(){
        $this -> db = Zend_Registry::get('db');
    }


    //****************************************************************************************************************//
    //****************************************** DEALS ***************************************************************//
    //****************************************************************************************************************//
    
    public function getDealByLink($link, $lang_id=1) {
        $sql = 'SELECT * FROM `'.self::DEALS_TABLE.'` WHERE lang_id='.$lang_id.' AND link="'.$link.'"';
        $data = $this -> db -> fetchRow($sql);

        $mainImage = $this->getProductMainImageById($data['id']);
        $data['image'] = $mainImage['image'];
        $data['image_title'] = $mainImage['title'];

        $data['images'] = $this->getAllProductsImages($data['id']);
        $data['files']  = $this->getAllProductsFiles($data['id']);
        return $data;
    }

    public function getAllDealsWithoutCurrent($curr_sec_id, $lang_id=1) {
        $sql = 'SELECT * FROM `'.self::DEALS_TABLE.'` WHERE lang_id='.$lang_id.' AND id!='.$curr_sec_id.' ORDER BY `position`';
        $data = $this -> db -> fetchAll($sql);
        for($i=0; $i<sizeof($data); $i++){
            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];

            $data[$i]['images'] = $this->getAllProductsImages($data[$i]['id']);
        }
        return $data;
    }

    public function checkUserAccessToProduct($userId, $productsId){
        $data = $this -> db -> fetchRow('SELECT * FROM '.self::DEALS_TABLE.' WHERE id = '.$productsId.' AND user_id='.$userId);
        if(!empty($data)){
            return true;
        } else {
            return false;
        }
    }

    public function getAllMainProducts($lang_id=1) {
        $sql = 'SELECT * FROM `'.self::DEALS_TABLE.'` WHERE lang_id='.$lang_id.' AND main=1 ORDER BY `post_date` DESC';
        $data = $this -> db -> fetchAll($sql);
        for($i=0; $i<sizeof($data); $i++){
            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];

            $data[$i]['images'] = $this->getAllProductsImages($data[$i]['id']);
        }
        return $data;
    }

    public function getMaxProductsPrice($lang_id=1) {
        $sql = 'SELECT MAX(price) AS max_price FROM `'.self::DEALS_TABLE.'` WHERE lang_id='.$lang_id.' AND main=1';
        $data = $this -> db -> fetchOne($sql);
        return $data;
    }

    public function getMinProductsPrice($lang_id=1) {
        $sql = 'SELECT MIN(price) AS min_price FROM `'.self::DEALS_TABLE.'` WHERE lang_id='.$lang_id.' AND main=1';
        $data = $this -> db -> fetchOne($sql);
        return $data;
    }

    public function getAllProducts($lang_id, $sectionId=0, $categoryId=0){
        if($sectionId==0){
            $add_sql = ' ';
        } else {
            $add_sql = ' AND section_id='.$sectionId.' AND category_id=0';
            if($categoryId!=0){
                $add_sql = ' AND section_id='.$sectionId.' AND category_id='.$categoryId;
            }
        }
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.$add_sql.' ORDER BY position');
        for($i=0; $i<sizeof($data); $i++){
            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];
            $data[$i]['images'] = $this->getAllProductsImages($data[$i]['id']);
        }
        return $data;
    }

    public function getAllProductsWithoutCurrentId($lang_id, $prodId, $sectionId=0, $categoryId=0){
        if($sectionId==0){
            $add_sql = ' ';
        } else {
            $add_sql = ' AND id!='.$prodId.' AND section_id='.$sectionId.' AND category_id=0';
            if($categoryId!=0){
                $add_sql = ' AND id!='.$prodId.' AND section_id='.$sectionId.' AND category_id='.$categoryId;
            }
        }
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.$add_sql.' ORDER BY position');
        for($i=0; $i<sizeof($data); $i++){

            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];
            $data[$i]['images'] = $this->getAllProductsImages($data[$i]['id']);
        }
        return $data;
    }

    public function get4ProductsWithoutCurrentId($lang_id, $prodId, $sectionId=0, $categoryId=0){
        if($sectionId==0){
            $add_sql = ' ';
        } else {
            $add_sql = ' AND id!='.$prodId.' AND section_id='.$sectionId.' AND category_id=0';
            if($categoryId!=0){
                $add_sql = ' AND id!='.$prodId.' AND section_id='.$sectionId.' AND category_id='.$categoryId;
            }
        }
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.$add_sql.' AND recommend=1 ORDER BY position');
        for($i=0; $i<sizeof($data); $i++){

            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];
            $data[$i]['images'] = $this->getAllProductsImages($data[$i]['id']);
        }
        return $data;
    }

    public function getLastProducts($lang_id, $limit=8){
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.' AND main=1 ORDER BY post_date DESC LIMIT 0,'.$limit);
        for($i=0; $i<sizeof($data); $i++){
            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];
            $data[$i]['images'] = $this->getAllProductsImages($data[$i]['id']);
        }
        return $data;
    }

    public function getAllProductsByUserId($lang_id, $user_id){
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.' AND main=1 AND user_id='.$user_id.' ORDER BY post_date DESC');
        for($i=0; $i<sizeof($data); $i++){
            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];
            $data[$i]['images'] = $this->getAllProductsImages($data[$i]['id']);
        }
        return $data;
    }

    public function getLast4Products($lang_id){

        $data =  $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.' AND active=1 ORDER BY post_date DESC LIMIT 0,4');
        for($i=0; $i<sizeof($data); $i++){

            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];
            $data[$i]['images'] = $this->getAllProductsImages($data[$i]['id']);
        }
        return $data;
    }

    public function getPopular4Products($lang_id, $active = 1){
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.' AND active='.$active.' ORDER BY popular DESC LIMIT 0,4');
        for($i=0; $i<sizeof($data); $i++){
            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];
            $data[$i]['images'] = $this->getAllProductsImages($data[$i]['id']);
        }
        return $data;
    }

    public function getActionsProducts($lang_id){

        $data =  $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.' AND active=1 AND action=1 ORDER BY post_date');
        for($i=0; $i<sizeof($data); $i++){

            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];
            $data[$i]['images'] = $this->getAllProductsImages($data[$i]['id']);
        }
        return $data;
    }


    public function getAllProductsByType($lang_id, $sectionId=0){
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$sectionId.' ORDER BY position');
        for($i=0; $i<sizeof($data); $i++){
            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];
            $data[$i]['images'] = $this->getAllProductsImages($data[$i]['id']);
        }
        return $data;
    }



    public function getDealsForPage($sectionId, $categoryId, $lang_id, $page_num, $limit = -1) {

        if($sectionId!=0){
            $add_sql = ' AND section_id='.$sectionId.' ';
            if($categoryId!=0){
                $add_sql .= ' AND category_id='.$categoryId.' ';
            }
        } else {
            $add_sql = ' ';
        }

        $limit = $limit == -1?self::DEALS_PER_PAGE:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.$add_sql.' ORDER BY post_date LIMIT '.($page_num*$limit).', '.$limit);
        for($i=0; $i<sizeof($data); $i++){
            $mainImage = $this->getDealMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];
            $data[$i]['images'] = $this->getAllDealImages($data[$i]['id']);
        }
        return $data;
    }


    public function getDealsPagesCount($sectionId, $categoryId, $lang_id) {
        if($sectionId!=0){
            $add_sql = ' AND section_id='.$sectionId.' ';
            if($categoryId!=0){
                $add_sql .= ' AND category_id='.$categoryId.' ';
            }
        } else {
            $add_sql = ' ';
        }


        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.$add_sql);
        return ceil($count['count']/self::DEALS_PER_PAGE);
    }

    public function getDealsFrontForPage($lang_id, $sectionId, $brandId, $page_num, $active = 1, $limit = -1) {
        if($sectionId!=0&&$brandId==0){
            $add_sql = ' AND section_id='.$sectionId.' ';
        } else if($sectionId!=0 && $brandId!=0){
            $add_sql = ' AND section_id='.$sectionId.' AND brand_id='.$brandId.' ';
        } else if($sectionId==0 && $brandId!=0){
            $add_sql = ' AND brand_id='.$brandId.' ';
        } else {
            $add_sql = ' ';
        }


        // ORDER BY
        $order_by_sql = " ORDER BY position ";

        // FILTER
        $filter_sql = "";
        $options_sql = " ";
        if(isset($_SESSION['filter']['currSec'.$sectionId])){


            $optionsSelected = $_SESSION['filter']['currSec'.$sectionId]['options'];

            $options = $this->getActiveOptionsProperties($optionsSelected);

            if($options){
                $pIds = $this->getProductsIdsByOptionsProperties($options);

                if(sizeof($pIds)>0){
                    $pIds = implode(",",$pIds);
                    $options_sql = " AND id IN ($pIds) ";
                } else {
                    $pIds = "";
                    $options_sql = " AND id IN (0) ";
                }
            }

            $priceFrom = $_SESSION['filter']['currSec'.$sectionId]['price_from'];
            $priceTo = $_SESSION['filter']['currSec'.$sectionId]['price_to'];

            if($priceFrom!=""&&$priceTo!=""&&$priceFrom<$priceTo){
                $filter_sql = " AND price>=".$priceFrom." AND price<=".$priceTo." ";
                $order_by_sql = " ORDER BY price ";
            } elseif($priceFrom!=""&&$priceTo==""){
                $filter_sql = " AND price>=".$priceFrom." ";
                $order_by_sql = " ORDER BY price ";
            } elseif($priceFrom==""&&$priceTo!=""){
                $filter_sql = " AND price<=".$priceTo." ";
                $order_by_sql = " ORDER BY price ";
            } else {
                $order_by_sql = " ORDER BY position ";
            }

        }

        $limit = $limit == -1?self::DEALS_PER_PAGE2:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id." AND active=".$active.$add_sql.$filter_sql.$options_sql.$order_by_sql.' LIMIT '.($page_num*$limit).', '.$limit);
        for($i=0; $i<sizeof($data); $i++){
            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];
            $data[$i]['images'] = $this->getAllDealImages($data[$i]['id']);
        }
        return $data;
    }



    public function getDealsFrontPagesCount($lang_id, $sectionId, $brandId, $active = 1) {
        if($sectionId!=0&&$brandId==0){
            $add_sql = ' AND section_id='.$sectionId.' ';
        } else if($sectionId!=0 && $brandId!=0){
            $add_sql = ' AND section_id='.$sectionId.' AND brand_id='.$brandId.' ';
        } else if($sectionId==0 && $brandId!=0){
            $add_sql = ' AND brand_id='.$brandId.' ';
        } else {
            $add_sql = ' ';
        }

        // FILTER
        $filter_sql = "";
        $options_sql = " ";
        if(isset($_SESSION['filter']['currSec'.$sectionId])){

            $optionsSelected = $_SESSION['filter']['currSec'.$sectionId]['options'];

            $options = $this->getActiveOptionsProperties($optionsSelected);

            if($options){
                $pIds = $this->getProductsIdsByOptionsProperties($options);

                if(sizeof($pIds)>0){
                    $pIds = implode(",",$pIds);
                    $options_sql = " AND id IN (".$pIds.") ";
                } else {
                    $pIds = "";
                    $options_sql = " AND id IN (0) ";
                }
            }

            $priceFrom = $_SESSION['filter']['currSec'.$sectionId]['price_from'];
            $priceTo = $_SESSION['filter']['currSec'.$sectionId]['price_to'];

            if($priceFrom!=""&&$priceTo!=""&&$priceFrom<$priceTo){
                $filter_sql = " AND price>=".$priceFrom." AND price<=".$priceTo." ";
                $order_by_sql = " ORDER BY price ";
            } elseif($priceFrom!=""&&$priceTo==""){
                $filter_sql = " AND price>=".$priceFrom." ";
                $order_by_sql = " ORDER BY price ";
            } elseif($priceFrom==""&&$priceTo!=""){
                $filter_sql = " AND price<=".$priceTo." ";
                $order_by_sql = " ORDER BY price ";
            } else {
                $order_by_sql = " ORDER BY position ";
            }

        }

        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id." AND active=".$active.$add_sql.$filter_sql.$options_sql);
        return ceil($count['count']/self::DEALS_PER_PAGE2);
    }

    public function getActiveOptionsProperties($optionsSelected){
        $options = array();
        $count = 0;
        for($i=0; $i<sizeof($optionsSelected); $i++){
            if($optionsSelected[$i]!=0){
                $options[$count] = $optionsSelected[$i];
                $count++;
            }
        }
        return $options;
    }

    public function add($data, $userId=0) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => trim($data['title']),
            'description'      => trim($data['description']),
            'addinfo'          => $data['addinfo'],
            'addinfo2'         => $data['addinfo2'],
            'video'            => $data['video'],
            'price'            => $data['price'],
            'old_price'        => $data['old_price'],
            'discount'         => $data['discount'],
            'meta_title'       => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords'    => $data['meta_keywords'],
            'meta_link_title'  => $data['meta_link_title'],
            'position'         => $data['position'],
            'lang_id'          => $data['lang_id'],
            'section_id'       => $data['section'],
//            'brand_id'         => $data['brand'],
            'category_id'      => $data['category'],
            'main'             => $data['main'],
            'user_id'          => $userId,
            'post_date'        => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::DEALS_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function modify($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => trim($data['title']),
            'description'      => trim($data['description']),
            'addinfo'          => $data['addinfo'],
            'addinfo2'         => $data['addinfo2'],
            'video'            => $data['video'],
            'price'            => $data['price'],
            'old_price'        => $data['old_price'],
            'discount'         => $data['discount'],
            'meta_title'       => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords'    => $data['meta_keywords'],
            'meta_link_title'  => $data['meta_link_title'],
            'position'         => $data['position'],
            'section_id'       => $data['section'],
//            'brand_id'         => $data['brand'],
            'category_id'      => $data['category'],
            'main'             => $data['main'],
            'lang_id'          => $data['lang_id']
        );
        $this -> db -> update(self::DEALS_TABLE, $dataArray, 'id = '.$data['id']);
    }

    public function updateImage($id, $filename){
        $this -> db -> update(self::DEALS_TABLE, array('image' => $filename), 'id = '.$id);
    }

    public function updateDealHash($id){
        $this -> db -> update(self::DEALS_TABLE, array('hash' => md5($id)), 'id = '.$id);
    }

    public function addImageRecord($product_id, $main=0) {
        $dataArray = array(
            'product_id'    => $product_id,
            'main'          => $main
        );
        $this -> db ->insert(self::DEALS_IMAGES_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function updateImageRecord($id, $filename, $title) {
        $dataArray = array(
            'title' => $title,
            'image' => $filename
        );
        $this -> db -> update(self::DEALS_IMAGES_TABLE, $dataArray, 'id = '.$id);
    }

    public function setImageMainStatus($id, $status) {
        $this -> db -> update(self::DEALS_IMAGES_TABLE, array('main' => $status), 'id = '.$id);
    }

    public function getDealMainImageById($dealId) {
        $data = $this -> db -> fetchRow('SELECT * FROM '.self::DEALS_IMAGES_TABLE.' WHERE deal_id = ? AND main=1', $dealId);
        return $data;
    }

    public function getDealMainImageDataById($productId) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::DEALS_IMAGES_TABLE.' WHERE product_id = ? AND main=1', $productId);
    }

    public function getAllDealImages($dealId){
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_IMAGES_TABLE.' WHERE deal_id = ? ORDER BY id', $dealId);
    }

    public function getImageById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::DEALS_IMAGES_TABLE.' WHERE id = ?', $id);
    }

    public function deleteImageById($id){
        $this -> db -> delete(self::DEALS_IMAGES_TABLE, 'id = '.$id);
    }


    public function addFileRecord($product_id) {
        $dataArray = array(
            'product_id'    => $product_id
        );
        $this -> db ->insert(self::DEALS_FILES_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function updateFileRecord($id, $file) {
        $dataArray = array(
            'title'             => $file['title'],
            'filename'          => $file['filename'],
            'filename_original' => $file['filename_original'],
            'ext'               => $file['ext']
        );
        $this -> db -> update(self::DEALS_FILES_TABLE, $dataArray, 'id = '.$id);

    }

    public function getAllProductsFiles($productId){
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_FILES_TABLE.' WHERE product_id = ? ORDER BY id', $productId);
    }

    public function getFileById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::DEALS_FILES_TABLE.' WHERE id = ?', $id);
    }

    public function deleteFileById($id){
        $this -> db -> delete(self::DEALS_FILES_TABLE, 'id = '.$id);
    }


    public function delete($id){
        $this -> db -> delete(self::DEALS_TABLE, 'id = '.$id);
        unlink('images/products/'.md5($id).'_small.jpg');
        unlink('images/products/'.md5($id).'_big.jpg');
    }

    public function getProductById($id) {
        $data = $this -> db -> fetchRow('SELECT * FROM '.self::DEALS_TABLE.' WHERE id = ?', $id);

        $mainImage = $this->getProductMainImageById($data['id']);
        $data['image'] = $mainImage['image'];
        $data['image_title'] = $mainImage['title'];
        $data['images'] = $this->getAllProductsImages($id);
        return $data;
    }

    public function getProductByHash($hash) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::DEALS_TABLE.' WHERE hash = ?', $hash);
    }


    public function searchByWord($lang_id, $search){
        $sql = 'SELECT * FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.' AND MATCH(title, description, din) AGAINST("'.$search.'")';
        $data = $this -> db -> fetchAll($sql);
        for($i=0; $i<sizeof($data); $i++){

            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];
            $data[$i]['images'] = $this->getAllProductsImages($data[$i]['id']);
        }
        return $data;
    }

    public function searchByWordLike($lang_id, $search){
        $sql = 'SELECT * FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.' AND (title LIKE "%'.$search.'%" OR description LIKE "%'.$search.'%" OR meta_title LIKE "%'.$search.'%" OR meta_keywords LIKE "%'.$search.'%")';
        $data = $this -> db -> fetchAll($sql);
        for($i=0; $i<sizeof($data); $i++){
            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];
            $data[$i]['images'] = $this->getAllProductsImages($data[$i]['id']);
        }
        return $data;
    }


    public function searchMaxProductsPrice($search, $lang_id=1) {
        $sql = 'SELECT MAX(price) AS max_price FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.' AND (title LIKE "%'.$search.'%" OR description LIKE "%'.$search.'%" OR meta_title LIKE "%'.$search.'%" OR meta_keywords LIKE "%'.$search.'%")';
        $data = $this -> db -> fetchOne($sql);
        return $data;
    }

    public function searchMinProductsPrice($search, $lang_id=1) {
        $sql = 'SELECT MIN(price) AS min_price FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.' AND (title LIKE "%'.$search.'%" OR description LIKE "%'.$search.'%" OR meta_title LIKE "%'.$search.'%" OR meta_keywords LIKE "%'.$search.'%")';
        $data = $this -> db -> fetchOne($sql);
        return $data;
    }



    public function searchByWordLike2($lang_id, $search, $excludeIds){
        if($excludeIds==''){
            $addSql = '';
        } else {
            $addSql = ' AND id NOT IN ('.$excludeIds.') ';
        }

        $sql = 'SELECT * FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id.$addSql.' AND (title LIKE "%'.$search.'%" OR meta_keywords LIKE "%'.$search.'%")';
        $data = $this -> db -> fetchAll($sql);
        for($i=0; $i<sizeof($data); $i++){
            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];
            $data[$i]['images'] = $this->getAllProductsImages($data[$i]['id']);
        }
        return $data;
    }
//    public function changeRecommend($id){
//        $this -> db -> query('UPDATE '.self::DEALS_TABLE.' SET `recommend` = NOT `recommend` WHERE id = ?', $id);
//    }
    public function changeRecommend($id){
        $this -> db -> query('UPDATE '.self::DEALS_TABLE.' SET `active` = NOT `active` WHERE id = ?', $id);
    }

    public function changeAction($id){
        $this -> db -> query('UPDATE '.self::DEALS_TABLE.' SET `action` = NOT `action` WHERE id = ?', $id);
    }


    //****************************************************************************************************************//
    //****************************************** DEALS SECTIONS ******************************************************//
    //****************************************************************************************************************//

    public function getSectionByLink($link, $lang_id=1) {
        $sql = 'SELECT *, UPPER(title) AS titleUpper FROM `'.self::DEALS_SECTIONS_TABLE.'` WHERE lang_id='.$lang_id.' AND link="'.$link.'"';
        return $this -> db -> fetchRow($sql);
    }

    public function getAllSectionsWithoutCurrent($curr_sec_id, $lang_id=1) {
        $sql = 'SELECT * FROM `'.self::DEALS_SECTIONS_TABLE.'` WHERE lang_id='.$lang_id.' AND id!='.$curr_sec_id.' ORDER BY `position`';
        return $this -> db -> fetchAll($sql);
    }

    public function getAllSections($lang_id){
        return $this -> db -> fetchAll('SELECT *, UPPER(title) AS titleUpper FROM '.self::DEALS_SECTIONS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position');
    }

    public function getAllSectionsByType($lang_id, $type=0){
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_SECTIONS_TABLE.' WHERE lang_id='.$lang_id.' AND type='.$type.' ORDER BY position');
    }

    public function getSectionsForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::DEALS_SECTIONS_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_SECTIONS_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
    }

    public function getSectionsPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::DEALS_SECTIONS_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::DEALS_SECTIONS_PER_PAGE);
    }

    public function createSection($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short'=> $data['description_short'],
            'description'      => $data['description'],
            'meta_title'       => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords'    => $data['meta_keywords'],
            'meta_link_title'  => $data['meta_link_title'],
            'position'         => $data['position'],
            'lang_id'          => $data['lang_id'],
            'type'             => $data['section_type'],
            'template'         => $data['template'],
            'post_date'        => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::DEALS_SECTIONS_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function modifySection($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short'=> $data['description_short'],
            'description'      => $data['description'],
            'meta_title'       => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords'    => $data['meta_keywords'],
            'meta_link_title'  => $data['meta_link_title'],
            'position'		   => $data['position'],
            'type'             => $data['section_type'],
            'template'         => $data['template'],
            'lang_id'     => $data['lang_id']
        );
        $this -> db -> update(self::DEALS_SECTIONS_TABLE, $dataArray, 'id = '.$data['id']);
    }

    public function updateSectionsImage($id, $filename){
        $this -> db -> update(self::DEALS_SECTIONS_TABLE, array('image' => $filename), 'id = '.$id);
    }

    public function deleteSection($id){
        $this -> db -> delete(self::DEALS_SECTIONS_TABLE, 'id = '.$id);
    }

    public function getSectionById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::DEALS_SECTIONS_TABLE.' WHERE id = ?', $id);
    }

    public function addSectionOption($sectionId, $optionId) {
        $dataArray = array(
            'section_id'  => $sectionId,
            'option_id'   => $optionId
        );
        $this -> db ->insert(self::SECTIONS_OPTIONS_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function deleteSectionOptions($sectionId){
        $this -> db -> delete(self::SECTIONS_OPTIONS_TABLE, 'section_id = '.$sectionId);
    }

    public function getSectionOptions($sectionId){
        return $this -> db -> fetchAll('SELECT * FROM '.self::SECTIONS_OPTIONS_TABLE.' WHERE section_id = '.$sectionId);
    }

    public function getSectionOptionsIds($sectionId){
        $data = $this->getSectionOptions($sectionId);

        $optionsIds = array();
        foreach($data as $value){
            $optionsIds[] = $value['option_id'];
        }
        return implode(",", $optionsIds);
    }
    

    //****************************************************************************************************************//
    //****************************************** DEALS CATEGORIES ****************************************************//
    //****************************************************************************************************************//

    public function getSubSectionByLink($link, $lang_id=1) {
        $sql = 'SELECT * FROM `'.self::DEALS_CATEGORIES_TABLE.'` WHERE lang_id='.$lang_id.' AND link="'.$link.'"';
        return $this -> db -> fetchRow($sql);
    }

    public function getAllSubSections($section_id, $lang_id){
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_CATEGORIES_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$section_id.' ORDER BY position');
    }

    public function getLast6SubSections($sections_ids, $lang_id){
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_CATEGORIES_TABLE.' WHERE lang_id='.$lang_id.' AND section_id IN ('.$sections_ids.') ORDER BY post_date DESC LIMIT 0,6');
    }

    public function getSubSectionsForPage($section_id, $lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::DEALS_CATEGORIES_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_CATEGORIES_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$section_id.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
    }

    public function getSubSectionsPagesCount($section_id, $lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::DEALS_CATEGORIES_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$section_id);
        return ceil($count['count']/self::DEALS_CATEGORIES_PER_PAGE);
    }

    public function getSubSectionsCustomForPage($section_id, $lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::DEALS_CATEGORIES_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_CATEGORIES_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$section_id.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
    }

    public function getSubSectionsCustomPagesCount($section_id, $lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::DEALS_CATEGORIES_TABLE.' WHERE lang_id='.$lang_id.' AND section_id='.$section_id);
        return ceil($count['count']/self::DEALS_CATEGORIES_PER_PAGE);
    }

    public function getSubSectionsAllForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::DEALS_CATEGORIES_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_CATEGORIES_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY section_id LIMIT '.($page_num*$limit).', '.$limit);
    }

    public function getSubSectionsAllPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::DEALS_CATEGORIES_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::DEALS_CATEGORIES_PER_PAGE);
    }

    public function createSubSection($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short'=> $data['description_short'],
            'description'      => $data['description'],
            'meta_title'       => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords'    => $data['meta_keywords'],
            'meta_link_title'  => $data['meta_link_title'],
            'position'         => $data['position'],
            'lang_id'          => $data['lang_id'],
            'post_date'        => new Zend_Db_Expr('NOW()'),
            'section_id'       => $data['section_id']
        );
        $this -> db ->insert(self::DEALS_CATEGORIES_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function modifySubSection($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short'=> $data['description_short'],
            'description'      => $data['description'],
            'meta_title'       => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords'    => $data['meta_keywords'],
            'meta_link_title'  => $data['meta_link_title'],
            'position'         => $data['position'],
            'lang_id'          => $data['lang_id'],
            'section_id'       => $data['section_id']
        );
        $this -> db -> update(self::DEALS_CATEGORIES_TABLE, $dataArray, 'id = '.$data['id']);
    }

    public function updateImage2($id, $filename){
        $this -> db -> update(self::DEALS_CATEGORIES_TABLE, array('image' => $filename), 'id = '.$id);
    }

    public function deleteSubSection($id){
        $this -> db -> delete(self::DEALS_CATEGORIES_TABLE, 'id = '.$id);
    }

    public function getSubSectionById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::DEALS_CATEGORIES_TABLE.' WHERE id = ?', $id);
    }


    //****************************************************************************************************************//
    //****************************************** DEALS COMPANIES *****************************************************//
    //****************************************************************************************************************//

    public function getCompanyByLink($link, $lang_id=1) {
        $sql = 'SELECT * FROM `'.self::DEALS_COMPANIES_TABLE.'` WHERE lang_id='.$lang_id.' AND link="'.$link.'"';
        return $this -> db -> fetchRow($sql);
    }

    public function getAllCompaniesWithoutCurrent($curr_sec_id, $lang_id=1) {
        $sql = 'SELECT * FROM `'.self::DEALS_COMPANIES_TABLE.'` WHERE lang_id='.$lang_id.' AND id!='.$curr_sec_id.' ORDER BY `position`';
        return $this -> db -> fetchAll($sql);
    }

    public function getAllCompanies($lang_id){
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_COMPANIES_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position');
    }

    public function getAllCompaniesByType($lang_id, $type=0){
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_COMPANIES_TABLE.' WHERE lang_id='.$lang_id.' AND type='.$type.' ORDER BY position');
    }

    public function getCompaniesForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::DEALS_SECTIONS_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_COMPANIES_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
    }

    public function getCompaniesPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::DEALS_COMPANIES_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::DEALS_COMPANIES_PER_PAGE);
    }

    public function createCompany($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short'=> $data['description_short'],
            'description'      => $data['description'],
            'meta_title'       => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords'    => $data['meta_keywords'],
            'meta_link_title'  => $data['meta_link_title'],
            'position'         => $data['position'],
            'lang_id'          => $data['lang_id'],
            'post_date'        => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::DEALS_COMPANIES_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function modifyCompany($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short'=> $data['description_short'],
            'description'      => $data['description'],
            'meta_title'       => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords'    => $data['meta_keywords'],
            'meta_link_title'  => $data['meta_link_title'],
            'position'		   => $data['position'],
            'lang_id'     => $data['lang_id']
        );
        $this -> db -> update(self::DEALS_COMPANIES_TABLE, $dataArray, 'id = '.$data['id']);
    }

    public function updateCompaniesImage($id, $filename){
        $this -> db -> update(self::DEALS_COMPANIES_TABLE, array('image' => $filename), 'id = '.$id);
    }

    public function deleteCompany($id){
        $this -> db -> delete(self::DEALS_COMPANIES_TABLE, 'id = '.$id);
    }

    public function getCompanyById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::DEALS_COMPANIES_TABLE.' WHERE id = ?', $id);
    }


    //****************************************************************************************************************//
    //****************************************** DEALS COMPANIES *****************************************************//
    //****************************************************************************************************************//

    public function getCityByLink($link, $lang_id=1) {
        $sql = 'SELECT * FROM `'.self::DEALS_CITIES_TABLE.'` WHERE lang_id='.$lang_id.' AND link="'.$link.'"';
        return $this -> db -> fetchRow($sql);
    }

    public function getAllCitiesWithoutCurrent($curr_sec_id, $lang_id=1) {
        $sql = 'SELECT * FROM `'.self::DEALS_CITIES_TABLE.'` WHERE lang_id='.$lang_id.' AND id!='.$curr_sec_id.' ORDER BY `position`';
        return $this -> db -> fetchAll($sql);
    }

    public function getAllCities($lang_id){
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_CITIES_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position');
    }

    public function getAllCitiesByType($lang_id, $type=0){
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_CITIES_TABLE.' WHERE lang_id='.$lang_id.' AND type='.$type.' ORDER BY position');
    }

    public function getCitiesForPage($lang_id, $page_num, $limit = -1) {
        $limit = $limit == -1?self::DEALS_CITIES_PER_PAGE:$limit;
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_CITIES_TABLE.' WHERE lang_id='.$lang_id.' ORDER BY position LIMIT '.($page_num*$limit).', '.$limit);
    }

    public function getCitiesPagesCount($lang_id) {
        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::DEALS_CITIES_TABLE.' WHERE lang_id='.$lang_id);
        return ceil($count['count']/self::DEALS_CITIES_PER_PAGE);
    }

    public function createCity($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short'=> $data['description_short'],
            'description'      => $data['description'],
            'meta_title'       => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords'    => $data['meta_keywords'],
            'meta_link_title'  => $data['meta_link_title'],
            'position'         => $data['position'],
            'lang_id'          => $data['lang_id'],
            'post_date'        => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::DEALS_CITIES_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function modifyCity($data) {
        $dataArray = array(
            'link'             => $data['link'],
            'title'            => $data['title'],
            'description_short'=> $data['description_short'],
            'description'      => $data['description'],
            'meta_title'       => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords'    => $data['meta_keywords'],
            'meta_link_title'  => $data['meta_link_title'],
            'position'		   => $data['position'],
            'lang_id'     => $data['lang_id']
        );
        $this -> db -> update(self::DEALS_CITIES_TABLE, $dataArray, 'id = '.$data['id']);
    }

    public function updateCitiesImage($id, $filename){
        $this -> db -> update(self::DEALS_CITIES_TABLE, array('image' => $filename), 'id = '.$id);
    }

    public function deleteCity($id){
        $this -> db -> delete(self::DEALS_CITIES_TABLE, 'id = '.$id);
    }

    public function getCityById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::DEALS_CITIES_TABLE.' WHERE id = ?', $id);
    }


    //****************************************************************************************************************//
    //****************************************** DEALS SETTINGS ******************************************************//
    //****************************************************************************************************************//

    public function updateSettings($settings, $lang_id) {
        $data = array(
            'value'       => $settings
        );
        $this -> db -> update(self::DEALS_SETTINGS_TABLE, $data, 'lang_id='.$lang_id);
    }

    public function getSettingsById($lang_id) {
        $data = $this -> db -> fetchRow('SELECT value FROM '.self::DEALS_SETTINGS_TABLE.' WHERE id=?', $lang_id);
        return json_decode($data['value']);
    }


    /************************************************************************************************/
    /************************************* REVIEWS **************************************************/
    /************************************************************************************************/
    public function getProductsReviews($productId){
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_REVIEWS_TABLE.' WHERE product_id = ? AND active=1 ORDER BY post_date DESC', $productId);
    }

    public function getProductsReviewsComments($reviewId){
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_REVIEWS_COMMENTS_TABLE.' WHERE review_id = ? AND active=1 ORDER BY post_date', $reviewId);
    }

    public function getProductsReviews2($productId){
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_REVIEWS_TABLE.' WHERE product_id = ? ORDER BY post_date DESC', $productId);
    }

    public function getProductsReviewsComments2($reviewId){
        return $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_REVIEWS_COMMENTS_TABLE.' WHERE review_id = ? ORDER BY post_date', $reviewId);
    }

    public function addReview($data) {
        $dataArray = array(
            'description'      => $data['description'],
            'user_id'          => $data['user_id'],
            'username'         => $data['username'],
            'product_id'       => $data['product_id'],
            'post_date'        => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::DEALS_REVIEWS_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function addReviewComment($data) {
        $dataArray = array(
            'description'      => $data['description'],
            'user_id'          => $data['user_id'],
            'username'         => $data['username'],
            'review_id'        => $data['review_id'],
            'post_date'        => new Zend_Db_Expr('NOW()')
        );
        $this -> db ->insert(self::DEALS_REVIEWS_COMMENTS_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function changeReviewActive($id){
        $this -> db -> query('UPDATE '.self::DEALS_REVIEWS_TABLE.' SET `active` = NOT `active` WHERE id = ?', $id);
    }

    public function getProductReviewById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::DEALS_REVIEWS_TABLE.' WHERE id = ?', $id);
    }

    public function changeReviewCommentActive($id){
        $this -> db -> query('UPDATE '.self::DEALS_REVIEWS_COMMENTS_TABLE.' SET `active` = NOT `active` WHERE id = ?', $id);
    }

    public function getReviewCommentById($id) {
        return $this -> db -> fetchRow('SELECT * FROM '.self::DEALS_REVIEWS_COMMENTS_TABLE.' WHERE id = ?', $id);
    }

    public function deleteReview($id){
        $this -> db -> delete(self::DEALS_REVIEWS_TABLE, 'id = '.$id);
    }
    public function deleteAllReviewComments($id){
        $this -> db -> delete(self::DEALS_REVIEWS_COMMENTS_TABLE, 'review_id = '.$id);
    }
    public function deleteReviewComment($id){
        $this -> db -> delete(self::DEALS_REVIEWS_COMMENTS_TABLE, 'id = '.$id);
    }

    /************************************************************************************************/
    /************************************* PRODUCTS OPTIONS *****************************************/
    /************************************************************************************************/
    public function addProductOptions($productId, $optionId, $propertyId) {
        $dataArray = array(
            'product_id'  => $productId,
            'option_id'   => $optionId,
            'property_id' => $propertyId
        );
        $this -> db ->insert(self::DEALS_OPTIONS_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function deleteProductOptions($productId){
        $this -> db -> delete(self::DEALS_OPTIONS_TABLE, 'product_id = '.$productId);
    }

    public function getProductsOptionsPropertiesIds($productsId){
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_OPTIONS_TABLE.' WHERE product_id = ?', $productsId);
        $pIds = array();
        foreach($data as $value){
            $pIds[] = $value['property_id'];
        }
        return $pIds;
    }

    public function getProductsIdsByOptionsProperties($optionsSelected){
//        echo $optionsSelected[1]."<br />";

        //test
//        $optionsSelected = array(0 => "8:9", 1 => "13:38");
        //$optionsSelected = array(0 => "13:38");

        $addSql = "";
        for($i=0; $i<sizeof($optionsSelected); $i++){
            $optPropData = explode(":", $optionsSelected[$i]);
            if($i==0){
                $addSql .= " (option_id=".$optPropData[0]." AND property_id=".$optPropData[1].") ";
            } else {
                $addSql .= " OR (option_id=".$optPropData[0]." AND property_id=".$optPropData[1].") ";
            }

        }
        //echo "SELECT product_id FROM ".self::DEALS_OPTIONS_TABLE." WHERE ".$addSql; die();
        $data = $this -> db -> fetchAll("SELECT product_id FROM ".self::DEALS_OPTIONS_TABLE." WHERE ".$addSql);

//        echo "<pre>";
//        print_r($data);
//        echo "<hr>";
//        die();
        $neededCount = sizeof($optionsSelected);

        $productsIds = array();

        for($i=0; $i<sizeof($data); $i++){
            $productsIds[] = $data[$i]['product_id'];
        }

        if(sizeof($productsIds)>0){

            $productsIds = array_count_values($productsIds);

            $productsIdsNeeded = array();

            foreach($productsIds as $key => $value){
                if($value==$neededCount){
                    $productsIdsNeeded[] = $key;
                }
            }
        }




//        echo "<pre>";
//        print_r($productsIdsNeeded);
//        echo "<hr>";
//        die();


//        echo "<pre>";
//        print_r($optionsSelected);
//        echo "<hr>";
////
//        echo "<pre>";
//        print_r($productsIds);
//        die();
        return $productsIdsNeeded;
    }

    /************************************************************************************************/
    /************************************* RECOMMENDED PRODUCTS *************************************/
    /************************************************************************************************/

    public function getRecommendedProductsIds($product_id){
        $recommendedIds = $this -> db -> fetchAll('SELECT pr_id FROM '.self::DEALS_RECOMMENDED_TABLE.' WHERE product_id='.$product_id.' ORDER BY id DESC');

        for($i=0; $i<sizeof($recommendedIds); $i++){
            $recommendedIds[$i] = $recommendedIds[$i]['pr_id'];
        }

        return implode(",", $recommendedIds);
    }

    public function getRecommendedProducts($product_id){
        $recommendedIds = $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_RECOMMENDED_TABLE.' WHERE product_id='.$product_id.' ORDER BY id DESC');

        $recommendedProducts = array();

        for($i=0; $i<sizeof($recommendedIds); $i++){
            $pData = $this->getProductById($recommendedIds[$i]['pr_id']);
            $mainImage = $this->getProductMainImageById($recommendedIds[$i]['pr_id']);

            $pData['image'] = $mainImage['image'];
            $pData['image_title'] = $mainImage['title'];

            $recommendedProducts[] = $pData;
        }

        return $recommendedProducts;
    }

    public function getActiveRecommendedProducts($product_id, $limit=0){
        if($limit==0){
            $recommendedIds = $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_RECOMMENDED_TABLE.' WHERE product_id='.$product_id.' ORDER BY id DESC');
        } else {
            $recommendedIds = $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_RECOMMENDED_TABLE.' WHERE product_id='.$product_id.' ORDER BY id DESC LIMIT 0,'.$limit);
        }


        $recommendedProducts = array();

        for($i=0; $i<sizeof($recommendedIds); $i++){
            $pData = $this->getProductById($recommendedIds[$i]['pr_id']);
            $mainImage = $this->getProductMainImageById($recommendedIds[$i]['pr_id']);

            $pData['image'] = $mainImage['image'];
            $pData['image_title'] = $mainImage['title'];
            if($pData['active']==1){
                $recommendedProducts[] = $pData;
            }

        }

        return $recommendedProducts;
    }

    public function getActiveProductsFromCategoryWithoutCurrent($product_id, $category_id){
        $categoryProducts = $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_TABLE.' WHERE id!='.$product_id.' AND category_id='.$category_id.' AND active=1 AND main!=1 ORDER BY id DESC');

        for($i=0; $i<sizeof($categoryProducts); $i++){
            $mainImage = $this->getProductMainImageById($categoryProducts[$i]['id']);

            $categoryProducts[$i]['image'] = $mainImage['image'];
            $categoryProducts[$i]['image_title'] = $mainImage['title'];

        }
        return $categoryProducts;
    }

    public function addRecommendedProduct($productId, $prId) {
        $dataArray = array(
            'product_id' => $productId,
            'pr_id'      => $prId
        );
        $this -> db ->insert(self::DEALS_RECOMMENDED_TABLE, $dataArray);
        return $this -> db -> lastInsertId();
    }

    public function deleteRecommendedProducts($productId){
        $this -> db -> delete(self::DEALS_RECOMMENDED_TABLE, 'product_id = '.$productId);
    }

    /************************************************************************************************/
    /************************************* RECOMMENDED PRODUCTS *************************************/
    /************************************************************************************************/

    public function getBrandsIdsWithProductsBySectionId($sectionsId) {
        return $this -> db -> fetchAll('SELECT DISTINCT(brand_id) FROM '.self::DEALS_TABLE.' WHERE section_id = ?', $sectionsId);
    }

    public function getProductsCountByBrandIdAndSectionId($brandId ,$sectionId, $active=1) {
        if($active==1){
            $add_sql = " AND active=1";
        } else {
            $add_sql = " AND active=0";
        }
        $data = $this -> db -> fetchRow('SELECT COUNT(brand_id) AS product_count FROM '.self::DEALS_TABLE.' WHERE brand_id = ? AND section_id=?'.$add_sql, array($brandId, $sectionId));
        return $data['product_count'];
    }




    /************************************************************************************************/
    /************************************* FRONT CATALOG ITEMS **************************************/
    /************************************************************************************************/

    public function getProductsFrontSCForPage($lang_id, $sectionId, $categoryId, $page_num, $active = 1, $limit = -1) {
        if($sectionId!=0&&$categoryId==0){
            $add_sql = ' AND section_id='.$sectionId.' AND main=1 ';
        } else if($sectionId!=0 && $categoryId!=0){
            $add_sql = ' AND section_id='.$sectionId.' AND category_id='.$categoryId.' AND main=1 ';
        } else {
            $add_sql = ' ';
        }


        // ORDER BY
        $order_by_sql = " ORDER BY position ";

        // FILTER
        $filter_sql = "";
        $options_sql = " ";
        if(isset($_SESSION['filter']['currSec'.$sectionId])){


            $optionsSelected = $_SESSION['filter']['currSec'.$sectionId]['options'];

            $options = $this->getActiveOptionsProperties($optionsSelected);

            if($options){
                $pIds = $this->getProductsIdsByOptionsProperties($options);
//                echo "<pre>";
//                print_r($pIds);
//                die();
                if(sizeof($pIds)>0){
                    $pIds = implode(",",$pIds);
                    $options_sql = " AND id IN ($pIds) ";
                } else {
                    $pIds = "";
                    $options_sql = " AND id IN (0) ";
                }
            }
//            echo "<pre>";
//            print_r($options);
//
//            echo "<br />";
//            echo "<pre>";
//            print_r($pIds);
//            die();


            $priceFrom = $_SESSION['filter']['currSec'.$sectionId]['price_from'];
            $priceTo = $_SESSION['filter']['currSec'.$sectionId]['price_to'];

            if($priceFrom!=""&&$priceTo!=""&&$priceFrom<$priceTo){
                $filter_sql = " AND price>=".$priceFrom." AND price<=".$priceTo." ";
                $order_by_sql = " ORDER BY price ";
            } elseif($priceFrom!=""&&$priceTo==""){
                $filter_sql = " AND price>=".$priceFrom." ";
                $order_by_sql = " ORDER BY price ";
            } elseif($priceFrom==""&&$priceTo!=""){
                $filter_sql = " AND price<=".$priceTo." ";
                $order_by_sql = " ORDER BY price ";
            } else {
                $order_by_sql = " ORDER BY position ";
            }

        }

        $limit = $limit == -1?self::DEALS_PER_PAGE2:$limit;
        $data = $this -> db -> fetchAll('SELECT * FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id." AND active=".$active.$add_sql.$filter_sql.$options_sql.$order_by_sql.' LIMIT '.($page_num*$limit).', '.$limit);
        for($i=0; $i<sizeof($data); $i++){
            $mainImage = $this->getProductMainImageById($data[$i]['id']);
            $data[$i]['image'] = $mainImage['image'];
            $data[$i]['image_title'] = $mainImage['title'];
            $data[$i]['images'] = $this->getAllProductsImages($data[$i]['id']);
        }
        return $data;
    }

    public function getProductsFrontSCPagesCount($lang_id, $sectionId, $categoryId, $active = 1) {
        if($sectionId!=0&&$categoryId==0){
            $add_sql = ' AND section_id='.$sectionId.' AND main=1 ';
        } else if($sectionId!=0 && $categoryId!=0){
            $add_sql = ' AND section_id='.$sectionId.' AND category_id='.$categoryId.' AND main=1';
        } else {
            $add_sql = ' ';
        }

        // FILTER
        $filter_sql = "";
        $options_sql = " ";
        if(isset($_SESSION['filter']['currSec'.$sectionId])){
//            echo "<pre>";
//            print_r($_SESSION['currSec'.$sectionId]);
            $optionsSelected = $_SESSION['filter']['currSec'.$sectionId]['options'];

            $options = $this->getActiveOptionsProperties($optionsSelected);

            if($options){
                $pIds = $this->getProductsIdsByOptionsProperties($options);

                if(sizeof($pIds)>0){
                    $pIds = implode(",",$pIds);
                    $options_sql = " AND id IN (".$pIds.") ";
                } else {
                    $pIds = "";
                    $options_sql = " AND id IN (0) ";
                }
            }

            $priceFrom = $_SESSION['filter']['currSec'.$sectionId]['price_from'];
            $priceTo = $_SESSION['filter']['currSec'.$sectionId]['price_to'];

            if($priceFrom!=""&&$priceTo!=""&&$priceFrom<$priceTo){
                $filter_sql = " AND price>=".$priceFrom." AND price<=".$priceTo." ";
                $order_by_sql = " ORDER BY price ";
            } elseif($priceFrom!=""&&$priceTo==""){
                $filter_sql = " AND price>=".$priceFrom." ";
                $order_by_sql = " ORDER BY price ";
            } elseif($priceFrom==""&&$priceTo!=""){
                $filter_sql = " AND price<=".$priceTo." ";
                $order_by_sql = " ORDER BY price ";
            } else {
                $order_by_sql = " ORDER BY position ";
            }

            //die();
        }

        $count = $this -> db -> fetchRow('SELECT count(*) as count FROM '.self::DEALS_TABLE.' WHERE lang_id='.$lang_id." AND active=".$active.$add_sql.$filter_sql.$options_sql);
        return ceil($count['count']/self::DEALS_PER_PAGE2);
    }

    public function setForSlider($images){
        $slider = array();
        $flag = 0;
        $counter = 0;

        for($i=0; $i<sizeof($images); $i++){

            $slider[$counter][] = $images[$i];
            $flag ++;

            if($flag>3){
                $counter ++;
                $flag =0;
            }

        }

        return $slider;
    }


}
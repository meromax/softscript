<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/SectionsDb.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

include_once ROOT . 'application/models/FilesDb.php';

include_once ROOT . 'application/models/ProductsDb.php';

include_once ROOT . 'application/models/OptionsDb.php';

include_once ROOT . 'application/models/BrandsDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_ProductsController extends System_Controller_AdminAction
{
    private $sections;
    private $content;
    private $File;
    private $products;

    private $options;
    private $brands;
    
    public function init() {
        parent::init();
        
        /** Check for user access */
        if(!AdminAreaControl::checkAccess()){
         	$this -> _redirect('/admin');	
        } else {
	        $this -> sections = new SectionsDb();
	        $this -> content = new ContentManagerDb();
	        $this->File = new FilesDb();
            $this->products = new ProductsDb();

            $this->options = new OptionsDb();
            $this->brands = new BrandsDb();
        }

        $this -> smarty -> assign('adminLeftMenu', 'products');
        $this -> smarty -> assign('adminLeftMenuSub', 'products');
    }    

    public function indexAction() {
        if($this->_hasParam('section')){
            $sectionId = $this->_getParam('section');
        } else {
            $sectionId = 0;
        }

        if($this->_hasParam('category')){
            $categoryId = $this->_getParam('category');
        } else {
            $categoryId = 0;
        }

//        if($this->_hasParam('brand')){
//            $brandId = $this->_getParam('brand');
//        } else {
//            $brandId = 0;
//        }

		if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> products ->getProductsPagesCount($sectionId, $categoryId, $this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this -> products ->getProductsPagesCount($sectionId, $categoryId, $this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/admin/products/index/section/0/brand/0/page/1");
		}
		$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('sections', $this -> sections -> getAllSections($this->lang_id));
        $this -> smarty -> assign('curr_section',$sectionId);

        $this -> smarty -> assign('categories', $this -> sections -> getAllSubSections($sectionId, $this->lang_id));
        $this -> smarty -> assign('curr_category',$categoryId);


        $this -> smarty -> assign('products', $this -> products -> getProductsForPage($sectionId, $categoryId, $this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> products ->getProductsPagesCount($sectionId, $categoryId, $this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/products/items_list.tpl');
        $this -> smarty -> assign('Title', 'Products List');
        $this -> smarty -> display('admin/index.tpl');
    }
    
    public function addAction() {
        $this -> smarty -> assign('action', 'add');
        
        
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('sections', $this -> sections -> getAllSections($this->lang_id));

            $this -> smarty -> assign('brands', $this -> brands -> getAllBrands($this->lang_id));


            $this -> smarty -> assign('PageBody', 'admin/products/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Products Manager: Add Product');
            $this -> smarty -> display('admin/index.tpl');
        } else {
        	$dataArray = $this->_getAllParams();
            if($this->_hasParam('main')){
                $dataArray['main'] = 1;
            } else {
                $dataArray['main'] = 0;
            }
        	$dataArray['lang_id'] = $this->lang_id;
            $productId = $this -> products -> add($dataArray);
            $this -> products -> updateProductHash($productId);
            // set options
            $this->setOptions($productId, $dataArray['option']);

            // set recommended products
            $this->setRecommendedProducts($productId, $dataArray['recommendedIds']);
            
            for($i=1; $i<6; $i++){

                if(isset($_FILES['image'.$i]['name'])&&$_FILES['image'.$i]['name']!=""){
                    if($i==1){
                        $pImageRecId = $this -> products ->addImageRecord($productId,1);
                    } else {
                        $pImageRecId = $this -> products ->addImageRecord($productId);
                    }
                    $filename = $this -> File -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '540', '378', '_big');
                    $this -> File -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '270', '189', '_middle');
                    $this -> File -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '88', '62', '_small');
                    $this -> File -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '96', '96', '_square');

                    if($filename!=""){
                        $title = $dataArray['image_title'.$i];
                        $this -> products -> updateImageRecord($pImageRecId, $filename, $title);
                    }
                }

                if(isset($_FILES['file'.$i]['name'])&&$_FILES['file'.$i]['name']!=""){

                    $pFileRecId = $this -> products ->addFileRecord($productId);

                    $fileFilename = $this -> File -> uploadFileAddCustom($pFileRecId, $i);
                    if($fileFilename!=""){
                        $fileFilename['title'] = $dataArray['file_title'.$i];
                        $this -> products -> updateFileRecord($pFileRecId, $fileFilename);
                    }
                }
            }


            
            $this->_redirect('/admin/products/index/section/'.$this->_getParam('section').'/page/1');
        }
    }
    
    public function modifyAction() {
        $this->checkProductForId();
        $this -> smarty -> assign('action', 'modify');
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('sections', $this -> sections -> getAllSections($this->lang_id));
            $this -> smarty -> assign('brands', $this -> brands -> getAllBrands($this->lang_id));

            $product = $this -> products -> getProductById($this -> _getParam('id'));
            $product['files'] = $this -> products -> getAllProductsFiles($this -> _getParam('id'));
            $this -> smarty -> assign('item', $product);
            $this -> smarty -> assign('id', $this -> _getParam('id'));


            $this -> smarty -> assign('options', $options = $this -> options -> getAllOptionWithProperties($this->lang_id));

            $this -> smarty -> assign('productsRecommendedSelected', $productsRecommendedSelected = $this -> products -> getRecommendedProducts($this -> _getParam('id')));

            $this -> smarty -> assign('recommendedIds', $rIds =$this -> products -> getRecommendedProductsIds($this -> _getParam('id')));

            $this -> smarty -> assign('PageBody', 'admin/products/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Modify Product: '.$product['title']);
            $this -> smarty -> display('admin/index.tpl');
        } else {

        	$dataArray = $this->_getAllParams();

            if($this->_hasParam('main')){
                $dataArray['main'] = 1;
            } else {
                $dataArray['main'] = 0;
            }

        	$dataArray['lang_id'] = $this->lang_id;
        	$dataArray['id'] = $this -> _getParam('id');

            // set options
            $this->setOptions($dataArray['id'], $dataArray['option']);

            // set recommended products
            $this->setRecommendedProducts($dataArray['id'], $dataArray['recommendedIds']);

        	$this -> products -> modify($dataArray);

            $this -> products -> updateProductHash($this -> _getParam('id'));

        	for($i=1; $i<6; $i++){

                if(isset($_FILES['image'.$i]['name'])&&$_FILES['image'.$i]['name']!=""){

                    $pImageRecId = $this -> products ->addImageRecord($this -> _getParam('id'));
                    $filename = $this -> File -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '540', '378', '_big');
                    $this -> File -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '270', '189', '_middle');
                    $this -> File -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '88', '62', '_small');
                    $this -> File -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '96', '96', '_square');

                    if($filename!=""){
                        $title = $dataArray['image_title'.$i];
                        $this -> products -> updateImageRecord($pImageRecId, $filename, $title);
                    }
                }

                if(isset($_FILES['file'.$i]['name'])&&$_FILES['file'.$i]['name']!=""){
                    $pFileRecId = $this -> products ->addFileRecord($this -> _getParam('id'));

                    $fileFilename = $this -> File -> uploadFileAddCustom($pFileRecId, $i);

                    if($fileFilename!=""){
                        $fileFilename['title'] = $dataArray['file_title'.$i];
                        $this -> products -> updateFileRecord($pFileRecId, $fileFilename);
                    }
                }
            }
            $this->_redirect('/admin/products/index/page/1');
        }
    }

    public function setOptions($productId, $options){
        $this -> products -> deleteProductOptions($productId);
        foreach($options as $value){
            if($value!='0'){
                $opIds = explode("-", $value);
                $this -> products -> addProductOptions($productId, $opIds[0], $opIds[1]);
            }
        }
    }

    public function setRecommendedProducts($productId, $recommendedIds){
        if($recommendedIds!=''){
            $this -> products -> deleteRecommendedProducts($productId);
            $recommendedIdsArray = explode(",", $recommendedIds);

            foreach($recommendedIdsArray as $value){
                $this -> products -> addRecommendedProduct($productId, $value);
            }
        }
    }

    public function getFileAction(){
        $fileId = $this->_getParam('id');
        $file = $this -> products -> getFileById($fileId);
        $path = './tmp/files/';
        $this -> File -> getFile($path, $file['filename'], $file['filename_original']);
    }

    public function delFileAction(){
        $fileId = $this->_getParam('id');
        $file = $this -> products -> getFileById($fileId);
        $path = './tmp/files/';
        @unlink($path.$file['filename']);
        $this -> products -> deleteFileById($fileId);
        echo 1;
    }



    public function delImageAction(){
        $imageId = $this->_getParam('id');
        $pImage = $this -> products -> getImageById($imageId);
        $path = './images/products/';
        @unlink($path.$pImage['image'].".jpg");
        $this -> products -> deleteImageById($imageId);
        echo 1;
    }

    public function setMainImageAction(){
        $productId = $this->_getParam('product_id');
        $mainImageData = $this -> products -> getProductMainImageDataById($productId);
        $this -> products -> setImageMainStatus($mainImageData['id'], 0);

        $imageId = $this->_getParam('id');
        $this -> products -> setImageMainStatus($imageId, 1);

        echo $mainImageData['id'];
    }
    
    private function checkProductForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/products/index/page/1');
        }
    }
    
    public function deleteAction() {
        $this->checkProductForId();

        $pImages = $this -> products -> getAllProductsImages($this -> _getParam('id'));
        $path = './images/products/';
        for($i=0; $i<sizeof($pImages); $i++){
            @unlink($path.$pImages[$i]['image'].".jpg");
            $this -> products -> deleteImageById($pImages[$i]['id']);
        }

        $pFiles = $this -> products -> getAllProductsFiles($this -> _getParam('id'));
        $path = './tmp/files/';
        for($i=0; $i<sizeof($pFiles); $i++){
            @unlink($path.$pFiles[$i]['filename']);
            $this -> products -> deleteFileById($pFiles[$i]['id']);
        }

        $this -> products -> delete($this -> _getParam('id'));
        $this -> _redirect('/admin/products/index/page/1');
    }

    public function changeRecommendAction(){
        $this -> products -> changeRecommend($this->_getParam('id'));
        $prod = $this -> products -> getProductById($this->_getParam('id'));
        echo (int)$prod['active'];
    }

    public function changeActionAction(){
        $this -> products -> changeAction($this->_getParam('id'));
        $prod = $this -> products -> getProductById($this->_getParam('id'));
        echo (int)$prod['action'];
    }

    public function reviewsAction() {
        $this -> smarty -> assign('product', $this -> products -> getProductById($this->_getParam('product_id')));
        $productReviews = $this -> products -> getProductsReviews2($this->_getParam('product_id'));

        for($i=0; $i<sizeof($productReviews); $i++){
            $productReviews[$i]['comments'] = $this -> products -> getProductsReviewsComments2($productReviews[$i]['id']);
        }

        $this -> smarty -> assign('productReviews', $productReviews);

        $this -> smarty -> assign('PageBody', 'admin/products/reviews/items_list.tpl');
        $this -> smarty -> assign('Title', 'Products Reviews List');
        $this -> smarty -> display('admin/index.tpl');
    }

    public function changeReviewActiveAction(){
        $this -> products -> changeReviewActive($this->_getParam('id'));
        $pr = $this -> products -> getProductReviewById($this->_getParam('id'));
        echo (int)$pr['active'];
    }

    public function changeCommentActiveAction(){
        $this -> products -> changeReviewCommentActive($this->_getParam('id'));
        $rc = $this -> products -> getReviewCommentById($this->_getParam('id'));
        echo (int)$rc['active'];
    }


    public function deleteReviewAction() {
        $this -> products -> deleteReview($this -> _getParam('review_id'));
        $this -> products -> deleteAllReviewComments($this -> _getParam('review_id'));
        $this -> _redirect('/admin/products/reviews/product_id/'.$this -> _getParam('product_id').'/page/1');
    }

    public function deleteReviewCommentAction() {
        $this -> products -> deleteReviewComment($this -> _getParam('comment_id'));
        $this -> _redirect('/admin/products/reviews/product_id/'.$this -> _getParam('product_id').'/page/1');
    }

    public function ajaxGetOptionsPropertiesAction(){
        ob_start();
        $sectionId = $this->_getParam('section_id');
        $productId = $this->_getParam('product_id');
        $options = $this -> getOptions($sectionId);


        if(sizeof($options)>0){
            if($productId!=0){
                $pIds = $this -> products -> getProductsOptionsPropertiesIds($productId);

//                echo "<pre>";
//                print_r($pIds);
//                die();
//
//                echo "<pre>";
//                print_r($options);
//                die();

                for($i=0; $i<sizeof($options); $i++){
                    for($j=0; $j<sizeof($options[$i]['properties']); $j++){
                        $options[$i]['properties'][$j]['selected'] = (int)in_array($options[$i]['properties'][$j]['id'], $pIds);
                    }
                }
            }

            $this -> smarty -> assign('options', $options);
            $optionsHtml = $this -> smarty -> fetch('admin/products/options.tpl');
        } else {
            $optionsHtml = '<b style="color: red;">Для выбранного раздела вы забыли отметить опции...</b>';
        }


//        echo "<pre>";
//        print_r($options);
//        die();

        ob_clean();
        echo $optionsHtml;

    }

    public function getOptions($sectionId, $productId=0, $langId=1){
        $optionsIds = $this -> sections -> getSectionOptionsIds($sectionId);

        $options = $this -> options ->getAllOptionWithPropertiesCustom($optionsIds, $productId, $langId);

        return $options;
    }


    public function ajaxGetRecommendedProductsAction(){
        ob_start();
        $productSearch = $this->_getParam('product_search');

        $excludeIds = $this->_getParam('prSelIds');

        if(sizeof($productSearch)>0){
            $productsRecommended = $this -> products -> searchByWordLike2($this->lang_id, $productSearch, $excludeIds);
            $this -> smarty -> assign('productsRecommended', $productsRecommended);
            $optionsHtml = $this -> smarty -> fetch('admin/products/products_recommended.tpl');
        } else {
            $optionsHtml = '<b style="color: red;">Если ничего не нашло, введите более точное название...</b>';
        }

        ob_clean();
        echo $optionsHtml;

    }

    public function ajaxGetRecProdItemAction(){
        if($this->_hasParam('pr_id')&&$this->_getParam('pr_id')!=''){
            $this -> smarty -> assign('prs', $this->products-> getProductById($this -> _getParam('pr_id')));
            $pRItem = $this -> smarty -> fetch('admin/products/products_recommended_item.tpl');
            echo $pRItem;
        } else {
            echo "";
        }
    }

    public function ajaxDelProductRecommendAction(){

    }

    public function ajaxShowProductsRecommendListAction(){

    }
}
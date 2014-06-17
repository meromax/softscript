<?php

include_once ROOT . 'application/models/AdminAreaControlModel.php';

include_once ROOT . 'application/models/SectionsDb.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

include_once ROOT . 'application/models/FilesDb.php';

include_once ROOT . 'application/models/DealsDb.php';

include_once ROOT . 'application/models/OptionsDb.php';

include_once ROOT . 'application/models/BrandsDb.php';

/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_AdminAction');
class Admin_DealsController extends System_Controller_AdminAction
{
    private $sections;
    private $content;
    private $File;
    private $deals;

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
            $this->deals = new DealsDb();

            $this->options = new OptionsDb();
            $this->brands = new BrandsDb();
        }

        $this -> smarty -> assign('adminLeftMenu', 'deals');
        $this -> smarty -> assign('adminLeftMenuSub', 'deals');
    }


    //****************************************************************************************************************//
    //****************************************** DEALS ***************************************************************//
    //****************************************************************************************************************//

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

        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> deals ->getDealsPagesCount($sectionId, $categoryId, $this->lang_id)<=1 ))
            ||($this->_getParam('page')>1&&$this -> deals ->getDealsPagesCount($sectionId, $categoryId, $this->lang_id)<$this->_getParam('page'))
        ){
            $this->_redirect("/admin/deals/index/page/1");
        }

        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('sections', $this -> deals -> getAllSections($this->lang_id));
        $this -> smarty -> assign('curr_section',$sectionId);

        $this -> smarty -> assign('categories', $this -> deals -> getAllSubSections($sectionId, $this->lang_id));
        $this -> smarty -> assign('curr_category',$categoryId);


        $this -> smarty -> assign('deals', $this -> deals -> getDealsForPage($sectionId, $categoryId, $this->lang_id, $page));

        $this -> smarty -> assign('countpage', $this -> deals ->getDealsPagesCount($sectionId, $categoryId, $this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/deals/items_list.tpl');
        $this -> smarty -> assign('title', 'Список акций');
        $this -> smarty -> display('admin/index.tpl');
    }

    public function addAction() {
        $this -> smarty -> assign('action', 'add');


        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('sections', $this -> deals -> getAllSections($this->lang_id));

            $this -> smarty -> assign('PageBody', 'admin/deals/add_modify_item.tpl');
            $this -> smarty -> assign('title', 'Добавление/Редактирование акции');
            $this -> smarty -> display('admin/index.tpl');
        } else {
            $dataArray = $this->_getAllParams();
            if($this->_hasParam('main')){
                $dataArray['main'] = 1;
            } else {
                $dataArray['main'] = 0;
            }
            $dataArray['lang_id'] = $this->lang_id;
            $dealId = $this -> deals -> add($dataArray);
            $this -> deals -> updateDealHash($dealId);
            // set options
            $this->setOptions($dealId, $dataArray['option']);

            // set recommended products
            $this->setRecommendedProducts($dealId, $dataArray['recommendedIds']);

            for($i=1; $i<6; $i++){

                if(isset($_FILES['image'.$i]['name'])&&$_FILES['image'.$i]['name']!=""){
                    if($i==1){
                        $pImageRecId = $this -> deals ->addImageRecord($dealId,1);
                    } else {
                        $pImageRecId = $this -> deals ->addImageRecord($dealId);
                    }
                    $filename = $this -> File -> uploadCustomPicture($pImageRecId, $i, ROOT."images/deals/", '540', '378', '_big');
                    $this -> File -> uploadCustomPicture($pImageRecId, $i, ROOT."images/deals/", '270', '189', '_middle');
                    $this -> File -> uploadCustomPicture($pImageRecId, $i, ROOT."images/deals/", '88', '62', '_small');
                    $this -> File -> uploadCustomPicture($pImageRecId, $i, ROOT."images/deals/", '96', '96', '_square');

                    if($filename!=""){
                        $title = $dataArray['image_title'.$i];
                        $this -> deals -> updateImageRecord($pImageRecId, $filename, $title);
                    }
                }

                if(isset($_FILES['file'.$i]['name'])&&$_FILES['file'.$i]['name']!=""){

                    $pFileRecId = $this -> deals ->addFileRecord($dealId);

                    $fileFilename = $this -> File -> uploadFileAddCustom($pFileRecId, $i);
                    if($fileFilename!=""){
                        $fileFilename['title'] = $dataArray['file_title'.$i];
                        $this -> deals -> updateFileRecord($pFileRecId, $fileFilename);
                    }
                }
            }

            $this->_redirect('/admin/deals/index/section/'.$this->_getParam('section').'/page/1');
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


    //****************************************************************************************************************//
    //****************************************** DEALS SECTIONS ******************************************************//
    //****************************************************************************************************************//

    public function sectionsAction() {
        $this -> smarty -> assign('adminLeftMenu', 'deals');
        $this -> smarty -> assign('adminLeftMenuSub', 'deals_sections');

        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> deals ->getSectionsPagesCount($this->lang_id)<=1 ))
            ||($this->_getParam('page')>1&&$this -> deals ->getSectionsPagesCount($this->lang_id)<$this->_getParam('page'))
        ){
            $this->_redirect("/admin/deals/sections/page/1");
        }

        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('sections', $this -> deals -> getSectionsForPage($this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> deals ->getSectionsPagesCount($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/deals/sections/items_list.tpl');
        $this -> smarty -> assign('title', 'Разделы акций');
        $this -> smarty -> display('admin/index.tpl');
    }

    public function addsectionAction() {

        $this -> smarty -> assign('adminLeftMenu', 'deals');
        $this -> smarty -> assign('adminLeftMenuSub', 'deals_sections');

        $this -> smarty -> assign('action', 'addsection');

        if( !$this->_hasParam('step') ) {

            $this -> smarty -> assign('PageBody', 'admin/deals/sections/add_modify_item.tpl');
            $this -> smarty -> assign('title', 'Добавление/Удаление раздела');
            $this -> smarty -> display('admin/index.tpl');
        } else {
            $dataArray = $this->_getAllParams();
            $dataArray['lang_id'] = $this->lang_id;


            $section_id = $this -> deals -> createSection($dataArray);

            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($section_id, ROOT."images/deals/sections/", '393', '259', '_big');
                $this -> File -> uploadPicture($section_id, ROOT."images/deals/sections/", '288', '190', '_middle');
                $this -> File -> uploadPicture($section_id, ROOT."images/deals/sections/", '88', '58', '_small');
                $this -> File -> uploadPicture($section_id, ROOT."images/deals/sections/", '96', '96', '_square');
                $this -> File -> uploadPicture($section_id, ROOT."images/deals/sections/", '800', '527', '_large');

                if($filename!=""){
                    $this -> deals -> updateSectionsImage($section_id, $filename);
                }
            }

            $this->_redirect('/admin/deals/sections/page/1');
        }
    }

    public function modifysectionAction() {

        $this -> smarty -> assign('adminLeftMenu', 'deals');
        $this -> smarty -> assign('adminLeftMenuSub', 'deals_sections');

        $this->checkSectionForId();
        $this -> smarty -> assign('action', 'modifysection');
        if( !$this->_hasParam('step') ) {

            $this -> smarty -> assign('item', $section = $this -> deals -> getSectionById($this -> _getParam('id')));
            $this -> smarty -> assign('id', $this -> _getParam('id'));

            $this -> smarty -> assign('PageBody', 'admin/deals/sections/add_modify_item.tpl');
            $this -> smarty -> assign('title', 'Изменение раздела: '.$section['title']);
            $this -> smarty -> display('admin/index.tpl');
        } else {
            $dataArray = $this->_getAllParams();
            $dataArray['lang_id'] = $this->lang_id;
            $dataArray['id'] = $this -> _getParam('id');


            $this -> deals -> modifySection($dataArray);

            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/sections/", '393', '259', '_big');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/sections/", '288', '190', '_middle');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/sections/", '88', '58', '_small');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/sections/", '96', '96', '_square');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/sections/", '800', '527', '_large');
                if($filename!=""){
                    $this -> deals -> updateImage($this -> _getParam('id'), $filename);
                }
            }

            $this->_redirect('/admin/deals/sections/page/1');
        }
    }

    private function checkSectionForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/deals/sections/page/1');
        }
    }

    public function deletesectionAction() {
        $this->checkSectionForId();
        $this -> deals -> deleteSection($this -> _getParam('id'));
        $this -> _redirect('/admin/deals/sections/page/1');
    }


    //****************************************************************************************************************//
    //****************************************** DEALS CATEGORIES ****************************************************//
    //****************************************************************************************************************//

    public function categoriesAction() {

        $this -> smarty -> assign('adminLeftMenu', 'deals');
        $this -> smarty -> assign('adminLeftMenuSub', 'deals_sections');

        $section_id = $this->_getParam('section_id');
        $this -> smarty -> assign('section_id', $section_id);
        $spage = $this->_getParam('spage');
        $this -> smarty -> assign('spage', $spage);

        $this -> smarty -> assign('section', $this->deals->getSectionById($section_id));

        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> deals ->getSubSectionsPagesCount($section_id, $this->lang_id)<=1 ))
            ||($this->_getParam('page')>1&&$this -> deals ->getSubSectionsPagesCount($section_id, $this->lang_id)<$this->_getParam('page'))
        ){
            $this->_redirect("/admin/deals/categories/section_id/".$section_id."/spage/".$spage."/page/1");
        }
        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;

        $this -> smarty -> assign('categories', $this -> deals -> getSubSectionsForPage($section_id, $this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> deals ->getSubSectionsPagesCount($section_id, $this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/deals/categories/items_list.tpl');
        $this -> smarty -> assign('Title', 'Список категорий');
        $this -> smarty -> display('admin/index.tpl');
    }

    public function addcategoryAction() {

        $this -> smarty -> assign('adminLeftMenu', 'deals');
        $this -> smarty -> assign('adminLeftMenuSub', 'deals_sections');

        $this -> smarty -> assign('action', 'addcategory');

        $section_id = $this->_getParam('section_id');
        $this -> smarty -> assign('section_id', $section_id);
        $spage = $this->_getParam('spage');
        $this -> smarty -> assign('spage', $spage);

        $this -> smarty -> assign('section', $this->deals->getSectionById($section_id));

        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('PageBody', 'admin/deals/categories/add_modify_item.tpl');
            $this -> smarty -> assign('title', 'Добавление категории');
            $this -> smarty -> display('admin/index.tpl');
        } else {
            $dataArray = $this->_getAllParams();
            $dataArray['lang_id'] = $this->lang_id;
            $sub_section_id = $this -> deals -> createSubSection($dataArray);
            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($sub_section_id, ROOT."images/deals/categories/", '393', '259', '_big');
                $this -> File -> uploadPicture($sub_section_id, ROOT."images/deals/categories/", '288', '190', '_middle');
                $this -> File -> uploadPicture($sub_section_id, ROOT."images/deals/categories/", '88', '58', '_small');
                $this -> File -> uploadPicture($sub_section_id, ROOT."images/deals/categories/", '96', '96', '_square');
                $this -> File -> uploadPicture($sub_section_id, ROOT."images/deals/categories/", '800', '527', '_large');

                if($filename!=""){
                    $this -> deals -> updateImage2($sub_section_id, $filename);
                }
            }

            $this->_redirect("/admin/deals/categories/section_id/".$section_id."/spage/".$spage."/page/1");
        }
    }

    public function modifycategoryAction() {

        $this -> smarty -> assign('adminLeftMenu', 'deals');
        $this -> smarty -> assign('adminLeftMenuSub', 'deals_sections');

        $this->checkCategoryForId();
        $this -> smarty -> assign('action', 'modifycategory');

        $section_id = $this->_getParam('section_id');
        $this -> smarty -> assign('section_id', $section_id);
        $spage = $this->_getParam('spage');
        $this -> smarty -> assign('spage', $spage);

        $this -> smarty -> assign('section', $this->deals->getSectionById($section_id));

        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('item', $category = $this -> deals -> getSubSectionById($this -> _getParam('id')));
            $this -> smarty -> assign('id', $this -> _getParam('id'));
            $this -> smarty -> assign('PageBody', 'admin/deals/categories/add_modify_item.tpl');
            $this -> smarty -> assign('Title', 'Изменение категррии: '.$category['title']);
            $this -> smarty -> display('admin/index.tpl');
        } else {
            $dataArray = $this->_getAllParams();
            $dataArray['lang_id'] = $this->lang_id;
            $dataArray['id'] = $this -> _getParam('id');
            $dataArray['section_id'] = $section_id;
            $this -> deals -> modifySubSection($dataArray);

            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/categories/", '393', '259', '_big');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/categories/", '288', '190', '_middle');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/categories/", '88', '58', '_small');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/categories/", '96', '96', '_square');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/categories/", '800', '527', '_large');

                if($filename!=""){
                    $this -> deals -> updateImage2($this -> _getParam('id'), $filename);
                }
            }

            $this->_redirect("/admin/deals/categories/section_id/".$section_id."/spage/".$spage."/page/1");
        }
    }

    private function checkCategoryForId() {
        $section_id      = $this->_getParam('section_id');
        $spage           = $this->_getParam('spage');

        if( !$this -> _hasParam('id') ) {
            $this->_redirect("/admin/deals/categories/section_id/".$section_id."/spage/".$spage."/page/1");
        }
    }

    public function deletecategoryAction() {
        $this->checkSectionForId();
        $section_id      = $this->_getParam('section_id');
        $spage           = $this->_getParam('spage');
        $content_page_id = $this->_getParam('content_page_id');
        $this -> deals -> deleteSubSection($this -> _getParam('id'));
        $this->_redirect("/admin/deals/categories/section_id/".$section_id."/spage/".$spage."/page/1");
    }

    public function getcategoriesAction(){
        $section_id = $this->_getParam('section_id');
        $cat_selected_id = $this->_getParam('cat_selected_id');
        $categories = $this->deals->getAllSubSections($section_id, $this->lang_id);
        $out = '<option value="0"> --------------- </option>';
        for($i=0; $i<sizeof($categories); $i++){
            if($categories[$i]['id']==$cat_selected_id){
                $out .= '<option value="'.$categories[$i]['id'].'" selected>'.stripslashes(strip_tags($categories[$i]['title'])).'</option>';
            } else {
                $out .= '<option value="'.$categories[$i]['id'].'">'.stripslashes(strip_tags($categories[$i]['title'])).'</option>';
            }

        }
        ob_clean();
        echo $out;

    }

    public function ajaxGetCategoriesAction(){
        $sectionId = $this->_getParam('section_id');
        $categoryId = $this->_getParam('category_id');

        $categories = $this->deals->getAllSubSections($sectionId, $this->lang_id);
        ob_start();
        $out_str  = '<select id="category" name="category" class="span2 m-wrap">';
        if($categoryId==0){
            $out_str .= '<option value="0" selected="selected"> ------------------- </option>';
        } else {
            $out_str .= '<option value="0"> ------------------- </option>';
        }

        for($i=0; $i<sizeof($categories); $i++){
            if($categoryId==$categories[$i]['id']){
                $out_str .= '<option value="'.$categories[$i]['id'].'" selected="selected">'.stripslashes($categories[$i]['title']).'</option>';
            } else {
                $out_str .= '<option value="'.$categories[$i]['id'].'">'.stripslashes($categories[$i]['title']).'</option>';
            }
        }
        $out_str .= '</select>';
        ob_clean();
        echo $out_str;

    }

    //****************************************************************************************************************//
    //****************************************** DEALS COMPANIES *****************************************************//
    //****************************************************************************************************************//

    public function companiesAction() {
        $this -> smarty -> assign('adminLeftMenu', 'deals');
        $this -> smarty -> assign('adminLeftMenuSub', 'deals_companies');

        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> deals ->getCompaniesPagesCount($this->lang_id)<=1 ))
            ||($this->_getParam('page')>1&&$this -> deals ->getCompaniesPagesCount($this->lang_id)<$this->_getParam('page'))
        ){
            $this->_redirect("/admin/deals/companies/page/1");
        }

        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('sections', $this -> deals -> getCompaniesForPage($this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> deals ->getCompaniesPagesCount($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/deals/companies/items_list.tpl');
        $this -> smarty -> assign('title', 'Компании');
        $this -> smarty -> display('admin/index.tpl');
    }

    public function addcompanyAction() {

        $this -> smarty -> assign('adminLeftMenu', 'deals');
        $this -> smarty -> assign('adminLeftMenuSub', 'deals_companies');

        $this -> smarty -> assign('action', 'addcompany');

        if( !$this->_hasParam('step') ) {

            $this -> smarty -> assign('PageBody', 'admin/deals/companies/add_modify_item.tpl');
            $this -> smarty -> assign('title', 'Добавление/Удаление компании');
            $this -> smarty -> display('admin/index.tpl');
        } else {
            $dataArray = $this->_getAllParams();
            $dataArray['lang_id'] = $this->lang_id;


            $section_id = $this -> deals -> createCompany($dataArray);

            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($section_id, ROOT."images/deals/companies/", '393', '259', '_big');
                $this -> File -> uploadPicture($section_id, ROOT."images/deals/companies/", '288', '190', '_middle');
                $this -> File -> uploadPicture($section_id, ROOT."images/deals/companies/", '88', '58', '_small');
                $this -> File -> uploadPicture($section_id, ROOT."images/deals/companies/", '96', '96', '_square');
                $this -> File -> uploadPicture($section_id, ROOT."images/deals/companies/", '800', '527', '_large');

                if($filename!=""){
                    $this -> deals -> updateCompaniesImage($section_id, $filename);
                }
            }

            $this->_redirect('/admin/deals/companies/page/1');
        }
    }

    public function modifycompanyAction() {

        $this -> smarty -> assign('adminLeftMenu', 'deals');
        $this -> smarty -> assign('adminLeftMenuSub', 'deals_companies');

        $this->checkCompanyForId();
        $this -> smarty -> assign('action', 'modifycompany');
        if( !$this->_hasParam('step') ) {

            $this -> smarty -> assign('item', $company = $this -> deals -> getCompanyById($this -> _getParam('id')));
            $this -> smarty -> assign('id', $this -> _getParam('id'));

            $this -> smarty -> assign('PageBody', 'admin/deals/companies/add_modify_item.tpl');
            $this -> smarty -> assign('title', 'Изменение компании: '.$company['title']);
            $this -> smarty -> display('admin/index.tpl');
        } else {
            $dataArray = $this->_getAllParams();
            $dataArray['lang_id'] = $this->lang_id;
            $dataArray['id'] = $this -> _getParam('id');


            $this -> deals -> modifyCompany($dataArray);

            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/companies/", '393', '259', '_big');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/companies/", '288', '190', '_middle');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/companies/", '88', '58', '_small');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/sections/", '96', '96', '_square');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/sections/", '800', '527', '_large');
                if($filename!=""){
                    $this -> deals -> updateImage($this -> _getParam('id'), $filename);
                }
            }

            $this->_redirect('/admin/deals/companies/page/1');
        }
    }

    private function checkCompanyForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/deals/companies/page/1');
        }
    }

    public function deletecompanyAction() {
        $this->checkCompanyForId();
        $this -> deals -> deleteCompany($this -> _getParam('id'));
        $this -> _redirect('/admin/deals/companies/page/1');
    }


    //****************************************************************************************************************//
    //****************************************** DEALS CITIES ********************************************************//
    //****************************************************************************************************************//

    public function citiesAction() {
        $this -> smarty -> assign('adminLeftMenu', 'deals');
        $this -> smarty -> assign('adminLeftMenuSub', 'deals_cities');

        if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
            ||!$this->_hasParam('page')
            ||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this -> deals ->getCitiesPagesCount($this->lang_id)<=1 ))
            ||($this->_getParam('page')>1&&$this -> deals ->getCitiesPagesCount($this->lang_id)<$this->_getParam('page'))
        ){
            $this->_redirect("/admin/deals/cities/page/1");
        }

        $page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
        $this -> smarty -> assign('cities', $this -> deals ->  getCitiesForPage($this->lang_id, $page));
        $this -> smarty -> assign('countpage', $this -> deals -> getCitiesPagesCount($this->lang_id));
        $this -> smarty -> assign('page',$page+1);
        $this -> smarty -> assign('PageBody', 'admin/deals/cities/items_list.tpl');
        $this -> smarty -> assign('title', 'Города акций');
        $this -> smarty -> display('admin/index.tpl');
    }

    public function addcityAction() {

        $this -> smarty -> assign('adminLeftMenu', 'deals');
        $this -> smarty -> assign('adminLeftMenuSub', 'deals_cities');

        $this -> smarty -> assign('action', 'addcity');

        if( !$this->_hasParam('step') ) {

            $this -> smarty -> assign('PageBody', 'admin/deals/cities/add_modify_item.tpl');
            $this -> smarty -> assign('title', 'Добавление/Удаление города');
            $this -> smarty -> display('admin/index.tpl');
        } else {
            $dataArray = $this->_getAllParams();
            $dataArray['lang_id'] = $this->lang_id;


            $city_id = $this -> deals -> createCity($dataArray);

            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($section_id, ROOT."images/deals/cities/", '393', '259', '_big');
                $this -> File -> uploadPicture($section_id, ROOT."images/deals/cities/", '288', '190', '_middle');
                $this -> File -> uploadPicture($section_id, ROOT."images/deals/cities/", '88', '58', '_small');
                $this -> File -> uploadPicture($section_id, ROOT."images/deals/cities/", '96', '96', '_square');
                $this -> File -> uploadPicture($section_id, ROOT."images/deals/cities/", '800', '527', '_large');

                if($filename!=""){
                    $this -> deals -> updateCityImage($city_id, $filename);
                }
            }

            $this->_redirect('/admin/deals/cities/page/1');
        }
    }

    public function modifycityAction() {

        $this -> smarty -> assign('adminLeftMenu', 'deals');
        $this -> smarty -> assign('adminLeftMenuSub', 'deals_cities');

        $this->checkCityForId();
        $this -> smarty -> assign('action', 'modifycity');
        if( !$this->_hasParam('step') ) {

            $this -> smarty -> assign('item', $city = $this -> deals -> getCityById($this -> _getParam('id')));
            $this -> smarty -> assign('id', $this -> _getParam('id'));

            $this -> smarty -> assign('PageBody', 'admin/deals/cities/add_modify_item.tpl');
            $this -> smarty -> assign('title', 'Изменение города: '.$city['title']);
            $this -> smarty -> display('admin/index.tpl');
        } else {
            $dataArray = $this->_getAllParams();
            $dataArray['lang_id'] = $this->lang_id;
            $dataArray['id'] = $this -> _getParam('id');


            $this -> deals -> modifyCity($dataArray);

            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']!=""){
                $filename = $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/cities/", '393', '259', '_big');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/cities/", '288', '190', '_middle');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/cities/", '88', '58', '_small');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/cities/", '96', '96', '_square');
                $this -> File -> uploadPicture($this -> _getParam('id'), ROOT."images/deals/cities/", '800', '527', '_large');
                if($filename!=""){
                    $this -> deals -> updateImage($this -> _getParam('id'), $filename);
                }
            }

            $this->_redirect('/admin/deals/cities/page/1');
        }
    }

    private function checkCityForId() {
        if( !$this -> _hasParam('id') ) {
            $this -> _redirect('/admin/deals/cities/page/1');
        }
    }

    public function deletecityAction() {
        $this->checkCityForId();
        $this -> deals -> deleteCity($this -> _getParam('id'));
        $this -> _redirect('/admin/deals/cities/page/1');
    }


    //****************************************************************************************************************//
    //****************************************** DEALS SETTINGS ******************************************************//
    //****************************************************************************************************************//

    public function settingsAction() {
        $this -> smarty -> assign('adminLeftMenu', 'deals');
        $this -> smarty -> assign('adminLeftMenuSub', 'deals_settings');

        $this -> smarty -> assign('dealSettings', $this->deals->getSettingsById($this->lang_id));
        $this -> smarty -> assign('PageBody', 'admin/deals/settings/index.tpl');
        $this -> smarty -> assign('title', 'Настройки');
        $this -> smarty -> display('admin/index.tpl');
    }

    public function saveSettingsAction() {
        $settings = json_encode($this->_getAllParams());
        $this->deals->updateSettings($settings, $this->lang_id);
        $this->_redirect('/admin/deals/settings');
    }



}
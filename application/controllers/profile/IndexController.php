<?php

include_once ROOT . 'application/models/UsersDb.php';

include_once ROOT . 'application/models/FilesDb.php';

include_once ROOT . 'application/models/OrdersDb.php';

include_once ROOT . 'application/models/SectionsDb.php';

include_once ROOT . 'application/models/ProductsDb.php';

Zend_Loader::loadClass('System_Controller_Action');

class Profile_IndexController extends System_Controller_Action
{

    protected $user;
    protected $files;
    protected $orders;
    protected $site;
    protected $sections;
    protected $products;
   
    public function init()
    {
        parent::init();
		if(!isset($_SESSION['loginNamespace'])){
			$this->_redirect('/loginpage.html');
		}
        $this -> user = new UsersDb();
        $this -> files  = new FilesDb();
        $this -> orders = new OrdersDb();
        $this -> sections = new SectionsDb();
        $this -> products = new ProductsDb();
    }

    public function indexAction() {
        $this -> smarty -> assign('profileMenuActive', 'profile');
        $this -> smarty -> assign('user_info', $this->user->getUserById($this->userId));
        $this -> smarty -> assign('PageBody', 'profile/index.tpl');
        $this -> smarty -> assign('meta_title', $this->frontendLangParams['TITLE__PROFILE']);
        $this -> smarty -> display('layouts/sub.tpl');
    }

    public function ordersAction(){
        $this -> smarty -> assign('profileMenuActive', 'orders');

        $orders = $this->orders->getUsersOrders($this->userId);

        for($j=0; $j<sizeof($orders); $j++){
            $products = (array)json_decode($orders[$j]['products'], true);

            for($i=0; $i<sizeof($products); $i++){
                    $currProduct = $this->products->getProductById($products[$i]['id']);
                    $products[$i]['hash'] = $currProduct['hash'];
            }
            $orders[$j]['products'] = $products;
        }

        $this -> smarty -> assign('orders', $orders);
        $this -> smarty -> assign('PageBody', 'profile/orders.tpl');
        $this -> smarty -> assign('meta_title', 'История заказов');
        $this -> smarty -> display('layouts/sub.tpl');
    }

    public function productsAction(){
        $this -> smarty -> assign('profileMenuActive', 'products');

        $this -> smarty -> assign('products', $this->products->getAllProductsByUserId($this->lang_id, $this->userId));

        $this -> smarty -> assign('PageBody', 'profile/products.tpl');
        $this -> smarty -> assign('meta_title', 'Мои товары');
        $this -> smarty -> display('layouts/sub.tpl');
    }

    public function productAddAction(){
        $this -> smarty -> assign('profileMenuActive', 'products');

        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('sections', $this -> sections -> getAllSections($this->lang_id));

            $this -> smarty -> assign('PageBody', 'profile/products/products_add.tpl');
            $this -> smarty -> assign('Title', 'Добавление товара');
            $this -> smarty -> display('layouts/sub.tpl');
        } else {

            $dataArray = $this->_getAllParams();
            if($this->_hasParam('main')){
                $dataArray['main'] = 1;
            } else {
                $dataArray['main'] = 0;
            }
            $dataArray['lang_id'] = $this->lang_id;
            $productId = $this -> products -> add($dataArray, $this->userId);
            $this -> products -> updateProductHash($productId);

            // set recommended products
            $this->setRecommendedProducts($productId, $dataArray['recommendedIds']);

            for($i=1; $i<6; $i++){

                if(isset($_FILES['image'.$i]['name'])&&$_FILES['image'.$i]['name']!=""){
                    if($i==1){
                        $pImageRecId = $this -> products ->addImageRecord($productId,1);
                    } else {
                        $pImageRecId = $this -> products ->addImageRecord($productId);
                    }
                    $filename = $this -> files -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '540', '378', '_big');
                    $this -> files -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '270', '189', '_middle');
                    $this -> files -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '88', '62', '_small');
                    $this -> files -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '96', '96', '_square');

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

            $this->_redirect('/profile/products.html');
        }
    }

    public function productModifyAction(){
        $this -> smarty -> assign('profileMenuActive', 'products');

        $access = $this -> products -> checkUserAccessToProduct($this->userId, $this -> _getParam('id'));
        if(!$access){
            $this->_redirect('/profile/products.html');
        }
        if( !$this->_hasParam('step') ) {
            $this -> smarty -> assign('sections', $this -> sections -> getAllSections($this->lang_id));

            $product = $this -> products -> getProductById($this -> _getParam('id'));
            $product['files'] = $this -> products -> getAllProductsFiles($this -> _getParam('id'));
            $this -> smarty -> assign('item', $product);
            $this -> smarty -> assign('id', $this -> _getParam('id'));

            $this -> smarty -> assign('productsRecommendedSelected', $productsRecommendedSelected = $this -> products -> getRecommendedProducts($this -> _getParam('id')));

            $this -> smarty -> assign('recommendedIds', $rIds =$this -> products -> getRecommendedProductsIds($this -> _getParam('id')));

            $this -> smarty -> assign('PageBody', 'profile/products/products_modify.tpl');
            $this -> smarty -> assign('Title', 'Редактирование товара');
            $this -> smarty -> display('layouts/sub.tpl');
        } else {

            $dataArray = $this->_getAllParams();

            if($this->_hasParam('main')){
                $dataArray['main'] = 1;
            } else {
                $dataArray['main'] = 0;
            }

            $dataArray['lang_id'] = $this->lang_id;
            $dataArray['id'] = $this -> _getParam('id');

            // set recommended products
            $this->setRecommendedProducts($dataArray['id'], $dataArray['recommendedIds']);

            $this -> products -> modify($dataArray);

            $this -> products -> updateProductHash($this -> _getParam('id'));

            for($i=1; $i<6; $i++){

                if(isset($_FILES['image'.$i]['name'])&&$_FILES['image'.$i]['name']!=""){

                    $pImageRecId = $this -> products ->addImageRecord($this -> _getParam('id'));
                    $filename = $this -> files -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '540', '378', '_big');
                    $this -> files -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '270', '189', '_middle');
                    $this -> files -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '88', '62', '_small');
                    $this -> files -> uploadCustomPicture($pImageRecId, $i, ROOT."images/products/", '96', '96', '_square');

                    if($filename!=""){
                        $title = $dataArray['image_title'.$i];
                        $this -> products -> updateImageRecord($pImageRecId, $filename, $title);
                    }
                }

                if(isset($_FILES['file'.$i]['name'])&&$_FILES['file'.$i]['name']!=""){
                    $pFileRecId = $this -> products ->addFileRecord($this -> _getParam('id'));

                    $fileFilename = $this -> files -> uploadFileAddCustom($pFileRecId, $i);

                    if($fileFilename!=""){
                        $fileFilename['title'] = $dataArray['file_title'.$i];
                        $this -> products -> updateFileRecord($pFileRecId, $fileFilename);
                    }
                }
            }
            $this->_redirect('/profile/products.html');
        }

    }

    public function productDeleteAction(){
        $this -> smarty -> assign('profileMenuActive', 'products');

        $this -> smarty -> assign('PageBody', 'profile/products.tpl');
        $this -> smarty -> assign('meta_title', 'Мои товары');
        $this -> smarty -> display('layouts/sub.tpl');
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

    public function salesAction(){
        $this -> smarty -> assign('profileMenuActive', 'sales');

        $this -> smarty -> assign('PageBody', 'profile/products.tpl');
        $this -> smarty -> assign('meta_title', 'Мои товары');
        $this -> smarty -> display('layouts/sub.tpl');
    }

    public function ajaxGetCategoriesAction(){
        $sectionId = $this->_getParam('section_id');
        $categoryId = $this->_getParam('category_id');

        $categories = $this->sections->getAllSubSections($sectionId, $this->lang_id);
        ob_start();
        $out_str  = '<select id="category" name="category" class="input">';
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

    public function ajaxGetRecommendedProductsAction(){
        ob_start();
        $productSearch = $this->_getParam('product_search');

        $excludeIds = $this->_getParam('prSelIds');

        if(sizeof($productSearch)>0){
            $productsRecommended = $this -> products -> searchByWordLike2($this->lang_id, $productSearch, $excludeIds);
            $this -> smarty -> assign('productsRecommended', $productsRecommended);
            $optionsHtml = $this -> smarty -> fetch('profile/products/products_recommended.tpl');
        } else {
            $optionsHtml = '<div><div style="text-align: center; color: red;">Если ничего не нашло, введите более точное название...</div></div>';
        }

        ob_clean();
        echo $optionsHtml;

    }

    public function ajaxGetRecProdItemAction(){
        if($this->_hasParam('pr_id')&&$this->_getParam('pr_id')!=''){
            $this -> smarty -> assign('prs', $this->products-> getProductById($this -> _getParam('pr_id')));
            $pRItem = $this -> smarty -> fetch('profile/products/products_recommended_item.tpl');
            echo $pRItem;
        } else {
            echo "";
        }
    }

    public function ajaxChangeRecommendAction(){
        $this -> products -> changeRecommend($this->_getParam('id'));
        $prod = $this -> products -> getProductById($this->_getParam('id'));
        echo (int)$prod['active'];
    }

    public function ajaxDelFileAction(){
        $fileId = $this->_getParam('id');
        $file = $this -> products -> getFileById($fileId);
        $path = './tmp/files/';
        @unlink($path.$file['filename']);
        $this -> products -> deleteFileById($fileId);
        echo 1;
    }

    public function ajaxDelImageAction(){
        $imageId = $this->_getParam('id');
        $pImage = $this -> products -> getImageById($imageId);
        $path = './images/products/';
        @unlink($path.$pImage['image'].".jpg");
        $this -> products -> deleteImageById($imageId);
        echo 1;
    }

    public function ajaxSetMainImageAction(){
        $productId = $this->_getParam('product_id');
        $mainImageData = $this -> products -> getProductMainImageDataById($productId);
        $this -> products -> setImageMainStatus($mainImageData['id'], 0);

        $imageId = $this->_getParam('id');
        $this -> products -> setImageMainStatus($imageId, 1);

        echo $mainImageData['id'];
    }

}
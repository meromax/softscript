<?php
include_once ROOT . 'application/models/OrdersDb.php';

include_once ROOT . 'application/models/LangDb.php';

include_once ROOT . 'application/models/SettingsDb.php';

include_once ROOT . 'application/models/FilesDb.php';

include_once ROOT . 'application/models/ContentManagerDb.php';

include_once ROOT . 'application/models/ProductsDb.php';

include_once ROOT . 'application/models/SectionsDb.php';
/** Zend_Controller_Action */
Zend_Loader::loadClass('System_Controller_Action');

class Orders_IndexController extends System_Controller_Action {
    
	protected $orders;
	protected $languages;
    protected $files;
	protected $sett;
    protected $content;
    protected $products;
    protected $sections;
    public $settings;
    public $paymentTestMode = 1;
	
    public function init() {
        parent::init();
        if($this->userId==''){
            $this->userId = -1;
        }
//		if(!isset($_SESSION['loginNamespace'])){
//			$this->_redirect('/loginpage.html');
//		}
        
        $this->orders = new OrdersDb();
        $this->languages = new LangDb();
        $this->files = new FilesDb();
        $this->sett  = new SettingsDb();
        $this->content = new ContentManagerDb();
        $this->products = new ProductsDb();
        $this->sections = new SectionsDb();

        $this->settings = $this->sett->getSettingsById($this->lang_id);

        if($this->settings->settings_payment_test_mode=='on'){
            $this->paymentTestMode=1;
        } else {
            $this->paymentTestMode=0;
        }
    }



      
    public function indexAction() {
        //echo $this->getAllOrdersPrice2($this->userId);
//        unset($_SESSION['shopping_cart']);
//        unset($_SESSION['shopping_cart_skidka']);
        //unset($_SESSION['shopping_cart']);
        if(isset($_SESSION['shopping_cart'])){
            $_SESSION['order_step'] = 1;
            $_SESSION['shopping_cart_skidka'] = $this->getAllOrdersPrice($this->userId);
            $cart = $_SESSION['shopping_cart'];
//            echo "<pre>";
//            print_r($cart);
//            die();
            $this -> smarty -> assign('cart', $cart);

            //dostavka
            $settings = $this->sett->getSettingsById($this->lang_id);
            if(isset($settings->settings_dostavka)&&trim($settings->settings_dostavka)!=""){
                $this -> smarty -> assign('dostavka', $settings->settings_dostavka);
            }

        } else {
            //$this->_redirect("/");
        }
        $this -> smarty -> assign('PageBody', 'orders/cart.tpl');
        $this -> smarty -> display('layouts/sub.tpl');
    }


    public function addToCartAction(){
//        unset($_SESSION['shopping_cart']);
//        unset($_SESSION['shopping_cart_skidka']);
        $_SESSION['order_step'] = 1;
        $product = $this->products->getProductById($this->_getParam('product_id'));
        $product['count'] = 1;
        $exist = 0;
        // die();
        if(isset($_SESSION['shopping_cart'])){
            for($i=0; $i<sizeof($_SESSION['shopping_cart']); $i++){
                if($_SESSION['shopping_cart'][$i]['id']==$product['id']){
                    $_SESSION['shopping_cart'][$i]['count']++;
                    $exist ++;
                }
            }

            if($exist==0){
                $_SESSION['shopping_cart'][] = $product;
            }
        } else {
            $_SESSION['shopping_cart_skidka'] = $this->getAllOrdersPrice($this->userId);
            $_SESSION['shopping_cart'][] = $product;
        }

        for($i=0; $i<sizeof($_SESSION['shopping_cart']); $i++){
            $_SESSION['shopping_cart'][$i]['total_price'] = ($_SESSION['shopping_cart'][$i]['count']*$_SESSION['shopping_cart'][$i]['price']);
        }

//        echo "<pre>";
//        print_r($_SESSION['shopping_cart']);

        if($product['category_id']==0){
            $section = $this->sections->getSectionById($product['section_id']);
            $link = "/catalog/".strip_tags(stripslashes($section['link']))."/".strip_tags(stripslashes($product['link']))."/";
        } else {
            $section = $this->sections->getSectionById($product['section_id']);
            $category = $this->sections->getSubSectionById($product['category_id']);
            $link = "/catalog/".strip_tags(stripslashes($section['link']))."/".strip_tags(stripslashes($category['link']))."/".strip_tags(stripslashes($product['link']))."/";
        }
        $_SESSION['new_product_added']=1;
        //$this->_redirect($link);
        $this->_redirect("/shopping-cart.html");
    }

    public function addToCartAjaxAction(){
//        unset($_SESSION['shopping_cart']);
//        unset($_SESSION['shopping_cart_skidka']);
        $product = $this->products->getProductById($this->_getParam('product_id'));
        $product['count'] = $this->_getParam('product_count');
        $exist = 0;
        // die();
        if(isset($_SESSION['shopping_cart'])){
            for($i=0; $i<sizeof($_SESSION['shopping_cart']); $i++){
                if($_SESSION['shopping_cart'][$i]['id']==$product['id']){
                    $_SESSION['shopping_cart'][$i]['count']++;
                    $exist ++;
                }
            }

            if($exist==0){
                $_SESSION['shopping_cart'][] = $product;
            }
        } else {
            $_SESSION['shopping_cart_skidka'] = $this->getAllOrdersPrice($this->userId);
            $_SESSION['shopping_cart'][] = $product;
        }

        for($i=0; $i<sizeof($_SESSION['shopping_cart']); $i++){
            $_SESSION['shopping_cart'][$i]['total_price'] = ($_SESSION['shopping_cart'][$i]['count']*$_SESSION['shopping_cart'][$i]['price']);
        }

//        echo "<pre>";
//        print_r($_SESSION['shopping_cart']);

        if($product['category_id']==0){
            $section = $this->sections->getSectionById($product['section_id']);
            $link = "/catalog/".strip_tags(stripslashes($section['link']))."/".strip_tags(stripslashes($product['link']))."/";
        } else {
            $section = $this->sections->getSectionById($product['section_id']);
            $category = $this->sections->getSubSectionById($product['category_id']);
            $link = "/catalog/".strip_tags(stripslashes($section['link']))."/".strip_tags(stripslashes($category['link']))."/".strip_tags(stripslashes($product['link']))."/";
        }
        $_SESSION['new_product_added']=1;
    }

    public function getTopCartAjaxAction() {
        ob_start();
        if(isset($_SESSION['shopping_cart'])){
            $_SESSION['shopping_cart_skidka'] = $this->getAllOrdersPrice($this->userId);
            $cart = $_SESSION['shopping_cart'];
            $this -> smarty -> assign('cart', $cart);
        } else {
            //$this->_redirect("/");
        }
        ob_clean();
        echo $this -> smarty -> fetch('orders/top_cart.tpl');
    }


    public function getAllOrdersPrice($userId){
        $orders = $this->orders->getUsersOrdersPayed($userId);
        //echo sizeof($orders); die();
        $totalPrice = 0;
        for($i=0; $i<sizeof($orders); $i++){
            $totalPrice += intval($orders[$i]['sprice']);
        }

        $totalPrice = intval($totalPrice);

        $this->settings = new SettingsDb();
        $settings = $this->settings->getSettingsById($this->lang_id);
        $percents = 0;

        if($totalPrice>intval($settings->settings_pprice2)){
            $percents = $settings->settings_skidka1;
        }
        if($totalPrice>intval($settings->settings_pprice2)){
            $percents = $settings->settings_skidka2;
        }
        if($totalPrice>intval($settings->settings_pprice3)){
            $percents = $settings->settings_skidka3;
        }
        if($totalPrice>intval($settings->settings_pprice4)){
            $percents = $settings->settings_skidka4;
        }
        if($totalPrice>intval($settings->settings_pprice5)){
            $percents = $settings->settings_skidka5;
        }

        //return $totalPrice." руб. ---- ".$percents."%";
        return $percents;
    }

    public function getAllOrdersPrice2($userId){
        $orders = $this->orders->getUsersOrdersPayed($userId);
        //echo sizeof($orders); die();
        $totalPrice = 0;
        for($i=0; $i<sizeof($orders); $i++){
            $totalPrice += intval($orders[$i]['sprice']);
        }

        $totalPrice = intval($totalPrice);

        $this->settings = new SettingsDb();
        $settings = $this->settings->getSettingsById($this->lang_id);
        $percents = 0;

        if($totalPrice>intval($settings->settings_pprice2)){
            $percents = $settings->settings_skidka1;
        }
        if($totalPrice>intval($settings->settings_pprice2)){
            $percents = $settings->settings_skidka2;
        }
        if($totalPrice>intval($settings->settings_pprice3)){
            $percents = $settings->settings_skidka3;
        }
        if($totalPrice>intval($settings->settings_pprice4)){
            $percents = $settings->settings_skidka4;
        }
        if($totalPrice>intval($settings->settings_pprice5)){
            $percents = $settings->settings_skidka5;
        }

        return $totalPrice." руб. ---- ".$percents."%";
    }

    public function delFromCartAction(){

        if(isset($_SESSION['shopping_cart'])&&$this->_hasParam('product_id')){
            $product_id = $this->_getParam('product_id');
            $cart = $_SESSION['shopping_cart'];
            unset($_SESSION['shopping_cart']);
            for($i=0; $i<sizeof($cart); $i++){
                if($cart[$i]['id']!=$product_id){
                    $_SESSION['shopping_cart'][] = $cart[$i];
                }
            }
            if(sizeof($_SESSION['shopping_cart'])>0){
                $this->_redirect("/shopping-cart.html");
            } else {
                unset($_SESSION['shopping_cart']);
                $this->_redirect("/");
            }
        } else {
            $this->_redirect("/");
        }
    }

    public function calculateCartAction(){
        //unset($_SESSION['shopping_cart']);
        $product = $this->products->getProductById($this->_getParam('product_id'));
        $product['count'] = 1;
        $exist = 0;
        if(isset($_SESSION['shopping_cart'])){
            for($i=0; $i<sizeof($_SESSION['shopping_cart']); $i++){
                if($_SESSION['shopping_cart'][$i]['id']==$product['id']){
                    $_SESSION['shopping_cart'][$i]['count']++;
                    $exist ++;
                }
            }

            if($exist==0){
                $_SESSION['shopping_cart'][] = $product;
            }
        } else {
            $_SESSION['shopping_cart'][] = $product;
        }

        echo "<pre>";
        print_r($_SESSION['shopping_cart']);
    }


    public function checkCartAction(){
        echo "<pre>";
        print_r($this->_getAllParams());
        for($i=0; $i<sizeof($_SESSION['shopping_cart']); $i++){
            $pid = $_SESSION['shopping_cart'][$i]['id'];
            if($this->_hasParam('pcount'.$pid)){
                $pcount = $this->_getParam('pcount'.$pid);
                if(is_numeric($pcount))
                {
                    if($pcount>0){
                        $_SESSION['shopping_cart'][$i]['count'] = $pcount;
                        $_SESSION['shopping_cart'][$i]['total_price'] = ($pcount*$_SESSION['shopping_cart'][$i]['price']);
                    }
                }
            }
        }
//        echo "<pre>";
//        print_r($_SESSION['shopping_cart']);
//        die();
        if($this->_hasParam('status')&&$this->_getParam('status')==0){
            $this->_redirect("/order-form.html");
        } else {
            $this->_redirect("/shopping-cart.html");
        }

    }

    public function orderFormAction(){

        if($_SESSION['order_step']>0){
            $this -> smarty -> assign('PageBody', 'orders/form.tpl');
            $this -> smarty -> assign('Title', "Контактная информация");
            $this -> smarty -> display('layouts/sub.tpl');
        } else {
            $this->_redirect("/shopping-cart.html");
        }
    }


    public function saveContactInfoAction(){
        if($_SESSION['order_step']>0){
            $_SESSION['order_step'] = 2;
            $_SESSION['contact_info'] = $this->_getAllParams();
            $this->_redirect("/payment-methods.html");
        } else {
            $this->_redirect("/shopping-cart.html");
        }
    }


    public function paymentMethodsAction(){
        if($_SESSION['order_step']>1){
            $this -> smarty -> assign('PageBody', 'orders/payment_methods.tpl');
            $this -> smarty -> assign('Title', "Способы оплаты");
            $this -> smarty -> display('layouts/sub.tpl');
        } else {
            $this->_redirect("/order-form.html");
        }
    }

    public function paymentMethodsDoAction(){
        if($_SESSION['order_step']>1){
            $_SESSION['order_step'] = 3;
            $_SESSION['payment_method'] = $this->_getParam('payment_method');
            $this->_redirect("/confirm-pay.html");
        } else {
            $this->_redirect("/order-form.html");
        }
    }

    public function confirmPayAction(){

        if($_SESSION['order_step']>2){

            if(isset($_SESSION['shopping_cart'])){

                $this -> smarty -> assign('payment_method', $_SESSION['payment_method']);

                if($_SESSION['payment_method']=='robokassa'){

                  require_once ROOT . 'library/payments/robokassa/robokassa.class.php';
                  $paymentMethod = new robokassa('test','password_1','password_1', 1000, 0, $this->paymentTestMode);

                } elseif($_SESSION['payment_method']=='paypal') {

                }
                $this -> smarty -> assign('payForm', $paymentMethod->getForm());

                $_SESSION['shopping_cart_skidka'] = $this->getAllOrdersPrice($this->userId);
                $cart = $_SESSION['shopping_cart'];
                $this -> smarty -> assign('cart', $cart);
            }

            $this -> smarty -> assign('PageBody', 'orders/confirm_pay.tpl');
            $this -> smarty -> assign('Title', "Подтверждение и оплата");
            $this -> smarty -> display('layouts/sub.tpl');
        } else {
            $this->_redirect("/payment-methods.html");
        }

    }

    public function saveOrderAjaxAction(){
        ob_start();
        $orderData['products'] = json_encode($_SESSION['shopping_cart']);
        $totalData = $this->orders->calculate($_SESSION['shopping_cart'], $this->getAllOrdersPrice($this->userId));
        $orderData['total_count'] = $totalData['total_count'];
        $orderData['total_price'] = $totalData['total_price'];
        $orderData['total_price_s'] = $totalData['total_price_s'];
        $orderData['skidka'] = $totalData['skidka'];
        $orderData['price'] = $totalData['total_price'];
        $orderData['userId'] = $this->userId;
        $orderId = $this->orders->addOrder($orderData);
        ob_clean();
        echo $totalData['total_price']."|".$orderId;
    }


    public function paymentCallbackAction(){
        if($this->paymentTestMode){
            $this->orders->addPaymentTransaction($this->_getParam('InvId'), $this->_getParam('OutSum'), $_SESSION['payment_method'], $this->userId);
            $this->orders->payedOrder($this->_getParam('InvId'));
            unset($_SESSION['shopping_cart_skidka'], $_SESSION['shopping_cart'], $_SESSION['contact_info'], $_SESSION['order_step'], $_SESSION['payment_method'], $_SESSION['rorboxchange_form']);
            $this->_redirect('/payment-success.html');
        } else {
            echo "<pre>";
            print_r($_REQUEST);
            die();
        }
    }

    public function paymentSuccessAction(){

        $item = $this->Content->getPageByLink('payment-success.html', $this->lang_id);
        $this -> smarty -> assign('item', $item);
        $this -> smarty -> assign('PageBody', 'orders/payment_success.tpl');
        $this -> smarty -> assign('Title', strip_tags(stripslashes($item['title'])));
        $this -> smarty -> display('layouts/sub.tpl');
    }

    public function paymentFailAction(){
        $item = $this->Content->getPageByLink('payment-fail.html', $this->lang_id);
        $this -> smarty -> assign('item', $item);
        $this -> smarty -> assign('PageBody', 'orders/payment_fail.tpl');
        $this -> smarty -> assign('Title', strip_tags(stripslashes($item['title'])));
        $this -> smarty -> display('layouts/sub.tpl');
    }



    public function orderDoAction(){

        $orderData = $this->_getAllParams();
//        echo "<pre>";
//        print_r($orderData);
//        echo "<hr>";
        $orderData['products'] = json_encode($_SESSION['shopping_cart']);
        //print_r($_SESSION['shopping_cart']);
        $totalData = $this->orders->calculate($_SESSION['shopping_cart'], $this->getAllOrdersPrice($this->userId));


        $orderData['total_count'] = $totalData['total_count'];
        $orderData['total_price'] = $totalData['total_price'];
        $orderData['total_price_s'] = $totalData['total_price_s'];
        $orderData['skidka'] = $totalData['skidka'];
        $orderData['price'] = $totalData['total_price'];
        $orderData['userId'] = $this->userId;
        $this->orders->addOrder($orderData);

//
//        //************************ E-mail to user **********************************
//        if($this->_hasParam('email')&&$this->_getParam('email')!=''){
//            $emailTxt = new Zend_Config_Xml(ROOT.'configs/project/email.xml', 'email');
//
//            Zend_Loader::loadClass('Zend_Mail');    /** Loading Zend_Mail */
//            $mail = new Zend_Mail();
//            $mail -> addHeader('X-MailGenerator', $_SERVER['HTTP_HOST'].' mail machine');
//
//            $this -> smarty -> assign('total_price', $orderData['itogo']);
//            $mailBody = $this -> smarty -> fetch('orders/mail.tpl');
//
//            $mail -> setBodyHtml($mailBody,'UTF-8');
//            $mail -> setFrom('no-reply@'.$_SERVER['HTTP_HOST'], 'no-reply@'.$_SERVER['HTTP_HOST']);
//            $mail -> addTo($orderData['email'], $orderData['name']);
//            $subject = '=?UTF-8?B?'.base64_encode($this->frontendLangParams['TITLE__MAIL_SUBJECT']).'?=';
//            $mail -> setSubject($subject);
//
//            /** Send email */
//            $headers  = 'MIME-Version: 1.0' . "\r\n";
//            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
//            $mail->send();
//        }
        unset($_SESSION['shopping_cart']);
        $_SESSION['order_complete'] = 1;
        $this->_redirect("/order-completed.html");
    }

    public function orderCompletedAction(){

        if(isset($_SESSION['order_complete'])&&$_SESSION['order_complete']==1){
            $completed = $this->content->getPageByLink("order-online-complete");
            $this -> smarty -> assign('content', $completed);
            $this -> smarty -> assign('PageBody', 'orders/complete.tpl');
            $this -> smarty -> assign('Title', $this->frontendLangParams['TITLE__ORDERS']);
            $this -> smarty -> display('layouts/sub.tpl');
            $_SESSION['order_complete']++;
            if($_SESSION['order_complete']==4){
                unset($_SESSION['order_complete']);
            }
        } else {
            $this->_redirect("/");
        }
    }



    public function viewAction(){
    	$order = $this->orders->getOrderById($this->_getParam('orderId'));
    	$tdata = explode("|", $order['translation']);
    	$langFrom = $this->languages->getLangById($tdata[0]);
    	$langTo   = $this->languages->getLangById($tdata[1]);
    	$ttheme   = $this->ttemes->getTranslationThemeById($order['translation_theme']);
    	
    	$order['langFrom'] = $langFrom;
    	$order['langTo'] = $langTo;
    	$order['ttheme'] = $ttheme;
    	
    	$order['pay_status_title'] = $this->frontendLangParams['STATUSES__STATUS'.$order['pay_status']];
    	
    	$tdpData = $this->tdp->getTranslationDirectionPriceById($langFrom['lang_id'], $langTo['lang_id']);
    	
    	$totalPrice = $this->getAmount($tdpData, $order['letters_count']);

        $totalPrice2 = @$this->getAmount($tdpData, $order['letters_count2']);
    	
    	$totalPrice = (int)$totalPrice + (int)$ttheme['price'];

        $totalPrice2 = (int)$totalPrice2 + (int)$ttheme['price'];
    	
    	$order['totalPrice'] = $totalPrice;

        $order['totalPrice2'] = $totalPrice2;

    	$this -> smarty -> assign('order', $order);
        $this -> smarty -> assign('PageBody', 'orders/view.tpl');
        $this -> smarty -> assign('Title', $this->frontendLangParams['TITLE__ORDERS']);
        $this -> smarty -> display('layouts/sub.tpl');    	
    }


    
    public function previewOrderAction(){

        $filenames = $this->files->uploadFileAdd(time(), '/orders_files/');


        $langFrom = $this->languages->getLangById($this->_getParam('lang_from_id'));
        $langTo = $this->languages->getLangById($this->_getParam('lang_to_id'));
    	$ttheme   = $this->ttemes->getTranslationThemeById($this->_getParam('ttheme_id'));


       	$order['langFrom'] = $langFrom;
    	$order['langTo'] = $langTo;
    	$order['ttheme'] = $ttheme;
        $order['translation_text'] = $this->_getParam('translation_text');
        $order['translation_text_letters_count'] = mb_strlen($order['translation_text'],'utf-8');

        $tdpData = $this->tdp->getTranslationDirectionPriceById($this->_getParam('lang_from_id'), $this->_getParam('lang_to_id'));
        
        if(!empty($filenames)&&$filenames!=''){
            $order['filenames'] = $filenames;
            $ext =  $this->files->getExtFile("./orders_files/".$filenames[1]);
            switch ($ext){
                case 'txt':
                    $order['file_letters_count'] = mb_strlen(file_get_contents("./orders_files/".$filenames[1]));
                    break;
                case 'docx':
                    $order['file_letters_count'] = $this->files->getDocxFileLettersCount("./orders_files/".$filenames[1]);
                    break;
            }
            if(isset($order['file_letters_count'])){
                $order['totalFilePrice'] = $this->getAmount($tdpData, $order['file_letters_count']);
            }
        }


        if($order['translation_text']!=''){
            $filename = $this->files->createFile($order['translation_text']);
            $order['filename'] = $filename;
            $order['file_letters_count2'] = $order['translation_text_letters_count'];
            $order['totalFilePrice2'] = $this->getAmount($tdpData, $order['translation_text_letters_count']);
        }



        $order['totalTextPrice'] = $this->getAmount($tdpData, $order['translation_text_letters_count']);

        if(isset($order['totalFilePrice'])){
            $order['totalPrice'] = (int)$order['totalFilePrice'];
            $order['letters_count'] = (int)$order['file_letters_count'];
            $order['totalPrice'] = (int)$order['totalPrice'];
        } else {
            $order['totalPrice'] = 0;
            $order['letters_count'] = 0;
        }

        if(isset($order['totalFilePrice2'])){
            $order['totalPrice2'] = (int)$order['totalTextPrice'];
            $order['letters_count2'] = (int)$order['translation_text_letters_count'];
            $order['totalPrice2'] = (int)$order['totalPrice2'];
        } else {
            $order['totalPrice2'] = 0;
            $order['letters_count2'] = 0;
        }

        $order['mainTotalPrice'] = $order['totalPrice'] + $order['totalPrice2'] + (int)$ttheme['price'];
        $order['mainLettersCount'] = $order['letters_count'] + $order['letters_count2'];


        $_SESSION['order'] = $order;

    	$this -> smarty -> assign('order', $order);
        $this -> smarty -> assign('PageBody', 'orders/preview.tpl');
        $this -> smarty -> assign('Title', $this->frontendLangParams['TITLE__ORDERS']);
        $this -> smarty -> display('layouts/sub.tpl');     	
    }

    public function previewOrder2Action(){

        $filenames = $this->files->uploadFileAdd(time(), '/orders_files/');
        

        $langFrom = $this->languages->getLangById($this->_getParam('lang_from_id'));
        $langTo = $this->languages->getLangById($this->_getParam('lang_to_id'));
    	$ttheme   = $this->ttemes->getTranslationThemeById($this->_getParam('ttheme_id'));


       	$order['langFrom'] = $langFrom;
    	$order['langTo'] = $langTo;
    	$order['ttheme'] = $ttheme;
        $order['translation_text'] = $this->_getParam('translation_text');
        $order['translation_text_letters_count'] = mb_strlen($order['translation_text'],'utf-8');

        $tdpData = $this->tdp->getTranslationDirectionPriceById($this->_getParam('lang_from_id'), $this->_getParam('lang_to_id'));

        if($filenames!=''){
            $order['filenames'] = $filenames;
            $ext =  $this->files->getExtFile("./orders_files/".$filenames[1]);
            switch ($ext){
                case 'txt':
                    $order['file_letters_count'] = mb_strlen(file_get_contents("./orders_files/".$filenames[1]));
                    break;
                case 'docx':
                    $order['file_letters_count'] = $this->files->getDocxFileLettersCount("./orders_files/".$filenames[1]);
                    break;
            }
            if(isset($order['file_letters_count'])){
                $order['totalFilePrice'] = $this->getAmount($tdpData, $order['file_letters_count']);
            }
        }


        if($order['translation_text']!=''){
            $filename = $this->files->createFile($order['translation_text']);
            $order['filename'] = $filename;
            $order['file_letters_count2'] = $order['translation_text_letters_count'];
            $order['totalFilePrice2'] = $this->getAmount($tdpData, $order['translation_text_letters_count']);
        }



        $order['totalTextPrice'] = $this->getAmount($tdpData, $order['translation_text_letters_count']);

        if(isset($order['totalFilePrice'])){
            $order['totalPrice'] = (int)$order['totalFilePrice'];
            $order['letters_count'] = (int)$order['file_letters_count'];
            $order['totalPrice'] = (int)$order['totalPrice'];
        } else {
            $order['totalPrice'] = 0;
            $order['letters_count'] = 0;
        }

        if(isset($order['totalFilePrice2'])){
            $order['totalPrice2'] = (int)$order['totalTextPrice'];
            $order['letters_count2'] = (int)$order['translation_text_letters_count'];
            $order['totalPrice2'] = (int)$order['totalPrice2'];
        } else {
            $order['totalPrice2'] = 0;
            $order['letters_count2'] = 0;
        }

        $order['mainTotalPrice'] = $order['totalPrice'] + $order['totalPrice2'] + (int)$ttheme['price'];
        $order['mainLettersCount'] = $order['letters_count'] + $order['letters_count2'];

        $_SESSION['order'] = $order;

    	$this -> smarty -> assign('order', $order);
        $this -> smarty -> assign('PageBody', 'orders/preview2.tpl');
        $this -> smarty -> assign('Title', $this->frontendLangParams['TITLE__ORDERS']);
        $this -> smarty -> display('layouts/sub.tpl');
    }

    public function saveAction(){

        if(isset($_SESSION['order'])){
            $_SESSION['order']['user_id'] = $this->userId;
            $this->orders->addOrder($_SESSION['order']);
            unset($_SESSION['order']);
            $this->_redirect("/complete.html");
        } else {
            $this->_redirect("/orders/page/1");
        }

    }


    public function save2Action(){

        if(isset($_SESSION['order'])){
            $_SESSION['order']['user_id'] = $this->userId;
            $this->orders->addOrder($_SESSION['order']);
            unset($_SESSION['order']);
            $this->_redirect("/complete.html");
        } else {
            $this->_redirect("/orders/page/1");
        }

    }

    public function getAmountOld($data, $letters_count){
    	//echo $letters_count; die();
    	if(!empty($data)){
    		if((int)$letters_count<(int)$data['letters_count']){
    			return $data['price'];
    		} else {
    			return $data['price']*(intval($letters_count)/intval($data['letters_count']));
    		}
    	} else {
    		return 0;
    	}
    }

    public function getAmount($data, $letters_count){
    	//echo $letters_count; die();
    	if(!empty($data)){
    		return $data['price']*(intval($letters_count)/intval($data['letters_count']));
    	} else {
    		return 0;
    	}
    }
    
    public function completeAction(){
        $this->smarty->assign('Title', 'Order Completed');
        $this->smarty->assign('PageBody', 'orders/complete.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }    
    
    public function getfileAction(){
        $type = $this->_getParam('type');
    	$orderId = $this->_getParam('id');
		$orderData = $this -> orders -> getUserOrder($this->userId, $orderId);
		if(!empty($orderData)){
            if($type==''){
    		    $this -> files -> getFile('orders_files/', $orderData['filename'], $orderData['filename_original']);
            } else {
                $this -> files -> getFile('orders_files/', $orderData['filename2'], $orderData['filename_original2']);
            }
		}
    }    
    
    public function getfiletAction(){
    	$orderId = $this->_getParam('id');
		$orderData = $this -> orders -> getUserReadyOrder($this->userId, $orderId);
		if(!empty($orderData)){
    		$this -> files -> getFile('orders_files/', $orderData['filename_translated'], $orderData['filename_translated_original']);    	
		}
    } 
    
    
    public function step1Action(){
    	$_SESSION['order']['sitetype_id'] = $this->_getParam('sitetype');
    	$_SESSION['order']['cms_id'] = $this->_getParam('cms');
    	$this->_redirect('/step2_page1.html');
    }
    
    public function payment2Action(){
        if(isset($_SESSION['loginNamespace']['storage']->member_id)&&isset($_SESSION['order'])){
        
	    	$_SESSION['order']['member_id'] = $_SESSION['loginNamespace']['storage']->member_id;
	    	
	    	$sitetype = $this->site->getSiteTypesItemById($_SESSION['order']['sitetype_id']);
	    	$cms      = $this->site->getCMSItemById($_SESSION['order']['cms_id']);
	    	$design   = $this->site->getDesignItemById($_SESSION['order']['design_id']);
	    	$_SESSION['order']['price'] = number_format($sitetype['price']+$cms['price']+$design['price'],2);
	    	$this->smarty->assign('sitetype', $sitetype);
	    	$this->smarty->assign('cms', $cms);
	    	$this->smarty->assign('design', $design);
	    	$this->smarty->assign('order', $_SESSION['order']);
	    	//$this->order->addOrder($_SESSION['order']);
	    	        	
        	//print_r($_SESSION['order']);
        	$settings = $this->sett->getSettingsById(1);
        	
        	
    		
    		if(isset($settings->settings_roboxchange_testmode)){
    			$this->smarty->assign('testmode', 1);
    		} else {
    			
				//print_r($_SESSION['order']);
		    	$sitetype = $this->site->getSiteTypesItemById($_SESSION['order']['sitetype_id']);
		    	$cms      = $this->site->getCMSItemById($_SESSION['order']['cms_id']);
		    	$design   = $this->site->getDesignItemById($_SESSION['order']['design_id']);
		    	//real account
				//$mrh_login = "demo";
				//$mrh_pass1 = "Morbid11";
		    	//demo accaunt
		    	$static_settings = $this->sett->getSettingsById(1);

				$mrh_login = $static_settings->settings_roboxchange_username;
				$mrh_pass1 = $static_settings->settings_roboxchange_password;
				$this->smarty->assign('mrh_login', $mrh_login);
				$this->smarty->assign('mrh_pass1', $mrh_pass1);
				
				// ����� ������
				// number of order
				$inv_id = 0;
				$this->smarty->assign('inv_id', $inv_id);
				// �������� ������
				// order description
				//$inv_desc = iconv('windows-1251','utf-8',"����������� ������������ �� ROBOKASSA");
				$inv_desc = $sitetype['title'];
				$this->smarty->assign('inv_desc', $inv_desc);
				// ����� ������
				// sum of order
				$out_summ = '0.01';//_SESSION['order']['price'];
				$this->smarty->assign('out_summ', $out_summ);
				// ��� ������
				// code of goods
				$shp_item = 1;
				$this->smarty->assign('shp_item', $shp_item);
				// ������������ ������ �������
				// default payment e-currency
				$in_curr = "PCR";
				$this->smarty->assign('in_curr', $in_curr);
				// ����
				// language
				$culture = "ru";
				$this->smarty->assign('culture', $culture);
				// ���������
				// encoding
				$encoding = "utf-8";
				$this->smarty->assign('encoding', $encoding);
				// ������������ �������
				// generate signature
				$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");
				
		    	$this->smarty->assign('crc', $crc);
		    	
		    	$url = "https://merchant.roboxchange.com/Handler/MrchSumPreview.ashx?".
			      "MrchLogin=$mrh_login&OutSum=$out_summ&InvId=$inv_id&IncCurrLabel=$in_curr".
			      "&Desc=$inv_desc&SignatureValue=$crc&Shp_item=$shp_item".
			      "&Culture=$culture&Encoding=$encoding";
    			$_SESSION['rorboxchange_form'] = $url;
    			//echo $url;
    			$this->smarty->assign('url', $url);
    			$this->smarty->assign('testmode', 0);
    		}
	        $this->smarty->assign('Title', 'Login Or Registration');
	        $this->smarty->assign('PageBody', 'order/payment.tpl');
	        $this->smarty->display('layouts/sub.tpl');
    	} else {
    		$this->_redirect('/login_or_reg.html');
    	}
    }
    

    public function pageAction() {

    	if( ($this->_hasParam('page')&&$this->_getParam('page')==0)
			||!$this->_hasParam('page')
			||(($this->_hasParam('page')&&$this->_getParam('page')>1) && ($this->News->getPagesCount($this->lang_id)<=1 ))
			||($this->_getParam('page')>1&&$this->News->getPagesCount($this->lang_id)<$this->_getParam('page'))
		){
			$this->_redirect("/news_page1.html");
		}
    	$page = $this->_hasParam('page')?((int)$this->_getParam('page')-1):0;
    	$items = $this->News->getNewsForPage($this->lang_id, $page);
    	
    	$this->smarty->assign('items', $items);
        $this->smarty->assign('Title', 'News');
        $this->smarty->assign('page_num', $page+1);
        $this->smarty->assign('page_count', $this->News->getPagesCount($this->lang_id));
        $this->smarty->assign('PageBody', 'news/show_items.tpl');
        $this->smarty->display('layouts/sub.tpl');
    }
    
    public function dateAction() {
    	$this->smarty->assign('news_link', 'active');
        $date = $this->_hasParam('date')?($this->_getParam('date')):date('Y-m-d'); 
        $items = $this->News->getNewsByDate($date);
        $this->smarty->assign('no_paging', true);
        $this->smarty->assign('items', $items);
        $this->smarty->assign('Title', 'News items');
        $this->smarty->assign('PageBody', 'news/show_items.tpl');
        $this->smarty->display('layouts/main.tpl');
    }

    //***** payment process ****//
    public function payCodeAction(){
//        $code =  md5('boncevicha@gmail.com'.'1');
//        echo $code; die();

        if($this->_hasParam('pay-code')&&$this->_getParam('pay-code')!=''){
            $_SESSION['pay-code'] = $this->_getParam('pay-code');
            $this->_redirect("/payment.html");
        } else {
            $this->_redirect("/error-page.html");
        }
    }


    public function paymentAction(){
        if(isset($_SESSION['pay-code'])&&$_SESSION['pay-code']!=''){

            $payCode = $_SESSION['pay-code'];
            $data = $this->orders->getOrderByCode($payCode);
            if(isset($data['payed'])&&$data['payed']!=1){
                $cart = json_decode($data['products'], true);

                $settings = $this->settings->getSettingsById(1);

                $roboData = array();
                if(isset($settings->settings_roboxchange_testmode)&&$settings->settings_roboxchange_testmode=='on'){
                    $roboData['url'] = "http://test.robokassa.ru/Index.aspx";
                } else {
                    $roboData['url'] = "https://merchant.roboxchange.com/Index.aspx";
                }

                $roboData['mrh_login'] = $settings->settings_roboxchange_username;
                $roboData['mrh_pass1'] = $settings->settings_roboxchange_password;
                $roboData['inv_id']    = $data['id'];
                $roboData['inv_desc']  = "Оплата заказа #".$data['id'];
                $roboData['out_summ']  = $data['price'].".00";
                $roboData['shp_item']  = "2";
                $roboData['in_curr']   = "";
                $roboData['culture']   = "ru";

                $mrh_login = $roboData['mrh_login'];
                $out_summ  = $roboData['out_summ'];
                $inv_id    = $roboData['inv_id'];
                $mrh_pass1 = $roboData['mrh_pass1'];
                $shp_item  = $roboData['shp_item'];

                $roboData['crc']       = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");

                $this -> smarty -> assign('roboData', $roboData);

                $this -> smarty -> assign('cart', $cart);
                $this -> smarty -> assign('PageBody', 'orders/cart2.tpl');
                $this -> smarty -> display('layouts/sub.tpl');
            } else {
                $this->_redirect("/error-page.html");
            }
        }
    }

//    public function paymentsuccessAction(){
//        if(isset($_REQUEST["SignatureValue"])&&$_REQUEST["SignatureValue"]!=''){
//
//            $settings = $this->settings->getSettingsById(1);
//            $mrh_pass1 = $settings->settings_roboxchange_password;
//
//            $out_summ = $_REQUEST["OutSum"];
//            $inv_id = $_REQUEST["InvId"];
//            $shp_item = $_REQUEST["Shp_item"];
//            $crc = $_REQUEST["SignatureValue"];
//
//            $crc = strtoupper($crc);
//
//            $my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item"));
//
//            // проверка корректности подписи
//            // check signature
//            if ($my_crc != $crc) {
//                $this->_redirect("/payment_fail.html");
//            } else {
//                $this->orders->payedOrder($inv_id);
//            }
//
//            $item = $this->Content->getPageByLink("payment_success", $this->lang_id);
//            $this->smarty->assign('item', $item);
//            $this->smarty->assign('meta_title', $item['meta_title']);
//            $this->smarty->assign('meta_keywords', $item['meta_keywords']);
//            $this->smarty->assign('meta_description', $item['meta_description']);
//
//            $this->smarty->assign('PageBody', 'orders/payment_success.tpl');
//            $this->smarty->display('layouts/sub.tpl');
//        } else {
//            $this->_redirect("/error-page.html");
//        }
//    }
//
//    public function paymentfailAction(){
//        $item = $this->Content->getPageByLink("payment-fail", $this->lang_id);
//        $this->smarty->assign('item', $item);
//        $this->smarty->assign('meta_title', $item['meta_title']);
//        $this->smarty->assign('meta_keywords', $item['meta_keywords']);
//        $this->smarty->assign('meta_description', $item['meta_description']);
//        $this->smarty->assign('PageBody', 'orders/payment_fail.tpl');
//        $this->smarty->display('layouts/sub.tpl');
//    }
//
//
//
//    public function precompleteAction(){
//        $_SESSION['order']['sitename']  = $this->_getParam('sitename');
//        $_SESSION['order']['domain']    = $this->_getParam('domain').$this->_getParam('domain_zone');
//        if(!isset($_SESSION['loginNamespace']['storage']->member_id)){
//            $this->_redirect('/login_or_reg.html');
//        } else {
//            $this->_redirect('/payment.html');
//        }
//    }
}
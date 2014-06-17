<?php

/** Get controller instance */
$controller = Zend_Controller_Front::getInstance();

/** Disable default View Render */
Zend_Controller_Action_HelperBroker::removeHelper('viewRenderer');
$controller -> setParam('noViewRenderer', true);

/** Setting controller directory */ 
$controller -> setControllerDirectory(ROOT . 'application/controllers/default', 'default');

/** ------------------- Adding modules ------------------- */

/** User area module */
$controller -> addControllerDirectory(ROOT . 'application/controllers/area', 'area');

/** User areap module */
$controller -> addControllerDirectory(ROOT . 'application/controllers/areap', 'areap');

/** Login module */
$controller -> addControllerDirectory(ROOT . 'application/controllers/login', 'login');

/** Error module */
$controller -> addControllerDirectory(ROOT . 'application/controllers/errors', 'errors');

/** admin module */
$controller -> addControllerDirectory(ROOT . 'application/controllers/admin', 'admin');
/** admin area module */
$controller -> addControllerDirectory(ROOT . 'application/controllers/prarea', 'prarea');
/** content module */
$controller -> addControllerDirectory(ROOT . 'application/controllers/content', 'content');
/** news module */
$controller -> addControllerDirectory(ROOT . 'application/controllers/news', 'news');

$controller -> addControllerDirectory(ROOT . 'application/controllers/deals', 'deals');

$controller -> addControllerDirectory(ROOT . 'application/controllers/actions', 'actions');

$controller -> addControllerDirectory(ROOT . 'application/controllers/novelty', 'novelty');

$controller -> addControllerDirectory(ROOT . 'application/controllers/contact', 'contact');

$controller -> addControllerDirectory(ROOT . 'application/controllers/feedback', 'feedback');

$controller -> addControllerDirectory(ROOT . 'application/controllers/map', 'map');

$controller -> addControllerDirectory(ROOT . 'application/controllers/search', 'search');

$controller -> addControllerDirectory(ROOT . 'application/controllers/faq', 'faq');

$controller -> addControllerDirectory(ROOT . 'application/controllers/sitemap', 'sitemap');

$controller -> addControllerDirectory(ROOT . 'application/controllers/aboutus', 'aboutus');

$controller -> addControllerDirectory(ROOT . 'application/controllers/coordinates', 'coordinates');

$controller -> addControllerDirectory(ROOT . 'application/controllers/languages', 'languages');

$controller -> addControllerDirectory(ROOT . 'application/controllers/sections', 'sections');

$controller -> addControllerDirectory(ROOT . 'application/controllers/catalog', 'catalog');

$controller -> addControllerDirectory(ROOT . 'application/controllers/ajax', 'ajax');

$controller -> addControllerDirectory(ROOT . 'application/controllers/registration', 'registration');

$controller -> addControllerDirectory(ROOT . 'application/controllers/profile', 'profile');

$controller -> addControllerDirectory(ROOT . 'application/controllers/orders', 'orders');

$controller -> addControllerDirectory(ROOT . 'application/controllers/links', 'links');

$controller -> addControllerDirectory(ROOT . 'application/controllers/reviews', 'reviews');

$controller -> addControllerDirectory(ROOT . 'application/controllers/articles', 'articles');

$controller -> addControllerDirectory(ROOT . 'application/controllers/forum', 'forum');

$controller -> addControllerDirectory(ROOT . 'application/controllers/documentation', 'documentation');

$controller -> addControllerDirectory(ROOT . 'application/controllers/products', 'products');

$controller -> addControllerDirectory(ROOT . 'application/controllers/deals', 'deals');

$router = $controller -> getRouter();


/*****************************************************************************************/
/************************************* Articles ******************************************/
/*****************************************************************************************/
$ArticlesPage = new Zend_Controller_Router_Route_Regex(
    'articles/page/(\d*)',
    array('module'=>'articles', 'controller'=>'index', 'action'=>'index'),
    array(1  =>'page')
);
$router -> addRoute('ArticlesPage', $ArticlesPage);

$ArticlesSection = new Zend_Controller_Router_Route_Regex(
    'articles/section/(.+)/page/(\d*)',
    array('module'=>'articles', 'controller'=>'index', 'action'=>'section'),
    array(1  =>'link', 2 => 'page')
);
$router -> addRoute('ArticlesSection', $ArticlesSection);

$ArticlesCategory = new Zend_Controller_Router_Route_Regex(
    'articles/category/(.+)/page/(\d*)',
    array('module'=>'articles', 'controller'=>'index', 'action'=>'category'),
    array(1  =>'link', 2 => 'page')
);
$router -> addRoute('ArticlesCategory', $ArticlesCategory);

$ArticlesView = new Zend_Controller_Router_Route_Regex(
    'article/(.+)',
    array('module'=>'articles', 'controller'=>'index', 'action'=>'view'),
    array(1  =>'link')
);
$router -> addRoute('ArticlesView', $ArticlesView);


/*****************************************************************************************/
/************************************* Products ******************************************/
/*****************************************************************************************/
$ProductsPage = new Zend_Controller_Router_Route_Regex(
    'products/page/(\d*)',
    array('module'=>'products', 'controller'=>'index', 'action'=>'index'),
    array(1  =>'page')
);
$router -> addRoute('ProductsPage', $ProductsPage);

$ProductsSection = new Zend_Controller_Router_Route_Regex(
    'products/section/(.+)/page/(\d*)',
    array('module'=>'products', 'controller'=>'index', 'action'=>'section'),
    array(1  =>'link', 2 => 'page')
);
$router -> addRoute('ArticlesSection', $ProductsSection);

$ProductsCategory = new Zend_Controller_Router_Route_Regex(
    'products/category/(.+)/page/(\d*)',
    array('module'=>'products', 'controller'=>'index', 'action'=>'category'),
    array(1  =>'link', 2 => 'page')
);
$router -> addRoute('ProductsCategory', $ProductsCategory);

$ProductView = new Zend_Controller_Router_Route_Regex(
    'article/(.+)',
    array('module'=>'articles', 'controller'=>'index', 'action'=>'view'),
    array(1  =>'link')
);
$router -> addRoute('ProductView', $ProductView);


/*****************************************************************************************/
/************************************* Deals *********************************************/
/*****************************************************************************************/
$DealsPage = new Zend_Controller_Router_Route_Regex(
    'deals/page/(\d*)',
    array('module'=>'deals', 'controller'=>'index', 'action'=>'index'),
    array(1  =>'page')
);
$router -> addRoute('DealsPage', $DealsPage);

$DealsSection = new Zend_Controller_Router_Route_Regex(
    'deals/section/(.+)/page/(\d*)',
    array('module'=>'deals', 'controller'=>'index', 'action'=>'section'),
    array(1  =>'link', 2 => 'page')
);
$router -> addRoute('DealsSection', $DealsSection);

$DealsCategory = new Zend_Controller_Router_Route_Regex(
    'deals/category/(.+)/page/(\d*)',
    array('module'=>'deals', 'controller'=>'index', 'action'=>'category'),
    array(1  =>'link', 2 => 'page')
);
$router -> addRoute('DealsCategory', $DealsCategory);






//******************************************************************************
//***************************** STATIC PAGES ***********************************
//******************************************************************************

$PageAboutUs = new Zend_Controller_Router_Route_Regex(
    'about-us.html',
    array('module'=>'content', 'controller'=>'about', 'action'=>'index')
);
$router -> addRoute('PageAboutUs', $PageAboutUs);


$GetFile = new Zend_Controller_Router_Route_Regex(
    'getfile(\d*).html',
    array('module'=>'content', 'controller'=>'files', 'action'=>'index'),
    array(1  =>'file_id')
);
$router -> addRoute('GetFile', $GetFile);

$PageError = new Zend_Controller_Router_Route_Regex(
    'error-page.html',
    array('module'=>'errors', 'controller'=>'index', 'action'=>'index')
);
$router -> addRoute('PageError', $PageError);

$PageComingSoon = new Zend_Controller_Router_Route_Regex(
    'coming-soon.html',
    array('module'=>'errors', 'controller'=>'index', 'action'=>'coming-soon')
);
$router -> addRoute('PageComingSoon', $PageComingSoon);


$DownloadProductFile = new Zend_Controller_Router_Route_Regex(
    'download/product/(.+)',
    array('module'=>'products', 'controller'=>'index', 'action'=>'download'),
    array(1  =>'hash')
);
$router -> addRoute('DownloadProductFile', $DownloadProductFile);


$PageDocumentation = new Zend_Controller_Router_Route_Regex(
    'documentation.html',
    array('module'=>'documentation', 'controller'=>'index', 'action'=>'index')
);
$router -> addRoute('PageDocumentation', $PageDocumentation);


$PageShops = new Zend_Controller_Router_Route_Regex(
    'shops.html',
    array('module'=>'content', 'controller'=>'pages', 'action'=>'shops')
);
$router -> addRoute('PageShops', $PageShops);

$PageActions = new Zend_Controller_Router_Route_Regex(
    'actions.html',
    array('module'=>'content', 'controller'=>'pages', 'action'=>'actions')
);
$router -> addRoute('PageActions', $PageActions);

$PageWholesalers = new Zend_Controller_Router_Route_Regex(
    'wholesalers.html',
    array('module'=>'content', 'controller'=>'pages', 'action'=>'wholesalers')
);
$router -> addRoute('PageWholesalers', $PageWholesalers);

$PageDelivery = new Zend_Controller_Router_Route_Regex(
    'delivery.html',
    array('module'=>'content', 'controller'=>'pages', 'action'=>'delivery')
);
$router -> addRoute('PageDelivery', $PageDelivery);

$PageContacts = new Zend_Controller_Router_Route_Regex(
    'contacts.html',
    array('module'=>'content', 'controller'=>'pages', 'action'=>'contacts')
);
$router -> addRoute('PageContacts', $PageContacts);












$PagePartners = new Zend_Controller_Router_Route_Regex(
    'partners.html',
    array('module'=>'content', 'controller'=>'pages', 'action'=>'partners')
);
$router -> addRoute('PagePartners', $PagePartners);

$PageHowDoOrder = new Zend_Controller_Router_Route_Regex(
    'how-do-order.html',
    array('module'=>'content', 'controller'=>'pages', 'action'=>'how-do-order')
);
$router -> addRoute('PageHowDoOrder', $PageHowDoOrder);

//$PagePaymentMethods = new Zend_Controller_Router_Route_Regex(
//    'payment-methods.html',
//    array('module'=>'content', 'controller'=>'pages', 'action'=>'payment-methods')
//);
//$router -> addRoute('PagePaymentMethods', $PagePaymentMethods);

$PageSpecials = new Zend_Controller_Router_Route_Regex(
    'specials.html',
    array('module'=>'content', 'controller'=>'pages', 'action'=>'specials')
);
$router -> addRoute('PageSpecials', $PageSpecials);



$PageMain = new Zend_Controller_Router_Route_Regex(
    'main',
    array('module'=>'content', 'controller'=>'pages', 'action'=>'main')
);
$router -> addRoute('PageMain', $PageMain);

$PagePlus = new Zend_Controller_Router_Route_Regex(
    'plus',
    array('module'=>'content', 'controller'=>'pages', 'action'=>'plus')
);
$router -> addRoute('PagePlus', $PagePlus);

$PageAdvantages = new Zend_Controller_Router_Route_Regex(
    'advantages',
    array('module'=>'content', 'controller'=>'pages', 'action'=>'advantages')
);
$router -> addRoute('PageAdvantages', $PageAdvantages);

$PagePayment = new Zend_Controller_Router_Route_Regex(
    'payment',
    array('module'=>'content', 'controller'=>'pages', 'action'=>'payment')
);
$router -> addRoute('PagePayment', $PagePayment);

$PageOrderOnline = new Zend_Controller_Router_Route_Regex(
    'order-online',
    array('module'=>'contact', 'controller'=>'index', 'action'=>'order-online')
);
$router -> addRoute('PageOrderOnline', $PageOrderOnline);

$PageOrderOnlineComplete = new Zend_Controller_Router_Route_Regex(
    'order-online-complete',
    array('module'=>'contact', 'controller'=>'index', 'action'=>'order-online-complete')
);
$router -> addRoute('PageOrderOnlineComplete', $PageOrderOnlineComplete);

$PageReviewsComplete = new Zend_Controller_Router_Route_Regex(
    'reviews-complete',
    array('module'=>'reviews', 'controller'=>'index', 'action'=>'complete')
);
$router -> addRoute('PageReviewsComplete', $PageReviewsComplete);

$PageReviews = new Zend_Controller_Router_Route_Regex(
    'reviews/page/(\d*)',
    array('module'=>'reviews', 'controller'=>'index', 'action'=>'index'),
    array(1  =>'page')
);
$router -> addRoute('PageReviews', $PageReviews);




//******************************************************************************
//***************************** FORUM ******************************************
//******************************************************************************
$ViewForumTopic = new Zend_Controller_Router_Route_Regex(
    'forum/topic/(\d*).html',
    array('module'=>'forum', 'controller'=>'index', 'action'=>'view'),
    array(1  =>'id')
);
$router -> addRoute('ViewForumTopic', $ViewForumTopic);

$Forum = new Zend_Controller_Router_Route_Regex(
    'forum.html',
    array('module'=>'forum', 'controller'=>'index', 'action'=>'index')
);
$router -> addRoute('Forum', $Forum);

$ForumPages = new Zend_Controller_Router_Route_Regex(
    'forum/page/(\d*)',
    array('module'=>'forum', 'controller'=>'index', 'action'=>'page'),
    array(1  =>'page')
);
$router -> addRoute('ForumPages', $ForumPages);



//****************** MY ORDERS ******************************************************************
$orders__add_to_cart = new Zend_Controller_Router_Route_Regex(
    'orders/add-to-cart/(\d*)',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'add-to-cart'),
    array(1  =>'product_id')
);
$router -> addRoute('orders__add_to_cart', $orders__add_to_cart);


$orders__del_from_cart = new Zend_Controller_Router_Route_Regex(
    'orders/del-from-cart/(\d*)',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'del-from-cart'),
    array(1  =>'product_id')
);
$router -> addRoute('orders__del_from_cart', $orders__del_from_cart);



$orders__shopping_cart = new Zend_Controller_Router_Route_Regex(
    'shopping-cart.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'index'),
    array(1  =>'page')
);
$router -> addRoute('orders__shopping_cart', $orders__shopping_cart);


$order_form = new Zend_Controller_Router_Route_Regex(
    'order-form.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'order-form')
);
$router -> addRoute('order_form', $order_form);


$payment_methods = new Zend_Controller_Router_Route_Regex(
    'payment-methods.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'payment-methods')
);
$router -> addRoute('payment_methods', $payment_methods);


$confirm_pay = new Zend_Controller_Router_Route_Regex(
    'confirm-pay.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'confirm-pay')
);
$router -> addRoute('confirm_pay', $confirm_pay);


$paymentCallback = new Zend_Controller_Router_Route_Regex(
    'payment-callback.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'payment-callback')
);
$router -> addRoute('paymentCallback', $paymentCallback);


$paymentSuccess = new Zend_Controller_Router_Route_Regex(
    'payment-success.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'payment-success')
);
$router -> addRoute('paymentSuccess', $paymentSuccess);


$paymentFail = new Zend_Controller_Router_Route_Regex(
    'payment-fail.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'payment-fail')
);
$router -> addRoute('paymentFail', $paymentFail);



//$myorders_page = new Zend_Controller_Router_Route_Regex(
//    'orders/page/(\d*)',
//    array('module' => 'orders', 'controller' => 'index', 'action' => 'index'),
//    array(1  =>'page')
//);
//$router -> addRoute('myorders_page', $myorders_page);

$view_order = new Zend_Controller_Router_Route_Regex(
    'orders/view/(\d*)',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'view'),
    array(1  =>'orderId')
);
$router -> addRoute('view_order', $view_order);

$preview_order = new Zend_Controller_Router_Route_Regex(
    'order-preview.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'preview-order')
);
$router -> addRoute('preview_order', $preview_order);


$preview_order2 = new Zend_Controller_Router_Route_Regex(
    'order-preview2.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'preview-order2')
);
$router -> addRoute('preview_order2', $preview_order2);




$order_completed = new Zend_Controller_Router_Route_Regex(
    'order-completed.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'order-completed')
);
$router -> addRoute('order_completed', $order_completed);








$rregistration = new Zend_Controller_Router_Route_Regex(
    'registration.html',
    array('module' => 'registration', 'controller' => 'index', 'action' => 'index')
);
$router -> addRoute('rregistration', $rregistration);


$getxml = new Zend_Controller_Router_Route_Regex(
    'getxml.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'getxml')
);
$router -> addRoute('getxml', $getxml);


/** CONTENT **/
$PageByLink = new Zend_Controller_Router_Route_Regex(
    'content/(.+)',
    array('module'=>'content', 'controller'=>'pages', 'action'=>'pagebylink'),
    array(1 =>'link')
    );
$router -> addRoute('PageByLink', $PageByLink);

/** About Company **/
$about_company = new Zend_Controller_Router_Route_Regex(
    '(.+)/about-company.html',
    array('module' => 'default', 'controller' => 'index', 'action' => 'index'),
    array(1  =>'lang_title')
);
$router -> addRoute('about_company', $about_company);


/*****************************************************************************************/
/************************************* Catalog *******************************************/
/*****************************************************************************************/
$Catalog = new Zend_Controller_Router_Route_Regex(
    'catalog.html',
    array('module'=>'catalog', 'controller'=>'index', 'action'=>'index')
);
$router -> addRoute('Catalog', $Catalog);

$CatalogSections = new Zend_Controller_Router_Route_Regex(
    'catalog/page/(\d*)',
    array('module'=>'sections', 'controller'=>'index', 'action'=>'catalog-sections'),
    array(1  =>'page')
);
$router -> addRoute('CatalogSections', $CatalogSections);

$CatalogSection = new Zend_Controller_Router_Route_Regex(
    'section/(.+)/page/(\d*)',
    array('module'=>'sections', 'controller'=>'index', 'action'=>'section'),
    array(1  =>'link', 2 => 'page')
);
$router -> addRoute('CatalogSection', $CatalogSection);

/** Sections **/
$CatalogSectionPage = new Zend_Controller_Router_Route_Regex(
    'catalog/sec/(.+)/cat/(.+)/page/(.+)',
    array('module'=>'sections', 'controller'=>'index', 'action'=>'catalog'),
    array(1  =>'section', 2  =>'category', 3  =>'page')
);
$router -> addRoute('CatalogSectionPage', $CatalogSectionPage);

$ArchiveSectionPage = new Zend_Controller_Router_Route_Regex(
    'archive/sec/(.+)/page/(.+)',
    array('module'=>'sections', 'controller'=>'index', 'action'=>'archive'),
    array(1  =>'sectionlink', 2  =>'page')
);
$router -> addRoute('ArchiveSectionPage', $ArchiveSectionPage);

$CatalogSectionBrandPage = new Zend_Controller_Router_Route_Regex(
    'catalog/sec/(.+)/brand/(.+)/page/(.+)',
    array('module'=>'sections', 'controller'=>'index', 'action'=>'index-brand'),
    array(1  =>'sectionlink', 2  =>'brandlink', 3  =>'page')
);
$router -> addRoute('CatalogSectionBrandPage', $CatalogSectionBrandPage);

$ArchiveSectionBrandPage = new Zend_Controller_Router_Route_Regex(
    'archive/sec/(.+)/brand/(.+)/page/(.+)',
    array('module'=>'sections', 'controller'=>'index', 'action'=>'archive-brand'),
    array(1  =>'sectionlink', 2  =>'brandlink', 3  =>'page')
);
$router -> addRoute('ArchiveSectionBrandPage', $ArchiveSectionBrandPage);

//$CatalogSectionBrandProduct = new Zend_Controller_Router_Route_Regex(
//    'catalog/sec/(.+)/brand/(.+)/product/(.+)',
//    array('module'=>'sections', 'controller'=>'index', 'action'=>'productbylink'),
//    array(1  =>'sectionlink', 2  =>'brandlink', 3  =>'productlink')
//);
//$router -> addRoute('CatalogSectionBrandProduct', $CatalogSectionBrandProduct);

//$CatalogSectionProduct = new Zend_Controller_Router_Route_Regex(
//    'catalog/sec/(.+)/product/(.+)',
//    array('module'=>'sections', 'controller'=>'index', 'action'=>'productbylink'),
//    array(1  =>'sectionlink', 2  =>'productlink')
//);
//$router -> addRoute('CatalogSectionProduct', $CatalogSectionProduct);

$ProductsView = new Zend_Controller_Router_Route_Regex(
    'product/(.+)',
    array('module'=>'products', 'controller'=>'index', 'action'=>'index'),
    array(1 =>'productlink')
);
$router -> addRoute('ProductsView', $ProductsView);

$FindProducts = new Zend_Controller_Router_Route_Regex(
    'find.html',
    array('module'=>'sections', 'controller'=>'index', 'action'=>'find'),
    array(1  =>'sectionlink', 2  =>'productlink')
);
$router -> addRoute('FindProducts', $FindProducts);

///** Sections **/
//$SectionByLink = new Zend_Controller_Router_Route_Regex(
//    'catalog/(.+)',
//    array('module'=>'sections', 'controller'=>'index', 'action'=>'sectionbylink'),
//    array(1  =>'link')
//    );
//$router -> addRoute('SectionByLink', $SectionByLink);

/** Category **/
$CategoryByLink = new Zend_Controller_Router_Route_Regex(
    'catalog-cat/(.+)/(.+)',
    array('module'=>'sections', 'controller'=>'index', 'action'=>'categorybylink'),
    array(1  =>'sectionlink', 2  =>'categorylink')
);
$router -> addRoute('CategoryByLink', $CategoryByLink);

///** Sections **/
//$ProductByLink = new Zend_Controller_Router_Route_Regex(
//    'catalog/(.+)/(.+)',
//    array('module'=>'sections', 'controller'=>'index', 'action'=>'productbylink'),
//    array(1  =>'sectionlink', 2  =>'productlink')
//);
//$router -> addRoute('ProductByLink', $ProductByLink);

//$SectionIndex = new Zend_Controller_Router_Route_Regex(
//    'catalog',
//    array('module'=>'sections', 'controller'=>'index', 'action'=>'index')
//);
//$router -> addRoute('SectionIndex', $SectionIndex);

///** Sections **/
//$CategoryByLink = new Zend_Controller_Router_Route_Regex(
//    '(.+)/categories/(.+\.html)',
//    array('module'=>'sections', 'controller'=>'index', 'action'=>'categorybylink'),
//    array(1  =>'lang_title', 2  =>'link')
//    );
//$router -> addRoute('CategoryByLink', $CategoryByLink);

/********************************************************************/
/*************************** NEWS ***********************************/
/********************************************************************/
$ViewNew = new Zend_Controller_Router_Route_Regex(
    'new(\d*).html',
    array('module'=>'news', 'controller'=>'index', 'action'=>'view'),
    array(1  =>'new_id')
    );
$router -> addRoute('ViewNew ', $ViewNew );

//$News = new Zend_Controller_Router_Route_Regex(
//    'news.html',
//    array('module'=>'news', 'controller'=>'index', 'action'=>'index'),
//    array(1  =>'lang_title')
//    );
//$router -> addRoute('News', $News);

$NewsPages = new Zend_Controller_Router_Route_Regex(
    'news/page/(\d*)',
    array('module'=>'news', 'controller'=>'index', 'action'=>'index'),
    array(1  =>'page')
    );
$router -> addRoute('NewsPages', $NewsPages);

/********************************************************************/
/*************************** NOVELTY ********************************/
/********************************************************************/
$NoveltyPages = new Zend_Controller_Router_Route_Regex(
    'novelty/page/(\d*)',
    array('module'=>'novelty', 'controller'=>'index', 'action'=>'index'),
    array(1  =>'page')
);
$router -> addRoute('NoveltyPages', $NoveltyPages);

$NoveltyView = new Zend_Controller_Router_Route_Regex(
    'novelty/view/(.+)',
    array('module'=>'novelty', 'controller'=>'index', 'action'=>'view'),
    array(1  =>'link')
);
$router -> addRoute('NoveltyView', $NoveltyView);

/********************************************************************/
/*************************** NOVELTY ********************************/
/********************************************************************/
$ActionsPages = new Zend_Controller_Router_Route_Regex(
    'actions/page/(\d*)',
    array('module'=>'actions', 'controller'=>'index', 'action'=>'index'),
    array(1  =>'page')
);
$router -> addRoute('ActionsPages', $ActionsPages);

$ActionsView = new Zend_Controller_Router_Route_Regex(
    'actions/view/(.+)',
    array('module'=>'actions', 'controller'=>'index', 'action'=>'view'),
    array(1  =>'link')
);
$router -> addRoute('ActionsView', $ActionsView);





/** feedback  **/
$feedback = new Zend_Controller_Router_Route_Regex(
    'feedback.html',
    array('module' => 'feedback', 'controller' => 'index', 'action' => 'index')
);
$router -> addRoute('feedback', $feedback);

$feedback_complete = new Zend_Controller_Router_Route_Regex(
    'message-sent.html',
    array('module' => 'feedback', 'controller' => 'index', 'action' => 'sent')
);
$router -> addRoute('feedback_complete', $feedback_complete);

$messagewassent = new Zend_Controller_Router_Route_Regex(
    'messagewassent.html',
    array('module' => 'feedback', 'controller' => 'index', 'action' => 'success')
);
$router -> addRoute('messagewassent', $messagewassent);

/* Sections*/
$sections = new Zend_Controller_Router_Route_Regex(
    '(.+)/sections.html',
    array('module' => 'sections', 'controller' => 'index', 'action' => 'index'),
    array(1  =>'lang_title')
);
$router -> addRoute('sections', $sections);

/* Contacts */
$contacts = new Zend_Controller_Router_Route_Regex(
    '(.+)/contacts.html',
    array('module' => 'contact', 'controller' => 'index', 'action' => 'index'),
    array(1  =>'lang_title')
);
$router -> addRoute('contacts', $contacts);

/* Map */
$map = new Zend_Controller_Router_Route_Regex(
    '(.+)/map.html',
    array('module' => 'map', 'controller' => 'index', 'action' => 'index'),
    array(1  =>'lang_title')
);
$router -> addRoute('map', $map);

$messagesent = new Zend_Controller_Router_Route_Regex(
    'messagesent.html',
    array('module' => 'contact', 'controller' => 'index', 'action' => 'success')
);
$router -> addRoute('messagesent', $messagesent);

$message = new Zend_Controller_Router_Route_Regex(
    'message.html',
    array('module' => 'contact', 'controller' => 'index', 'action' => 'message')
);
$router -> addRoute('message', $message);

$sendmail = new Zend_Controller_Router_Route_Regex(
    'contact/sendmail',
    array('module' => 'contact', 'controller' => 'index', 'action' => 'sendmail')
);
$router -> addRoute('sendmail', $sendmail);

$service = new Zend_Controller_Router_Route_Regex(
    'service.html',
    array('module' => 'service', 'controller' => 'index', 'action' => 'index')
);
$router -> addRoute('service', $service);

$faq = new Zend_Controller_Router_Route_Regex(
    'faq.html',
    array('module' => 'faq', 'controller' => 'index', 'action' => 'index')
);
$router -> addRoute('faq', $faq);


$addressessc = new Zend_Controller_Router_Route_Regex(
    'addressessc.html',
    array('module' => 'addressessc', 'controller' => 'index', 'action' => 'index')
);
$router -> addRoute('addressessc', $addressessc);

$sitemap = new Zend_Controller_Router_Route_Regex(
    'sitemap.html',
    array('module' => 'sitemap', 'controller' => 'index', 'action' => 'index')
);
$router -> addRoute('sitemap', $sitemap);

$links = new Zend_Controller_Router_Route_Regex(
    'links.html',
    array('module' => 'links', 'controller' => 'index', 'action' => 'links')
);
$router -> addRoute('links', $links);

$coordinates = new Zend_Controller_Router_Route_Regex(
    'coordinates.html',
    array('module' => 'coordinates', 'controller' => 'index', 'action' => 'index')
);
$router -> addRoute('coordinates', $coordinates);

$searchresult = new Zend_Controller_Router_Route_Regex(
    'search/search-words/(.+)',
    array('module' => 'search', 'controller' => 'index', 'action' => 'search'),
    array(1 => 'search_words')
);
$router -> addRoute('searchresult', $searchresult);

$price = new Zend_Controller_Router_Route_Regex(
    'price.html',
    array('module' => 'price', 'controller' => 'index', 'action' => 'index')
);
$router -> addRoute('price', $price);

$download = new Zend_Controller_Router_Route_Regex(
    '(\d*)download(\d*).html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'getfile'),
    array(1 => 'type', 2 => 'id')
);
$router -> addRoute('download', $download);

$tdownload = new Zend_Controller_Router_Route_Regex(
    'tdownload(\d*).html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'getfilet'),
    array(1 => 'id')
);
$router -> addRoute('tdownload', $tdownload);


$admin_download = new Zend_Controller_Router_Route_Regex(
    'admin/(\d*)download(\d*).html',
    array('module' => 'admin', 'controller' => 'orders', 'action' => 'getfile'),
    array(1 => 'type', 2 => 'id')
);
$router -> addRoute('admin_download', $admin_download);

$admin_tdownload = new Zend_Controller_Router_Route_Regex(
    'admin/tdownload(\d*).html',
    array('module' => 'admin', 'controller' => 'orders', 'action' => 'getfilet'),
    array(1 => 'id')
);
$router -> addRoute('admin_tdownload', $admin_tdownload);

//*********************** Section ********************************************

$sectioncat = new Zend_Controller_Router_Route_Regex(
    'p(\d*)_section(\d*)_c(\d*).html',
    array('module' => 'sections', 'controller' => 'index', 'action' => 'sectioncat'),
    array(1 => 'page', 2 => 'section_id', 3  =>'category_id')
);
$router -> addRoute('sectioncat', $sectioncat);

//$sections = new Zend_Controller_Router_Route_Regex(
//    'sections.html',
//    array('module' => 'sections', 'controller' => 'index', 'action' => 'sections')
//);
//$router -> addRoute('sections', $sections);

//*************** LOGIN ******************************************************
$loginPage = new Zend_Controller_Router_Route_Regex(
	'loginpage.html',
	array('module'=>'login', 'controller'=>'index', 'action'=>'loginpage')
);
$router->addRoute('loginPage', $loginPage);

$changePassword = new Zend_Controller_Router_Route_Regex(
	'login/changePassword/vkey/(.+)',
	array('module' => 'login', 'controller' => 'LostPassword', 'action' => 'changePassword'),
	array(1 => 'change_pass_code')
);

$usersLogout = new Zend_Controller_Router_Route_Regex(
	'users/logout.html',
	array('module'=>'users', 'controller'=>'default', 'action'=>'logout')
);
$router->addRoute('usersLogout', $usersLogout);

$Logout = new Zend_Controller_Router_Route_Regex(
	'logout.html',
	array('module'=>'login', 'controller'=>'index', 'action'=>'logout')
);
$router->addRoute('Logout', $Logout);

$joinnowpage = new Zend_Controller_Router_Route_Regex(
    'joinnow.html',
    array('module' => 'registration', 'controller' => 'index', 'action' => 'joinnowpage')
);
$router -> addRoute('joinnowpage', $joinnowpage);

$loginorreg = new Zend_Controller_Router_Route_Regex(
    'login_or_reg.html',
    array('module' => 'order', 'controller' => 'index', 'action' => 'loginorreg')
);
$router -> addRoute('loginorreg', $loginorreg);

$payCode = new Zend_Controller_Router_Route_Regex(
    'payment/pay-code/(.+)',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'pay-code'),
    array(1 => 'pay-code')
);
$router -> addRoute('payCode', $payCode);

$payment = new Zend_Controller_Router_Route_Regex(
    'payment.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'payment')
);
$router -> addRoute('payment', $payment);

$pay = new Zend_Controller_Router_Route_Regex(
    'pay.html',
    array('module' => 'order', 'controller' => 'index', 'action' => 'pay')
);
$router -> addRoute('pay', $pay);

$payment_result = new Zend_Controller_Router_Route_Regex(
    'payment_result.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'paymentresult')
);
$router -> addRoute('payment_result', $payment_result);

$payment_success = new Zend_Controller_Router_Route_Regex(
    'payment_success.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'paymentsuccess')
);
$router -> addRoute('payment_success', $payment_success);


$payment_fail = new Zend_Controller_Router_Route_Regex(
    'payment_fail.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'paymentfail')
);
$router -> addRoute('payment_fail', $payment_fail);


$order_complete = new Zend_Controller_Router_Route_Regex(
    'complete.html',
    array('module' => 'orders', 'controller' => 'index', 'action' => 'complete')
);
$router -> addRoute('order_complete', $order_complete);



$regcomplete = new Zend_Controller_Router_Route_Regex(
    'regcomplete.html',
    array('module' => 'registration', 'controller' => 'index', 'action' => 'regcomplete')
);
$router -> addRoute('regcomplete', $regcomplete);

$forgotPassword = new Zend_Controller_Router_Route_Regex(
	'forgotpassword.html',
	array('module' => 'login', 'controller' => 'LostPassword', 'action' => 'forgotpassword'),
	array(1 => 'change_pass_code')
);
$router -> addRoute('forgotPassword', $forgotPassword);

$rpasswordcomplete = new Zend_Controller_Router_Route_Regex(
	'rcomplete.html',
	array('module' => 'login', 'controller' => 'LostPassword', 'action' => 'rpasswordcomplete')
);
$router -> addRoute('rpasswordcomplete', $rpasswordcomplete);


//******************************************************************************
//***************************** Profile ****************************************
//******************************************************************************
$profile = new Zend_Controller_Router_Route_Regex(
    'profile.html',
    array('module' => 'profile', 'controller' => 'index', 'action' => 'index')
);
$router -> addRoute('profile', $profile);

$profile_orders = new Zend_Controller_Router_Route_Regex(
    'profile/orders.html',
    array('module' => 'profile', 'controller' => 'index', 'action' => 'orders')
);
$router -> addRoute('profile_orders', $profile_orders);

$profile_products = new Zend_Controller_Router_Route_Regex(
    'profile/products.html',
    array('module' => 'profile', 'controller' => 'index', 'action' => 'products')
);
$router -> addRoute('profile_products', $profile_products);

$profile_sales = new Zend_Controller_Router_Route_Regex(
    'profile/sales.html',
    array('module' => 'profile', 'controller' => 'index', 'action' => 'sales')
);
$router -> addRoute('profile_sales', $profile_sales);

$profile_product_add = new Zend_Controller_Router_Route_Regex(
    'profile/products/add',
    array('module' => 'profile', 'controller' => 'index', 'action' => 'product-add')
);
$router -> addRoute('profile_product_add', $profile_product_add);

$profile_product_modify = new Zend_Controller_Router_Route_Regex(
    'profile/products/modify/id/(\d*)',
    array('module' => 'profile', 'controller' => 'index', 'action' => 'product-modify'),
    array(1 => 'id')
);
$router -> addRoute('profile_product_modify', $profile_product_modify);

$profile_product_modify_update = new Zend_Controller_Router_Route_Regex(
    'profile/products/modify',
    array('module' => 'profile', 'controller' => 'index', 'action' => 'product-modify')
);
$router -> addRoute('profile_product_modify_update', $profile_product_modify_update);

$profile_product_delete = new Zend_Controller_Router_Route_Regex(
    'profile/products/delete/id/(\d*)',
    array('module' => 'profile', 'controller' => 'index', 'action' => 'product-delete'),
    array(1 => 'id')
);
$router -> addRoute('profile_product_delete', $profile_product_delete);
//****************** ORDER PROCCESS *************************************************************

$choosing = new Zend_Controller_Router_Route_Regex(
    'choosing.html',
    array('module' => 'order', 'controller' => 'index', 'action' => 'choosing')
);
$router -> addRoute('choosing', $choosing);

$order_step1 = new Zend_Controller_Router_Route_Regex(
    'step1.html',
    array('module' => 'order', 'controller' => 'index', 'action' => 'step1')
);
$router -> addRoute('order_step1', $order_step1);

$order_step2 = new Zend_Controller_Router_Route_Regex(
    'step2_page(\d*).html',
    array('module' => 'order', 'controller' => 'index', 'action' => 'step2'),
    array(1  =>'page')
);
$router -> addRoute('order_step2', $order_step2);

$order_step3 = new Zend_Controller_Router_Route_Regex(
    'step3.html',
    array('module' => 'order', 'controller' => 'index', 'action' => 'step3')
);
$router -> addRoute('order_step3', $order_step3);




//****************** ORDER STATUS ***************************************************************

$orderstatus = new Zend_Controller_Router_Route_Regex(
    'orderstatus.html',
    array('module' => 'orderstatus', 'controller' => 'index', 'action' => 'index')
);
$router -> addRoute('orderstatus', $orderstatus);

$orderstatus2 = new Zend_Controller_Router_Route_Regex(
    'orderstatus2.html',
    array('module' => 'orderstatus', 'controller' => 'index', 'action' => 'showorderstatus')
);
$router -> addRoute('orderstatus2', $orderstatus2);

$orderstatus_list = new Zend_Controller_Router_Route_Regex(
    'orderstatus_list.html',
    array('module' => 'orderstatus', 'controller' => 'index', 'action' => 'orderstatuslist')
);
$router -> addRoute('orderstatus_list', $orderstatus_list);






//*************** SITEMAP ****************************************************
$sitemap = new Zend_Controller_Router_Route_Regex(
    'sitemap.html',
    array('module' => 'sitemap', 'controller' => 'index', 'action' => 'index')
);
$router -> addRoute('sitemap', $sitemap);

$adminLogout = new Zend_Controller_Router_Route_Regex(
	'admin/logout.html',
	array('module'=>'admin', 'controller'=>'index', 'action'=>'logout')
);

//****************** NEWS ***************************************************************
$AdminNewsPages = new Zend_Controller_Router_Route_Regex(
    'admin/news/page/(\d*)',
    array('module'=>'admin', 'controller'=>'news', 'action'=>'page'),
    array(1  =>'page')
    );
$router -> addRoute('AdminNewsPages', $AdminNewsPages);

//****************** MEMBERS ***************************************************************
$AdminMembersPages = new Zend_Controller_Router_Route_Regex(
    'admin/members/page/(\d*)',
    array('module'=>'admin', 'controller'=>'members', 'action'=>'index'),
    array(1  =>'page')
    );
$router -> addRoute('AdminMembersPages', $AdminMembersPages);

//****************** FILES ***************************************************************
$AdminFilesPages = new Zend_Controller_Router_Route_Regex(
    'admin/files/page/(\d*)',
    array('module'=>'admin', 'controller'=>'files', 'action'=>'page'),
    array(1  =>'page')
    );
$router -> addRoute('AdminFilesPages', $AdminFilesPages);

//$NewsPages = new Zend_Controller_Router_Route_Regex(
//    'news_page(\d*).html',
//    array('module'=>'news', 'controller'=>'index', 'action'=>'page'),
//    array(1  =>'page')
//    );
//$router -> addRoute('NewsPages', $NewsPages);

$NewsDate = new Zend_Controller_Router_Route_Regex(
    'news/date/(\d{4}-\d{2}-\d{2})',
    array('module'=>'content', 'controller'=>'news', 'action'=>'date'),
    array(1  =>'date')
    );
$router -> addRoute('NewsDate', $NewsDate);
    
$AdminNewChangeStatus = new Zend_Controller_Router_Route_Regex(
    'admin/news/changestatus/(\d*)',
    array('module'=>'admin', 'controller'=>'news', 'action'=>'changestatus'),
    array(1  =>'new_id')
    );
$router->addRoute('AdminNewChangeStatus', $AdminNewChangeStatus);

//****************** LINKS ***************************************************************
$AdminLinks = new Zend_Controller_Router_Route_Regex(
    'admin/links/page/(\d*)',
    array('module'=>'admin', 'controller'=>'links', 'action'=>'index'),
    array(1  =>'page')
    );
$router -> addRoute('AdminLinks', $AdminLinks);

$ViewLinks = new Zend_Controller_Router_Route_Regex(
    'view_links(\d*).html',
    array('module'=>'links', 'controller'=>'index', 'action'=>'viewlinks'),
    array(1  =>'page')
    );
$router -> addRoute('ViewLinks', $ViewLinks);

$ViewLink = new Zend_Controller_Router_Route_Regex(
    'link(\d*).html',
    array('module'=>'links', 'controller'=>'index', 'action'=>'view'),
    array(1  =>'link_id')
    );
$router -> addRoute('ViewLink ', $ViewLink );

//****************** FAQ ***************************************************************
$AdminFaqSections = new Zend_Controller_Router_Route_Regex(
    'admin/faq/sections/page/(\d*)/lang/(\d*)',
    array('module'=>'admin', 'controller'=>'faq', 'action'=>'sections'),
    array(1  =>'page', 2  =>'lang_id')
    );
$router -> addRoute('AdminFaqSections', $AdminFaqSections);

$AdminFaqContent = new Zend_Controller_Router_Route_Regex(
    'admin/faq/content/section/(\d*)/lang/(\d*)/page/(\d*)',
    array('module'=>'admin', 'controller'=>'faq', 'action'=>'sections'),
    array(1 =>'section_id', 2 =>'lang_id', 3 =>'page')
    );
$router -> addRoute('AdminFaqContent', $AdminFaqContent);

//****************** Articles ***************************************************************
$AdminArticlesPages = new Zend_Controller_Router_Route_Regex(
    'admin/articles/page/(\d*)',
    array('module'=>'admin', 'controller'=>'articles', 'action'=>'page'),
    array(1  =>'page')
    );
$router -> addRoute('AdminArticlesPages', $AdminArticlesPages);


$ArticlePages = new Zend_Controller_Router_Route_Regex(
    'articles/page/(\d*)',
    array('module'=>'articles', 'controller'=>'index', 'action'=>'page'),
    array(1  =>'page')
    );
$router -> addRoute('ArticlePages', $ArticlePages);

$ViewArticle = new Zend_Controller_Router_Route_Regex(
    'article(\d*).html',
    array('module'=>'articles', 'controller'=>'index', 'action'=>'view'),
    array(1  =>'article_id')
    );
$router -> addRoute('ViewArticle ', $ViewArticle);

$Articles = new Zend_Controller_Router_Route_Regex(
    'articles.html',
    array('module'=>'articles', 'controller'=>'index', 'action'=>'index')
    );
$router -> addRoute('Articles', $Articles);
    
$ArticleDate = new Zend_Controller_Router_Route_Regex(
    'articles/date/(\d{4}-\d{2}-\d{2})',
    array('module'=>'content', 'controller'=>'articles', 'action'=>'date'),
    array(1  =>'date')
    );
$router -> addRoute('ArticleDate', $ArticleDate);
    
$AdminArticleChangeStatus = new Zend_Controller_Router_Route_Regex(
    'admin/articles/changestatus/(\d*)',
    array('module'=>'admin', 'controller'=>'articles', 'action'=>'changestatus'),
    array(1  =>'article_id')
    );
$router->addRoute('AdminArticleChangeStatus', $AdminArticleChangeStatus);


//****************** Portfolio ***************************************************************
$AdminPortfolioPages = new Zend_Controller_Router_Route_Regex(
    'admin/portfolio/page/(\d*)',
    array('module'=>'admin', 'controller'=>'portfolio', 'action'=>'page'),
    array(1  =>'page')
    );
$router -> addRoute('AdminPortfolioPages', $AdminPortfolioPages);


$PortfolioPages = new Zend_Controller_Router_Route_Regex(
    'portfolio_page(\d*).html',
    array('module'=>'portfolio', 'controller'=>'index', 'action'=>'page'),
    array(1  =>'page')
    );
$router -> addRoute('PortfolioPages', $PortfolioPages);

$PortfolioPages2 = new Zend_Controller_Router_Route_Regex(
    'portfolio-page(\d*)-s(\d*)-c(\d*).html',
    array('module'=>'portfolio', 'controller'=>'index', 'action'=>'index'),
    array(1  =>'page', 2  =>'section', 3  =>'category')
    );
$router -> addRoute('PortfolioPages2', $PortfolioPages2);

$ViewPortfolio = new Zend_Controller_Router_Route_Regex(
    'portfolio(\d*).html',
    array('module'=>'portfolio', 'controller'=>'index', 'action'=>'view'),
    array(1  =>'portfolio_id')
    );
$router -> addRoute('ViewPortfolio ', $ViewPortfolio);
    

  
//$router->addRoute('usersLogin', $usersLogin);
$router->addRoute('usersLogout', $usersLogout);



/** Login router */
$router -> addRoute('changePassword', $changePassword);


$router->addRoute('adminLogout', $adminLogout);

/**content routes*/


/** End of additional routers */



/** Force Zend to throw exceptions */
$controller->throwExceptions(true);


/** Dispatch process */
try { 
    $controller -> returnResponse(true);
    $afterDispatching = $controller->dispatch();
    $afterDispatching -> sendResponse();
} catch (Exception $e) {
    /** If something wrong get message */
//    echo "<pre>";
//    print_r($e);
    //header("location:/error-page.html");
    //echo '<meta http-equiv="Refresh Content="0; URL=/error-page.html">';

    echo $e->getMessage();
} 
?>
<?php /* Smarty version 2.6.18, created on 2014-04-03 13:10:26
         compiled from globalHeader.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'globalHeader.tpl', 231, false),array('modifier', 'strip_tags', 'globalHeader.tpl', 231, false),)), $this); ?>
<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $this->_tpl_vars['meta_title']; ?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="<?php echo $this->_tpl_vars['meta_title']; ?>
" />
    <meta name="description" content="<?php echo $this->_tpl_vars['meta_description']; ?>
" />
    <meta name="keywords" content="<?php echo $this->_tpl_vars['meta_keywords']; ?>
" />



    <!--  = Google Fonts =  -->
    <script type="text/javascript">
        <?php echo '
        WebFontConfig = {
            google : {
                families : [\'Open+Sans:400,700,400italic,700italic:latin,latin-ext,cyrillic\', \'Pacifico::latin\']
            }
        };
//        (function() {
//            var wf = document.createElement(\'script\');
//            wf.src = (\'https:\' == document.location.protocol ? \'https\' : \'http\') + \'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js\';
//            wf.type = \'text/javascript\';
//            wf.async = \'true\';
//            var s = document.getElementsByTagName(\'script\')[0];
//            s.parentNode.insertBefore(wf, s);
//        })();
        '; ?>

    </script>

    <script type="text/javascript" src="/js/webmarket/webfont.js"></script>

    <!-- Twitter Bootstrap -->
    <link href="/css/webmarket/bootstrap.css" rel="stylesheet">
    <link href="/css/webmarket/responsive.css" rel="stylesheet">
    <!-- Slider Revolution -->
    <link rel="stylesheet" href="/js/webmarket/rs-plugin/css/settings.css" type="text/css"/>
    <!-- jQuery UI -->
    <link rel="stylesheet" href="/js/webmarket/jquery-ui-1.10.3/css/smoothness/jquery-ui-1.10.3.custom.min.css" type="text/css"/>
    <!-- PrettyPhoto -->
    <link rel="stylesheet" href="/js/webmarket/prettyphoto/css/prettyPhoto.css" type="text/css"/>
    <!-- main styles -->

    <link rel="stylesheet" href="/css/webmarket/grass-green.css" type="text/css"/>

    <link href="/css/webmarket/main.css" rel="stylesheet">



    <!-- Modernizr -->
    <script src="/js/webmarket/modernizr.custom.56918.js"></script>


    <script type="text/javascript">
        <?php echo '
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=126780447403102";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, \'script\', \'facebook-jssdk\'));
        '; ?>

    </script>


    <!--  = jQuery - CDN with local fallback =  -->
    <script type="text/javascript" src="/js/webmarket/jquery.min.last.js"></script>
    <script type="text/javascript">
        <?php echo '
        if (typeof jQuery == \'undefined\') {
            document.write(\'<script src="/js/webmarket/jquery.min.js"><\\/script>\');
        }
        '; ?>

    </script>

    <!--  = _ =  -->
    <script src="/js/webmarket/underscore/underscore-min.js" type="text/javascript"></script>

    <!--  = Bootstrap =  -->
    <script src="/js/webmarket/bootstrap.min.js" type="text/javascript"></script>

    <!--  = Slider Revolution =  -->
    <script src="/js/webmarket/rs-plugin/js/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
    <script src="/js/webmarket/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>

    <!--  = CarouFredSel =  -->
    <script src="/js/webmarket/jquery.carouFredSel-6.2.1-packed.js" type="text/javascript"></script>

    <!--  = jQuery UI =  -->
    <script src="/js/webmarket/jquery-ui-1.10.3/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <script src="/js/webmarket/jquery-ui-1.10.3/touch-fix.min.js" type="text/javascript"></script>

    <!--  = Isotope =  -->
    <script src="/js/webmarket/isotope/jquery.isotope.min.js" type="text/javascript"></script>

    <!--  = Tour =  -->
    <script src="/js/webmarket/bootstrap-tour/build/js/bootstrap-tour.min.js" type="text/javascript"></script>

    <!--  = PrettyPhoto =  -->
    <script src="/js/webmarket/prettyphoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>

    <!--  = Custom JS =  -->
    <script src="/js/webmarket/custom.js" type="text/javascript"></script>

    <script src="/js/validation.js" type="text/javascript"></script>

    <!-- Start Deals Plugin -->
    <script src="/js/deals.js" type="text/javascript"></script>
    <link href="/css/deals.css" rel="stylesheet">
    <!-- End Deals Plugin -->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/apple-touch/144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/apple-touch/114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/apple-touch/72.png">
    <link rel="apple-touch-icon-precomposed" href="/images/apple-touch/57.png">
    <link rel="shortcut icon" href="/images/favicon.ico">
</head>


<body class="">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "popups.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="dealsCities" id="dealsCitiesBox"></div>

<div class="master-wrapper">

<!--  ==========  -->
<!--  = Header =  -->
<!--  ==========  -->
<header id="header">
    <div class="darker-row">
        <div class="container">
            <div class="row">
                <div class="span4">
                    <?php if (! $this->_tpl_vars['UserLogedIn']): ?>
                        <div class="higher-line">
                            <a href="#loginModal" role="button" data-toggle="modal">Войти</a> или
                            <a href="#registerModal" role="button" data-toggle="modal">Зарегестрироваться</a>
                        </div>
                    <?php else: ?>
                        <div class="higher-line">
                            <a href="/logout.html" role="button" data-toggle="modal">Выйти</a>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($this->_tpl_vars['UserLogedIn']): ?>
                <div class="span8">
                    <div class="topmost-line">
                        <div class="higher-line">
                            <a href="javascript:void(0);" class="gray-link">Минск</a>
                            &nbsp; | &nbsp;
                            <a href="javascript:void(0);" class="gray-link" id="dealsChangeCityLink">Сменить город</a>&nbsp;<i id="dealsChangeCityArrow" class="icon-caret-down"></i>
                            &nbsp; | &nbsp;
                            <a href="/profile.html" class="gray-link">Мой профайл</a>
                                                                                </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="span7">
                <a class="brand" href="/">
                    <img src="/images/logo.png" alt="Soft Scrip Logo" width="48" height="48" />
                    <span class="pacifico">Soft Script</span>
                    <span class="tagline">Только у нас самые лучшие и качественные скрипты</span>
                </a>
            </div>

            <!--  ==========  -->
            <!--  = Social Icons =  -->
            <!--  ==========  -->
                                                                                                                                                                                                                                                                                                                                    <!-- /social icons -->
        </div>
    </div>
</header>

<!--  ==========  -->
<!--  = Main Menu / navbar =  -->
<!--  ==========  -->
<div class="navbar navbar-static-top" id="stickyNavbar">
<div class="navbar-inner">
<div class="container">
<div class="row">
<div class="span9">
<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>

<!--  ==========  -->
<!--  = Menu =  -->
<!--  ==========  -->
<div class="nav-collapse collapse">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "topNavigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


    <!--  ==========  -->
    <!--  = Search form =  -->
    <!--  ==========  -->
    <form class="navbar-form pull-right" action="/search" method="post" name="search_form" id="search_form">
        <button type="submit"><span class="icon-search"></span></button>
        <input type="text" class="span1" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['search_words'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" name="search_input" id="navSearchInput">
    </form>
</div><!-- /.nav-collapse -->
</div>

<!--  ==========  -->
<!--  = Cart =  -->
<!--  ==========  -->
<div class="span3">
    <div class="cart-container" id="cartContainer">
        <div class="cart">
            <p class="items">КОРЗИНА <span class="dark-clr">(<span id="prodCount"><?php echo $this->_tpl_vars['total_count']; ?>
</span>)</span></p>
            <p class="dark-clr hidden-tablet">$<span id="totalPrice"><?php echo $this->_tpl_vars['total_price']; ?>
</span></p>
            <a href="/shopping-cart.html" class="btn btn-danger">
                <i class="icon-shopping-cart"></i>
            </a>
        </div>
        <div class="open-panel" id="products_in_cart">

            <div class="summary">
                <div class="line" style="margin-left: -50px;">
                    Корзина пока пуста...
                </div>
            </div>
            <div class="proceed">
                <a href="/shopping-cart.html" class="btn btn-danger pull-right bold higher">ОФОРМИТЬ ЗАКАЗ <i class="icon-shopping-cart"></i></a>
            </div>
        </div>
    </div>
</div> <!-- /cart -->
</div>
</div>
</div>
</div> <!-- /main menu -->













    
    
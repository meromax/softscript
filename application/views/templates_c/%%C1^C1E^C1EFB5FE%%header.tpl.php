<?php /* Smarty version 2.6.18, created on 2014-02-25 11:45:05
         compiled from admin/header.tpl */ ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title><?php echo $this->_tpl_vars['title']; ?>
</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="/css/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="/css/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/css/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/css/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/css/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <link rel="stylesheet" type="text/css" href="/css/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="/css/assets/plugins/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="/css/assets/plugins/chosen-bootstrap/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="/css/assets/plugins/select2/select2_metro.css" />

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="/css/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
    <link href="/css/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="/css/assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css" />
    <link href="/css/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
    <link href="/css/assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/css/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- END PAGE LEVEL STYLES -->
    <link rel="shortcut icon" href="/images/favicon.ico" />




    <script src="/css/assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="/css/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="/css/assets/plugins/excanvas.min.js"></script>
    <script src="/css/assets/plugins/respond.min.js"></script>
    <![endif]-->
    <script src="/css/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="/css/assets/plugins/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/css/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
    <script type="text/javascript" src="/css/assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="/css/assets/plugins/select2/select2.min.js"></script>

    <script src="/css/assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/bootstrap-daterangepicker/date.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
    <script src="/css/assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/css/assets/scripts/app.js" type="text/javascript"></script>
    <script src="/css/assets/scripts/index.js" type="text/javascript"></script>
    <script src="/css/assets/scripts/ui-general.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->



    <!-- My CSS -->
    <script src="/js/admin.js" type="text/javascript"></script>
    <script type="text/javascript" src="/library/fckeditor/fckeditor.js"></script>
    <script type="text/javascript" src="/js/lightbox.js"></script>
    <script type="text/javascript" src="/js/jquery-lightbox/js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="/js/jquery-lightbox/css/jquery.lightbox-0.5.css" media="screen" />

    <link rel="stylesheet" href="/js/prettyPhoto_3.0b/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
    <script src="/js/prettyPhoto_3.0b/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

    

    <script>
        <?php echo '
        jQuery(document).ready(function() {
            App.init(); // initlayout and core plugins
            Index.init();
            Index.initJQVMAP(); // init index page\'s custom scripts
            Index.initCalendar(); // init index page\'s custom scripts
            Index.initCharts(); // init index page\'s custom scripts
            Index.initChat();
            Index.initMiniCharts();
            Index.initDashboardDaterange();
            Index.initIntro();
        });


        $(function() {
            $(\'#gallery span a\').lightBox({
                overlayBgColor: \'#000000\',
                overlayOpacity: 0.7,
                imageLoading:  \''; ?>
<?php echo $this->_tpl_vars['site_url']; ?>
<?php echo '/js/jquery-lightbox/images/lightbox-ico-loading.gif\',
                imageBtnClose: \''; ?>
<?php echo $this->_tpl_vars['site_url']; ?>
<?php echo '/js/jquery-lightbox/images/lightbox-btn-close.gif?time=11\',
                imageBtnPrev:  \''; ?>
<?php echo $this->_tpl_vars['site_url']; ?>
<?php echo '/js/jquery-lightbox/images/lightbox-btn-prev_RU.gif\',
                imageBtnNext:  \''; ?>
<?php echo $this->_tpl_vars['site_url']; ?>
<?php echo '/js/jquery-lightbox/images/lightbox-btn-next_RU.gif?dsdasd\',
                imageBlank:	   \''; ?>
<?php echo $this->_tpl_vars['site_url']; ?>
<?php echo '/js/jquery-lightbox/images/lightbox-blank.gif\',
                containerResizeSpeed: 350,
                fixedNavigation:true,
                txtImage: \'\',
                txtOf: '; ?>
<?php echo $this->_tpl_vars['adminLangParams']['TITLE_LIGHTBOX_FROM']; ?>
<?php echo '

            });
        });

        $(document).ready(function(){
            $("a[rel^=\'prettyPhoto\']").prettyPhoto();
        });

        '; ?>

    </script>

    <script src="/js/modalBox.js" type="text/javascript"></script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/popups.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/navigation-top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<!-- BEGIN CONTAINER -->
<div class="page-container">


    <!-- BEGIN LEFT MENU -->
    <div class="page-sidebar nav-collapse collapse">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/navigation-left.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <!-- END LEFT MENU -->

    <!-- BEGIN PAGE -->
    <div class="page-content">

        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>Widget Settings</h3>
            </div>
            <div class="modal-body">
                Widget settings form goes here
            </div>
        </div>
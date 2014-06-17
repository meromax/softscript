<?php /* Smarty version 2.6.18, created on 2014-04-03 13:10:26
         compiled from default/index.tpl */ ?>
<!-- Slider -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "topSlider.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- Main container -->
<div class="container">
    <div class="row">
    <div class="span12">
        <div class="push-up over-slider blocks-spacer">

            <!--  ==========  -->
            <!--  = Three Banners =  -->
            <!--  ==========  -->
            <div class="row">
                <div class="span4">
                    <a href="javascript:void(0);" class="btn btn-block banner">
                        <span class="title"><span class="light">ПОСЛЕДНИЕ</span> ПРОДАЖИ</span>
                        <em>более <span style="font-size: 22px;">10</span> продаж в день</em>
                    </a>
                </div>
                <div class="span4">
                    <a href="javascript:void(0);" class="btn btn-block colored banner">
                        <span class="title"><span class="light">НАКОПИТЕЛЬНАЯ</span> СКИДКА</span>
                        <em>скидки до <span style="font-size: 22px;">20%</span></em>
                    </a>
                </div>
                <div class="span4">
                    <a href="javascript:void(0);" class="btn btn-block banner">
                        <span class="title"><span class="light">НОВЫЕ</span> ТОВАРЫ</span>
                        <em>более <span style="font-size: 22px;">10</span> новых товаров каждый день</em>
                    </a>
                </div>
            </div> <!-- /three banners -->
        </div>
    </div>
</div>

    <!-- Featured Products -->
    </div>

<!-- New Products -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "products/new_products.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- Popular products -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "products/popular_products.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- Latest news -->

<!-- Partners list -->

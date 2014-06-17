<?php /* Smarty version 2.6.18, created on 2014-03-26 17:40:40
         compiled from catalog/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'catalog/index.tpl', 49, false),array('modifier', 'stripslashes', 'catalog/index.tpl', 49, false),)), $this); ?>
<!--  ==========  -->
<!--  = Breadcrumbs =  -->
<!--  ==========  -->
<div class="darker-stripe">
    <div class="container">
        <div class="row">
            <div class="span12">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li><span class="icon-chevron-right"></span></li>
                    <li>
                        <a href="/catalog.html">Каталог</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
<div class="push-up blocks-spacer">
<div class="row">

<!--  ==========  -->
<!--  = Sidebar =  -->
<!--  ==========  -->
<aside class="span3 left-sidebar" id="tourStep1">
    <div class="sidebar-item sidebar-filters" id="sidebarFilters">

        <!--  ==========  -->
        <!--  = Sidebar Title =  -->
        <!--  ==========  -->
        <div class="underlined">
            <h3><span class="light">Товары</span> по фильтру</h3>
        </div>

        <!--  ==========  -->
        <!--  = Categories =  -->
        <!--  ==========  -->
        <div class="accordion-group" id="tourStep2">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" href="#filterOne">Категории <b class="caret"></b></a>
            </div>
            <div id="filterOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sec']):
?>
                        <a href="#" data-target=".filter--sec<?php echo $this->_tpl_vars['sec']['id']; ?>
" class="selectable"><i class="box"></i> <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sec']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                    <?php endforeach; endif; unset($_from); ?>
                </div>
            </div>
        </div> <!-- /categories -->

        <!-- Prices slider -->
        <script type="text/javascript">
            <?php echo '
            var WebMarketVars = {
                '; ?>

                currencyBefore: true,
                currencySymbol: "$",
                priceRange: [<?php echo $this->_tpl_vars['min_price']; ?>
, <?php echo $this->_tpl_vars['max_price']; ?>
],
                priceStep: 10
                <?php echo '
            };
            '; ?>

        </script>


        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" href="#filterPrices">Цена <b class="caret"></b></a>
            </div>
            <div id="filterPrices" class="accordion-body in collapse">
                <div class="accordion-inner with-slider">
                    <div class="jqueryui-slider-container">
                        <div id="pricesRange"></div>
                    </div>
                    <input type="text" data-initial="432" class="max-val pull-right" disabled />
                    <input type="text" data-initial="99" class="min-val" disabled />
                </div>
            </div>
        </div> <!-- /prices slider -->



        <a href="#" class="remove-filter" id="removeFilters"><span class="icon-ban-circle"></span> Сбросить фильтры</a>

    </div>
</aside> <!-- /sidebar -->

<!--  ==========  -->
<!--  = Main content =  -->
<!--  ==========  -->
<section class="span9">

<!--  ==========  -->
<!--  = Title =  -->
<!--  ==========  -->
<div class="underlined push-down-20">
    <div class="row">
        <div class="span4">
            <h3><span class="light">Все</span> Продукты</h3>
        </div>
        <div class="span5 align-right">
            <div class="form-inline sorting-by" id="tourStep4">
                <label for="isotopeSorting" class="black-clr">Сортировать:</label>
                <?php echo '
                    <select id="isotopeSorting" class="span3">
                        <option value=\'{"sortBy":"price", "sortAscending":"true"}\'>По цене (от меньшей к большей) &uarr;</option>
                        <option value=\'{"sortBy":"price", "sortAscending":"false"}\'>По цене (от большей к меньшей) &darr;</option>
                        <option value=\'{"sortBy":"name", "sortAscending":"true"}\'>По названию (от А до Я или от A до Z) &uarr;</option>
                        <option value=\'{"sortBy":"name", "sortAscending":"false"}\'>По названию (от Я до А или от Z до A) &darr;</option>
                        <option value=\'{"sortBy":"popularity", "sortAscending":"true"}\'>По популярности (от меньшей к большей) &uarr;</option>
                        <option value=\'{"sortBy":"popularity", "sortAscending":"false"}\'>По популярности (от большей к меньшей) &darr;</option>
                    </select>
                '; ?>

            </div>
                                                                </div>
    </div>
</div> <!-- /title -->

<!--  ==========  -->
<!--  = Products =  -->
<!--  ==========  -->
<div class="row">
<div id="isotopeContainer" class="isotope-container">




<?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['prod']):
?>

    <div class="span9 isotope--target filter--sec<?php echo $this->_tpl_vars['prod']['section_id']; ?>
" data-price="<?php echo $this->_tpl_vars['prod']['price']; ?>
" data-popularity="<?php echo $this->_tpl_vars['prod']['id']; ?>
">

            <div class="product3 shadow">
                <div class="row">
                    <div class="span3">
                        <div class="product-img">
                            <div class="picture">
                                <img width="270" height="189" alt="" src="/images/products/<?php echo $this->_tpl_vars['prod']['image']; ?>
_middle.jpg" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="main-titles no-margin">
                            <h5 class="isotope--title"><a href="/product/<?php echo $this->_tpl_vars['prod']['link']; ?>
" id="prodTitle<?php echo $this->_tpl_vars['prod']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></h5>
                            <div class="meta-data">
                                <span class="price">$<?php echo $this->_tpl_vars['prod']['price']; ?>
</span>
                                                                                                                                                                                                                                                                                            </div>
                        </div>
                        <div class="desc">
                            <?php echo $this->_tpl_vars['prod']['description_short']; ?>

                        </div>
                        <div class="prodButtons">
                            <input type="hidden" name="prodCount<?php echo $this->_tpl_vars['prod']['id']; ?>
" id="prodCount<?php echo $this->_tpl_vars['prod']['id']; ?>
" value="1" />
                            <a class="btn more btn-primary" href="/product/<?php echo $this->_tpl_vars['prod']['link']; ?>
">Обзор</a>
                            <a class="btn buy btn-danger" href="javascript:void(0);" onclick="addToCart('<?php echo $this->_tpl_vars['prod']['id']; ?>
')">Добавить в корзину</a>
                        </div>
                    </div>
                </div>
            </div>

    </div>

<?php endforeach; endif; unset($_from); ?>

</div>
</div>
<hr />
</section> <!-- /main content -->
</div>
</div>
</div>
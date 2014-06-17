<?php /* Smarty version 2.6.18, created on 2014-01-27 12:18:42
         compiled from articles/show_items.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'articles/show_items.tpl', 49, false),array('modifier', 'stripslashes', 'articles/show_items.tpl', 49, false),)), $this); ?>
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
                        <a href="/articles/page/1">Статьи</a>
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
                        <h3>Статьи <span class="light">по категориям</span></h3>
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
                </div>
            </aside> <!-- /sidebar -->


            <!-- Main content =  -->
            <section class="span9">

                <!--  ==========  -->
                <!--  = Title =  -->
                <!--  ==========  -->
                <div class="underlined push-down-20">
                    <div class="row">
                        <div class="span9">
                            <h3><span class="light">Все</span> статьи</h3>
                        </div>
                    </div>
                </div> <!-- /title -->

                <!-- Articles -->
                <div class="row" style="min-height: 450px;">
                    <div id="isotopeContainer" class="isotope-container">




                        <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['prod']):
?>

                            <div class="span9 isotope--target filter--sec<?php echo $this->_tpl_vars['prod']['section_id']; ?>
" data-price="<?php echo $this->_tpl_vars['prod']['price']; ?>
" data-popularity="<?php echo $this->_tpl_vars['prod']['id']; ?>
">
                                <div class="product">
                                    <div class="row">
                                        <div class="span3">
                                            <div class="product-img">
                                                <div class="picture">
                                                    <img width="270" height="189" alt="" src="/images/products/<?php echo $this->_tpl_vars['prod']['image']; ?>
_middle.jpg" />
                                                    <div class="img-overlay">
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
                                        <div class="span6">
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
                                            <p class="desc">
                                                <?php echo $this->_tpl_vars['prod']['description']; ?>

                                            </p>
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



                                                                                                                                                                                                                                                                                                                                                                                                                    
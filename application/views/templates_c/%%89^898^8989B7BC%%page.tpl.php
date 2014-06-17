<?php /* Smarty version 2.6.18, created on 2014-02-06 19:27:25
         compiled from articles/page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'articles/page.tpl', 36, false),array('modifier', 'stripslashes', 'articles/page.tpl', 36, false),)), $this); ?>
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

            <!-- Sidebar -->
            <aside class="span3 left-sidebar" id="tourStep1">
                <div class="sidebar-item sidebar-filters" id="sidebarFilters">

                    <!-- Sidebar Title -->
                    <div class="underlined">
                        <h3><span class="light">Разделы</span> статей</h3>
                    </div>

                    <!-- Categories -->
                    <div class="accordion-group1">
                        <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sec']):
?>
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" href="#filter<?php echo $this->_tpl_vars['sec']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sec']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                                <?php if ($this->_tpl_vars['sec']['categories']): ?><b class="caret"></b><?php endif; ?>
                            </a>
                        </div>
                        <div id="filter<?php echo $this->_tpl_vars['sec']['id']; ?>
" class="accordion-body collapse in">
                            <div class="accordion-inner">
                                <?php $_from = $this->_tpl_vars['sec']['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
                                    <a href="javascript:void(0);" class="selectable" onclick="document.location.href='/articles/section/<?php echo $this->_tpl_vars['cat']['link']; ?>
/page/1'"><i class="box"></i> <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['cat']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                                <?php endforeach; endif; unset($_from); ?>
                            </div>
                        </div>
                        <?php endforeach; endif; unset($_from); ?>
                    </div> <!-- /categories -->

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
                            <h3><span class="light">Все</span> статьи</h3>
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
<?php /* Smarty version 2.6.18, created on 2014-02-07 18:21:04
         compiled from products/product.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'products/product.tpl', 19, false),array('modifier', 'strip_tags', 'products/product.tpl', 19, false),)), $this); ?>
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

                    <li><span class="icon-chevron-right"></span></li>
                    <li>
                        <a href="/product/<?php echo $this->_tpl_vars['product']['link']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['product']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>

<!--  ==========  -->
<!--  = Main container =  -->
<!--  ==========  -->
<div class="container">
    <div class="push-up top-equal blocks-spacer">

        <!--  ==========  -->
        <!--  = Product =  -->
        <!--  ==========  -->
        <div class="row blocks-spacer">

            <!--  ==========  -->
            <!--  = Preview Images =  -->
            <!--  ==========  -->
            <div class="span5">
                <div class="product-preview">
                    <div class="picture">
                        <img src="/images/products/<?php echo $this->_tpl_vars['product']['image']; ?>
_big.jpg" alt="" width="540" height="378" id="mainPreviewImg" />
                    </div>
                    <?php if ($this->_tpl_vars['product']['images'] && $this->_tpl_vars['images_count'] > 1): ?>
                    <div class="thumbs clearfix">
                        <?php $_from = $this->_tpl_vars['product']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['piKey'] => $this->_tpl_vars['pImage']):
?>
                        <div class="thumb <?php if ($this->_tpl_vars['piKey'] == 0): ?>active<?php endif; ?>">
                            <a href="#mainPreviewImg"><img src="/images/products/<?php echo $this->_tpl_vars['pImage']['image']; ?>
_big.jpg" alt="" width="540" height="378" /></a>
                        </div>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!--  = Title and short desc =  -->
            <div class="span7">
                <div class="product-title">
                    <h1 class="name"><span class="light" id="prodTitle<?php echo $this->_tpl_vars['product']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['product']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</span></h1>
                    <div class="meta">
                        <span class="tag">$ <?php echo $this->_tpl_vars['product']['price']; ?>
</span>
                                                                                                                                                        </div>
                </div>
                <div class="product-description">
                    <p>
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['product']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                    </p>
                    <hr />

                    <!--  Add to cart -->
                    <div class="form form-inline clearfix">
                    <span class="tag" style="font-size: 18px;">Количество:</span>
                    <div class="numbered" style="padding-left: 10px;">
                        <input type="text" name="num" value="1" id="prodCount<?php echo $this->_tpl_vars['product']['id']; ?>
" maxlength="2" readonly="readonly" class="tiny-size" />
                        <span class="clickable add-one icon-plus-sign-alt"></span>
                        <span class="clickable remove-one icon-minus-sign-alt"></span>
                    </div>
                    <button class="btn btn-danger pull-right" type="button" onclick="addToCart('<?php echo $this->_tpl_vars['product']['id']; ?>
')"><i class="icon-shopping-cart"></i> &nbsp; Добавить в корзину</button>
                    </div>

                    <hr />

                    <!-- Share buttons -->
                    <div class="share-item push-down-20">
                        <div class="row-fluid">
                            <div class="span6" style="padding-top: 3px;">
                                Рассказать друзьям в социальных сетях:
                            </div>
                            <div class="span6">
                                <div class="social-networks" style="float: right;">
                                                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "social.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- More Buttons -->
                                                                                                                
                </div>
            </div>
        </div>

        <!--  ==========  -->
        <!--  = Tabs with more info =  -->
        <!--  ==========  -->
        <div class="row">
            <div class="span12">
                <ul id="myTab" class="nav nav-tabs">
                    <?php if ($this->_tpl_vars['product']['addinfo2']): ?>
                    <li class="active">
                        <a href="#tab-1" data-toggle="tab">ОПИСАНИЕ</a>
                    </li>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['product']['video']): ?>
                    <li <?php if (! $this->_tpl_vars['product']['addinfo2']): ?>class="active"<?php endif; ?>>
                        <a href="#tab-2" data-toggle="tab">ДОПОЛНИТЕЛЬНО</a>
                    </li>
                    <?php endif; ?>
                    <li <?php if (! $this->_tpl_vars['product']['addinfo2'] && ! $this->_tpl_vars['product']['video']): ?>class="active"<?php endif; ?>>
                        <a href="#tab-3" data-toggle="tab">ОТЗЫВЫ</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <?php if ($this->_tpl_vars['product']['addinfo2']): ?>
                    <div class="fade in tab-pane active" id="tab-1">
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['product']['addinfo2'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                    </div>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['product']['video']): ?>
                    <div class="fade tab-pane <?php if (! $this->_tpl_vars['product']['addinfo2']): ?>in active<?php endif; ?>" id="tab-2">
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['product']['video'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                    </div>
                    <?php endif; ?>
                    <div class="fade tab-pane <?php if (! $this->_tpl_vars['product']['addinfo2'] && ! $this->_tpl_vars['product']['video']): ?>in active<?php endif; ?>" id="tab-3">
                        <?php if ($this->_tpl_vars['UserLogedIn']): ?>
                        <div class="span5">
                            <section class="contact-form-container">

                                <div class="underlined">
                                    <h3 class="light"><b>Оставить</b> <span class="light">отзыв</span></h3>
                                </div>

                                <br />
                                <form method="post" name="reviewForm" id="reviewForm" class="form form-inline form-contact">

                                    <p class="push-down-20">
                                        <textarea class="input-block-level" tabindex="4" rows="7" cols="70" name="review" id="reviewid" placeholder="Напишите ваше сообщение здесь ..."></textarea>
                                    </p>

                                    <div id="reviewMessage" class="alert alert-danger in fade hidden">
                                        &nbsp;
                                    </div>
                                    <p>
                                        <input type="hidden" name="product_id" value="<?php echo $this->_tpl_vars['product']['id']; ?>
" />
                                        <button class="btn btn-primary bold" type="button" tabindex="5" onclick="addReview();">Отправить сообщение</button>
                                    </p>
                                </form>
                            </section>
                        </div>
                        <?php endif; ?>
                        <div class="span6">
                            <?php if ($this->_tpl_vars['productsReviews']): ?>
                            <section class="contact-form-container">

                                <div class="underlined">
                                    <h3 class="light"><b>Отзывы</b></h3>
                                </div>

                                <br />

                                <?php $_from = $this->_tpl_vars['productsReviews']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ritem']):
?>
                                <div class="accordion-group accordion-style-2 active" style="margin-top: 0px;">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="javascript:void(0);">
                                            <span class="bg-for-icon"><i class="icon-user"></i></span>
                                            <?php echo $this->_tpl_vars['ritem']['username']; ?>

                                        </a>
                                    </div>
                                    <div id="collapseOne" class="accordion-body in collapse" style="height: auto;">
                                        <div class="accordion-inner">
                                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['ritem']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; endif; unset($_from); ?>
                            </section>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /container -->

<!--  ==========  -->
<!--  = Related Products =  -->
<!--  ==========  -->
<div class="boxed-area no-bottom">
    <div class="container">

        <!--  ==========  -->
        <!--  = Title =  -->
        <!--  ==========  -->
        <div class="row">
            <div class="span12">
                <div class="main-titles lined">
                    <h2 class="title"><span class="light">Похожие</span> Товары</h2>
                </div>
            </div>
        </div>


        <!-- Related products -->
        <div class="row popup-products">

            <?php $_from = $this->_tpl_vars['relatedProducts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rpKey'] => $this->_tpl_vars['rProduct']):
?>
                <?php if ($this->_tpl_vars['rpKey'] > 0 && $this->_tpl_vars['rpKey']%4 == 0): ?>
                    <div style="clear: both;" class="underlined span12 push-down-30"></div>
                <?php endif; ?>
                <!-- Product -->
                <div class="span3">
                    <div class="product">
                        <div class="product-inner">
                            <div class="product-img">
                                <div class="picture">
                                    <img src="/images/products/<?php echo $this->_tpl_vars['rProduct']['image']; ?>
_middle.jpg" alt="" width="270" height="189" />
                                    <div class="img-overlay">
                                        <a href="/product/<?php echo $this->_tpl_vars['rProduct']['link']; ?>
" class="btn more btn-primary">Обзор</a>
                                        <a href="#" class="btn buy btn-danger">Добавить в корзину</a>
                                    </div>
                                </div>
                            </div>
                            <div class="main-titles no-margin">
                                <h4 class="title"><span class="striked">$<?php echo $this->_tpl_vars['rProduct']['old_price']; ?>
</span> <span class="red-clr">$<?php echo $this->_tpl_vars['rProduct']['price']; ?>
</span></h4>
                                <h5 class="no-margin"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['rProduct']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</h5>
                            </div>
                            <p class="desc">
                                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['rProduct']['description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                            </p>
                                                                                                                                                                                                                                                </div>
                    </div>
                </div>
                <!-- /Product -->



            <?php endforeach; endif; unset($_from); ?>




        </div>
    </div>
</div>
<?php /* Smarty version 2.6.18, created on 2014-04-03 13:10:26
         compiled from products/popular_products.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'products/popular_products.tpl', 35, false),array('modifier', 'strip_tags', 'products/popular_products.tpl', 35, false),)), $this); ?>
<div class="most-popular blocks-spacer">
    <div class="container">

        <div class="row">
            <div class="span12">
                <div class="main-titles lined">
                    <h2 class="title"><span class="light">Популярные</span> товары</h2>
                </div>
            </div>
        </div>

        <div class="row popup-products blocks-spacer" style="margin-bottom: 45px;">
            <?php $_from = $this->_tpl_vars['popularProducts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pKey'] => $this->_tpl_vars['popularProd']):
?>

            <?php if ($this->_tpl_vars['pKey'] > 0 && $this->_tpl_vars['pKey']%4 == 0): ?>
                </div>
                <div class="row popup-products blocks-spacer">
            <?php endif; ?>

            <!-- Product -->
            <div class="span3">
                <div class="product2">
                    <div class="product-inner">
                        <div class="product-img">
                            <div class="picture">
                                <img src="/images/products/<?php echo $this->_tpl_vars['popularProd']['image']; ?>
_middle.jpg" alt="" width="270" height="189" />
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <div class="price">
                                <h4 class="title">$<?php echo $this->_tpl_vars['popularProd']['price']; ?>
</h4>
                            </div>

                            <div class="titleHeader">
                                <h5 class="no-margin"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['popularProd']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</h5>
                            </div>
                        </div>
                                                                                                <div class="buttons">
                            <a href="/product/<?php echo $this->_tpl_vars['popularProd']['link']; ?>
" class="btn more btn-primary">Обзор</a>
                            <a class="btn buy btn-danger" href="javascript:void(0);" onclick="addToCart('<?php echo $this->_tpl_vars['popularProd']['id']; ?>
')">Добавить в корзину</a>
                        </div>
                        <input type="hidden" name="prodCount<?php echo $this->_tpl_vars['popularProd']['id']; ?>
" id="prodCount<?php echo $this->_tpl_vars['popularProd']['id']; ?>
" value="1" />
                                                                                                                                                                                                                                                                                                                                            </div>
                </div>
            </div>
            <!-- /Product -->

            <?php endforeach; endif; unset($_from); ?>
        </div>

    </div>
</div>
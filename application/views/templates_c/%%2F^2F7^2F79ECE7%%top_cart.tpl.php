<?php /* Smarty version 2.6.18, created on 2014-04-03 13:10:29
         compiled from orders/top_cart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'orders/top_cart.tpl', 8, false),array('modifier', 'strip_tags', 'orders/top_cart.tpl', 8, false),)), $this); ?>
<?php if ($this->_tpl_vars['cart']): ?>
    <?php $_from = $this->_tpl_vars['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pkey'] => $this->_tpl_vars['prod']):
?>
    <div class="item-in-cart clearfix">
        <div class="image">
            <img src="/images/products/<?php echo $this->_tpl_vars['prod']['image']; ?>
_square.jpg" width="124" height="124" alt="cart item" />
        </div>
        <div class="desc">
            <strong><a href="/product/<?php echo $this->_tpl_vars['prod']['link']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></strong>
            <span class="light-clr qty">
                Количество: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['count'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                &nbsp;
                <a href="#" class="icon-remove-sign" title="Remove Item"></a>
            </span>
        </div>
        <div class="price">
            <strong>$<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['total_price'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</strong>
        </div>
    </div>
    <?php endforeach; endif; unset($_from); ?>

    <div class="summary">
        <div class="line">
            <div class="row-fluid">
                <div class="span6">ИТОГО:</div>
                <div class="span6 align-right size-16">$<?php echo $this->_tpl_vars['total_price_s']+$this->_tpl_vars['dostavka']; ?>
</div>
            </div>
        </div>
    </div>
    <div class="proceed">
        <a href="/shopping-cart.html" class="btn btn-danger pull-right bold higher">ОФОРМИТЬ ЗАКАЗ <i class="icon-shopping-cart"></i></a>
            </div>
<?php else: ?>
    <div class="summary">
        <div class="line" style="margin-left: -50px;">
            Корзина пока пуста...
        </div>
    </div>
    <div class="proceed">
        <a href="/shopping-cart.html" class="btn btn-danger pull-right bold higher">ОФОРМИТЬ ЗАКАЗ <i class="icon-shopping-cart"></i></a>
    </div>
<?php endif; ?>
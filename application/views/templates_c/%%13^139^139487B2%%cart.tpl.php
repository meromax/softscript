<?php /* Smarty version 2.6.18, created on 2014-02-18 14:21:51
         compiled from orders/cart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'orders/cart.tpl', 84, false),array('modifier', 'strip_tags', 'orders/cart.tpl', 84, false),)), $this); ?>
<!-- Shopping Cart -->
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
                        <a href="/shopping-cart.html">Процесс покупки</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="push-up top-equal blocks-spacer-last">
        <div class="row">

            <!-- Main Title -->
            <div class="span12">
                <div class="title-area">
                    <h1 class="inline"><span class="light">Процесс покупки</span></h1>
                </div>
            </div>

            <div class="span12">
                <div class="center-align">
                    <h1><span class="light">Корзина покупок</span></h1>
                </div>
            </div>

            <?php if ($this->_tpl_vars['cart']): ?>
            <form action="/orders/index/check-cart" method="post" name="order_form" id="order_form">
            <div class="row" style="min-height: 400px;">
                <div class="span10 offset1">

                    <!-- Steps -->
                    <div class="checkout-steps">
                        <div class="clearfix">
                            <div class="step active">
                                <div class="step-badge">1</div>
                                Корзина покупок
                            </div>
                            <div class="step">
                                <div class="step-badge">2</div>
                                Контактная информация
                            </div>
                            <div class="step">
                                <div class="step-badge">3</div>
                                Способы оплаты
                            </div>
                            <div class="step">
                                <div class="step-badge">4</div>
                                Подтвердите и оплатите
                            </div>
                        </div>
                    </div> <!-- /steps -->

                    <!-- Selected Items -->
                    <table class="table table-items">
                        <thead>
                        <tr>
                            <th colspan="2">Наименование товара</th>
                            <th><div class="align-center">Количество</div></th>
                            <th><div class="align-right">Цена</div></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $_from = $this->_tpl_vars['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pkey'] => $this->_tpl_vars['prod']):
?>
                        <tr>
                            <td class="image">
                                <a href="/product/<?php echo $this->_tpl_vars['prod']['link']; ?>
">
                                    <img src="/images/products/<?php echo $this->_tpl_vars['prod']['image']; ?>
_square.jpg" alt="" width="124" height="124" />
                                </a>
                            </td>
                            <td class="desc" style="padding-left: 10px;">
                                <a href="/product/<?php echo $this->_tpl_vars['prod']['link']; ?>
" style="color:#727272; ">
                                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                                </a>
                                &nbsp; <a title="Убрать товар из корзины" class="icon-remove-sign" href="javascript:void(0);" onclick="document.location.href='/orders/del-from-cart/<?php echo $this->_tpl_vars['prod']['id']; ?>
'"></a>
                            </td>
                            <td class="qty">
                                <input type="text" class="tiny-size" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['count'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" name="pcount<?php echo $this->_tpl_vars['prod']['id']; ?>
" name="pcount<?php echo $this->_tpl_vars['prod']['id']; ?>
" maxlength="2" />
                            </td>
                            <td class="price">
                                $<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['total_price'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                            </td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?>

                        <tr>
                            <td colspan="2" rowspan="2">
                                                                                                                                                                    </td>
                            <td class="stronger" style="padding-top: 30px;">СКИДКА:</td>
                            <td class="stronger" style="padding-top: 30px;"5><div class="size-16 align-right"><?php echo $this->_tpl_vars['skidka']; ?>
%</div></td>
                        </tr>
                        <tr>
                            <td class="stronger" style="border-bottom:0px;">К ОПЛАТЕ:</td>
                            <td class="stronger" style="border-bottom:0px;"><div class="size-16 align-right">$<?php echo $this->_tpl_vars['total_price_s']+$this->_tpl_vars['dostavka']; ?>
</div></td>
                        </tr>
                        </tbody>
                    </table>



                    <hr />

                    <p class="right-align">
                        <input type="hidden" name="status" id="status" value="0" />
                        <a href="javascript:void(0);" id="button_refresh" class="btn btn-primary higher bold">ПЕРЕСЧИТАТЬ</a>
                        <a href="javascript:void(0);" id="button_order" class="btn btn-primary higher bold">ПРОДОЛЖИТЬ</a>
                    </p>
                </div>
            </div>
            </form>
            <?php else: ?>
                <div class="row" style="min-height: 400px;">
                    <div class="span10 offset1" style="text-align: center;">
                        Ваша корзина пуста ...
                    </div>
                </div>

            <?php endif; ?>


        </div>
    </div>
</div>
<?php /* Smarty version 2.6.18, created on 2014-01-29 18:45:46
         compiled from orders/confirm_pay.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'orders/confirm_pay.tpl', 93, false),array('modifier', 'strip_tags', 'orders/confirm_pay.tpl', 93, false),)), $this); ?>
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
                    <h1><span class="light">Подтвердите и оплатите</span></h1>
                </div>
            </div>

            <?php if ($this->_tpl_vars['cart']): ?>
            <div class="row" style="min-height: 400px;">
                <div class="span10 offset1">

                    <!-- Steps -->
                    <div class="checkout-steps">
                        <div class="clearfix">
                            <div class="step done">
                                <div class="step-badge"><i class="icon-ok"></i></div>
                                <a href="/shopping-cart.html">
                                    Корзина покупок
                                </a>
                            </div>

                            <div class="step done">
                                <div class="step-badge"><i class="icon-ok"></i></div>
                                <a href="/order-form.html">
                                    Контактная информация
                                </a>
                            </div>

                            <div class="step done">
                                <div class="step-badge"><i class="icon-ok"></i></div>
                                <a href="/payment-methods.html">
                                    Способы оплаты
                                </a>
                            </div>

                            <div class="step active">
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
" style="color:#727272; " target="_blank">
                                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                                </a>
                            </td>
                            <td class="qty">
                                <b><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['count'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</b>
                            </td>
                            <td class="price">
                                $<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['total_price'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                            </td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?>

                        <tr>
                            <td colspan="2" rowspan="2">
                                &nbsp;
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


                    <h5><span class="light">ВЫБРАННЫЙ СПОСОБ ОПЛАТЫ</span></h5>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th style="width: 180px;">Логотип</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if ($this->_tpl_vars['payment_method'] == 'robokassa'): ?>
                            <tr>
                                <td style="text-align: left; vertical-align: middle;"><h2><span class="light"><span class="btn btn-danger circle pull-left" style="font-size: 25px; font-style: italic; font-weight: bold;">R</span>obo</span>Kassa</h2></td>
                                <td><img src="/images/<?php echo $this->_tpl_vars['payment_method']; ?>
.png" alt="<?php echo $this->_tpl_vars['payment_method']; ?>
" width="180" height="80" /></td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td style="text-align: left; vertical-align: middle;"><h2><span class="light"><span class="btn btn-danger circle pull-left"><i class="zocial-paypal"></i></span>ay</span>Pal</h2></td>
                                <td style="width: 180px;"><img src="/images/paypal.png" alt="PayPal" width="180" height="80" /></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>

                    <?php echo $this->_tpl_vars['payForm']; ?>

                    <p class="right-align">
                        <a href="javascript:void(0);" id="pay_button" class="btn btn-primary higher bold">ПОДТВЕРДИТЬ И ОПЛАТИТЬ</a>
                    </p>
                </div>
            </div>
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

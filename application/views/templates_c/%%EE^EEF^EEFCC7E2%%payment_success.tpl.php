<?php /* Smarty version 2.6.18, created on 2014-01-29 18:45:54
         compiled from orders/payment_success.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'orders/payment_success.tpl', 33, false),array('modifier', 'strip_tags', 'orders/payment_success.tpl', 33, false),)), $this); ?>
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
                    <h1><span class="light"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</span></h1>
                </div>
            </div>

            <div class="row" style="min-height: 400px;">
                <div class="span10 offset1">

                    <!-- Steps -->
                    <div class="checkout-steps">
                        <div class="clearfix">
                            <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['text'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                        </div>
                    </div> <!-- /steps -->

                    <p class="right-align">
                        <a href="/" class="btn btn-primary higher bold">НА ГЛАВНУЮ</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

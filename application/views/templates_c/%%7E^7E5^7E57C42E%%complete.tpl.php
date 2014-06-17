<?php /* Smarty version 2.6.18, created on 2013-12-11 23:42:25
         compiled from orders/complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'orders/complete.tpl', 5, false),)), $this); ?>
<div class="staticPageBox">
    <div class="pageTitle">Оформление заказа</div>
    <div class="pageText">
                <?php echo ((is_array($_tmp=$this->_tpl_vars['content']['text'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

    </div>
</div>
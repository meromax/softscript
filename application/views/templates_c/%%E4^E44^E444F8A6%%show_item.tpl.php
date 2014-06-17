<?php /* Smarty version 2.6.18, created on 2014-02-06 21:23:10
         compiled from articles/show_item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'articles/show_item.tpl', 2, false),)), $this); ?>
<div class="topTextBlock">
    <div class="pageTitle"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</div>
    <div class="pageText">
        <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

    </div>
</div>
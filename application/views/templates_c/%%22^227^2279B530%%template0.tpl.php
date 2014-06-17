<?php /* Smarty version 2.6.18, created on 2012-11-26 04:55:58
         compiled from sections/template0.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'sections/template0.tpl', 2, false),array('modifier', 'strip_tags', 'sections/template0.tpl', 2, false),)), $this); ?>
<div class="topTextBlock">
    <div class="pageTitle"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</div>
    <div class="pageText">
    <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['text'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

    </div>
</div>



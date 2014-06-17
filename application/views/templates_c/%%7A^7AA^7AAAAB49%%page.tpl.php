<?php /* Smarty version 2.6.18, created on 2014-01-13 20:08:15
         compiled from content/page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'content/page.tpl', 2, false),array('modifier', 'strip_tags', 'content/page.tpl', 2, false),)), $this); ?>
<div class="staticPageBox">
    <div class="pageTitle"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['content']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</div>
    <div class="pageText">
        <?php echo ((is_array($_tmp=$this->_tpl_vars['content']['text'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

    </div>
</div>
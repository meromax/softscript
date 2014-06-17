<?php /* Smarty version 2.6.18, created on 2011-09-28 13:08:38
         compiled from order/complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'order/complete.tpl', 1, false),array('modifier', 'strip_tags', 'order/complete.tpl', 1, false),)), $this); ?>
<div class="header_txt3"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['order_completed_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</div>
<div class="content_container">
<div class="content_block">
	<div class="content_title" style="text-decoration:none;">
	<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['order_completed_text'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

		
	</div>
</div>
</div>
<?php /* Smarty version 2.6.18, created on 2014-01-29 16:38:21
         compiled from admin/sections/sections/section_view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/sections/sections/section_view.tpl', 4, false),array('modifier', 'strip_tags', 'admin/sections/sections/section_view.tpl', 10, false),)), $this); ?>
<table width="100%"  style="border:0px;">
<tr>
	<td align="center" style="border:0px;">
		<span style="font-size:14px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['section']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</span>
	</td>
</tr>
<tr>
	<td style="border:0px;">
		<div style="overflow:auto; height:270px;">
			<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['section']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

		</div>
	</td>
</tr>
</table>
<?php /* Smarty version 2.6.18, created on 2014-01-15 16:23:01
         compiled from admin/options/options/view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/options/options/view.tpl', 4, false),array('modifier', 'strip_tags', 'admin/options/options/view.tpl', 10, false),)), $this); ?>
<table width="100%"  style="border:0px;">
<tr>
	<td align="center" style="border:0px;">
		<span style="font-size:14px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['option']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</span>
	</td>
</tr>
<tr>
	<td style="border:0px;">
		<div style="overflow:auto; height:270px;">
			<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['option']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

		</div>
	</td>
</tr>
</table>
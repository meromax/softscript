<?php /* Smarty version 2.6.18, created on 2014-01-30 17:46:09
         compiled from admin/products/reviews/product_view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/products/reviews/product_view.tpl', 5, false),array('modifier', 'strip_tags', 'admin/products/reviews/product_view.tpl', 13, false),)), $this); ?>
<table width="100%"  style="border:0px;">
<tr>
	<td align="center" style="border:0px; padding-bottom: 10px;">
		<span style="font-size:14px;">
            <a href="/admin/products/modify/id/<?php echo $this->_tpl_vars['product']['id']; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
		</span>
	</td>
</tr>
<tr>
	<td style="border:0px;">
		<div style="overflow:auto; height:400px;">
            <img src="/images/products/<?php echo $this->_tpl_vars['product']['image']; ?>
_small.jpg" align="left" />
			<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['product']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

		</div>
	</td>
</tr>
</table>
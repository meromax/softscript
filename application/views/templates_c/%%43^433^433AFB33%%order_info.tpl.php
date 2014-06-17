<?php /* Smarty version 2.6.18, created on 2014-01-17 16:04:57
         compiled from order/order_info.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'order/order_info.tpl', 4, false),array('modifier', 'strip_tags', 'order/order_info.tpl', 4, false),)), $this); ?>
<table>
<tr>
		<td width="30%" style="font-size:12px;">
			<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['design']['design_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
<br />
			<img src="/images/design/<?php echo $this->_tpl_vars['design']['design_image']; ?>
_original.jpg" width="100%" border="0" />
		</td>
		<td width="70%" style="font-size:12px; padding-left:25px; padding-top:15px;" class="content_text">
			<p><b><?php echo $this->_tpl_vars['frontendLangParams']['ORDER_SITETYPE']; ?>
:</b> <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sitetype']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</p>
			<p><b><?php echo $this->_tpl_vars['frontendLangParams']['ORDER_CMS']; ?>
:</b> <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['cms']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</p>
			<p><b><?php echo $this->_tpl_vars['frontendLangParams']['ORDER_SITENAME']; ?>
:</b> <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['sitename'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</p>
			<p><b><?php echo $this->_tpl_vars['frontendLangParams']['ORDER_DOMAIN']; ?>
:</b> <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['domain'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</p>
			<p><b><?php echo $this->_tpl_vars['frontendLangParams']['ORDER_PRICE']; ?>
:</b> <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['price'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</p>
		</td>
</tr>
</table>
<br />
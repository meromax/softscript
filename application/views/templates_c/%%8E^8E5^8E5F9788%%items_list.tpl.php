<?php /* Smarty version 2.6.18, created on 2013-11-03 22:03:51
         compiled from admin/languages/items_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/languages/items_list.tpl', 27, false),array('modifier', 'stripslashes', 'admin/languages/items_list.tpl', 28, false),)), $this); ?>
<br />
<center><span style="font-size:16px;"><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__HEADER']; ?>
</span></center>
<br />
<div id="gallery">
<table align="center" width="97%">
<tr>
	<td align="left" colspan="5" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/languages/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>

<tr>
	<td colspan="5" class="header">
		<a href="/admin/languages/add"><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__ADD']; ?>
</a>
	</td>
</tr>

<tr><td colspan="5" height="2" style="line-height:2px;">&nbsp;</td></tr>
<tr>
	<td class="header"><b><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__TITLE']; ?>
</b></td>
	<td class="header"><b><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__SHORT_TITLE']; ?>
</b></td>
	<td class="header" width="40" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__FLAG']; ?>
</b></td>
	<td class="header" width="80" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['TITLE_POSITION']; ?>
</b></td>
	<td class="header" width="80" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__ACTION']; ?>
</b></td>
</tr>
<?php $_from = $this->_tpl_vars['languageslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr bgcolor="<?php echo smarty_function_cycle(array('values' => '#FFEFAA,#ffffff'), $this);?>
">
	<td style="padding:5px 5px 5px 5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
	<td style="padding:5px 5px 5px 5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['short_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
	<td style="padding:5px 5px 5px 5px; width:60px;" align="center" valign="middle">
		<img src="/languages/<?php echo $this->_tpl_vars['item']['short_title_lower']; ?>
/<?php echo $this->_tpl_vars['item']['flag_image']; ?>
_flag.jpg" height="19" width="28" />
	</td>	
	<td style="padding:5px 5px 5px 5px; width:60px;" align="center"><?php echo $this->_tpl_vars['item']['position']; ?>
</td>
	<td align="center" style="padding:5px 5px 5px 5px; width:150px;">
		<?php if ($this->_tpl_vars['item']['lang_id'] != 100): ?>
		<a href="/admin/languages/modify/id/<?php echo $this->_tpl_vars['item']['lang_id']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_EDIT']; ?>
</a>
		&nbsp;|&nbsp;
		<a href="/admin/languages/delete/id/<?php echo $this->_tpl_vars['item']['lang_id']; ?>
" onclick="return confirm(<?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__MESSAGE3']; ?>
)"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a>
		<?php endif; ?>
	</td>
</tr>
<tr><td colspan="5" height="2" style="line-height:2px;">&nbsp;</td></tr>
<?php endforeach; else: ?>
<tr>
	<td colspan="5"><b><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__MESSAGE1']; ?>
</b></td>
</tr>	
<?php endif; unset($_from); ?>
<tr>
	<td colspan="5" class="header"><a href="/admin/languages/add"><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__ADD']; ?>
</a></td>
</tr>
<tr>
	<td align="left" colspan="5" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/languages/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
</table>
</div>
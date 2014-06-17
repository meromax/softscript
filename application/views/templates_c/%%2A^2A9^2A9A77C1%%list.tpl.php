<?php /* Smarty version 2.6.18, created on 2012-02-01 17:45:23
         compiled from admin/tthemes/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/tthemes/list.tpl', 21, false),array('modifier', 'stripslashes', 'admin/tthemes/list.tpl', 22, false),)), $this); ?>
<br />
<center><span style="font-size:16px;"><?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__HEADER']; ?>
</span></center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="3" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/tthemes/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
<tr>
	<td colspan="3" class="header"><a href="/admin/tthemes/add"><?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__ADD']; ?>
</a></td>
</tr>

<tr><td colspan="3" height="4" style="line-height:5px;">&nbsp;</td></tr>
<tr>
	<td class="header"><b><?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__TITLE']; ?>
</b></td>
	<td class="header"><b><?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__PRICE']; ?>
</b></td>
	<td class="header" width="150" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__ACTION']; ?>
</b></td>
</tr>
<?php $_from = $this->_tpl_vars['tthemes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pages_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pages_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['pages_loop']['iteration']++;
?>
<tr bgcolor="<?php echo smarty_function_cycle(array('values' => '#FFEFAA,#ffffff'), $this);?>
">
	<td style="padding:5px 5px 5px 5px; width:400px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
	<td style="padding:5px 5px 5px 5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['price'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
	<td align="center"><a href="/admin/tthemes/modify/id/<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_EDIT']; ?>
</a> | <a href="/admin/tthemes/delete/id/<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="return confirm(<?php echo $this->_tpl_vars['adminLangParams']['NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN']; ?>
)"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a></td>
</tr>
<tr><td colspan="3" height="4" style="line-height:5px;">&nbsp;</td></tr>
<?php endforeach; else: ?>
<tr>
	<td colspan="3"><b><?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__NO_TTHEMES_FOUND']; ?>
</b></td>
</tr>	
<?php endif; unset($_from); ?>
<tr>
	<td colspan="3" class="header"><a href="/admin/tthemes/add"><?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__ADD']; ?>
</a></td>
</tr>
<tr>
	<td align="left" colspan="3" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/tthemes/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
</table>
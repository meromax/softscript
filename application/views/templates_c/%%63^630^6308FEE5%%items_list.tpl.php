<?php /* Smarty version 2.6.18, created on 2014-01-15 16:24:00
         compiled from admin/options/options/items_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/options/options/items_list.tpl', 28, false),array('modifier', 'stripslashes', 'admin/options/options/items_list.tpl', 29, false),)), $this); ?>
<br />
<center><span style="font-size:16px;">Опции товара</span></center>
<br />
<div id="gallery">
<table align="center" width="97%" class="cont2">
<?php if ($this->_tpl_vars['countpage'] > 1): ?>
<tr>
	<td align="left" colspan="4" style="padding:5px 5px 5px 5px;">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/options/options/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
<?php endif; ?>

<tr>
	<td colspan="4" class="header">
		<a href="/admin/options/add-option">Добавить</a>
	</td>
</tr>

<tr>
	<td class="header"><b><?php echo $this->_tpl_vars['adminLangParams']['SECTIONS_TITLE']; ?>
</b></td>
	    <td class="header" width="120" align="center"><b>Значения</b></td>
    <td class="header" width="120" align="center"><b>Число значений</b></td>
	<td class="header" width="180" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['SECTIONS_ACTION']; ?>
</b></td>
</tr>
<?php $_from = $this->_tpl_vars['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr bgcolor="<?php echo smarty_function_cycle(array('values' => '#ffffff,#EEEEEE'), $this);?>
">
	<td style="padding:5px 5px 5px 5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
		<td align="center" style="padding:5px 5px 5px 5px; width:150px;"><a href="/admin/options/properties/option_id/<?php echo $this->_tpl_vars['item']['id']; ?>
/spage/<?php echo $this->_tpl_vars['page']; ?>
/page/0"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_EDIT']; ?>
</a></td>
    <td style="padding:5px 5px 5px 5px; width:120px; <?php if ($this->_tpl_vars['item']['count'] > 0): ?>font-weight: bold;<?php endif; ?>" align="center"><?php echo $this->_tpl_vars['item']['count']; ?>
</td>
	<td align="center" style="padding:5px 5px 5px 5px; width:150px;">
        <a href="/admin/options/modify-option/id/<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_EDIT']; ?>
</a>
            &nbsp;|&nbsp;
        <a href="/admin/options/delete-option/id/<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a>
	</td>
</tr>
<?php endforeach; else: ?>
<tr>
	<td colspan="4"><b>Ни одной записи не найдено...</b></td>
</tr>	
<?php endif; unset($_from); ?>
<td colspan="4" class="header">
    <a href="/admin/options/add-option">Добавить</a>
</td>
<?php if ($this->_tpl_vars['countpage'] > 1): ?>
    <tr>
        <td align="left" colspan="4" style="padding:5px 5px 5px 5px;">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/options/options/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </td>
    </tr>
<?php endif; ?>
</table>
</div>
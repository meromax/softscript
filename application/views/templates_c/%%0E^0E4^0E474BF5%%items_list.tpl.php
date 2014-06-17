<?php /* Smarty version 2.6.18, created on 2013-04-23 17:27:11
         compiled from admin/brands/items_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/brands/items_list.tpl', 26, false),array('modifier', 'stripslashes', 'admin/brands/items_list.tpl', 27, false),)), $this); ?>
<br />
<center><span style="font-size:16px;">Бренды</span></center>
<br />
<div id="gallery">
<table align="center" width="97%" class="cont2">
<?php if ($this->_tpl_vars['countpage'] > 1): ?>
<tr>
	<td align="left" colspan="3" style="padding:5px 5px 5px 5px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/brands/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
<?php endif; ?>

<tr>
	<td colspan="3" class="header">
		<a href="/admin/brands/add">Добавить</a>
	</td>
</tr>

<tr>
	<td class="header"><b><?php echo $this->_tpl_vars['adminLangParams']['SECTIONS_TITLE']; ?>
</b></td>
	<td class="header" width="150" align="center"><b>Дата добавления</b></td>
	<td class="header" width="200" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['SECTIONS_ACTION']; ?>
</b></td>
</tr>
<?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr bgcolor="<?php echo smarty_function_cycle(array('values' => '#ffffff,#EEEEEE'), $this);?>
">
	<td style="padding:5px 5px 5px 5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
	<td style="padding:5px 5px 5px 5px; width:60px;" align="center"><?php echo $this->_tpl_vars['item']['post_date']; ?>
</td>

	<td align="center" style="padding:5px 5px 5px 5px; width:150px;">
        <a href="/admin/brands/modify/id/<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_EDIT']; ?>
</a>
            &nbsp;|&nbsp;
        <a href="/admin/brands/delete/id/<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a>
	</td>
</tr>
<?php endforeach; else: ?>
<tr>
	<td colspan="3">
        <b>Нет ни одной записи...</b>
    </td>
</tr>	
<?php endif; unset($_from); ?>
<tr>
	<td colspan="3" class="header">
        <a href="/admin/brands/add">Добавить</a>
	</td>
</tr>
<?php if ($this->_tpl_vars['countpage'] > 1): ?>
    <tr>
        <td align="left" colspan="5" style="padding:5px 5px 5px 5px;">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/brands/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </td>
    </tr>
<?php endif; ?>
</table>
</div>
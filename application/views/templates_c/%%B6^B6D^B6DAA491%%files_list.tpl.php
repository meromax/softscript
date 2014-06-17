<?php /* Smarty version 2.6.18, created on 2014-01-21 12:00:23
         compiled from admin/files/files_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/files/files_list.tpl', 22, false),array('modifier', 'stripslashes', 'admin/files/files_list.tpl', 26, false),)), $this); ?>
<br />
<center><span style="font-size:16px;">Документы</span></center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="6" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/files/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
<tr>
    <td colspan="6" class="header" style="padding:5px 5px 5px 5px;"><a href="/admin/files/add-file">Добавить файл</a></td>
</tr>
<tr>
    <td class="header" style="padding:5px 5px 5px 5px;" width="50"><b>Тип</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;"><b><?php echo $this->_tpl_vars['adminLangParams']['FILES_TITLE']; ?>
</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;"><b><?php echo $this->_tpl_vars['adminLangParams']['FILES_DESCRIPTION']; ?>
</b></td>
    <td class="header" width="80" style="padding:5px 5px 5px 5px;" align="center"><b>Позиция</b></td>
	<td class="header" width="80" style="padding:5px 5px 5px 5px;" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['FILES_FILE']; ?>
</b></td>
	<td class="header" width="80" align="center" style="padding:5px 5px 5px 5px;"><b><?php echo $this->_tpl_vars['adminLangParams']['FILES_ACTION']; ?>
</b></td>
</tr>
<?php $_from = $this->_tpl_vars['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file_item']):
?>
<tr bgcolor="<?php echo smarty_function_cycle(array('values' => '#eeeeee,#ffffff'), $this);?>
">
    <td width="50" align="center">
        <img src="/images/icons/<?php echo $this->_tpl_vars['file_item']['file_ext']; ?>
.png" width="50" />
    </td>
	<td style="padding:5px 5px 5px 5px; width:400px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['file_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
	<td style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['file_item']['description']; ?>
</td>
    <td style="padding:5px 5px 5px 5px; text-align: center;"><?php echo $this->_tpl_vars['file_item']['position']; ?>
</td>
	<td align="center" style="padding:5px 5px 5px 5px;" width="100" height="45">
		<?php if ($this->_tpl_vars['file_item']['file_name'] != ""): ?>
			<a href="/admin/files/getfile/id/<?php echo $this->_tpl_vars['file_item']['id']; ?>
">Скачать файл</a>
		<?php endif; ?>
	</td>
	<td align="center" nowrap="nowrap" width="180">
		<a href="/admin/files/modify-file/id/<?php echo $this->_tpl_vars['file_item']['id']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_EDIT']; ?>
</a>
        |
		<a href="/admin/files/delete/id/<?php echo $this->_tpl_vars['file_item']['id']; ?>
" onclick="return confirm(<?php echo $this->_tpl_vars['adminLangParams']['NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN']; ?>
)"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a>
	</td>
</tr>
<?php endforeach; else: ?>
<tr>
	<td colspan="6"><b>Ни одного файла не найдено...</b></td>
</tr>	
<?php endif; unset($_from); ?>
<tr>
    <td colspan="6" class="header" style="padding:5px 5px 5px 5px;"><a href="/admin/files/add-file">Добавить файл</a></td>
</tr>
<tr>
	<td align="left" colspan="6" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/files/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
</table>
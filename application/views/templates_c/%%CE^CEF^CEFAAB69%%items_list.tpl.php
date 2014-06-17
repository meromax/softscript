<?php /* Smarty version 2.6.18, created on 2014-01-15 16:23:01
         compiled from admin/options/properties/items_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/options/properties/items_list.tpl', 30, false),array('modifier', 'stripslashes', 'admin/options/properties/items_list.tpl', 31, false),)), $this); ?>
<br />
<br />
<table width="98%" style="margin-top:20px;"  class="cont2">
<tr>
	<td width="20px;">&nbsp;</td>
	<td width="20%" style="padding:5px 5px 5px 5px; border:1px solid #c5c5c5;" valign="top">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/options/options/view.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
	<td valign="top" width="80%" style="border:0px;">
		<center><span style="font-size:16px;">Значения</span></center>
		<br />
		<div id="gallery">
		<table align="center" width="97%">
        <?php if ($this->_tpl_vars['countpage'] > 1): ?>
		<tr>
			<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/options/properties/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</td>
		</tr>
        <?php endif; ?>
		<tr>
            <td colspan="4" class="header"><a href="/admin/options/add-property/option_id/<?php echo $this->_tpl_vars['option_id']; ?>
/spage/<?php echo $this->_tpl_vars['spage']; ?>
/page/<?php echo $this->_tpl_vars['page']; ?>
">Добавить</a></td>
		</tr>
		<tr>
			<td class="header"><b><?php echo $this->_tpl_vars['adminLangParams']['CATEGORIES_TITLE']; ?>
</b></td>
			<td class="header" width="80" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['TITLE_POSITION']; ?>
</b></td>
			<td class="header" width="80" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['SECTIONS_ACTION']; ?>
</b></td>
		</tr>
		<?php $_from = $this->_tpl_vars['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<tr bgcolor="<?php echo smarty_function_cycle(array('values' => '#ffffff,#EEEEEE'), $this);?>
">
			<td style="padding:5px 5px 5px 5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
			<td style="padding:5px 5px 5px 5px; width:60px;" align="center"><?php echo $this->_tpl_vars['item']['position']; ?>
</td>
			<td align="center" style="padding:5px 5px 5px 5px; width:150px;">
				<a href="/admin/options/modify-property/id/<?php echo $this->_tpl_vars['item']['id']; ?>
/option_id/<?php echo $this->_tpl_vars['option_id']; ?>
/spage/<?php echo $this->_tpl_vars['spage']; ?>
/page/<?php echo $this->_tpl_vars['page']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_EDIT']; ?>
</a> |
				<a href="/admin/options/delete-property/id/<?php echo $this->_tpl_vars['item']['id']; ?>
/option_id/<?php echo $this->_tpl_vars['option_id']; ?>
/spage/<?php echo $this->_tpl_vars['spage']; ?>
/page/<?php echo $this->_tpl_vars['page']; ?>
" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a>
			</td>
		</tr>
		<?php endforeach; else: ?>
		<tr>
			<td colspan="4"><b>Ни одной записи не найдено...</b></td>
		</tr>	
		<?php endif; unset($_from); ?>
		<tr>
			<td colspan="4" class="header"><a href="/admin/options/add-property/option_id/<?php echo $this->_tpl_vars['option_id']; ?>
/spage/<?php echo $this->_tpl_vars['spage']; ?>
/page/<?php echo $this->_tpl_vars['page']; ?>
">Добавить</a></td>
		</tr>
        <?php if ($this->_tpl_vars['countpage'] > 1): ?>
		<tr>
			<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/options/properties/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</td>
		</tr>
         <?php endif; ?>
		</table>
		</div>
	
	</td>
</tr>
</table>
<?php echo '
<script type="text/javascript">
function chnagePage(){
	document.location.href="/admin/sections/index/content_page_id/"+$("#content_page_id").val()+"/page/1";
}
</script>
'; ?>
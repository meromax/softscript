<?php /* Smarty version 2.6.18, created on 2014-01-21 12:00:21
         compiled from admin/delivery/items_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/delivery/items_list.tpl', 21, false),array('modifier', 'stripslashes', 'admin/delivery/items_list.tpl', 22, false),array('modifier', 'strip_tags', 'admin/delivery/items_list.tpl', 23, false),)), $this); ?>
<br />
<center><span style="font-size:16px;">Доставка</span></center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="4" style="padding:5px 5px 5px 5px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/delivery/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
<tr>
	<td colspan="4" class="header" style="padding:5px 5px 5px 5px;"><a href="/admin/delivery/add">Добавить пункт назначения</a></td>
</tr>

<tr>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>Пункт назначения</b></td>
	<td class="header" style="padding:5px 5px 5px 5px; width: 150px;"><b>Цена (руб.)</b></td>
	<td class="header" style="padding:5px 5px 5px 5px; width: 150px;" align="center"><b>Позиция</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;" width="150" align="center"><b>Действия</b></td>
</tr>
<?php $_from = $this->_tpl_vars['destinations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr bgcolor="<?php echo smarty_function_cycle(array('values' => '#FFEFAA,#ffffff'), $this);?>
">
	<td style="padding:5px 5px 5px 5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['destination'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
	<td style="padding:5px 5px 5px 5px;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['price'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
    <td style="padding:5px 5px 5px 5px;" align="center"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['position'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
	<td align="center" style="padding:5px 5px 5px 5px; width:150px;">
        <a href="/admin/delivery/modify/id/<?php echo $this->_tpl_vars['item']['id']; ?>
">Изменить</a> | <a href="/admin/delivery/delete/id/<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="return confirm('Вы уверены, что хотите удалить это пункт назначения?')">Удалить</a>
    </td>
</tr>
<?php endforeach; else: ?>
<tr>
	<td colspan="4"><b>Ни одного пункта не найдено...</b></td>
</tr>	
<?php endif; unset($_from); ?>
    <tr>
        <td colspan="4" class="header" style="padding:5px 5px 5px 5px;"><a href="/admin/delivery/add">Добавить пункт назначения</a></td>
    </tr>
<tr>
	<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/delivery/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
</table>
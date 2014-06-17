<?php /* Smarty version 2.6.18, created on 2014-01-21 14:30:12
         compiled from admin/deals/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/deals/list.tpl', 43, false),array('modifier', 'stripslashes', 'admin/deals/list.tpl', 51, false),)), $this); ?>
<br />
<div id="gallery">
<table align="center" width="97%" class="cont2">
<tr>
    <td colspan="4" class="header" style="text-align: center;">
        <span style="font-size: 14px; font-weight: normal;">Тип:</span>
        <select name="type" id="type" onchange="changeDealType();">
            <option value="0" <?php if ($this->_tpl_vars['deal_type'] == 0): ?>selected="selected"<?php endif; ?>>Новинки</option>
            <option value="1" <?php if ($this->_tpl_vars['deal_type'] == 1): ?>selected="selected"<?php endif; ?>>Акции</option>
            <option value="2" <?php if ($this->_tpl_vars['deal_type'] == 2): ?>selected="selected"<?php endif; ?>>Горячие предложения</option>
        </select>
    </td>
</tr>
<tr>
    <td colspan="4" style="border: 0px;">
        &nbsp;
    </td>
</tr>
<?php if ($this->_tpl_vars['countpage'] > 1): ?>
<tr>
	<td align="left" colspan="4" style="padding:5px 5px 5px 5px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/deals/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
<?php endif; ?>

<tr>
	<td colspan="4" class="header">
		<a href="/admin/deals/add">Добавить</a>
	</td>
</tr>

<tr>
    <td class="header"><b>Рис.</b></td>
	<td class="header"><b><?php echo $this->_tpl_vars['adminLangParams']['SECTIONS_TITLE']; ?>
</b></td>
    <td class="header" align="center"><b>Дата</b></td>
				<td class="header" width="80" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['SECTIONS_ACTION']; ?>
</b></td>
</tr>
<?php $_from = $this->_tpl_vars['deals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr bgcolor="<?php echo smarty_function_cycle(array('values' => '#ffffff,#EEEEEE'), $this);?>
">
    <td style="width: 52px; height: 52px; text-align: center;">
        <?php if ($this->_tpl_vars['item']['image'] != ""): ?>
            <img style="border:1px solid #b2b2b2;" align="left" src="/images/deals/<?php echo $this->_tpl_vars['item']['image']; ?>
_square.jpg?time=<?php echo time(); ?>
" alt="" title="" width="52" height="52">
            <?php else: ?>
            нет картинки
        <?php endif; ?>
    </td>
	<td style="padding:5px 5px 5px 5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
    <td style="padding:5px 5px 5px 5px; width:120px;" align="center"><?php echo $this->_tpl_vars['item']['post_date']; ?>
</td>
			                    				<td align="center" style="padding:5px 5px 5px 5px; width:150px;">
        <a href="/admin/deals/modify/id/<?php echo $this->_tpl_vars['item']['id']; ?>
/type/<?php echo $this->_tpl_vars['deal_type']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_EDIT']; ?>
</a>
            &nbsp;|&nbsp;
        <a href="/admin/deals/delete/id/<?php echo $this->_tpl_vars['item']['id']; ?>
/type/<?php echo $this->_tpl_vars['deal_type']; ?>
" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a>
	</td>
</tr>
<?php endforeach; else: ?>
<tr>
	<td colspan="4"><b>Нет ни одной записи...</b></td>
</tr>	
<?php endif; unset($_from); ?>
<tr>
	<td colspan="4" class="header"><a href="/admin/deals/add">Добавить</a></td>
</tr>
<?php if ($this->_tpl_vars['countpage'] > 1): ?>
    <tr>
        <td align="left" colspan="4" style="padding:5px 5px 5px 5px;">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/deals/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </td>
    </tr>
<?php endif; ?>
</table>
</div>

<?php echo '
<script type="text/javascript">
    function  changeDealType(){
        document.location.href = "/admin/deals/index/type/"+$("#type").val()+"/page/1";
    }
</script>
'; ?>
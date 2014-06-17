<?php /* Smarty version 2.6.18, created on 2013-12-17 01:51:41
         compiled from admin/delivery/add_modify_item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/delivery/add_modify_item.tpl', 18, false),)), $this); ?>
<br />
<center><span style="font-size:16px;">Доставка</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/delivery/<?php echo $this->_tpl_vars['action']; ?>
" name="delivery_form">
			<input type="hidden" name="step" value="2">
			<?php if ($this->_tpl_vars['destination']['id']): ?>
				<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['destination']['id']; ?>
">
			<?php endif; ?>
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b><?php if ($this->_tpl_vars['action'] == 'modify'): ?>Изменить<?php else: ?>Добавить<?php endif; ?> пункт назначения</b></td>
				</tr>
				<tr>
					<td class="header" width="100px">Пункт зазначения:</td>
					<td><input type="text" id="destination" class="input" style="width:400px;" name="destination" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['destination']['destination'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"></td>
				</tr>
				<tr>
					<td class="header">Цена доставки:</td>
                    <td><input type="text" id="price" class="input" style="width:100px;" maxlength="10" name="price" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['destination']['price'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"></td>
				</tr>
                <tr>
                    <td class="header">Позиция:</td>
                    <td><input type="text" id="position" class="input" style="width:40px;" maxlength="10" name="position" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['destination']['position'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"></td>
                </tr>
				<tr>
					<td colspan="2" class="header" align="center">
						<input type="button" class="input" value="save" onclick="checkForm();">&nbsp;
						<input type="button" class="input" value="cancel" onclick="document.location='/admin/delivery/index/page/1'">
					</td>
				</tr>
			</table>
		</form>
	</td>
</tr>
</table>
<?php echo '

<script type="text/javascript">
    
function checkForm(){
	if ($("#destination").val() == \'\') {
		alert(\'Введите пункт назначения\');
	} else if($("#price").val() == \'\') {
		alert(\'Введите цену доставки\');
	} else if($("#position").val() == \'\') {
        alert(\'Введите позицию\');
    } else {
		document.forms.delivery_form.submit();
	}
}
</script>
'; ?>
<?php /* Smarty version 2.6.18, created on 2013-01-25 20:02:49
         compiled from admin/forum/forum/add_modify_item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/forum/forum/add_modify_item.tpl', 19, false),)), $this); ?>
<br />
<center><span style="font-size:16px;">Форум -> <?php if ($this->_tpl_vars['action'] == 'modifyforum'): ?>Изменение<?php else: ?>Добавление<?php endif; ?></span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/forum/<?php echo $this->_tpl_vars['action']; ?>
" name="forum_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			<?php if ($this->_tpl_vars['item']['id']): ?>
				<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
			<?php endif; ?>
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b><?php if ($this->_tpl_vars['action'] == 'modifyforum'): ?>Изменить<?php else: ?>Добавить<?php endif; ?></b></td>
				</tr>

				<tr>
					<td class="header" width="100px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['SECTIONS_TITLE']; ?>
:</td>
					<td><input type="text" id="title" class="input" style="width:800px;" name="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"></td>
				</tr>
                <tr>
                    <td class="header" style="padding:5px 5px 5px 5px;">Короткое описание:</td>
                    <td style="padding-left:6px;">
                        <textarea name="description_short" id="description_short"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description_short'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
                    </td>
                </tr>
				<tr>
					<td class="header" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['SECTIONS_DESCRIPTION']; ?>
:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/forum/meta.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center">
                        <input type="hidden" name="section_type" value="1" />
                        <input type="hidden" name="template" value="0" />
						<input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_SAVE']; ?>
" onclick="checkForm();">&nbsp;
						<input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_CANCEL']; ?>
" onclick="document.location='/admin/forum/index/page/1'">
					</td>
				</tr>
			</table>
		</form>
		<script>
			var oFCKeditor = new FCKeditor('description', 800, 500) ;
			//oFCKeditor.ToolbarSet = 'Basic' ;
			oFCKeditor.ReplaceTextarea();

            var oFCKeditor2 = new FCKeditor('description_short', 800, 300) ;
            oFCKeditor2.ReplaceTextarea();

		</script>
	</td>
</tr>
</table>
<?php echo '

<script type="text/javascript">
    
function checkForm(){
	var title = document.getElementById(\'title\').value;

	if ($("#title").val() == \'\') {
        alert(\'Вы должны заподнить поле заголовок...\');
    } else {
		document.forms.forum_form.submit();
	}
}
</script>
'; ?>
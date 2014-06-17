<?php /* Smarty version 2.6.18, created on 2013-12-17 02:35:34
         compiled from admin/files/add_modify_file.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/files/add_modify_file.tpl', 18, false),)), $this); ?>
<br />
<center><span style="font-size:16px;">Документы -> <?php if ($this->_tpl_vars['action'] == 'modify-file'): ?>Изменить документ<?php else: ?>Добавить документ<?php endif; ?></span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/files/<?php echo $this->_tpl_vars['action']; ?>
" name="files_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			<?php if ($this->_tpl_vars['item']['id']): ?>
				<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
			<?php endif; ?>
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b><?php if ($this->_tpl_vars['action'] == 'modify-file'): ?>Изменить документ<?php else: ?>Добавить документ<?php endif; ?></b></td>
				</tr>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['FILES_TITLE']; ?>
:</td>
					<td><input type="text" id="title" class="input" style="width:800px;" name="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"></td>
				</tr>
				<tr>
					<td class="header"><?php echo $this->_tpl_vars['adminLangParams']['FILES_DESCRIPTION']; ?>
:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
					</td>
				</tr>				
				
				<?php if ($this->_tpl_vars['item']['file_name_original'] != ""): ?>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['FILES_FILE']; ?>
:</td>
					<td align="left" style="padding-left:6px;">
                        <a href="/admin/files/getfile/id/<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['file_name_original']; ?>
</a>
					</td>
				</tr>
				<?php endif; ?>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['FILES_UPLOAD_FILE']; ?>
:</td>
					<td><input type="file" size="103" style="*width:600px;" class="input" id="upload_id" name="file"></td>
				</tr>

                <tr>
                    <td class="header" width="100px">Позиция:</td>
                    <td><input type="text" id="position" class="input" style="width:40px;" name="position" value="<?php echo $this->_tpl_vars['item']['position']; ?>
"></td>
                </tr>

				<tr>
					<td colspan="2" class="header" align="center">
						<input type="button" class="input" value="Сохранить" <?php if ($this->_tpl_vars['action'] != 'modify-file'): ?> onclick="checkForm('')" <?php else: ?> onclick="checkForm('modify')" <?php endif; ?>>&nbsp;
						<input type="button" class="input" value="Отмена" onclick="document.location='/admin/files/page/1'">
					</td>
				</tr>
			</table>
		</form>
		<script>
			var oFCKeditor = new FCKeditor('description', 800, 300) ;
			//oFCKeditor.ToolbarSet = 'Basic' ;
			oFCKeditor.ReplaceTextarea();
		</script>
	</td>
</tr>
</table>
<?php echo '

<script type="text/javascript">
    
function checkForm(type){

	if(type==\'\'){
		if ($("#title").val() == \'\') {
			alert(\'Введите заголовок документа\');
		} else if($("#upload_id").val() == \'\') {
            alert(\'Выберите файл\');
        } else if($("#position").val() == \'\') {
			alert(\'Укажите позицию\');
		} else {
			document.forms.files_form.submit();
		}
	} else {
        if ($("#title").val() == \'\') {
            alert(\'Введите заголовок документа\');
        } else if($("#position").val() == \'\') {
            alert(\'Укажите позицию\');
        } else {
			document.forms.files_form.submit();
		}
	}
}
</script>
'; ?>
<?php /* Smarty version 2.6.18, created on 2011-10-05 03:16:14
         compiled from admin/reviews/add_modify.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/reviews/add_modify.tpl', 18, false),)), $this); ?>
<br />
<center><span style="font-size:16px;"><?php echo $this->_tpl_vars['adminLangParams']['NEWS_HEADER']; ?>
 -> <?php if ($this->_tpl_vars['action'] == 'modifynew'): ?><?php echo $this->_tpl_vars['adminLangParams']['NEWS_MODIFY_NEW']; ?>
<?php else: ?><?php echo $this->_tpl_vars['adminLangParams']['NEWS_ADD_NEW']; ?>
<?php endif; ?></span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/news/<?php echo $this->_tpl_vars['action']; ?>
" name="news_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			<?php if ($this->_tpl_vars['new']['new_id']): ?>
				<input type="hidden" name="new_id" value="<?php echo $this->_tpl_vars['new']['new_id']; ?>
">
			<?php endif; ?>
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b><?php if ($this->_tpl_vars['action'] == 'modifynew'): ?><?php echo $this->_tpl_vars['adminLangParams']['NEWS_MODIFY_NEW']; ?>
<?php else: ?><?php echo $this->_tpl_vars['adminLangParams']['NEWS_ADD_NEW']; ?>
<?php endif; ?></b></td>
				</tr>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['NEWS_TITLE']; ?>
:</td>
					<td><input type="text" id="title" class="input" style="width:800px;" name="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['new']['new_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"></td>
				</tr>
				<tr>
					<td class="header"><?php echo $this->_tpl_vars['adminLangParams']['NEWS_DESCRIPTION']; ?>
:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description"><?php echo ((is_array($_tmp=$this->_tpl_vars['new']['new_description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
					</td>
				</tr>				
				
				<?php if ($this->_tpl_vars['new']['new_image'] != ""): ?>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['NEWS_IMAGE']; ?>
:</td>
					<td align="left" style="padding-left:6px;"><img style="border:1px solid #b2b2b2;" align="left" src="/images/news/<?php echo $this->_tpl_vars['new']['new_image']; ?>
_small.jpg?time=<?php echo time(); ?>
" alt="" title=""></td>
				</tr>
				<?php endif; ?>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['NEWS_UPLOAD_IMAGE']; ?>
:</td>
					<td><input type="file" size="103" style="*width:600px;" class="input" id="upload_id" name="image"></td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center"><input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_SAVE']; ?>
" <?php if ($this->_tpl_vars['action'] != 'modifynew'): ?> onclick="checkForm('')" <?php else: ?> onclick="checkForm('modify')" <?php endif; ?>>&nbsp;<input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_CANCEL']; ?>
" onclick="document.location='/admin/news/page/1'"></td>
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
	var title    = document.getElementById(\'title\').value;
	var ChekStr = document.getElementById(\'upload_id\').value;
	

	if(type==\'\'){
		if (title == \'\') {
			alert(\'You must fill the title field.\');
		} else if(ChekStr==\'\') {
			alert(\'Please choose the picture.\');
		} else {
			document.forms.news_form.submit();
		}
	} else {
		if (title == \'\') {
			alert(\'You must fill the title field.\');
		} else {
			document.forms.news_form.submit();
		}
	}
}
</script>
'; ?>
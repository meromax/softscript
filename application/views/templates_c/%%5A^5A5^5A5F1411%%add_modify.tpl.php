<?php /* Smarty version 2.6.18, created on 2014-01-27 23:26:56
         compiled from admin/banners/add_modify.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/banners/add_modify.tpl', 18, false),)), $this); ?>
<br />
<center><span style="font-size:16px;"><?php echo $this->_tpl_vars['adminLangParams']['BANNERS_HEADER']; ?>
 -> <?php if ($this->_tpl_vars['action'] == 'modifybanner'): ?><?php echo $this->_tpl_vars['adminLangParams']['BANNERS_MODIFY']; ?>
<?php else: ?><?php echo $this->_tpl_vars['adminLangParams']['BANNERS_ADD']; ?>
<?php endif; ?></span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/banners/<?php echo $this->_tpl_vars['action']; ?>
" name="banners_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			<?php if ($this->_tpl_vars['banner']['id']): ?>
				<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['banner']['id']; ?>
">
			<?php endif; ?>
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b><?php if ($this->_tpl_vars['action'] == 'modifybanner'): ?><?php echo $this->_tpl_vars['adminLangParams']['BANNERS_MODIFY']; ?>
<?php else: ?><?php echo $this->_tpl_vars['adminLangParams']['BANNERS_ADD']; ?>
<?php endif; ?></b></td>
				</tr>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['BANNERS_TITLE']; ?>
:</td>
					<td><input type="text" id="title" class="input" style="width:800px;" name="title" value='<?php echo ((is_array($_tmp=$this->_tpl_vars['banner']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
'></td>
				</tr>
				<tr>
					<td class="header"><?php echo $this->_tpl_vars['adminLangParams']['BANNERS_DESCRIPTION']; ?>
:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description"><?php echo ((is_array($_tmp=$this->_tpl_vars['banner']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
					</td>
				</tr>
				
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['BANNERS_LINK']; ?>
:</td>
					<td><input type="text" id="link" class="input" style="width:800px;" name="link" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['banner']['link'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"></td>
				</tr>
                <?php if ($this->_tpl_vars['action'] == 'modifybanner'): ?>
                    <input type="hidden" name="type" id="type" value="<?php echo $this->_tpl_vars['banner']['type']; ?>
" />
                <?php else: ?>
                    <input type="hidden" name="type" id="type" value="0" />
                <?php endif; ?>
                                                                                                                                                                                                    				
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['BANNERS_POSITION']; ?>
:</td>
					<td><input type="text" id="position" class="input" style="width:40px;" name="position" value="<?php if ($this->_tpl_vars['action'] != 'modifybanner'): ?>0<?php else: ?><?php echo $this->_tpl_vars['banner']['position']; ?>
<?php endif; ?>"></td>
				</tr>				
				
				<?php if ($this->_tpl_vars['banner']['image'] != ""): ?>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['BANNERS_IMAGE']; ?>
:</td>
					<td align="left" style="padding-left:6px;"><img style="border:1px solid #b2b2b2;" align="left" src="/images/banners/<?php echo $this->_tpl_vars['banner']['image']; ?>
_small.jpg?time=<?php echo time(); ?>
" alt="" title=""></td>
				</tr>
				<?php endif; ?>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['BANNERS_UPLOAD_IMAGE']; ?>
:</td>
					<td><input type="file" size="103" style="*width:600px;" class="input" id="upload_id" name="image"></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/banners/meta.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</td>
				</tr>				
				<tr>
					<td colspan="2" class="header" align="center"><input type="button" class="input" value="save" <?php if ($this->_tpl_vars['action'] != 'modifybanner'): ?> onclick="checkForm('')" <?php else: ?> onclick="checkForm('modify')" <?php endif; ?>>&nbsp;<input type="button" class="input" value="cancel" onclick="document.location='/admin/portfolio/page/1'"></td>
				</tr>
			</table>
		</form>
		<script>
			var oFCKeditor = new FCKeditor('description', 800, 300) ;
			oFCKeditor.ReplaceTextarea();
		</script>
	</td>
</tr>
</table>
<?php echo '

<script type="text/javascript">
    
function checkForm(type){
	var title    = document.getElementById(\'title\').value;
	var position = document.getElementById(\'position\').value;
	var ChekStr  = document.getElementById(\'upload_id\').value;
	
	if(type==\'\'){
		if (title == \'\') {
			alert(\'You must fill the title field.\');
		} else if (position == \'\') {
			alert(\'You must fill the position field.\');
		} else if(ChekStr==\'\') {
			alert(\'Please choose the picture.\');
		} else {
			document.forms.banners_form.submit();
		}
	} else {
		if (title == \'\') {
			alert(\'You must fill the title field.\');
		} else if (position == \'\') {
			alert(\'You must fill the position field.\');
		} else {
			document.forms.banners_form.submit();
		}
	}
}
</script>
'; ?>
<?php /* Smarty version 2.6.18, created on 2013-11-03 22:04:40
         compiled from admin/languages/add_modify.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/languages/add_modify.tpl', 18, false),)), $this); ?>
<br />
<center><span style="font-size:16px;"><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__HEADER']; ?>
 -> <?php if ($this->_tpl_vars['action'] == 'modify'): ?><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__MODIFY']; ?>
<?php else: ?><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__ADD']; ?>
<?php endif; ?></span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/languages/<?php echo $this->_tpl_vars['action']; ?>
" name="languages_form" id="languages_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			<?php if ($this->_tpl_vars['language']['lang_id']): ?>
				<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['language']['lang_id']; ?>
">
			<?php endif; ?>
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b><?php if ($this->_tpl_vars['action'] == 'modify'): ?><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__MODIFY']; ?>
<?php else: ?><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__ADD']; ?>
<?php endif; ?></b></td>
				</tr>
				<tr>
					<td class="header" width="250px"><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__TITLE']; ?>
:</td>
					<td><input type="text" id="title" name="title" class="input" style="width:260px;" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['language']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"></td>
				</tr>
				<tr>
					<td class="header" width="250px"><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__SHORT_TITLE']; ?>
:</td>
					<td><input type="text" id="short_title" name="short_title" class="input" style="width:30px;" maxlength="2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['language']['short_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"></td>
				</tr>
				<tr>
					<td class="header" width="250px"><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__POSITION']; ?>
:</td>
					<td><input type="text" id="position" name="position" class="input" style="width:30px;" maxlength="2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['language']['position'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"></td>
				</tr>								
				<?php if (isset ( $this->_tpl_vars['language']['lang_id'] )): ?>
				<tr>
					<td class="header"><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__TRANSLATION_FILE']; ?>
:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description" style="width:800px; height:600px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['language']['file_content'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
					</td>
				</tr>
				<?php endif; ?>				
				
				<?php if ($this->_tpl_vars['language']['image'] != ""): ?>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__FLAG_IMAGE']; ?>
:</td>
					<td align="left" style="padding-left:6px;"><img style="border:1px solid #b2b2b2;" align="left" src="/images/news/<?php echo $this->_tpl_vars['new']['new_image']; ?>
_small.jpg?time=<?php echo time(); ?>
" alt="" title=""></td>
				</tr>
				<?php endif; ?>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__UPLOAD_IMAGE']; ?>
:</td>
					<td><input type="file" class="input" id="image" name="image"></td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center">
						<div id="warnings" style="color:red; font-size:13px; display:none; width:100%; text-align:center;"></div>
					</td>
				</tr>				
				<tr>
					<td colspan="2" class="header" align="center"><input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_SAVE']; ?>
" onclick="checkForm();">&nbsp;<input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_CANCEL']; ?>
" onclick="document.location='/admin/languages/page/1'"></td>
				</tr>
			</table>
		</form>
	</td>
</tr>
</table>
<input type="hidden" name="languages_warning1" id="languages_warning1" value="<?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__WARNING1']; ?>
" />
<input type="hidden" name="languages_warning2" id="languages_warning2" value="<?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__WARNING2']; ?>
" />
<input type="hidden" name="languages_warning3" id="languages_warning3" value="<?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__WARNING3']; ?>
" />
<input type="hidden" name="languages_warning4" id="languages_warning4" value="<?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__WARNING4']; ?>
" />
<input type="hidden" name="languages_warning5" id="languages_warning5" value="<?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__WARNING5']; ?>
" />
<input type="hidden" name="languages_warning6" id="languages_warning6" value="<?php echo $this->_tpl_vars['adminLangParams']['LANGUAGES__WARNING6']; ?>
" />

<?php echo '
<script type="text/javascript">
function checkForm(){

	$.post("/admin/languages/check-before-add", $("#languages_form").serialize(),
		function(data) {
   			if(data!=0){
   				$("#warnings").html($("#languages_warning"+data).val());
   				$("#warnings").fadeIn();
				setTimeout(function(){  
					$("#warnings").fadeOut();				       
				}, 5000);     				
   			} else {
   				$("#languages_form").submit();
   			}
		}
	);	
}
</script>
'; ?>
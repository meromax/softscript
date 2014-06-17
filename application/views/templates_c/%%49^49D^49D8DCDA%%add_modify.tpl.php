<?php /* Smarty version 2.6.18, created on 2011-12-01 20:30:34
         compiled from admin/tthemes/add_modify.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/tthemes/add_modify.tpl', 18, false),array('modifier', 'strip_tags', 'admin/tthemes/add_modify.tpl', 18, false),array('modifier', 'trim', 'admin/tthemes/add_modify.tpl', 18, false),)), $this); ?>
<br />
<center><span style="font-size:16px;"><?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__HEADER']; ?>
 -> <?php if ($this->_tpl_vars['action'] == 'modify'): ?><?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__MODIFY']; ?>
<?php else: ?><?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__ADD']; ?>
<?php endif; ?></span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/tthemes/<?php echo $this->_tpl_vars['action']; ?>
" name="ttheme_form" id="ttheme_form">
			<input type="hidden" name="step" value="2">
			<?php if ($this->_tpl_vars['ttheme']['id']): ?>
				<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['ttheme']['id']; ?>
">
			<?php endif; ?>
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b><?php if ($this->_tpl_vars['action'] == 'modify'): ?><?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__MODIFY']; ?>
<?php else: ?><?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__ADD']; ?>
<?php endif; ?></b></td>
				</tr>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__TITLE']; ?>
:</td>
					<td><input type="text" id="title" class="input" style="width:250px;" name="title" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['ttheme']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
"></td>
				</tr>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__PRICE']; ?>
:</td>
					<td><input type="text" id="price" class="input" style="width:80px;" name="price" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['ttheme']['price'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
"></td>
				</tr>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__POSITION']; ?>
:</td>
					<td><input type="text" id="position" class="input" style="width:30px;" name="position" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['ttheme']['position'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
"></td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center"><input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_SAVE']; ?>
" onclick="checkForm();">&nbsp;<input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_CANCEL']; ?>
" onclick="document.location='/admin/tthemes/index/page/1'"></td>
				</tr>
			</table>
		</form>
	</td>
</tr>
</table>
<input type="hidden" name="tthemes_warning1" id="tthemes_warning1" value="<?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__WARNING1']; ?>
" />
<input type="hidden" name="tthemes_warning2" id="tthemes_warning2" value="<?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__WARNING2']; ?>
" />
<input type="hidden" name="tthemes_warning3" id="tthemes_warning3" value="<?php echo $this->_tpl_vars['adminLangParams']['TTHEMES__WARNING3']; ?>
" />

<?php echo '

<script type="text/javascript">
    
function checkForm(){
	var title    = $(\'#title\').val();
	var price    = $(\'#price\').val();
	var position = $(\'#position\').val();
	
	if ($(\'#title\').val() == \'\') {
		alert($("#tthemes_warning1").val());
	} else if($(\'#price\').val()==\'\') {
		alert($("#tthemes_warning2").val());
	} else if($(\'#position\').val()==\'\') {
		alert($("#tthemes_warning3").val());
	} else {
		$("#ttheme_form").submit();
	}
	
}
</script>
'; ?>
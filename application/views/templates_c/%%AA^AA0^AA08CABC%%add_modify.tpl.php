<?php /* Smarty version 2.6.18, created on 2012-02-01 16:41:14
         compiled from admin/operators/add_modify.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/operators/add_modify.tpl', 18, false),array('modifier', 'strip_tags', 'admin/operators/add_modify.tpl', 18, false),array('modifier', 'trim', 'admin/operators/add_modify.tpl', 18, false),)), $this); ?>
<br />
<center><span style="font-size:16px;"><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__HEADER']; ?>
 -> <?php if ($this->_tpl_vars['action'] == 'modify'): ?><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__MODIFY']; ?>
<?php else: ?><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__ADD']; ?>
<?php endif; ?></span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/operators/<?php echo $this->_tpl_vars['action']; ?>
" name="operators_form" id="operators_form">
			<input type="hidden" name="step" value="2">
			<?php if ($this->_tpl_vars['operator']['id']): ?>
				<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['operator']['id']; ?>
">
			<?php endif; ?>
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b><?php if ($this->_tpl_vars['action'] == 'modify'): ?><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__MODIFY']; ?>
<?php else: ?><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__ADD']; ?>
<?php endif; ?></b></td>
				</tr>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__NAME']; ?>
:</td>
					<td><input type="text" id="name" name="name" class="input" style="width:250px;" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['operator']['name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
"></td>
				</tr>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__EMAIL']; ?>
:</td>
					<td><input type="text" id="email" name="email" class="input" style="width:250px;" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['operator']['email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
"></td>
				</tr>
				<tr>
					<td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__PASSWORD']; ?>
:</td>
					<td>
						<input type="text" readonly="readonly" style="background:#e5e5e5; width:90px;" id="password" name="password" class="input" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['operator']['pw'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
">
						<input type="button" value="<?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__GENERATE_PASSWORD']; ?>
" onclick="generatePassword();" />
					</td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center">
						<div id="warnings" style="color:red; font-size:13px; display:none; width:100%; text-align:center;"></div>
					</td>
				</tr>				
				<tr>
					<td colspan="2" class="header" align="center"><input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_SAVE']; ?>
" onclick="checkForm();">&nbsp;<input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_CANCEL']; ?>
" onclick="document.location='/admin/operators/index/page/1'"></td>
				</tr>
			</table>
		</form>
	</td>
</tr>
</table>
<input type="hidden" name="operators_warning1" id="operators_warning1" value="<?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__WARNING1']; ?>
" />
<input type="hidden" name="operators_warning2" id="operators_warning2" value="<?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__WARNING2']; ?>
" />
<input type="hidden" name="operators_warning3" id="operators_warning3" value="<?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__WARNING3']; ?>
" />
<input type="hidden" name="operators_warning4" id="operators_warning4" value="<?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__WARNING4']; ?>
" />
<input type="hidden" name="operators_warning5" id="operators_warning5" value="<?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__WARNING5']; ?>
" />
<input type="hidden" name="operators_warning6" id="operators_warning6" value="<?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__WARNING6']; ?>
" />
<input type="hidden" name="operators_warning7" id="operators_warning7" value="<?php echo $this->_tpl_vars['adminLangParams']['OPERATORS__WARNING7']; ?>
" />


<?php echo '

<script type="text/javascript">
function checkForm(){

	$.post("/admin/operators/check-before-add", $("#operators_form").serialize(),
		function(data) {
   			if(data!=0){
   				$("#warnings").html($("#operators_warning"+data).val());
   				$("#warnings").fadeIn();
				setTimeout(function(){  
					$("#warnings").fadeOut();				       
				}, 5000);     				
   			} else {
   				$("#operators_form").submit();
   			}
		}
	);	
}
function generatePassword(){
	var lang_from = $("#lang_from_id").val();

	$.post("/admin/operators/generate-password",
		function(data) {
   			if(data!=\'\'){
   				$("#password").val(data);
   			}
		}
	);	
}
</script>
'; ?>
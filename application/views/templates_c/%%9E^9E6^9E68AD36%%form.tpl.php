<?php /* Smarty version 2.6.18, created on 2011-09-14 21:06:49
         compiled from registration/form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'registration/form.tpl', 8, false),array('modifier', 'strip_tags', 'registration/form.tpl', 8, false),array('modifier', 'strtolower', 'registration/form.tpl', 55, false),)), $this); ?>
<form method="POST" action="/joinnow.html" name="reg_form">
<input type="hidden" name="reg_post" value="1" />
<table id="contacts"  border="0" width="100%" style="background:#F1F4F7; border:1px solid #B3C6D3;">
<tr>
	<td width="280" style="padding:5px 5px 5px 5px;">
		<table align="center" border="0">
			<tr>
				<td style="padding:5px 0px 5px 0px; font-size:12px;" class="news_title" nowrap="nowrap"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['firstname'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" id="registration_firstname" name="registration_firstname" autocomplete="off" class="input_edit" value="" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px; font-size:12px;" class="news_title" nowrap="nowrap"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['lastname'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" id="registration_lastname" name="registration_lastname" autocomplete="off" value=""  class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px; font-size:12px;" class="news_title" nowrap="nowrap"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['company'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" id="registration_company" name="registration_company" autocomplete="off" value=""  class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px; font-size:12px;" class="news_title" nowrap="nowrap"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['phone'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" id="registration_phone" name="registration_phone" autocomplete="off" value=""  class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px; font-size:12px;" class="news_title" nowrap="nowrap"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['website'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 <span style="padding-left:1px;"></span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" id="registration_url" name="registration_url" autocomplete="off" value=""  class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px;" class="news_title" nowrap="nowrap">E-mail *</td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" id="registration_email" name="registration_email" autocomplete="off" class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px;" class="news_title" nowrap="nowrap"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['password'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="password" id="registration_password" name="registration_password" autocomplete="off" class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px;" class="news_title" nowrap="nowrap"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['password_verify'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="password" id="registration_password_verify" name="registration_password_verify" autocomplete="off" class="input_edit" /></td>
			</tr>
			<tr>
				<td>
					<table>
					<tr>
						<td valign="middle">
							<a href="/content/agreement.html" style="text-decoration:underline;" target="_blank"><?php echo $this->_tpl_vars['frontendLangParams']['TITLE_AGREEMENT']; ?>
</a>	
						</td>
						<td valign="bottom" style="padding-top:3px;">
							<input type="checkbox" id="registration_agreement" name="registration_agreement" />
						</td>
					</tr>
					</table>
					
					
				</td>
				<td align="left">
					<input type="image" value="Send Message" src="/images/button_submit_<?php echo ((is_array($_tmp=$this->_tpl_vars['lang_info']['short_title'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)); ?>
.jpg" onclick="checkRegFormBeforeSend(); return false;" />
					<input type="image" value="Send Message" src="/images/button_cancel_<?php echo ((is_array($_tmp=$this->_tpl_vars['lang_info']['short_title'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)); ?>
.jpg" onclick="document.location.href='/'; return false;" />
				</td>
			</tr>
		</table>
	</td>
	<td valign="top">
		<?php if ($this->_tpl_vars['error_login']): ?><?php echo $this->_tpl_vars['error_login']; ?>
<?php endif; ?>
		<div id="message_box" style="margin-top:11px; color:#666666; background:#ffffff; width:190px; display:none; border:1px solid #B3C6D3;">
			<div style="height:20px;  width:100%; height:30px; background:#EEEFED;  position:relative; ">
				<table width="100%" height="100%">
				<tr>
					<td style="font-weight:bold; text-align:center; color:#666666; padding:3px 3px 3px 3px; font-size:12px;"><div id="titleBox"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['text_input_error'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</div></td>
				</tr>
				</table>
			</div>
			<div align="left" id="message_text" style="text-decoration:none; padding:3px 3px 3px 3px; background:#ffffff;  position:relative; ">
				<?php if ($this->_tpl_vars['msg'] != ""): ?><?php echo $this->_tpl_vars['msg']; ?>
<?php endif; ?>
				<?php if ($this->_tpl_vars['error_login']): ?><?php echo $this->_tpl_vars['error_login']; ?>
<?php endif; ?>
			</div>
		</div>
		<div id="progress" style="position:absolute; background:#ECF0FB; margin-left:30px; margin-top:50px; text-align:center; display:none;  z-index:1001;">
			<img src="/images/loading.gif" />
		</div>
	</td>
</tr>
</table>
</form>
<script type="text/javascript">
var firstname_error   = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['text_firstname_error'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
';
var lastname_error    = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['text_lastname_error'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
';
var company_error     = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['text_company_error'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
';
var phone_error       = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['text_phone_error'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
';
var url_error         = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['url_not_correct'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
';

var email_error       = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['text_email_error'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
';
var email_error2      = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['text_email_error2'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
';
var email_error3      = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['email_already_exists'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
';

var password_error1   = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['password_mismatch'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
';
var password_error2   = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['password_char_min'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
';

var agreement_error   = <?php echo $this->_tpl_vars['frontendLangParams']['AGREEMENT_ACCEPT_MESSAGE']; ?>
;

</script>
<?php echo '
<script type="text/javascript">

function checkRegFormBeforeSend(){

	var msg=\'\';

	var mail      = /^[a-zA-Z][\\w\\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\\w\\.-]*[a-zA-Z0-9]\\.[a-zA-Z][a-zA-Z\\.]*[a-zA-Z]$/;

	var reg_firstname   = document.getElementById(\'registration_firstname\');
	var reg_lastname    = document.getElementById(\'registration_lastname\');
	var reg_company     = document.getElementById(\'registration_company\');
	var reg_phone       = document.getElementById(\'registration_phone\');
	var reg_url         = document.getElementById(\'registration_url\');
	
	var reg_email       = document.getElementById(\'registration_email\');
	var reg_password    = document.getElementById(\'registration_password\');
	var reg_password_re = document.getElementById(\'registration_password_verify\');

	var agreement       = document.getElementById(\'registration_agreement\');


	if(reg_firstname.value==\'\'){
		msg = msg+"<span style=\'padding:3px 3px 3px 5px; color:black; font-size:11px;\'>&#9674; "+firstname_error+"</span><br />";
	}

	if(reg_lastname.value==\'\'){
		msg = msg+"<span style=\'padding:3px 3px 3px 5px; color:black; font-size:11px;\'>&#9674; "+lastname_error+"</span><br />";
	}

	if(reg_company.value==\'\'){
		msg = msg+"<span style=\'padding:3px 3px 3px 5px; color:black; font-size:11px;\'>&#9674; "+company_error+"</span><br />";
	}

	if(reg_phone.value==\'\'){
		msg = msg+"<span style=\'padding:3px 3px 3px 5px; color:black; font-size:11px;\'>&#9674; "+phone_error+"</span><br />";
	}

	if(reg_email.value==\'\'){
		msg = msg+"<span style=\'padding:3px 3px 3px 5px; color:black; font-size:11px;\'>&#9674; "+email_error+"</span><br />";
	} else if(reg_email.value.match(mail)==null){
		msg = msg+"<span style=\'padding:3px 3px 3px 5px; color:black; font-size:11px;\'>&#9674; "+email_error2+"</span><br />";
	}

	if(reg_password.value == \'\'&&reg_password_re.value == \'\'){
		msg = msg+"<span style=\'padding:3px 3px 3px 5px; color:black; font-size:11px;\'>&#9674; "+password_error2+"</span><br />";
	} else if(reg_password.value!=reg_password_re.value){
		msg = msg+"<span style=\'padding:3px 3px 3px 5px; color:black; font-size:11px;\'>&#9674; "+password_error1+"</span><br />";
	}  else if(reg_password.value==reg_password_re.value && reg_password.value.length<6){
		msg = msg+"<span style=\'padding:3px 3px 3px 5px; color:black; font-size:11px;\'>&#9674; "+password_error2+"</span><br />";
	}

	if(agreement.value==\'\'){
		msg = msg+"<span style=\'padding:3px 3px 3px 5px; color:black; font-size:11px;\'>&#9674; "+agreement_error+"</span><br />";
	}
	
	if(msg==\'\'){
		$("#message_box").fadeOut("slow");
		$("#progress").show(); 

		var url = "email="+reg_email.value; 
		$.ajax({
		type: "POST",
		url: "/registration/index/checkemail",
		data: url,
		success: function(data){
			setTimeout(function () {
				$("#progress").hide(); 
				if(data==\'1\'){
					msg = msg+"<span style=\'padding:3px 3px 3px 5px; color:black; font-size:11px;\'>&#9674; "+email_error3+"</span><br />";
					$("#message_text").html(msg);
					$("#message_box").fadeIn(\'slow\');
				} else {
					document.forms.reg_form.submit();
				}
			}, 5000);
		}
		});
	} else {
		$("#message_text").html(msg);
		$("#message_box").fadeIn(\'slow\');
		setTimeout(function () { $("#message_box").fadeOut("slow"); }, 5000);
		
	}
}

setTimeout(function () { 
	document.getElementById(\'registration_email\').focus();
	document.getElementById(\'registration_email\').value="";
	document.getElementById(\'registration_password\').focus();
	document.getElementById(\'registration_password\').value="";
	document.getElementById(\'registration_password_verify\').focus();
	document.getElementById(\'registration_password_verify\').value=""; 
	document.getElementById(\'registration_firstname\').focus();
}, 100);

</script>
'; ?>
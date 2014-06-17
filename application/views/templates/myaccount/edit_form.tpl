<h2>{$settings.registration|stripslashes|strip_tags}</h2>
<div class="text_block">
<form method="POST" action="/joinnow.html" name="reg_form">
<input type="hidden" name="reg_post" value="1" />
<table id="contacts"  border="0" width="580" style="background:#121212; border:1px solid #252526;">
<tr>
	<td width="280">
		<table align="center" border="0">
			<tr>
				<td style="padding:5px 0px 5px 0px;" class="news_title" nowrap="nowrap">E-mail *</td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" id="registration_email" name="registration_email" class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px;" class="news_title" nowrap="nowrap">E-mail *</td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" id="registration_email" name="registration_email" class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px;" class="news_title" nowrap="nowrap">E-mail *</td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" id="registration_email" name="registration_email" class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px;" class="news_title" nowrap="nowrap">E-mail *</td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" id="registration_email" name="registration_email" class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px;" class="news_title" nowrap="nowrap">{$settings.password|stripslashes|strip_tags} <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="password" id="registration_password" name="registration_password" class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px;" class="news_title" nowrap="nowrap">{$settings.password_verify|stripslashes|strip_tags} <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="password" id="registration_password_verify" name="registration_password_verify" class="input_edit" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td align="left">
					<input type="image" value="Send Message" src="/images/button_submit_{$lang_info.short_title|strtolower}.jpg" onclick="checkRegFormBeforeSend(); return false;" />
					<input type="image" value="Send Message" src="/images/button_cancel_{$lang_info.short_title|strtolower}.jpg" onclick="document.location.href='/'; return false;" />
				</td>
			</tr>
		</table>
	</td>
	<td valign="top">
		{if $error_login}{$error_login}{/if}
		<div id="message_box" style="margin-top:7px; color:#000000; background:#ffffff; width:190px; display:none; border:1px solid #000000; background:#000000;">
			<div style="height:20px;  width:100%; height:30px; background:#000000;  position:relative; ">
				<table width="100%" height="100%">
				<tr>
					<td style="font-weight:bold; text-align:center; color:#ffffff; padding:3px 3px 3px 3px; font-size:12px;"><div id="titleBox">{$settings.text_input_error|stripslashes|strip_tags}</div></td>
				</tr>
				</table>
			</div>
			<div align="left" id="message_text" style="text-decoration:none; padding:3px 3px 3px 3px; background:#ffffff;  position:relative; ">
				{if $msg!=""}{$msg}{/if}
				{if $error_login}{$error_login}{/if}
			</div>
		</div>
		<div id="progress" style="position:absolute; background:#ECF0FB; margin-left:30px; margin-top:50px; text-align:center; display:none;  z-index:1001;">
			<img src="/images/loading.gif" />
		</div>
	</td>
</tr>
</table>
</form>
</div>
<script type="text/javascript">
var email_error       = '{$settings.text_email_error|stripslashes|strip_tags}';
var email_error2      = '{$settings.text_email_error2|stripslashes|strip_tags}';
var email_error3      = '{$settings.email_already_exists|stripslashes|strip_tags}';

var password_error1   = '{$settings.password_mismatch|stripslashes|strip_tags}';
var password_error2   = '{$settings.password_char_min|stripslashes|strip_tags}';

</script>
{literal}
<script type="text/javascript">

function checkRegFormBeforeSend(){

	var msg='';

	var mail      = /^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
	
	var reg_email       = document.getElementById('registration_email');
	var reg_password    = document.getElementById('registration_password');
	var reg_password_re = document.getElementById('registration_password_verify');

	
	if(reg_email.value==''){
		msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+email_error+"</span><br />";
	} else if(reg_email.value.match(mail)==null){
		msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+email_error2+"</span><br />";
	}

	if(reg_password.value == ''&&reg_password_re.value == ''){
		msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+password_error2+"</span><br />";
	} else if(reg_password.value!=reg_password_re.value){
		msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+password_error1+"</span><br />";
	}  else if(reg_password.value==reg_password_re.value && reg_password.value.length<6){
		msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+password_error2+"</span><br />";
	}
	
	if(msg==''){
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
				if(data=='1'){
					msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+email_error3+"</span><br />";
					$("#message_text").html(msg);
					$("#message_box").fadeIn('slow');
				} else {
					document.forms.reg_form.submit();
				}
			}, 5000);
		}
		});
	} else {
		$("#message_text").html(msg);
		$("#message_box").fadeIn('slow');
		setTimeout(function () { $("#message_box").fadeOut("slow"); }, 5000);
		
	}
}

setTimeout(function () { 
	document.getElementById('registration_email').focus();
	document.getElementById('registration_email').value="";
	document.getElementById('registration_password').focus();
	document.getElementById('registration_password').value="";
	document.getElementById('registration_password_verify').focus();
	document.getElementById('registration_password_verify').value=""; 
	document.getElementById('registration_email').focus();
}, 100);

</script>
{/literal}




<form action="/login" method="POST" name="form_login">
<table id="contacts"  border="0" width="100%" style="background:#F1F4F7; border:1px solid #B3C6D3;">
<tr>
	<td width="280" style="padding:5px 5px 5px 5px;">
		<table align="center" border="0">
			<tr>
				<td style="padding:5px 0px 5px 0px;" class="news_title" nowrap="nowrap">E-mail *</td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" AUTOCOMPLETE=OFF id="login_email" name="login_email" class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px;" class="news_title" nowrap="nowrap">{$settings.password|stripslashes|strip_tags} <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="password" AUTOCOMPLETE=OFF id="login_password" name="login_password" class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px;" class="news_title" nowrap="nowrap">&nbsp;</td>
				<td style="padding:0px 0px 25px 0px;" class="news_title" nowrap="nowrap">
					<a href="/forgotpassword.html">{$settings.forgot_a_password|stripslashes|strip_tags}</a>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td align="left">
					<input type="image" value="Send Message" src="/images/button_login_{$lang_info.short_title|strtolower}.jpg" onclick="checkLoginFormBeforeSend(); return false;" />
				</td>
			</tr>
		</table>
	</td>
	<td valign="top">
		<div id="message_box1" style="margin-top:11px; color:#666666; background:#ffffff; width:230px; display:none; border:1px solid #B3C6D3; background:#000000;">
			<div style="height:20px;  width:100%; height:30px; background:#EEEFED;  position:relative; ">
				<table width="100%" height="100%">
				<tr>
					<td style="font-weight:bold; text-align:center; color:#666666; padding:3px 3px 3px 3px; font-size:12px;"><div id="titleBox">{$settings.text_input_error|stripslashes|strip_tags}</div></td>
				</tr>
				</table>
			</div>
			<div align="left" id="message_text1" style="text-decoration:none; padding:3px 3px 3px 3px; background:#ffffff;  position:relative; ">
			</div>
		</div>
	</td>
</tr>
</table>
</form>
<script type="text/javascript">
var email_error      = '{$settings.text_email_error|stripslashes|strip_tags}';
var email_error2     = '{$settings.text_email_error2|stripslashes|strip_tags}';
var password_error   = '{$settings.password_char_min|stripslashes|strip_tags}';

</script>
{literal}
<script type="text/javascript">

function checkLoginFormBeforeSend(){

	var msg='';

	var mail      = /^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
	
	var email          = document.getElementById('login_email');
	var password       = document.getElementById('login_password');
	
	if(email.value==''){
		msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+email_error+"</span><br />";
	} else if(email.value.match(mail)==null){
		msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+email_error2+"</span><br />";
	}

	if(password.value==''){
		msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+password_error+"</span><br />";
	}
	
	
	if(msg==''){
		$("#message_box1").fadeOut("slow");
		document.forms.form_login.submit();
	} else {
		$("#message_text1").html(msg);
		$("#message_box1").fadeIn('slow');
		setTimeout(function () { $("#message_box1").fadeOut("slow"); }, 5000);
		
	}
}
setTimeout(function () { 
	document.getElementById('login_email').focus();
	document.getElementById('login_email').value="";
	document.getElementById('login_password').focus();
	document.getElementById('login_password').value="";
	document.getElementById('login_email').focus();
}, 100);
</script>
{/literal}
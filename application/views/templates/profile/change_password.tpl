<table id="contacts" width="400" border="0" style="background:#DBE5EB; border:2px solid #B3C6D3;">
<tr>
	<td width="280">
		<table align="center" border="0">
			<tr>
				<td style="padding:5px 0px 5px 0px; font-size:12px;" class="news_title" nowrap="nowrap">{$settings.old_password|stripslashes|strip_tags} <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="password" id="old_account_password" name="old_account_password" class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px; font-size:12px;" class="news_title" nowrap="nowrap">{$settings.password|stripslashes|strip_tags} <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="password" id="new_account_password" name="new_account_password" class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px; font-size:12px;" class="news_title" nowrap="nowrap">{$settings.password_verify|stripslashes|strip_tags} <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="password" id="new_account_password_verify" name="new_account_password_verify" class="input_edit" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td align="left">
					<input type="image" value="Send Message" src="/images/button_submit_{$lang_info.short_title|strtolower}.jpg" onclick="checkDataBeforeSave(); return false;" />
				</td>
			</tr>
		</table>
	</td>
</tr>
</table>
<div id="message_box1" style="margin-top:7px; color:#666666; background:#ffffff; margin-top:10px; width:360px; margin-left:20px; display:none; border:1px solid #B3C6D3; ">
	<div style="height:20px;  width:100%; height:30px; background:#EEEFED;  position:relative; ">
		<table width="100%" height="100%">
		<tr>
			<td style="font-weight:bold; text-align:center; color:#666666; padding:3px 3px 3px 3px; font-size:12px;"><div id="titleBox">{$settings.text_input_error|stripslashes|strip_tags}</div></td>
		</tr>
		</table>
	</div>
	<div align="left" id="message_text1" style="text-decoration:none; padding:3px 3px 3px 3px; background:#ffffff;  position:relative; ">
		{if $msg!=""}{$msg}{/if}
		{if $error_login}{$error_login}{/if}
	</div>
</div>
<div id="message_box2" style="margin-top:7px; color:#000000; background:#ffffff; margin-top:10px; width:360px; margin-left:20px; display:none; border:1px solid #000000; background:#000000;">
	<div align="left" id="message_text2" style="text-decoration:none; padding:3px 3px 3px 3px; background:#ffffff;  position:relative; ">
		{if $msg!=""}{$msg}{/if}
		{if $error_login}{$error_login}{/if}
	</div>
</div>
<div id="progress1" style="position:absolute; background:#ECF0FB; margin-top:19px; margin-left:140px; text-align:center; display:none;  z-index:1001;">
	<img src="/images/loading.gif" />
</div>
<script type="text/javascript">

var password_error1   = '{$settings.password_mismatch|stripslashes|strip_tags}';
var password_error2   = '{$settings.password_char_min|stripslashes|strip_tags}';

var password_error3   = '{$settings.incorrect_old_password|stripslashes|strip_tags}';

var changes_saved     = '{$settings.changes_saved|stripslashes|strip_tags}';

</script>
{literal}
<script type="text/javascript">

function checkDataBeforeSave(){

	var msg='';
	
	var old_password    = document.getElementById('old_account_password');
	var new_password    = document.getElementById('new_account_password');
	var new_password_re = document.getElementById('new_account_password_verify');

	if(new_password.value == ''&&new_password_re.value == ''){
		msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+password_error2+"</span><br />";
	} else if(new_password.value!=new_password_re.value){
		msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+password_error1+"</span><br />";
	}  else if(new_password.value==new_password_re.value && new_password.value.length<6){
		msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+password_error2+"</span><br />";
	}
	
	if(msg==''){
		$("#message_box1").fadeOut("slow");
		$("#progress1").show(); 

		var url = "old_password="+old_password.value+"&new_password="+new_password.value; 
		$.ajax({
		type: "POST",
		url: "/myaccount/index/updatepassword",
		data: url,
		success: function(data){
			setTimeout(function () {
				$("#progress1").hide(); 
				if(data=='1'){
					msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+password_error3+"</span><br />";
					$("#message_text1").html(msg);
					$("#message_box1").fadeIn('slow');
					setTimeout(function () { $("#message_box1").fadeOut("slow"); }, 5000);
				} else {
					msg = msg+"<span style='padding:3px 3px 3px 5px; color:green; font-weight:bold; font-size:11px;'>&#9674; "+changes_saved+"</span><br />";
					$("#message_text2").html(msg);
					$("#message_box2").fadeIn('slow');
					document.getElementById('old_account_password').value="";
					document.getElementById('new_account_password').value="";
					document.getElementById('new_account_password_verify').value="";
					setTimeout(function () { $("#message_box2").fadeOut("slow"); }, 5000);
				}
			}, 3000);
		}
		});
	} else {
		$("#message_text1").html(msg);
		$("#message_box1").fadeIn('slow');
		setTimeout(function () { $("#message_box1").fadeOut("slow"); }, 5000);
		
	}
}

</script>
{/literal}
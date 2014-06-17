<table id="contacts" width="400" border="0" style="background:#DBE5EB; border:2px solid #B3C6D3;">
<tr>
	<td width="280">
		<table align="center" border="0">
			<tr>
				<td style="padding:5px 0px 5px 0px; font-size:12px;" class="news_title" nowrap="nowrap">{$settings.firstname|stripslashes|strip_tags} <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" id="member_firstname" name="member_firstname" class="input_edit" value="{$member_info.member_firstname|stripslashes|trim|strip_tags}" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px; font-size:12px;" class="news_title" nowrap="nowrap">{$settings.lastname|stripslashes|strip_tags} <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" id="member_lastname" name="member_lastname" value="{$member_info.member_lastname|stripslashes|trim|strip_tags}"  class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px; font-size:12px;" class="news_title" nowrap="nowrap">{$settings.company|stripslashes|strip_tags} <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" id="member_company" name="member_company" value="{$member_info.member_company|stripslashes|trim|strip_tags}"  class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px; font-size:12px;" class="news_title" nowrap="nowrap">E-mail</td>
				<td style="padding:5px 0px 5px 5px; font-size:12px; font-weight:bold;">{$member_info.member_email|stripslashes|trim|strip_tags}</td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px; font-size:12px;" class="news_title" nowrap="nowrap">{$settings.phone|stripslashes|strip_tags} <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" id="member_phone" name="member_phone" value="{$member_info.member_phone|stripslashes|trim|strip_tags}"  class="input_edit" /></td>
			</tr>
			<tr>
				<td style="padding:5px 0px 5px 0px; font-size:12px;" class="news_title" nowrap="nowrap">{$settings.website|stripslashes|strip_tags} <span style="padding-left:1px;">*</span></td>
				<td style="padding:5px 0px 5px 0px;"><input type="text" id="member_url" name="member_url" value="{$member_info.member_url|stripslashes|trim|strip_tags}"  class="input_edit" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td align="left">
					<input type="image" value="Send Message" src="/images/button_submit_{$lang_info.short_title|strtolower}.jpg" onclick="checkDataBeforeSave2(); return false;" />
				</td>
			</tr>
		</table>
	</td>
</tr>
</table>
<div id="message_box" style="margin-top:7px; color:#666666; background:#ffffff; margin-top:10px; width:360px; margin-left:20px; display:none; border:1px solid #B3C6D3; background:#000000;">
	<div style="height:20px;  width:100%; height:30px; background:#EEEFED;  position:relative; ">
		<table width="100%" height="100%">
		<tr>
			<td style="font-weight:bold; text-align:center; color:#666666; padding:3px 3px 3px 3px; font-size:12px;"><div id="titleBox">{$settings.text_input_error|stripslashes|strip_tags}</div></td>
		</tr>
		</table>
	</div>
	<div align="left" id="message_text" style="text-decoration:none; padding:3px 3px 3px 3px; background:#ffffff;  position:relative; ">
		{if $msg!=""}{$msg}{/if}
		{if $error_login}{$error_login}{/if}
	</div>
</div>
<div id="message_box3" style="margin-top:7px; color:#666666; background:#ffffff; margin-top:10px; width:360px; margin-left:20px; display:none; border:1px solid #B3C6D3;">
	<div align="left" id="message_text3" style="text-decoration:none; padding:3px 3px 3px 3px; background:#ffffff;  position:relative; ">
		{if $msg!=""}{$msg}{/if}
		{if $error_login}{$error_login}{/if}
	</div>
</div>
<div id="progress" style="position:absolute; background:#ECF0FB; margin-top:19px; margin-left:140px; text-align:center; display:none;  z-index:1001;">
	<img src="/images/loading.gif" />
</div>
<script type="text/javascript">

var changes_saved     = '{$settings.changes_saved|stripslashes|strip_tags}';

var firstname_error   = '{$settings.text_firstname_error|stripslashes|strip_tags}';
var lastname_error    = '{$settings.text_lastname_error|stripslashes|strip_tags}';
var company_error     = '{$settings.text_company_error|stripslashes|strip_tags}';
var phone_error       = '{$settings.text_phone_error|stripslashes|strip_tags}';
var url_error         = '{$settings.url_not_correct|stripslashes|strip_tags}';


</script>
{literal}
<script type="text/javascript">

function checkDataBeforeSave2(){

	var msg='';
	
	var member_firstname = document.getElementById('member_firstname');
	var member_lastname  = document.getElementById('member_lastname');
	var member_company   = document.getElementById('member_company');
	var member_phone     = document.getElementById('member_phone');
	var member_url       = document.getElementById('member_url');

	if(member_firstname.value==''){
		msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+firstname_error+"</span><br />";
	}

	if(member_lastname.value==''){
		msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+lastname_error+"</span><br />";
	}

	if(member_company.value==''){
		msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+company_error+"</span><br />";
	}

	if(member_phone.value==''){
		msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+phone_error+"</span><br />";
	}

	if(msg==''){
		$("#message_box").fadeOut("slow");
		$("#progress").show(); 

		var url = "member_firstname="+member_firstname.value+"&member_lastname="+member_lastname.value+"&member_company="+member_company.value+"&member_phone="+member_phone.value+"&member_url="+member_url.value; 
		$.ajax({
		type: "POST",
		url: "/myaccount/index/updateinfo",
		data: url,
		success: function(data){
			setTimeout(function () {
				$("#progress").hide();
				//alert(data); 
				if(data=='1'){
					msg = msg+"<span style='padding:3px 3px 3px 5px; color:black; font-size:11px;'>&#9674; "+password_error3+"</span><br />";
					$("#message_text").html(msg);
					$("#message_box").fadeIn('slow');
					setTimeout(function () { $("#message_box1").fadeOut("slow"); }, 5000);
				} else {
					msg = msg+"<span style='padding:3px 3px 3px 5px; color:green; font-weight:bold; font-size:11px;'>&#9674; "+changes_saved+"</span><br />";
					$("#message_text3").html(msg);
					$("#message_box3").fadeIn('slow');
					setTimeout(function () { $("#message_box3").fadeOut("slow"); }, 5000);
				}
			}, 3000);
		}
		});
	} else {
		$("#message_text").html(msg);
		$("#message_box").fadeIn('slow');
		setTimeout(function () { $("#message_box").fadeOut("slow"); }, 5000);
		
	}
}

</script>
{/literal}
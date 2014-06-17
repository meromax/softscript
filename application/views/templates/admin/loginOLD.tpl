<table width="257" style="background:#c5c5c5;">
<tr>
	<td height="100" width="100%" style="padding:4px 4px 4px 4px; border:0px solid #000000; background:#ffffff;">
		<table cellpadding="0" cellspacing="0" style="background:#DDDDDD;">
			<tr style="background:url(/images/admin/back.jpg) repeat-x;">
				<td class="header" nowrap="nowrap" style="background:url(/images/admin/back.jpg) repeat-x; padding:2px 2px 9px 2px; " >
					<strong style="font-size:15px; color:#ffffff; padding:4px 4px 4px 4px; ">{$adminLangParams.AUTH_LOGIN}</strong>
				</td>
				<td align="right" style="padding:5px 5px 5px 5px;">
<!--					<table cellpadding="0" cellspasing="0">-->
<!--					<tr>-->
<!--						<td>-->
<!--						<form method="post" action="{$request_uri}" name="form_lang">-->
<!--							<select name="admin_lang" id="admin_lang" onchange="javascript:document.forms.form_lang.submit();" style="height:20px; width:100px;">-->
<!--								{foreach from=$languages item=lang}-->
<!--									<option value="{$lang.lang_id}" {if $lang.lang_id==$admin_lang_id} selected {/if} >{$lang.title|stripslashes|strip_tags}</option>-->
<!--								{/foreach}-->
<!--							</select>-->
<!--						</form>	-->
<!--						</td>-->
<!--						<td style="padding-left:5px; *padding-top:2px;" valign="middle">-->
<!--							<img src="/images/flags/{$cur_active_admin_lang.flag_image}" height="18" border="0" />-->
<!--						</td>-->
<!--					</tr>-->
<!--					</table>-->
				</td>
			</tr>
			<form action="/admin" method="post" name="login_form">
			<tr>
				<td class="header" colspan="2" nowrap="nowrap" align="center" style="background:none; padding:2px 2px 9px 2px; " >{section name=warning loop=$WarnMessages}<span style="font-size:12px; color:#ff6666;">- {$WarnMessages[warning]}</span>{/section}</td>
			</tr>
	        <tr>
				<td width="80" nowrap="nowrap" class="header"  style="padding:4px 4px 4px 4px; background:none;">{$adminLangParams.AUTH_EMAIL}</td>
		        <td width="150" style="background:none;">
		          <input name="username" type="text" class="input" id="username" style="background:none; width:180px;" />
		        </td>
			</tr>
			<tr>
				<td nowrap="nowrap" class="header" style="background:none; padding:4px 4px 4px 4px; ">{$adminLangParams.AUTH_PASSWORD}</td>
				<td style="background:none;">
					<input name="pw" type="password" class="input" id="pw" style="background:none; width:180px;" />
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="background:none;"><input  class="input" style="width:150px;" type="submit" name="login" id="login" value="{$adminLangParams.AUTH_LOGIN}" /></td>
			</tr>
			</form>
		</table>
     	
	</td>
</tr>
</table>
{literal}
<script type="text/javascript">
function changeLang(){
	document.location.href="/admin?admin_lang="+$("#admin_lang").val();
}
</script>
{/literal}
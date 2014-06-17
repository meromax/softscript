<br />
<center><span style="font-size:16px;">{$adminLangParams.MEMBERS_HEADER} -> {$adminLangParams.MEMBERS_VIEW}</span></center>
<br />
<table border="0" align="center">
<tr>
	<td align="center"  style="border:2px solid #c5c5c5; padding:10px 10px 10px 10px;">
		<table width="350" border="0" cellspacing="5" cellpadding="5" align="center">
			<tr>
				<td width="80" class="td_right"><strong>{$adminLangParams.MEMBERS_VIEW_FIRST_NAME}:</strong></td>
				<td class="td_left" bgcolor="#ffffff">{$item.member_firstname}</td>
			</tr>
			<tr>
				<td class="td_right"><strong>{$adminLangParams.MEMBERS_VIEW_LAST_NAME}:</strong></td>
				<td class="td_left" bgcolor="#ffffff">{$item.member_lastname}</td>
			</tr>
			<tr>
				<td class="td_right"><strong>{$adminLangParams.MEMBERS_VIEW_COMPANY}:</strong></td>
				<td class="td_left" bgcolor="#ffffff">{$item.member_company}</td>
			</tr>
			<tr>
				<td class="td_right"><strong>{$adminLangParams.MEMBERS_VIEW_EMAIL}:</strong></td>
				<td class="td_left" bgcolor="#ffffff">{$item.member_email}</td>
			</tr>
			<tr>
				<td class="td_right"><strong>{$adminLangParams.MEMBERS_VIEW_PHONE}:</strong></td>
				<td class="td_left" bgcolor="#ffffff">{$item.member_phone}</td>
			</tr>
			<tr>
				<td class="td_right"><strong>{$adminLangParams.MEMBERS_VIEW_WEBSITE}:</strong></td>
				<td class="td_left" bgcolor="#ffffff">{$item.member_url}</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td align="center">
		<input type="button" class="input" value="{$adminLangParams.BUTTON_BACK}" onclick="javascript:document.location.href='/admin/members/page/1';">
	</td>
</tr>
</table>
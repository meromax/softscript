<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$settings.registration_information|stripslashes|strip_tags}</title>
</head>

<body>
<table cellpadding="0" cellspacing="0" width="60%">
<tr>
	<td align="left" width="100" nowrap="nowrap"><b>{$settings.firstname|stripslashes|strip_tags}: </b>{$member.registration_firstname|stripslashes|strip_tags}</td>
</tr>
<tr>
	<td align="left" width="100" nowrap="nowrap"><b>{$settings.lastname|stripslashes|strip_tags}: </b>{$member.registration_lastname|stripslashes|strip_tags}</td>
</tr>
<tr>
	<td align="left" width="100" nowrap="nowrap"><b>{$settings.company|stripslashes|strip_tags}: </b>{$member.registration_company|stripslashes|strip_tags}</td>
</tr>
<tr>
	<td align="left" width="100" nowrap="nowrap"><b>{$settings.phone|stripslashes|strip_tags}: </b>{$member.registration_phone|stripslashes|strip_tags}</td>
</tr>
<tr>
	<td align="left" width="100" nowrap="nowrap"><b>{$settings.website|stripslashes|strip_tags}: </b>{$member.registration_url|stripslashes}</td>
</tr>
<tr>
	<td align="left" width="100" nowrap="nowrap"><b>E-mail: </b>{$member.registration_email|stripslashes|strip_tags}</td>
</tr>
{if $user_mail==1}
<tr>
	<td align="left" width="100" nowrap="nowrap"><b>{$settings.password|stripslashes|strip_tags}: </b>{$member.registration_password}</td>
</tr>
{/if}
</table>
</body>
</html>

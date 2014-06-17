<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$frontendLangParams.TITLE__REGISTRATION_INFORMATION}</title>
</head>

<body>
<table cellpadding="0" cellspacing="0">
<tr>
	<td align="left" nowrap="nowrap" align="center"><b>{$frontendLangParams.TITLE__HELLO} {$user.reg_name|stripslashes|strip_tags}!</td>
</tr>
<tr>
	<td align="left" nowrap="nowrap"><b>{$frontendLangParams.TITLE__YOUR} E-mail:</b>{$user.reg_email|stripslashes|strip_tags}</td>
</tr>
<tr>
	<td align="left" nowrap="nowrap"><b>{$frontendLangParams.TITLE__YOUR} {$frontendLangParams.TITLE__PASSWORD}:</b>{$user.reg_password|stripslashes|strip_tags}</td>
</tr>
</table>
</body>
</html>

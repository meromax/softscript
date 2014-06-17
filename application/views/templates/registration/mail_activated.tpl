<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$_ActivationMailTitle.title}</title>
</head>

<body>
<table cellpadding="0" cellspacing="0" width="60%">
<tr>
	<td align="left" width="100"><b>{$_FirstName.title}: </b>{$firstname|stripslashes}</td>
</tr>
<tr>
	<td align="left"><b>{$_LastName.title}: </b>{$lastname|stripslashes}</td>
</tr>
<tr>
	<td align="left"><b>{$_Description.title}:</b></td>
</tr>
<tr>
	<td align="left" align="left">{$description|stripslashes}<br /><br /></td>
</tr>

<tr>
	<td align="left"><b>{$_Email.title}: </b>{$email}</td>
</tr>

<tr>
	<td align="left"><b>{$_Username.title}: </b>{$screenname|stripslashes}</td>
</tr>

<tr>
	<td align="left" align="center" style="border:2px solid #b2b2b2; padding:10px 10px 10px 10px;">
		{$_ActivationMailLink.title} <a href="{$link}">{$link}</a>.
	</td>
</tr>

</tr>
</table>
</body>
</html>

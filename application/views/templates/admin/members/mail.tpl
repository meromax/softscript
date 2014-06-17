<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$_ActivationMailTitle.title}</title>
</head>

<body>
<table cellpadding="0" cellspacing="0" width="60%">
<tr>
	<td align="left" valign="top">
		Hello {$firstname} {$lastname}<br />
		Thank you for registration at FocusPDM.com.<br /><br />Your account is now active.<br />
	</td>
</tr>
<tr>
	<td align="left"><b>First Name:</b> {$firstname}</td>
</tr>
<tr>
	<td align="left"><b>Last Name:</b> {$lastname}</td>
</tr>
<tr>
	<td align="left"><b>Company:</b> {$company}</td>
</tr>
<tr>
	<td align="left"><b>Email:</b> {$email}</td>
</tr>
{if $password}
<tr>
	<td align="left"><b>Password:</b> {$password}</td>
</tr>
{/if}
<tr>
	<td align="left"><b>Addres:</b> {$address}</td>
</tr>
<tr>
	<td align="left"><b>City:</b> {$city}</td>
</tr>
<tr>
	<td align="left"><b>State:</b> {$state}</td>
</tr>
<tr>
	<td align="left"><b>Zip:</b> {$zip}</td>
</tr>
{if $office}
<tr>
	<td align="left"><b>Office:</b> {$office}</td>
</tr>
{/if}
{if $cell}
<tr>
	<td align="left"><b>Cell:</b> {$cell}</td>
</tr>
{/if}
{if $fax}
<tr>
	<td align="left"><b>Fax:</b> {$fax}</td>
</tr>
{/if}
</table>
</body>
</html>

<h2>Login</h2>
{if $error_login}
<center style="color:red;">
({$error_login})
</center>
{/if}
<br />
<table height="250" align="center">
<tr>
	<td align="center" valign="top" height="250">
		<div align="center">
			<form action="/login" method="POST">
				{include file='login/login_form.tpl'}
			</form>
		</div>
	</td>
</tr>
</table>
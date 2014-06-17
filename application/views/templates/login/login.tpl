{if !$memberEmailLogined}
<form action="/login" method="POST">
<div class="blue-block">
	<div class="inner">
		<h2>{$_UserLogin.title}1</h2>
		<span class="right-text">{$_Email.title}:*</span>
		<div class="bg-input"><input type="text" name="email" /></div>
		<span class="right-text">{$_Password.title}:*</span>
		<div class="bg-input"><input name="password" type="password"  /></div>
		<table width="100%">
		<tr>
			<td align="right">
				<input type="submit" value="{$_SignIn.title}">
			</td>
		</tr>
		<tr>
			<td align="left">
				<a href="/login/forgotpass" style="text-decoration:underline;" title="">{$_ForgotYourPassword.title}</a><br />
				<a href="/registration.html" style="text-decoration:underline;" title="">{$_SignUp.title}</a>
			</td>
		</tr>
		</table>
		
	</div>
</div>
</form>
{/if}
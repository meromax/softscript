<div class="news-short-area">
	<form action="/login/forgotpass" class="form" method="post">
	<input type="hidden" name="check_button_press" id="check_button_press" value="">
	<table height="235" width="100%" align="center">
	<tr>
		<td valign="top" style="padding-left:110px;">
			<table cellpadding="1" cellspacing="1" border="0" align="center">
			<tr>
				<td colspan="2" align="center" style="padding-bottom:10px;">
				<div {if $msg} style="display:block; padding:5px 5px 5px 5px; border: 1px solid red; " {else} style="display:none;" {/if}>
					{$msg}
				</div>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td align="left" nowrap="nowrap"  style="padding-left:6px; color:#0172BA;">{$_PasswordRecoveryEmail.title}<sup style="color:#9b321d">*</sup>:</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td nowrap="nowrap" align="left" style="padding-left:6px;">
					<div class="blue-block2">
					   	<div {if !$error_email} class="bg-input2" {else} class="bg-input3" {/if} align="center">
							<input name="email"  type="text" title="" />
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td align="left">
					<span style="padding-left:6px; color:#0172BA;">{$_ConfirmCapchaCode.title}</span><sup style="color:#9b321d">*</sup>:
				</td>
			</tr>
			<tr>
				<td align="right"><img style="padding-left:6px; padding-bottom:2px;" align="absmiddle" src="/login/index/showCaption"></td>
				<td align="left"  style="padding-left:6px;">
					<div class="blue-block2">
				    	<div {if !$error_code} class="bg-input2" {else} class="bg-input3" {/if} align="center">
							<input class="inputs" type="text" name='code' />
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right" style="padding-right:2px;">
					<br />
					<input type="submit" value="{$_Ready.title}" onclick="SetCheckButtonPress()" />
					<input type="button" value="{$_Cancel.title}" onclick="document.location.href='/'" />
				</td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
	</form>
</div>
{literal}
<script type="text/javascript">

function SetCheckButtonPress(){
	document.getElementById("check_button_press").value=1;
}
</script>
{/literal}
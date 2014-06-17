<h2>QUICK ACCOUNT SETUP</h2>
<br /><br /><br />
<form method="post" action="/registration/index/validate">
	<input type="hidden" name="check_button_press" id="check_button_press" value="">
	<table border="0" align="center">
	<tr>
		<td align="right">
			<table width="400" border="0" cellspacing="0" cellpadding="4" align="center">
				<tr>
					<td width="126" class="td_right"><strong>First Name<sup style="color:#9b321d">*</sup>:</strong></td>
					<td width="258" class="td_left"><input {if $error_firstname} style="border:1px solid red; " {/if} name="first_name" id="first_name" type="text" class="inp" value="{$reg_info.member_firstname}" /></td>
				</tr>
				<tr>
					<td class="td_right"><strong>Last Name<sup style="color:#9b321d">*</sup>:</strong></td>
		
					<td class="td_left"><input {if $error_lastname} style="border:1px solid red; " {/if} name="last_name" id="last_name" type="text" class="inp" value="{$reg_info.member_lastname}" /></td>
				</tr>
				<tr>
					<td class="td_right"><strong>Company<sup style="color:#9b321d">*</sup>:</strong></td>
					<td class="td_left"><input {if $error_company} style="border:1px solid red; " {/if} name="company" id="company" type="text" class="inp" value="{$reg_info.member_company}" /></td>
				</tr>
				<tr>
						<td class="td_right"><strong>E-mail<sup style="color:#9b321d">*</sup>:</strong></td>
		
						<td class="td_left"><input {if $error_email} style="border:1px solid red; " {/if} name="email" id="email" type="text" class="inp" value="{$reg_info.member_email}" /></td>
				</tr>
				<tr>
						<td class="td_right"><strong>Confirm E-mail<sup style="color:#9b321d">*</sup>:</strong></td>
						<td class="td_left"><input {if $error_email} style="border:1px solid red; " {/if} name="confirm_email" id="confirm_email" type="text" class="inp" {if !$error_email} value="{$reg_info.member_email}" {/if} /></td>
				</tr>
				<tr>
						<td class="td_right"><strong>Password<sup style="color:#9b321d">*</sup>:</strong></td>
		
						<td class="td_left"><input {if $error_password} style="border:1px solid red; " {/if} name="password" id="password" type="password" class="inp" /></td>
				</tr>
				<tr>
						<td class="td_right"><strong>Confirm Password<sup style="color:#9b321d">*</sup>:</strong></td>
						<td class="td_left"><input {if $error_password} style="border:1px solid red; " {/if} name="confirm_password" id="confirm_password" type="password" class="inp" /></td>
				</tr>
				<tr>
						<td class="td_right"><strong>Address<sup style="color:#9b321d">*</sup>:</strong></td>
		
						<td class="td_left"><input {if $error_address} style="border:1px solid red; " {/if} name="address" id="address" type="text" class="inp" value="{$reg_info.member_address}" /></td>
				</tr>
				<tr>
						<td class="td_right"><strong>City<sup style="color:#9b321d">*</sup>:</strong></td>
						<td class="td_left"><input {if $error_city} style="border:1px solid red; " {/if} name="city" id="city" type="text" class="inp" value="{$reg_info.member_city}" /></td>
				</tr>
				<tr>
						<td class="td_right"><strong>State<sup style="color:#9b321d">*</sup>:</strong></td>
		
						<td class="td_left">
							<select {if $error_state} style="border:1px solid red; width:224px; " {else} style="width:224px;" {/if} name="state" id="state" type="text" class="inp" value="{$reg_info.member_state}">
							 
							<option value="" selected> ---------- </option> 
							
							<option value="AL" {if $reg_info.member_state=="AL"} selected {/if}>Alabama</option> 
							
							<option value="AK" {if $reg_info.member_state=="AK"} selected {/if}>Alaska</option> 
							
							<option value="AZ" {if $reg_info.member_state=="AZ"} selected {/if}>Arizona</option> 
							
							<option value="AR" {if $reg_info.member_state=="AR"} selected {/if}>Arkansas</option> 
							
							<option value="CA" {if $reg_info.member_state=="CA"} selected {/if}>California</option> 
							
							<option value="CO" {if $reg_info.member_state=="CO"} selected {/if}>Colorado</option> 
							
							<option value="CT" {if $reg_info.member_state=="CT"} selected {/if}>Connecticut</option> 
							
							<option value="DE" {if $reg_info.member_state=="DE"} selected {/if}>Delaware</option> 
							
							<option value="DC" {if $reg_info.member_state=="DC"} selected {/if}>District Of Columbia</option> 
							
							<option value="FL" {if $reg_info.member_state=="FL"} selected {/if}>Florida</option> 
							
							
							<option value="GA" {if $reg_info.member_state=="GA"} selected {/if}>Georgia</option> 
							
							<option value="HI" {if $reg_info.member_state=="HI"} selected {/if}>Hawaii</option> 
							
							<option value="ID" {if $reg_info.member_state=="ID"} selected {/if}>Idaho</option> 
							
							<option value="IL" {if $reg_info.member_state=="IL"} selected {/if}>Illinois</option> 
							
							<option value="IN" {if $reg_info.member_state=="IN"} selected {/if}>Indiana</option> 
							
							<option value="IA" {if $reg_info.member_state=="IA"} selected {/if}>Iowa</option> 
							
							<option value="KS" {if $reg_info.member_state=="KS"} selected {/if}>Kansas</option> 
							
							<option value="KY" {if $reg_info.member_state=="KY"} selected {/if}>Kentucky</option> 
							
							<option value="LA" {if $reg_info.member_state=="LA"} selected {/if}>Louisiana</option> 
							
							<option value="ME" {if $reg_info.member_state=="ME"} selected {/if}>Maine</option> 
							
							
							<option value="MD" {if $reg_info.member_state=="MD"} selected {/if}>Maryland</option> 
							
							<option value="MA" {if $reg_info.member_state=="MA"} selected {/if}>Massachusetts</option> 
							
							<option value="MI" {if $reg_info.member_state=="MI"} selected {/if}>Michigan</option> 
							
							<option value="MN" {if $reg_info.member_state=="MN"} selected {/if}>Minnesota</option> 
							
							<option value="MS" {if $reg_info.member_state=="MS"} selected {/if}>Mississippi</option> 
							
							<option value="MO" {if $reg_info.member_state=="MO"} selected {/if}>Missouri</option> 
							
							<option value="MT" {if $reg_info.member_state=="MT"} selected {/if}>Montana</option> 
							
							<option value="NE" {if $reg_info.member_state=="NE"} selected {/if}>Nebraska</option> 
							
							<option value="NV" {if $reg_info.member_state=="NV"} selected {/if}>Nevada</option> 
							
							<option value="NH" {if $reg_info.member_state=="NH"} selected {/if}>New Hampshire</option> 
							
							
							<option value="NJ" {if $reg_info.member_state=="NJ"} selected {/if}>New Jersey</option> 
							
							<option value="NM" {if $reg_info.member_state=="NM"} selected {/if}>New Mexico</option> 
							
							<option value="NY" {if $reg_info.member_state=="NY"} selected {/if}>New York</option> 
							
							<option value="NC" {if $reg_info.member_state=="NC"} selected {/if}>North Carolina</option> 
							
							<option value="ND" {if $reg_info.member_state=="ND"} selected {/if}>North Dakota</option> 
							
							<option value="OH" {if $reg_info.member_state=="OH"} selected {/if}>Ohio</option> 
							
							<option value="OK" {if $reg_info.member_state=="OK"} selected {/if}>Oklahoma</option> 
							
							<option value="OR" {if $reg_info.member_state=="OR"} selected {/if}>Oregon</option> 
							
							<option value="PA" {if $reg_info.member_state=="PA"} selected {/if}>Pennsylvania</option> 
							
							<option value="RI" {if $reg_info.member_state=="RI"} selected {/if}>Rhode Island</option> 
							
							<option value="SC" {if $reg_info.member_state=="SC"} selected {/if}>South Carolina</option> 
							
							<option value="SD" {if $reg_info.member_state=="SD"} selected {/if}>South Dakota</option> 
							
							<option value="TN" {if $reg_info.member_state=="TN"} selected {/if}>Tennessee</option> 
							
							<option value="TX" {if $reg_info.member_state=="TX"} selected {/if}>Texas</option> 
							
							<option value="UT" {if $reg_info.member_state=="UT"} selected {/if}>Utah</option> 
							
							<option value="VT" {if $reg_info.member_state=="VT"} selected {/if}>Vermont</option> 
							
							<option value="VA" {if $reg_info.member_state=="VA"} selected {/if}>Virginia</option> 
							
							<option value="WA" {if $reg_info.member_state=="WA"} selected {/if}>Washington</option> 
							
							<option value="WV" {if $reg_info.member_state=="WV"} selected {/if}>West Virginia</option> 
							
							<option value="WI" {if $reg_info.member_state=="WI"} selected {/if}>Wisconsin</option> 
							
							<option value="WY" {if $reg_info.member_state=="WY"} selected {/if}>Wyoming</option>
							
							</select>
						</td>
				</tr>
				<tr>
						<td class="td_right"><strong>Zip<sup style="color:#9b321d">*</sup>:</strong></td>
						<td class="td_left"><input {if $error_zip} style="border:1px solid red; " {/if} name="zip" id="zip" type="text" class="inp1" value="{$reg_info.member_zip}" /></td>
				</tr>
				<tr>
						<td class="td_right"><strong>Office:</strong></td>
		
						<td class="td_left"><input name="office" id="office" type="text" class="inp1" value="{$reg_info.member_office}" /></td>
				</tr>
				<tr>
						<td class="td_right"><strong>Cell:</strong></td>
						<td class="td_left"><input name="cell" id="cell" type="text" class="inp1" value="{$reg_info.member_cell}" /></td>
				</tr>
				<tr>
						<td class="td_right"><strong>Fax:</strong></td>
		
						<td class="td_left"><input name="fax" id="fax" type="text" class="inp1" value="{$reg_info.member_fax}" /></td>
				</tr>
				<tr>
						<td class="td_right">
							<img style="padding-left:6px; padding-bottom:2px;" align="absmiddle" src="/registration/index/showCaption">
						</td>
		
						<td class="td_left" nowrap="nowrap">
							<strong>Input spamcode<sup style="color:#9b321d">*</sup>:</strong> <input {if $error_password} style="border:1px solid red; " {/if} class="inp1" type="text" name='code' />
						</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="td_left"><input name="" type="image" src="/images/btn_submit.jpg" onclick="SetCheckButtonPress()" /></td>
				</tr>
			</table>
		</td>
		<td align="left" valign="top">
			<div id="message_box" style="left:20px; color:#000000; top:220px; background:#ffffff; width:230px; display:none; border:1px solid #000000; background:#000000;">
				<div style="height:20px;  width:100%; height:30px; background:url(/images/back_menu.jpg);  position:relative; ">
					<table width="100%" height="100%">
					<tr>
						<td style="font-weight:bold; color:#ffffff; padding:3px 3px 3px 3px; font-size:14px;" align="left" valign="middle"><!--<div id="titleBox">-->The Message Box<!--</div>--></td>
					</tr>
					</table>
				</div>
				<div align="left" id="message_text" style="text-decoration:none; padding:3px 3px 3px 3px; background:#ffffff;  position:relative; ">
					{if $msg!=""}{$msg}{/if}
				</div>
			</div>
		</td>
	</tr>
	</table>
	</form>


{literal}
<script type="text/javascript">

function SetCheckButtonPress(){
	document.getElementById("check_button_press").value=1;
}
</script>

{/literal}

{if $msg!=""}
	{literal}
		<script type="text/javascript">
			$("#message_box").show({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
		</script>
	{/literal}
{/if}
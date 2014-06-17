<table border="1" align="center">
<tr><td align="center" colspan="2"><h3><b>Registration</b></h3></td></tr>
<tr>
	<td>
		<b style="padding-left:6px; color:#525252;">First Name<sup style="color:#9b321d">*</sup>:</b>
	</td>
	<td>
		<input type="text" name="firstname" id="firstname" value="{$smarty.post.firstname}" style="border:1px solid #dddddd; margin:0 0 0 5px;"/>
	</td>
</tr>

<tr>
	<td>
		<b style="padding-left:6px; color:#525252;">Last Name<sup style="color:#9b321d">*</sup>:</b>
	</td>
	<td>
		<input type="text" name="lastname" id="lastname" value="{$smarty.post.lastname}" style="border:1px solid #dddddd; margin:0 0 0 5px;"/>
	</td>
</tr>

<tr>
	<td>
		<b style="padding-left:6px; color:#525252;">Address<sup style="color:#9b321d">*</sup>:</b>
	</td>
	<td>
		<input type="text" name="address" id="address" value="{$smarty.post.address}" style="border:1px solid #dddddd; margin:0 0 0 5px;"/>
	</td>
</tr>

<tr>
	<td>
		<b style="padding-left:6px; color:#525252;">City<sup style="color:#9b321d">*</sup>:</b>
	</td>
	<td>
		<input type="text" name="city" id="city" value="{$smarty.post.city}" style="border:1px solid #dddddd; margin:0 0 0 5px;"/>
	</td>
</tr>

<tr>
	<td>
		<b style="padding-left:6px; color:#525252;">State<sup style="color:#9b321d">*</sup>:</b>
	</td>
	<td>
		{include file='registration/state.tpl'}
	</td>
</tr>

<tr>
	<td>
		<b style="padding-left:6px; color:#525252;">Zip Code<sup style="color:#9b321d">*</sup>:</b>
	</td>
	<td>
		<input type="text" name="zip" id="zip" value="{$smarty.post.zip}" style="border:1px solid #dddddd; margin:0 0 0 5px;"/>
	</td>
</tr>

<tr>
	<td>
		<b style="padding-left:6px; color:#525252;">Email Address<sup style="color:#9b321d">*</sup>:</b>
	</td>
	<td>
		<input type="text" name="email" id="email" value="{$smarty.post.email}" style="border:1px solid #dddddd; margin:0 0 0 5px;"/>
	</td>
</tr>

<tr>
	<td align="right">
		<b style="padding-left:6px; color:#525252;">Credit Card Number:<sup style="color:#9b321d">*</sup>:</b>
	</td>
	<td align="left"> 
		<input type="text" class="input_font" name="credit_card_number" id="credit_card_number" value="$smarty.post.credit_card_number}"  style="border:1px solid #dddddd; margin:0 0 0 5px;" />
	</td>
</tr>

<tr>
	<td align="right">
		<b style="padding-left:6px; color:#525252;">CVV2:<sup style="color:#9b321d">*</sup>:</b>
	</td>
	<td align="left"> 
		<input type="text" class="input_font" name="cvv2" id="cvv2" value="$smarty.post.cvv2}"  style="border:1px solid #dddddd; margin:0 0 0 5px;" />
	</td>
</tr>

</table>
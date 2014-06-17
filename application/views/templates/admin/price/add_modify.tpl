<br />
<center><span style="font-size:16px;">{$adminLangParams.PRICE_HEADER} -> {if $action == 'modifyprice'}{$adminLangParams.PRICE_MODIFY}{else}{$adminLangParams.PRICE_ADD}{/if}</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/price/{$action}" name="price_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			{if $price.id}
				<input type="hidden" name="price_id" value="{$price.id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modifyprice'}{$adminLangParams.PRICE_MODIFY}{else}{$adminLangParams.PRICE_ADD}{/if}</b></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.PRICE_POSITION}:</td>
					<td><input type="text" id="position" class="input" style="width:40px;" name="position" value="{if $price.position==""}0{else}{$price.position}{/if}"></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.PRICE_CURRENCY_HEADER}:</td>
					<td>
						<select class="input" name="currency" id="currency" style="width:100px;">
						<option value="0" {if $price.currency==0}selected{/if}>{$adminLangParams.PRICE_CURRENCY1}</option>
						<option value="1" {if $price.currency==1}selected{/if}>{$adminLangParams.PRICE_CURRENCY2}</option>
						</select>
					</td>
				</tr>	
				<tr>
					<td class="header" width="100px">{$adminLangParams.PRICE_PRICE}:</td>
					<td><input type="text" id="price" class="input" style="width:250px;" name="price" value="{$price.price}"></td>
				</tr>
				<tr>
					<td class="header">{$adminLangParams.PRICE_DESCRIPTION}:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description">{$price.description|stripslashes}</textarea>
					</td>
				</tr>				
				
				{if $price.image!=""}
				<tr>
					<td class="header" width="100px">{$adminLangParams.PRICE_IMAGE}:</td>
					<td align="left" style="padding-left:6px;"><img style="border:1px solid #b2b2b2;" align="left" src="/images/price/{$price.image}_small.jpg?time={$smarty.now}" alt="" title=""></td>
				</tr>
				{/if}
				<tr>
					<td class="header" width="100px">{$adminLangParams.PRICE_UPLOAD_IMAGE}:</td>
					<td><input type="file" size="103" style="*width:600px;" class="input" id="upload_id" name="image"></td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center"><input type="button" class="input" value="{$adminLangParams.BUTTON_SAVE}" {if $action!='modifyprice'} onclick="checkForm('')" {else} onclick="checkForm('modify')" {/if}>&nbsp;<input type="button" class="input" value="{$adminLangParams.BUTTON_CANCEL}" onclick="document.location='/admin/price/index/page/1'"></td>
				</tr>
			</table>
		</form>
		<script>
			var oFCKeditor = new FCKeditor('description', 800, 300) ;
			//oFCKeditor.ToolbarSet = 'Basic' ;
			oFCKeditor.ReplaceTextarea();
		</script>
	</td>
</tr>
</table>
{literal}

<script type="text/javascript">
    
function checkForm(type){
	var position = document.getElementById("position").value;
	var price = document.getElementById("price").value;
	var ChekStr = document.getElementById('upload_id').value;
	
	if(type==''){
		if (position == '') {
			alert('You must fill the position field.');
		} else if (price == '') {
			alert('You must fill the price field.');
		} else {
			document.forms.price_form.submit();
		}
	} else {
		if (position == '') {
			alert('You must fill the position field.');
		} else if (price == '') {
			alert('You must fill the price field.');
		} else {
			document.forms.price_form.submit();
		}
	}
}
</script>
{/literal}
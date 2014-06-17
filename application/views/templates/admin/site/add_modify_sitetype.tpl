<br />
<center><span style="font-size:16px;">{$adminLangParams.SITETYPES_HEADER} -> {if $action == 'modifysitetype'}{$adminLangParams.SITETYPES_MODIFY_SITE_TYPE}{else}{$adminLangParams.SITETYPES_ADD_SITE_TYPE}{/if}</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/site/{$action}" name="sitetype_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			{if $item.id}
				<input type="hidden" name="sitetype_id" value="{$item.id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modifysitetype'}{$adminLangParams.SITETYPES_MODIFY_SITE_TYPE}{else}{$adminLangParams.SITETYPES_ADD_SITE_TYPE}{/if}</b></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.SITETYPES_TITLE}:</td>
					<td><input type="text" class="input" style="width:800px;" maxlength="255" name="title" id="title" value="{$item.title|stripslashes}"></td>
				</tr>
				<tr>
					<td class="header">{$adminLangParams.SITETYPES_DESCRIPTION}:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description">{$item.description|stripslashes}</textarea>
					</td>
				</tr>		
				<tr>
					<td class="header" width="100px">{$adminLangParams.SITETYPES_PRICE}:</td>
					<td><input type="text" class="input" style="width:70px;" maxlength="9" name="price" id="price" value='{$item.price|number_format:2:".":""}'></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.SITETYPES_POSITION}:</td>
					<td><input type="text" class="input" style="width:40px;" maxlength="4" name="position" id="position" value="{$item.position}"></td>
				</tr>		
				<tr>
					<td colspan="2" class="header" align="center">
						<input type="button" class="input" value="{$adminLangParams.BUTTON_SAVE}" onclick="checkForm()">&nbsp;<input type="button" class="input" value="{$adminLangParams.BUTTON_CANCEL}" onclick="document.location='/admin/site/types/page/1'">
					</td>
				</tr>
			</table>
		</form>
		<script>
			var oFCKeditor = new FCKeditor('description', 800, 300) ;
			oFCKeditor.ToolbarSet = 'Basic' ;
			oFCKeditor.ReplaceTextarea();
		</script>
	</td>
</tr>
</table>
{literal}

<script type="text/javascript">
    
function checkForm(){
	var title    = document.getElementById('title').value;
	var price    = document.getElementById('price').value;
	var position = document.getElementById('position').value;
	

	if (title == '') {
		alert('You should fill the title field.');
	} else if(price=='') {
		alert('You should fill the price field.');
	} else if(position=='') {
		alert('You should fill the position field.');
	} else {
		document.forms.sitetype_form.submit();
	}
}
</script>
{/literal}
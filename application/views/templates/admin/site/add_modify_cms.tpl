<br />
<center><span style="font-size:16px;">{$adminLangParams.CMS_HEADER} -> {if $action == 'modifycms'}{$adminLangParams.CMS_MODIFY_CMS}{else}{$adminLangParams.CMS_ADD_CMS}{/if}</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/site/{$action}" name="sitetype_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			{if $item.id}
				<input type="hidden" name="cms_id" value="{$item.id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modifycms'}{$adminLangParams.CMS_MODIFY_CMS}{else}{$adminLangParams.CMS_ADD_CMS}{/if}</b></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.CMS_TITLE}:</td>
					<td><input type="text" class="input" style="width:800px;" maxlength="255" name="title" id="title" value="{$item.title|stripslashes}"></td>
				</tr>
				<tr>
					<td class="header">{$adminLangParams.CMS_DESCRIPTION}:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description">{$item.description|stripslashes}</textarea>
					</td>
				</tr>
								
				<tr>
					<td class="header" width="100px">{$adminLangParams.CMS_SYTE_TYPES}:</td>
					<td style="padding-left:6px;">
						<select name="sitetypes[]" id="sitetypes" multiple="multiple" style="padding:2px 2px 2px 2px; height:160px; width:400px;" >
						{foreach from=$sitetypes item=st_item}
							<option value="{$st_item.id}" {foreach from=$site_types_selected item=item_sel} {if $st_item.id==$item_sel.sitetype_id} selected {/if} {/foreach}>{$st_item.title|stripslashes|strip_tags}</option>
						{/foreach}
						</select>
					</td>
				</tr>
					
				<tr>
					<td class="header" width="100px">{$adminLangParams.CMS_PRICE}:</td>
					<td><input type="text" class="input" style="width:70px;" maxlength="9" name="price" id="price" value='{$item.price|number_format:2:".":""}'></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.CMS_POSITION}:</td>
					<td><input type="text" class="input" style="width:40px;" maxlength="4" name="position" id="position" value="{if $item.position!=''}{$item.position}{else}0{/if}"></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.CMS_UPLOAD_CMS}:</td>
					<td><input type="file" size="103" style="*width:600px;" class="input" id="file" name="file"></td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center">
						<input type="button" class="input" value="{$adminLangParams.BUTTON_SAVE}" onclick="checkForm()">&nbsp;
						<input type="button" class="input" value="{$adminLangParams.BUTTON_CANCEL}" onclick="document.location='/admin/site/cms/sitetype/0/page/1'">
					</td>
				</tr>
			</table>
		</form>
		<script>
			var oFCKeditor = new FCKeditor('description', 800, 200) ;
			oFCKeditor.ToolbarSet = 'Basic' ;
			oFCKeditor.ReplaceTextarea();
		</script>
	</td>
</tr>
</table>
{literal}

<script type="text/javascript">
    
function checkForm(){
	var title     = document.getElementById('title').value;
	var price     = document.getElementById('price').value;
	var position  = document.getElementById('position').value;
	var sitetypes = document.getElementById('sitetypes').value;

	if (title == '') {
		alert('You should fill the title field.');
	} else if(sitetypes=='') {
		alert('Please choose site type.');
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
<br />
<center><span style="font-size:16px;">{$adminLangParams.SECTIONS_HEADER} -> {if $action == 'modifysection'}{$adminLangParams.SECTIONS_MODIFY}{else}{$adminLangParams.SECTIONS_ADD}{/if}</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/sections/{$action}" name="section_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			{if $item.id}
				<input type="hidden" name="id" value="{$item.id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modifysection'}{$adminLangParams.SECTIONS_MODIFY}{else}{$adminLangParams.SECTIONS_ADD}{/if}</b></td>
				</tr>
				<tr>
					<td class="header" width="100px" style="padding:5px 5px 5px 5px;">{$adminLangParams.SECTIONS_LINK}:</td>
					<td><input type="text" id="link" class="input" style="width:800px;" name="link" value="{$item.link}"></td>
				</tr>				
				<tr>
					<td class="header" width="100px" style="padding:5px 5px 5px 5px;">{$adminLangParams.SECTIONS_TITLE}:</td>
					<td><input type="text" id="title" class="input" style="width:800px;" name="title" value="{$item.title|stripslashes}"></td>
				</tr>
				<tr>
					<td class="header" style="padding:5px 5px 5px 5px;">{$adminLangParams.SECTIONS_DESCRIPTION}:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description">{$item.description|stripslashes}</textarea>
					</td>
				</tr>
				<tr>
					<td class="header" width="100px" style="padding:5px 5px 5px 5px;">{$adminLangParams.TITLE__SECTION_TYPE}:</td>
					<td>
						<select class="input" name="section_type">
						<option value="0" {if $item.type==0}selected{/if}> ------- </option>
						<option value="1" {if $item.type==1}selected{/if}> {$adminLangParams.TITLE__SECTION_TYPE_MENU} </option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="header" width="100px" style="padding:5px 5px 5px 5px;">{$adminLangParams.TITLE_POSITION}:</td>
					<td><input type="text" id="position" class="input" style="width:40px;" maxlength="3" name="position" value="{$item.position|stripslashes}"></td>
				</tr>	
				<tr>
					<td colspan="2" align="center">
						{include file='admin/sections/meta.tpl'}
					</td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center">
						<input type="button" class="input" value="{$adminLangParams.BUTTON_SAVE}" onclick="checkForm();">&nbsp;
						<input type="button" class="input" value="{$adminLangParams.BUTTON_CANCEL}" onclick="document.location='/admin/sections/index/page/1'">
					</td>
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
    
function checkForm(){
	var title = document.getElementById('title').value;

	if (title == '') {
		alert('You should fill the title field.');
	} else {
		document.forms.section_form.submit();
	}
}
</script>
{/literal}
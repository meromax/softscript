<br />
<center><span style="font-size:16px;">Faq -> Sections -> {if $action == 'modifysection'}Modify{else}Add{/if} Section</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/faq/{$action}" name="section_form">
			<input type="hidden" name="step" value="2">
			{if $item.id}
				<input type="hidden" name="id" value="{$item.id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modifysection'}Modify{else}Add{/if} Section</b></td>
				</tr>
				<tr>
					<td class="header" width="100px">Title:</td>
					<td><input type="text" id="title" class="input" style="width:800px;" name="title" value="{$item.title|stripslashes}"></td>
				</tr>
				<tr>
					<td class="header">Description:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description">{$item.description|stripslashes}</textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center">
						<input type="button" class="input" value="save" onclick="checkForm();">&nbsp;
						<input type="button" class="input" value="cancel" onclick="document.location='/admin/faq/sections/page/1'">
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
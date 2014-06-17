<br />
<center><span style="font-size:16px;">Catalog</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/links/{$action}" name="links_form">
			<input type="hidden" name="step" value="2">
			{if $link.id}
				<input type="hidden" name="id" value="{$link.id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modify'}Modify{else}Add{/if} Link</b></td>
				</tr>
				<tr>
					<td class="header" width="100px">Title:</td>
					<td><input type="text" id="title" class="input" style="width:800px;" name="title" value="{$link.title|stripslashes}"></td>
				</tr>
				<tr>
					<td class="header">Description:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description">{$link.description|stripslashes}</textarea>
					</td>
				</tr>
				<tr>
					<td class="header" width="100px">URL:</td>
					<td><input type="text" id="url" class="input" style="width:800px;" name="url" value="{$link.url|stripslashes}"></td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center">
						<input type="button" class="input" value="save" onclick="checkForm();">&nbsp;
						<input type="button" class="input" value="cancel" onclick="document.location='/admin/links/page/1'">
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
	var url   = document.getElementById('url').value;

	if (title == '') {
		alert('You should fill the title field.');
	} else if(url=='') {
		alert('You should fill the url field.');
	} else {
		document.forms.links_form.submit();
	}
}
</script>
{/literal}
<br />
<center><span style="font-size:16px;">Форум -> {if $action == 'modifyforum'}Изменение{else}Добавление{/if}</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/forum/{$action}" name="forum_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			{if $item.id}
				<input type="hidden" name="id" value="{$item.id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modifyforum'}Изменить{else}Добавить{/if}</b></td>
				</tr>

				<tr>
					<td class="header" width="100px" style="padding:5px 5px 5px 5px;">{$adminLangParams.SECTIONS_TITLE}:</td>
					<td><input type="text" id="title" class="input" style="width:800px;" name="title" value="{$item.title|stripslashes}"></td>
				</tr>
                <tr>
                    <td class="header" style="padding:5px 5px 5px 5px;">Короткое описание:</td>
                    <td style="padding-left:6px;">
                        <textarea name="description_short" id="description_short">{$item.description_short|stripslashes}</textarea>
                    </td>
                </tr>
				<tr>
					<td class="header" style="padding:5px 5px 5px 5px;">{$adminLangParams.SECTIONS_DESCRIPTION}:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description">{$item.description|stripslashes}</textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						{include file='admin/forum/meta.tpl'}
					</td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center">
                        <input type="hidden" name="section_type" value="1" />
                        <input type="hidden" name="template" value="0" />
						<input type="button" class="input" value="{$adminLangParams.BUTTON_SAVE}" onclick="checkForm();">&nbsp;
						<input type="button" class="input" value="{$adminLangParams.BUTTON_CANCEL}" onclick="document.location='/admin/forum/index/page/1'">
					</td>
				</tr>
			</table>
		</form>
		<script>
			var oFCKeditor = new FCKeditor('description', 800, 500) ;
			//oFCKeditor.ToolbarSet = 'Basic' ;
			oFCKeditor.ReplaceTextarea();

            var oFCKeditor2 = new FCKeditor('description_short', 800, 300) ;
            oFCKeditor2.ReplaceTextarea();

		</script>
	</td>
</tr>
</table>
{literal}

<script type="text/javascript">
    
function checkForm(){
	var title = document.getElementById('title').value;

	if ($("#title").val() == '') {
        alert('Вы должны заподнить поле заголовок...');
    } else {
		document.forms.forum_form.submit();
	}
}
</script>
{/literal}
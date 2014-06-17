<br />
<center><span style="font-size:16px;">Документы -> {if $action == 'modify-file'}Изменить документ{else}Добавить документ{/if}</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/files/{$action}" name="files_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			{if $item.id}
				<input type="hidden" name="id" value="{$item.id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modify-file'}Изменить документ{else}Добавить документ{/if}</b></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.FILES_TITLE}:</td>
					<td><input type="text" id="title" class="input" style="width:800px;" name="title" value="{$item.title|stripslashes}"></td>
				</tr>
				<tr>
					<td class="header">{$adminLangParams.FILES_DESCRIPTION}:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description">{$item.description|stripslashes}</textarea>
					</td>
				</tr>				
				
				{if $item.file_name_original!=""}
				<tr>
					<td class="header" width="100px">{$adminLangParams.FILES_FILE}:</td>
					<td align="left" style="padding-left:6px;">
                        <a href="/admin/files/getfile/id/{$item.id}">{$item.file_name_original}</a>
					</td>
				</tr>
				{/if}
				<tr>
					<td class="header" width="100px">{$adminLangParams.FILES_UPLOAD_FILE}:</td>
					<td><input type="file" size="103" style="*width:600px;" class="input" id="upload_id" name="file"></td>
				</tr>

                <tr>
                    <td class="header" width="100px">Позиция:</td>
                    <td><input type="text" id="position" class="input" style="width:40px;" name="position" value="{$item.position}"></td>
                </tr>

				<tr>
					<td colspan="2" class="header" align="center">
						<input type="button" class="input" value="Сохранить" {if $action!='modify-file'} onclick="checkForm('')" {else} onclick="checkForm('modify')" {/if}>&nbsp;
						<input type="button" class="input" value="Отмена" onclick="document.location='/admin/files/page/1'">
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
    
function checkForm(type){

	if(type==''){
		if ($("#title").val() == '') {
			alert('Введите заголовок документа');
		} else if($("#upload_id").val() == '') {
            alert('Выберите файл');
        } else if($("#position").val() == '') {
			alert('Укажите позицию');
		} else {
			document.forms.files_form.submit();
		}
	} else {
        if ($("#title").val() == '') {
            alert('Введите заголовок документа');
        } else if($("#position").val() == '') {
            alert('Укажите позицию');
        } else {
			document.forms.files_form.submit();
		}
	}
}
</script>
{/literal}
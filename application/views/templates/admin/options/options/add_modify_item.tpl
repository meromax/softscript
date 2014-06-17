<br />
<center><span style="font-size:16px;">Опции товара -> {if $action == 'modify-option'}Изменить опцию{else}Добавить опцию{/if}</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/options/{$action}" name="option_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			{if $item.id}
				<input type="hidden" name="id" value="{$item.id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modify-option'}Изменить опцию{else}Добавить опцию{/if}</b></td>
				</tr>

				<tr>
					<td class="header" width="100px" style="padding:5px 5px 5px 5px;">{$adminLangParams.SECTIONS_TITLE}:</td>
					<td><input type="text" id="title" class="input" style="width:800px;" name="title" value="{$item.title|stripslashes}"  onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();"></td>
				</tr>

                <tr>
                    <td class="header" width="100px" style="padding:5px 5px 5px 5px;">{$adminLangParams.SECTIONS_LINK}:</td>
                    <td><input type="text" id="link" class="input" style="width:800px; background: #efefef; border: 0px;" name="link" value="{$item.link}" readonly="readonly"></td>
                </tr>

                <tr>
					<td class="header" style="padding:5px 5px 5px 5px;">{$adminLangParams.SECTIONS_DESCRIPTION}:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description">{$item.description|stripslashes}</textarea>
					</td>
				</tr>
				{*<tr>*}
					{*<td class="header" width="100px" style="padding:5px 5px 5px 5px;">{$adminLangParams.TITLE_POSITION}:</td>*}
					{*<td><input type="text" id="position" class="input" style="width:40px;" maxlength="3" name="position" value="{$item.position|stripslashes}"></td>*}
				{*</tr>*}

				<tr>
					<td colspan="2" align="center">
						{include file='admin/options/meta.tpl'}
					</td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center">
						<input type="button" class="input" value="{$adminLangParams.BUTTON_SAVE}" onclick="checkForm();">&nbsp;
						<input type="button" class="input" value="{$adminLangParams.BUTTON_CANCEL}" onclick="document.location='/admin/options/index/page/1'">
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
    if ($("#title").val() == '') {
        alert('Вы должны заподнить поле заголовок...');
    }
//    else if ($("#position").val() == '') {
//        alert('Вы должны заподнить поле позиция...');
//    }
    else {
        setLink();
        document.forms.option_form.submit();
    }
}

function setLink(){
    var link = createLinkFromTitle($("#title").val());
    $("#link").val(link);
}
</script>
{/literal}
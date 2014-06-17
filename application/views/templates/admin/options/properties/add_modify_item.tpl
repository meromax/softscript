<br />
<br />
<table width="98%" style="margin-top:20px;">
<tr>
	<td valign="top">
		<center><span style="font-size:16px;">Значения -> {if $action == 'modify-property'}Изменить значение{else}Добавить значение{/if}</span></center>
		<br />
		<table width="99%" border="0">
		<tr>
			<td valign="top" align="right"">
				<form method="POST" action="/admin/options/{$action}" name="property_form" enctype="multipart/form-data">
					<input type="hidden" name="step" value="2">
					{if $item.id}
						<input type="hidden" name="id" value="{$item.id}">
					{/if}
					<table class="cont2" align="center">
						<tr>
							<td colspan="2" class="header"><b>{if $action == 'modify-property'}Изменить значение{else}Добавить значение{/if}</b></td>
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
							<td class="header" style="padding:5px 5px 5px 5px;">{$adminLangParams.CATEGORIES_DESCRIPTION}:</td>
							<td style="padding-left:6px;">
								<textarea name="description" id="description">{$item.description|stripslashes}</textarea>
							</td>
						</tr>
						<tr>
							<td class="header" width="100px" style="padding:5px 5px 5px 5px;">{$adminLangParams.TITLE_POSITION}:</td>
							<td><input type="text" id="position" class="input" style="width:40px;" maxlength="3" name="position" value="{$item.position|stripslashes}"></td>
						</tr>

						<tr>
							<td colspan="2" align="center">
								{include file='admin/options/meta.tpl'}
							</td>
						</tr>
						<tr>
							<td colspan="2" class="header" align="center">
                                <input type="hidden" name="price" value="0" />
								<input type="hidden" name="option_id" value="{$option_id}" />
								<input type="hidden" name="spage" value="{$spage}" />
                                <input type="hidden" name="page" value="{$page}" />
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
	
	</td>
</tr>
</table>
{literal}

<script type="text/javascript">

    function checkForm(){
        if ($("#title").val() == '') {
            alert('Вы должны заподнить поле заголовок...');
        } else if ($("#position").val() == '') {
            alert('Вы должны заподнить поле позиция...');
        } else {
            setLink();
            document.forms.property_form.submit();
        }
    }

    function setLink(){
        var link = createLinkFromTitle($("#title").val());
        $("#link").val(link);
    }

</script>
{/literal}
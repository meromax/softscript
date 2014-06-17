<br />
<br />
<table width="98%" style="margin-top:20px;">
<tr>
	<td valign="top">
		<center><span style="font-size:16px;">{$adminLangParams.CATEGORIES_HEADER} -> {if $action == 'modifycategory'}{$adminLangParams.CATEGORIES_MODIFY}{else}{$adminLangParams.CATEGORIES_ADD}{/if}</span></center>
		<br />
		<table width="99%" border="0">
		<tr>
			<td valign="top" align="right"">
				<form method="POST" action="/admin/sections/{$action}" name="category_form" enctype="multipart/form-data">
					<input type="hidden" name="step" value="2">
					{if $item.id}
						<input type="hidden" name="id" value="{$item.id}">
					{/if}
					<table class="cont2" align="center">
						<tr>
							<td colspan="2" class="header"><b>{if $action == 'modifysection'}{$adminLangParams.CATEGORIES_MODIFY}{else}{$adminLangParams.CATEGORIES_ADD}{/if}</b></td>
						</tr>
						<tr>
							<td class="header" width="100px" style="padding:5px 5px 5px 5px;">{$adminLangParams.SECTIONS_LINK}:</td>
							<td><input type="text" id="link" class="input" style="width:800px;" name="link" value="{$item.link}"></td>
						</tr>						
						<tr>
							<td class="header" width="100px" style="padding:5px 5px 5px 5px;">{$adminLangParams.CATEGORIES_TITLE}:</td>
							<td><input type="text" id="title" class="input" style="width:800px;" maxlength="60" name="title" value="{$item.title|stripslashes}"></td>
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
                        {*<tr>*}
                            {*<td class="header" width="100px" style="padding:5px 5px 5px 5px;">Цена:</td>*}
                            {*<td><input type="text" id="price" class="input" style="width:100px;" maxlength="10" name="price" value="{$item.price|stripslashes}"></td>*}
                        {*</tr>*}
                        {*{if $item.image!=""}*}
                            {*<tr>*}
                                {*<td class="header" width="100px" style="padding:5px 5px 5px 5px;">{$adminLangParams.CATEGORIES_IMAGE}:</td>*}
                                {*<td align="left" style="padding-left:6px;">*}
                                    {*<div id="gallery">*}
                                        {*<span><a href="/images/categories/{$item.image}_big.jpg"  title="{$item.title|stripslashes}"><img align="left" src="/images/categories/{$item.image}_small.jpg?time={$smarty.now}" alt="" title="" width="150" height="113"></a></span>*}
                                    {*</div>*}
                                {*</td>*}
                            {*</tr>*}
                        {*{/if}*}
                        {*<tr>*}
                            {*<td class="header" width="100px" style="padding:5px 5px 5px 5px;">{$adminLangParams.CATEGORIES_UPLOAD_IMAGE}:</td>*}
                            {*<td><input type="file" size="103" style="*width:600px;" class="input" id="upload_id" name="image"></td>*}
                        {*</tr>*}
						<tr>
							<td colspan="2" align="center">
								{include file='admin/sections/meta.tpl'}
							</td>
						</tr>
						<tr>
							<td colspan="2" class="header" align="center">
                                <input type="hidden" name="price" value="0" />
								<input type="hidden" name="section_id" value="{$section_id}" />
								<input type="hidden" name="spage" value="{$spage}" />
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
	var title = document.getElementById('title').value;

    if ($("#link").val() == '') {
        alert('Вы должны ввести ссылку');
    } else if ($("#title").val() == '') {
		alert('Вы должны ввести заголовок');
	} else if ($("#position").val() == '') {
        alert('Вы должны ввести позицию');
    } else {
		document.forms.category_form.submit();
	}
}
</script>
{/literal}
<br />
<center><span style="font-size:16px;">{$adminLangParams.BANNERS_HEADER} -> {if $action == 'modifybanner'}{$adminLangParams.BANNERS_MODIFY}{else}{$adminLangParams.BANNERS_ADD}{/if}</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/banners/{$action}" name="banners_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			{if $banner.id}
				<input type="hidden" name="id" value="{$banner.id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modifybanner'}{$adminLangParams.BANNERS_MODIFY}{else}{$adminLangParams.BANNERS_ADD}{/if}</b></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.BANNERS_TITLE}:</td>
					<td><input type="text" id="title" class="input" style="width:800px;" name="title" value='{$banner.title|stripslashes}'></td>
				</tr>
				<tr>
					<td class="header">{$adminLangParams.BANNERS_DESCRIPTION}:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description">{$banner.description|stripslashes}</textarea>
					</td>
				</tr>
				
				<tr>
					<td class="header" width="100px">{$adminLangParams.BANNERS_LINK}:</td>
					<td><input type="text" id="link" class="input" style="width:800px;" name="link" value="{$banner.link|stripslashes}"></td>
				</tr>
                {if $action=='modifybanner'}
                    <input type="hidden" name="type" id="type" value="{$banner.type}" />
                {else}
                    <input type="hidden" name="type" id="type" value="0" />
                {/if}
                {*<tr>*}
                    {*<td class="header" width="100px">Типа баннера:</td>*}
                    {*<td>*}
                        {*<select name="type" id="type" class="input">*}
                            {*<option value="0" {if $banner.type==0}selected="selected"{/if}>Баннеры в слайдере</option>*}
                            {*<option value="1" {if $banner.type==1}selected="selected"{/if}>Баннеры слева</option>*}
                        {*</select>*}
                    {*</td>*}
                {*</tr>*}
				
				<tr>
					<td class="header" width="100px">{$adminLangParams.BANNERS_POSITION}:</td>
					<td><input type="text" id="position" class="input" style="width:40px;" name="position" value="{if $action!='modifybanner'}0{else}{$banner.position}{/if}"></td>
				</tr>				
				
				{if $banner.image!=""}
				<tr>
					<td class="header" width="100px">{$adminLangParams.BANNERS_IMAGE}:</td>
					<td align="left" style="padding-left:6px;"><img style="border:1px solid #b2b2b2;" align="left" src="/images/banners/{$banner.image}_small.jpg?time={$smarty.now}" alt="" title=""></td>
				</tr>
				{/if}
				<tr>
					<td class="header" width="100px">{$adminLangParams.BANNERS_UPLOAD_IMAGE}:</td>
					<td><input type="file" size="103" style="*width:600px;" class="input" id="upload_id" name="image"></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						{include file='admin/banners/meta.tpl'}
					</td>
				</tr>				
				<tr>
					<td colspan="2" class="header" align="center"><input type="button" class="input" value="save" {if $action!='modifybanner'} onclick="checkForm('')" {else} onclick="checkForm('modify')" {/if}>&nbsp;<input type="button" class="input" value="cancel" onclick="document.location='/admin/portfolio/page/1'"></td>
				</tr>
			</table>
		</form>
		<script>
			var oFCKeditor = new FCKeditor('description', 800, 300) ;
			oFCKeditor.ReplaceTextarea();
		</script>
	</td>
</tr>
</table>
{literal}

<script type="text/javascript">
    
function checkForm(type){
	var title    = document.getElementById('title').value;
	var position = document.getElementById('position').value;
	var ChekStr  = document.getElementById('upload_id').value;
	
	if(type==''){
		if (title == '') {
			alert('You must fill the title field.');
		} else if (position == '') {
			alert('You must fill the position field.');
		} else if(ChekStr=='') {
			alert('Please choose the picture.');
		} else {
			document.forms.banners_form.submit();
		}
	} else {
		if (title == '') {
			alert('You must fill the title field.');
		} else if (position == '') {
			alert('You must fill the position field.');
		} else {
			document.forms.banners_form.submit();
		}
	}
}
</script>
{/literal}
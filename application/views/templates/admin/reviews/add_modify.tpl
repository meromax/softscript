<br />
<center><span style="font-size:16px;">{$adminLangParams.NEWS_HEADER} -> {if $action == 'modifynew'}{$adminLangParams.NEWS_MODIFY_NEW}{else}{$adminLangParams.NEWS_ADD_NEW}{/if}</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/news/{$action}" name="news_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			{if $new.new_id}
				<input type="hidden" name="new_id" value="{$new.new_id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modifynew'}{$adminLangParams.NEWS_MODIFY_NEW}{else}{$adminLangParams.NEWS_ADD_NEW}{/if}</b></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.NEWS_TITLE}:</td>
					<td><input type="text" id="title" class="input" style="width:800px;" name="title" value="{$new.new_title|stripslashes}"></td>
				</tr>
				<tr>
					<td class="header">{$adminLangParams.NEWS_DESCRIPTION}:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description">{$new.new_description|stripslashes}</textarea>
					</td>
				</tr>				
				
				{if $new.new_image!=""}
				<tr>
					<td class="header" width="100px">{$adminLangParams.NEWS_IMAGE}:</td>
					<td align="left" style="padding-left:6px;"><img style="border:1px solid #b2b2b2;" align="left" src="/images/news/{$new.new_image}_small.jpg?time={$smarty.now}" alt="" title=""></td>
				</tr>
				{/if}
				<tr>
					<td class="header" width="100px">{$adminLangParams.NEWS_UPLOAD_IMAGE}:</td>
					<td><input type="file" size="103" style="*width:600px;" class="input" id="upload_id" name="image"></td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center"><input type="button" class="input" value="{$adminLangParams.BUTTON_SAVE}" {if $action!='modifynew'} onclick="checkForm('')" {else} onclick="checkForm('modify')" {/if}>&nbsp;<input type="button" class="input" value="{$adminLangParams.BUTTON_CANCEL}" onclick="document.location='/admin/news/page/1'"></td>
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
	var title    = document.getElementById('title').value;
	var ChekStr = document.getElementById('upload_id').value;
	

	if(type==''){
		if (title == '') {
			alert('You must fill the title field.');
		} else if(ChekStr=='') {
			alert('Please choose the picture.');
		} else {
			document.forms.news_form.submit();
		}
	} else {
		if (title == '') {
			alert('You must fill the title field.');
		} else {
			document.forms.news_form.submit();
		}
	}
}
</script>
{/literal}
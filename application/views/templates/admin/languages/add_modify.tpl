<br />
<center><span style="font-size:16px;">{$adminLangParams.LANGUAGES__HEADER} -> {if $action == 'modify'}{$adminLangParams.LANGUAGES__MODIFY}{else}{$adminLangParams.LANGUAGES__ADD}{/if}</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/languages/{$action}" name="languages_form" id="languages_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			{if $language.lang_id}
				<input type="hidden" name="id" id="id" value="{$language.lang_id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modify'}{$adminLangParams.LANGUAGES__MODIFY}{else}{$adminLangParams.LANGUAGES__ADD}{/if}</b></td>
				</tr>
				<tr>
					<td class="header" width="250px">{$adminLangParams.LANGUAGES__TITLE}:</td>
					<td><input type="text" id="title" name="title" class="input" style="width:260px;" value="{$language.title|stripslashes}"></td>
				</tr>
				<tr>
					<td class="header" width="250px">{$adminLangParams.LANGUAGES__SHORT_TITLE}:</td>
					<td><input type="text" id="short_title" name="short_title" class="input" style="width:30px;" maxlength="2" value="{$language.short_title|stripslashes}"></td>
				</tr>
				<tr>
					<td class="header" width="250px">{$adminLangParams.LANGUAGES__POSITION}:</td>
					<td><input type="text" id="position" name="position" class="input" style="width:30px;" maxlength="2" value="{$language.position|stripslashes}"></td>
				</tr>								
				{if isset($language.lang_id)}
				<tr>
					<td class="header">{$adminLangParams.LANGUAGES__TRANSLATION_FILE}:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description" style="width:800px; height:600px;">{$language.file_content|stripslashes}</textarea>
					</td>
				</tr>
				{/if}				
				
				{if $language.image!=""}
				<tr>
					<td class="header" width="100px">{$adminLangParams.LANGUAGES__FLAG_IMAGE}:</td>
					<td align="left" style="padding-left:6px;"><img style="border:1px solid #b2b2b2;" align="left" src="/images/news/{$new.new_image}_small.jpg?time={$smarty.now}" alt="" title=""></td>
				</tr>
				{/if}
				<tr>
					<td class="header" width="100px">{$adminLangParams.LANGUAGES__UPLOAD_IMAGE}:</td>
					<td><input type="file" class="input" id="image" name="image"></td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center">
						<div id="warnings" style="color:red; font-size:13px; display:none; width:100%; text-align:center;"></div>
					</td>
				</tr>				
				<tr>
					<td colspan="2" class="header" align="center"><input type="button" class="input" value="{$adminLangParams.BUTTON_SAVE}" onclick="checkForm();">&nbsp;<input type="button" class="input" value="{$adminLangParams.BUTTON_CANCEL}" onclick="document.location='/admin/languages/page/1'"></td>
				</tr>
			</table>
		</form>
	</td>
</tr>
</table>
<input type="hidden" name="languages_warning1" id="languages_warning1" value="{$adminLangParams.LANGUAGES__WARNING1}" />
<input type="hidden" name="languages_warning2" id="languages_warning2" value="{$adminLangParams.LANGUAGES__WARNING2}" />
<input type="hidden" name="languages_warning3" id="languages_warning3" value="{$adminLangParams.LANGUAGES__WARNING3}" />
<input type="hidden" name="languages_warning4" id="languages_warning4" value="{$adminLangParams.LANGUAGES__WARNING4}" />
<input type="hidden" name="languages_warning5" id="languages_warning5" value="{$adminLangParams.LANGUAGES__WARNING5}" />
<input type="hidden" name="languages_warning6" id="languages_warning6" value="{$adminLangParams.LANGUAGES__WARNING6}" />

{literal}
<script type="text/javascript">
function checkForm(){

	$.post("/admin/languages/check-before-add", $("#languages_form").serialize(),
		function(data) {
   			if(data!=0){
   				$("#warnings").html($("#languages_warning"+data).val());
   				$("#warnings").fadeIn();
				setTimeout(function(){  
					$("#warnings").fadeOut();				       
				}, 5000);     				
   			} else {
   				$("#languages_form").submit();
   			}
		}
	);	
}
</script>
{/literal}
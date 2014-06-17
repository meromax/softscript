<br />
<center><span style="font-size:16px;">{$adminLangParams.TTHEMES__HEADER} -> {if $action == 'modify'}{$adminLangParams.TTHEMES__MODIFY}{else}{$adminLangParams.TTHEMES__ADD}{/if}</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/tthemes/{$action}" name="ttheme_form" id="ttheme_form">
			<input type="hidden" name="step" value="2">
			{if $ttheme.id}
				<input type="hidden" name="id" value="{$ttheme.id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modify'}{$adminLangParams.TTHEMES__MODIFY}{else}{$adminLangParams.TTHEMES__ADD}{/if}</b></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.TTHEMES__TITLE}:</td>
					<td><input type="text" id="title" class="input" style="width:250px;" name="title" value="{$ttheme.title|stripslashes|strip_tags|trim}"></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.TTHEMES__PRICE}:</td>
					<td><input type="text" id="price" class="input" style="width:80px;" name="price" value="{$ttheme.price|stripslashes|strip_tags|trim}"></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.TTHEMES__POSITION}:</td>
					<td><input type="text" id="position" class="input" style="width:30px;" name="position" value="{$ttheme.position|stripslashes|strip_tags|trim}"></td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center"><input type="button" class="input" value="{$adminLangParams.BUTTON_SAVE}" onclick="checkForm();">&nbsp;<input type="button" class="input" value="{$adminLangParams.BUTTON_CANCEL}" onclick="document.location='/admin/tthemes/index/page/1'"></td>
				</tr>
			</table>
		</form>
	</td>
</tr>
</table>
<input type="hidden" name="tthemes_warning1" id="tthemes_warning1" value="{$adminLangParams.TTHEMES__WARNING1}" />
<input type="hidden" name="tthemes_warning2" id="tthemes_warning2" value="{$adminLangParams.TTHEMES__WARNING2}" />
<input type="hidden" name="tthemes_warning3" id="tthemes_warning3" value="{$adminLangParams.TTHEMES__WARNING3}" />

{literal}

<script type="text/javascript">
    
function checkForm(){
	var title    = $('#title').val();
	var price    = $('#price').val();
	var position = $('#position').val();
	
	if ($('#title').val() == '') {
		alert($("#tthemes_warning1").val());
	} else if($('#price').val()=='') {
		alert($("#tthemes_warning2").val());
	} else if($('#position').val()=='') {
		alert($("#tthemes_warning3").val());
	} else {
		$("#ttheme_form").submit();
	}
	
}
</script>
{/literal}
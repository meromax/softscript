<br />
<center><span style="font-size:16px;">{$adminLangParams.CALCULATOR__HEADER}</span></center>
<br />
<center>
<form method="POST" action="/admin/calculator/update" name="calc_form" id="calc_form">

<table width="98%">
<tr>
	<td width="100%" valign="top" align="center" style="padding:5px 5px 5px 5px; border:1px solid #b2b2b2; background:#ffffff;">
		{$adminLangParams.CALCULATOR__FROM_LANGUAGE}:
		<select id="lang_from" name="lang_from" onchange="changeLanguage();">
		{foreach from=$calc_languages item=calc}
			<option value="{$calc.lang_id}" {if $calc.lang_id==$lang_from} selected {/if}>{$calc.title|stripslashes|strip_tags|trim}</option>		
		{/foreach}
		</select>
	</td>
</tr>
</table>

<table width="98%">
<tr>
	<td width="100%" valign="top" style="padding:5px 5px 5px 15px; border:1px solid #b2b2b2; background:#ffffff;">
		{foreach from=$calc_languages_to item=calc_lang_to}
			<div style="border:1px solid #999; margin:10px 10px 10px 10px; width:280px; height:70px; float:left;">

				<table style="border:0px solid #b2b2b2;" width="100%">
				<tr>
					<td style="font-weight:bold; color:#595959;" width="60%" align="right">
						{$adminLangParams.CALCULATOR__TO_LANGUAGE|trim}:
					</td>
					<td style="font-weight:bold; color:#595959;" width="40%" align="left">
						{$calc_lang_to.title|stripslashes|strip_tags|trim}
					</td>						
				</tr>
				<tr>
					<td style="font-weight:bold; color:#595959;" width="60%" align="right">
						{$adminLangParams.CALCULATOR__PRICE|trim}:
					</td>
					<td style="font-weight:bold; color:#595959;" width="40%" align="left">
						<input type="text" class="inp2" style="width:80px;" name="calc_price{$calc_lang_to.lang_id}" id="calc_price{$calc_lang_to.lang_id}" autocomplete="off" value="{$calc_lang_to.price}" />
					</td>						
				</tr>
				<tr>
					<td style="font-weight:bold; color:#595959;" width="60%" align="right">
						{$adminLangParams.CALCULATOR__LETTERS_COUNT|trim}:
					</td>
					<td style="font-weight:bold; color:#595959;" width="40%" align="left">
						<input type="text" class="inp2" style="width:80px;" name="calc_letters_count{$calc_lang_to.lang_id}" id="calc_letters_count{$calc_lang_to.lang_id}" autocomplete="off" value="{$calc_lang_to.letters_count}" />
					</td>						
				</tr>										
				</table>
		
			</div>	
		{/foreach}
	</td>
</tr>
<tr>
	<td width="100%" colspan="3" align="center" style="padding-top:20px;">
		<input type="button" class="input" value="{$adminLangParams.BUTTON_SAVE}" onclick="checkForm();">
	</td>
</tr>
</table>
</form>
</center>


<script type="text/javascript">
var message = '{$adminLangParams.NOTYFICATION_FIELDS_CHOULD_FILLED_CORRECTLY}';

{literal}
function checkForm(){
	document.forms.calc_form.submit();
}
function changeLanguage(){
	document.location.href="/admin/calculator/index?lang_from="+$("#lang_from").val();
}
{/literal}
</script>

<br />
<center><span style="font-size:16px;">{$adminLangParams.OPERATORS__HEADER} -> {if $action == 'modify'}{$adminLangParams.OPERATORS__MODIFY}{else}{$adminLangParams.OPERATORS__ADD}{/if}</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/operators/{$action}" name="operators_form" id="operators_form">
			<input type="hidden" name="step" value="2">
			{if $operator.id}
				<input type="hidden" name="id" value="{$operator.id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modify'}{$adminLangParams.OPERATORS__MODIFY}{else}{$adminLangParams.OPERATORS__ADD}{/if}</b></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.OPERATORS__NAME}:</td>
					<td><input type="text" id="name" name="name" class="input" style="width:250px;" value="{$operator.name|stripslashes|strip_tags|trim}"></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.OPERATORS__EMAIL}:</td>
					<td><input type="text" id="email" name="email" class="input" style="width:250px;" value="{$operator.email|stripslashes|strip_tags|trim}"></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.OPERATORS__PASSWORD}:</td>
					<td>
						<input type="text" readonly="readonly" style="background:#e5e5e5; width:90px;" id="password" name="password" class="input" value="{$operator.pw|stripslashes|strip_tags|trim}">
						<input type="button" value="{$adminLangParams.OPERATORS__GENERATE_PASSWORD}" onclick="generatePassword();" />
					</td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center">
						<div id="warnings" style="color:red; font-size:13px; display:none; width:100%; text-align:center;"></div>
					</td>
				</tr>				
				<tr>
					<td colspan="2" class="header" align="center"><input type="button" class="input" value="{$adminLangParams.BUTTON_SAVE}" onclick="checkForm();">&nbsp;<input type="button" class="input" value="{$adminLangParams.BUTTON_CANCEL}" onclick="document.location='/admin/operators/index/page/1'"></td>
				</tr>
			</table>
		</form>
	</td>
</tr>
</table>
<input type="hidden" name="operators_warning1" id="operators_warning1" value="{$adminLangParams.OPERATORS__WARNING1}" />
<input type="hidden" name="operators_warning2" id="operators_warning2" value="{$adminLangParams.OPERATORS__WARNING2}" />
<input type="hidden" name="operators_warning3" id="operators_warning3" value="{$adminLangParams.OPERATORS__WARNING3}" />
<input type="hidden" name="operators_warning4" id="operators_warning4" value="{$adminLangParams.OPERATORS__WARNING4}" />
<input type="hidden" name="operators_warning5" id="operators_warning5" value="{$adminLangParams.OPERATORS__WARNING5}" />
<input type="hidden" name="operators_warning6" id="operators_warning6" value="{$adminLangParams.OPERATORS__WARNING6}" />
<input type="hidden" name="operators_warning7" id="operators_warning7" value="{$adminLangParams.OPERATORS__WARNING7}" />


{literal}

<script type="text/javascript">
function checkForm(){

	$.post("/admin/operators/check-before-add", $("#operators_form").serialize(),
		function(data) {
   			if(data!=0){
   				$("#warnings").html($("#operators_warning"+data).val());
   				$("#warnings").fadeIn();
				setTimeout(function(){  
					$("#warnings").fadeOut();				       
				}, 5000);     				
   			} else {
   				$("#operators_form").submit();
   			}
		}
	);	
}
function generatePassword(){
	var lang_from = $("#lang_from_id").val();

	$.post("/admin/operators/generate-password",
		function(data) {
   			if(data!=''){
   				$("#password").val(data);
   			}
		}
	);	
}
</script>
{/literal}
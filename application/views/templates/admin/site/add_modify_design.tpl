<br />
<center><span style="font-size:16px;">{$adminLangParams.DESIGN_HEADER} -> {if $action == 'modifydesign'}{$adminLangParams.DESIGN_MODIFY_DESIGN}{else}{$adminLangParams.DESIGN_ADD_DESIGN}{/if}</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/site/{$action}" name="design_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			{if $item.design_id}
				<input type="hidden" name="design_id" value="{$item.design_id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modifydesign'}{$adminLangParams.DESIGN_MODIFY_DESIGN}{else}{$adminLangParams.DESIGN_ADD_DESIGN}{/if}</b></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.DESIGN_TITLE}:</td>
					<td><input type="text" class="input" style="width:800px;" maxlength="255" name="title" id="title" value="{$item.design_title|stripslashes}"></td>
				</tr>
				<tr>
					<td class="header">{$adminLangParams.DESIGN_DESCRIPTION}:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description">{$item.design_description|stripslashes}</textarea>
					</td>
				</tr>
				{if $item.design_image!=""}
				<tr>
					<td class="header" width="100px">{$adminLangParams.DESIGN_IMAGE}:</td>
					<td align="left" style="padding-left:6px;">
						<img style="border:1px solid #b2b2b2;" align="left" src="/images/design/{$item.design_image}_big.jpg?time={$smarty.now}"  width="99" height="47" alt="" title="">
					</td>
				</tr>
				{/if}
				<tr>
					<td class="header" width="100px">{$adminLangParams.DESIGN_UPLOAD_IMAGE}:</td>
					<td><input type="file" size="103" style="*width:600px;" class="input" id="image" name="image"></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.DESIGN_UPLOAD_TEMPLATE}:</td>
					<td><input type="file" size="103" style="*width:600px;" class="input" id="file" name="file"></td>
				</tr>
				<tr>
					<td class="header" width="100px">{$adminLangParams.DESIGN_CMS}:</td>
					<td style="padding-left:6px;">
						<select name="cms" id="cms" onchange="getSiteTypesByCMSID(0);">
						<option value="0"> ------------- </option>
						{foreach from=$cms item=cms_item}
							<option value="{$cms_item.id}" {if $cms_item.id==$item.cms_id} selected {/if}>{$cms_item.title|stripslashes|strip_tags}</option>
						{/foreach}
						</select>
					</td>
				</tr>
				
				<tr>
					<td class="header" width="100px">{$adminLangParams.CMS_SITE_TYPES}:</td>
					<td style="padding-left:6px;" id="sitetypes_container">
						<select name="sitetype" id="sitetype" disabled>
						<option value="0"> ------------- </option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td class="header" width="100px">{$adminLangParams.DESIGN_PRICE}:</td>
					<td><input type="text" class="input" style="width:70px;" maxlength="9" name="price" id="price" value='{$item.price|number_format:2:".":""}'></td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center">
						<input type="button" class="input" value="{$adminLangParams.BUTTON_SAVE}" onclick="checkForm()">&nbsp;<input type="button" class="input" value="{$adminLangParams.BUTTON_CANCEL}" onclick="document.location='/admin/site/design/cms/0/page/1'">
					</td>
				</tr>
			</table>
		</form>
		<script>
			var oFCKeditor = new FCKeditor('description', 800, 200) ;
			oFCKeditor.ToolbarSet = 'Basic' ;
			oFCKeditor.ReplaceTextarea();
		</script>
	</td>
</tr>
</table>


<script type="text/javascript">
getSiteTypesByCMSID({$sitetype_sel_id});
{literal}

function checkForm(){
	var title    = document.getElementById('title').value;
	var price    = document.getElementById('price').value;
	var cms      = document.getElementById('cms').value;
	var sitetype = document.getElementById('sitetype').value;
	

	if (title == '') {
		alert('You should fill the title field.');
	} else if(price=='') {
		alert('You should fill the price field.');
	} else if(cms==0) {
		alert('You should choose cms.');
	} else if(sitetype==0) {
		alert('You should choose sitetype.');
	} else {
		document.forms.design_form.submit();
	}
}

function getSiteTypesByCMSID(sitetype_sel_id){
	
	  var cms_id = $('#cms').val();
	  	  
	  var url = "cms_id="+cms_id+"&sitetype_sel_id="+sitetype_sel_id;

	  $.ajax({
	   type: "POST",
	   url: "/admin/site/getsitetypesbycmsid",
	   data: url,
	   success: function(msg){
		   	if(msg!=0){
		   		$("#sitetypes_container").html(msg);
		   	}
	   }
	 });	
}
{/literal}
</script>

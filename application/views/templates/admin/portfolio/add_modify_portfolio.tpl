<br />
<center><span style="font-size:16px;">{$adminLangParams.PORTFOLIO_HEADER} -> {if $action == 'modifyportfolio'}{$adminLangParams.PORTFOLIO_MODIFY_PORTFOLIO}{else}{$adminLangParams.PORTFOLIO_ADD_PORTFOLIO}{/if}</span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/portfolio/{$action}" name="portfolio_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			{if $portfolio.portfolio_id}
				<input type="hidden" name="portfolio_id" value="{$portfolio.portfolio_id}">
			{/if}
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b>{if $action == 'modifyportfolio'}{$adminLangParams.PORTFOLIO_MODIFY_PORTFOLIO}{else}{$adminLangParams.PORTFOLIO_ADD_PORTFOLIO}{/if}</b></td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center" height="40">
						{$adminLangParams.SECTIONS_HEADER}:
						<select name="section_id" id="section_id" onchange="changeSection(0);">
						<option value="0"> --------------- </option>
						{foreach from=$sections item=sec}
							<option value="{$sec.id}" {if $sec.id==$portfolio.section_id} selected {/if}> {$sec.title|stripslashes|strip_tags} </option>
						{/foreach}
						</select>
						&nbsp;&nbsp;
						{$adminLangParams.CATEGORIES_HEADER}:
						<select name="category_id" id="category_id">
						<option value="0"> --------------- </option>
						{foreach from=$categories item=cat}
							<option value="{$cat.id}" {if $cat.id==$portfolio.category_id} selected {/if}> {$cat.title|stripslashes|strip_tags} </option>
						{/foreach}
						</select>					
					</td>
				</tr>							
				<tr>
					<td class="header" width="100px">{$adminLangParams.PORTFOLIO_TITLE}:</td>
					<td><input type="text" id="title" class="input" style="width:800px;" name="title" value='{$portfolio.portfolio_title|stripslashes}'></td>
				</tr>
				<tr>
					<td class="header">{$adminLangParams.PORTFOLIO_DESCRIPTION}:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description">{$portfolio.portfolio_description|stripslashes}</textarea>
					</td>
				</tr>
				
				<tr>
					<td class="header" width="100px">{$adminLangParams.PORTFOLIO_LINK}:</td>
					<td><input type="text" id="link" class="input" style="width:800px;" name="link" value="{$portfolio.portfolio_link|stripslashes}"></td>
				</tr>
				
				{if $portfolio.portfolio_image!=""}
				<tr>
					<td class="header" width="100px">{$adminLangParams.PORTFOLIO_IMAGE}:</td>
					<td align="left" style="padding-left:6px;"><img style="border:1px solid #b2b2b2;" align="left" src="/images/portfolio/{$portfolio.portfolio_image}_middle.jpg?time={$smarty.now}" alt="" title=""></td>
				</tr>
				{/if}
				<tr>
					<td class="header" width="100px">{$adminLangParams.PORTFOLIO_UPLOAD_IMAGE}:</td>
					<td><input type="file" size="103" style="*width:600px;" class="input" id="upload_id" name="image"></td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center"><input type="button" class="input" value="save" {if $action!='modifyportfolio'} onclick="checkForm('')" {else} onclick="checkForm('modify')" {/if}>&nbsp;<input type="button" class="input" value="cancel" onclick="document.location='/admin/portfolio/page/1'"></td>
				</tr>
			</table>
		</form>
		<script>
			var oFCKeditor = new FCKeditor('description', 800, 200) ;
			//oFCKeditor.ToolbarSet = 'Basic' ;
			oFCKeditor.ReplaceTextarea();
		</script>
	</td>
</tr>
</table>
{literal}

<script type="text/javascript">
    
function checkForm(type){
	var section  = document.getElementById('section_id').value;
	var category = document.getElementById('category_id').value;	
	var title    = document.getElementById('title').value;
	var ChekStr = document.getElementById('upload_id').value;
	
	if(type==''){
		if (section == 0) {
			alert('You must choose the section.');
		} else if (title == '') {
			alert('You must fill the title field.');
		} else if(ChekStr=='') {
			alert('Please choose the picture.');
		} else {
			document.forms.portfolio_form.submit();
		}
	} else {
		if (section == 0) {
			alert('You must choose the section.');
		} else if (title == '') {
			alert('You must fill the title field.');
		} else if (link == '') {
			alert('You must fill the link field.');
		} else {
			document.forms.portfolio_form.submit();
		}
	}
}
function changeSection(cat_selected_id){
	  var url = "section_id="+$("#section_id").val()+"&cat_selected_id="+cat_selected_id;
	  $.ajax({
	   type: "POST",
	   url: "/admin/sections/getcategories",
	   data: url,
	   success: function(msg){
		   	if(msg!=""){
		   		$("#category_id").html(msg);
		   	}
	   }
	 });			
}
</script>
{/literal}
<script type="text/javascript">
	changeSection("{$portfolio.category_id}");
</script>
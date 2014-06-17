<br />
<center><span style="font-size:16px;">{$adminLangParams.DESIGN_HEADER}</span></center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="7" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/site/design_paging.tpl'}
	</td>
</tr>
<tr>
	<td colspan="7" class="header" style="padding:0px 3px 0px 3px;">
		<table cellpading="0" cellspacing="0">
		<tr>
			<td class="header" style="padding:0px 5px 0px 0px;"><a href="/admin/site/adddesign/cms/{$cms_id}">{$adminLangParams.DESIGN_ADD_DESIGN}</a></td>
			<td class="header">{$adminLangParams.DESIGN_CMS}:</td>
			<td>
				<select name="cms" id="cms" onchange="changeDesign();">
				<option value="0"> ---- {$adminLangParams.DESIGN_DROPDOWN_ALL} ---- </option>
				{foreach from=$cms item=cms_item}
					<option value="{$cms_item.id}" {if $cms_item.id==$cms_id}selected{/if}>{$cms_item.title|stripslashes|strip_tags}</option>
				{/foreach}
				</select>
			</td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.DESIGN_IMAGE}</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.DESIGN_TITLE}</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.DESIGN_DESCRIPTION}</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.DESIGN_PRICE}</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;"  width="150"><b>{$adminLangParams.DESIGN_TEMPLATE_NAME}</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;" width="150" align="center"><b>{$adminLangParams.DESIGN_ACTION}</b></td>
</tr>
{foreach name=pages_loop from=$design item=item}
<tr bgcolor="{cycle values='#ffefcc,#ffffff'}">
	<td align="center" width="45" height="45">
		{if $item.design_image!=""}
			<a href="/images/design/{$item.design_image}_big.jpg" rel="lightbox"><img align="absmiddle" src="/images/design/{$item.design_image}_middle.jpg?time={$smarty.now}" alt="" title=""  width="99" height="47"></a>		
		{/if}
	</td>
	<td style="padding:5px 5px 5px 5px; width:400px;">{$item.design_title|stripslashes}</td>
	<td style="padding:5px 5px 5px 5px;">{$item.design_description|stripslashes|strip_tags|truncate:200}</td>
	<td style="padding:5px 5px 5px 5px;">{$item.price|number_format:2:".":""}</td>
	<td style="padding:5px 5px 5px 5px;"  width="150">{$item.template_name}</td>
	<td align="center">
		<a href="/admin/site/modifydesign/cms/{$cms_id}/design_id/{$item.design_id}">{$adminLangParams.ACTION_EDIT}</a> | 
		<a href="/admin/site/deletedesign/cms/{$cms_id}/design_id/{$item.design_id}"  onclick="return confirm({$adminLangParams.NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN})">{$adminLangParams.ACTION_DELETE}</a>
	</td>
</tr>

{foreachelse}
<tr>
	<td colspan="7"><b>No items found</b></td>
</tr>	
{/foreach}
<tr>
	<td colspan="7" class="header" style="padding:3px 3px 3px 3px;"><a href="/admin/site/adddesign/cms/{$cms_id}">{$adminLangParams.DESIGN_ADD_DESIGN}</a></td>
</tr>
<tr>
	<td align="left" colspan="7" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/site/design_paging.tpl'}
	</td>
</tr>
</table>
{literal}
<script type="text/javascript">
function changeDesign(){
	var cms = document.getElementById('cms').value;
	document.location.href="/admin/site/design/cms/"+cms+"/page/1";
}
</script>
{/literal}
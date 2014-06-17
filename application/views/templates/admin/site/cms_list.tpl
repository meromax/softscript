<br />
<center><span style="font-size:16px;">{$adminLangParams.CMS_HEADER}</span></center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="7" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/site/cms_paging.tpl'}
	</td>
</tr>
<tr>
	<td colspan="7" class="header" style="padding:3px 3px 3px 3px;">
		<table cellpading="0" cellspacing="0">
		<tr>
			<td class="header"><a href="/admin/site/addcms" style="padding:0px 10px 0px 0px;">{$adminLangParams.CMS_ADD_CMS}</a></td>
			<td class="header">{$adminLangParams.CMS_SITE_TYPES}:</td>
			<td>
				<select name="sitetype" id="sitetype" onchange="changeSiteType();">
				<option value="0"> ---- {$adminLangParams.CMS_DROPDOWN_ALL} ---- </option>
				{foreach from=$sitetypes item=st_item}
					<option value="{$st_item.id}" {if $st_item.id==$sitetype_id}selected{/if}>{$st_item.title|stripslashes|strip_tags}</option>
				{/foreach}
				</select>
			</td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.CMS_TITLE}</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.CMS_DESCRIPTION}</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.CMS_PRICE}</b></td>
	<td class="header" style="padding:5px 5px 5px 5px; width:50px;"><b>{$adminLangParams.CMS_POSITION}</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;" align="center"><b>{$adminLangParams.CMS_CMS_NAME}</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;" width="150" align="center"><b>{$adminLangParams.CMS_ACTION}</b></td>
</tr>
{foreach name=pages_loop from=$cms item=item}
<tr bgcolor="{cycle values='#ffefcc,#ffffff'}">
	<td style="padding:5px 5px 5px 5px; width:400px;">{$item.title|stripslashes}</td>
	<td style="padding:5px 5px 5px 5px;">{$item.description|stripslashes|strip_tags|truncate:200}</td>
	<td style="padding:5px 5px 5px 5px;">{$item.price|number_format:2:".":""}</td>
	<td style="padding:5px 5px 5px 5px; width:50px;" align="center">{$item.position}</td>
	<td style="padding:5px 5px 5px 5px; width:150px;" align="center">{$item.cms_name}</td>
	<td align="center">
		<a href="/admin/site/modifycms/sitetype/0/id/{$item.id}">{$adminLangParams.ACTION_EDIT}</a> | 
		<a href="/admin/site/deletecms/sitetype/0/id/{$item.id}"  onclick="return confirm({$adminLangParams.NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN})">{$adminLangParams.ACTION_DELETE}</a>
	</td>
</tr>

{foreachelse}
<tr>
	<td colspan="7"><b>No items found</b></td>
</tr>	
{/foreach}
<tr>
	<td colspan="7" class="header" style="padding:3px 3px 3px 3px;"><a href="/admin/site/addcms">{$adminLangParams.CMS_ADD_CMS}</a></td>
</tr>
<tr>
	<td align="left" colspan="7" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/site/cms_paging.tpl'}
	</td>
</tr>
</table>
{literal}
<script type="text/javascript">
function changeSiteType(){
	var sitetype = document.getElementById('sitetype').value;
	document.location.href="/admin/site/cms/sitetype/"+sitetype+"/page/1";
}
</script>
{/literal}
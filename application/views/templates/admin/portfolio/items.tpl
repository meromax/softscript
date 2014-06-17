<br />
<center><span style="font-size:16px;">{$adminLangParams.PORTFOLIO_HEADER}</span></center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="5" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/portfolio/paging.tpl'}
	</td>
</tr>
<tr>
	<td colspan="5" class="header" style="padding:5px 5px 5px 5px;">
		<a href="/admin/portfolio/addportfolio">{$adminLangParams.PORTFOLIO_ADD_PORTFOLIO}</a>
		&nbsp;&nbsp;&nbsp;&nbsp;
		{$adminLangParams.SECTIONS_HEADER}:
		<select name="section_id" id="section_id" onchange="changeSection();">
		<option value="0"> --------------- </option>
		{foreach from=$sections item=sec}
			<option value="{$sec.id}" {if $sec.id==$sel_section_id} selected {/if}> {$sec.title|stripslashes|strip_tags} </option>
		{/foreach}
		</select>
		&nbsp;&nbsp;
		{$adminLangParams.CATEGORIES_HEADER}:
		<select name="category_id" id="category_id" onchange="changeCategory();">
		<option value="0"> --------------- </option>
		{foreach from=$categories item=cat}
			<option value="{$cat.id}" {if $cat.id==$sel_category_id} selected {/if}> {$cat.title|stripslashes|strip_tags} </option>
		{/foreach}
		</select>		
	</td>
</tr>
<tr>
	<td class="header" width="50" align="center" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.PORTFOLIO_IMAGE}</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.PORTFOLIO_TITLE}</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.PORTFOLIO_DESCRIPTION}</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;" align="center" width="100"><b>{$adminLangParams.PORTFOLIO_LINK}</b></td>
	<td class="header" width="150" align="center" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.PORTFOLIO_ACTION}</b></td>
</tr>
{foreach from=$portfolio item=item}
<tr bgcolor="{cycle values='#FFEFAA,#ffffff'}">
	<td align="center" style="border:1px solid #000000;" width="99" height="47">
		{if $item.portfolio_image!=""}
			<a href="/images/portfolio/{$item.portfolio_image}_big.jpg?time={$smarty.now}" rel="prettyPhoto[mixed]"><img align="absmiddle" src="/images/portfolio/{$item.portfolio_image}_middle.jpg?time={$smarty.now}" alt="" title="" width="99" height="47"></a></td>
		{/if}
	</td>
	<td style="padding:5px 5px 5px 5px; width:400px;">{$item.portfolio_title|strip_tags|stripslashes}</td>
	<td style="padding:5px 5px 5px 5px;">{$item.portfolio_description|strip_tags|stripslashes|truncate:200}</td>
	<td style="padding:5px 5px 5px 5px; width:50px;" align="center">
	{if $item.portfolio_link!=""}
		<a href="{$item.portfolio_link}" target="_blank">{$adminLangParams.PORTFOLIO_SHOW}</a>
	{/if}
	</td>
	<td align="center" style=" width:120px;">
		<a href="/admin/portfolio/modifyportfolio/portfolio_id/{$item.portfolio_id}">{$adminLangParams.ACTION_EDIT}</a> | 
		<a href="/admin/portfolio/delete/portfolio_id/{$item.portfolio_id}"  onclick="return confirm({$adminLangParams.NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN})">{$adminLangParams.ACTION_DELETE}</a>
	</td>
</tr>
{foreachelse}
<tr>
	<td colspan="5"><b>No items found</b></td>
</tr>	
{/foreach}
<tr>
	<td colspan="5" class="header" style="padding:5px 5px 5px 5px;"><a href="/admin/portfolio/addportfolio">{$adminLangParams.PORTFOLIO_ADD_PORTFOLIO}</a></td>
</tr>
<tr>
	<td align="left" colspan="5" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/portfolio/paging.tpl'}
	</td>
</tr>
</table>
{literal}
<script type="text/javascript">
function changeSection(){
	document.location.href="/admin/portfolio/index/page/1/section_id/"+$("#section_id").val()+"/category_id/0";	
}
function changeCategory(){
	document.location.href="/admin/portfolio/index/page/1/section_id/"+$("#section_id").val()+"/category_id/"+$("#category_id").val();	
}
</script>
{/literal}
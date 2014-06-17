<br />
<center><span style="font-size:16px;">{$adminLangParams.TTHEMES__HEADER}</span></center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="3" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/tthemes/paging.tpl'}
	</td>
</tr>
<tr>
	<td colspan="3" class="header"><a href="/admin/tthemes/add">{$adminLangParams.TTHEMES__ADD}</a></td>
</tr>

<tr><td colspan="3" height="4" style="line-height:5px;">&nbsp;</td></tr>
<tr>
	<td class="header"><b>{$adminLangParams.TTHEMES__TITLE}</b></td>
	<td class="header"><b>{$adminLangParams.TTHEMES__PRICE}</b></td>
	<td class="header" width="150" align="center"><b>{$adminLangParams.TTHEMES__ACTION}</b></td>
</tr>
{foreach name=pages_loop from=$tthemes item=item}
<tr bgcolor="{cycle values='#FFEFAA,#ffffff'}">
	<td style="padding:5px 5px 5px 5px; width:400px;">{$item.title|stripslashes}</td>
	<td style="padding:5px 5px 5px 5px;">{$item.price|stripslashes}</td>
	<td align="center"><a href="/admin/tthemes/modify/id/{$item.id}">{$adminLangParams.ACTION_EDIT}</a> | <a href="/admin/tthemes/delete/id/{$item.id}" onclick="return confirm({$adminLangParams.NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN})">{$adminLangParams.ACTION_DELETE}</a></td>
</tr>
<tr><td colspan="3" height="4" style="line-height:5px;">&nbsp;</td></tr>
{foreachelse}
<tr>
	<td colspan="3"><b>{$adminLangParams.TTHEMES__NO_TTHEMES_FOUND}</b></td>
</tr>	
{/foreach}
<tr>
	<td colspan="3" class="header"><a href="/admin/tthemes/add">{$adminLangParams.TTHEMES__ADD}</a></td>
</tr>
<tr>
	<td align="left" colspan="3" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/tthemes/paging.tpl'}
	</td>
</tr>
</table>
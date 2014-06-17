<br />
<center><span style="font-size:16px;">Catalog</span></center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/links/paging.tpl'}
	</td>
</tr>
<tr>
	<td colspan="4" class="header"><a href="/admin/links/addlink">Add Link</a></td>
</tr>

<tr><td colspan="4" height="4" style="line-height:5px;">&nbsp;</td></tr>
<tr>
	<td class="header"><b>Title</b></td>
	<td class="header"><b>Description</b></td>
	<td class="header" align="center"><b>Link</b></td>
	<td class="header" width="80" align="center"><b>Action</b></td>
</tr>
{foreach name=pages_loop from=$links item=item}
<tr bgcolor="{cycle values='#FFEFAA,#ffffff'}">
	<td style="padding:5px 5px 5px 5px; width:400px;">{$item.title|stripslashes}</td>
	<td style="padding:5px 5px 5px 5px;">{$item.description|stripslashes|strip_tags|replace:"&nbsp;":""|truncate:200}</td>
	<td style="padding:5px 5px 5px 5px; width:200px;" align="center">
		<a href="{$item.url|stripslashes}" target="_blank">click to redirect</a>
	</td>
	<td align="center" style="padding:5px 5px 5px 5px; width:150px;"><a href="/admin/links/modify/id/{$item.id}">Edit</a> | <a href="/admin/links/delete/id/{$item.id}" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></td>
</tr>
<tr><td colspan="4" height="4" style="line-height:5px;">&nbsp;</td></tr>
{foreachelse}
<tr>
	<td colspan="4"><b>No links found</b></td>
</tr>	
{/foreach}
<tr>
	<td colspan="4" class="header"><a href="/admin/links/addlink">Add Link</a></td>
</tr>
<tr>
	<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/links/paging.tpl'}
	</td>
</tr>
</table>
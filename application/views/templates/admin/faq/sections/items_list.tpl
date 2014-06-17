<br />
<center><span style="font-size:16px;">Faq -> Sections</span></center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="3" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/faq/sections/paging.tpl'}
	</td>
</tr>
<tr>
	<td colspan="3" class="header">
		<a href="/admin/faq/addsection">Add Section</a>
	</td>
</tr>

<tr><td colspan="3" height="4" style="line-height:5px;">&nbsp;</td></tr>
<tr>
	<td class="header"><b>Title</b></td>
	<td class="header"><b>Description</b></td>
	<td class="header" width="80" align="center"><b>Action</b></td>
</tr>
{foreach from=$faq_sections item=item}
<tr bgcolor="{cycle values='#FFEFAA,#ffffff'}">
	<td style="padding:5px 5px 5px 5px; width:400px;">{$item.title|stripslashes}</td>
	<td style="padding:5px 5px 5px 5px;">{$item.description|stripslashes|strip_tags|replace:"&nbsp;":""|truncate:200}</td>
	<td align="center" style="padding:5px 5px 5px 5px; width:150px;"><a href="/admin/faq/modifysection/id/{$item.id}">Edit</a> | <a href="/admin/faq/deletesection/id/{$item.id}" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></td>
</tr>
<tr><td colspan="3" height="4" style="line-height:5px;">&nbsp;</td></tr>
{foreachelse}
<tr>
	<td colspan="3"><b>No faq sections found</b></td>
</tr>	
{/foreach}
<tr>
	<td colspan="3" class="header"><a href="/admin/faq/addsection">Add Section</a></td>
</tr>
<tr>
	<td align="left" colspan="3" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/faq/sections/paging.tpl'}
	</td>
</tr>
</table>
{literal}
<script type="text/javascript">
function changeLang(){
	var lang_id = document.getElementById('lang').value;
	document.location.href = "/admin/faq/sections/page/1/lang_id/"+lang_id;
	
}

</script>
{/literal}
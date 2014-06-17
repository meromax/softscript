<br />
<center><span style="font-size:16px;">Faq -> Content</span></center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/faq/content/paging.tpl'}
	</td>
</tr>
<tr>
	<td colspan="4" class="header">
		<table>
		<tr>
			<td>
				<a href="/admin/faq/additem">Add Item</a>&nbsp;&nbsp;
			</td>
			<td>
				<form name="sections_form" action="/admin/faq/content/page/1" method="POST">
				<select name="section" id="section" onchange="chnageSection();">
					<option value="0"> ---------------- </option>
					{foreach from=$sections item=item}
						<option value="{$item.id}" {if $item.id==$cur_section_id} selected {/if}>{$item.title|stripslashes|strip_tags}</option>
					{/foreach}
				</select>
				</form>
			</td>
		</tr>
		</table>
	</td>
</tr>

<tr><td colspan="4" height="4" style="line-height:5px;">&nbsp;</td></tr>
<tr>
	<td class="header"><b>Title</b></td>
	<td class="header"><b>Description</b></td>
	<td class="header" width="80" align="center"><b>Action</b></td>
</tr>
{foreach from=$faq_content item=item}
<tr bgcolor="{cycle values='#FFEFAA,#ffffff'}">
	<td style="padding:5px 5px 5px 5px; width:400px;">{$item.title|stripslashes}</td>
	<td style="padding:5px 5px 5px 5px;">{$item.description|stripslashes|strip_tags|replace:"&nbsp;":""|truncate:200}</td>
	<td align="center" style="padding:5px 5px 5px 5px; width:150px;"><a href="/admin/faq/modifyitem/id/{$item.id}">Edit</a> | <a href="/admin/faq/deleteitem/id/{$item.id}" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></td>
</tr>
<tr><td colspan="4" height="4" style="line-height:5px;">&nbsp;</td></tr>
{foreachelse}
<tr>
	<td colspan="4"><b>No items found</b></td>
</tr>	
{/foreach}
<tr>
	<td colspan="4" class="header"><a href="/admin/faq/additem">Add Item</a></td>
</tr>
<tr>
	<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/faq/content/paging.tpl'}
	</td>
</tr>
</table>
{literal}
<script type="text/javascript">
function chnageSection(){
	document.forms.sections_form.submit();
}
</script>
{/literal}
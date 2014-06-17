<br />
<center><span style="font-size:16px;">{$adminLangParams.MEMBERS_HEADER}</span></center>
<br />
<table width="100%">
<tr>
	<td>
		<table align="left" width="100%" >
			<tr>
				<td class="header" nowrap="nowrap" style="padding:5px 5px 5px 5px;">{$adminLangParams.MEMBERS_NAME}</td>
				<td class="header" nowrap="nowrap"  style="width:350px; padding:5px 5px 5px 5px;">{$adminLangParams.MEMBERS_EMAIL}</td>
				<td class="header" nowrap="nowrap"  align="center" style="width:100px; padding:5px 5px 5px 5px;">{$adminLangParams.MEMBERS_DATE}</td>
				<td class="header" nowrap="nowrap"  align="center" style="width:100px; padding:5px 5px 5px 5px;">{$adminLangParams.MEMBERS_ACTIVE}</td>
				<td class="header"  nowrap="nowrap" align="center" style="width:150px; padding:5px 5px 5px 5px;">{$adminLangParams.MEMBERS_ACTION}</td>
			</tr>
			{foreach from=$items item=item}
			<tr  bgcolor="{cycle values="#ffffff,#c5c5c5"}">
				<td nowrap="nowrap" style="padding:5px 5px 5px 5px;">{$item.member_firstname} {$item.member_lastname}</td>
				<td nowrap="nowrap" style="padding:5px 5px 5px 5px;">{$item.member_email}</td>
				<td nowrap="nowrap" align="center" style="padding:5px 5px 5px 5px;">{$item.member_creation_date|date_format:"%m/%d/%Y"}</td>
				<td nowrap="nowrap" align="center" style="padding:5px 5px 5px 5px;">
				    <a href="/admin/members/changeactive/id/{$item.member_id}" title="Change status" style="text-decoration:none;">
			    	{if $item.member_active eq 0 }
			      		<span style="color:red; font-weight:bold;">
			      			<img src="/images/passive.png" border="0" />
			      		</span>
			    	{else}
			      		<span style="color:green; font-weight:bold;">
			      			<img src="/images/active.png" border="0" />
			      		</span>
			    	{/if}
			    	</a>
				</td>
				<td nowrap="nowrap" align="center" style="padding:5px 5px 5px 5px;">
					<a href="/admin/members/view/id/{$item.member_id}">{$adminLangParams.ACTION_VIEW}</a>&nbsp;|&nbsp;
					<a href="/admin/members/delete/id/{$item.member_id}"  onclick="return confirm({$adminLangParams.NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN})">{$adminLangParams.ACTION_DELETE}</a>
				</td>
			</tr>
			{foreachelse}
			<tr>
				<td colspan="5"><b>No members found</b></td>
			</tr>	
			{/foreach}
		</table>
	</td>
</tr>
<tr>
	<td>
		<table align="left">
		<tr>
			<td>
				{include file='admin/members/paging.tpl'}
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>
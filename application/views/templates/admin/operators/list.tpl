<br />
<center><span style="font-size:16px;">{$adminLangParams.OPERATORS__HEADER}</span></center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/operators/paging.tpl'}
	</td>
</tr>

<tr>
	<td colspan="4" class="header"><a href="/admin/operators/add">{$adminLangParams.OPERATORS__ADD}</a></td>
</tr>

<tr><td colspan="4" height="4" style="line-height:5px;">&nbsp;</td></tr>
<tr>
	<td class="header"><b>{$adminLangParams.OPERATORS__NAME}</b></td>
	<td class="header" align="center"><b>{$adminLangParams.OPERATORS__EMAIL}</b></td>
	<td class="header" align="center"><b>{$adminLangParams.OPERATORS__STATUS}</b></td>
	<td class="header" width="150" align="center"><b>{$adminLangParams.OPERATORS__ACTION}</b></td>
</tr>
{foreach name=pages_loop from=$operators item=item}
<tr bgcolor="{cycle values='#FFEFAA,#ffffff'}">
	<td style="padding:5px 5px 5px 5px; width:400px;">{$item.name|stripslashes}</td>
	<td style="padding:5px 5px 5px 5px;" width="200" align="center">
		{$item.email}
	</td>
	<td style="padding:5px 5px 5px 5px;" width="100" align="center">
		{if $item.active==1}
			<a href="javascript:void(0);" onclick="changeOperatorStatus('{$item.id}');" id="status_link{$item.id}"><span style="font-weight:bold; color:#006600;">{$adminLangParams.OPERATORS__STATUS_ITEM2}</span></a>
		{else}
			<a href="javascript:void(0);" onclick="changeOperatorStatus('{$item.id}');" id="status_link{$item.id}"><span style="font-weight:bold; color:#660000;">{$adminLangParams.OPERATORS__STATUS_ITEM1}</span></a>
		{/if}
	</td>	
	<td align="center"><a href="/admin/operators/modify/id/{$item.id}">{$adminLangParams.OPERATORS__MODIFY}</a> | <a href="/admin/operators/delete/id/{$item.id}" onclick="return confirm({$adminLangParams.OPERATORS__DELETE_OPERATOR})">{$adminLangParams.ACTION_DELETE}</a></td>
</tr>
<tr><td colspan="4" height="4" style="line-height:5px;">&nbsp;</td></tr>
{foreachelse}
<tr>
	<td colspan="4"><b>{$adminLangParams.OPERATORS__NO_OPERATORS_FOUND}</b></td>
</tr>	
{/foreach}

<tr>
	<td colspan="4" class="header"><a href="/admin/operators/add">{$adminLangParams.OPERATORS__ADD}</a></td>
</tr>

<tr>
	<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/operators/paging.tpl'}
	</td>
</tr>
</table>
<input type="hidden" id="status1" value="{$adminLangParams.OPERATORS__STATUS_ITEM1}">
<input type="hidden" id="status2" value="{$adminLangParams.OPERATORS__STATUS_ITEM2}">
{literal}
<script type="text/javascript">
function changeOperatorStatus(user_id){
	$.post("/admin/operators/change-operator-status", {id:user_id},
		function(data) {
   			if(data==1){
				$("#status_link"+user_id).html("<span style='font-weight:bold; color:#006600;'>"+$("#status2").val()+"</span>");
   			} else {
   				$("#status_link"+user_id).html("<span style='font-weight:bold; color:#660000;'>"+$("#status1").val()+"</span>");
   			}
		}
	);	
}
</script>
{/literal}
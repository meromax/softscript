<br />
<center><span style="font-size:16px;">Отзывы</span></center>
<br />
<table align="center" width="97%" class="cont2">
<tr>
	<td align="left" colspan="5" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/reviews/paging.tpl'}
	</td>
</tr>
<!--
<tr>
	<td colspan="5" class="header"><a href="/admin/reviews/addnew">{$adminLangParams.REVIEWS__ADD}</a></td>
</tr>
-->
<tr>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>Отзыв</b></td>
	<td class="header" align="center"><b>Пользователь</b></td>
	<td class="header" align="center"><b>Дата</b></td>
	<td class="header" align="center"><b>Статус</b></td>
	<td class="header" width="150" align="center"><b>Действия</b></td>
</tr>
{foreach name=pages_loop from=$reviews item=item}
<tr bgcolor="{cycle values='#ffffff, #eeeeee'}">
	<td style="padding:5px 5px 5px 5px;">{$item.text|strip_tags|stripslashes}</td>
	<td style="padding:5px 5px 5px 5px;" width="150" align="center">
		<a href="/admin/users/view/id/{$item.user_id}">
			{$item.first_name|strip_tags|stripslashes} {$item.last_name|strip_tags|stripslashes}
		</a>
	</td>
	<td style="padding:5px 5px 5px 5px;" width="150" align="center">{$item.post_date}</td>
	<td style="padding:5px 5px 5px 5px;" width="100" align="center">
		{if $item.active==1}
			<a href="javascript:void(0);" onclick="changeReviewStatus('{$item.id}');" id="status_link{$item.id}"><span style="font-weight:bold; color:#006600;">активный</span></a>
		{else}
			<a href="javascript:void(0);" onclick="changeReviewStatus('{$item.id}');" id="status_link{$item.id}"><span style="font-weight:bold; color:#660000;">не активный</span></a>
		{/if}
	</td>	
	<td align="center"><!--<a href="/admin/reviews/modify/id/{$item.id}">{$adminLangParams.ACTION_EDIT}</a> | --><a href="/admin/reviews/delete/id/{$item.id}" onclick="return confirm({$adminLangParams.NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN})">{$adminLangParams.ACTION_DELETE}</a></td>
</tr>
{foreachelse}
<tr>
	<td colspan="5"><b>Нет ни одного отзыва...</b></td>
</tr>	
{/foreach}
<!--
<tr>
	<td colspan="5" class="header"><a href="/admin/reviews/add">{$adminLangParams.REVIEWS__ADD}</a></td>
</tr>
-->
<tr>
	<td align="left" colspan="5" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/reviews/paging.tpl'}
	</td>
</tr>
</table>
<input type="hidden" id="status1" value="{$adminLangParams.REVIEWS__STATUS_ITEM1}">
<input type="hidden" id="status2" value="{$adminLangParams.REVIEWS__STATUS_ITEM2}">
{literal}
<script type="text/javascript">
function changeReviewStatus(review_id){
	$.post("/admin/reviews/change-review-status", {id:review_id},
		function(data) {
   			if(data==1){
				$("#status_link"+review_id).html("<span style='font-weight:bold; color:#006600;'>активный</span>");
   			} else {
   				$("#status_link"+review_id).html("<span style='font-weight:bold; color:#660000;'>не активный</span>");
   			}
		}
	);	
}
</script>
{/literal}
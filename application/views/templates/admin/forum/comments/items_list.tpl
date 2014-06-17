<br />
<br />
<table width="98%" style="margin-top:20px; border:0px;"  class="cont2">
<tr>
    <td style="border: 0px; width: 20px;">&nbsp;</td>
	<td width="20%" style="padding:5px 5px 5px 5px; border:1px solid #c5c5c5;" valign="top">
		{include file='admin/forum/comments/topic_view.tpl'}
	</td>
	<td valign="top" width="80%" style="border:0px;">
		<center><span style="font-size:16px;">Форум->Комментарии</span></center>
		<br />
		<div id="gallery">
		<table align="center" width="97%">
        {if $countpage>1}
		<tr>
			<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
				{include file='admin/forum/comments/paging.tpl'}
			</td>
		</tr>
        {/if}

		<tr>
			<td class="header"><b>{$adminLangParams.CATEGORIES_TITLE}</b></td>
			<td class="header" align="center"><b>Дата</b></td>
            <td class="header" width="80" align="center"><b>Доступно</b></td>
			<td class="header" width="80" align="center"><b>{$adminLangParams.SECTIONS_ACTION}</b></td>
		</tr>
		{foreach from=$comments item=item}
		<tr bgcolor="#ffffff">
			<td style="padding:5px 5px 5px 5px;">
                <b>{$item.username|stripslashes}</b><br />
                {$item.description|stripslashes|strip_tags}
			</td>
			<td style="padding:5px 5px 5px 5px; width:80px;" align="center">{$item.post_date}</td>
            <td style="padding:5px 5px 5px 5px; width:80px;" align="center">
                {if $item.active==1}
                    <a href="javascript:void(0);" onclick="changeForumCommentActive('{$item.id}');" id="status_link{$item.id}"><img src="/images/active.png" /></a>
                    {else}
                    <a href="javascript:void(0);" onclick="changeForumCommentActive('{$item.id}');" id="status_link{$item.id}"><img src="/images/passive.png" /></a>
                {/if}
            </td>
			<td align="center" style="padding:5px 5px 5px 5px; width:80px;">
				<a href="/admin/forum/delete-comment/forum_id/{$forum.id}/comment_id/{$item.id}" onclick="return confirm('Вы уверены, что хотите удалить комментарий?')">{$adminLangParams.ACTION_DELETE}</a>
			</td>
		</tr>
		{foreachelse}
		<tr>
			<td colspan="4"><b>Нет ни одного комментария...</b></td>
		</tr>	
		{/foreach}
		{*<tr>*}
			{*<td colspan="4" class="header"><a href="/admin/sections/addcategory/section_id/{$section_id}/content_page_id/{$content_page_id}/spage/{$spage}">{$adminLangParams.CATEGORIES_ADD}</a></td>*}
		{*</tr>*}
        {if $countpage>1}
		{*<tr>*}
			{*<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">*}
				{*{include file='admin/sections/categories/paging.tpl'}*}
			{*</td>*}
		{*</tr>*}
         {/if}
		</table>
		</div>
	
	</td>
</tr>
</table>
{literal}
<script type="text/javascript">
    function chnagePage(){
        document.location.href="/admin/sections/index/content_page_id/"+$("#content_page_id").val()+"/page/1";
    }

    function changeForumCommentActive(commentId){

        $.post("/admin/forum/change-comment-active", {id:commentId},
                function(data) {
                    if(data==1){
                        $("#status_link"+commentId).html('<img src="/images/active.png" />');
                    } else {
                        $("#status_link"+commentId).html('<img src="/images/passive.png" />');
                    }

                }
        );
    }
</script>
{/literal}

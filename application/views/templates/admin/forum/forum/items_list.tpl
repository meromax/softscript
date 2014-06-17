<br />
<center><span style="font-size:16px;">Форум</span></center>
<br />
<div id="gallery">
<table align="center" width="97%" class="cont2">
{if $countpage>1}
<tr>
	<td align="left" colspan="6" style="padding:5px 5px 5px 5px;">
		{include file='admin/forum/forum/paging.tpl'}
	</td>
</tr>
{/if}

<tr>
	<td colspan="6" class="header">
		<a href="/admin/forum/add-forum">Добавить</a>
	</td>
</tr>

<tr>
	<td class="header"><b>Заголовок</b></td>
	<td class="header" align="center"><b>Короткое описание</b></td>
	<td class="header" width="80" align="center"><b>Дата</b></td>
	<td class="header" width="80" align="center"><b>Комментарии</b></td>
    <td class="header" width="80" align="center"><b>Доступно</b></td>
	<td class="header" width="80" align="center"><b>Действия</b></td>
</tr>
{foreach from=$sections item=item}
<tr bgcolor="{cycle values='#ffffff,#EEEEEE'}">
	<td style="padding:5px 5px 5px 5px; width: 350px;">{$item.title|stripslashes}</td>
	<td style="padding:5px 5px 5px 5px;">{$item.description_short|stripslashes|strip_tags}</td>
	<td align="center" style="padding:5px 5px 5px 5px; width:80px;">{$item.post_date|stripslashes}</td>
	<td align="center" style="padding:5px 5px 5px 5px; width:80px;">
        <a href="/admin/forum/comments/forum_id/{$item.id}/spage/{$page}/page/0">Смотреть</a>
    </td>
    <td style="padding:5px 5px 5px 5px;" width="100" align="center">
        {if $item.active==1}
            <a href="javascript:void(0);" onclick="changeActive('{$item.id}');" id="status_link{$item.id}"><img src="/images/active.png" /></a>
            {else}
            <a href="javascript:void(0);" onclick="changeActive('{$item.id}');" id="status_link{$item.id}"><img src="/images/passive.png" /></a>
        {/if}
    </td>
	<td align="center" style="padding:5px 5px 5px 5px; width:150px;">
        <a href="/admin/forum/modify-forum/id/{$item.id}">{$adminLangParams.ACTION_EDIT}</a>
            &nbsp;|&nbsp;
        <a href="/admin/forum/delete-forum/id/{$item.id}" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')">{$adminLangParams.ACTION_DELETE}</a>
	</td>
</tr>
{foreachelse}
<tr>
	<td colspan="6"><b>Нет ни одной записи...</b></td>
</tr>	
{/foreach}
<tr>
	<td colspan="6" class="header"><a href="/admin/forum/add-forum">Добавить</a></td>
</tr>
{if $countpage>1}
    <tr>
        <td align="left" colspan="6" style="padding:5px 5px 5px 5px;">
        {include file='admin/forum/forum/paging.tpl'}
        </td>
    </tr>
{/if}
</table>
</div>
{literal}
<script type="text/javascript">
    function changeActive(forumId){

        $.post("/admin/forum/change-forum-active", {id:forumId},
                function(data) {
                    if(data==1){
                        $("#status_link"+forumId).html('<img src="/images/active.png" />');
                    } else {
                        $("#status_link"+forumId).html('<img src="/images/passive.png" />');
                    }

                }
        );
    }
</script>
{/literal}
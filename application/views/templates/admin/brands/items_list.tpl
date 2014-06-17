<br />
<center><span style="font-size:16px;">Бренды</span></center>
<br />
<div id="gallery">
<table align="center" width="97%" class="cont2">
{if $countpage>1}
<tr>
	<td align="left" colspan="3" style="padding:5px 5px 5px 5px;">
		{include file='admin/brands/paging.tpl'}
	</td>
</tr>
{/if}

<tr>
	<td colspan="3" class="header">
		<a href="/admin/brands/add">Добавить</a>
	</td>
</tr>

<tr>
	<td class="header"><b>{$adminLangParams.SECTIONS_TITLE}</b></td>
	<td class="header" width="150" align="center"><b>Дата добавления</b></td>
	<td class="header" width="200" align="center"><b>{$adminLangParams.SECTIONS_ACTION}</b></td>
</tr>
{foreach from=$sections item=item}
<tr bgcolor="{cycle values='#ffffff,#EEEEEE'}">
	<td style="padding:5px 5px 5px 5px;">{$item.title|stripslashes}</td>
	<td style="padding:5px 5px 5px 5px; width:60px;" align="center">{$item.post_date}</td>

	<td align="center" style="padding:5px 5px 5px 5px; width:150px;">
        <a href="/admin/brands/modify/id/{$item.id}">{$adminLangParams.ACTION_EDIT}</a>
            &nbsp;|&nbsp;
        <a href="/admin/brands/delete/id/{$item.id}" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')">{$adminLangParams.ACTION_DELETE}</a>
	</td>
</tr>
{foreachelse}
<tr>
	<td colspan="3">
        <b>Нет ни одной записи...</b>
    </td>
</tr>	
{/foreach}
<tr>
	<td colspan="3" class="header">
        <a href="/admin/brands/add">Добавить</a>
	</td>
</tr>
{if $countpage>1}
    <tr>
        <td align="left" colspan="5" style="padding:5px 5px 5px 5px;">
        {include file='admin/brands/paging.tpl'}
        </td>
    </tr>
{/if}
</table>
</div>
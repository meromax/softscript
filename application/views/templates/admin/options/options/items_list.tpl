<br />
<center><span style="font-size:16px;">Опции товара</span></center>
<br />
<div id="gallery">
<table align="center" width="97%" class="cont2">
{if $countpage>1}
<tr>
	<td align="left" colspan="4" style="padding:5px 5px 5px 5px;">
        {include file='admin/options/options/paging.tpl'}
	</td>
</tr>
{/if}

<tr>
	<td colspan="4" class="header">
		<a href="/admin/options/add-option">Добавить</a>
	</td>
</tr>

<tr>
	<td class="header"><b>{$adminLangParams.SECTIONS_TITLE}</b></td>
	{*<td class="header" width="80" align="center"><b>{$adminLangParams.TITLE_POSITION}</b></td>*}
    <td class="header" width="120" align="center"><b>Значения</b></td>
    <td class="header" width="120" align="center"><b>Число значений</b></td>
	<td class="header" width="180" align="center"><b>{$adminLangParams.SECTIONS_ACTION}</b></td>
</tr>
{foreach from=$options item=item}
<tr bgcolor="{cycle values='#ffffff,#EEEEEE'}">
	<td style="padding:5px 5px 5px 5px;">{$item.title|stripslashes}</td>
	{*<td style="padding:5px 5px 5px 5px; width:60px;" align="center">{$item.position}</td>*}
	<td align="center" style="padding:5px 5px 5px 5px; width:150px;"><a href="/admin/options/properties/option_id/{$item.id}/spage/{$page}/page/0">{$adminLangParams.ACTION_EDIT}</a></td>
    <td style="padding:5px 5px 5px 5px; width:120px; {if $item.count>0}font-weight: bold;{/if}" align="center">{$item.count}</td>
	<td align="center" style="padding:5px 5px 5px 5px; width:150px;">
        <a href="/admin/options/modify-option/id/{$item.id}">{$adminLangParams.ACTION_EDIT}</a>
            &nbsp;|&nbsp;
        <a href="/admin/options/delete-option/id/{$item.id}" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')">{$adminLangParams.ACTION_DELETE}</a>
	</td>
</tr>
{foreachelse}
<tr>
	<td colspan="4"><b>Ни одной записи не найдено...</b></td>
</tr>	
{/foreach}
<td colspan="4" class="header">
    <a href="/admin/options/add-option">Добавить</a>
</td>
{if $countpage>1}
    <tr>
        <td align="left" colspan="4" style="padding:5px 5px 5px 5px;">
        {include file='admin/options/options/paging.tpl'}
        </td>
    </tr>
{/if}
</table>
</div>
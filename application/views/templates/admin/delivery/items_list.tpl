<br />
<center><span style="font-size:16px;">Доставка</span></center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="4" style="padding:5px 5px 5px 5px;">
		{include file='admin/delivery/paging.tpl'}
	</td>
</tr>
<tr>
	<td colspan="4" class="header" style="padding:5px 5px 5px 5px;"><a href="/admin/delivery/add">Добавить пункт назначения</a></td>
</tr>

<tr>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>Пункт назначения</b></td>
	<td class="header" style="padding:5px 5px 5px 5px; width: 150px;"><b>Цена (руб.)</b></td>
	<td class="header" style="padding:5px 5px 5px 5px; width: 150px;" align="center"><b>Позиция</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;" width="150" align="center"><b>Действия</b></td>
</tr>
{foreach from=$destinations item=item}
<tr bgcolor="{cycle values='#FFEFAA,#ffffff'}">
	<td style="padding:5px 5px 5px 5px;">{$item.destination|stripslashes}</td>
	<td style="padding:5px 5px 5px 5px;">{$item.price|stripslashes|strip_tags}</td>
    <td style="padding:5px 5px 5px 5px;" align="center">{$item.position|stripslashes|strip_tags}</td>
	<td align="center" style="padding:5px 5px 5px 5px; width:150px;">
        <a href="/admin/delivery/modify/id/{$item.id}">Изменить</a> | <a href="/admin/delivery/delete/id/{$item.id}" onclick="return confirm('Вы уверены, что хотите удалить это пункт назначения?')">Удалить</a>
    </td>
</tr>
{foreachelse}
<tr>
	<td colspan="4"><b>Ни одного пункта не найдено...</b></td>
</tr>	
{/foreach}
    <tr>
        <td colspan="4" class="header" style="padding:5px 5px 5px 5px;"><a href="/admin/delivery/add">Добавить пункт назначения</a></td>
    </tr>
<tr>
	<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
        {include file='admin/delivery/paging.tpl'}
	</td>
</tr>
</table>
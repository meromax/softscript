<br />
<center><span style="font-size:16px;">Документы</span></center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="6" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/files/paging.tpl'}
	</td>
</tr>
<tr>
    <td colspan="6" class="header" style="padding:5px 5px 5px 5px;"><a href="/admin/files/add-file">Добавить файл</a></td>
</tr>
<tr>
    <td class="header" style="padding:5px 5px 5px 5px;" width="50"><b>Тип</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.FILES_TITLE}</b></td>
	<td class="header" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.FILES_DESCRIPTION}</b></td>
    <td class="header" width="80" style="padding:5px 5px 5px 5px;" align="center"><b>Позиция</b></td>
	<td class="header" width="80" style="padding:5px 5px 5px 5px;" align="center"><b>{$adminLangParams.FILES_FILE}</b></td>
	<td class="header" width="80" align="center" style="padding:5px 5px 5px 5px;"><b>{$adminLangParams.FILES_ACTION}</b></td>
</tr>
{foreach from=$files item=file_item}
<tr bgcolor="{cycle values='#eeeeee,#ffffff'}">
    <td width="50" align="center">
        <img src="/images/icons/{$file_item.file_ext}.png" width="50" />
    </td>
	<td style="padding:5px 5px 5px 5px; width:400px;">{$file_item.title|stripslashes}</td>
	<td style="padding:5px 5px 5px 5px;">{$file_item.description}</td>
    <td style="padding:5px 5px 5px 5px; text-align: center;">{$file_item.position}</td>
	<td align="center" style="padding:5px 5px 5px 5px;" width="100" height="45">
		{if $file_item.file_name!=""}
			<a href="/admin/files/getfile/id/{$file_item.id}">Скачать файл</a>
		{/if}
	</td>
	<td align="center" nowrap="nowrap" width="180">
		<a href="/admin/files/modify-file/id/{$file_item.id}">{$adminLangParams.ACTION_EDIT}</a>
        |
		<a href="/admin/files/delete/id/{$file_item.id}" onclick="return confirm({$adminLangParams.NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN})">{$adminLangParams.ACTION_DELETE}</a>
	</td>
</tr>
{*<tr><td colspan="4" height="4" style="line-height:5px;">&nbsp;</td></tr>*}
{foreachelse}
<tr>
	<td colspan="6"><b>Ни одного файла не найдено...</b></td>
</tr>	
{/foreach}
<tr>
    <td colspan="6" class="header" style="padding:5px 5px 5px 5px;"><a href="/admin/files/add-file">Добавить файл</a></td>
</tr>
<tr>
	<td align="left" colspan="6" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/files/paging.tpl'}
	</td>
</tr>
</table>
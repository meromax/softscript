<br />
<br />
<table width="98%" style="margin-top:20px;"  class="cont2">
<tr>
	<td width="20px;">&nbsp;</td>
	<td width="20%" style="padding:5px 5px 5px 5px; border:1px solid #c5c5c5;" valign="top">
		{include file='admin/options/options/view.tpl'}
	</td>
	<td valign="top" width="80%" style="border:0px;">
		<center><span style="font-size:16px;">Значения</span></center>
		<br />
		<div id="gallery">
		<table align="center" width="97%">
        {if $countpage>1}
		<tr>
			<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
				{include file='admin/options/properties/paging.tpl'}
			</td>
		</tr>
        {/if}
		<tr>
            <td colspan="4" class="header"><a href="/admin/options/add-property/option_id/{$option_id}/spage/{$spage}/page/{$page}">Добавить</a></td>
		</tr>
		<tr>
			<td class="header"><b>{$adminLangParams.CATEGORIES_TITLE}</b></td>
			<td class="header" width="80" align="center"><b>{$adminLangParams.TITLE_POSITION}</b></td>
			<td class="header" width="80" align="center"><b>{$adminLangParams.SECTIONS_ACTION}</b></td>
		</tr>
		{foreach from=$properties item=item}
		<tr bgcolor="{cycle values='#ffffff,#EEEEEE'}">
			<td style="padding:5px 5px 5px 5px;">{$item.title|stripslashes}</td>
			<td style="padding:5px 5px 5px 5px; width:60px;" align="center">{$item.position}</td>
			<td align="center" style="padding:5px 5px 5px 5px; width:150px;">
				<a href="/admin/options/modify-property/id/{$item.id}/option_id/{$option_id}/spage/{$spage}/page/{$page}">{$adminLangParams.ACTION_EDIT}</a> |
				<a href="/admin/options/delete-property/id/{$item.id}/option_id/{$option_id}/spage/{$spage}/page/{$page}" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')">{$adminLangParams.ACTION_DELETE}</a>
			</td>
		</tr>
		{foreachelse}
		<tr>
			<td colspan="4"><b>Ни одной записи не найдено...</b></td>
		</tr>	
		{/foreach}
		<tr>
			<td colspan="4" class="header"><a href="/admin/options/add-property/option_id/{$option_id}/spage/{$spage}/page/{$page}">Добавить</a></td>
		</tr>
        {if $countpage>1}
		<tr>
			<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
            {include file='admin/options/properties/paging.tpl'}
			</td>
		</tr>
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
</script>
{/literal}
{if $countpage>1}
<b>{$adminLangParams.TITLE_PAGES}: </b>
	{section name=item start=1 loop=$countpage+1 }
	      {if $page eq $smarty.section.item.index }
	        <span id="active_page">{$page}</span>
	      {else}
	        <a href="/admin/price/index/page/{$smarty.section.item.index}" style="font-weight:normal;"><b>{$smarty.section.item.index}</b></a>
	      {/if}
	      {if $smarty.section.item.index != $countpage }
	        <!--&nbsp;|&nbsp;-->
	      {/if}
	{/section}
{/if}
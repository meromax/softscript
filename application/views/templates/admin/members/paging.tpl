{if $countpage>1}
	<br><b>{$adminLangParams.TITLE_PAGES}:</b>&nbsp;
	{section name=item start=1 loop=$countpage+1 }
	      {if $page eq $smarty.section.item.index }
	        <b>{$page}</b>
	      {else}
	        <a href="/admin/members/page/{$smarty.section.item.index}" style="font-weight:normal;">{$smarty.section.item.index}</a>
	      {/if}
	      {if $smarty.section.item.index != $countpage }
	        
	      {/if}
	{/section}
{/if}
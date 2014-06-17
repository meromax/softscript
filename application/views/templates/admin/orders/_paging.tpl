{if $countpage>1}
	<br>&nbsp;&nbsp;
	{section name=item start=1 loop=$countpage+1 }
	      {if $page eq $smarty.section.item.index }
	        <span id="active_page">{$page}</span>
	      {else}
	        <a href="/admin/orders/index/status/{$status}/page/{$smarty.section.item.index}" style="font-weight:normal;">{$smarty.section.item.index}</a>
	      {/if}
	      {if $smarty.section.item.index != $countpage }
	        &nbsp;|&nbsp;
	      {/if}
	{/section}
{/if}
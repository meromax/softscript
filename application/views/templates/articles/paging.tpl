{if $page_count>1}
<div class="pagination" style="margin-left: 30px;">
    <ul>
        {if $page_num == 1}
            <li><a href="javascript:void(0);" class="btn" style="background: #e0e0e0; cursor: default;"><span class="icon-chevron-left"></span></a></li>
        {else}
            <li><a href="{$pagingUrl}/{$page_num-1}" class="btn btn-primary" style="cursor: pointer;"><span class="icon-chevron-left"></span></a></li>
        {/if}
        {section name=item start=1 loop=$page_count+1}
            {if $page_num eq $smarty.section.item.index }
                <li class="active"><a href="javascript:void(0);">{$page_num}</a></li>
            {else}
                <li><a href="{$pagingUrl}/{$smarty.section.item.index}">{$smarty.section.item.index}</a></li>
            {/if}
        {/section}

        {if $page_num == $page_count}
            <li><a href="javascript:void(0);" class="btn" style="background: #e0e0e0; cursor: default;"><span class="icon-chevron-right"></span></a></li>
        {else}
            <li><a href="{$pagingUrl}/{$page_num+1}" class="btn btn-primary" style="cursor: pointer;"><span class="icon-chevron-right"></span></a></li>
        {/if}
    </ul>
</div>
{/if}

{if $countpage>1}
    <div class="row-fluid">
        <div class="span12">
            <div class="pagination" style="margin-top: 15px; margin-bottom: 0px;">
                <ul>
                    {if $page == 1}
                        <li class="prev disabled"><a href="javascript:void(0);">← <span class="hidden-480">Предыдущая</span></a></li>
                    {else}
                        <li class="prev"><a href="/admin/users/index/page/{$page-1}#">← <span class="hidden-480">Предыдущая</span></a></li>
                    {/if}
                    {section name=item start=1 loop=$countpage+1}
                        {if $page eq $smarty.section.item.index }
                            <li class="active"><a href="javascript:void(0);">{$page}</a></li>
                        {else}
                            <li><a href="/admin/users/index/page/{$smarty.section.item.index}">{$smarty.section.item.index}</a></li>
                        {/if}
                    {/section}
                    {if $page == $countpage}
                        <li class="next disabled"><a href="javascript:void(0);"><span class="hidden-480">Следующая</span> → </a></li>
                    {else}
                        <li class="next"><a href="/admin/users/index/page/{$page+1}"><span class="hidden-480">Следующая</span> → </a></li>
                    {/if}
                </ul>
            </div>
        </div>
    </div>
{/if}
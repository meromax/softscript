<div class="staticPageBox">
    <div class="pageTitle"><a href="/actions/page/1">Акции</a></div>
    <div class="pageText">
        <div class="reviewListBox" style="padding-top: 14px;">
        {foreach key=ikey from=$items item=item}
            {if $ikey>0}
                <div class="spliter"></div>
            {/if}
            <div class="item" style="border-top: 0px solid #cbcbcb; padding: 0px 0px 0px 0px;">
                <div class="name"><a href="/actions/view/{$item.link}">{$item.title|stripslashes|strip_tags}</a></div>
                <div class="date">{$item.post_date|date_format:"%d.%m.%Y"}</div>
                <div class="text"><a href="/actions/view/{$item.link}">{$item.description_short|stripslashes|strip_tags}</a></div>
            </div>
        {/foreach}
        </div>
        {if $page_count>1 }
            <div class="spliter"></div>
            <div class="item">
                <div class="paginator">
                    {section name=item start=1 loop=$page_count+1 }
                        {if $page_num eq $smarty.section.item.index }
                            <div class="pointActive">{$page_num}</div>
                            {else}
                            <a href="/actions/page/{$smarty.section.item.index}"><div class="point">{$smarty.section.item.index}</div></a>
                        {/if}
                        {if $smarty.section.item.index != $page_count }
                        {/if}
                    {/section}
                </div>
            </div>
        {/if}

    </div>
</div>
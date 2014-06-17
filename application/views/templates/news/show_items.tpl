<div class="staticPageBox">
    <div class="pageTitle"><a href="/news/page/1">Новости</a></div>
    <div class="pageText">
        {if $items}
            <div class="reviewListBox">
            {foreach key=nkey from=$items item=item}
                <div class="item" {if $nkey==0}style="border-top:0px!important;"{/if}>
                    <div class="name"><a href="/new{$item.new_id}.html">{$item.new_title|stripslashes|strip_tags}</a></div>
                    <div class="date">{$item.new_date|date_format:"%d.%m.%Y"}</div>
                    <div class="text"><a href="/new{$item.new_id}.html">{$item.new_description_short|stripslashes}</a></div>
                </div>
            {/foreach}

            {if $page_count>1 }
                <div class="item">
                    <div class="paginator">
                        {section name=item start=1 loop=$page_count+1 }
                            {if $page_num eq $smarty.section.item.index }
                                <div class="pointActive">{$page_num}</div>
                                {else}
                                <a href="/news/page/{$smarty.section.item.index}"><div class="point">{$smarty.section.item.index}</div></a>
                            {/if}
                            {if $smarty.section.item.index != $page_count }
                            {/if}
                        {/section}
                    </div>
                </div>
            {/if}
            </div>
        {else}
            Пока нет ни одной новости...
        {/if}
    </div>
</div>


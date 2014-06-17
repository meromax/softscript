<div class="topTextBlock">
    <div class="pageTitle">Форум</div>
    <div class="pageText">
        {foreach from=$items item=item}
            <div class="forum">
                <div class="head">
                    <a class="head_link" href="/forum/topic/{$item.id}.html">{$item.title|stripslashes}</a>
                </div>
                <div class="date">
                    {if $item.post_date|date_format:"%m"=='01'}
                        {assign var="monthName" value="января"}
                    {elseif  $item.post_date|date_format:"%m"=='02'}
                        {assign var="monthName" value="февраля"}
                    {elseif  $item.post_date|date_format:"%m"=='03'}
                        {assign var="monthName" value="марта"}
                    {elseif  $item.post_date|date_format:"%m"=='04'}
                        {assign var="monthName" value="апреля"}
                    {elseif  $item.post_date|date_format:"%m"=='05'}
                        {assign var="monthName" value="мая"}
                    {elseif  $item.post_date|date_format:"%m"=='06'}
                        {assign var="monthName" value="июня"}
                    {elseif  $item.post_date|date_format:"%m"=='07'}
                        {assign var="monthName" value="июля"}
                    {elseif  $item.post_date|date_format:"%m"=='08'}
                        {assign var="monthName" value="августа"}
                    {elseif  $item.post_date|date_format:"%m"=='09'}
                        {assign var="monthName" value="сентября"}
                    {elseif  $item.post_date|date_format:"%m"=='10'}
                        {assign var="monthName" value="октября"}
                    {elseif  $item.post_date|date_format:"%m"=='11'}
                        {assign var="monthName" value="ноября"}
                    {elseif  $item.post_date|date_format:"%m"=='12'}
                        {assign var="monthName" value="декабря"}
                    {/if}
                    {$item.post_date|date_format:"%d"} {$monthName} {$item.post_date|date_format:"%Y"}
                </div>
                <div>
                    <a class="text" href="/forum/topic/{$item.id}.html">{$item.description_short|stripslashes}</a>
                </div>
            </div>
        {/foreach}
        <div class="clear"></div>
        <div>
            {if $page_count>1 }
                <div style="font-size: 14px; float: left; padding-top: 0px; padding-right: 4px;">Страницы: </div>
                {section name=item start=1 loop=$page_count+1 }
                    {if $page_num eq $smarty.section.item.index }
                        <div style="width: 18px; height: 18px; padding-top: 2px; font-size: 13px; float: left; background: #0D6A9B; margin-right: 3px; color: #fff; border: 1px solid #d3d3d3; text-align: center;">{$page_num}</div>
                        {else}
                        <div style="width: 18px; height: 18px; padding-top: 2px; font-size: 13px; float: left; background: #fff; margin-right: 3px; color: #0D6A9B; border: 1px solid #d3d3d3; text-align: center;">
                            <a href="/forum/page/{$smarty.section.item.index}" style="font-size: 13px;">{$smarty.section.item.index}</a>
                        </div>
                    {/if}
                    {if $smarty.section.item.index != $page_count }
                    {/if}
                {/section}
            {/if}
        </div>
    </div>
</div>
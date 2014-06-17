{if isset($brandsList1)}
<div class="brandsList">
        <div class="header">Фильтр по брендам</div>
        <table border="0" align="center">
            <tr>
                <td>
                {if isset($brandsList1)}
                    <div class="block">
                        {foreach from=$brandsList1 item=bl1}
                            <div class="brandItem"><a href="/archive/sec/{$secLink}/brand/{$bl1.link}/page/1" {if $bl1.link==$brandLink}class="active"{/if}>{$bl1.title|stripslashes|strip_tags}</a> ({$bl1.pCount})</div>
                        {/foreach}
                    </div>
                {/if}
                </td>

                <td>

                {if isset($brandsList2)}
                    <div class="block">
                        {foreach from=$brandsList2 item=bl2}
                            <div class="brandItem"><a href="/archive/sec/{$secLink}/brand/{$bl2.link}/page/1" {if $bl2.link==$brandLink}class="active"{/if}>{$bl2.title|stripslashes|strip_tags}</a> ({$bl2.pCount})</div>
                        {/foreach}
                    </div>
                {/if}

                </td>

                <td>
                {if isset($brandsList3)}
                    <div class="block">
                        {foreach from=$brandsList3 item=bl3}
                            <div class="brandItem"><a href="/archive/sec/{$secLink}/brand/{$bl3.link}/page/1" {if $bl3.link==$brandLink}class="active"{/if}>{$bl3.title|stripslashes|strip_tags}</a> ({$bl3.pCount})</div>
                        {/foreach}
                    </div>
                {/if}
                </td>
            </tr>
        </table>
</div>
{/if}
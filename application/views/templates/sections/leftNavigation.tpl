<div class="product_menu">

    <nav>
        <ul id="ddmenu">
            {foreach key=skey from=$sections item=sec}
                <li>
                    <a href="/section/{$sec.link}/page/1" {if $sec.link==$activeLeftSection}class="active"{/if}>{$sec.title|strip_tags|stripslashes}</a>
                    {if $sec.categories}
                    <ul>
                        {foreach from=$sec.categories item=cat}
                            <li><a href="/catalog/sec/{$sec.link}/cat/{$cat.link}/page/1" {if $cat.link==$activeLeftCategory}class="active"{/if}>{$cat.title|strip_tags|stripslashes}</a></li>
                        {/foreach}
                    </ul>
                    {/if}
                </li>
            {/foreach}
        </ul>
    </nav>

</div>
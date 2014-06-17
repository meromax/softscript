<div class="content">

    <div class="centerpanel">
        <div class="title mB10 fs18 newstitle2">
            <strong>
                Карта сайта
            </strong>
        </div>
        <div class="title mB10 fs13">
            {include file='path.tpl'}
        </div>

        <div class="newstext mB15 fs13 pLeft40"">
            <p style="padding-top:8px; font-weight: bold;"><a href="/">Главная страница</a></p>
            <div class="newstext mB15 fs13 pLeft20">
                {foreach from=$pages item=page}
                    <p style="padding-top:8px;">— <a href="/{$page.link}/">{$page.title|stripslashes}</a></p>
                {/foreach}
            </div>
        </div>
        <div class="newstext mB15 fs13 pLeft40"">
            <p style="padding-top:8px; font-weight: bold;"><a href="/catalog/">Каталог</a></p>
            <div class="newstext mB15 fs13 pLeft20">
            {foreach from=$sections item=sec}
                <p style="padding-top:8px;">— <a href="/catalog/{$sec.link}/">{$sec.title|stripslashes}</a></p>
            {/foreach}
            </div>
        </div>
        <div class="newstext mB15 fs13 pLeft40"">
        <p style="padding-top:8px; font-weight: bold;">Другие полезные ресурсы</p>
            <div class="newstext mB15 fs13 pLeft20">
            {foreach from=$pages2 item=page}
                <p style="padding-top:8px;">— <a href="/content/{$page.link}/">{$page.title|stripslashes}</a></p>
            {/foreach}
            </div>
        </div>
    </div>

    <div class="rightpanel">
    {include file='news/slider.tpl'}
        {include file='banners/show_items.tpl'}
    </div>
</div>
</div>
</div>

</div>
<div class="clear"></div>
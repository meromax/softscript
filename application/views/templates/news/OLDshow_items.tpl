<div class="content">

    <div class="centerpanel">
        {foreach from=$items item=item}
        <div class="title mB10 fs18">
            <strong>{$item.title|stripslashes|strip_tags}</strong>
        </div>

        <div>
        {$item.description|stripslashes}
        </div>
        {/foreach}
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
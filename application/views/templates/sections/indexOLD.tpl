<div class="topTextBlock">
    <div class="pageTitle">{$content.title|stripslashes|strip_tags}</div>
    <div class="pageText">
    {$content.text|stripslashes}
    </div>
</div>

<div class="clearfix">
    <div class="actions">
        {include file='sections/leftNavigation.tpl'}
        {include file='leftBanners.tpl'}
    </div>
    <div class="cnt">
        <div class="breadcr">
            {include file='path.tpl'}
        </div>

        <ul class="products clearfix">
            {foreach key=key from=$products item=prod}
            <li {if ($key+1)%3==0}class="third"{/if}>
                <a href="{$prod.link}">
                    <span>{$prod.title|stripslashes|strip_tags}</span>
                    {if $prod.image!=''}
                        <img width="217" height="160" src="/images/products/{$prod.image}_small.jpg" alt="{$prod.title|stripslashes|strip_tags}">
                    {else}
                        <img width="217" height="160" src="/images/default-product.png" alt="{$prod.title|stripslashes|strip_tags}">
                    {/if}

                    <div class="price">{$prod.price|strip_tags} р.</div>
                </a>
            </li>
            {/foreach}
        </ul>

    </div>
</div>




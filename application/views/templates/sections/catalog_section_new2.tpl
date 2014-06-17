<div class="redGrayLine">
    <table cellpaddong="0" cellspacing="0" width="100%" height="38">
        <tbody><tr>
            <td class="redLine">&nbsp;</td>
            <td class="middleLine"></td>
            <td class="grayLine">&nbsp;</td>
        </tr>
        </tbody></table>
</div>

<div class="redGrayLine2">
    <div class="redLine">
        <div class="pageTitle3">Каталог товаров</div>
    </div>
    <div class="grayLine">
        {include file='search/searchBox.tpl'}
    </div>
</div>

<div class="topTextBlock" style="min-height: 120px;">
<div class="pageTitle">
{*{$item.title|stripslashes|strip_tags}*}
</div>
{include file='sections/leftNavigation.tpl'}

<div class="rightProductsBox">
    <div class="pathBox" style="margin-bottom: 20px;">
        <a href="/">Главная</a>
        <span>&nbsp;/&nbsp;</span>
        <a href="/catalog/page/1">Каталог</a>
        {if $currSection}
            <span>&nbsp;/&nbsp;</span>
            <a href="/catalog/sec/{$currSection.link|strip_tags|stripslashes}/cat/0/page/1">{$currSection.title|strip_tags|stripslashes}</a>
            {if $currCategory}
                <span>&nbsp;/&nbsp;</span>
                <a href="/catalog/sec/{$currSection.link|strip_tags|stripslashes}/cat/{$currCategory.link|strip_tags|stripslashes}/page/1">{$currCategory.title|strip_tags|stripslashes}</a>
            {/if}
        {/if}
    </div>
    {if $currSection&&$currCategory.description!=""}
    <div class="pageText3">
        {$currCategory.description|stripslashes}
    </div>
    {/if}
    {foreach key=pkey from=$products item=prod}
        <div class="productBox{if ($pkey+1)%3==0}Last{/if}">
            <div class="prodTitle">
                <a href="/product/{$prod.link}">{$prod.title|stripslashes|strip_tags}</a>
            </div>
            <div class="prodImage">
                <a href="/product/{$prod.link}">
                   qwr <img src="/images/products/{$prod.image}_middle.jpg" />
                </a>
            </div>
            <div class="prodPrice">
                <div class="priceTitle">Цена:</div>
                <div class="priceValue">{$prod.price|strip_tags|stripslashes}</div>
                <div class="priceCurrency">руб.</div>

                <div class="prodButtonBuy">
                    <a href="/product/{$prod.link}"><img src="/images/button-buy.png" /></a>
                </div>
            </div>


        </div>

    {/foreach}

    {if $page_count>1}
        <div class="clearfix">
            <div class="paginator">
                {section name=item start=1 loop=$page_count+1 }
                    {if $page_num eq $smarty.section.item.index }
                        <div class="pointActive">{$page_num}</div>
                        {else}
                        <a href="/catalog/page/{$smarty.section.item.index}"><div class="point">{$smarty.section.item.index}</div></a>
                    {/if}
                {/section}
            </div>
        </div>
    {/if}




    {*<div class="sectionDescription">*}
        {*<p>*}
            {*Мебель,  заказанная  через Интернет-магазин, доставляется БЕСПЛАТНО до*}
            {*подъезда покупателя в пределах городов: Брест, Витебск, Гродно, Гомель, Барановичи, Могилев.*}
        {*</p>*}

        {*<p>*}
            {*Мебель,  заказанная  через Интернет-магазин, доставляется БЕСПЛАТНО до*}
            {*подъезда покупателя в пределах городов: Брест, Витебск, Гродно, Гомель, Барановичи, Могилев.*}
        {*</p>*}
    {*</div>*}

</div>

<div class="clearfix"></div>
</div>
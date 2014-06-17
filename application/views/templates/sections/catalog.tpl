<div class="main_content">
{include file='sections/leftNavigation.tpl'}

    <div class="main_data">
        <div class="productsBox">
            <div class="pageTitle">
                <a href="/" style="color: #464e57;">Главная</a>
                <span>&nbsp;/&nbsp;</span>
                <a href="/catalog/page/1" style="color: #464e57;">Продукция</a>
            {if $currSection}
                <span>&nbsp;/&nbsp;</span>
                <a href="/catalog/sec/{$currSection.link|strip_tags|stripslashes}/cat/0/page/1" style="color: #464e57;">{$currSection.title|strip_tags|stripslashes}</a>
                {if $currCategory}
                    <span>&nbsp;/&nbsp;</span>
                    <a href="/catalog/sec/{$currSection.link|strip_tags|stripslashes}/cat/{$currCategory.link|strip_tags|stripslashes}/page/1" style="color: #464e57;">{$currCategory.title|strip_tags|stripslashes}</a>
                {/if}
            {/if}
            </div>
            {if $currCategory&&$currCategory.description!='&nbsp;'}
                <div class="pageText" style="background: #fff; padding: 10px 10px 10px 10px; border: 1px solid #6b8098; margin-top: 20px;">
                    {$currCategory.description|stripslashes}
                </div>
            {/if}
        </div>

        {include file='sections/options.tpl'}

        <div class="clearfix"></div>

        <div class="prod_line">
        {foreach key=pkey from=$products item=prod}
            <div class="prod{if ($pkey+1)%3==0} last{/if}">
                {if $prod.discount!=''&&$prod.discount>0&&$prod.old_price!=''}
                    <div class="discount">скидка<br /><span>-{$prod.discount}%</span></div>
                {/if}
                <a href="/product/{$prod.link}">
                    <p class="title_prod"><b id="prodTitle{$prod.id}">{$prod.title|stripslashes|strip_tags}</b></p>
                    {if $prod.image!=""}
                        <img src="/images/products/{$prod.image}_middle.jpg" width="211" height="163" title="{$prod.image_title}" />
                        {else}
                        <img src="/images/products/default_middle.jpg" width="211" height="163" title="Нет картинки" />
                    {/if}
                </a>
                <div class="priceCon">
                    {if $prod.discount!=''&&$prod.discount>0&&$prod.old_price!=''}
                        Цена: <b><del>{$prod.old_price|strip_tags|stripslashes} руб.</del> {$prod.price|strip_tags|stripslashes} руб.</b>
                        {else}
                        Цена: <b>{$prod.price|strip_tags|stripslashes} руб.</b>
                    {/if}
                </div>
            {*<p class="cost">Цена:  <b>{$prod.price|strip_tags|stripslashes} руб.</b>  <a class="inbasket" href="/product/{$prod.link}">в корзину</a></p>*}
                <p class="cost">
                    <a class="inbasket" href="javascript:void(0);" onclick="addToCart('{$prod.id}');" title="Нажмите, чтобы добавить в корзину...">в корзину</a>
                    <a class="p_plus" href="javascript:void(0);" onclick="incProdCount('{$prod.id}');">+</a>
                    <a class="p_inp_count"><input type="text" class="inp_count" id="prodCount{$prod.id}" maxlength="2" readonly="readonly" value="1"></a>
                    <a class="p_minus" href="javascript:void(0);" onclick="decProdCount('{$prod.id}');">-</a>
                </p>
            </div>
        {/foreach}
        </div>

        {if $page_count>1}
            <div class="clearfix">
                <div class="paginator">
                    {section name=item start=1 loop=$page_count+1 }
                        {if $page_num eq $smarty.section.item.index }
                            <div class="pointActive">{$page_num}</div>
                            {else}
                            <a href="/catalog/sec/{$activeLeftSection}/cat/{$activeLeftCategory}/page/{$smarty.section.item.index}"><div class="point">{$smarty.section.item.index}</div></a>
                        {/if}
                    {/section}
                </div>
            </div>
        {/if}

    </div>

</div>
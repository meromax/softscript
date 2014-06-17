{if $cart}
    {foreach key=pkey from=$cart item=prod}
    <div class="item-in-cart clearfix">
        <div class="image">
            <img src="/images/products/{$prod.image}_square.jpg" width="124" height="124" alt="cart item" />
        </div>
        <div class="desc">
            <strong><a href="/product/{$prod.link}">{$prod.title|stripslashes|strip_tags}</a></strong>
            <span class="light-clr qty">
                Количество: {$prod.count|stripslashes|strip_tags}
                &nbsp;
                <a href="#" class="icon-remove-sign" title="Remove Item"></a>
            </span>
        </div>
        <div class="price">
            <strong>${$prod.total_price|stripslashes|strip_tags}</strong>
        </div>
    </div>
    {/foreach}

    <div class="summary">
        <div class="line">
            <div class="row-fluid">
                <div class="span6">ИТОГО:</div>
                <div class="span6 align-right size-16">${$total_price_s+$dostavka}</div>
            </div>
        </div>
    </div>
    <div class="proceed">
        <a href="/shopping-cart.html" class="btn btn-danger pull-right bold higher">ОФОРМИТЬ ЗАКАЗ <i class="icon-shopping-cart"></i></a>
        {*<small>Shipping costs are calculated based on location. <a href="#">More information</a></small>*}
    </div>
{else}
    <div class="summary">
        <div class="line" style="margin-left: -50px;">
            Корзина пока пуста...
        </div>
    </div>
    <div class="proceed">
        <a href="/shopping-cart.html" class="btn btn-danger pull-right bold higher">ОФОРМИТЬ ЗАКАЗ <i class="icon-shopping-cart"></i></a>
    </div>
{/if}
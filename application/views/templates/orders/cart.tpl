<!-- Shopping Cart -->
<div class="darker-stripe">
    <div class="container">
        <div class="row">
            <div class="span12">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li><span class="icon-chevron-right"></span></li>
                    <li>
                        <a href="/shopping-cart.html">Процесс покупки</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="push-up top-equal blocks-spacer-last">
        <div class="row">

            <!-- Main Title -->
            <div class="span12">
                <div class="title-area">
                    <h1 class="inline"><span class="light">Процесс покупки</span></h1>
                </div>
            </div>

            <div class="span12">
                <div class="center-align">
                    <h1><span class="light">Корзина покупок</span></h1>
                </div>
            </div>

            {if $cart}
            <form action="/orders/index/check-cart" method="post" name="order_form" id="order_form">
            <div class="row" style="min-height: 400px;">
                <div class="span10 offset1">

                    <!-- Steps -->
                    <div class="checkout-steps">
                        <div class="clearfix">
                            <div class="step active">
                                <div class="step-badge">1</div>
                                Корзина покупок
                            </div>
                            <div class="step">
                                <div class="step-badge">2</div>
                                Контактная информация
                            </div>
                            <div class="step">
                                <div class="step-badge">3</div>
                                Способы оплаты
                            </div>
                            <div class="step">
                                <div class="step-badge">4</div>
                                Подтвердите и оплатите
                            </div>
                        </div>
                    </div> <!-- /steps -->

                    <!-- Selected Items -->
                    <table class="table table-items">
                        <thead>
                        <tr>
                            <th colspan="2">Наименование товара</th>
                            <th><div class="align-center">Количество</div></th>
                            <th><div class="align-right">Цена</div></th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach key=pkey from=$cart item=prod}
                        <tr>
                            <td class="image">
                                <a href="/product/{$prod.link}">
                                    <img src="/images/products/{$prod.image}_square.jpg" alt="" width="124" height="124" />
                                </a>
                            </td>
                            <td class="desc" style="padding-left: 10px;">
                                <a href="/product/{$prod.link}" style="color:#727272; ">
                                    {$prod.title|stripslashes|strip_tags}
                                </a>
                                &nbsp; <a title="Убрать товар из корзины" class="icon-remove-sign" href="javascript:void(0);" onclick="document.location.href='/orders/del-from-cart/{$prod.id}'"></a>
                            </td>
                            <td class="qty">
                                <input type="text" class="tiny-size" value="{$prod.count|stripslashes|strip_tags}" name="pcount{$prod.id}" name="pcount{$prod.id}" maxlength="2" />
                            </td>
                            <td class="price">
                                ${$prod.total_price|stripslashes|strip_tags}
                            </td>
                        </tr>
                        {/foreach}

                        <tr>
                            <td colspan="2" rowspan="2">
                                {*<div class="alert alert-info">*}
                                    {*<button data-dismiss="alert" class="close" type="button">×</button>*}
                                    {*Shipping costs are calculated based on location. <a href="#">More information</a>*}
                                {*</div>*}
                            </td>
                            <td class="stronger" style="padding-top: 30px;">СКИДКА:</td>
                            <td class="stronger" style="padding-top: 30px;"5><div class="size-16 align-right">{$skidka}%</div></td>
                        </tr>
                        <tr>
                            <td class="stronger" style="border-bottom:0px;">К ОПЛАТЕ:</td>
                            <td class="stronger" style="border-bottom:0px;"><div class="size-16 align-right">${$total_price_s+$dostavka}</div></td>
                        </tr>
                        </tbody>
                    </table>



                    <hr />

                    <p class="right-align">
                        <input type="hidden" name="status" id="status" value="0" />
                        <a href="javascript:void(0);" id="button_refresh" class="btn btn-primary higher bold">ПЕРЕСЧИТАТЬ</a>
                        <a href="javascript:void(0);" id="button_order" class="btn btn-primary higher bold">ПРОДОЛЖИТЬ</a>
                    </p>
                </div>
            </div>
            </form>
            {else}
                <div class="row" style="min-height: 400px;">
                    <div class="span10 offset1" style="text-align: center;">
                        Ваша корзина пуста ...
                    </div>
                </div>

            {/if}


        </div>
    </div>
</div>
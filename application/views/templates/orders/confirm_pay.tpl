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
                    <h1><span class="light">Подтвердите и оплатите</span></h1>
                </div>
            </div>

            {if $cart}
            <div class="row" style="min-height: 400px;">
                <div class="span10 offset1">

                    <!-- Steps -->
                    <div class="checkout-steps">
                        <div class="clearfix">
                            <div class="step done">
                                <div class="step-badge"><i class="icon-ok"></i></div>
                                <a href="/shopping-cart.html">
                                    Корзина покупок
                                </a>
                            </div>

                            <div class="step done">
                                <div class="step-badge"><i class="icon-ok"></i></div>
                                <a href="/order-form.html">
                                    Контактная информация
                                </a>
                            </div>

                            <div class="step done">
                                <div class="step-badge"><i class="icon-ok"></i></div>
                                <a href="/payment-methods.html">
                                    Способы оплаты
                                </a>
                            </div>

                            <div class="step active">
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
                                <a href="/product/{$prod.link}" style="color:#727272; " target="_blank">
                                    {$prod.title|stripslashes|strip_tags}
                                </a>
                            </td>
                            <td class="qty">
                                <b>{$prod.count|stripslashes|strip_tags}</b>
                            </td>
                            <td class="price">
                                ${$prod.total_price|stripslashes|strip_tags}
                            </td>
                        </tr>
                        {/foreach}

                        <tr>
                            <td colspan="2" rowspan="2">
                                &nbsp;
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


                    <h5><span class="light">ВЫБРАННЫЙ СПОСОБ ОПЛАТЫ</span></h5>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th style="width: 180px;">Логотип</th>
                        </tr>
                        </thead>
                        <tbody>

                        {if $payment_method=='robokassa'}
                            <tr>
                                <td style="text-align: left; vertical-align: middle;"><h2><span class="light"><span class="btn btn-danger circle pull-left" style="font-size: 25px; font-style: italic; font-weight: bold;">R</span>obo</span>Kassa</h2></td>
                                <td><img src="/images/{$payment_method}.png" alt="{$payment_method}" width="180" height="80" /></td>
                            </tr>
                        {else}
                            <tr>
                                <td style="text-align: left; vertical-align: middle;"><h2><span class="light"><span class="btn btn-danger circle pull-left"><i class="zocial-paypal"></i></span>ay</span>Pal</h2></td>
                                <td style="width: 180px;"><img src="/images/paypal.png" alt="PayPal" width="180" height="80" /></td>
                            </tr>
                        {/if}
                        </tbody>
                    </table>

                    {$payForm}
                    <p class="right-align">
                        <a href="javascript:void(0);" id="pay_button" class="btn btn-primary higher bold">ПОДТВЕРДИТЬ И ОПЛАТИТЬ</a>
                    </p>
                </div>
            </div>
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


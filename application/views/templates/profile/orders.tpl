<!-- Orders -->
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
                        <a href="/profile.html">Личный кабинет</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="push-up blocks-spacer">
        <div class="row">

            <aside class="span3">
                <div class="sidebar-item">

                    <div>
                        <h3><span class="light">Личный</span> Кабинет</h3>
                    </div>

                    <div class="row">
                        <div class="span3">
                            <div class="widget">
                                {include file="profile/menu.tpl"}
                            </div>
                        </div>
                    </div>

                </div>
            </aside>

            <section class="span9" style="min-height: 600px;">


                <div class="underlined push-down-20">
                    <h3><span class="light">История</span> Заказов</h3>
                </div>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th>Список товаров</th>
                        <th style="text-align: center;">Цена(у.е.)</th>
                        <th style="text-align: center;">Дата</th>
                        <th style="text-align: center;">Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                    {if $orders}
                    {foreach from=$orders item=orderItem}
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{$orderItem.id}</td>
                        <td>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">Ссылка для просмотра товара</th>
                                    {*<th style="text-align: center;">шт.</th>*}
                                    <th style="text-align: center;">Ссылка</th>
                                </tr>
                                </thead>
                                <tbody>
                                    {foreach from=$orderItem.products item=orderItemProd}
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <a href="/product/{$orderItemProd.link}" target="_blank">{$orderItemProd.title}</a>
                                        </td>
                                        {*<td style="text-align: center; vertical-align: middle; width: 30px;">*}
                                            {*{$orderItemProd.count}*}
                                        {*</td>*}
                                        <td style="text-align: center; vertical-align: middle; width: 80px;">
                                            {if $orderItem.status==1}
                                            <a href="/download/product/{$orderItemProd.hash}">Скачать</a>
                                            {/if}
                                        </td>
                                    </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            {$orderItem.sprice}
                            {if $orderItem.skidka!=0}
                                <br /><b>скидка {$orderItem.skidka} %</b>
                            {/if}
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            {$orderItem.post_date}
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            {if $orderItem.status==1}
                                <b>Оплачен</b>
                            {elseif $orderItem.status==2}
                                <b>Не обработан</b>
                            {elseif $orderItem.status==4}
                                <b>Подтвержден</b>
                            {/if}
                        </td>
                    </tr>
                    {/foreach}
                    {else}
                        <tr>
                            <td colspan="5" style="text-align: center;">
                                Вы пока ничего не заказывали...
                            </td>
                        </tr>
                    {/if}
                    </tbody>
                </table>

            </section>
        </div>
    </div>
</div>
<link rel="stylesheet" href="/css/bootstrap-plugins/plugins/bootstrap-switch/bootstrap-switch.min.css" />
<script src="/css/bootstrap-plugins/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<script src="/css/bootstrap-plugins/plugins/bootstrap-switch/bootstrap-switch-init.js" type="text/javascript" ></script>

<script src="/js/profile_products_list.js" type="text/javascript" ></script>

<!-- Products -->
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
                    <h3><span class="light">Мои</span> Товары</h3>
                </div>

                <table class="table table-bordered" style="margin-bottom: 10px;">
                    <thead>
                    <tr>
                        <th style="text-align: center;">Картинка</th>
                        <th>Наименование товара</th>
                        <th style="text-align: center;">Цена</th>
                        <th style="text-align: center;">Активен</th>
                        <th style="text-align: center;">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    {if $products}
                        {foreach from=$products item=item}
                            <tr>
                                <td class="span1">
                                    <a href="/product/{$item.link}" target="_blank">
                                        <img src="/images/products/{$item.image}_square.jpg" width="96" height="96" />
                                    </a>
                                </td>
                                <td style="vertical-align: middle;">
                                    {*{if $orderItem.status==1}*}
                                        {*<a href="/download/product/{$orderItemProd.hash}">Скачать</a>*}
                                    {*{/if}*}
                                    {$item.title|strip_tags|stripslashes}
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    ${$item.price}
                                </td>
                                <td style="text-align: center; vertical-align: middle;" class="span1">
                                    {if $item.active==1}
                                        <a href="javascript:void(0);" title="Нажмите, чтобы сменить статус..." onclick="changeRecommend('{$item.id}');" id="status_link{$item.id}"><span class="btn btn-success" style="width: 25px;">ДА</span></a>
                                    {else}
                                        <a href="javascript:void(0);" title="Нажмите, чтобы сменить статус..." onclick="changeRecommend('{$item.id}');" id="status_link{$item.id}"><span class="btn btn-danger" style="width: 25px;">НЕТ</span></a>
                                    {/if}
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <a href="/profile/products/modify/id/{$item.id}" class="btn btn-warning"> <i class="icon-edit"></i> ИЗМЕНИТЬ</a>
                                    <a href="/profile/products/delete/id/{$item.id}" class="btn btn-danger"> <i class="icon-remove"></i> УДАЛИТЬ</a>
                                </td>
                            </tr>
                        {/foreach}
                    {else}
                        <tr>
                            <td colspan="5" style="text-align: center;">
                                У вас пока нет ни одного своего товара...
                                <br />
                                <a href="/profile/products/add" class="btn btn-success" style="margin: 10px 0px 10px 0px;"> <i class="icon-plus"></i> ДОБАВИТЬ</a>
                            </td>
                        </tr>
                    {/if}
                    </tbody>
                </table>
                {if $products}
                <div style="text-align: right;">
                    <a href="/profile/products/add" class="btn btn-success"> <i class="icon-plus"></i> ДОБАВИТЬ</a>
                </div>
                {/if}
            </section>
        </div>
    </div>
</div>
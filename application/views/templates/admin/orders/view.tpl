<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Заказы <small>&nbsp;</small>
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/orders/index/page/1">Заказы</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:void(0);">Просмотр заказа</a>
                </li>
            </ul>
        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid ">
            <div class="span12">
                <!-- BEGIN INLINE TABS PORTLET-->
                <div class="portlet box grey" id="printCon">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-info"></i> Информация о заказе</div>
                    </div>
                    <div class="portlet-body form">
                        <div class="row-fluid">
                            <div class="span12">
                                <form method="POST" action="/admin/orders/{$action}" name="order_form" enctype="multipart/form-data" class="form-horizontal">
                                    <input type="hidden" name="step" value="2">
                                    {if $order.id}
                                        <input type="hidden" name="id" value="{$order.id}">
                                    {/if}

                                    <div style="padding-left: 10px; padding-top: 10px;">

                                        <div class="control-group">
                                            <label class="control-label">Номер заказа:</label>
                                            <div class="controls">
                                                <input type="text" name="order_number" id="order_number" value="{$order.id}" readonly="readonly" class="span2 m-wrap" onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Дата и время:</label>
                                            <div class="controls">
                                                <input type="text" name="order_date" id="order_date" readonly="readonly" value="{$order.post_date}" class="span2 m-wrap" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Имя клиента:</label>
                                            <div class="controls">
                                                <input type="text" name="order_name" id="order_name" readonly="readonly" value="{$order.name|stripslashes|strip_tags}" class="span3 m-wrap" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Электронная почта:</label>
                                            <div class="controls">
                                                <input type="text" name="order_email" id="order_email" readonly="readonly" value="{$order.email|stripslashes|strip_tags}" class="span3 m-wrap" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Телефон:</label>
                                            <div class="controls">
                                                <input type="text" name="order_phone" id="order_phone" readonly="readonly" value="{$order.phone|stripslashes|strip_tags}" class="span2 m-wrap" />
                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <label class="control-label">Начальная стоимость:</label>
                                            <div class="controls">
                                                <input type="text" name="order_price" id="order_price" readonly="readonly" value="{$order.price|stripslashes|strip_tags}" class="span2 m-wrap" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Стоимость со скидкой:</label>
                                            <div class="controls">
                                                <input type="text" name="order_sprice" id="order_sprice" readonly="readonly" value="{$order.sprice+$order.dostavka|stripslashes|strip_tags}" class="span2 m-wrap" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Скидка:</label>
                                            <div class="controls">
                                                <input type="text" name="order_skidka" id="order_skidka" readonly="readonly" value="{$order.skidka|stripslashes|strip_tags}%" class="span2 m-wrap" />
                                            </div>
                                        </div>


                                        <div class="portlet box yellow" style="margin-top: 40px;">

                                            <div class="caption" style="padding: 5px 5px 5px 15px;"><i class="icon-list"></i> СПИСОК ТОВАРОВ</div>

                                            <div class="portlet-body" style="padding-top: 20px; padding-left: 20px; padding-right: 20px;">

                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th class="span1">#</th>
                                                        <th class="span1">Картинка</th>
                                                        <th>Название</th>
                                                        <th class="hidden-480">Цена</th>
                                                        <th>Количество</th>
                                                        <th>Стоимость</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    {foreach key=pkey from=$cart item=prod}
                                                    <tr>
                                                        <td class="span1" style="text-align: center; vertical-align: middle;">{$pkey+1}</td>
                                                        <td class="span1" style="text-align: center; vertical-align: middle;"><img src="/images/products/{$prod.image}_square.jpg" height="80" width="80"></td>
                                                        <td style="vertical-align: middle;">{$prod.title|stripslashes|strip_tags}</td>
                                                        <td class="hidden-480" style="text-align: center; vertical-align: middle;">{$prod.price|stripslashes|strip_tags}</td>
                                                        <td style="text-align: center; vertical-align: middle;">{$prod.count|stripslashes|strip_tags}</td>
                                                        <td style="text-align: center; vertical-align: middle;">{$prod.total_price|stripslashes|strip_tags}</td>
                                                    </tr>
                                                    {/foreach}
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions" style="padding-left: 20px;">
                                        <button type="button" class="btn blue" onclick="printOrder();"><i class="icon-print"></i> Распечатать</button>
                                        <button type="button" class="btn" onclick="document.location.href='/admin/orders/index/page/{$page}'"><i class="icon-undo"></i> Отмена</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END INLINE TABS PORTLET-->
            </div>
        </div>

    </div>

</div>

<script language=javascript src="{$site_url}/js/jquery.print.js" type="text/javascript"></script>
{literal}
    <script type="text/javascript">
        function printOrder(){
            $("#printCon").print();
        }
    </script>
{/literal}
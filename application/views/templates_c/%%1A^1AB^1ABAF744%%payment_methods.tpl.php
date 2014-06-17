<?php /* Smarty version 2.6.18, created on 2014-01-29 18:45:41
         compiled from orders/payment_methods.tpl */ ?>
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

            <!--  Main Title -->
            <div class="span12">
                <div class="title-area">
                    <h1 class="inline"><span class="light">Процесс покупки</span></h1>
                </div>
            </div>

            <div class="span12">
                <div class="center-align">
                    <h1><span class="light">Способы оплаты</span></h1>
                </div>
            </div>

            <form action="/orders/index/payment-methods-do" method="post" name="payment_form" id="payment_form">
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
                                <div class="step active">
                                    <div class="step-badge">3</div>
                                    Способы оплаты
                                </div>
                                <div class="step">
                                    <div class="step-badge">4</div>
                                    Подтвердить и оплатить
                                </div>
                            </div>
                        </div>
                        <!-- /Steps -->

                        <h5><span class="light">Выберите</span> платежную систему</h5>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>

                                </th>
                                <th>Название</th>
                                <th style="width: 180px;">Логотип</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr onclick="$('#payment_method1').prop('checked',true);" style="cursor: pointer;">
                                <td style="width: 20px; text-align: center; vertical-align: middle;"><input type="radio" name="payment_method" id="payment_method1" value="robokassa" checked="checked" /></td>
                                <td style="text-align: left; vertical-align: middle;"><h2><span class="light"><span class="btn btn-danger circle pull-left" style="font-size: 25px; font-style: italic; font-weight: bold;">R</span>obo</span>Kassa</h2></td>
                                <td><img src="/images/robokassa.png" alt="Robokassa" width="180" height="80" /></td>
                            </tr>

                                                                                                                                                        
                            </tbody>
                        </table>


                        <div class="alert alert-danger in fade hidden" id="warning"></div>

                        <p class="right-align">
                            <input type="hidden" name="status" id="status" value="0" />
                            <a href="/order-form.html" class="btn btn-primary higher bold">НА ШАГ НАЗАД</a>
                            <a href="javascript:void(0);" id="payment_method_do" class="btn btn-primary higher bold">ПРОДОЛЖИТЬ</a>
                        </p>
                    </div>
                </div>
            </form>



        </div>
    </div>
</div>
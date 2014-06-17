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
                    <h1><span class="light">Контактная информация</span></h1>
                </div>
            </div>

            <form action="/orders/index/save-contact-info" method="post" name="order_form" id="order_form">
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

                                <div class="step active">
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
                        </div>
                        <!-- /Steps -->

                        <div style="padding-left: 274px;">
                            <div class="control-group">
                                <label class="control-label" for="firstName">Ваше имя<span class="red-clr bold">*</span>:</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name" class="span4" value="{$userInfo.first_name}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="lastName">E-mail<span class="red-clr bold">*</span>:</label>
                                <div class="controls">
                                    <input type="text" name="email" id="email" class="span4" value="{$userInfo.email}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="telephone">Контактный тел:</label>
                                <div class="controls">
                                    <input type="tel" name="phone" id="phone" class="span4" value="{$userInfo.phone}">
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div class="alert alert-danger in fade hidden" id="warning"></div>

                        <p class="right-align">
                            <input type="hidden" name="status" id="status" value="0" />
                            <a href="/shopping-cart.html" id="button_refresh" class="btn btn-primary higher bold">НА ШАГ НАЗАД</a>
                            <a href="javascript:void(0);" id="button_order_do" class="btn btn-primary higher bold">ПРОДОЛЖИТЬ</a>
                        </p>
                    </div>
                </div>
            </form>



        </div>
    </div>
</div>
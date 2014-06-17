<div class="staticPageBox">
    <div class="pageTitle">Оформление заказа</div>
    <div class="pageText">

        <div class="loginBox" style="width: 508px; margin: 25px 0px 25px 140px;">
            <form action="/orders/index/order-do" method="post" name="order_form" id="order_form">
                <div class="form">
                    <div class="form_title" style="font-weight: bold; text-transform: uppercase; text-shadow: 1px 1px 1px #fff; padding-bottom: 10px; font-size: 12px; text-align: center; padding: 0px 60px 20px 60px;">Заполнение <span class="star">*</span>обязательных граф, позволит оформить ваш заказ быстрее!</div>
                    <div class="form_title" style="padding:5px 0px 0px 0px; font-weight: bold; text-shadow: 1px 1px 1px #fff;">
                        Ваши ФИО<span class="star">*</span>:
                    </div>
                    <div class="finpBox">
                        <input class="finp" type="text" name="name" id="name" style="width: 500px;" value="{$userInfo.first_name}">
                    </div>

                    <div class="form_title" style="padding:5px 0px 0px 0px; font-weight: bold; text-shadow: 1px 1px 1px #fff;">
                        E-mail<span class="star">*</span>:
                    </div>
                    <div class="finpBox">
                        <input class="finp" type="text" name="email" id="email" style="width: 500px;" value="{$userInfo.email}">
                    </div>

                    <div class="form_title" style="padding:5px 0px 0px 0px; font-weight: bold; text-shadow: 1px 1px 1px #fff;">
                        Контактный тел<span class="star">*</span>:
                    </div>
                    <div class="finpBox">
                        <input class="finp" type="text" name="phone" id="phone" style="width: 500px;" value="{$userInfo.phone}">
                    </div>

                    <div class="form_title" style="padding:5px 0px 0px 0px; font-weight: bold; text-shadow: 1px 1px 1px #fff;">
                        Адрес<span class="star">*</span>:
                    </div>
                    <div class="finpBox">
                        <input class="finp" type="text" name="address" id="address" style="width: 500px;">
                    </div>

                    <div class="form_title" style="padding:5px 0px 0px 0px; font-weight: bold; text-shadow: 1px 1px 1px #fff;">
                        Доставка<span class="star">*</span>:
                    </div>
                    <div class="finpBox">
                        <select class="finp" name="dostavka" id="dostavka" style="width: 506px; height: 30px;">
                            <option value="0">Самовывоз</option>
                            <option value="1">Доставка в пределах Санкт-Петербурга</option>
                            <option value="2">За пределы Санкт-Петербурга</option>
                        </select>
                    </div>

                    <div class="form_title" style="padding:5px 0px 0px 0px; font-weight: bold; text-shadow: 1px 1px 1px #fff;">
                        Примечание:
                    </div>
                    <div class="finpBox">
                        <textarea class="finp" name="message" id="message" style="width: 498px; height: 80px;"></textarea>
                    </div>

                    <div style="padding-top: 10px;">

                        <a href="javascript:void(0);" id="button_order_do" style="text-decoration: none;">
                            <div class="buttonRed" style="float: left;">Заказать</div>
                        </a>

                        <div style="font-size:19px;text-align:center; width: 256px; padding-top: 5px; float: left; text-shadow: 1px 1px 1px #fff;">
                            к оплате: <b class="sum" style="color: #000;">{$total_price_s+$dostavka} руб.</b>
                        </div>

                        <a href="javascript:void(0);" onclick="document.location.href='/'; return false;">
                            <div class="buttonRed" style="float: right; margin-right: 0px;">Отмена</div>
                        </a>

                    </div>

                    <div style="clear: both;"></div>

                    <div style="color:red; border: 0px dotted #949494; text-shadow: 1px 1px 1px #fff; width: 486px; margin-top: 15px; text-transform: uppercase; font-size: 13px; font-weight: bold; display: none; text-align: center; padding: 10px 10px 10px 10px;" id="warning"></div>
                </div>
            </form>
        </div>

    </div>
</div>
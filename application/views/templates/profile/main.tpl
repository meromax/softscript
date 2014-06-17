<div class="staticPageBox">
    <div class="pageTitle">Личный кабинет</div>
    <div class="pageText">
        <div class="menuTabs">
            <div class="tabActive" id="tab1">
                <a href="javascript:void(0);" onclick="showProfilePage1();">Личная информация</a>
            </div>
            <div class="tab" id="tab2">
                <a href="javascript:void(0);" onclick="showProfilePage2();">История заказов</a>
            </div>
        </div>
        <div class="profilaPage" id="pageTab1" style="padding-left: 40px;">
            <form method="POST" action="/profile/index/update" id="profile_form" name="profile_form">
                <div class="form">
                    <div class="fheader">
                        Ваше Имя(*):
                    </div>
                    <div class="finpBox">
                        <input type="text" class="finp" value="{$user_info.first_name|stripslashes|strip_tags}" id="profile_name" name="profile_name" autocomplete="off">
                    </div>
                    <div class="fheader">
                        E-mail(*):
                    </div>
                    <div class="finpBox">
                        <input type="text" class="finp" readonly value="{$user_info.email|stripslashes|strip_tags}" id="profile_email" name="profile_email" autocomplete="off">
                    </div>
                    <div class="fheader">
                        Телефон:
                    </div>
                    <div class="finpBox">
                        <input type="text" class="finp" value="{$user_info.phone|stripslashes|strip_tags}" id="profile_phone" name="profile_phone" autocomplete="off">
                    </div>
                    <div class="fheader">
                        Текущий пароль(*):
                    </div>
                    <div class="finpBox">
                        <input type="password" class="finp" value="" id="profile_current_password" name="profile_current_password" autocomplete="off">
                    </div>
                    <div class="fheader">
                        Новый пароль:
                    </div>
                    <div class="finpBox">
                        <input type="password" class="finp" value="" id="profile_new_password" name="profile_new_password" autocomplete="off">
                    </div>
                    <div class="fheader">
                        Повторите пароль:
                    </div>
                    <div class="finpBox">
                        <input type="password" class="finp" value="" id="profile_new_re_password" name="profile_new_re_password" autocomplete="off">
                    </div>

                    <a id="save_profile" href="javascript:void(0);">
                        <div class="buttonRed" style="margin-top: 20px;">Сохранить данные</div>
                    </a>

                    <div id="message_box" style="margin-top:-170px; -moz-box-shadow: 0 0 10px rgba(0,0,0,0.5); -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.5); box-shadow: 0 0 10px rgba(0,0,0,0.5); margin-left: 428px; color:#000; text-align: center; width:288px; background: #fff; padding: 10px 10px 4px 10px; height: 25px; display:none; border:2px solid #cc0202;">
                        Данные сохранены успешно...
                    </div>
                </div>
            </form>
        </div>
        <div class="profilaPage" id="pageTab2" style="padding-left: 40px;">
            <div class="form">
            {if $orders}
                <div class="orderItemsHeader">
                    <table width="880">
                        <tr>
                            <td width="40"  style="text-align: center;">#</td>
                            <td width="500" style="border-left: 1px solid #b2b2b2; padding-left: 5px;">Список товаров</td>
                            <td width="90"  style="text-align: center;border-left: 1px solid #b2b2b2;">Цена(руб.)</td>
                            <td width="70"  style="text-align: center; border-left: 1px solid #b2b2b2; padding-left: 0px;">Дата</td>
                            <td width="100" style="text-align: center; border-left: 1px solid #b2b2b2; padding-left: 0px;">Статус</td>
                        </tr>
                    </table>
                </div>
                {foreach from=$orders item=orderItem}
                    <div class="orderItem">
                        <table width="880" height="50">
                            <tr>
                                <td width="40"  style="text-align: center; vertical-align: middle;">{$orderItem.id}</td>
                                <td width="500" style="padding-top: 2px; padding-bottom: 2px; border-left: 1px solid #b2b2b2; padding-left: 5px; vertical-align: middle;">
                                    {foreach from=$orderItem.products item=orderItemProd}
                                        <a href="/product/{$orderItemProd.link}" target="_blank">&bull; {$orderItemProd.title}</a> - {$orderItemProd.count} шт.<br />
                                    {/foreach}
                                {*{if $orderItem.comment!=""}*}
                                {*<br />*}
                                {*<b>Комментарий:</b>*}
                                {*<br />*}
                                {*{$orderItem.comment}*}
                                {*{/if}*}
                                </td>
                                <td width="90"  style="text-align: center;border-left: 1px solid #b2b2b2; vertical-align: middle;">
                                    {$orderItem.sprice}
                                    {if $orderItem.skidka!=0}
                                        <br /><b>скидка {$orderItem.skidka} %</b>
                                    {/if}
                                </td>
                                <td width="70"  style="text-align: center; border-left: 1px solid #b2b2b2; padding-left: 0px; vertical-align: middle;">{$orderItem.post_date}</td>
                                <td width="100" style="text-align: center; border-left: 1px solid #b2b2b2; padding-left: 0px; vertical-align: middle;">
                                    {if $orderItem.status==1}
                                        <b>Оплачен</b>
                                        {elseif $orderItem.status==2}
                                        <b>Не обработан</b>
                                        {elseif $orderItem.status==4}
                                        <b>Подтвержден</b>
                                    {/if}
                                </td>
                            </tr>
                        </table>
                    </div>
                {/foreach}

                {else}
                Вы пока ничего не заказывали...
            {/if}

            </div>
        </div>

    </div>
</div>




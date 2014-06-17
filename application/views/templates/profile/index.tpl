<!-- Profile -->
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

            <section class="span9">


                <div class="underlined push-down-20">
                    <h3><span class="light">Личная</span> Информация</h3>
                </div>
                <h6>Здравствуйте, {$user_info.first_name|stripslashes|strip_tags}!</h6>
                <p class="push-down-40">
                    В Вашем личном кабинете у вас есть возможность редактировать личные данные и просматривать историю заказов.
                </p>

                <form method="POST" action="/profile/index/update" id="profile_form" name="profile_form">

                    <div class="control-group">
                        <label class="control-label" for="profile_name">Ваше Имя<span class="red-clr bold">*</span></label>
                        <div class="controls">
                            <input type="text" id="profile_name" name="profile_name" class="span4" value="{$user_info.first_name|stripslashes|strip_tags}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="profile_email">Email<span class="red-clr bold">*</span></label>
                        <div class="controls">
                            <input type="text" id="profile_email" name="profile_email" class="span4" readonly="readonly" value="{$user_info.email|stripslashes|strip_tags}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="profile_phone">Телефон</label>
                        <div class="controls">
                            <input type="text" id="profile_phone" name="profile_phone" class="span4" value="{$user_info.phone|stripslashes|strip_tags}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="profile_current_password">Текущий пароль<span class="red-clr bold">*</span></label>
                        <div class="controls">
                            <input type="password" id="profile_current_password" name="profile_current_password" class="span4" autocomplete="off">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="profile_new_password">Новый пароль</label>
                        <div class="controls">
                            <input type="password" id="profile_new_password" name="profile_new_password" class="span4" autocomplete="off">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="profile_new_re_password">Повторите пароль</label>
                        <div class="controls">
                            <input type="password" id="profile_new_re_password" name="profile_new_re_password" class="span4" autocomplete="off">
                        </div>
                    </div>



                    <div id="profile_message_box" class="alert alert-danger in fade hidden span4" style="margin-left: 0px; padding-left:5px; text-align: center; padding-right: 5px;">&nbsp;</div>

                    <div style="clear: both;"></div>


                    <div class="control-group">

                        <div class="controls">
                            <button class="btn btn-primary higher bold" onclick="saveProfile(); return false;">Сохранить данные</button>
                        </div>
                    </div>

                </form>

            </section>
        </div>
    </div>
</div>
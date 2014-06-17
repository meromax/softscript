<?php /* Smarty version 2.6.18, created on 2014-04-03 13:10:26
         compiled from popups.tpl */ ?>
<!-- Add to cart -->
<div class="message">
    <div class="close"><a href="javascript:void(0)" onclick="closeMessageBox();" title="закрыть">x</a></div>
    <div class="description" id="prodTitle">
        Товар добавлен в корзину...
    </div>
</div>

<!--  = Login =  -->
<div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="loginModalLabel"><span class="light">Авторизоваться</span></h3>
    </div>
    <div class="modal-body">
        <form action="/login" method="POST" name="form_login">
            <div class="control-group">
                <label class="control-label hidden shown-ie8" for="login_email">Логин</label>
                <div class="controls">
                    <input type="text" class="input-block-level" id="login_email" name="login_email" placeholder="Логин">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label hidden shown-ie8" for="login_password">Пароль</label>
                <div class="controls">
                    <input type="password" class="input-block-level" id="login_password" name="login_password" placeholder="Пароль">
                </div>
            </div>
                                                                                                                                                            <div id="login_message_box" class="alert alert-danger in fade hidden">&nbsp;</div>
            <button class="btn btn-primary input-block-level bold higher" onclick="checkLoginFormBeforeSend(); return false;">ВОЙТИ</button>
        </form>
        <p class="center-align push-down-0">
            <a data-toggle="modal" role="button" href="#forgotPassModal" data-dismiss="modal">Забыли пароль?</a>
        </p>
    </div>
</div>

<!--  = Register =  -->
<div id="registerModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="registerModalLabel"><span class="light">Зарегестрироваться</span></h3>
    </div>
    <div class="modal-body">
        <form method="POST" action="/joinnow.html" id="regform">

            <div class="control-group">
                <label class="control-label hidden shown-ie8" for="reg_name">Имя</label>
                <div class="controls">
                    <input type="text" class="input-block-level" id="reg_name" name="reg_name" placeholder="Имя">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label hidden shown-ie8" for="reg_email">Email</label>
                <div class="controls">
                    <input type="email" class="input-block-level" id="reg_email" name="reg_email" placeholder="Email">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label hidden shown-ie8" for="reg_password">Пароль</label>
                <div class="controls">
                    <input type="password" class="input-block-level" id="reg_password" name="reg_password" placeholder="Пароль">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label hidden shown-ie8" for="reg_re_password">Повторите пароль</label>
                <div class="controls">
                    <input type="password" class="input-block-level" id="reg_re_password" name="reg_re_password" placeholder="Повторите пароль">
                </div>
            </div>

            <div id="reg_message_box" class="alert alert-danger in fade hidden">&nbsp;</div>

            <input type="hidden" name="reg_post" id="reg_post" value="">
            <button class="btn btn-danger input-block-level bold higher"  onclick="checkBeforeRegister(); return false;">
                ЗАРЕГЕСТРИРОВАТЬ
            </button>
        </form>
        <p class="center-align push-down-0">
            <a data-toggle="modal" role="button" href="#loginModal" data-dismiss="modal">Уже зарегестрированы?</a>
        </p>

    </div>
</div>

<!--  = Forgot your password =  -->
<div id="forgotPassModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="forgotPassModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="forgotPassModalLabel"><span class="light">Забыли пароль?</span></h3>
    </div>
    <div class="modal-body">
        <form method="post" action="#">
            <div class="control-group">
                <label class="control-label hidden shown-ie8" for="inputEmailRegister">Email</label>
                <div class="controls">
                    <input type="email" class="input-block-level" id="inputEmailRegister" placeholder="Email">
                </div>
            </div>
            <button type="submit" class="btn btn-primary input-block-level bold higher">
                ВЫСЛАТЬ НОВЫЙ ПАРОЛЬ
            </button>
        </form>
    </div>
</div>
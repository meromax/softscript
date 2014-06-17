<?php /* Smarty version 2.6.18, created on 2014-01-13 15:30:14
         compiled from registration/join_form.tpl */ ?>
<div class="staticPageBox">
    <div class="pageTitle">Регистрация</div>
    <div class="pageText">

        <div class="loginBox" style="margin-bottom: 10px; margin-top: 20px">
            <form method="POST" action="/joinnow.html" id="regform">
                <div class="form">
                    <div class="fheader">
                        Имя:
                    </div>
                    <div class="finpBox">
                        <input type="text" class="finp" value="" autocomplete="off" name="reg_name" id="reg_name">
                    </div>
                    <div class="fheader">
                        E-mail:
                    </div>
                    <div class="finpBox">
                        <input type="text" class="finp" value="" autocomplete="off" name="reg_email" id="reg_email">
                    </div>
                    <div class="fheader">
                        Пароль:
                    </div>
                    <div class="finpBox">
                        <input type="password" class="finp" value="" autocomplete="off" name="reg_password" id="reg_password">
                    </div>
                    <div class="fheader">
                        Повторите пароль:
                    </div>
                    <div class="finpBox">
                        <input type="password" class="finp" value="" autocomplete="off" name="reg_re_password" id="reg_re_password">
                    </div>


                    <div>
                        <a href="/forgotpassword.html">Забыли пароль</a> | <a href="/loginpage.html">Вход</a>
                    </div>
                    <div style="padding-top: 10px;">
                        <input type="hidden" name="reg_post" id="reg_post" value="" />
                        <a href="javascript:void(0);" id="register">
                            <div class="buttonRed">Зарегестрироваться</div>
                        </a>
                        <a href="javascript:void(0);" onclick="document.location.href='/'; return false;">
                            <div class="buttonRed" style="margin-right: 0px; float: right; min-width: 66px;">Отмена</div>
                        </a>
                    </div>
                    <div style="clear: both;"></div>
                    <div id="reg_errors_box" style="position:relative; padding-top:10px; color:#000000; text-align: center;">
                        &nbsp;
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
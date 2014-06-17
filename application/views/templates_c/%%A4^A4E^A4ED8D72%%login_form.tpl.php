<?php /* Smarty version 2.6.18, created on 2014-04-03 13:10:17
         compiled from login/login_form.tpl */ ?>
<div class="staticPageBox">
    <div class="pageTitle">Авторизация</div>
    <div class="pageText">

        <div class="loginBox">
            <form action="/login" method="POST" name="form_login">
                <div class="form">
                    <div class="fheader">
                        E-mail:
                    </div>
                    <div class="finpBox">
                        <input type="text" id="email" name="email" class="finp" />
                    </div>
                    <div class="fheader">
                        Пароль:
                    </div>
                    <div class="finpBox">
                        <input id="password" type="password" name="password" class="finp" />
                    </div>
                    <div>
                        <a href="/forgotpassword.html">Забыли пароль</a> | <a href="/joinnow.html">Регистрация</a>
                    </div>
                    <div style="padding-top: 10px;">
                        <a href="javascript:void(0);" onclick="checkLoginFormBeforeSend(); return false;">
                            <div class="buttonRed">Войти</div>
                        </a>
                        <a href="javascript:void(0);" onclick="document.location.href='/'; return false;">
                            <div class="buttonRed" style="margin-right: 0px; float: right;">Отмена</div>
                        </a>
                    </div>
                    <div style="clear: both;"></div>
                    <div id="message_box" style="position:relative; margin-top:7px; color:#000000; width:230px; text-align: center;">
                        &nbsp;
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>


<?php if ($this->_tpl_vars['error_login'] != ""): ?>
<script type="text/javascript">
    $("#message_box").html("Некорректный email или пароль...");
        <?php echo '
        setTimeout(function () {
            $("#message_box").fadeIn();
        }, 1500);
        setTimeout(function () { $("#message_box").html("&nbsp;"); }, 10000);
        '; ?>

</script>
<?php endif; ?>

<?php echo '
<script type="text/javascript">
    var email_error   = \'Введите e-mail\';
    var email_error2  = \'Некорректный e-mail\';
    var password_error   = \'Введите пароль\';
    function checkLoginFormBeforeSend(){

        var msg=\'\';

        var mail      = /^[a-zA-Z][\\w\\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\\w\\.-]*[a-zA-Z0-9]\\.[a-zA-Z][a-zA-Z\\.]*[a-zA-Z]$/;

        var email          = document.getElementById(\'email\');
        var password       = document.getElementById(\'password\');

        if(email.value==\'\'){
            msg = msg+"<span style=\'padding:3px 3px 3px 5px; color:black; font-size:11px;\'>&#9674; "+email_error+"</span><br />";
        } else if(email.value.match(mail)==null){
            msg = msg+"<span style=\'padding:3px 3px 3px 5px; color:black; font-size:11px;\'>&#9674; "+email_error2+"</span><br />";
        }

        if(password.value==\'\'){
            msg = msg+"<span style=\'padding:3px 3px 3px 5px; color:black; font-size:11px;\'>&#9674; "+password_error+"</span><br />";
        }


        if(msg==\'\'){
            $("#message_box").fadeOut("slow");
            document.forms.form_login.submit();
        } else {
            $("#message_text").html(msg);
            $("#message_box").fadeIn(\'slow\');
            setTimeout(function () { $("#message_box").fadeOut("slow"); }, 5000);

        }
    }
    setTimeout(function () {
        document.getElementById(\'login_email\').focus();
        document.getElementById(\'login_email\').value="";
        document.getElementById(\'login_password\').focus();
        document.getElementById(\'login_password\').value="";
        document.getElementById(\'login_email\').focus();
    }, 100);
</script>
'; ?>



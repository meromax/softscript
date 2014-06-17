<?php /* Smarty version 2.6.18, created on 2014-02-06 14:53:11
         compiled from admin/pass/change_password.tpl */ ?>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Изменение пароля <small>&nbsp;</small>
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/pass">Изменение пароля</a>
                </li>
            </ul>
        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid ">
            <div class="span12">
                <!-- BEGIN INLINE TABS PORTLET-->
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-info"></i> Введите новый пароль</div>
                    </div>
                    <div class="portlet-body form">
                        <div class="row-fluid">
                            <div class="span12">
                                <form method="post" action="/admin/pass/change-pass" onsubmit="return CheckPass()">

                                    <div style="padding-left: 10px; padding-top: 10px;">

                                        <div class="control-group">
                                            <label class="control-label">Новый пароль:</label>
                                            <div class="controls">
                                                <div class="input-icon left">
                                                    <i class="icon-lock"></i>
                                                    <input type="password" name="password" id="password" autocomplete="off" class="span2 m-wrap" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Повторите пароль:</label>
                                            <div class="controls">
                                                <div class="input-icon left">
                                                    <i class="icon-lock"></i>
                                                    <input type="password" name="re_password" id="re_password" autocomplete="off" class="span2 m-wrap" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="alert alert-error hide">
                                            <button class="close" data-dismiss="alert"></button>
                                            <strong>Ошибка!</strong> <span id="message_text">&nbsp;</span>
                                        </div>
                                        <?php if ($this->_tpl_vars['successMessage']): ?>
                                        <div class="alert alert-success">
                                            <button class="close" data-dismiss="alert"></button>
                                            <strong><?php echo $this->_tpl_vars['successMessage']; ?>
</strong>
                                        </div>
                                        <?php endif; ?>

                                    </div>
                                    <div class="form-actions" style="padding-left: 20px;">
                                        <button type="submit" class="btn blue" name="change_password_ok" id="change_password_ok"><i class="icon-ok"></i> Сохранить</button>
                                        <button type="button" class="btn" onclick="document.location.href='/admin'"><i class="icon-undo"></i> Отмена</button>
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


<script type="text/javascript">

var message1 = 'Поля не должны быть пустыми';
var message2 = 'Пароли дожны совпадать';
var message3 = 'Длинна пароля должна быть не меньше 6 символом';
<?php echo '
function CheckPass(){

	var pass1 = document.getElementById("password").value;
	var pass2 = document.getElementById("re_password").value;

	setTimeout(function() {$("#message_box").fadeOut("slow");},4000);
	if(pass1==\'\'){
		$("#message_text").html(message1);
        $(".alert-error").removeClass(\'hide\');
		return false;
	} else if(pass1.length<6){
		$("#message_text").html(message3);
        $(".alert-error").removeClass(\'hide\');
		return false;
	} else if(pass2==\'\'){
		$("#message_text").html(message1);
        $(".alert-error").removeClass(\'hide\');
		return false;
	} else if(pass2.length<6){
		$("#message_text").html(message3);
        $(".alert-error").removeClass(\'hide\');
		return false;
	} else if(pass1!=pass2){
		$("#message_text").html(message2);
        $(".alert-error").removeClass(\'hide\');
		return false;
	} else {
		return true;
	}
	
}
'; ?>

</script>
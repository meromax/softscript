<div class="staticPageBox">
    <div class="pageTitle">Восстановление пароля</div>
    <div class="pageText">

        <div class="loginBox" style="min-height: 140px;">
            <form action="/login/lostpassword/changepassword2" method="POST" name="forgotpassword_form">
                <div class="form">
                    <div class="fheader">
                        E-mail:
                    </div>
                    <div class="finpBox">
                        <input type="text" id="forgotpassword_email" name="forgotpassword_email" class="finp" />
                    </div>
                    <div>
                        <a href="/loginpage.html">Войти</a> | <a href="/joinnow.html">Регистрация</a>
                    </div>
                    <div style="padding-top: 10px;">
                        <a href="javascript:void(0);" onclick="checkPassworRecoveryForm(); return false;">
                            <div class="buttonRed">Восстановить</div>
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
{if $msg!=""}
	{literal}
		<script type="text/javascript">
			$("#message_box").show({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
		</script>
	{/literal}
{/if}
</div>
{literal}
<script type="text/javascript">

function checkPassworRecoveryForm(){

	var msg='';
	var mail      = /^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
	
	var email  = document.getElementById('forgotpassword_email');
	
	if(email.value==''){
		msg = msg+"<span>Введите E-mail</span><br />";
	} else if(email.value.match(mail)==null){
		msg = msg+"<span>Введите правильно E-mail</span><br />";
	}	
	
	if(msg==''){
		$("#message_box").html("&nbsp;");

		var url = "email="+email.value;
		
		$.ajax({
		type: "POST",
		url: "/login/lostpassword/checkemail",
		data: url,
		success: function(data){
			if(data==0){
				msg = "<span>Такого E-mail адреса не существует</span><br />";
				$("#message_box").html(msg);
			} else {
				document.forms.forgotpassword_form.submit();
			}
		}
		});
	} else {
		$("#message_box").html(msg);
			setTimeout(function () { $("#message_box").html("&nbsp;"); }, 5000);
		
	}
}
</script>
{/literal}
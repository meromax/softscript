<form action="/feedback/index/do" method="post" name="feedback_form" id="feedback_form">
    <div class="topTextBlock">
        <div class="pageTitle" style="margin-bottom: 20px;">
            <div style="float:left;">Задать вопрос?</div>
        </div>
        <div class="form">
            <div class="fheader">
                Укажите ваш email:(*):
            </div>
            <div class="finpBox">
                <input class="finp" name="email" id="email" type="text" autocomplete="on" />
            </div>

            <div class="fheader">
                Ваше имя:(*):
            </div>
            <div class="finpBox">
                <input class="finp" name="name" id="name" type="text" autocomplete="on" />
            </div>

            <div class="fheader">
                Cообщение(*):
            </div>
            <div class="finpBox">
                <textarea class="finp" id="message" name="message" style="height: 150px; width: 400px; border: 1px solid #b2b2b2;"></textarea>
            </div>


            <div id="profile_errors_box" style="border:1px dotted #ffffff; background:#ff9999; display:none; text-align:center; width:310px; padding:5px 5px 5px 5px; height:30px; color:#ffffff; position:absolute;">&nbsp;</div>
            <div id="profile_success_box" style="border:2px dotted #009900; background:#ffffff; display:none;  text-align:center; width:310px; padding:5px 5px 5px 5px; height:30px; color:#000000; position:absolute;">
                <div style="float:left; margin: 2px 0px 0px 5px;"><img src="/images/saved.jpg" width="28" /></div>
                <div style="float:left; margin: 7px 5px 5px 10px;">{$frontendLangParams.PROFILE__SUCCESSFULLY_SAVED}</div>
            </div>

            <div class="regButtonLink" style="margin-left: 148px;">
                <table>
                    <tr>
                        <td style="width: 140px;">
                            <div class="link" style="width: 140px;"><a class="sbm_link" id="button" href="javascript:void(0);">Отправить сообщение</a></div>
                        </td>
                        <td>
                            <div class="arrow" style="float: right;"></div>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="message_container" style="margin-top:17px; color:#000000; background:#4789c8; width:407px; display:none; border:1px solid #4789c8;">
                <div style="height:20px;  width:100%; height:30px; background:#4789c8;  position:relative; ">
                    <table width="100%" height="100%">
                        <tr>
                            <td style="font-weight:bold; text-align:center; color:#ffffff; padding:3px 3px 3px 3px; font-size:12px;"><div id="titleBox">Сообщение</div></td>
                        </tr>
                    </table>
                </div>
                <div align="left"  style="text-decoration:none; padding:3px 3px 3px 3px; background:#ffffff; color: #000;  position:relative; " id="warning">
                </div>
            </div>
        </div>
    </div>
</form>
{literal}
<script type="text/javascript">
    $(document).ready(function() {

        $("#button").click(function () {
            validateForm();
        });

    });
    function validateForm(){
        $("#message_container").hide();
        var errors = '';

        if($("#email").val()==''){
            errors += "- Поле 'E-mail' должно быть заполнено<br />";
        }

        if($("#name").val()==''){
            errors += "- Поле 'Имя' должно быть заполнено<br />";
        }

        if($("#message").val()==''){
            errors += "- Поле 'Сообщение' должно быть заполнено<br />";
        }

        if(errors!==''){
            $("#warning").html(errors);
            $("#message_container").fadeIn("slow");
        } else {
            $("#feedback_form").submit();
        }

    }

</script>
{/literal}




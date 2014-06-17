<form action="/contact/index/send" method="post" id="contact_form">
    <table class="message_form">
        <tr>
            <td align="right">Ваше имя<span style="color: red">*</span>:</td>
            <td><input type="text" name="name" id="name" /></td>
        </tr>
        <tr>
            <td align="right">Ваш телефон<span style="color: red">*</span>:</td>
            <td><input type="text" name="phone" id="phone" /></td>
        </tr>
        <tr>
            <td align="right">Ваш E-mail:</td>
            <td><input type="text" name="email" id="email" /></td>
        </tr>
        <tr>
            <td align="right">Необходимо<span style="color: red">*</span>:</td>
            <td>
                <textarea name="message" id="message"></textarea>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td align="left">
                <div style="float:left;"><input type="button" value="Отправить" id="contact_send" /></div>
                <div style="color:red; float:left; display: none; padding: 5px 0px 0px 5px;" id="worning">Поле "Необходимо" должно быть заполнено</div>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="left" style="padding-top:20px;"><span style="color: red">*</span> - поля, обязательные к заполнению</td>
        </tr>
    </table>
</form>
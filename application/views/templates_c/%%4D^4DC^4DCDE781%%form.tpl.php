<?php /* Smarty version 2.6.18, created on 2013-06-23 16:18:44
         compiled from reviews/form.tpl */ ?>
<form action="/reviews/index/send" method="post" id="reviews_form">
<table class="message_form">
    <tr>
        <td align="right">Ваше имя:</td>
        <td><input type="text" name="name" id="name" /></td>
    </tr>
    <tr>
        <td align="right">Ваш телефон:</td>
        <td><input type="text" name="phone" id="phone" /></td>
    </tr>
    <tr>
        <td align="right">Ваш E-mail:</td>
        <td><input type="text" name="email" id="email" /></td>
    </tr>
    <tr>
        <td align="right">Пожелания<span style="color: red">*</span>:</td>
        <td>
            <textarea name="message" id="message"></textarea>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="left">
            <div style="float:left;"><input type="button" value="Отправить" id="reviews_send" /></div>
            <div style="color:red; float:left; display: none; padding: 5px 0px 0px 5px;" id="worning">Поле "Пожелания" должно быть заполнено</div>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="left" style="padding-top:20px;"><span style="color: red">*</span> - поля, обязательные к заполнению</td>
    </tr>
</table>
</form>
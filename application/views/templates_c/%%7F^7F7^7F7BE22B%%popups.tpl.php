<?php /* Smarty version 2.6.18, created on 2014-02-25 11:45:05
         compiled from admin/popups.tpl */ ?>
<!-- Custom Confirm -->
<div id="customConfirm" class="modal" style="display: none;" tabindex="-1">
    <div class="modal-header">
        <button type="button" id="customConfirmClose" class="close" onclick="customCloseBox();"></button>
        <h3 id="customConfirmTitle"><i class="icon-exclamation-sign"></i> Внимание</h3>
    </div>
    <div class="modal-body" id="customConfirmText">
        <p>Текст</p>
    </div>
    <div class="modal-footer" style="text-align: center; display: none;" id="customConfirmLoader">
        Подождите...<br />
        <img src="/images/loading.gif" style="width: 250px; height: 10px;" />
    </div>
    <div class="modal-footer" id="customConfirmButtons">
        <button type="button" class="btn blue" onclick="modalAccept();">Подтвердить</button>
        <button type="button" class="btn" onclick="customCloseBox();">Отмена</button>
    </div>
</div>
<!-- Custom Alert -->
<div id="customAlert" class="modal" style="display: none;" tabindex="-1">
    <div class="modal-header">
        <button type="button" id="customAlertClose" class="close" onclick="customCloseBox();"></button>
        <h3 id="customAlertTitle"><i class="icon-info"></i> Сообщение</h3>
    </div>
    <div class="modal-body" id="customAlertText">
        <p>Текст</p>
    </div>
    <div class="modal-footer" style="text-align: center; display: none;" id="customAlertLoader">
        Подождите...<br />
        <img src="/images/loading.gif" style="width: 250px; height: 10px;" />
    </div>
    <div class="modal-footer" id="customAlertButtons">
        <button type="button" class="btn green" onclick="customCloseBox();">OK</button>
    </div>
</div>
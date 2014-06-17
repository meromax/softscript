<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Настройки <small>&nbsp;</small>
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <i class="icon-cogs"></i>
                    <a href="/admin/settings/page">Настройки</a>
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
                <div class="caption"><i class="icon-cogs"></i>Системные настройки</div>
            </div>
            <div class="portlet-body form">
                <div class="row-fluid">
                    <div class="span12">
                        <form method="POST" action="/admin/settings/update" name="settings_form">
                        <!--BEGIN TABS-->
                        <div class="tabbable tabbable-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1_1" data-toggle="tab">Электронные адреса</a></li>
                                <li><a href="#tab_1_2" data-toggle="tab">МЕТА информация для поисковиков</a></li>
                                <li><a href="#tab_1_3" data-toggle="tab">Скидки на товары с учетом покупок</a></li>
                                <li><a href="#tab_1_4" data-toggle="tab">Разное</a></li>
                            </ul>
                            <div class="tab-content">

                                <div class="tab-pane active" id="tab_1_1" style="padding-left: 10px; padding-top: 20px;">
                                    <div class="control-group">
                                        <label class="control-label">Администратор:</label>
                                        <div class="controls">
                                            <input type="text" name="settings_email1" id="settings_email1" value="{$admin_settings->settings_email1}" class="span6 m-wrap" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Служба поддержки:</label>
                                        <div class="controls">
                                            <input type="text" name="settings_email2" id="settings_email2" value="{$admin_settings->settings_email2}" class="span6 m-wrap" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Почтовый робот:</label>
                                        <div class="controls">
                                            <input type="text" name="settings_email3" id="settings_email3" value="{$admin_settings->settings_email3}" class="span6 m-wrap" />
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab_1_2" style="padding-left: 10px; padding-top: 20px;">

                                    <div class="control-group">
                                        <label class="control-label">МЕТА-TITLE:</label>
                                        <div class="controls">
                                            <input type="text" name="settings_meta_title" id="settings_meta_title" value="{$admin_settings->settings_meta_title}" class="span6 m-wrap" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">МЕТА-KEYWORDS:</label>
                                        <div class="controls">
                                            <input type="text" name="settings_meta_keywords" id="settings_meta_keywords" value="{$admin_settings->settings_meta_keywords}" class="span6 m-wrap" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">МЕТА-DESCRIPTION:</label>
                                        <div class="controls">
                                            <textarea name="settings_meta_description" id="settings_meta_description" style="height:70px;" class="span6 m-wrap">{$admin_settings->settings_meta_description}</textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="tab_1_3" style="padding-left: 10px; padding-top: 20px;">

                                    <table>
                                        <tr>
                                            <td style="font-weight:bold; color:#595959;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold; color:#595959;">
                                                <table>
                                                    <tr>
                                                        <td style="font-weight:bold; color:#595959;">
                                                            БОЛЬШЕ <input type="text" class="inp2" name="settings_pprice1" id="settings_pprice1" style="width: 70px;" autocomplete=off value="{$admin_settings->settings_pprice1}" /> РУБ.
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СКИДКА <input type="text" class="inp2" name="settings_skidka1" id="settings_skidka1" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_skidka1}" /> %
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold; color:#595959;">
                                                <table>
                                                    <tr>
                                                        <td style="font-weight:bold; color:#595959;">
                                                            БОЛЬШЕ <input type="text" class="inp2" name="settings_pprice2" id="settings_pprice2" style="width: 70px;" autocomplete=off value="{$admin_settings->settings_pprice2}" /> РУБ.
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СКИДКА <input type="text" class="inp2" name="settings_skidka2" id="settings_skidka2" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_skidka2}" /> %
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold; color:#595959;">
                                                <table>
                                                    <tr>
                                                        <td style="font-weight:bold; color:#595959;">
                                                            БОЛЬШЕ <input type="text" class="inp2" name="settings_pprice3" id="settings_pprice3" style="width: 70px;" autocomplete=off value="{$admin_settings->settings_pprice3}" /> РУБ.
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СКИДКА <input type="text" class="inp2" name="settings_skidka3" id="settings_skidka3" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_skidka3}" /> %
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold; color:#595959;">
                                                <table>
                                                    <tr>
                                                        <td style="font-weight:bold; color:#595959;">
                                                            БОЛЬШЕ <input type="text" class="inp2" name="settings_pprice4" id="settings_pprice4" style="width: 70px;" autocomplete=off value="{$admin_settings->settings_pprice4}" /> РУБ.
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СКИДКА <input type="text" class="inp2" name="settings_skidka4" id="settings_skidka4" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_skidka4}" /> %
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold; color:#595959;">
                                                <table>
                                                    <tr>
                                                        <td style="font-weight:bold; color:#595959;">
                                                            БОЛЬШЕ <input type="text" class="inp2" name="settings_pprice5" id="settings_pprice5" style="width: 70px;" autocomplete=off value="{$admin_settings->settings_pprice5}" /> РУБ.
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СКИДКА <input type="text" class="inp2" name="settings_skidka5" id="settings_skidka5" style="width: 40px;" autocomplete=off value="{$admin_settings->settings_skidka5}" /> %
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                </div>

                                <div class="tab-pane" id="tab_1_4" style="padding-left: 10px; padding-top: 20px;">

                                    <table>
                                        <tr>
                                            <td style="font-weight:bold; color:#595959;">
                                                Стоимость доставки:<br />
                                            </td>
                                            <td style="font-weight:bold; color:#595959;padding-left: 5px;">
                                                <input type="text" style="width:100px;" class="inp2"  name="settings_dostavka" id="settings_dostavka" autocomplete=off value="{$admin_settings->settings_dostavka}" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold; color:#595959;">
                                                Платежи в тестовом<br />режиме:
                                            </td>
                                            <td style="font-weight:bold; color:#595959;">
                                                <input type="checkbox" name="settings_payment_test_mode" {if $admin_settings->settings_payment_test_mode=='on'}checked="checked"{/if} />
                                            </td>
                                        </tr>
                                    </table>

                                </div>

                            </div>
                        </div>
                        <!--END TABS-->

                        <div class="form-actions" style="padding-left: 12px;">
                            <button type="button" class="btn blue" onclick="checkSettingsForm();"><i class="icon-ok"></i> Сохранить</button>
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
var message = '{$adminLangParams.NOTYFICATION_FIELDS_CHOULD_FILLED_CORRECTLY}';

{literal}
function checkSettingsForm(){
	var mail      = /^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
	var flag=0;
	var settings_price     = $("#settings_price").val();
	var settings_email1    = $("#settings_email1").val();
	var settings_email2    = $("#settings_email2").val();
	var settings_email3    = $("#settings_email3").val();

	var settings_roboxchange_username    = $("#settings_roboxchange_username").val();
	var settings_roboxchange_password    = $("#settings_roboxchange_password").val();

	if(settings_price==''||settings_email1==''||settings_email2==''||settings_email3==''||settings_roboxchange_username==''||settings_roboxchange_password==''){
		flag=1;
		alert(message);
	} else if(settings_email1.match(mail)==null||settings_email2.match(mail)==null||settings_email3.match(mail)==null){
		flag=1;
		alert(message);
	} 	
		
	if(flag==0){
		document.forms.settings_form.submit();
	}
}
{/literal}
</script>

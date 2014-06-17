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
                    <a href="javascript:void(0);">Акции</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/deals/settings">Настройки</a>
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
                <div class="caption"><i class="icon-cogs"></i>Настройки акций</div>
            </div>
            <div class="portlet-body form">
                <div class="row-fluid">
                    <div class="span12">
                        <form method="POST" action="/admin/deals/save-settings" name="settings_form" id="settings_form">
                        <!--BEGIN TABS-->
                        <div class="tabbable tabbable-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1_1" data-toggle="tab">Настройки отображения акций</a></li>
                                <li><a href="#tab_1_2" data-toggle="tab">Дополнительные настройки</a></li>
                            </ul>
                            <div class="tab-content">

                                <div class="tab-pane active" id="tab_1_1" style="padding-left: 10px; padding-top: 0px;">
                                    <div style="padding-bottom: 10px;">
                                        <h3>Настройки отображения акций</h3>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Отобразить меню акций по категориям:</label>
                                        <div class="controls">
                                            <select id="menu" name="menu" class="span3 m-wrap">
                                                <option value="1" {if $dealSettings->menu==1}selected="selected"{/if}>ДА</option>
                                                <option value="0" {if $dealSettings->menu==0}selected="selected"{/if}>НЕТ</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Отобразить главную акцию:</label>
                                        <div class="controls">
                                            <select id="main" name="main" class="span3 m-wrap">
                                                <option value="1" {if $dealSettings->main==1}selected="selected"{/if}>ДА</option>
                                                <option value="0" {if $dealSettings->main==0}selected="selected"{/if}>НЕТ</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="tab_1_2" style="padding-left: 10px; padding-top: 0px;">
                                    <div style="padding-bottom: 10px;">
                                        <h3>Дополнительные настройки</h3>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <!--END TABS-->

                        <div class="form-actions" style="padding-left: 12px;">
                            <button type="button" class="btn blue" onclick="checkSettingsForm();"><i class="icon-ok"></i> Сохранить</button>
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
{literal}
function checkSettingsForm(){
    var flag = 0;
//	if(settings_price==''){
//		flag=1;
//		alert(message);
//	} else if(settings_email3.match(mail)==null){
//		flag=1;
//		alert(message);
//	}
		
	if(flag==0){
		$("#settings_form").submit();
	}
}
{/literal}
</script>

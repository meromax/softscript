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
                <i class="icon-user"></i>
                <a href="/admin/users/index/page/1">Пользователи</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <i class="icon-info"></i>
                Иформация о пользователе
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
                    <div class="caption"><i class="icon-info"></i>Информация о пользователе</div>
                </div>
                <div class="portlet-body form">
                    <div class="row-fluid">
                        <div class="span12">
                            <form method="POST" action="/admin/settings/update" name="settings_form">
                                <!--BEGIN TABS-->
                                <div class="tabbable tabbable-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab_1_1" data-toggle="tab">Контактная информация</a></li>
                                    </ul>
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_1_1" style="padding-left: 10px; padding-top: 20px;">
                                            <div class="control-group">
                                                <label class="control-label">Имя:</label>
                                                <div class="controls">
                                                    <input type="text" value="{$item.first_name|stripslashes|strip_tags} {$item.last_name|stripslashes|strip_tags}" readonly="readonly" class="span4 m-wrap" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">E-mail:</label>
                                                <div class="controls">
                                                    <input type="text" value="{$item.email|stripslashes|strip_tags}" readonly="readonly" class="span4 m-wrap" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Телефон:</label>
                                                <div class="controls">
                                                    <input type="text" value="{$item.phone|stripslashes|strip_tags}" readonly="readonly" class="span4 m-wrap" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Дата и время регистрации:</label>
                                                <div class="controls">
                                                    <input type="text" value="{$item.creation_date|stripslashes|strip_tags}" readonly="readonly" class="span4 m-wrap" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--END TABS-->

                                <div class="form-actions" style="padding-left: 12px;">
                                    <a href="/admin/users/index/page/1" class="btn"><i class="icon-undo"></i> К списку пользователей</a>
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
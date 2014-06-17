<?php /* Smarty version 2.6.18, created on 2014-02-03 17:01:25
         compiled from admin/users/view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/users/view.tpl', 54, false),array('modifier', 'strip_tags', 'admin/users/view.tpl', 54, false),)), $this); ?>
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
                                                    <input type="text" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['first_name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['last_name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" readonly="readonly" class="span4 m-wrap" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">E-mail:</label>
                                                <div class="controls">
                                                    <input type="text" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" readonly="readonly" class="span4 m-wrap" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Телефон:</label>
                                                <div class="controls">
                                                    <input type="text" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['phone'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" readonly="readonly" class="span4 m-wrap" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Дата и время регистрации:</label>
                                                <div class="controls">
                                                    <input type="text" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['creation_date'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" readonly="readonly" class="span4 m-wrap" />
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
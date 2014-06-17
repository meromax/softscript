<?php /* Smarty version 2.6.18, created on 2014-02-06 20:50:41
         compiled from profile/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'profile/index.tpl', 48, false),array('modifier', 'strip_tags', 'profile/index.tpl', 48, false),)), $this); ?>
<!-- Profile -->
<div class="darker-stripe">
    <div class="container">
        <div class="row">
            <div class="span12">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li><span class="icon-chevron-right"></span></li>
                    <li>
                        <a href="/profile.html">Личный кабинет</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="push-up blocks-spacer">
        <div class="row">

            <aside class="span3">
                <div class="sidebar-item">

                    <div>
                        <h3><span class="light">Личный</span> Кабинет</h3>
                    </div>

                    <div class="row">
                        <div class="span3">
                            <div class="widget">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "profile/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </div>
                        </div>
                    </div>

                </div>
            </aside>

            <section class="span9">


                <div class="underlined push-down-20">
                    <h3><span class="light">Личная</span> Информация</h3>
                </div>
                <h6>Здравствуйте, <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['user_info']['first_name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
!</h6>
                <p class="push-down-40">
                    В Вашем личном кабинете у вас есть возможность редактировать личные данные и просматривать историю заказов.
                </p>

                <form method="POST" action="/profile/index/update" id="profile_form" name="profile_form">

                    <div class="control-group">
                        <label class="control-label" for="profile_name">Ваше Имя<span class="red-clr bold">*</span></label>
                        <div class="controls">
                            <input type="text" id="profile_name" name="profile_name" class="span4" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['user_info']['first_name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="profile_email">Email<span class="red-clr bold">*</span></label>
                        <div class="controls">
                            <input type="text" id="profile_email" name="profile_email" class="span4" readonly="readonly" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['user_info']['email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="profile_phone">Телефон</label>
                        <div class="controls">
                            <input type="text" id="profile_phone" name="profile_phone" class="span4" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['user_info']['phone'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="profile_current_password">Текущий пароль<span class="red-clr bold">*</span></label>
                        <div class="controls">
                            <input type="password" id="profile_current_password" name="profile_current_password" class="span4" autocomplete="off">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="profile_new_password">Новый пароль</label>
                        <div class="controls">
                            <input type="password" id="profile_new_password" name="profile_new_password" class="span4" autocomplete="off">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="profile_new_re_password">Повторите пароль</label>
                        <div class="controls">
                            <input type="password" id="profile_new_re_password" name="profile_new_re_password" class="span4" autocomplete="off">
                        </div>
                    </div>



                    <div id="profile_message_box" class="alert alert-danger in fade hidden span4" style="margin-left: 0px; padding-left:5px; text-align: center; padding-right: 5px;">&nbsp;</div>

                    <div style="clear: both;"></div>


                    <div class="control-group">

                        <div class="controls">
                            <button class="btn btn-primary higher bold" onclick="saveProfile(); return false;">Сохранить данные</button>
                        </div>
                    </div>

                </form>

            </section>
        </div>
    </div>
</div>
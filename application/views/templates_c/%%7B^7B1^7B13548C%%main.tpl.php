<?php /* Smarty version 2.6.18, created on 2014-01-13 18:13:14
         compiled from profile/main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'profile/main.tpl', 19, false),array('modifier', 'strip_tags', 'profile/main.tpl', 19, false),)), $this); ?>
<div class="staticPageBox">
    <div class="pageTitle">Личный кабинет</div>
    <div class="pageText">
        <div class="menuTabs">
            <div class="tabActive" id="tab1">
                <a href="javascript:void(0);" onclick="showProfilePage1();">Личная информация</a>
            </div>
            <div class="tab" id="tab2">
                <a href="javascript:void(0);" onclick="showProfilePage2();">История заказов</a>
            </div>
        </div>
        <div class="profilaPage" id="pageTab1" style="padding-left: 40px;">
            <form method="POST" action="/profile/index/update" id="profile_form" name="profile_form">
                <div class="form">
                    <div class="fheader">
                        Ваше Имя(*):
                    </div>
                    <div class="finpBox">
                        <input type="text" class="finp" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['user_info']['first_name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" id="profile_name" name="profile_name" autocomplete="off">
                    </div>
                    <div class="fheader">
                        E-mail(*):
                    </div>
                    <div class="finpBox">
                        <input type="text" class="finp" readonly value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['user_info']['email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" id="profile_email" name="profile_email" autocomplete="off">
                    </div>
                    <div class="fheader">
                        Телефон:
                    </div>
                    <div class="finpBox">
                        <input type="text" class="finp" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['user_info']['phone'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" id="profile_phone" name="profile_phone" autocomplete="off">
                    </div>
                    <div class="fheader">
                        Текущий пароль(*):
                    </div>
                    <div class="finpBox">
                        <input type="password" class="finp" value="" id="profile_current_password" name="profile_current_password" autocomplete="off">
                    </div>
                    <div class="fheader">
                        Новый пароль:
                    </div>
                    <div class="finpBox">
                        <input type="password" class="finp" value="" id="profile_new_password" name="profile_new_password" autocomplete="off">
                    </div>
                    <div class="fheader">
                        Повторите пароль:
                    </div>
                    <div class="finpBox">
                        <input type="password" class="finp" value="" id="profile_new_re_password" name="profile_new_re_password" autocomplete="off">
                    </div>

                    <a id="save_profile" href="javascript:void(0);">
                        <div class="buttonRed" style="margin-top: 20px;">Сохранить данные</div>
                    </a>

                    <div id="message_box" style="margin-top:-170px; -moz-box-shadow: 0 0 10px rgba(0,0,0,0.5); -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.5); box-shadow: 0 0 10px rgba(0,0,0,0.5); margin-left: 428px; color:#000; text-align: center; width:288px; background: #fff; padding: 10px 10px 4px 10px; height: 25px; display:none; border:2px solid #cc0202;">
                        Данные сохранены успешно...
                    </div>
                </div>
            </form>
        </div>
        <div class="profilaPage" id="pageTab2" style="padding-left: 40px;">
            <div class="form">
            <?php if ($this->_tpl_vars['orders']): ?>
                <div class="orderItemsHeader">
                    <table width="880">
                        <tr>
                            <td width="40"  style="text-align: center;">#</td>
                            <td width="500" style="border-left: 1px solid #b2b2b2; padding-left: 5px;">Список товаров</td>
                            <td width="90"  style="text-align: center;border-left: 1px solid #b2b2b2;">Цена(руб.)</td>
                            <td width="70"  style="text-align: center; border-left: 1px solid #b2b2b2; padding-left: 0px;">Дата</td>
                            <td width="100" style="text-align: center; border-left: 1px solid #b2b2b2; padding-left: 0px;">Статус</td>
                        </tr>
                    </table>
                </div>
                <?php $_from = $this->_tpl_vars['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['orderItem']):
?>
                    <div class="orderItem">
                        <table width="880" height="50">
                            <tr>
                                <td width="40"  style="text-align: center; vertical-align: middle;"><?php echo $this->_tpl_vars['orderItem']['id']; ?>
</td>
                                <td width="500" style="padding-top: 2px; padding-bottom: 2px; border-left: 1px solid #b2b2b2; padding-left: 5px; vertical-align: middle;">
                                    <?php $_from = $this->_tpl_vars['orderItem']['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['orderItemProd']):
?>
                                        <a href="/product/<?php echo $this->_tpl_vars['orderItemProd']['link']; ?>
" target="_blank">&bull; <?php echo $this->_tpl_vars['orderItemProd']['title']; ?>
</a> - <?php echo $this->_tpl_vars['orderItemProd']['count']; ?>
 шт.<br />
                                    <?php endforeach; endif; unset($_from); ?>
                                                                                                                                                                                                                                </td>
                                <td width="90"  style="text-align: center;border-left: 1px solid #b2b2b2; vertical-align: middle;">
                                    <?php echo $this->_tpl_vars['orderItem']['sprice']; ?>

                                    <?php if ($this->_tpl_vars['orderItem']['skidka'] != 0): ?>
                                        <br /><b>скидка <?php echo $this->_tpl_vars['orderItem']['skidka']; ?>
 %</b>
                                    <?php endif; ?>
                                </td>
                                <td width="70"  style="text-align: center; border-left: 1px solid #b2b2b2; padding-left: 0px; vertical-align: middle;"><?php echo $this->_tpl_vars['orderItem']['post_date']; ?>
</td>
                                <td width="100" style="text-align: center; border-left: 1px solid #b2b2b2; padding-left: 0px; vertical-align: middle;">
                                    <?php if ($this->_tpl_vars['orderItem']['status'] == 1): ?>
                                        <b>Оплачен</b>
                                        <?php elseif ($this->_tpl_vars['orderItem']['status'] == 2): ?>
                                        <b>Не обработан</b>
                                        <?php elseif ($this->_tpl_vars['orderItem']['status'] == 4): ?>
                                        <b>Подтвержден</b>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?php endforeach; endif; unset($_from); ?>

                <?php else: ?>
                Вы пока ничего не заказывали...
            <?php endif; ?>

            </div>
        </div>

    </div>
</div>



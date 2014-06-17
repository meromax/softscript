<?php /* Smarty version 2.6.18, created on 2012-06-29 04:08:35
         compiled from admin/orders/modify.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/orders/modify.tpl', 28, false),array('modifier', 'strip_tags', 'admin/orders/modify.tpl', 28, false),)), $this); ?>
<br />
<center><span style="font-size:16px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__HEADER']; ?>
 -> <?php echo $this->_tpl_vars['adminLangParams']['ORDERS__NUMBER2']; ?>
<?php echo $this->_tpl_vars['order']['id']; ?>
</span></center>
<br />
<center>
    <form method="POST" action="/admin/orders/<?php echo $this->_tpl_vars['action']; ?>
" name="order_form" enctype="multipart/form-data">
        <table border="0">
            <tr>
                <td valign="top" align="right"">
                <input type="hidden" name="step" value="2">
            <?php if ($this->_tpl_vars['order']['id']): ?>
                <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['order']['id']; ?>
">
            <?php endif; ?>
                <table class="cont2" align="center" style="border:1px solid #666;">
                    <tr>
                        <td colspan="2" class="header"><b><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__VIEW']; ?>
</b></td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__NUMBER']; ?>
:</td>
                        <td width="400" height="26"><?php echo $this->_tpl_vars['order']['id']; ?>
</td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__DATE_AND_TIME']; ?>
:</td>
                        <td width="400" height="26"><?php echo $this->_tpl_vars['order']['post_date']; ?>
</td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__CLIENT_NAME']; ?>
:</td>
                        <td width="400" height="26">
                            <input type="text" name="name" id="name" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" style="width:398px;" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__CLIENT_EMAIL']; ?>
:</td>
                        <td width="400" height="26">
                            <input type="text" name="email" id="email" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" style="width:398px;" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__CLIENT_PHONE']; ?>
:</td>
                        <td width="400" height="26">
                            <input type="text" name="phone" id="phone" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['phone'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" style="width:398px;" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__COUNT']; ?>
:</td>
                        <td width="400" height="26"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['cd_count'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__PRICE']; ?>
:</td>
                        <td width="400" height="26"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['price'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__DOSTAVKA']; ?>
:</td>
                        <td width="400" height="26"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['dostavka'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__TOTAL_PRICE']; ?>
:</td>
                        <td width="400" height="26"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['total_price'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__COUNTRY']; ?>
:</td>
                        <td width="400" height="26">
                            <input type="text" name="country" id="country" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['country'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" style="width:398px;" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__CITY']; ?>
:</td>
                        <td width="400" height="26">
                            <input type="text" name="city" id="city" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['city'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" style="width:398px;" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__ZIP']; ?>
:</td>
                        <td width="400" height="26">
                            <input type="text" name="zip" id="zip" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['zip'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" style="width:398px;" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__ADDRESS']; ?>
:</td>
                        <td width="400" height="26">
                            <input type="text" name="address" id="address" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['address'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" style="width:398px;" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__COMMENT']; ?>
:</td>
                        <td width="400" height="26">
                            <textarea name="comment" id="comment" style="width:398px; height: 100px;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['comment'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__STATUS']; ?>
:</td>
                        <td width="400" height="26">
                            <select name="status" id="status" style="width:110px;">
                                <option value="0" <?php if ($this->_tpl_vars['order']['status'] == 0): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__STATUSES_STATUS0']; ?>
</option>
                                <option value="1" <?php if ($this->_tpl_vars['order']['status'] == 1): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__STATUSES_STATUS1']; ?>
</option>
                                <option value="2" <?php if ($this->_tpl_vars['order']['status'] == 2): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__STATUSES_STATUS2']; ?>
</option>
                                <option value="3" <?php if ($this->_tpl_vars['order']['status'] == 3): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__STATUSES_STATUS3']; ?>
</option>
                                <option value="4" <?php if ($this->_tpl_vars['order']['status'] == 4): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__STATUSES_STATUS4']; ?>
</option>
                                <option value="5" <?php if ($this->_tpl_vars['order']['status'] == 5): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__STATUSES_STATUS5']; ?>
</option>
                                <option value="6" <?php if ($this->_tpl_vars['order']['status'] == 6): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__STATUSES_STATUS6']; ?>
</option>
                                <option value="7" <?php if ($this->_tpl_vars['order']['status'] == 7): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__STATUSES_STATUS7']; ?>
</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__HOST']; ?>
:</td>
                        <td width="400" height="26">
                            <a href="<?php echo $this->_tpl_vars['order']['host']; ?>
" target="_blank"><?php echo $this->_tpl_vars['order']['host']; ?>
</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;">Action Pay:</td>
                        <td width="400" height="26">
                            <select name="action_pay" id="action_pay" style="width:60px;">
                                <option value="0" <?php if ($this->_tpl_vars['order']['action_pay'] == 0): ?>selected<?php endif; ?>>NO</option>
                                <option value="1" <?php if ($this->_tpl_vars['order']['action_pay'] == 1): ?>selected<?php endif; ?>>YES</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="header" width="160px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__POST_NUMBER']; ?>
:</td>
                        <td width="400" height="26">
                            <input type="text" name="post_number" id="post_number" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['post_number'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" style="width:200px;" /> <?php if ($this->_tpl_vars['order']['post_number'] != ""): ?><a href="http://search.belpost.by/#<?php echo $this->_tpl_vars['order']['post_number']; ?>
" target="_blank"><?php echo $this->_tpl_vars['adminLangParams']['ORDERS__LINK']; ?>
</a><?php endif; ?>
                        </td>
                    </tr>
                </table>
                </td>

            </tr>
            <tr>
                <td colspan="2" class="header" align="center" height="60" style="background:none;">
                    <input type="hidden" name="page" id="page" value="<?php echo $this->_tpl_vars['page']; ?>
" />
                    <input type="submit" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_SAVE']; ?>
">
                    <input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_BACK']; ?>
" onclick="document.location='/admin/orders/view/id/<?php echo $this->_tpl_vars['order']['id']; ?>
/page/<?php echo $this->_tpl_vars['page']; ?>
'">
                </td>
            </tr>
        </table>
    </form>
</center>
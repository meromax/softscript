<?php /* Smarty version 2.6.18, created on 2013-12-25 00:23:32
         compiled from sections/options.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'sections/options.tpl', 13, false),array('modifier', 'stripslashes', 'sections/options.tpl', 13, false),)), $this); ?>
<form method="post" action="/find.html" name="form_find" id="form_find">
<div class="optionsList">
        <div class="header">Фильтр по опциям</div>
        <table border="0" align="center">
        <tr>
            <td align="center">
                <div class="optionsCon">
                    <?php $_from = $this->_tpl_vars['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option']):
?>
                        <div class="optionBlock">
                            <table>
                                <tr>
                                    <td width="180">
                                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['option']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
<br />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="options[]">
                                            <option value="0"></option>
                                            <?php $_from = $this->_tpl_vars['option']['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['prop']):
?>
                                                <option value="<?php echo $this->_tpl_vars['option']['id']; ?>
:<?php echo $this->_tpl_vars['prop']['id']; ?>
" <?php if (isset ( $this->_tpl_vars['prop']['selected'] ) && $this->_tpl_vars['prop']['selected'] == 1): ?>selected="selected" <?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prop']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</option>
                                            <?php endforeach; endif; unset($_from); ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php endforeach; endif; unset($_from); ?>

                    <div class="findCon">
                        <div class="optionBlock" style="padding-top: 5px;">
                            Цена: от<br /><input type="text" id="price_from" name="price_from" style="width: 110px;" value="<?php echo $this->_tpl_vars['priceFrom']; ?>
" />
                        </div>
                        <div class="optionBlock" style="padding-top: 5px;">
                            Цена: до<br /><input type="text" id="price_to" name="price_to" style="width: 110px;" value="<?php echo $this->_tpl_vars['priceTo']; ?>
" />
                        </div>
                        <div class="optionBlock" style="padding-top: 5px;">
                            <input type="hidden" name="reset" id="reset" value="0" />
                            <input type="hidden" name="currSec" value="<?php echo $this->_tpl_vars['currSec']; ?>
" />
                            <input type="hidden" name="prevUrl" value="<?php echo $_SERVER['REQUEST_URI']; ?>
" />

                            <a href="javascript:void(0);" onclick="filterFind();">
                                <div class="buttonFind">Найти</div>
                            </a>
                            <a href="javascript:void(0);" onclick="resetFilter();">
                                <div class="buttonReset">Сбросить</div>
                            </a>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        </table>

</div>
</form>
<?php /* Smarty version 2.6.18, created on 2014-01-30 12:44:13
         compiled from admin/products/options.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/products/options.tpl', 6, false),array('modifier', 'strip_tags', 'admin/products/options.tpl', 6, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option']):
?>
<div style="float:left; font-weight: bold; clear: both;">
    <table width="100%">
        <tr>
            <td align="left" width="200" style="font-weight: bold; height: 30px; border: 1px solid #dedede; background: #fff; padding: 5px 5px 5px 5px;">
                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['option']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
:
            </td>
            <td align="left" style="border: 0px; padding-left: 5px;">
                <select name="option[]">
                    <option value="0">&nbsp;--- выберите вариант ---</option>
                    <?php $_from = $this->_tpl_vars['option']['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['property']):
?>
                        <option value="<?php echo $this->_tpl_vars['option']['id']; ?>
-<?php echo $this->_tpl_vars['property']['id']; ?>
" <?php if ($this->_tpl_vars['property']['selected'] == 1): ?> selected="selected"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['property']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
            </td>
        </tr>
    </table>

</div>
<?php endforeach; endif; unset($_from); ?>
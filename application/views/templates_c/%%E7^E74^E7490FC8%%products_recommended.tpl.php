<?php /* Smarty version 2.6.18, created on 2014-01-23 12:32:38
         compiled from profile/products_recommended.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'profile/products_recommended.tpl', 13, false),array('modifier', 'strip_tags', 'profile/products_recommended.tpl', 13, false),)), $this); ?>
<div style="height: 330px; overflow: auto;">
<?php $_from = $this->_tpl_vars['productsRecommended']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pr']):
?>
<div class="pr_elem" style="float:left; font-weight: bold; clear: both;" id="prCon<?php echo $this->_tpl_vars['pr']['id']; ?>
">
    <table width="616">
        <tr>
            <td align="left" width="600" style="font-weight: bold; height: 30px; border: 1px solid #dedede; background: #fff; padding: 0px 5px 0px 0px;">
                <table>
                    <tr>
                        <td style="width: 50px;">
                            <img src="/images/products/<?php echo $this->_tpl_vars['pr']['image']; ?>
_small.jpg" width="50" style="border:1px solid #b2b2b2;">
                        </td>
                        <td style="width: 470px;">
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pr']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                        </td>
                        <td style="width: 80px;">
                            <input type="button" value="Добавить" onclick="addPR('<?php echo $this->_tpl_vars['pr']['id']; ?>
');" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<?php endforeach; endif; unset($_from); ?>
</div>
<?php /* Smarty version 2.6.18, created on 2014-01-30 12:22:51
         compiled from admin/products/recommended_item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/products/recommended_item.tpl', 11, false),array('modifier', 'strip_tags', 'admin/products/recommended_item.tpl', 11, false),)), $this); ?>
<div class="pr_elem_sel" style="float:left; font-weight: bold; clear: both;" id="prConSel<?php echo $this->_tpl_vars['prs']['id']; ?>
">
    <table width="616">
        <tr>
            <td align="left" width="600" style="font-weight: bold; height: 30px; border: 1px solid #dedede; background: #fff; padding: 0px 5px 0px 0px;">
                <table>
                    <tr>
                        <td style="width: 50px;">
                            <img src="/images/products/<?php echo $this->_tpl_vars['prs']['image']; ?>
_small.jpg" width="50" style="border:1px solid #b2b2b2;">
                        </td>
                        <td style="width: 470px;">
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prs']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                        </td>
                        <td style="width: 80px;">
                            <input type="button" value="Удалить" onclick="delPR('<?php echo $this->_tpl_vars['prs']['id']; ?>
');" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
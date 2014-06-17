<?php /* Smarty version 2.6.18, created on 2014-01-30 15:25:36
         compiled from profile/products/products_recommended_item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'profile/products/products_recommended_item.tpl', 10, false),array('modifier', 'strip_tags', 'profile/products/products_recommended_item.tpl', 10, false),)), $this); ?>
<div class="pr_elem_sel" class="push-down-10 span12" id="prConSel<?php echo $this->_tpl_vars['prs']['id']; ?>
">

    <table class="table table-bordered">
        <tbody>
            <tr id="prCon<?php echo $this->_tpl_vars['pr']['id']; ?>
">
                <td style="text-align: center; vertical-align: middle; width: 88px;">
                    <img src="/images/products/<?php echo $this->_tpl_vars['prs']['image']; ?>
_small.jpg" width="88" height="62">
                </td>
                <td style="text-align: center; vertical-align: middle">
                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prs']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                </td>

                <td style="text-align: center; padding-top: 23px;  vertical-align: middle;" class="span1">
                    <button type="button" class="btn btn-danger push-down-10" onclick="delPR('<?php echo $this->_tpl_vars['prs']['id']; ?>
');">Удалить</button>
                </td>
            </tr>
        </tbody>
    </table>

</div>
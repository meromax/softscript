<?php /* Smarty version 2.6.18, created on 2014-02-07 17:11:12
         compiled from admin/products/products_recommended_selected.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/products/products_recommended_selected.tpl', 14, false),array('modifier', 'strip_tags', 'admin/products/products_recommended_selected.tpl', 14, false),)), $this); ?>
<input type="hidden" name="recommendedIds" id="recommendedIds" value="<?php echo $this->_tpl_vars['recommendedIds']; ?>
" />
<div style="min-height: 10px;" id="mainPRSCon">
    <?php $_from = $this->_tpl_vars['productsRecommendedSelected']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['prs']):
?>

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

                    <td style="text-align: center; padding-top: 11px;  vertical-align: middle;" class="span2">
                        <button type="button" class="btn red" onclick="delPR('<?php echo $this->_tpl_vars['prs']['id']; ?>
');"><i class="icon-remove"></i> Удалить</button>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
    <?php endforeach; endif; unset($_from); ?>
</div>
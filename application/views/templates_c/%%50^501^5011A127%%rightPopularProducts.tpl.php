<?php /* Smarty version 2.6.18, created on 2013-04-20 07:20:44
         compiled from rightPopularProducts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'rightPopularProducts.tpl', 17, false),array('modifier', 'stripslashes', 'rightPopularProducts.tpl', 17, false),)), $this); ?>
<div class="popProdBoxHeader">
    <div class="title">Популярное</div>
</div>
<div class="popProdBoxList">
<?php $_from = $this->_tpl_vars['popularProducts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pkey'] => $this->_tpl_vars['pprod']):
?>
<div <?php if ($this->_tpl_vars['pkey']%2 == 0): ?>class="popProdItemBox2"<?php else: ?>class="popProdItemBox1"<?php endif; ?>>
    <table cellpadding="0" cellspacing="0" width="220" border="0">
        <tr>
            <td height="66" width="70" style="text-align: center; vertical-align: middle; padding-left: 4px;">
                <a href="/images/products/<?php echo $this->_tpl_vars['pprod']['image']; ?>
_big.jpg" class="highslide" onclick="return hs.expand(this);">
                    <img class="pItemImg" src="/images/products/<?php echo $this->_tpl_vars['pprod']['image']; ?>
_small.jpg" width="66" height="66" style=" border: 1px solid #dadada;" />
                </a>
            </td>
            <td height="86" width="150" style="text-align: center; vertical-align: middle; padding-right: 4px;">
                <div>
                    <div class="pItemTitle" style="padding-left: 0px; padding-right: 7px;">
                        <a href="<?php echo $this->_tpl_vars['pprod']['link']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pprod']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                    </div>
                    <div class="pItemTitle" style="text-align: left; padding-left: 5px;">
                        <img src="/images/pline.png" height="1" width="136" />
                    </div>
                    <div class="pItemPrice">
                        <table cellpadding="0" cellspacing="0" width="150">
                            <tr>
                                <td align="left" valign="middle" style="text-align: left; padding-left: 5px; padding-top: 4px;">
                                    <img src="/images/icon1.png" style="margin-right: 4px;" /><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pprod']['price'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 р.
                                </td>
                                <td width="60" style="padding-right: 7px;">
                                    <a href="/orders/add-to-cart/<?php echo $this->_tpl_vars['pprod']['id']; ?>
"><img src="/images/button-buy-small.png" /></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<?php endforeach; endif; unset($_from); ?>
</div>
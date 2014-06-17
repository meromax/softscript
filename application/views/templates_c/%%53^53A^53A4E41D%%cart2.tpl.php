<?php /* Smarty version 2.6.18, created on 2012-07-11 06:59:17
         compiled from orders/cart2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'orders/cart2.tpl', 4, false),array('modifier', 'stripslashes', 'orders/cart2.tpl', 4, false),)), $this); ?>
<div class="clearfix">
    <div class="actions">
        <ul class="prod_list">
            <li><a class="p1" href="/catalog/<?php echo ((is_array($_tmp=$this->_tpl_vars['section1']['link'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
/"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['section1']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a></li>
            <li><a class="p2" href="/catalog/<?php echo ((is_array($_tmp=$this->_tpl_vars['section2']['link'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
/"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['section2']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a></li>
        </ul>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'leftBanners.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <div class="cnt">
        <div class="breadcr"><a class="main" href="/">Главная</a>&nbsp;<span class="main">/</span>&nbsp;Процесс оплаты</div>
        <h3>Ваша корзина</h3>
        <div class="content">
            <table class="user">
                <tbody>
                <tr><td class="red">№</td><td class="red">Изображение</td><td class="red">Название</td><td class="red">Цена (руб.)</td><td class="red">Кол-во (шт)</td><td class="red">Стоимость (руб.)</td><td>&nbsp;</td></tr>
                <tr><td colspan="7"></td></tr>

                <?php $_from = $this->_tpl_vars['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['prod']):
?>
                    <tr class="gr">
                        <td><?php echo $this->_tpl_vars['key']+1; ?>
.</td>
                        <td><img src="/images/products/<?php echo $this->_tpl_vars['prod']['image']; ?>
_small.jpg" height="79"></td>
                        <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
                        <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['price'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
                        <td style="text-align: center!important;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['count'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
                        <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['total_price'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
                    </tr>
                    <tr><td colspan="7"></td></tr>
                <?php endforeach; endif; unset($_from); ?>

                <tr>
                    <td colspan="6" style="font-size:18px;text-align:right;vertical-align:top;">к оплате: <b class="sum"><?php echo $this->_tpl_vars['roboData']['out_summ']; ?>
 руб.</b></td>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="padding-top:20px;text-align:right;">
                        <form action='<?php echo $this->_tpl_vars['roboData']['url']; ?>
' method=post>
                            <input type=hidden name=MrchLogin value=<?php echo $this->_tpl_vars['roboData']['mrh_login']; ?>
>
                            <input type=hidden name=OutSum value=<?php echo $this->_tpl_vars['roboData']['out_summ']; ?>
>
                            <input type=hidden name=InvId value=<?php echo $this->_tpl_vars['roboData']['inv_id']; ?>
>
                            <input type=hidden name=Desc value='<?php echo $this->_tpl_vars['roboData']['inv_desc']; ?>
'>
                            <input type=hidden name=SignatureValue value=<?php echo $this->_tpl_vars['roboData']['crc']; ?>
>
                            <input type=hidden name=Shp_item value='<?php echo $this->_tpl_vars['roboData']['shp_item']; ?>
'>
                            <input type=hidden name=IncCurrLabel value=<?php echo $this->_tpl_vars['roboData']['in_curr']; ?>
>
                            <input type=hidden name=Culture value=<?php echo $this->_tpl_vars['roboData']['culture']; ?>
>
                            <input type="hidden" name="status" id="status" value="0" />
                            <input type="submit" class="blue_btn" value="Оплатить"  style="margin-right:0px; cursor: pointer;">
                        </form>
                    </td>
                    <td>

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
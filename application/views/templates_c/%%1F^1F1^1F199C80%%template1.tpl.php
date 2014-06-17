<?php /* Smarty version 2.6.18, created on 2013-02-21 14:43:02
         compiled from sections/template1.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'sections/template1.tpl', 2, false),array('modifier', 'strip_tags', 'sections/template1.tpl', 2, false),array('modifier', 'truncate', 'sections/template1.tpl', 5, false),)), $this); ?>
<div class="topTextBlock" style="min-height: 120px;">
    <div class="pageTitle"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</div>
    <?php if ($this->_tpl_vars['item']['description'] != ""): ?>
    <div class="pageText" id="textBox1" style="padding-bottom: 15px;">
        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 200) : smarty_modifier_truncate($_tmp, 200)); ?>

        <center>
            <a href="javascript:void(0)" onclick="showText(2);hideText(1);"><img src="/images/button-down.png" /></a>
        </center>
    </div>

    <div class="pageText" id="textBox2" style="display: none; padding-bottom: 15px;">
        <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

        <center>
            <a href="javascript:void(0)" onclick="showText(1);hideText(2);"><img src="/images/button-up.png" /></a>
        </center>
    </div>
    <?php endif; ?>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/brands.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/options.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="highslide-gallery">
    <div class="productsList">
        <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pkey'] => $this->_tpl_vars['prod']):
?>

                <div class="productBox" id="pcon<?php echo $this->_tpl_vars['prod']['id']; ?>
" onmouseover="pActive('pcon<?php echo $this->_tpl_vars['prod']['id']; ?>
');" onmouseout="pPassive('pcon<?php echo $this->_tpl_vars['prod']['id']; ?>
');">
                    <table height="100%" border="0">
                        <tr>
                            <td class="productImg">
                                <div style="border: 0px solid #000;"  onmouseover="showZoomInfo('lupa<?php echo $this->_tpl_vars['prod']['id']; ?>
');" onmouseout="hideZoomInfo('lupa<?php echo $this->_tpl_vars['prod']['id']; ?>
');">
                                    <a href="/images/products/<?php echo $this->_tpl_vars['prod']['image']; ?>
_big.jpg" class="highslide" onclick="return hs.expand(this);">
                                        <img class="pItemImg2" src="/images/products/<?php echo $this->_tpl_vars['prod']['image']; ?>
_middle.jpg" style="" />
                                    </a>
                                    <div class="lupa" id="lupa<?php echo $this->_tpl_vars['prod']['id']; ?>
">
                                        <img src="/images/lupa.png"  style="border: 0px; width: 16px; height: 17px;" />
                                        <br />нажмите, чтобы увеличить...
                                    </div>
                                </div>
                            </td>
                            <td class="productInfo">

                                    <div class="header">
                                        <a href="<?php echo $this->_tpl_vars['prod']['link']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                                    </div>
                                    <div class="text">
                                        <a href="<?php echo $this->_tpl_vars['prod']['link']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['addinfo'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                                    </div>

                            </td>
                            <td class="productPriceButton">
                                <div class="price">
                                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['price'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 р.
                                </div>
                                <div class="button">
                                    <a href="/orders/add-to-cart/<?php echo $this->_tpl_vars['prod']['id']; ?>
"><img src="/images/button-buy2.png" /></a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="highslide-caption">
                    Caption for the second image.
                </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
</div>
    <?php if ($this->_tpl_vars['page_count'] > 1): ?>
    <div class="paginator">
        <?php unset($this->_sections['item']);
$this->_sections['item']['name'] = 'item';
$this->_sections['item']['start'] = (int)1;
$this->_sections['item']['loop'] = is_array($_loop=$this->_tpl_vars['page_count']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['item']['show'] = true;
$this->_sections['item']['max'] = $this->_sections['item']['loop'];
$this->_sections['item']['step'] = 1;
if ($this->_sections['item']['start'] < 0)
    $this->_sections['item']['start'] = max($this->_sections['item']['step'] > 0 ? 0 : -1, $this->_sections['item']['loop'] + $this->_sections['item']['start']);
else
    $this->_sections['item']['start'] = min($this->_sections['item']['start'], $this->_sections['item']['step'] > 0 ? $this->_sections['item']['loop'] : $this->_sections['item']['loop']-1);
if ($this->_sections['item']['show']) {
    $this->_sections['item']['total'] = min(ceil(($this->_sections['item']['step'] > 0 ? $this->_sections['item']['loop'] - $this->_sections['item']['start'] : $this->_sections['item']['start']+1)/abs($this->_sections['item']['step'])), $this->_sections['item']['max']);
    if ($this->_sections['item']['total'] == 0)
        $this->_sections['item']['show'] = false;
} else
    $this->_sections['item']['total'] = 0;
if ($this->_sections['item']['show']):

            for ($this->_sections['item']['index'] = $this->_sections['item']['start'], $this->_sections['item']['iteration'] = 1;
                 $this->_sections['item']['iteration'] <= $this->_sections['item']['total'];
                 $this->_sections['item']['index'] += $this->_sections['item']['step'], $this->_sections['item']['iteration']++):
$this->_sections['item']['rownum'] = $this->_sections['item']['iteration'];
$this->_sections['item']['index_prev'] = $this->_sections['item']['index'] - $this->_sections['item']['step'];
$this->_sections['item']['index_next'] = $this->_sections['item']['index'] + $this->_sections['item']['step'];
$this->_sections['item']['first']      = ($this->_sections['item']['iteration'] == 1);
$this->_sections['item']['last']       = ($this->_sections['item']['iteration'] == $this->_sections['item']['total']);
?>
            <?php if ($this->_tpl_vars['page_num'] == $this->_sections['item']['index']): ?>
                <div class="pointActive"><?php echo $this->_tpl_vars['page_num']; ?>
</div>
            <?php else: ?>
                <a href="/catalog/sec/<?php echo $this->_tpl_vars['activeLeftSection']; ?>
/page/<?php echo $this->_sections['item']['index']; ?>
"><div class="point"><?php echo $this->_sections['item']['index']; ?>
</div></a>
            <?php endif; ?>
        <?php endfor; endif; ?>
    </div>
    <?php endif; ?>

</div>

<?php echo '
<script type="text/javascript">
    function pActive(id){
        $("#"+id).css("border-left-color","red");
        $("#"+id).css("box-shadow","0 0 7px rgba(0,0,0,0.5)");

    }
    function pPassive(id){
        $("#"+id).css("border-left-color","#0094d5");
        $("#"+id).css("box-shadow","0 0 4px rgba(0,0,0,0.5)");
    }

    function showZoomInfo(id){
        $("#"+id).show();
    }

    function hideZoomInfo(id){
        $("#"+id).hide();
    }

    function showText(id){
        $("#textBox"+id).show();
    }

    function hideText(id){
        $("#textBox"+id).hide();
    }

</script>
'; ?>
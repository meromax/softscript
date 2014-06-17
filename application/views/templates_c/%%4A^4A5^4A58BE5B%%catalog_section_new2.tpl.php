<?php /* Smarty version 2.6.18, created on 2013-10-28 02:20:55
         compiled from sections/catalog_section_new2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'sections/catalog_section_new2.tpl', 33, false),array('modifier', 'stripslashes', 'sections/catalog_section_new2.tpl', 33, false),)), $this); ?>
<div class="redGrayLine">
    <table cellpaddong="0" cellspacing="0" width="100%" height="38">
        <tbody><tr>
            <td class="redLine">&nbsp;</td>
            <td class="middleLine"></td>
            <td class="grayLine">&nbsp;</td>
        </tr>
        </tbody></table>
</div>

<div class="redGrayLine2">
    <div class="redLine">
        <div class="pageTitle3">Каталог товаров</div>
    </div>
    <div class="grayLine">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search/searchBox.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
</div>

<div class="topTextBlock" style="min-height: 120px;">
<div class="pageTitle">
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/leftNavigation.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="rightProductsBox">
    <div class="pathBox" style="margin-bottom: 20px;">
        <a href="/">Главная</a>
        <span>&nbsp;/&nbsp;</span>
        <a href="/catalog/page/1">Каталог</a>
        <?php if ($this->_tpl_vars['currSection']): ?>
            <span>&nbsp;/&nbsp;</span>
            <a href="/catalog/sec/<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currSection']['link'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
/cat/0/page/1"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currSection']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
            <?php if ($this->_tpl_vars['currCategory']): ?>
                <span>&nbsp;/&nbsp;</span>
                <a href="/catalog/sec/<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currSection']['link'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
/cat/<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currCategory']['link'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
/page/1"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currCategory']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php if ($this->_tpl_vars['currSection'] && $this->_tpl_vars['currCategory']['description'] != ""): ?>
    <div class="pageText3">
        <?php echo ((is_array($_tmp=$this->_tpl_vars['currCategory']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

    </div>
    <?php endif; ?>
    <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pkey'] => $this->_tpl_vars['prod']):
?>
        <div class="productBox<?php if (( $this->_tpl_vars['pkey']+1 ) % 3 == 0): ?>Last<?php endif; ?>">
            <div class="prodTitle">
                <a href="/product/<?php echo $this->_tpl_vars['prod']['link']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a>
            </div>
            <div class="prodImage">
                <a href="/product/<?php echo $this->_tpl_vars['prod']['link']; ?>
">
                    <img src="/images/products/<?php echo $this->_tpl_vars['prod']['image']; ?>
_middle.jpg" />
                </a>
            </div>
            <div class="prodPrice">
                <div class="priceTitle">Цена:</div>
                <div class="priceValue"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['price'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</div>
                <div class="priceCurrency">руб.</div>

                <div class="prodButtonBuy">
                    <a href="/product/<?php echo $this->_tpl_vars['prod']['link']; ?>
"><img src="/images/button-buy.png" /></a>
                </div>
            </div>


        </div>

    <?php endforeach; endif; unset($_from); ?>

    <?php if ($this->_tpl_vars['page_count'] > 1): ?>
        <div class="clearfix">
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
                        <a href="/catalog/page/<?php echo $this->_sections['item']['index']; ?>
"><div class="point"><?php echo $this->_sections['item']['index']; ?>
</div></a>
                    <?php endif; ?>
                <?php endfor; endif; ?>
            </div>
        </div>
    <?php endif; ?>




                                            
                                            
</div>

<div class="clearfix"></div>
</div>
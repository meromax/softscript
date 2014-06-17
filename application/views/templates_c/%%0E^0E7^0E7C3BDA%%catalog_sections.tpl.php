<?php /* Smarty version 2.6.18, created on 2013-12-25 00:23:34
         compiled from sections/catalog_sections.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'sections/catalog_sections.tpl', 12, false),array('modifier', 'stripslashes', 'sections/catalog_sections.tpl', 12, false),)), $this); ?>
<div class="main_content">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/leftNavigation.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <div class="main_data">
        <div class="productsBox">
            <div class="pageTitle">
                <a href="/" style="color: #464e57;">Главная</a>
                <span>&nbsp;/&nbsp;</span>
                <a href="/catalog/page/1" style="color: #464e57;">Продукция</a>
                <?php if ($this->_tpl_vars['currSection']): ?>
                    <span>&nbsp;/&nbsp;</span>
                    <a href="/catalog/sec/<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currSection']['link'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
/cat/0/page/1" style="color: #464e57;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currSection']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                    <?php if ($this->_tpl_vars['currCategory']): ?>
                        <span>&nbsp;/&nbsp;</span>
                        <a href="/catalog/sec/<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currSection']['link'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
/cat/<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currCategory']['link'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
/page/1" style="color: #464e57;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currCategory']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="prod_line">
            <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pkey'] => $this->_tpl_vars['prod']):
?>
            <div class="prod<?php if (( $this->_tpl_vars['pkey']+1 ) % 3 == 0): ?> last<?php endif; ?>">
                <?php if ($this->_tpl_vars['prod']['discount'] != '' && $this->_tpl_vars['prod']['discount'] > 0 && $this->_tpl_vars['prod']['old_price'] != ''): ?>
                    <div class="discount">скидка<br /><span>-<?php echo $this->_tpl_vars['prod']['discount']; ?>
%</span></div>
                <?php endif; ?>
                <a href="/product/<?php echo $this->_tpl_vars['prod']['link']; ?>
">
                    <p class="title_prod"><b id="prodTitle<?php echo $this->_tpl_vars['prod']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</b></p>
                    <?php if ($this->_tpl_vars['prod']['image'] != ""): ?>
                        <img src="/images/products/<?php echo $this->_tpl_vars['prod']['image']; ?>
_middle.jpg" width="211" height="163" title="Подробнее..." />
                    <?php else: ?>
                        <img src="/images/products/default_middle.jpg" width="211" height="163" title="Нет картинки" />
                    <?php endif; ?>
                </a>
                <div class="priceCon">
                    <?php if ($this->_tpl_vars['prod']['discount'] != '' && $this->_tpl_vars['prod']['discount'] > 0 && $this->_tpl_vars['prod']['old_price'] != ''): ?>
                        Цена: <b><del><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['old_price'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 руб.</del> <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['price'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 руб.</b>
                    <?php else: ?>
                        Цена: <b><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['price'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 руб.</b>
                    <?php endif; ?>

                </div>
                                <p class="cost">
                    <a class="inbasket" href="javascript:void(0);" onclick="addToCart('<?php echo $this->_tpl_vars['prod']['id']; ?>
');" title="Нажмите, чтобы добавить в корзину...">в корзину</a>
                    <a class="p_plus" href="javascript:void(0);" onclick="incProdCount('<?php echo $this->_tpl_vars['prod']['id']; ?>
');">+</a>
                    <a class="p_inp_count"><input type="text" class="inp_count" id="prodCount<?php echo $this->_tpl_vars['prod']['id']; ?>
" maxlength="2" readonly="readonly" value="1"></a>
                    <a class="p_minus" href="javascript:void(0);" onclick="decProdCount('<?php echo $this->_tpl_vars['prod']['id']; ?>
');">-</a>
                </p>



            </div>
            <?php endforeach; endif; unset($_from); ?>
        </div>

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

</div>



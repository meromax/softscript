<?php /* Smarty version 2.6.18, created on 2013-10-31 23:52:39
         compiled from novelty/show_items.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'novelty/show_items.tpl', 10, false),array('modifier', 'strip_tags', 'novelty/show_items.tpl', 10, false),array('modifier', 'date_format', 'novelty/show_items.tpl', 11, false),)), $this); ?>
<div class="staticPageBox">
    <div class="pageTitle"><a href="/novelty/page/1">Новинки</a></div>
    <div class="pageText">
        <div class="reviewListBox" style="padding-top: 14px;">
        <?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ikey'] => $this->_tpl_vars['item']):
?>
            <?php if ($this->_tpl_vars['ikey'] > 0): ?>
                <div class="spliter"></div>
            <?php endif; ?>
            <div class="item" style="border-top: 0px solid #cbcbcb; padding: 0px 0px 0px 0px;">
                <div class="name"><a href="/novelty/view/<?php echo $this->_tpl_vars['item']['link']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></div>
                <div class="date"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</div>
                <div class="text"><a href="/novelty/view/<?php echo $this->_tpl_vars['item']['link']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['description_short'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></div>
            </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <?php if ($this->_tpl_vars['page_count'] > 1): ?>
        <div class="spliter"></div>
        <div class="item">
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
                        <a href="/novelty/page/<?php echo $this->_sections['item']['index']; ?>
"><div class="point"><?php echo $this->_sections['item']['index']; ?>
</div></a>
                    <?php endif; ?>
                    <?php if ($this->_sections['item']['index'] != $this->_tpl_vars['page_count']): ?>
                    <?php endif; ?>
                <?php endfor; endif; ?>
            </div>
        </div>
    <?php endif; ?>

    </div>
</div>
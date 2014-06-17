<?php /* Smarty version 2.6.18, created on 2014-02-06 14:46:10
         compiled from admin/deals/categories/paging.tpl */ ?>
<?php if ($this->_tpl_vars['countpage'] > 1): ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="pagination" style="margin-top: 15px; margin-bottom: 0px;">
                <ul>
                    <?php if ($this->_tpl_vars['page'] == 1): ?>
                        <li class="prev disabled"><a href="javascript:void(0);">← <span class="hidden-480">Предыдущая</span></a></li>
                    <?php else: ?>
                        <li class="prev"><a href="/admin/sections/categories/section_id/<?php echo $this->_tpl_vars['section_id']; ?>
/spage/<?php echo $this->_tpl_vars['spage']; ?>
/page/<?php echo $this->_tpl_vars['page']-1; ?>
">← <span class="hidden-480">Предыдущая</span></a></li>
                    <?php endif; ?>
                    <?php unset($this->_sections['item']);
$this->_sections['item']['name'] = 'item';
$this->_sections['item']['start'] = (int)1;
$this->_sections['item']['loop'] = is_array($_loop=$this->_tpl_vars['countpage']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <?php if ($this->_tpl_vars['page'] == $this->_sections['item']['index']): ?>
                            <li class="active"><a href="javascript:void(0);"><?php echo $this->_tpl_vars['page']; ?>
</a></li>
                        <?php else: ?>
                            <li><a href="/admin/sections/categories/section_id/<?php echo $this->_tpl_vars['section_id']; ?>
/spage/<?php echo $this->_tpl_vars['spage']; ?>
/page/<?php echo $this->_sections['item']['index']; ?>
"><?php echo $this->_sections['item']['index']; ?>
</a></li>
                        <?php endif; ?>
                    <?php endfor; endif; ?>
                    <?php if ($this->_tpl_vars['page'] == $this->_tpl_vars['countpage']): ?>
                        <li class="next disabled"><a href="javascript:void(0);"><span class="hidden-480">Следующая</span> → </a></li>
                    <?php else: ?>
                        <li class="next"><a href="/admin/sections/categories/section_id/<?php echo $this->_tpl_vars['section_id']; ?>
/spage/<?php echo $this->_tpl_vars['spage']; ?>
/page/<?php echo $this->_tpl_vars['page']+1; ?>
"><span class="hidden-480">Следующая</span> → </a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
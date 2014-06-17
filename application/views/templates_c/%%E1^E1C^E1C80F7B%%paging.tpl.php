<?php /* Smarty version 2.6.18, created on 2014-02-07 20:01:15
         compiled from articles/paging.tpl */ ?>
<?php if ($this->_tpl_vars['page_count'] > 1): ?>
<div class="pagination" style="margin-left: 30px;">
    <ul>
        <?php if ($this->_tpl_vars['page_num'] == 1): ?>
            <li><a href="javascript:void(0);" class="btn" style="background: #e0e0e0; cursor: default;"><span class="icon-chevron-left"></span></a></li>
        <?php else: ?>
            <li><a href="<?php echo $this->_tpl_vars['pagingUrl']; ?>
/<?php echo $this->_tpl_vars['page_num']-1; ?>
" class="btn btn-primary" style="cursor: pointer;"><span class="icon-chevron-left"></span></a></li>
        <?php endif; ?>
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
                <li class="active"><a href="javascript:void(0);"><?php echo $this->_tpl_vars['page_num']; ?>
</a></li>
            <?php else: ?>
                <li><a href="<?php echo $this->_tpl_vars['pagingUrl']; ?>
/<?php echo $this->_sections['item']['index']; ?>
"><?php echo $this->_sections['item']['index']; ?>
</a></li>
            <?php endif; ?>
        <?php endfor; endif; ?>

        <?php if ($this->_tpl_vars['page_num'] == $this->_tpl_vars['page_count']): ?>
            <li><a href="javascript:void(0);" class="btn" style="background: #e0e0e0; cursor: default;"><span class="icon-chevron-right"></span></a></li>
        <?php else: ?>
            <li><a href="<?php echo $this->_tpl_vars['pagingUrl']; ?>
/<?php echo $this->_tpl_vars['page_num']+1; ?>
" class="btn btn-primary" style="cursor: pointer;"><span class="icon-chevron-right"></span></a></li>
        <?php endif; ?>
    </ul>
</div>
<?php endif; ?>
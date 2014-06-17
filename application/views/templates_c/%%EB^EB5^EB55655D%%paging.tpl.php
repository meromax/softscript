<?php /* Smarty version 2.6.18, created on 2012-03-01 10:19:20
         compiled from admin/price/paging.tpl */ ?>
<?php if ($this->_tpl_vars['countpage'] > 1): ?>
<b><?php echo $this->_tpl_vars['adminLangParams']['TITLE_PAGES']; ?>
: </b>
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
	        <span id="active_page"><?php echo $this->_tpl_vars['page']; ?>
</span>
	      <?php else: ?>
	        <a href="/admin/price/index/page/<?php echo $this->_sections['item']['index']; ?>
" style="font-weight:normal;"><b><?php echo $this->_sections['item']['index']; ?>
</b></a>
	      <?php endif; ?>
	      <?php if ($this->_sections['item']['index'] != $this->_tpl_vars['countpage']): ?>
	        <!--&nbsp;|&nbsp;-->
	      <?php endif; ?>
	<?php endfor; endif; ?>
<?php endif; ?>
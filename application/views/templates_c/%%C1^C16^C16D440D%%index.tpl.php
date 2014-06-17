<?php /* Smarty version 2.6.18, created on 2012-03-27 12:56:16
         compiled from orders/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'orders/index.tpl', 36, false),array('modifier', 'strip_tags', 'orders/index.tpl', 36, false),)), $this); ?>
<div class="cont_sr">
	<div class="cont_s_pos">
		<h2><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__MY_ORDERS']; ?>
</h2>
		
		<div class="zakaz_tbl_pos">
			<table class="zakaz_tbl" width="100%" border="0" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<td><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__STATUS']; ?>
</td>
					<td width="67"><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__ORDER_NUMBER']; ?>
</td>
					<td><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__ORDER_NAME']; ?>
</td>
					<td><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__DOWNLOAD_WORK']; ?>
</td>
				</tr>
			</thead>
			<tbody>
			<?php $_from = $this->_tpl_vars['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['order']):
?>
				<tr>
					<td>
						<a class="zakaz_stat_<?php echo $this->_tpl_vars['order']['pay_status']; ?>
" href="/orders/view/<?php echo $this->_tpl_vars['order']['id']; ?>
">
							<span>
							<?php if ($this->_tpl_vars['order']['pay_status'] == 1): ?>
								<?php echo $this->_tpl_vars['frontendLangParams']['STATUSES__STATUS1']; ?>

							<?php elseif ($this->_tpl_vars['order']['pay_status'] == 2): ?>
								<?php echo $this->_tpl_vars['frontendLangParams']['STATUSES__STATUS2']; ?>

							<?php elseif ($this->_tpl_vars['order']['pay_status'] == 3): ?>
								<?php echo $this->_tpl_vars['frontendLangParams']['STATUSES__STATUS3']; ?>

							<?php else: ?>
								<?php echo $this->_tpl_vars['frontendLangParams']['STATUSES__STATUS4']; ?>

							<?php endif; ?>
							</span>
						</a>
					</td>
					<td><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__NUMBER']; ?>
<?php echo $this->_tpl_vars['order']['id']; ?>
</td>
					<td>
                        <?php if ($this->_tpl_vars['order']['filename_original'] != ''): ?>
                            <a class="doc_link" href="/download<?php echo $this->_tpl_vars['order']['id']; ?>
.html"><i><img src="/images/ico_doc.gif" alt=""></i><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['filename_original'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['order']['filename_original'] != '' && $this->_tpl_vars['order']['filename_original2'] != ''): ?><br /><?php endif; ?>
                        <?php if ($this->_tpl_vars['order']['filename_original2'] != ''): ?>
                            <a class="doc_link" href="/2download<?php echo $this->_tpl_vars['order']['id']; ?>
.html"><i><img src="/images/ico_doc.gif" alt=""></i><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['filename_original2'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a>
                        <?php endif; ?>
                    </td>
					<td>
                        <?php if ($this->_tpl_vars['order']['filename_translated'] != '' && $this->_tpl_vars['order']['pay_status'] == 4): ?>
                            <a class="doc_link_on" href="/tdownload<?php echo $this->_tpl_vars['order']['id']; ?>
.html"><i><img src="/images/ico_doc.gif" alt=""></i><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['filename_translated_original'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a>
                        <?php else: ?>
                            &nbsp;
                        <?php endif; ?>
                    </td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>	
				<tr>
					<td colspan="4" align="center">
						<?php if ($this->_tpl_vars['page_count'] > 1): ?>
						<span style="color:#0276b1; font-size:11px;"><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__PAGES']; ?>
: </span>
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
						    <span style="color:#000000; font-size:11px;" ><?php echo $this->_tpl_vars['page_num']; ?>
</span>
						  <?php else: ?>
						    <a href="/orders/page/<?php echo $this->_sections['item']['index']; ?>
" style="font-size:11px; text-decoration:none;"><?php echo $this->_sections['item']['index']; ?>
</a>
						  <?php endif; ?>
						  <?php if ($this->_sections['item']['index'] != $this->_tpl_vars['page_count']): ?>
						  <?php endif; ?>
						<?php endfor; endif; ?>
						<?php endif; ?>
					</td>
				</tr>
			</tbody>
			</table>
			
			
						
		</div>
	</div>
</div>
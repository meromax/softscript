<?php /* Smarty version 2.6.18, created on 2011-12-01 19:33:27
         compiled from orders/view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'orders/view.tpl', 16, false),array('modifier', 'strip_tags', 'orders/view.tpl', 16, false),)), $this); ?>
<div class="cont_sr">
	<div class="cont_s_pos">
		<div class="gl_block">
			<div class="t_line"><i class="t_l"></i><i class="t_r"></i></div>
			<div class="gl_block_pos">
					<h1><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__ORDER_DATA']; ?>
 <?php echo $this->_tpl_vars['frontendLangParams']['TITLE__NUMBER']; ?>
<?php echo $this->_tpl_vars['order']['id']; ?>
</h1>
					
					<div class="profile">
						<form method="POST" action="">
								<div class="line"></div>
								
								<div class="profile_tbl">
									<table cellspacing="0" cellpadding="0">
									<tr>
										<td><nobr><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__FROM_LANGUAGE']; ?>
</nobr></td>
										<th><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['langFrom']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</th>
										
										<td><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__LETTERS_COUNT']; ?>
</td>
										<th>
											<?php echo $this->_tpl_vars['order']['main_letters_count']; ?>

										</th>
									</tr>
									<tr>
										<td><nobr><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__TO_LANGUAGE']; ?>
:</nobr></td>
										<th><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['langTo']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</th>
										
										<td><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__CATEGORY']; ?>
</td>
										<th><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['ttheme']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</th>
									</tr>
									</table>
								</div>
								
								<div class="line"></div>
								<?php if ($this->_tpl_vars['order']['pay_status'] == 4): ?>
									<a class="sbm_link" href="/tdownload<?php echo $this->_tpl_vars['order']['id']; ?>
.html"><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__DOWNLOAD']; ?>
</a>
								<?php elseif ($this->_tpl_vars['order']['pay_status'] == 1): ?>
									<a class="sbm_link" href=""><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__PAY']; ?>
</a>
								<?php elseif ($this->_tpl_vars['order']['pay_status'] == 3): ?>
									<a class="sbm_link" href=""><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__EXTRAPAY']; ?>
</a>
								<?php endif; ?>
								<p class="zakaz_stat"><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__COST']; ?>
 <b>$ <?php echo $this->_tpl_vars['order']['main_price']; ?>
</b><br>
								<?php echo $this->_tpl_vars['frontendLangParams']['TITLE__STATUS']; ?>
: <b><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['pay_status_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</b>
								
								<div class="clear_line"></div>
						</form>
					</div>
			</div>
			<i class="b_l"></i><i class="b_r"></i>
		</div>
	</div>
</div>
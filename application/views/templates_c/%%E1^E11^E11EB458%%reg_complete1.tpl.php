<?php /* Smarty version 2.6.18, created on 2011-11-09 16:51:40
         compiled from registration/reg_complete1.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'registration/reg_complete1.tpl', 1, false),array('modifier', 'strip_tags', 'registration/reg_complete1.tpl', 1, false),)), $this); ?>
<div class="header_txt3"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['registration'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</div>
<div class="content_container">

<div class="content_block">
	<div style='line-height:16px; font-size:16px;'>
		<center><p><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['settings']['registration_complete'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</p></center>
	</div>
</div>
</div>
<?php if ($this->_tpl_vars['payment_step'] == 1): ?>
	<?php echo '
	<script type="text/javascript">
		setTimeout(function () { document.location.href=\'/payment.html\'; }, 3000);
	</script>
	'; ?>

<?php else: ?>
	<?php echo '
	<script type="text/javascript">
		setTimeout(function () { document.location.href=\'/myaccount.html\'; }, 5000);
	</script>
	'; ?>

<?php endif; ?>
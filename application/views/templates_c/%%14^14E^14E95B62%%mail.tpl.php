<?php /* Smarty version 2.6.18, created on 2013-11-03 23:54:18
         compiled from reviews/mail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'reviews/mail.tpl', 9, false),)), $this); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Message</title>
</head>
<body>
<?php if (isset ( $this->_tpl_vars['name'] )): ?>
<p>
	<b>Имя:</b><?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

</p>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['email'] )): ?>
<p>
    <b>E-mail:</b><?php echo ((is_array($_tmp=$this->_tpl_vars['email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

</p>
<?php endif; ?>
<p>
	<?php echo ((is_array($_tmp=$this->_tpl_vars['message'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

</p>
</body>
</html>
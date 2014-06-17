<?php /* Smarty version 2.6.18, created on 2014-01-15 15:08:59
         compiled from feedback/mail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'feedback/mail.tpl', 11, false),array('modifier', 'strip_tags', 'feedback/mail.tpl', 11, false),)), $this); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Проблема с оформлением заказа.</title>
</head>

<body>
<table cellpadding="0" cellspacing="0" width="60%">
<tr>
	<td align="left" valign="top">
        <b>Имя:</b><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
<br />
        <b>E-mail:</b><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
<br />
        <b>Сообщение:</b><br /><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['message'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

	</td>
</tr>
</table>
</body>
</html>
<?php /* Smarty version 2.6.18, created on 2014-01-15 15:10:54
         compiled from registration/reg_mail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'registration/reg_mail.tpl', 10, false),array('modifier', 'strip_tags', 'registration/reg_mail.tpl', 10, false),)), $this); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__REGISTRATION_INFORMATION']; ?>
</title>
</head>

<body>
<table cellpadding="0" cellspacing="0">
<tr>
	<td align="left" nowrap="nowrap" align="center"><b><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__HELLO']; ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['user']['reg_name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
!</td>
</tr>
<tr>
	<td align="left" nowrap="nowrap"><b><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__YOUR']; ?>
 E-mail:</b><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['user']['reg_email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
</tr>
<tr>
	<td align="left" nowrap="nowrap"><b><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__YOUR']; ?>
 <?php echo $this->_tpl_vars['frontendLangParams']['TITLE__PASSWORD']; ?>
:</b><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['user']['reg_password'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
</tr>
</table>
</body>
</html>
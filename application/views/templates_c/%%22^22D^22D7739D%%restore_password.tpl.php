<?php /* Smarty version 2.6.18, created on 2011-12-02 17:46:30
         compiled from registration/restore_password.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'registration/restore_password.tpl', 10, false),array('modifier', 'strip_tags', 'registration/restore_password.tpl', 10, false),)), $this); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__PASSWORD_RESTORE']; ?>
</title>
</head>

<body>
<table cellpadding="0" cellspacing="0">
<tr>
	<td align="left" nowrap="nowrap" align="center"><b><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__HELLO']; ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['user']['first_name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
!</td>
</tr>
<tr>
	<td align="left" nowrap="nowrap"><b><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__YOUR']; ?>
 E-mail:</b><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['user']['email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
</tr>
<tr>
	<td align="left" nowrap="nowrap"><b><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__YOUR']; ?>
 <?php echo $this->_tpl_vars['frontendLangParams']['TITLE__PASSWORD']; ?>
</b><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['password'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
</tr>
</table>
</body>
</html>
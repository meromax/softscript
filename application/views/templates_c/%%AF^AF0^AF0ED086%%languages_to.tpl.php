<?php /* Smarty version 2.6.18, created on 2011-09-21 01:06:23
         compiled from languages/languages_to.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'languages/languages_to.tpl', 9, false),array('modifier', 'strip_tags', 'languages/languages_to.tpl', 9, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(function(){
	$("select#lang_to_id").jqTransform({"/js/jqtransformplugin/img/"});
})
</script>
'; ?>

<select id="lang_to_id" name="lang_to_id">
<option value="0"><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__CHOOSE_LANGUAGE']; ?>
</option><?php $_from = $this->_tpl_vars['languages_to']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang_item']):
?><option value="<?php echo $this->_tpl_vars['lang_item']['lang_id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option><?php endforeach; endif; unset($_from); ?>
</select>
<?php /* Smarty version 2.6.18, created on 2014-01-27 23:26:56
         compiled from admin/banners/meta.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/banners/meta.tpl', 8, false),)), $this); ?>
<table style="border:1px solid #b2b2b2;">
<tr>
	<td class="header" style="padding:10px 10px 10px 10px;" colspan="2" align="center"><?php echo $this->_tpl_vars['adminLangParams']['META_HEADER']; ?>
</td>
</tr>				
<tr>
	<td class="header" style="padding:10px 10px 10px 10px;"><?php echo $this->_tpl_vars['adminLangParams']['META_TITLE']; ?>
</td>
	<td>
		<input type="text" class="input"  id="meta_title" name="meta_title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['banner']['meta_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" style="width:730px;">
	</td>
</tr>
<tr>
	<td class="header" style="padding:10px 10px 10px 10px;"><?php echo $this->_tpl_vars['adminLangParams']['META_DESCRIPTION']; ?>
</td>
	<td>
		<input type="text" class="input"  id="meta_description" name="meta_description" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['banner']['meta_description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" style="width:730px;">
	</td>
</tr>
<tr>
	<td class="header" style="padding:10px 10px 10px 10px;"><?php echo $this->_tpl_vars['adminLangParams']['META_KEYWORDS']; ?>
</td>
	<td>
		<input type="text" class="input"  id="meta_keywords" name="meta_keywords" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['banner']['meta_keywords'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" style="width:730px;">
	</td>
</tr>
<tr>
	<td class="header" style="padding:10px 10px 10px 10px;"><?php echo $this->_tpl_vars['adminLangParams']['META_LINK_TITLE']; ?>
</td>
	<td>
		<input type="text" class="input"  id="meta_link_title" name="meta_link_title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['banner']['meta_link_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" style="width:730px;">
	</td>
</tr>				
</table>
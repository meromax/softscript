<?php /* Smarty version 2.6.18, created on 2012-11-11 22:33:39
         compiled from admin/articles/articles_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/articles/articles_list.tpl', 22, false),array('modifier', 'strip_tags', 'admin/articles/articles_list.tpl', 28, false),array('modifier', 'stripslashes', 'admin/articles/articles_list.tpl', 28, false),array('modifier', 'truncate', 'admin/articles/articles_list.tpl', 29, false),)), $this); ?>
<br />
<center><span style="font-size:16px;"><?php echo $this->_tpl_vars['adminLangParams']['ARTICLES_HEADER']; ?>
</span></center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/articles/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
<tr>
	<td colspan="4" class="header"><a href="/admin/articles/add-article"><?php echo $this->_tpl_vars['adminLangParams']['ARTICLES_ADD_ARTICLE']; ?>
</a></td>
</tr>

<tr><td colspan="4" height="4" style="line-height:5px;">&nbsp;</td></tr>
<tr>
	<td class="header" width="50" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['ARTICLES_IMAGE']; ?>
</b></td>
	<td class="header"><b><?php echo $this->_tpl_vars['adminLangParams']['ARTICLES_TITLE']; ?>
</b></td>
	<td class="header"><b><?php echo $this->_tpl_vars['adminLangParams']['ARTICLES_DESCRIPTION']; ?>
</b></td>
	<td class="header" width="150" align="center"><b><?php echo $this->_tpl_vars['adminLangParams']['ARTICLES_ACTION']; ?>
</b></td>
</tr>
<?php $_from = $this->_tpl_vars['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pages_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pages_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['articles_item']):
        $this->_foreach['pages_loop']['iteration']++;
?>
<tr bgcolor="<?php echo smarty_function_cycle(array('values' => '#FFEFAA,#ffffff'), $this);?>
">
	<td align="center" style="padding:5px 5px 5px 5px;" width="45" height="45">
		<?php if ($this->_tpl_vars['articles_item']['article_image'] != ""): ?>
			<a href="/images/articles/<?php echo $this->_tpl_vars['articles_item']['article_image']; ?>
.jpg" rel="lightbox"><img align="absmiddle" src="/images/articles/<?php echo $this->_tpl_vars['articles_item']['article_image']; ?>
_small.jpg?time=<?php echo time(); ?>
" alt="" title="" width="45"></a></td>
		<?php endif; ?>
	</td>
	<td style="padding:5px 5px 5px 5px; width:400px;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['articles_item']['article_title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
	<td style="padding:5px 5px 5px 5px;"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['articles_item']['article_description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 200) : smarty_modifier_truncate($_tmp, 200)); ?>
</td>
	<td align="center"><a href="/admin/articles/modifyarticle/article_id/<?php echo $this->_tpl_vars['articles_item']['article_id']; ?>
"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_EDIT']; ?>
</a> | <a href="/admin/articles/delete/article_id/<?php echo $this->_tpl_vars['articles_item']['article_id']; ?>
"  onclick="return confirm(<?php echo $this->_tpl_vars['adminLangParams']['NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN']; ?>
)"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a></td>
</tr>
<tr><td colspan="4" height="4" style="line-height:5px;">&nbsp;</td></tr>
<?php endforeach; else: ?>
<tr>
	<td colspan="4"><b>Нет ни одной статьи...</b></td>
</tr>	
<?php endif; unset($_from); ?>
<tr>
	<td colspan="4" class="header"><a href="/admin/articles/add-article"><?php echo $this->_tpl_vars['adminLangParams']['ARTICLES_ADD_ARTICLE']; ?>
</a></td>
</tr>
<tr>
	<td align="left" colspan="4" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/articles/paging.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
</table>
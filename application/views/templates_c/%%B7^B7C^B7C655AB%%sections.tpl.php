<?php /* Smarty version 2.6.18, created on 2012-03-26 15:00:08
         compiled from sections/sections.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'sections/sections.tpl', 9, false),array('modifier', 'strip_tags', 'sections/sections.tpl', 9, false),)), $this); ?>
<div id="content_top" style="margin-top:3px;">
	<div id="header3"><img src="/images/text_top.png" /></div>
</div>
<div id="content_middle">
	<h1 style="padding-left:20px; padding-top:5px;"><?php echo $this->_tpl_vars['frontendLangParams']['LEFT_MENU_CATEGORIES']; ?>
</h1>
	<div class="sections">
		<ul>
		<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			<li><a href="/<?php echo $this->_tpl_vars['lang_title']; ?>
/sections/<?php echo $this->_tpl_vars['item']['link']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></li>
		<?php endforeach; endif; unset($_from); ?>
		</ul>	
	</div>
	<br /><br /><br /><br /><br /><br /><br /><br /><br />
	<div id="content_bottom"></div>
</div>
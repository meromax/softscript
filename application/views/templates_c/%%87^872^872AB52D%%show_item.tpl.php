<?php /* Smarty version 2.6.18, created on 2013-12-09 00:14:10
         compiled from novelty/show_item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'novelty/show_item.tpl', 5, false),array('modifier', 'strip_tags', 'novelty/show_item.tpl', 5, false),array('modifier', 'date_format', 'novelty/show_item.tpl', 6, false),)), $this); ?>
<div class="staticPageBox">
    <div class="pageTitle"><a href="/novelty/page/1">Новинки</a></div>
    <div class="pageText reviewListBox">
        <div class="item" style=" border-top:0px;">
            <div class="name"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</div>
            <div class="date"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</div>
            <div class="text"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</div>
        </div>
    </div>
</div>
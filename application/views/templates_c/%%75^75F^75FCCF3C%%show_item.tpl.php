<?php /* Smarty version 2.6.18, created on 2013-11-03 19:13:08
         compiled from news/show_item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'news/show_item.tpl', 7, false),array('modifier', 'strip_tags', 'news/show_item.tpl', 7, false),array('modifier', 'date_format', 'news/show_item.tpl', 8, false),)), $this); ?>
<div class="staticPageBox">
    <div class="pageTitle"><a href="/news/page/1">Новости</a></div>
    <div class="pageText">
        <div class="reviewListBox">

            <div class="item" style=" border-top:0px;">
                <div class="name"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['new_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</div>
                <div class="date"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['new_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</div>
                <div class="text"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['new_description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</div>
            </div>

        </div>
    </div>
</div>
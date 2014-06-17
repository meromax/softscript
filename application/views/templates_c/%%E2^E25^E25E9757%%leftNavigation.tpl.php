<?php /* Smarty version 2.6.18, created on 2014-01-16 13:20:22
         compiled from sections/leftNavigation.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'sections/leftNavigation.tpl', 7, false),array('modifier', 'stripslashes', 'sections/leftNavigation.tpl', 7, false),)), $this); ?>
<div class="product_menu">

    <nav>
        <ul id="ddmenu">
            <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['skey'] => $this->_tpl_vars['sec']):
?>
                <li>
                    <a href="/section/<?php echo $this->_tpl_vars['sec']['link']; ?>
/page/1" <?php if ($this->_tpl_vars['sec']['link'] == $this->_tpl_vars['activeLeftSection']): ?>class="active"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sec']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                    <?php if ($this->_tpl_vars['sec']['categories']): ?>
                    <ul>
                        <?php $_from = $this->_tpl_vars['sec']['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
                            <li><a href="/catalog/sec/<?php echo $this->_tpl_vars['sec']['link']; ?>
/cat/<?php echo $this->_tpl_vars['cat']['link']; ?>
/page/1" <?php if ($this->_tpl_vars['cat']['link'] == $this->_tpl_vars['activeLeftCategory']): ?>class="active"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['cat']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a></li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
    </nav>

</div>
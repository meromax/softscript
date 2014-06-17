<?php /* Smarty version 2.6.18, created on 2013-07-31 05:03:41
         compiled from default/slider.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'default/slider.tpl', 8, false),array('modifier', 'stripslashes', 'default/slider.tpl', 8, false),)), $this); ?>

<div style="clear: both;"></div>

<div id="slides">
    <div class="slides_container">
        <?php $_from = $this->_tpl_vars['mainBanners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="slide">
                <img src="/images/banners/<?php echo $this->_tpl_vars['item']['image']; ?>
_big.jpg" height="375" title="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
            </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <a href="#" class="prev">
        <img src="/images/mail-left-arrow.png" width="32" height="376" alt="Arrow Prev">
    </a>
    <a href="#" class="next">
        <img src="/images/mail-right-arrow.png" width="32" height="376" alt="Arrow Prev">
    </a>
</div>


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
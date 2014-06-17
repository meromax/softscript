<?php /* Smarty version 2.6.18, created on 2012-11-01 16:12:26
         compiled from image_slider.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'image_slider.tpl', 28, false),array('modifier', 'strip_tags', 'image_slider.tpl', 28, false),)), $this); ?>
<script type="text/javascript" src="/js/jquery-1.js"></script>
<script type="text/javascript" src="/js/slide.js"></script>
<script type="text/javascript">

    var hideCarouselControlls = false;
    <?php echo '
    if (typeof($) !=\'undefined\') {
        $(document).ready(function () {
            try { infiniteSlider(hideCarouselControlls); }
            catch(e) {}; // ignore it
        });
    }
    '; ?>

</script>

<div class="infiniteCarousel startCarousel">
    <div class="wrapper" style="overflow: hidden;">
        <ul>
            <?php $_from = $this->_tpl_vars['banners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['banner']):
?>
                <li class="cloned">
                    <div class="rel-pos">
                        <?php if ($this->_tpl_vars['banner']['link'] != ""): ?>
                            <a href="<?php echo $this->_tpl_vars['banner']['link']; ?>
" title="Нажмите чтобы перейти..."><img src="/images/banners/<?php echo $this->_tpl_vars['banner']['image']; ?>
_big.jpg" width="478" height="277" /></a>
                        <?php else: ?>
                            <img src="/images/banners/<?php echo $this->_tpl_vars['banner']['image']; ?>
_big.jpg" width="478" height="277" />
                        <?php endif; ?>
                        <div class="action_box">
                            <div class="inner"><h2><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['banner']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</h2>
                                <?php echo ((is_array($_tmp=$this->_tpl_vars['banner']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
    </div>
    <div class="carouselControllerContainer">
        <?php $_from = $this->_tpl_vars['banners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['banner']):
?>
            <a class="carouselController" href="javascript:void(0);">&nbsp;</a>
        <?php endforeach; endif; unset($_from); ?>
    </div>
</div>
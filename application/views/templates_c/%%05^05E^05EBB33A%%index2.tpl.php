<?php /* Smarty version 2.6.18, created on 2012-10-30 14:11:00
         compiled from sections/index2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'sections/index2.tpl', 11, false),array('modifier', 'strip_tags', 'sections/index2.tpl', 11, false),)), $this); ?>
<div class="clearfix">
    <div class="actions">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/leftNavigation.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'leftBanners.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>

    <div class="cnt">
        <div class="breadcr">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'path.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        <h3><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['category']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</h3>
        <div style="width: 100%;">
            <script type="text/javascript" src="/js/lightbox.js"></script>
            <script type="text/javascript" src="/js/jquery-lightbox/js/jquery.lightbox-0.5.js"></script>
            <link rel="stylesheet" type="text/css" href="/js/jquery-lightbox/css/jquery.lightbox-0.5.css" media="screen" />
            <?php echo '
                <script type="text/javascript">

                    $(function() {
                        $(\'#gallery span a\').lightBox({
                            overlayBgColor: \'#000000\',
                            overlayOpacity: 0.7,
                            imageLoading:  \'/js/jquery-lightbox/images/lightbox-ico-loading.gif\',
                            imageBtnClose: \'/js/jquery-lightbox/images/lightbox-btn-close.gif?time=11\',
                            imageBtnPrev:  \'/js/jquery-lightbox/images/lightbox-btn-prev_RU.gif\',
                            imageBtnNext:  \'/js/jquery-lightbox/images/lightbox-btn-next_RU.gif?dsdasd\',
                            imageBlank:	   \'/js/jquery-lightbox/images/lightbox-blank.gif\',
                            containerResizeSpeed: 350,
                            fixedNavigation:true,
                            txtImage: \'\',
                            txtOf: \'из\'


                        });
                    });
                </script>

            '; ?>


                <span id="gallery">
                    <span><a href="/images/categories/<?php echo $this->_tpl_vars['category']['image']; ?>
_original.jpg"  title="<?php echo ((is_array($_tmp=$this->_tpl_vars['category']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"><img align="left" src="/images/categories/<?php echo $this->_tpl_vars['category']['image']; ?>
_big.jpg?time=<?php echo time(); ?>
" width="589" border="0" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['category']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
"></a></span>
                </span>
                
        </div>
        <div style="position: relative; float: left; width: 100%;">
        <hr />
        <h4>Товары этой серии</h4>
        </div>
        <ul class="products clearfix">
        <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['prod']):
?>
            <li <?php if (( $this->_tpl_vars['key']+1 ) % 3 == 0): ?>class="third"<?php endif; ?>>
                <a href="<?php echo $this->_tpl_vars['prod']['link']; ?>
">
                    <span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</span>
                    <?php if ($this->_tpl_vars['prod']['image'] != ''): ?>
                        <img width="217" height="160" src="/images/products/<?php echo $this->_tpl_vars['prod']['image']; ?>
_small.jpg" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
                        <?php else: ?>
                        <img width="217" height="160" src="/images/default-product.png" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
                    <?php endif; ?>

                    <div class="price"><?php echo ((is_array($_tmp=$this->_tpl_vars['prod']['price'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 р.</div>
                </a>
            </li>
        <?php endforeach; endif; unset($_from); ?>
        </ul>
        <div class="content about">
        <?php echo ((is_array($_tmp=$this->_tpl_vars['category']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

        </div>
    </div>
</div>



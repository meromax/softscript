<?php /* Smarty version 2.6.18, created on 2014-01-16 12:11:12
         compiled from sections/product.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'sections/product.tpl', 42, false),array('modifier', 'stripslashes', 'sections/product.tpl', 42, false),array('modifier', 'replace', 'sections/product.tpl', 117, false),)), $this); ?>
<script type="text/javascript" src="/js/highslide/highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="/js/highslide/highslide/highslide.css" />
<?php echo '
<script type="text/javascript">
    hs.graphicsDir = \'../js/highslide/highslide/graphics/\';
    hs.align = \'center\';
    hs.transitions = [\'expand\', \'crossfade\'];
    hs.outlineType = \'rounded-white\';
    hs.fadeInOut = true;
    //hs.dimmingOpacity = 0.75;

    // Add the controlbar
    hs.addSlideshow({
        //slideshowGroup: \'group1\',
        interval: 5000,
        repeat: false,
        useControls: true,
        fixedControls: \'fit\',
        overlayOptions: {
            opacity: 0.75,
            position: \'bottom center\',
            hideOnMouseOut: true
        }
    });
</script>

'; ?>




<div class="main_content">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/leftNavigation.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <div class="main_data">
        <div class="productsBox">
            <div class="pageTitle">
                <a href="/">Главная</a>
                <span>&nbsp;/&nbsp;</span>
                <a href="/catalog/page/1">Продукция</a>
                <?php if ($this->_tpl_vars['currProductCategory']): ?>
                    <span>&nbsp;/&nbsp;</span>
                    <a href="/section/<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currProductSection']['link'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
/page/1"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currProductSection']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                    <span>&nbsp;/&nbsp;</span>
                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currProductCategory']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                    <?php else: ?>
                    <span>&nbsp;/&nbsp;</span>
                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['currProductSection']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                <?php endif; ?>
            </div>
            <div class="pageText">

                <div class="rightProductsBox">

                    <div class="mainProductBox">

                        <div class="productLeftBox">
                            <div class="productImage">
                                <a href="/images/products/<?php echo $this->_tpl_vars['product']['image']; ?>
_large.jpg" class="highslide" onclick="return hs.expand(this);" id="imageLinkId"><img src="/images/products/<?php echo $this->_tpl_vars['product']['image']; ?>
_middle.jpg"  style="border: 0px;" id="imageId" /></a>
                            </div>
                            <div class="sliderBox">
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/slider.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </div>
                        </div>

                        <div class="productRightBox">
                            <div class="productTitle">
                                <table>
                                    <tr>
                                        <td id="prodTitle<?php echo $this->_tpl_vars['product']['id']; ?>
">
                                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['product']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="productDescription">
                            <?php echo ((is_array($_tmp=$this->_tpl_vars['product']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                            </div>

                        </div>
                        <div style="clear: both;"></div>
                        <div class="separator" style="margin-top: 15px;"></div>

                        <div class="priceBox">
                            <div class="price">Цена:</div>
                            <div class="priceValue"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['product']['price'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 <span>руб.</span></div>

                                                                                                                                                            
                            <div class="review_sendButton" style="width: 140px; margin-top: 10px; margin-right: 10px;">
                                <a href="javascript:void(0);" onclick="addToCart('<?php echo $this->_tpl_vars['product']['id']; ?>
');">
                                    <div class="buttonRed" style="width: 130px;">Добавить в корзину</div>
                                </a>
                            </div>

                            <a href="javascript:void(0);" onclick="incProdCount('<?php echo $this->_tpl_vars['product']['id']; ?>
');">
                                <div class="btnMinus">+</div>
                            </a>

                            <div class="inpCountBox">
                                <input type="text" class="inp_count2" id="prodCount<?php echo $this->_tpl_vars['product']['id']; ?>
" maxlength="2" readonly="readonly" value="1">
                            </div>

                            <a href="javascript:void(0);" onclick="decProdCount('<?php echo $this->_tpl_vars['product']['id']; ?>
');">
                                <div class="btnPlus">-</div>
                            </a>



                        </div>

                        <div class="separator"></div>

                        <?php if (((is_array($_tmp=$this->_tpl_vars['product']['addinfo2'])) ? $this->_run_mod_handler('replace', true, $_tmp, "&nbsp;", "") : smarty_modifier_replace($_tmp, "&nbsp;", "")) != ""): ?>
                        <div class="productsBox" style="margin-top: 25px; padding-left: 0px;">
                            <div class="pageTitle2" style="font-size: 16px;">Дополнительная информация:</div>
                            <div class="pageText">
                                <?php echo ((is_array($_tmp=$this->_tpl_vars['product']['addinfo2'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

                            </div>
                        </div>
                        <?php endif; ?>



                        <?php if ($this->_tpl_vars['product']['files']): ?>
                            <div class="productsBox" style="margin-top: 25px; padding-left: 0px;">
                                <div class="pageTitle2" style="font-size: 16px;">Файлы:</div>
                                <div class="pageText">
                                    <?php $_from = $this->_tpl_vars['product']['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pfkey'] => $this->_tpl_vars['pfile']):
?>
                                        <div class="filesLinks">
                                            <div class="fileNum"><?php echo $this->_tpl_vars['pfkey']+1; ?>
</div>
                                            <div class="fileLink"><a href="/sections/index/get-file/id/<?php echo $this->_tpl_vars['pfile']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pfile']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></div>
                                        </div>
                                    <?php endforeach; endif; unset($_from); ?>
                                </div>
                            </div>
                        <?php endif; ?>


                                            
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        

                                            
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        

                        
                        <div class="productsBox" style="margin-top: 25px; padding-left: 0px;">
                            <div class="pageTitle2" style="font-size: 16px;">Отзывы:</div>
                            <div class="pageText" style="padding-top: 0px;">
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/product_reviews.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </div>
                        </div>

                        
                        <div class="productsBox" style="margin-top: 25px; padding-left: 0px;">
                            <div class="pageTitle2" style="font-size: 16px;">Поделиться в социальных сетях:</div>
                            <div class="pageText">
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'social.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </div>
                        </div>

                        


                    </div>





                </div>

            </div>
        </div>




    </div>

</div>




    

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                                    
                                                                                                                                                                                    

    
    
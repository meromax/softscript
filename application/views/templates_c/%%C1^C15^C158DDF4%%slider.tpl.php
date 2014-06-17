<?php /* Smarty version 2.6.18, created on 2014-01-16 16:01:03
         compiled from sections/slider.tpl */ ?>
<?php echo '
<script type="text/javascript">
    /* SLIDER 2 INIT*/
    $(function(){
        $(\'#slidesSecond\').slides({
            preload: true,
            preloadImage: \'/js/topSlider/img/loading.gif\',
            generateNextPrev: false,
            generatePagination: false,
            play: 5000,
            pause: 2500,
            hoverPause: true
        });
    });

    function setPic(imageId){
        var path = "/images/products/";
        var largeImage = path+imageId+"_large.jpg";
        var smallImage = path+imageId+"_middle.jpg";

        $("#imageLinkId").attr(\'href\', largeImage);
        $("#imageId").attr(\'src\', smallImage);
    }

</script>
'; ?>

<div style="clear: both;"></div>
<div id="slidesSecond">
    <div class="slides_container">
        <?php $_from = $this->_tpl_vars['productSlider']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pImagesItems']):
?>
            <div class="slide">
                <?php $_from = $this->_tpl_vars['pImagesItems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pItem']):
?>
                    <div class="item">
                        <a href="javascript:void(0);" onclick="setPic('<?php echo $this->_tpl_vars['pItem']['image']; ?>
');">
                            <img src="/images/products/<?php echo $this->_tpl_vars['pItem']['image']; ?>
_small.jpg" />
                        </a>
                    </div>
                <?php endforeach; endif; unset($_from); ?>
            </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <a href="#" class="prev">
        <img src="/images/left-arrow.png" width="15" height="58" alt="Arrow Prev">
    </a>
    <a href="#" class="next">
        <img src="/images/right-arrow.png" width="15" height="58" alt="Arrow Prev">
    </a>
</div>
{literal}
<script type="text/javascript">
    /* SLIDER 2 INIT*/
    $(function(){
        $('#slidesSecond').slides({
            preload: true,
            preloadImage: '/js/topSlider/img/loading.gif',
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

        $("#imageLinkId").attr('href', largeImage);
        $("#imageId").attr('src', smallImage);
    }

</script>
{/literal}
<div style="clear: both;"></div>
<div id="slidesSecond">
    <div class="slides_container">
        {foreach from=$productSlider item=pImagesItems}
            <div class="slide">
                {foreach from=$pImagesItems item=pItem}
                    <div class="item">
                        <a href="javascript:void(0);" onclick="setPic('{$pItem.image}');">
                            <img src="/images/products/{$pItem.image}_small.jpg" />
                        </a>
                    </div>
                {/foreach}
            </div>
        {/foreach}
    </div>
    <a href="#" class="prev">
        <img src="/images/left-arrow.png" width="15" height="58" alt="Arrow Prev">
    </a>
    <a href="#" class="next">
        <img src="/images/right-arrow.png" width="15" height="58" alt="Arrow Prev">
    </a>
</div>

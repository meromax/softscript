<script type="text/javascript" src="/js/jquery-1.js"></script>
<script type="text/javascript" src="/js/slide.js"></script>
<script type="text/javascript">

    var hideCarouselControlls = false;
    {literal}
    if (typeof($) !='undefined') {
        $(document).ready(function () {
            try { infiniteSlider(hideCarouselControlls); }
            catch(e) {}; // ignore it
        });
    }
    {/literal}
</script>

<div class="infiniteCarousel startCarousel">
    <div class="wrapper" style="overflow: hidden;">
        <ul>
            {foreach from=$banners item=banner}
                <li class="cloned">
                    <div class="rel-pos">
                        {if $banner.link!=""}
                            <a href="{$banner.link}" title="Нажмите чтобы перейти..."><img src="/images/banners/{$banner.image}_big.jpg" width="478" height="277" /></a>
                        {else}
                            <img src="/images/banners/{$banner.image}_big.jpg" width="478" height="277" />
                        {/if}
                        <div class="action_box">
                            <div class="inner"><h2>{$banner.title|stripslashes|strip_tags}</h2>
                                {$banner.description|stripslashes}
                            </div>
                        </div>
                    </div>
                </li>
            {/foreach}
        </ul>
    </div>
    <div class="carouselControllerContainer">
        {foreach key=key from=$banners item=banner}
            <a class="carouselController" href="javascript:void(0);">&nbsp;</a>
        {/foreach}
    </div>
</div>
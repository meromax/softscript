<div class="clearfix">
    <div class="actions">
        {include file='sections/leftNavigation.tpl'}
        {include file='leftBanners.tpl'}
    </div>

    <div class="cnt">
        <div class="breadcr">
            {include file='path.tpl'}
        </div>
        <h3>{$category.title|stripslashes|strip_tags}</h3>
        <div style="width: 100%;">
            <script type="text/javascript" src="/js/lightbox.js"></script>
            <script type="text/javascript" src="/js/jquery-lightbox/js/jquery.lightbox-0.5.js"></script>
            <link rel="stylesheet" type="text/css" href="/js/jquery-lightbox/css/jquery.lightbox-0.5.css" media="screen" />
            {literal}
                <script type="text/javascript">

                    $(function() {
                        $('#gallery span a').lightBox({
                            overlayBgColor: '#000000',
                            overlayOpacity: 0.7,
                            imageLoading:  '/js/jquery-lightbox/images/lightbox-ico-loading.gif',
                            imageBtnClose: '/js/jquery-lightbox/images/lightbox-btn-close.gif?time=11',
                            imageBtnPrev:  '/js/jquery-lightbox/images/lightbox-btn-prev_RU.gif',
                            imageBtnNext:  '/js/jquery-lightbox/images/lightbox-btn-next_RU.gif?dsdasd',
                            imageBlank:	   '/js/jquery-lightbox/images/lightbox-blank.gif',
                            containerResizeSpeed: 350,
                            fixedNavigation:true,
                            txtImage: '',
                            txtOf: 'из'


                        });
                    });
                </script>

            {/literal}

                <span id="gallery">
                    <span><a href="/images/categories/{$category.image}_original.jpg"  title="{$category.title|stripslashes}"><img align="left" src="/images/categories/{$category.image}_big.jpg?time={$smarty.now}" width="589" border="0" alt="{$category.title|stripslashes|strip_tags}"></a></span>
                </span>
                {*<img src="/images/categories/{$category.image}_big.jpg" width="589">*}

        </div>
        <div style="position: relative; float: left; width: 100%;">
        <hr />
        <h4>Товары этой серии</h4>
        </div>
        <ul class="products clearfix">
        {foreach key=key from=$products item=prod}
            <li {if ($key+1)%3==0}class="third"{/if}>
                <a href="{$prod.link}">
                    <span>{$prod.title|stripslashes|strip_tags}</span>
                    {if $prod.image!=''}
                        <img width="217" height="160" src="/images/products/{$prod.image}_small.jpg" alt="{$prod.title|stripslashes|strip_tags}">
                        {else}
                        <img width="217" height="160" src="/images/default-product.png" alt="{$prod.title|stripslashes|strip_tags}">
                    {/if}

                    <div class="price">{$prod.price|strip_tags} р.</div>
                </a>
            </li>
        {/foreach}
        </ul>
        <div class="content about">
        {$category.description|stripslashes}
        </div>
    </div>
</div>




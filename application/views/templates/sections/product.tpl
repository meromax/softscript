<script type="text/javascript" src="/js/highslide/highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="/js/highslide/highslide/highslide.css" />
{literal}
<script type="text/javascript">
    hs.graphicsDir = '../js/highslide/highslide/graphics/';
    hs.align = 'center';
    hs.transitions = ['expand', 'crossfade'];
    hs.outlineType = 'rounded-white';
    hs.fadeInOut = true;
    //hs.dimmingOpacity = 0.75;

    // Add the controlbar
    hs.addSlideshow({
        //slideshowGroup: 'group1',
        interval: 5000,
        repeat: false,
        useControls: true,
        fixedControls: 'fit',
        overlayOptions: {
            opacity: 0.75,
            position: 'bottom center',
            hideOnMouseOut: true
        }
    });
</script>

{/literal}



<div class="main_content">
{include file='sections/leftNavigation.tpl'}

    <div class="main_data">
        <div class="productsBox">
            <div class="pageTitle">
                <a href="/">Главная</a>
                <span>&nbsp;/&nbsp;</span>
                <a href="/catalog/page/1">Продукция</a>
                {if $currProductCategory}
                    <span>&nbsp;/&nbsp;</span>
                    <a href="/section/{$currProductSection.link|strip_tags|stripslashes}/page/1">{$currProductSection.title|strip_tags|stripslashes}</a>
                    <span>&nbsp;/&nbsp;</span>
                    {$currProductCategory.title|strip_tags|stripslashes}
                    {else}
                    <span>&nbsp;/&nbsp;</span>
                    {$currProductSection.title|strip_tags|stripslashes}
                {/if}
            </div>
            <div class="pageText">

                <div class="rightProductsBox">

                    <div class="mainProductBox">

                        <div class="productLeftBox">
                            <div class="productImage">
                                <a href="/images/products/{$product.image}_large.jpg" class="highslide" onclick="return hs.expand(this);" id="imageLinkId"><img src="/images/products/{$product.image}_middle.jpg"  style="border: 0px;" id="imageId" /></a>
                            </div>
                            <div class="sliderBox">
                            {include file='sections/slider.tpl'}
                            </div>
                        </div>

                        <div class="productRightBox">
                            <div class="productTitle">
                                <table>
                                    <tr>
                                        <td id="prodTitle{$product.id}">
                                        {$product.title|stripslashes|strip_tags}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="productDescription">
                            {$product.description|stripslashes}
                            </div>

                        </div>
                        <div style="clear: both;"></div>
                        <div class="separator" style="margin-top: 15px;"></div>

                        <div class="priceBox">
                            <div class="price">Цена:</div>
                            <div class="priceValue">{$product.price|strip_tags|stripslashes} <span>руб.</span></div>

                            {*<div class="review_sendButton" style="width: 140px; margin-top: 10px; margin-right: 10px;">*}
                                {*<a href="/orders/add-to-cart/{$product.id}">*}
                                    {*<div class="buttonRed" style="width: 130px;">Добавить в корзину</div>*}
                                {*</a>*}
                            {*</div>*}

                            <div class="review_sendButton" style="width: 140px; margin-top: 10px; margin-right: 10px;">
                                <a href="javascript:void(0);" onclick="addToCart('{$product.id}');">
                                    <div class="buttonRed" style="width: 130px;">Добавить в корзину</div>
                                </a>
                            </div>

                            <a href="javascript:void(0);" onclick="incProdCount('{$product.id}');">
                                <div class="btnMinus">+</div>
                            </a>

                            <div class="inpCountBox">
                                <input type="text" class="inp_count2" id="prodCount{$product.id}" maxlength="2" readonly="readonly" value="1">
                            </div>

                            <a href="javascript:void(0);" onclick="decProdCount('{$product.id}');">
                                <div class="btnPlus">-</div>
                            </a>



                        </div>

                        <div class="separator"></div>

                        {if $product.addinfo2|replace:"&nbsp;":""!=""}
                        <div class="productsBox" style="margin-top: 25px; padding-left: 0px;">
                            <div class="pageTitle2" style="font-size: 16px;">Дополнительная информация:</div>
                            <div class="pageText">
                                {$product.addinfo2|stripslashes}
                            </div>
                        </div>
                        {/if}



                        {if $product.files}
                            <div class="productsBox" style="margin-top: 25px; padding-left: 0px;">
                                <div class="pageTitle2" style="font-size: 16px;">Файлы:</div>
                                <div class="pageText">
                                    {foreach key=pfkey from=$product.files item=pfile}
                                        <div class="filesLinks">
                                            <div class="fileNum">{$pfkey+1}</div>
                                            <div class="fileLink"><a href="/sections/index/get-file/id/{$pfile.id}">{$pfile.title|stripslashes|strip_tags}</a></div>
                                        </div>
                                    {/foreach}
                                </div>
                            </div>
                        {/if}


                    {*{if $product.main==1&&$relatedProducts}*}
                        {*<div class="separator"></div>*}

                        {*<div class="addInfoBox">*}
                            {*<div class="title">Мебель использованная в обстановке:</div>*}
                            {*<div class="relatedProductsBox">*}
                                {*{foreach key=pkey from=$relatedProducts item=pprod}*}
                                    {*<div class="productItem{if ($pkey+1)%3==0}Last{/if}">*}
                                        {*<div class="imageBox">*}
                                            {*<a href="/product/{$pprod.link}" title="{$pprod.title|stripslashes|strip_tags}"><img src="/images/products/{$pprod.image}_middle.jpg" /></a>*}
                                        {*</div>*}
                                        {*<div class="titleBox"></div>*}
                                        {*<div class="title">*}
                                            {*<table>*}
                                                {*<tr>*}
                                                    {*<td>*}
                                                        {*<a href="/product/{$pprod.link}">{$pprod.title|stripslashes|strip_tags}</a>*}
                                                    {*</td>*}
                                                {*</tr>*}
                                            {*</table>*}
                                        {*</div>*}
                                    {*</div>*}
                                {*{/foreach}*}
                            {*</div>*}
                            {*<div style="clear: both; margin-bottom: 10px;"></div>*}
                        {*</div>*}
                    {*{/if}*}


                    {*{if $categoryProducts}*}
                        {*<div class="separator"></div>*}

                        {*<div class="addInfoBox">*}
                            {*<div class="title">Вся мебель из коллекции:</div>*}
                            {*<div class="relatedProductsBox">*}
                                {*{foreach key=cpkey from=$categoryProducts item=cprod}*}
                                    {*<div class="productItem{if ($cpkey+1)%3==0}Last{/if}">*}
                                        {*<div class="imageBox">*}
                                            {*<a href="/product/{$cprod.link}" title="{$cprod.title|stripslashes|strip_tags}"><img src="/images/products/{$cprod.image}_middle.jpg" /></a>*}
                                        {*</div>*}
                                        {*<div class="titleBox"></div>*}
                                        {*<div class="title">*}
                                            {*<table>*}
                                                {*<tr>*}
                                                    {*<td>*}
                                                        {*<a href="/product/{$cprod.link}">{$cprod.title|stripslashes|strip_tags}</a>*}
                                                    {*</td>*}
                                                {*</tr>*}
                                            {*</table>*}
                                        {*</div>*}
                                    {*</div>*}
                                {*{/foreach}*}
                            {*</div>*}
                            {*<div style="clear: both; margin-bottom: 10px;"></div>*}
                        {*</div>*}
                    {*{/if}*}


                        {*<div class="separator"></div>*}

                        <div class="productsBox" style="margin-top: 25px; padding-left: 0px;">
                            <div class="pageTitle2" style="font-size: 16px;">Отзывы:</div>
                            <div class="pageText" style="padding-top: 0px;">
                            {include file='sections/product_reviews.tpl'}
                            </div>
                        </div>

                        {*<div class="separator"></div>*}

                        <div class="productsBox" style="margin-top: 25px; padding-left: 0px;">
                            <div class="pageTitle2" style="font-size: 16px;">Поделиться в социальных сетях:</div>
                            <div class="pageText">
                            {include file='social.tpl'}
                            </div>
                        </div>

                        {*<div class="separator"></div>*}



                    </div>





                </div>

            </div>
        </div>




    </div>

</div>




{*<div class="topTextBlock" style="min-height: 120px;">*}
    {*<div class="pageTitle">{$product.title|stripslashes|strip_tags}</div>*}


    {*<div class="productMenuTabs">*}
        {*<div class="tabActive" id="tab1">*}
            {*<a href="javascript:void(0);" onclick="showProductPage1();">Информация</a>*}
        {*</div>*}
        {*{if $product.images_count>1}*}
        {*<div class="tab" id="tab2">*}
            {*<a href="javascript:void(0);" onclick="showProductPage2();">Фотогалерея</a>*}
        {*</div>*}
        {*{/if}*}
        {*{if $product.video|replace:"&nbsp;":""!=""}*}
        {*<div class="tab" id="tab3">*}
            {*<a href="javascript:void(0);" onclick="showProductPage3();">Видео</a>*}
        {*</div>*}
        {*{/if}*}
        {*{if $product.addinfo2|replace:"&nbsp;":""!=""||$product.files}*}
        {*<div class="tab" id="tab4" style="width: 174px; margin-right: 0px;">*}
            {*<a href="javascript:void(0);" onclick="showProductPage4();">Инструкции</a>*}
        {*</div>*}
        {*{/if}*}
    {*</div>*}
    {*<div class="productPage" id="productPageTab1">*}
        {*<div class="pageText2">*}
            {*<table>*}
                {*<tr>*}
                    {*<td height="183" width="160" style="text-align: left; vertical-align: top;">*}
                        {*<img class="pItemImg2" src="/images/products/{$product.image}_middle.jpg" style="width: 160px; height:183px;"  alt="{$product.image_title|strip_tags|stripslashes}" title="{$product.image_title|strip_tags|stripslashes}" />*}
                        {*<div class="zoomIn3">*}
                            {*<a href="/images/products/{$product.image}_big.jpg" class="highslide" onclick="return hs.expand(this);"><img src="/images/icon2.png"  style="border: 0px;" /></a>*}
                        {*</div>*}
                        {*<div class="pItemPrice3">*}
                            {*{$product.price|strip_tags|stripslashes} р.<br /><br />*}
                            {*{if $product.active==1}*}
                                {*<a href="/orders/add-to-cart/{$product.id}"><img src="/images/button-buy2.png" /></a>*}
                            {*{else}*}
                                {*<span style="color: #B70D0E;">нет в наличии</span>*}
                            {*{/if}*}
                        {*</div>*}
                    {*</td>*}
                    {*<td >*}
                    {*{$product.description|stripslashes}*}
                    {*</td>*}
                {*</tr>*}
            {*</table>*}
        {*</div>*}
    {*</div>*}
    {*<div class="productPage" id="productPageTab2">*}
        {*<div class="pageText2">*}
            {*{foreach key=pikey from=$product.images item=pimage}*}
            {*<div style="float: left; {if ($pikey+1)%3!=0}margin-right: 10px;{/if} margin-bottom: 20px;">*}
                {*<a href="/images/products/{$pimage.image}_big.jpg" class="highslide" onclick="return hs.expand(this);">*}
                    {*<img class="pItemImg2" src="/images/products/{$pimage.image}_big.jpg" style="width: 190px; height: 217px;"  alt="{$pimage.title|strip_tags|stripslashes}" title="{$pimage.title|strip_tags|stripslashes}" />*}
                {*</a>*}
                {*<img class="pItemImg2" src="/images/products/{$pimage.image}_big.jpg" style="width: 190px; height: 217px;" />*}
                {*<div class="zoomIn4">*}
                    {*<a href="/images/products/{$pimage.image}_big.jpg" class="highslide" onclick="return hs.expand(this);"><img src="/images/icon2.png"  style="border: 0px;" /></a>*}
                {*</div>*}
            {*</div>*}
            {*{/foreach}*}
        {*</div>*}
    {*</div>*}

    {*<div class="productPage" id="productPageTab3">*}
        {*<div class="pageText2">*}
            {*{$product.video|stripslashes}*}
        {*</div>*}
    {*</div>*}

    {*<div class="productPage" id="productPageTab4">*}
        {*<div class="pageText2">*}
            {*{$product.addinfo2|stripslashes}*}
            {*{if $product.files}*}
                {*<div class="filesHeader">Файлы:</div>*}
                {*{foreach key=pfkey from=$product.files item=pfile}*}
                {*<div class="filesLinks">*}
                    {*<div class="fileNum">{$pfkey+1}</div>*}
                    {*<div class="fileLink"><a href="/sections/index/get-file/id/{$pfile.id}">{$pfile.title|stripslashes|strip_tags}</a></div>*}
                {*</div>*}
                {*{/foreach}*}
            {*{/if}*}
        {*</div>*}
    {*</div>*}


    {*{include file='sections/product_reviews.tpl'}*}

    {*<div>&nbsp;</div>*}
{*</div>*}
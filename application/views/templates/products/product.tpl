<!--  ==========  -->
<!--  = Breadcrumbs =  -->
<!--  ==========  -->
<div class="darker-stripe">
    <div class="container">
        <div class="row">
            <div class="span12">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li><span class="icon-chevron-right"></span></li>
                    <li>
                        <a href="/catalog.html">Каталог</a>
                    </li>

                    <li><span class="icon-chevron-right"></span></li>
                    <li>
                        <a href="/product/{$product.link}">{$product.title|stripslashes|strip_tags}</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>

<!--  ==========  -->
<!--  = Main container =  -->
<!--  ==========  -->
<div class="container">
    <div class="push-up top-equal blocks-spacer">

        <!--  ==========  -->
        <!--  = Product =  -->
        <!--  ==========  -->
        <div class="row blocks-spacer">

            <!--  ==========  -->
            <!--  = Preview Images =  -->
            <!--  ==========  -->
            <div class="span5">
                <div class="product-preview">
                    <div class="picture">
                        <img src="/images/products/{$product.image}_big.jpg" alt="" width="540" height="378" id="mainPreviewImg" />
                    </div>
                    {if $product.images && $images_count>1}
                    <div class="thumbs clearfix">
                        {foreach key=piKey from=$product.images item=pImage}
                        <div class="thumb {if $piKey==0}active{/if}">
                            <a href="#mainPreviewImg"><img src="/images/products/{$pImage.image}_big.jpg" alt="" width="540" height="378" /></a>
                        </div>
                        {/foreach}
                    </div>
                    {/if}
                </div>
            </div>

            <!--  = Title and short desc =  -->
            <div class="span7">
                <div class="product-title">
                    <h1 class="name"><span class="light" id="prodTitle{$product.id}">{$product.title|stripslashes|strip_tags}</span></h1>
                    <div class="meta">
                        <span class="tag">$ {$product.price}</span>
                        {*<span class="stock">*}
                            {*<span class="btn btn-success">In Stock</span>*}
                            {*<span class="btn btn-danger">Out of Stock</span>*}
                            {*<span class="btn btn-warning">Ask for availability</span>*}
                        {*</span>*}
                    </div>
                </div>
                <div class="product-description">
                    <p>
                        {$product.description|stripslashes}
                    </p>
                    <hr />

                    <!--  Add to cart -->
                    <div class="form form-inline clearfix">
                    <span class="tag" style="font-size: 18px;">Количество:</span>
                    <div class="numbered" style="padding-left: 10px;">
                        <input type="text" name="num" value="1" id="prodCount{$product.id}" maxlength="2" readonly="readonly" class="tiny-size" />
                        <span class="clickable add-one icon-plus-sign-alt"></span>
                        <span class="clickable remove-one icon-minus-sign-alt"></span>
                    </div>
                    <button class="btn btn-danger pull-right" type="button" onclick="addToCart('{$product.id}')"><i class="icon-shopping-cart"></i> &nbsp; Добавить в корзину</button>
                    </div>

                    <hr />

                    <!-- Share buttons -->
                    <div class="share-item push-down-20">
                        <div class="row-fluid">
                            <div class="span6" style="padding-top: 3px;">
                                Рассказать друзьям в социальных сетях:
                            </div>
                            <div class="span6">
                                <div class="social-networks" style="float: right;">
                                    {*{include file="socialShare.tpl"}*}
                                    {include file="social.tpl"}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- More Buttons -->
                    {*<div class="store-buttons">*}
                        {*<i class="icon-heart"></i> <a href="#">Add to a wishlist</a> &nbsp;&nbsp; | &nbsp;&nbsp;*}
                        {*<i class="icon-exchange"></i> <a href="#">Add to compare</a> &nbsp;&nbsp; | &nbsp;&nbsp;*}
                        {*<i class="icon-envelope-alt"></i> <a href="#">Email to a friend</a>*}
                    {*</div>*}

                </div>
            </div>
        </div>

        <!--  ==========  -->
        <!--  = Tabs with more info =  -->
        <!--  ==========  -->
        <div class="row">
            <div class="span12">
                <ul id="myTab" class="nav nav-tabs">
                    {if $product.addinfo2}
                    <li class="active">
                        <a href="#tab-1" data-toggle="tab">ОПИСАНИЕ</a>
                    </li>
                    {/if}
                    {if $product.video}
                    <li {if !$product.addinfo2}class="active"{/if}>
                        <a href="#tab-2" data-toggle="tab">ДОПОЛНИТЕЛЬНО</a>
                    </li>
                    {/if}
                    <li {if !$product.addinfo2 && !$product.video}class="active"{/if}>
                        <a href="#tab-3" data-toggle="tab">ОТЗЫВЫ</a>
                    </li>
                </ul>
                <div class="tab-content">
                    {if $product.addinfo2}
                    <div class="fade in tab-pane active" id="tab-1">
                        {$product.addinfo2|stripslashes}
                    </div>
                    {/if}
                    {if $product.video}
                    <div class="fade tab-pane {if !$product.addinfo2}in active{/if}" id="tab-2">
                        {$product.video|stripslashes}
                    </div>
                    {/if}
                    <div class="fade tab-pane {if !$product.addinfo2 && !$product.video}in active{/if}" id="tab-3">
                        {if $UserLogedIn}
                        <div class="span5">
                            <section class="contact-form-container">

                                <div class="underlined">
                                    <h3 class="light"><b>Оставить</b> <span class="light">отзыв</span></h3>
                                </div>

                                <br />
                                <form method="post" name="reviewForm" id="reviewForm" class="form form-inline form-contact">

                                    <p class="push-down-20">
                                        <textarea class="input-block-level" tabindex="4" rows="7" cols="70" name="review" id="reviewid" placeholder="Напишите ваше сообщение здесь ..."></textarea>
                                    </p>

                                    <div id="reviewMessage" class="alert alert-danger in fade hidden">
                                        &nbsp;
                                    </div>
                                    <p>
                                        <input type="hidden" name="product_id" value="{$product.id}" />
                                        <button class="btn btn-primary bold" type="button" tabindex="5" onclick="addReview();">Отправить сообщение</button>
                                    </p>
                                </form>
                            </section>
                        </div>
                        {/if}
                        <div class="span6">
                            {if $productsReviews}
                            <section class="contact-form-container">

                                <div class="underlined">
                                    <h3 class="light"><b>Отзывы</b></h3>
                                </div>

                                <br />

                                {foreach from=$productsReviews item=ritem}
                                <div class="accordion-group accordion-style-2 active" style="margin-top: 0px;">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="javascript:void(0);">
                                            <span class="bg-for-icon"><i class="icon-user"></i></span>
                                            {$ritem.username}
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="accordion-body in collapse" style="height: auto;">
                                        <div class="accordion-inner">
                                            {$ritem.description|stripslashes|strip_tags}
                                        </div>
                                    </div>
                                </div>
                                {/foreach}
                            </section>
                            {/if}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /container -->

<!--  ==========  -->
<!--  = Related Products =  -->
<!--  ==========  -->
<div class="boxed-area no-bottom">
    <div class="container">

        <!--  ==========  -->
        <!--  = Title =  -->
        <!--  ==========  -->
        <div class="row">
            <div class="span12">
                <div class="main-titles lined">
                    <h2 class="title"><span class="light">Похожие</span> Товары</h2>
                </div>
            </div>
        </div>


        <!-- Related products -->
        <div class="row popup-products">

            {foreach key=rpKey from=$relatedProducts item=rProduct}
                {if $rpKey>0 && $rpKey%4==0}
                    <div style="clear: both;" class="underlined span12 push-down-30"></div>
                {/if}
                <!-- Product -->
                <div class="span3">
                    <div class="product">
                        <div class="product-inner">
                            <div class="product-img">
                                <div class="picture">
                                    <img src="/images/products/{$rProduct.image}_middle.jpg" alt="" width="270" height="189" />
                                    <div class="img-overlay">
                                        <a href="/product/{$rProduct.link}" class="btn more btn-primary">Обзор</a>
                                        <a href="#" class="btn buy btn-danger">Добавить в корзину</a>
                                    </div>
                                </div>
                            </div>
                            <div class="main-titles no-margin">
                                <h4 class="title"><span class="striked">${$rProduct.old_price}</span> <span class="red-clr">${$rProduct.price}</span></h4>
                                <h5 class="no-margin">{$rProduct.title|stripslashes|strip_tags}</h5>
                            </div>
                            <p class="desc">
                                {$rProduct.description|strip_tags|stripslashes}
                            </p>
                            {*<p class="center-align stars">*}
                                {*<span class="icon-star stars-clr"></span>*}
                                {*<span class="icon-star stars-clr"></span>*}
                                {*<span class="icon-star stars-clr"></span>*}
                                {*<span class="icon-star stars-clr"></span>*}
                                {*<span class="icon-star"></span>*}
                            {*</p>*}
                        </div>
                    </div>
                </div>
                <!-- /Product -->



            {/foreach}




        </div>
    </div>
</div>
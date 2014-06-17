<div class="most-popular blocks-spacer">
    <div class="container">

        <div class="row">
            <div class="span12">
                <div class="main-titles lined">
                    <h2 class="title"><span class="light">Популярные</span> товары</h2>
                </div>
            </div>
        </div>

        <div class="row popup-products blocks-spacer" style="margin-bottom: 45px;">
            {foreach key=pKey from=$popularProducts item=popularProd}

            {if $pKey>0 && $pKey%4==0}
                </div>
                <div class="row popup-products blocks-spacer">
            {/if}

            <!-- Product -->
            <div class="span3">
                <div class="product2">
                    <div class="product-inner">
                        <div class="product-img">
                            <div class="picture">
                                <img src="/images/products/{$popularProd.image}_middle.jpg" alt="" width="270" height="189" />
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <div class="price">
                                <h4 class="title">${$popularProd.price}</h4>
                            </div>

                            <div class="titleHeader">
                                <h5 class="no-margin">{$popularProd.title|stripslashes|strip_tags}</h5>
                            </div>
                        </div>
                        {*<div class="desc">*}
                        {*{$newProd.description_short|stripslashes|strip_tags}*}
                        {*</div>*}
                        <div class="buttons">
                            <a href="/product/{$popularProd.link}" class="btn more btn-primary">Обзор</a>
                            <a class="btn buy btn-danger" href="javascript:void(0);" onclick="addToCart('{$popularProd.id}')">Добавить в корзину</a>
                        </div>
                        <input type="hidden" name="prodCount{$popularProd.id}" id="prodCount{$popularProd.id}" value="1" />
                        {*<div class="row-fluid hidden-line">*}
                        {*<div class="span6">*}
                        {*<a href="#" class="btn btn-small"><i class="icon-heart"></i></a>*}
                        {*<a href="#" class="btn btn-small"><i class="icon-exchange"></i></a>*}
                        {*</div>*}
                        {*<div class="span6 align-right">*}
                        {*<span class="icon-star stars-clr"></span>*}
                        {*<span class="icon-star stars-clr"></span>*}
                        {*<span class="icon-star stars-clr"></span>*}
                        {*<span class="icon-star"></span>*}
                        {*<span class="icon-star"></span>*}
                        {*</div>*}
                        {*</div>*}
                    </div>
                </div>
            </div>
            <!-- /Product -->

            {/foreach}
        </div>

    </div>
</div>
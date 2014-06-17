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
                        <a href="shop.html">Каталог</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="push-up blocks-spacer">
        <div class="row">
            {if $products}
            <!--  Sidebar -->
            <aside class="span3 left-sidebar" id="tourStep1">
                <div class="sidebar-item sidebar-filters" id="sidebarFilters">

                    <!-- Sidebar Title -->
                    <div class="underlined">
                        <h3><span class="light">Товары</span> по фильтру</h3>
                    </div>

                    <!-- Categories -->
                    <div class="accordion-group" id="tourStep2">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" href="#filterOne">Категории <b class="caret"></b></a>
                        </div>
                        <div id="filterOne" class="accordion-body collapse in">
                            <div class="accordion-inner">
                                {foreach from=$sections item=sec}
                                    <a href="#" data-target=".filter--sec{$sec.id}" class="selectable"><i class="box"></i> {$sec.title|strip_tags|stripslashes}</a>
                                {/foreach}
                            </div>
                        </div>
                    </div>
                    <!-- /Categories -->

                    <!-- Prices slider -->
                    <script type="text/javascript">
                        {literal}
                        var WebMarketVars = {
                            {/literal}
                            currencyBefore: true,
                            currencySymbol: "$",
                            priceRange: [{$min_price}, {$max_price}],
                            priceStep: 10
                            {literal}
                        };
                        {/literal}
                    </script>


                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" href="#filterPrices">Цена <b class="caret"></b></a>
                        </div>
                        <div id="filterPrices" class="accordion-body in collapse">
                            <div class="accordion-inner with-slider">
                                <div class="jqueryui-slider-container">
                                    <div id="pricesRange"></div>
                                </div>
                                <input type="text" data-initial="432" class="max-val pull-right" disabled />
                                <input type="text" data-initial="99" class="min-val" disabled />
                            </div>
                        </div>
                    </div> <!-- /prices slider -->



                    <a href="#" class="remove-filter" id="removeFilters"><span class="icon-ban-circle"></span> Сбросить фильтры</a>

                </div>
            </aside>
            <!-- /sidebar -->
            {/if}

            <!--  ==========  -->
            <!--  = Main content =  -->
            <!--  ==========  -->
            <section {if $products}class="span9"{else}class="span12"{/if}>

                <!--  ==========  -->
                <!--  = Title =  -->
                <!--  ==========  -->
                <div class="underlined push-down-20">
                    <div class="row">
                        <div class="span4">
                            <h3><span class="light">Результаты</span> поиска</h3>
                        </div>
                        {if $products}
                        <div class="span5 align-right">
                            <div class="form-inline sorting-by" id="tourStep4">
                                <label for="isotopeSorting" class="black-clr">Сортировать:</label>
                                {literal}
                                    <select id="isotopeSorting" class="span3">
                                        <option value='{"sortBy":"price", "sortAscending":"true"}'>По цене (от меньшей к большей) &uarr;</option>
                                        <option value='{"sortBy":"price", "sortAscending":"false"}'>По цене (от большей к меньшей) &darr;</option>
                                        <option value='{"sortBy":"name", "sortAscending":"true"}'>По названию (от А до Я или от A до Z) &uarr;</option>
                                        <option value='{"sortBy":"name", "sortAscending":"false"}'>По названию (от Я до А или от Z до A) &darr;</option>
                                        <option value='{"sortBy":"popularity", "sortAscending":"true"}'>По популярности (от меньшей к большей) &uarr;</option>
                                        <option value='{"sortBy":"popularity", "sortAscending":"false"}'>По популярности (от большей к меньшей) &darr;</option>
                                    </select>
                                {/literal}
                            </div>
                            {*<div class="view-switch">*}
                            {*<a href="shop.html" class="btn"><i class="icon-th"></i></a>*}
                            {*<a href="shop-list-view.html" class="btn btn-primary"><i class="icon-list"></i></a>*}
                            {*</div>*}
                        </div>
                        {/if}
                    </div>
                </div> <!-- /title -->


                {if $products}
                <!-- Products -->
                <div class="row">
                    <div id="isotopeContainer" class="isotope-container">

                        {foreach from=$products item=prod}

                            <div class="span9 isotope--target filter--sec{$prod.section_id}" data-price="{$prod.price}" data-popularity="{$prod.id}">
                                <div class="product">
                                    <div class="row">
                                        <div class="span3">
                                            <div class="product-img">
                                                <div class="picture">
                                                    <img width="270" height="189" alt="" src="/images/products/{$prod.image}_middle.jpg" />
                                                    <div class="img-overlay">
                                                        <input type="hidden" name="prodCount{$prod.id}" id="prodCount{$prod.id}" value="1" />
                                                        <a class="btn more btn-primary" href="/product/{$prod.link}">Обзор</a>
                                                        <a class="btn buy btn-danger" href="javascript:void(0);" onclick="addToCart('{$prod.id}')">Добавить в корзину</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span6">
                                            <div class="main-titles no-margin">
                                                <h5 class="isotope--title"><a href="/product/{$prod.link}" id="prodTitle{$prod.id}">{$prod.title|stripslashes|strip_tags}</a></h5>
                                                <div class="meta-data">
                                                    <span class="price">${$prod.price}</span>
                                                    {*<a href="#" class="btn btn-small"><i class="icon-heart"></i></a>*}
                                                    {*<a href="#" class="btn btn-small"><i class="icon-exchange"></i></a>*}
                                                    {*&nbsp;*}
                                                    {*<span class="icon-star stars-clr"></span>*}
                                                    {*<span class="icon-star"></span>*}
                                                    {*<span class="icon-star"></span>*}
                                                    {*<span class="icon-star"></span>*}
                                                    {*<span class="icon-star"></span>*}
                                                </div>
                                            </div>
                                            <p class="desc">
                                                {$prod.description}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {/foreach}
                    </div>
                </div>
                {else}
                    <div class="row">
                        <div class="span12" style="min-height: 450px;">
                            По вашему запросу ничего не найдено...
                        </div>
                    </div>
                {/if}
                <hr />
            </section>
            <!-- /Main content -->
        </div>
    </div>
</div>
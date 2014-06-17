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
                        <a href="/products/page/1">Каталог</a>
                    </li>
                    {if $currSection}
                        <li><span class="icon-chevron-right"></span></li>
                        <li>
                            <a href="/products/section/{$currSection.link}/page/1">{$currSection.title|strip_tags|stripslashes}</a>
                        </li>
                        {if $currCategory}
                            <li><span class="icon-chevron-right"></span></li>
                            <li>
                                <a href="/products/category/{$currCategory.link}/page/1">{$currCategory.title|strip_tags|stripslashes}</a>
                            </li>
                        {/if}
                    {/if}
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="push-up blocks-spacer">
        <div class="row">

            <!-- Sidebar -->
            <aside class="span3 left-sidebar" id="tourStep1">
                <div class="sidebar-item sidebar-filters" id="sidebarFilters">

                    <!-- Sidebar Title -->
                    <div class="underlined">
                        <h3><span class="light">Разделы</span> продуктов</h3>
                    </div>

                    <!-- Categories -->
                    {foreach from=$sections item=sec}
                    <div class="accordion-heading">
                        <a class="accordion-toggle" href="/products/section/{$sec.link}/page/1" {if $sec.id!==$currSection.id}style="font-weight: normal;"{/if}>{$sec.title|strip_tags|stripslashes}</a>
                    </div>
                    <div id="filter{$sec.id}" class="accordion-body">
                        <div class="accordion-inner">
                            {foreach from=$sec.categories item=cat}
                                <a href="javascript:void(0);" class="selectable {if $cat.id==$currCategory.id}selected{/if}" onclick="document.location.href='/products/category/{$cat.link}/page/1'"><i class="box"></i> {$cat.title|strip_tags|stripslashes}</a>
                            {/foreach}
                        </div>
                    </div>
                    {/foreach}

                </div>
            </aside>

            <!-- Main content -->
            <section class="span9">

                <div class="underlined push-down-15">
                    <div class="row">
                        <div class="span9">
                            <h3>
                                Продукты
                                {if $currSection}
                                    &nbsp;<span class="light">::</span>&nbsp;
                                    <a href="/products/section/{$currSection.link}/page/1"><span class="light">{$currSection.title|strip_tags|stripslashes}</span></a>
                                    {if $currCategory}
                                        &nbsp;<span class="light">::</span>&nbsp;
                                        <a href="/products/category/{$currCategory.link}/page/1"><span class="light">{$currCategory.title|strip_tags|stripslashes}</span></a>
                                    {/if}
                                {/if}
                            </h3>
                        </div>
                    </div>
                </div>


                <!-- Articles -->
                <div class="row">
                    {foreach from=$products item=prod}

                        <div class="span9">

                            <div class="product3 shadow">
                                <div class="row">
                                    <div class="span3">
                                        <div class="product-img">
                                            <div class="picture">
                                                <img width="270" height="189" alt="" src="/images/products/{$prod.image}_middle.jpg" />
                                            </div>
                                        </div>
                                    </div>
                                    <div>
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
                                        <div class="desc">
                                            {$prod.description_short}
                                        </div>
                                        <div class="prodButtons">
                                            <input type="hidden" name="prodCount{$prod.id}" id="prodCount{$prod.id}" value="1" />
                                            <a class="btn more btn-primary" href="/product/{$prod.link}">Обзор</a>
                                            <a class="btn buy btn-danger" href="javascript:void(0);" onclick="addToCart('{$prod.id}')">Добавить в корзину</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    {/foreach}

                    {foreach key=aKey from=$articles item=item}
                            <div class="span9">
                                <div class="product-title">
                                    <h5 class="isotope--title"><a href="/article/{$item.link}" style="text-transform: uppercase;">{$item.title|stripslashes|strip_tags}</a></h5>
                                </div>
                                <div class="product-description">
                                    <a href="/product/{$item.link}" style="color: #707070;">{$item.description_short|stripslashes}</a>

                                    <div style="text-align: right; margin-bottom: 25px; margin-top: 20px;">
                                        <a href="/product/{$item.link}" class="btn btn-warning pull-right"><i class="icon-eye-open"></i> &nbsp; Подробнее</a>
                                    </div>

                                    <div style="clear: both;"></div>
                                    {if $page_count>1}
                                        <hr />
                                    {elseif ($articlesCount!=$aKey+1)}
                                        <hr />
                                    {else}
                                        <br /><br />
                                    {/if}
                                </div>
                            </div>
                    {/foreach}

                    {include file="products/paging.tpl"}

                </div>
            </section>
        </div>
    </div>
</div>
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
                        <a href="/articles/page/1">Статьи</a>
                    </li>
                    {if $currSection}
                        <li><span class="icon-chevron-right"></span></li>
                        <li>
                            <a href="/articles/section/{$currSection.link}/page/1">{$currSection.title|strip_tags|stripslashes}</a>
                        </li>
                        {if $currCategory}
                            <li><span class="icon-chevron-right"></span></li>
                            <li>
                                <a href="/articles/category/{$currCategory.link}/page/1">{$currCategory.title|strip_tags|stripslashes}</a>
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
                        <h3><span class="light">Разделы</span> статей</h3>
                    </div>

                    <!-- Categories -->
                    {foreach from=$sections item=sec}
                        <div class="accordion-heading">
                            <a class="accordion-toggle" href="/articles/section/{$sec.link}/page/1" {if $sec.id!==$currSection.id}style="font-weight: normal;"{/if}>{$sec.title|strip_tags|stripslashes}</a>
                        </div>
                        <div id="filter{$sec.id}" class="accordion-body">
                            <div class="accordion-inner">
                                {foreach from=$sec.categories item=cat}
                                    <a href="javascript:void(0);" class="selectable {if $cat.id==$currCategory.id}selected{/if}" onclick="document.location.href='/articles/category/{$cat.link}/page/1'"><i class="box"></i> {$cat.title|strip_tags|stripslashes}</a>
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
                                Статьи
                                {if $currSection}
                                    &nbsp;<span class="light">::</span>&nbsp;
                                    <a href="/articles/section/{$currSection.link}/page/1"><span class="light">{$currSection.title|strip_tags|stripslashes}</span></a>
                                    {if $currCategory}
                                        &nbsp;<span class="light">::</span>&nbsp;
                                        <a href="/articles/category/{$currCategory.link}/page/1"><span class="light">{$currCategory.title|strip_tags|stripslashes}</span></a>
                                    {/if}
                                {/if}
                            </h3>
                        </div>
                    </div>
                </div>



                <!-- Articles -->
                <div class="row">
                    <div class="span9">
                        <div class="product-title">
                            <h1 class="name"><span class="light" id="prodTitle7">{$item.title|stripslashes|strip_tags}</span></h1>
                        </div>
                        <div class="product-description" style="color:#777777;">
                            {$item.description|stripslashes}
                            <hr>

                            <!--  Add to cart -->
                            <div class="form form-inline clearfix">
                                <div style="float: left;">
                                    <h4>
                                        <span class="light" id="prodTitle8">Поделитьси в соцсетях:</span>
                                    </h4>
                                </div>
                                <div style="float: left; padding-top: 7px; padding-left: 10px;">
                                    {include file="social.tpl"}
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
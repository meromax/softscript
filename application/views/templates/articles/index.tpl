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

                    {foreach key=aKey from=$articles item=item}
                            <div class="span9">
                                <div class="product-title">
                                    <h5 class="isotope--title"><a href="/article/{$item.link}" style="text-transform: uppercase;">{$item.title|stripslashes|strip_tags}</a></h5>
                                </div>
                                <div class="product-description">
                                    <a href="/article/{$item.link}" style="color: #707070;">{$item.description_short|stripslashes}</a>

                                    <div style="text-align: right; margin-bottom: 25px; margin-top: 20px;">
                                        <a href="/article/{$item.link}" class="btn btn-warning pull-right"><i class="icon-eye-open"></i> &nbsp; Подробнее</a>
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

                    {include file="articles/paging.tpl"}

                </div>
            </section>
        </div>
    </div>
</div>
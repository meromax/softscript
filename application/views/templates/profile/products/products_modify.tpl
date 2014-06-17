<link rel="stylesheet" href="/css/bootstrap-plugins/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
<script src="/css/bootstrap-plugins/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>

<script type="text/javascript" src="/css/bootstrap-plugins/plugins/ckeditor/ckeditor.js"></script>

<script src="/js/profile_products.js" type="text/javascript" ></script>



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
                        <a href="/profile.html">Личный кабинет</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="push-up blocks-spacer">
        <div class="row">

            <aside class="span3">
                <div class="sidebar-item">

                    <div>
                        <h3><span class="light">Личный</span> Кабинет</h3>
                    </div>

                    <div class="row">
                        <div class="span3">
                            <div class="widget">
                                {include file="profile/menu.tpl"}
                            </div>
                        </div>
                    </div>

                </div>
            </aside>

            <section class="span9" style="min-height: 600px;">

                <div class="underlined push-down-20">
                    <h3><span class="light">Мои</span> товары :: <span class="light">Редактирование</span> товара</h3>
                </div>

                <form method="POST" action="/profile/products/modify" name="product_add_form" id="product_add_form" enctype="multipart/form-data">

                    <input type="hidden" name="step" value="2">
                    {if $item.id}
                        <input type="hidden" name="id" value="{$item.id}">
                    {/if}

                    <!-- Tabs -->
                    <ul id="myTab2" class="nav nav-tabs nav-tabs-style-2">
                        <li class="active" id="tab1">
                            <a href="#tab1-1" data-toggle="tab">Основное</a>
                        </li>
                        <li id="tab2">
                            <a href="#tab1-2" data-toggle="tab">Картинки</a>
                        </li>
                        <li id="tab3">
                            <a href="#tab1-3" data-toggle="tab">Файлы</a>
                        </li>
                        <li id="tab4">
                            <a href="#tab1-4" data-toggle="tab">СЕО информация</a>
                        </li>
                        <li id="tab5">
                            <a href="#tab1-5" data-toggle="tab">Дополнительно</a>
                        </li>
                        <li id="tab6">
                            <a href="#tab1-6" data-toggle="tab">Рекомендуемые товары</a>
                        </li>

                    </ul>
                    <div class="tab-content">

                        <!--############# TAB1 #############-->
                        <div class="fade in tab-pane active" id="tab1-1">
                            {include file="profile/products/products_general.tpl"}
                        </div>

                        <!--############# TAB1 #############-->
                        <div class="fade tab-pane" id="tab1-2">
                            {include file="profile/products/products_images.tpl"}
                        </div>

                        <!--############# TAB1 #############-->
                        <div class="fade tab-pane" id="tab1-3">
                            {include file="profile/products/products_files.tpl"}
                        </div>

                        <!--############# TAB1 #############-->
                        <div class="fade tab-pane" id="tab1-4">
                            {include file='profile/products/products_meta.tpl'}
                        </div>

                        <!--############# TAB1 #############-->
                        <div class="fade tab-pane" id="tab1-5">
                            {include file='profile/products/products_additional.tpl'}
                        </div>

                        <!--############# TAB1 #############-->
                        <div class="fade tab-pane" id="tab1-6">
                            {include file="profile/products/products_recommended_box.tpl"}
                        </div>
                    </div>
                    <div id="profileWarning" class="alert alert-danger in fade hidden" style="margin-top: 10px;">
                        &nbsp;
                    </div>
                    <div style="text-align: right; padding-top: 10px;">
                        <button type="button" class="btn btn-primary push-down-10" onclick="document.location='/profile/products.html'">К списку товаров</button>
                        <button type="button" class="btn btn-primary push-down-10" onclick="checkForm(1);">Сохранить</button>
                    </div>

                </form>

            </section>
        </div>
    </div>
</div>

{literal}
<script type="text/javascript">

    $(document).ready(function() {
        {/literal}
        getCategories('{$item.category_id}');
        {literal}
    });

</script>
{/literal}
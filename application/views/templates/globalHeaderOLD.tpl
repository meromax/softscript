<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{$meta_title}</title>
    <meta name="title" content="{$meta_title}" />
    <meta name="description" content="{$meta_description}" />
    <meta name="keywords" content="{$meta_keywords}" />

    <link rel="stylesheet" type="text/css" href="/css/front.css" media="all" />

    <link rel="shortcut icon" href="/images/favicon.ico?time={$smarty.now}" />

    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/validation.js" type="text/javascript"></script>


    <!--slider init-->
    <link rel="stylesheet" href="/js/topSlider/css/global.css">

    <script src="/js/topSlider/js/slides.min.jquery.js"></script>
    <script src="/js/topSlider/js/init.js"></script>

</head>
<body>
<div class="message">
    <div class="close"><a href="javascript:void(0)" onclick="closeMessageBox();" title="закрыть">x</a></div>
    <div class="description" id="prodTitle">
        Продукт добавлен в корзину...
    </div>
</div>
<div class="wrapper">
    <div class="content">
        <div class="header">
            <div class="log_search">
                <a href="/">
                    <img src="/images/logo.png" alt=""/>
                </a>
                <form method="post" action="/search" name="search_form" id="search_form">
                    <input class="search" placeholder="Поиск по сайту" type="search" value="{$search_words|stripslashes|strip_tags}" name="search_input" id="search_input" />
                    <input class="sub" value="Найти" type="button" id="searchBtn" />
                </form>

            </div>

            <div class="order_info">
                {$top_phone.text|stripslashes}
                <a class="order_call" href=""></a>
            </div>

            <div class="signin_reg">
            {if !$UserLogedIn}
                <a class="signin" href="/loginpage.html">Вход</a>
                <a class="reg" href="/joinnow.html">Регистрация</a>
            {else}
                <a class="reg" href="/profile.html">Личный кабинет</a>
                <a class="signin" href="/logout.html">Выйти</a>
            {/if}
            </div>

            <div class="basket">
                <a href="/shopping-cart.html">
                    <img src="/images/basket.png">
                    <p>В вашей корзине</p>
                    <p class="prod">Товаров: <span id="prodCount">{$total_count}</span></p>
                </a>
            </div>

        </div>

        <div class="menu">
            {include file='topNavigation.tpl'}
        </div>






<?php /* Smarty version 2.6.18, created on 2014-02-25 11:45:05
         compiled from admin/default/index.tpl */ ?>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Панель управления <small style="font-weight: bold; color: red;">в разработке</small>
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <i class="icon-dashboard"></i>
                    <a href="/admin">Панель управления</a>
                </li>
            </ul>
        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">

            <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="icon-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div class="number">549</div>
                        <div class="desc">Сегодня новых заказов</div>
                    </div>
                    <a class="more" href="javascript:void(0);">
                        Смотерть подробнее <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

            <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <i class="icon-user"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            1349
                        </div>
                        <div class="desc">
                            Сегодня новых пользователей
                        </div>
                    </div>
                    <a class="more" href="javascript:void(0);">
                        Смотерть подробнее <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

            <div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3">
                <div class="dashboard-stat purple">
                    <div class="visual">
                        <i class="icon-globe"></i>
                    </div>
                    <div class="details">
                        <div class="number">20</div>
                        <div class="desc">Сегодня просмотров сайта</div>
                    </div>
                    <a class="more" href="javascript:void(0);">
                        Смотерть подробнее <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                <div class="dashboard-stat yellow">
                    <div class="visual">
                        <i class="icon-comment"></i>
                    </div>
                    <div class="details">
                        <div class="number">125</div>
                        <div class="desc">Сегодня новых отзывов</div>
                    </div>
                    <a class="more" href="javascript:void(0);">
                        Смотерть подробнее <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        </div>


        <div class="row-fluid">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-bar-chart"></i>Просмотров на сайте</div>
                </div>
                <div class="portlet-body">
                    <div id="site_statistics_loading">
                        <img src="/css/assets/img/loading.gif" alt="loading" />
                    </div>
                    <div id="site_statistics_content" class="hide">
                        <div id="site_statistics" class="chart"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>






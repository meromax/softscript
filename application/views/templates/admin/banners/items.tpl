<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Баннеры
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/admin/banners/index/page/1">Баннеры</a></li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список баннеров</div>
                        <div class="actions">
                            <a href="/admin/banners/addbanner" class="btn red"><i class="icon-plus"></i> Добавить</a>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;">#</th>
                                <th class="span1">Картинка</th>
                                <th>Заголовок</th>
                                <th class="hidden-480" style="text-align: center; max-width: 100px;">Ссылка</th>
                                <th class="hidden-480" style="text-align: center;">Позиция</th>
                                <th style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach key=bkey from=$banners item=item}
                            <tr>
                                <td class="span1" style="text-align: center;">{$bkey+1}</td>
                                <td style="vertical-align: middle;">
                                    {if $item.image!=""}
                                        {if $item.type==0}
                                            <a href="/images/banners/{$item.image}_big.jpg" rel="prettyPhoto[mixed]"><img align="center" src="/images/banners/{$item.image}_small.jpg?time={$smarty.now}"></a></td>
                                    {else}
                                            <a href="/images/banners/{$item.image}_big.jpg" rel="prettyPhoto[mixed]"><img align="center" src="/images/banners/{$item.image}_small.jpg?time={$smarty.now}"></a></td>
                                        {/if}
                                    {/if}
                                </td>
                                <td style="vertical-align: middle;">{$item.title|strip_tags|stripslashes}</td>
                                <td class="hidden-480" style="text-align: center; max-width: 100px; vertical-align: middle;">
                                    {if $item.link!=""}
                                        <a href="{$item.link}" target="_blank" style="padding:5px 5px 5px 5px; width:50px;">Посмотреть</a>
                                    {/if}
                                </td>
                                <td class="hidden-480" style="text-align: center; vertical-align: middle;">
                                    {$item.position}
                                </td>
                                <td class="span3" style="text-align: center; vertical-align: middle;">
                                    <a href="/admin/banners/modifybanner/id/{$item.id}">{$adminLangParams.ACTION_EDIT}</a>|
                                    <a href="/admin/banners/delete/id/{$item.id}"  onclick="return confirm({$adminLangParams.NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN})">{$adminLangParams.ACTION_DELETE}</a>
                                </td>
                            </tr>
                                {foreachelse}
                            <tr>
                                <td colspan="6" style="text-align: center;">Нет ни одного баннера...</td>
                            </tr>
                            {/foreach}
                            </tbody>
                        </table>
                        {include file='admin/banners/paging.tpl'}


                    </div>


                </div>


            </div>



        </div>

    </div>

</div>

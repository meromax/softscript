<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Новости
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/admin/news/page/1">Новости</a></li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список новостей</div>
                        <div class="actions">
                            <a href="/admin/news/add" class="btn blue"><i class="icon-plus"></i> Добавить</a>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;">#</th>
                                <th>Заголовок</th>
                                <th class="hidden-480" style="text-align: center;">Дата</th>
                                <th style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach from=$news item=item}
                            <tr>
                                <td class="span1" style="text-align: center; vertical-align: middle;">{$item.new_id}</td>
                                <td style="vertical-align: middle;">
                                    {$item.new_title|stripslashes}
                                </td>
                                <td class="hidden-480" style="text-align: center; max-width: 150px; vertical-align: middle;">
                                    {$item.new_date|stripslashes}
                                </td>
                                <td class="span3" style="text-align: center; vertical-align: middle;">
                                    <a href="/admin/news/modify/new_id/{$item.new_id}">{$adminLangParams.ACTION_EDIT}</a> |
                                    <a href="/admin/news/delete/new_id/{$item.new_id}" onclick="return confirm({$adminLangParams.NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN})">{$adminLangParams.ACTION_DELETE}</a>
                                </td>
                            </tr>
                                {foreachelse}
                            <tr>
                                <td colspan="6" style="text-align: center;">Нет ни одной новости...</td>
                            </tr>
                            {/foreach}
                            </tbody>
                        </table>
                        {include file='admin/news/paging.tpl'}

                    </div>


                </div>


            </div>

        </div>

    </div>

</div>
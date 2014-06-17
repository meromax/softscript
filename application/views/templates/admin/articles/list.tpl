<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Статьи
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/admin/articles/page/1">Статьи</a></li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список статей</div>
                        <div class="actions">
                            <a href="/admin/articles/add" class="btn blue"><i class="icon-plus"></i> Добавить</a>
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
                            {foreach from=$articles item=item}
                                <tr>
                                    <td class="span1" style="text-align: center; vertical-align: middle;">{$item.id}</td>
                                    <td style="vertical-align: middle;">
                                        {$item.title|stripslashes}
                                    </td>
                                    <td class="hidden-480" style="text-align: center; max-width: 150px; vertical-align: middle;">
                                        {$item.post_date|stripslashes}
                                    </td>
                                    <td class="span3" style="text-align: center; vertical-align: middle;">
                                        <a href="/admin/articles/modify/article_id/{$item.id}">{$adminLangParams.ACTION_EDIT}</a> |
                                        <a href="/admin/articles/delete/article_id/{$item.id}" onclick="return confirm({$adminLangParams.NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN})">{$adminLangParams.ACTION_DELETE}</a>
                                    </td>
                                </tr>
                                {foreachelse}
                                <tr>
                                    <td colspan="6" style="text-align: center;">Нет ни одной статьи...</td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                        {include file='admin/articles/paging.tpl'}

                    </div>


                </div>


            </div>

        </div>

    </div>

</div>
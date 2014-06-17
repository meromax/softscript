<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Разделы
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="javascript:void(0);">Акции</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/admin/deals/sections/page/1">Разделы</a></li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список разделов</div>
                        <div class="actions">
                            <a href="/admin/deals/addsection" class="btn blue"><i class="icon-plus"></i> Добавить</a>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;">#</th>
                                <th>Заголовок</th>
                                <th class="hidden-480" style="text-align: center;">Позиция</th>
                                <th style="text-align: center;">Категории</th>
                                <th style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach from=$sections item=item}
                                <tr>
                                    <td class="span1" style="text-align: center; vertical-align: middle;">{$item.id}</td>
                                    <td style="vertical-align: middle;">
                                        {$item.title|stripslashes}
                                    </td>
                                    <td class="hidden-480" style="text-align: center; max-width: 150px; vertical-align: middle;">
                                        {$item.position|stripslashes}
                                    </td>
                                    <td class="span3" style="text-align: center; vertical-align: middle;">
                                        <a href="/admin/deals/categories/section_id/{$item.id}/spage/{$page}/page/0">Изменить</a>
                                    </td>
                                    <td class="span3" style="text-align: center; vertical-align: middle;">
                                        <a href="/admin/deals/modifysection/id/{$item.id}">Изменить</a>
                                        &nbsp;|&nbsp;
                                        <a href="/admin/deals/deletesection/id/{$item.id}" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')">Удалить</a>
                                    </td>
                                </tr>
                                {foreachelse}
                                <tr>
                                    <td colspan="6" style="text-align: center;">Нет ни одного раздела...</td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                        {include file='admin/deals/sections/paging.tpl'}

                    </div>


                </div>


            </div>

        </div>

    </div>

</div>
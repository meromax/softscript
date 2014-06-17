<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Категории
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
                <li>
                    <a href="/admin/deals/sections/page/1">Разделы</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/deals/categories/section_id/{$section_id}/spage/1/page/1">Категории</a>
                </li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">


            <div class="span3">
                <div class="portlet box grey">


                    <div class="portlet-title">
                        <div class="caption"><i class="icon-info"></i>Текущий раздел</div>
                    </div>
                    <div class="portlet-body">
                        <div class="scroller" data-height="300px">
                            <h4>{$section.title|stripslashes}</h4>
                            {$section.description|stripslashes|strip_tags}
                        </div>
                    </div>


                </div>
            </div>



            <div class="span9">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список категорий</div>
                        <div class="actions">
                            <a href="/admin/deals/addcategory/section_id/{$section_id}/spage/{$spage}" class="btn blue"><i class="icon-plus"></i> Добавить</a>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;">#</th>
                                <th>Заголовок</th>
                                <th class="hidden-480" style="text-align: center;">Позиция</th>
                                <th style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach from=$categories item=item}
                                <tr>
                                    <td class="span1" style="text-align: center; vertical-align: middle;">{$item.id}</td>
                                    <td style="vertical-align: middle;">
                                        {$item.title|stripslashes}
                                    </td>
                                    <td class="hidden-480" style="text-align: center; max-width: 150px; vertical-align: middle;">
                                        {$item.position|stripslashes}
                                    </td>
                                    <td class="span3" style="text-align: center; vertical-align: middle;">
                                        <a href="/admin/deals/modifycategory/id/{$item.id}/section_id/{$section_id}/spage/{$spage}">{$adminLangParams.ACTION_EDIT}</a>
                                        &nbsp;|&nbsp;
                                        <a href="/admin/deals/deletecategory/id/{$item.id}/section_id/{$section_id}/spage/{$spage}" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')">{$adminLangParams.ACTION_DELETE}</a>
                                    </td>
                                </tr>
                                {foreachelse}
                                <tr>
                                    <td colspan="6" style="text-align: center;">Нет ни одной категории...</td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                        {include file='admin/deals/categories/paging.tpl'}

                    </div>


                </div>
            </div>

        </div>

    </div>

</div>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Статические страницы
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/admin/content">Статические страницы</a></li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список страниц</div>
                        <div class="actions">
                            <a href="/admin/content/addpage" class="btn blue"><i class="icon-plus"></i> Добавить</a>
                            {*<div class="btn-group">*}
                                {*<a class="btn yellow" href="#" data-toggle="dropdown">*}
                                    {*<i class="icon-cogs"></i> Tools*}
                                    {*<i class="icon-angle-down"></i>*}
                                {*</a>*}
                                {*<ul class="dropdown-menu pull-right">*}
                                    {*<li><a href="#"><i class="icon-pencil"></i> Edit</a></li>*}
                                    {*<li><a href="#"><i class="icon-trash"></i> Delete</a></li>*}
                                    {*<li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>*}
                                    {*<li class="divider"></li>*}
                                    {*<li><a href="#"><i class="i"></i> Make admin</a></li>*}
                                {*</ul>*}
                            {*</div>*}
                        </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;">#</th>
                                <th>Заголовок</th>
                                <th class="hidden-480">Ссылка</th>
                                <th style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach key=pkey from=$pages item=page}
                                <tr>
                                    <td class="span1" style="text-align: center;">{$pkey+1}</td>
                                    <td>{$page.title|stripslashes|strip_tags}</td>
                                    <td class="hidden-480">
                                        {$page.link}
                                    </td>
                                    <td class="span3" style="text-align: center;">
                                        <a href="/admin/content/modifypage/id/{$page.page_id}">{$adminLangParams.ACTION_EDIT}</a>
                                        {if $page.type==0}
                                            &nbsp;|&nbsp;
                                            <a href="javascript:void(0);"  onclick="customConfirmBox('Вы уверены, что хотите удалить эту запись?','/admin/content/delete/id/{$page.page_id}');">Удалить</a>
                                        {/if}
                                    </td>
                                </tr>
                                {foreachelse}
                                <tr>
                                    <td colspan="4" style="text-align: center;">Нет ни одной страницы...</td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>

    </div>

</div>
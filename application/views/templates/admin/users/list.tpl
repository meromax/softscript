<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Пользователи
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <i class="icon-user"></i>
                    <a href="/admin/users/index/page/1">Пользователи</a>
                </li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список пользователей</div>
                        <div class="actions">
                            {*<a href="/admin/users/add" class="btn blue"><i class="icon-plus"></i> Добавить</a>*}
                        </div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;">#</th>
                                <th>Имя</th>
                                <th class="hidden-480" style="text-align: center;">Контакты</th>
                                <th class="hidden-480" style="text-align: center;">Дата</th>
                                <th style="text-align: center;">Статус</th>
                                <th style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach from=$users item=item}
                                <tr>
                                    <td class="span1" style="text-align: center; vertical-align: middle;">{$item.id}</td>
                                    <td style="vertical-align: middle;">
                                        {$item.first_name|stripslashes} {$item.last_name|stripslashes}
                                    </td>
                                    <td class="hidden-480" style="text-align: center; max-width: 150px; vertical-align: middle;">
                                        <table class="table table-bordered" style="margin-bottom: 0px;">
                                            <tbody>
                                            <tr>
                                                <td style="background: #f9f9f9;" class="span2">Email:</td>
                                                <td style="background: #fff;">{$item.email}</td>
                                            </tr>
                                            {if $item.phone!=''}
                                            <tr style="background: #fff;">
                                                <td style="background: #f9f9f9;" class="span2">Телефон:</td>
                                                <td style="background: #fff;">{$item.phone}</td>
                                            </tr>
                                            {/if}
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="hidden-480" style="text-align: center; max-width: 150px; vertical-align: middle;">
                                        {$item.creation_date|stripslashes}
                                    </td>
                                    <td style="text-align: center; max-width: 150px; vertical-align: middle;">
                                        {if $item.active==1}
                                            <a href="javascript:void(0);" onclick="changeUserStatus('{$item.id}');" id="status_link{$item.id}"><span style="font-weight:bold; color:#006600;">Активный</span></a>
                                        {else}
                                            <a href="javascript:void(0);" onclick="changeUserStatus('{$item.id}');" id="status_link{$item.id}"><span style="font-weight:bold; color:#660000;">Заблокирован</span></a>
                                        {/if}
                                    </td>
                                    <td class="span3" style="text-align: center; vertical-align: middle;">
                                        <a href="/admin/users/view/id/{$item.id}">Просмотр</a> |
                                        <a href="javascript:void(0);"  onclick="return customConfirmBox('Вы уверены что хотите удалить этого пользователя?','/admin/users/delete/id/{$item.id}')">Удалить</a>
                                    </td>
                                </tr>
                                {foreachelse}
                                <tr>
                                    <td colspan="6" style="text-align: center;">Нет ни одного пользователя...</td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                        {include file='admin/users/paging.tpl'}

                    </div>


                </div>


            </div>

        </div>

    </div>

</div>
{literal}
<script type="text/javascript">
function changeUserStatus(user_id){
	$.post("/admin/users/change-user-status", {id:user_id},
		function(data) {
   			if(data==1){
				$("#status_link"+user_id).html("<span style='font-weight:bold; color:#006600;'>Активный</span>");
   			} else {
   				$("#status_link"+user_id).html("<span style='font-weight:bold; color:#660000;'>Заблокирован</span>");
   			}
		}
	);	
}
</script>
{/literal}
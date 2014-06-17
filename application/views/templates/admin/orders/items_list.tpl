<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Заказы
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/admin/orders/index/page/1">Заказы</a></li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption" id="pulsate-regular"><i class="icon-list"></i>Фильтр</div>
                    </div>
                    <div class="portlet-body" id="gallery">

                        <form action="#" class="form-horizontal" style="margin: 10px 0px 10px 0px;">
                            <div class="control-group" style="padding-top: 0px; margin-bottom: 0px;">
                                <div class="span3">
                                    &nbsp;
                                </div>
                                <div class="span3">
                                    <label class="control-label">Статус:</label>
                                    <div class="controls">
                                        <select name="filter_status" id="filter_status" class="m-wrap chosen">
                                            <option value="" {if $fstatus==""} selected {/if}> ------ </option>
                                            {*<option value="0" {if $fstatus=="0"} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS0}</option>*}
                                            <option value="1" {if $fstatus=="1"} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS1}</option>
                                            <option value="2" {if $fstatus=="2"} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS2}</option>
                                            {*<option value="3" {if $fstatus=="3"} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS3}</option>*}
                                            <option value="4" {if $fstatus=="4"} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS4}</option>
                                            {*<option value="5" {if $fstatus=="5"} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS5}</option>*}
                                            {*<option value="6" {if $fstatus=="6"} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS6}</option>*}
                                            {*<option value="7" {if $fstatus=="7"} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS7}</option>*}
                                        </select>
                                    </div>
                                </div>
                                <div class="span3">
                                        <a href="javascript:void(0);" class="btn green" onclick="filterOn();" style="padding: 6px 14px;" /><i class="icon-ok"></i> Включить</a>
                                        <a href="javascript:void(0);" class="btn yellow" onclick="filterOff();" style="padding: 6px 14px;" /><i class="icon-refresh"></i> Сбросить</a>
                                </div>
                                <div class="span3">
                                    &nbsp;
                                </div>
                            </div>
                        </form>


                    </div>


                </div>


            </div>

        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список товаров</div>
                        <div class="actions">
                            <a href="/admin/products/add" class="btn blue"><i class="icon-plus"></i> Добавить</a>
                        </div>
                    </div>
                    <div class="portlet-body" id="gallery">

                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;"><input type="checkbox" name="ch_0" id="ch_0" /></th>
                                <th class="span1" style="text-align: center;">#</th>
                                <th class="hidden-480">Клиент</th>
                                <th>Количество</th>
                                <th class="hidden-480" style="text-align: center;">Цена</th>
                                <th class="span2" style="text-align: center;">Статус</th>
                                <th class="hidden-480" style="text-align: center;">Дата</th>
                                <th style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach from=$orders item=item}
                                <tr>
                                    <td class="span1" style="text-align: center; vertical-align: middle;">
                                        <div class="controls">
                                            <input type="checkbox" class="checkbox_e" name="ch_{$item.id}" id="ch_{$item.id}" onclick="checked_count();" />
                                        </div>
                                    </td>

                                    <td class="span1" style="text-align: center; vertical-align: middle;">{$item.id}</td>
                                    <td style="vertical-align: middle;" class="hidden-480">
                                        {if $item.client_name!=''}
                                            <a href="/admin/users/view/id/{$item.user_id}" target="_blank"><span class="green">{$item.client_name}</span></a>
                                        {else}
                                            <span style="color: red;">Не зарегестрирован</span>
                                        {/if}

                                    </td>
                                    <td class="span1" style="text-align: center; vertical-align: middle;">
                                        {$item.cd_count}
                                    </td>
                                    <td class="hidden-480 span2" style="text-align: center; vertical-align: middle;">
                                        {$item.sprice+$item.dostavka}
                                    </td>
                                    <td class="span2" style="vertical-align: middle;">

                                        <select name="status{$item.id}" id="status{$item.id}" class="m-wrap chosen" onchange="acceptOrder('{$item.id}');">
                                            {*<option value="0" {if $item.status==0} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS0}</option>*}
                                            <option value="1" {if $item.status==1} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS1}</option>
                                            <option value="2" {if $item.status==2} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS2}</option>
                                            {*<option value="3" {if $item.status==3} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS3}</option>*}
                                            <option value="4" {if $item.status==4} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS4}</option>
                                            {*<option value="5" {if $item.status==5} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS5}</option>*}
                                            {*<option value="6" {if $item.status==6} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS6}</option>*}
                                            {*<option value="7" {if $item.status==7} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS7}</option>*}
                                        </select>
                                        <div style="position:absolute; background:#ffffff; display:none; margin-left:60px; margin-top:-10px; height: 3px;" id="progress{$item.id}">
                                            <img src="/images/loading.gif" border="0" height="2" width="100"  />
                                        </div>
                                    </td>
                                    <td class="hidden-480" style="text-align: center; vertical-align: middle;">
                                        {$item.post_date|date_format:"%d.%m.%Y"}<br />{$item.post_date|date_format:"%H:%M"}
                                    </td>
                                    <td class="span3" style="text-align: center; vertical-align: middle;">
                                        <a href="/admin/orders/view/id/{$item.id}/page/{$page}" title="Посмотреть">Посмотреть</a>
                                        &nbsp;|&nbsp;
                                        <a href="/admin/orders/delete/id/{$item.id}" onclick="return confirm('Вы уверены, что хотите удалить этот заказ?')" title="Удалить">Удалить</a>
                                    </td>
                                </tr>
                                {foreachelse}
                                <tr>
                                    <td colspan="6" style="text-align: center;">Нет ни одного товара...</td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                        {include file='admin/orders/paging.tpl'}

                    </div>


                </div>

           </div>

        </div>

        <div class="row-fluid" style="margin-bottom: 60px;">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption">---</div>
                    </div>
                    <div class="portlet-body" id="gallery">

                        <form action="#" class="form-horizontal" style="margin: 10px 0px 10px 0px;">
                            <table>
                                <tbody>
                                <tr>
                                    <td>Отмеченных элементов:</td>
                                    <td id="el_count" width="25" align="center" style="font-size:16px;"><b>0</b></td>
                                    <td>
                                        <form action="/admin/orders/delete-items" method="post" id="delete_form">
                                            <input type="hidden" name="ids" id="ids" value="" />
                                            <input type="hidden" name="currPage" id="currPage" value="{$page}" />
                                            <button type="button" class="btn red" id="button_delete" disabled="disabled" onclick="deleteItems();"><i class="icon-remove white"></i> Удалить отмеченные</button>
                                        </form>
                                    </td>
                                    <td style="padding: 0px 10px 0px 10px;">Изменить статус отмеченных элементов:</td>
                                    <td>
                                        <select name="status" id="status"  disabled="disabled" class="m-wrap">
                                            {*<option value="0">{$adminLangParams.ORDERS__STATUSES_STATUS0}</option>*}
                                            <option value="1">{$adminLangParams.ORDERS__STATUSES_STATUS1}</option>
                                            <option value="2">{$adminLangParams.ORDERS__STATUSES_STATUS2}</option>
                                            {*<option value="3">{$adminLangParams.ORDERS__STATUSES_STATUS3}</option>*}
                                            <option value="4">{$adminLangParams.ORDERS__STATUSES_STATUS4}</option>
                                            {*<option value="5">{$adminLangParams.ORDERS__STATUSES_STATUS5}</option>*}
                                            {*<option value="6">{$adminLangParams.ORDERS__STATUSES_STATUS6}</option>*}
                                            {*<option value="7">{$adminLangParams.ORDERS__STATUSES_STATUS7}</option>*}
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" class="btn red" id="button_change_status" disabled="disabled" onclick="changeStatus();"><i class="icon-ok white"></i> Изменить</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>

                    </div>


                </div>


            </div>

        </div>

    </div>

</div>
{literal}
<script type="text/javascript">
    function applyFilter(){
        $('#filter').attr('action', '/admin/orders/filter');
        $('#filter').submit();
    }

    function resetFilter(){
        $('#filter').attr('action', '/admin/orders/reset');
        $('#filter').submit();
    }

    function acceptOrder(id){
        //$("#accept_order"+id).html('<span style="color:#009900; font-size:16px; font-weight:bold;">OK</span>');
        var currStatus= $("#status"+id).val();
        $("#progress"+id).show();
        $("#status"+id).attr("disabled", true);
        $("#button"+id).attr("disabled", true);
        //alert("TEST");
        $.post("/admin/orders/accept-order", {order_id:id, status:currStatus},
                function(data) {
                      //alert("asdasd"+data);
                    if(data){

                        setTimeout(function(){
                            $("#status"+id).attr("disabled", false);
                            $("#button"+id).attr("disabled", false);
                            $("#progress"+id).fadeOut();
                        }, 2000);
                    }
                }
        );
    }

    function acceptOrderCustom(id){
        //$("#accept_order"+id).html('<span style="color:#009900; font-size:16px; font-weight:bold;">OK</span>');
        var currStatus= $("#status").val();

        $("#progress"+id).show();
        $("#status"+id).attr("disabled", true);
        $("#button"+id).attr("disabled", true);

        $.post("/admin/orders/accept-order", {order_id:id, status:currStatus},
                function(data) {
                    //alert("asdasd"+data);
                    if(data){

                        setTimeout(function(){
                            $("#status"+id).attr("disabled", false);
                            $("#button"+id).attr("disabled", false);
                            $("#progress"+id).fadeOut();
                            $("#ch_"+id).attr('checked',false);
                            $("#status"+id).val(currStatus);
                            $("#ch_0").attr('checked',false);
                        }, 2000);
                    }
                }
        );
    }


    function filterOn(){
        $("#filter_type").val(1);
        $("#filter").submit();
    }

    function filterOff(){
        $("#filter_type").val(0);
        $("#filter").submit();
    }

    $('#ch_0').bind('click', function() {

        if($('#ch_0').prop('checked') == true){
            check_uncheck_all(true);
        } else {
            check_uncheck_all(false);
        }
        checked_count()
    });

    var elements=$('.checkbox_e');
    var len=elements.size();

    function check_uncheck_all(flag) {
        for (index=0;index<len;index++)	{
            elements.eq(index).attr('checked',flag);
            if(flag){
                elements.eq(index).parent().addClass('checked');
            } else {
                elements.eq(index).parent().removeClass('checked');
            }
        }
    }

    function checked_count(){
        var el_count = 0;
        for (index=0;index<len;index++)	{
            if(elements.eq(index).prop('checked')==true){
                el_count++;
            }
        }

        if(len==el_count){
            $('#ch_0').attr('checked',true);
        } else {
            $('#ch_0').attr('checked',false);
        }

        if(el_count>0){
            $("#button_change_status").attr('disabled',false);
            $("#button_delete").attr('disabled',false);
            $("#button_send_sms").attr('disabled',false);
            $("#status").attr('disabled',false);
        } else {
            $("#button_change_status").attr('disabled',true);
            $("#button_delete").attr('disabled',true);
            $("#status").attr('disabled',true);
        }

        $("#el_count").html("<b>"+el_count+"</b>");
    }

    function changeStatus(){
        for (index=0;index<len;index++)	{
            if(elements.eq(index).attr('checked')==true){
                var el_id_str = elements.eq(index).attr('id');
                var el_id_array = el_id_str.split('_');
                acceptOrderCustom(el_id_array[1]);
            }
        }
        $("#button_change_status").attr('disabled',true);
        $("#status").attr('disabled',true);
        $("#button_delete").attr('disabled',true);
        $("#button_send_sms").attr('disabled',true);
        $("#el_count").html("<b>0</b>");
    }

    function deleteItems(){
        if(confirm('Вы уверены, что хотите удалить эту запись?')){
            var elIds=new Array();
            var inc = 0;
            for (index=0;index<len;index++)	{
                if(elements.eq(index).attr('checked')==true){
                    var el_id_str = elements.eq(index).attr('id');
                    var el_id_array = el_id_str.split('_');
                    elIds[inc++] = el_id_array[1];
                }
            }
            var elIdsStr = elIds.join(",");
            $("#ids").val(elIdsStr);
            $("#delete_form").submit();
        }
    }
</script>
{/literal}

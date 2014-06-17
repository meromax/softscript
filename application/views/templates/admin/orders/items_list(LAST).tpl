<br />
<center><span style="font-size:16px;">{$adminLangParams.ORDERS__HEADER}{if isset($filter_data)}<span style="color:red;">({$adminLangParams.ORDERS__FILTER_ACTIVE})</span>{/if}</span></center>
<br />
<div id="gallery">
    <table align="center" width="97%">
        <tr>
            <td colspan="8" align="center">
                <form method="post" action="/admin/orders/filter" name="filter" id="filter">
                <table>
                <tr>
                    {*<td>*}
                        {*{$adminLangParams.ORDERS__HOST}:*}
                    {*</td>*}
                    {*<td>*}
                        {*<select name="filter_host" id="filter_host">*}
                            {*<option value="" {if $fhost==""} selected {/if}> ------ </option>*}
                            {*{foreach from=$sites item=site}*}
                                {*<option value="{$site.title|stripslashes|strip_tags}" {if $fhost==$site.title} selected {/if}>{$site.title|stripslashes|strip_tags}</option>*}
                            {*{/foreach}*}
                        {*</select>*}
                    {*</td>*}
                    <td>
                        {$adminLangParams.ORDERS__STATUS}:
                    </td>
                    <td>
                        <select name="filter_status" id="filter_status">
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
                    </td>
                    {*<td>*}
                        {*Action Pay:*}
                    {*</td>*}
                    {*<td>*}
                        {*<select name="filter_action_pay" id="filter_action_pay" style="width:60px;">*}
                            {*<option value="2"  {if $faction_pay==2}selected{/if}> --- </option>*}
                            {*<option value="0" {if $faction_pay==0}selected{/if}>NO</option>*}
                            {*<option value="1" {if $faction_pay==1}selected{/if}>YES</option>*}
                        {*</select>*}
                    {*</td>*}
                    <td>
                        <input type="button" value="{$adminLangParams.ORDERS__BUTTON_FILTER_ON}" onclick="filterOn()" />
                    </td>
                    <td>
                        <input type="button" value="{$adminLangParams.ORDERS__BUTTON_FILTER_OFF}" onclick="filterOff()" />
                    </td>
                </tr>
                </table>
                <input type="hidden" name="filter_type" id="filter_type" value="1" />
                </form>
            </td>
        </tr>
        <tr>
            <td align="left" colspan="8" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
            {include file='admin/orders/paging.tpl'}
            </td>
        </tr>

        <tr><td colspan="8" height="2" style="line-height:2px;">&nbsp;</td></tr>
        <tr>
            <td class="header" align="center"><input type="checkbox" name="ch_0" id="ch_0" /></td>
            <td class="header" align="center"><b>#</b></td>
            <td class="header" width="140" align="center"><b>{$adminLangParams.ORDERS__CLIENT_NAME}</b></td>
            <td class="header" align="center" style="padding:2px 5px 2px 5px;"><b>Число товаров</b></td>
            <td class="header" align="center"><b>{$adminLangParams.ORDERS__TOTAL_PRICE}</b></td>
            <td class="header" align="center"><b>{$adminLangParams.ORDERS__STATUS}</b></td>
            {*<td class="header" width="200" align="center"><b>{$adminLangParams.ORDERS__COMMENT}</b></td>*}
            <td class="header" width="60" height="30" align="center"><b>{$adminLangParams.ORDERS__DATE}</b></td>
            <td class="header" width="70" align="center"><b>{$adminLangParams.ORDERS__ACTION}</b></td>
        </tr>
    {foreach from=$orders item=item}
        <tr {if $item.payed==1}bgcolor="lime"{else}bgcolor="{cycle values='#FFEFAA,#ffffff'}"{/if}>
            <td style="padding:5px 5px 5px 5px; width:40px;"  align="center"><input type="checkbox" class="checkbox_e" name="ch_{$item.id}" id="ch_{$item.id}" onclick="checked_count();" /></td>
            <td style="padding:5px 5px 5px 5px; width:40px;"  align="center">{$item.id}</td>
            <td style="padding:5px 5px 5px 5px; width:140px;" align="center" valign="middle">
                {if $item.user_id>0}
                    <a href="/admin/users/view/id/{$item.user_id}" target="_blank">{$item.name}</a>
                {else}
                    {$item.name}<br />
                    <span style="font-size: 10px; color: red;">не зарегестированный пользователь</span>
                {/if}
            </td>
            <td style="padding:5px 5px 5px 5px;" align="center">
                {$item.cd_count}
            </td>
            <td style="padding:5px 5px 5px 5px;" align="center">
                {$item.total_price}
            </td>
            <td style="padding:5px 5px 5px 5px; height:35px;" align="center" id="accept_order{$item.id}">
                <table>
                <tr>
                    <td>
                        <select name="status{$item.id}" id="status{$item.id}" style="width:110px;">
                            {*<option value="0" {if $item.status==0} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS0}</option>*}
                            <option value="1" {if $item.status==1} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS1}</option>
                            <option value="2" {if $item.status==2} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS2}</option>
                            {*<option value="3" {if $item.status==3} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS3}</option>*}
                            <option value="4" {if $item.status==4} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS4}</option>
                            {*<option value="5" {if $item.status==5} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS5}</option>*}
                            {*<option value="6" {if $item.status==6} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS6}</option>*}
                            {*<option value="7" {if $item.status==7} selected {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS7}</option>*}
                        </select>
                    </td>
                    <td>
                        <input type="button" value="{$adminLangParams.ORDERS__BUTTON_ACCEPT}" id="button{$item.id}" onclick="acceptOrder('{$item.id}');" />
                    </td>
                </tr>
                </table>
                <div style="position:absolute; background:#ffffff; display:none; margin-left:60px; margin-top:-2px;" id="progress{$item.id}">
                    <img src="/images/loading.gif" border="0" height="4" width="100"  />
                </div>
            </td>
            
            {*<td style="width:200px;">*}
                {*<div style="width:200px; height: 50px; overflow: auto;">*}
                    {*{$item.comment|stripslashes|strip_tags}*}
                {*</div>*}
            {*</td>*}
            <td style="padding:5px 5px 5px 5px; width:60px;" align="center">{$item.post_date|date_format:"%d.%m.%Y"}<br />{$item.post_date|date_format:"%H:%M"}</td>
            <td align="center" style="padding:5px 5px 5px 5px; width:70px;">
                <a href="/admin/orders/view/id/{$item.id}/page/{$page}" title="{$adminLangParams.ACTION_VIEW}"><img height="20" src="/images/admin/icons/view.png"></a>
                &nbsp;&nbsp;
                <a href="/admin/orders/delete/id/{$item.id}" onclick="return confirm('Вы уверены, что хотите удалить этот заказ?')" title="{$adminLangParams.ACTION_DELETE}"><img height="20" src="/images/admin/icons/delete.png"></a>
            </td>
        </tr>
        <tr><td colspan="8" height="2" style="line-height:2px;">&nbsp;</td></tr>
        {foreachelse}
        <tr>
            <td colspan="8"><b>{$adminLangParams.ORDERS__MESSAGE1}</b></td>
        </tr>
    {/foreach}
        <tr>
            <td colspan="8" class="header" style="height: 40px; padding:5px 5px 5px 5px;">
                <table>
                <tr>
                    <td>{$adminLangParams.ORDERS__SELECTED_ELEMENTS}:</td>
                    <td id="el_count" width="25" align="center" style="font-size:16px; border:1px dotted #000000;"><b>0</b></td>
                    <td>
                        <form action="/admin/orders/delete-items" method="post" id="delete_form">
                            <input type="hidden" name="ids" id="ids" value="" />
                            <input type="hidden" name="currPage" id="currPage" value="{$page}" />
                            <input type="button" value="{$adminLangParams.ORDERS__DELETE_SELECTED}" id="button_delete" disabled="disabled" onclick="deleteItems();" />
                        </form>
                    </td>
                    <td width="25" align="center" style="font-size:16px; border:0px dotted #000000;">|</td>
                    <td>{$adminLangParams.ORDERS__CHANGE_STATUS_SELECTED_ELEMENTS}:</td>
                    <td>
                        <select name="status" id="status" style="width:110px;" disabled="disabled">
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
                    <td><input type="button" value="{$adminLangParams.ORDERS__CHANGE}" id="button_change_status" disabled="disabled" onclick="changeStatus();" /></td>
                    <!--
                    <td width="25" align="center" style="font-size:16px; border:0px dotted #000000;">|</td>
                    <td><input type="button" value="{$adminLangParams.ORDERS__SEND_SMS_SELECTED}" id="button_send_sms" disabled="disabled" onclick="sendSMS();" /></td>
                    -->
                </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="left" colspan="8" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
            {include file='admin/orders/paging.tpl'}
            </td>
        </tr>
    </table>
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
        //alert($('#ch_0:checked').val());
        if($('#ch_0:checked').val() == 'on'){
            //alert("true");
            check_uncheck_all(true);
        } else {
            //alert("false");
            check_uncheck_all(false);
        }
        checked_count()
    });

    var elements=$('.checkbox_e');
    var len=elements.size();

    function check_uncheck_all(flag) {
        for (index=0;index<len;index++)	{
            elements.eq(index).attr('checked',flag);
        }
    }

    function checked_count(){
        var el_count = 0;
        for (index=0;index<len;index++)	{
            if(elements.eq(index).attr('checked')==true){
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
        if(confirm('Are you sure you want to delete this item?')){
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

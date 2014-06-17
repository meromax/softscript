
<br />
<center><span style="font-size:16px;">{$adminLangParams.ORDERS__HEADER}{if isset($filter_data)}<span style="color:red;">({$adminLangParams.ORDERS__FILTER_ACTIVE})</span>{/if}</span></center>
<br />
<div id="gallery">
<table align="center" width="97%">
<tr>
    <td colspan="7" align="center">
        <form method="post" action="/admin/orders/filter" name="filter" id="filter">
        <table border="0">
        <tr>
            <td width="100%" align="center">
                <div style="float:left; border: 1px solid #b2b2b2; padding: 5px 5px 5px 5px; margin: 2px 2px 2px 2px; height:45px;">
                    <input type="radio" name="type" value="1" {if $filter_data.type==1} checked="checked" {/if} />
                    {$adminLangParams.ORDERS__FILTER_ORDER_NUMBER}<br />
                    <input type="text" name="filter_order_number" id="filter_order_number" style="width:100px;" {if $filter_data.type==1} value="{$filter_data.filter_order_number|stripslashes|strip_tags}" {/if} />
                </div>

                <div style="float:left; border: 1px solid #b2b2b2; padding: 5px 5px 5px 5px; margin: 2px 2px 2px 2px; height:45px;">
                    <input type="radio" name="type" value="2" {if $filter_data.type==2} checked="checked" {/if} />
                    {$adminLangParams.ORDERS__FILTER_TRANSLATION}<br />
                    <select name="filter_translation_from" id="filter_translation_from">
                    {foreach from=$alllanguages item=lang}
                        <option value="{$lang.lang_id}" {if $filter_data.type==2&&$lang.lang_id==$filter_data.filter_translation_from} selected="selected" {/if}>{$lang.title|stripslashes|strip_tags}</option>
                    {/foreach}
                    </select>

                    <select name="filter_translation_to" id="filter_translation_to">
                    {foreach from=$alllanguages item=lang}
                        <option value="{$lang.lang_id}" {if $filter_data.type==2&&$lang.lang_id==$filter_data.filter_translation_to} selected="selected" {/if}>{$lang.title|stripslashes|strip_tags}</option>
                    {/foreach}
                    </select>

                </div>

                <div style="float:left; border: 1px solid #b2b2b2; padding: 5px 5px 5px 5px; margin: 2px 2px 2px 2px; height:45px;">
                    <input type="radio" name="type" value="3" {if $filter_data.type==3} checked="checked" {/if} />
                    {$adminLangParams.ORDERS__FILTER_DOCUMENT_NAME}<br />
                    <input type="text" name="filter_doc_name" id="filter_doc_name" style="width:200px;" {if $filter_data.type==3} value="{$filter_data.filter_doc_name|stripslashes|strip_tags}" {/if} />
                </div>

                <div style="float:left; border: 1px solid #b2b2b2; padding: 5px 5px 5px 5px; margin: 2px 2px 2px 2px; height:45px;">
                    <input type="radio" name="type" value="4" {if $filter_data.type==4} checked="checked" {/if} />
                    {$adminLangParams.ORDERS__FILTER_ORDER_PAY_STATUS}<br />
                    <select name="filter_pay_status" id="filter_pay_status">
                        <option value="1" {if $filter_data.type==4&&$filter_data.filter_pay_status==1} selected="selected" {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS1}</option>
						<option value="2" {if $filter_data.type==4&&$filter_data.filter_pay_status==2} selected="selected" {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS2}</option>
						<option value="3" {if $filter_data.type==4&&$filter_data.filter_pay_status==3} selected="selected" {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS3}</option>
						<option value="4" {if $filter_data.type==4&&$filter_data.filter_pay_status==4} selected="selected" {/if}>{$adminLangParams.ORDERS__STATUSES_STATUS4}</option>
                    </select>
                </div>

                <div style="float:left; border: 1px solid #b2b2b2; padding: 5px 5px 5px 5px; margin: 2px 2px 2px 2px; height:45px;">
                    <input type="radio" name="type" value="5" {if $filter_data.type==5} checked="checked" {/if} />
                    {$adminLangParams.ORDERS__FILTER_ORDER_WORK_STATUS}<br />
                    <select name="filter_work_status" id="filter_work_status">
                        <option value="1" {if $filter_data.type==5&&$filter_data.filter_work_status==1} selected="selected" {/if}> {$adminLangParams.ORDERS__FILTER_WORK_STATUS1}</option>
						<option value="2" {if $filter_data.type==5&&$filter_data.filter_work_status==2} selected="selected" {/if}> {$adminLangParams.ORDERS__FILTER_WORK_STATUS2}</option>
                    </select>
                </div>
                <div style="float:left; border: 1px solid #b2b2b2; padding: 5px 5px 5px 5px; margin: 2px 2px 2px 2px; height:45px;">
                    <input type="radio" name="type" value="6" {if $filter_data.type==6} checked="checked" {/if} />
                    {$adminLangParams.ORDERS__FILTER_EMAIL}<br />
                    <input type="text" name="filter_email" id="filter_email" style="width:200px;" {if $filter_data.type==6} value="{$filter_data.filter_email|stripslashes|strip_tags}" {/if} />
                </div>
                <div style="float:left; border: 1px solid #b2b2b2; padding: 5px 5px 5px 5px; margin: 2px 2px 2px 2px; height:45px;">
                    <input type="radio" name="type" value="7" {if $filter_data.type==7} checked="checked" {/if} />
                    {$adminLangParams.ORDERS__FILTER_USERNAME}<br />
                    <input type="text" name="filter_username" id="filter_username" style="width:200px;" {if $filter_data.type==7} value="{$filter_data.filter_username|stripslashes|strip_tags}" {/if} />
                </div>

            </td>
        </tr>
        <tr>
            <td align="center">
                <input type="button" name="filter_apply" id="filter_apply" value="{$adminLangParams.ORDERS__FILTER_APPLY}" onclick="applyFilter()" />
                <input type="button" name="filter_reset" id="filter_reset" value="{$adminLangParams.ORDERS__FILTER_RESET}" onclick="resetFilter()" />
            </td>
        </tr>
        </table>
        </form>
    </td>
</tr>
<tr>
	<td align="left" colspan="7" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/orders/paging.tpl'}
	</td>
</tr>

<tr><td colspan="5" height="2" style="line-height:2px;">&nbsp;</td></tr>
<tr>
	<td class="header"><b>{$adminLangParams.ORDERS__NUMBER}</b></td>
	<td class="header" width="140" align="center"><b>{$adminLangParams.ORDERS__TRANSLATION}</b></td>
	<td class="header" align="center"><b>{$adminLangParams.ORDERS__DOCUMENT}</b></td>
	<td class="header" align="center"><b>{$adminLangParams.ORDERS__DOCUMENT_TRANSLATED}</b></td>
	<td class="header" width="140" align="center"><b>{$adminLangParams.ORDERS__DATE_AND_TIME}</b></td>
	<td class="header" width="150" align="center"><b>{$adminLangParams.LANGUAGES__ACTION}</b></td>
</tr>
{foreach from=$orders item=item}
<tr bgcolor="{cycle values='#FFEFAA,#ffffff'}">
	<td style="padding:5px 5px 5px 5px; width:60px;">{$item.id}</td>
	<td style="padding:5px 5px 5px 5px; width:140px;" align="center" valign="middle">{$item.translation_title}</td>
	<td style="padding:5px 5px 5px 5px;" align="center">
        {if $item.filename_original!=''}
		    <a href="/admin/download{$item.id}.html">{$item.filename_original}</a>
        {/if}
        {if $item.filename_original!='' && $item.filename_original2!=''} | {/if}
        {if $item.filename_original2!=''}
		    <a href="/admin/2download{$item.id}.html">{$item.filename_original2}</a>
        {/if}
	</td>
	<td style="padding:5px 5px 5px 5px;" align="center">
		<a href="/admin/tdownload{$item.id}.html">{$item.filename_translated_original}</a>
	</td>
	<td style="padding:5px 5px 5px 5px; width:140px;" align="center">{$item.post_date}</td>
	<td align="center" style="padding:5px 5px 5px 5px; width:150px;">
		<a href="/admin/orders/modify/id/{$item.id}">{$adminLangParams.ACTION_EDIT}</a>
		&nbsp;|&nbsp;
		<a href="/admin/orders/delete/id/{$item.id}" onclick="return confirm('Are you sure you want to delete this item?')">{$adminLangParams.ACTION_DELETE}</a>
	</td>
</tr>
<tr><td colspan="7" height="2" style="line-height:2px;">&nbsp;</td></tr>
{foreachelse}
<tr>
	<td colspan="7"><b>{$adminLangParams.ORDERS__MESSAGE1}</b></td>
</tr>
{/foreach}
<tr>
	<td align="left" colspan="5" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
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
</script>
{/literal}
<br />
<center><span style="font-size:16px;">{$adminLangParams.ORDERS_HEADER}</span></center>
<br />
<table width="100%">
<tr>
    <td>
        <table>
        <tr>
            <td>
                ORDERS__FILTER_HEADER=Фильтры поиска:
ORDERS__FILTER_ORDER_NUMBER=Номер заказа
ORDERS__FILTER_TRANSLATION=Перевод
ORDERS__FILTER_DOCUMENT_NAME=Название документа
ORDERS__FILTER_ORDER_PAY_STATUS=Статус оплаты заказа
ORDERS__FILTER_ORDER_WORK_STATUS=Статус работы
ORDERS__FILTER_EMAIL=E-mail пользователя
ORDERS__FILTER_USERNAME=Имя пользователя
ORDERS__FILTER_APLY=Применить
            </td>
        </tr>
        </table>
    </td>
</tr>
<tr>
	<td align="left" colspan="10" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/orders/paging.tpl'}
	</td>
</tr>
<tr>
	<td>
		<table align="left" width="100%" >
			<tr>
				<td class="header" nowrap width="50" align="center">{$adminLangParams.ORDERS_ID}</td>
				<td class="header" nowrap width="300" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS_CONTACTS}</td>
				<td class="header" nowrap width="500" style="padding:5px 5px 5px 5px;">{$adminLangParams.ORDERS_ORDER_INFORMATION}</td>
				<td class="header" nowrap align="center" style="padding:5px 5px 5px 5px; width:100px;">{$adminLangParams.ORDERS_ORDER_STATUS}</td>
				<td class="header" nowrap align="center" style="padding:5px 5px 5px 5px; width:180px;">{$adminLangParams.ORDERS_ACTION}</td>
			</tr>
			{foreach name=pages_loop from=$orders item=item}
			<tr  bgcolor="{cycle values="#fefefe,#e9e9e9"}">
				<td nowrap align="center" height="30" style="padding:5px 5px 5px 5px;">{$item.id}</td>
				<td nowrap  style="padding:5px 5px 5px 5px;">
					<b>{$adminLangParams.ORDERS_CONTACTS_NAME}:</b> {$item.user.member_lastname|stripslashes} {$item.user.member_firstname|stripslashes} {$item.user.member_middlename|stripslashes}<br />
					<b>{$adminLangParams.ORDERS_CONTACTS_COMPANY}:</b> {$item.user.member_company|stripslashes}<br />
					<b>{$adminLangParams.ORDERS_CONTACTS_PHONE}:</b> {$item.user.member_phone|stripslashes}<br />
					<b>{$adminLangParams.ORDERS_CONTACTS_EMAIL}:</b> {$item.user.member_email|stripslashes}
				</td>
				<td nowrap height="30" style="padding:5px 5px 5px 5px;">
					<table width="100%">
					<tr>
						<td width="50%" style="border-right:1px solid #b2b2b2; padding:5px 5px 5px 5px;">
							<b>{$adminLangParams.ORDERS_ORDER_INFORMATION_TYPE}:</b> {$item.sitetype.title|stripslashes|strip_tags}<br />
							<b>{$adminLangParams.ORDERS_ORDER_INFORMATION_CMS}:</b> {$item.cms.title|stripslashes|strip_tags}<br />
							<b>{$adminLangParams.ORDERS_ORDER_INFORMATION_DESIGN}:</b> <a href="/images/design/{$item.design.design_image}_big.jpg" rel="lightbox">{$item.design.design_title|stripslashes|strip_tags}</a><br />
							<b>{$adminLangParams.ORDERS_ORDER_INFORMATION_SITENAME}:</b> {$item.sitename|stripslashes|strip_tags}<br />
							<b>{$adminLangParams.ORDERS_ORDER_INFORMATION_DOMAIN}:</b> <a href="http://{$item.domain|stripslashes|strip_tags}" target="_blank">{$item.domain|stripslashes|strip_tags}</a><br />
						</td>
						<td width="50%" style="padding:5px 5px 5px 5px;">
							<b>{$adminLangParams.ORDERS_ORDER_INFORMATION_DATE}:</b> {$item.post_date}<br />
							<b>{$adminLangParams.ORDERS_ORDER_INFORMATION_PRICE}:</b> {$item.price|number_format:2:".":""}
						</td>
					</tr>
					</table>
				</td>
				<td nowrap align="center" style="padding:5px 5px 5px 5px;">
					<form method="POST" name="statusform{$item.id}" action="/admin/orders/changestatus">
					<select name="ostatus" id="ostatus" onchange="changeStatus('statusform{$item.id}');">
					<option value="0" {if $item.status==0} selected {/if}>{$adminLangParams.ORDERS_ORDER_STATUS_S0}</option>
					<option value="1" {if $item.status==1} selected {/if}>{$adminLangParams.ORDERS_ORDER_STATUS_S1}</option>
					<option value="2" {if $item.status==2} selected {/if}>{$adminLangParams.ORDERS_ORDER_STATUS_S2}</option>
					<option value="3" {if $item.status==3} selected {/if}>{$adminLangParams.ORDERS_ORDER_STATUS_S3}</option>
					</select>
					<input type="hidden" name="order_id" value="{$item.id}" />
					<input type="hidden" name="status" value="{$status}" />
					</form>
				</td>
				
				<td nowrap align="center">
					<table>
					<tr>
						<td width="48%" align="right"><a href="/admin/orders/delete/status/{$status}/id/{$item.id}"  onclick="return confirm({$adminLangParams.NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN})">{$adminLangParams.ACTION_DELETE}</a></td>
						<td width="4%">&nbsp;|&nbsp;</td>
						<td width="100" align="left">
							{if $item.created==0}
								<div id="create{$item.id}">
<!--								<a href="/admin/orders/create/id/{$item.id}" target="_blank">{$adminLangParams.ACTION_CREATE}</a>-->
									<a style="text-decoration:underline; cursor:hand; cursor:pointer;" onclick="createDomain({$item.id});">{$adminLangParams.ACTION_CREATE}</a>
								</div>
							{else}
								<div id="active{$item.id}" style="color:#006600; font-weight:bold;">{$adminLangParams.ORDERS_DOMAIN_ACTIVE}</div>
							{/if}
							<div id="progress{$item.id}" style="padding-top:2px; display:none;"><img style="width:70px; height:11px;" src="/images/loading.gif" /></div>
							<div id="active{$item.id}" style="color:#006600; font-weight:bold; display:none;">{$adminLangParams.ORDERS_DOMAIN_ACTIVE}</div>
						</td>
					</tr>
					</table>
				</td>
			</tr>
			{foreachelse}
			<tr>
				<td colspan="10"><b>No Orders found</b></td>
			</tr>	
			{/foreach}
		</table>
	</td>
</tr>
<tr>
	<td align="left" colspan="10" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
		{include file='admin/orders/paging.tpl'}
	</td>
</tr>
</table>
{literal}
<script type="text/javascript">
function changeStatus(formname){
	document.forms[""+formname+""].submit();
}
function createDomain(order_id){
	var msg='';
	

	$("#create"+order_id).hide('fast');
	$("#progress"+order_id).show('slow'); 

	var url = "id="+order_id; 
	$.ajax({
	type: "POST",
	url: "/admin/orders/create",
	data: url,
	success: function(data){
		setTimeout(function () {
			$("#progress"+order_id).hide(); 
			$("#active"+order_id).show('slow');
		}, 3000);
	}
	});
	
}
</script>
{/literal}
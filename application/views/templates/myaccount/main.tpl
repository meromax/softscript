<div class="header_txt3">{$settings.my_account|stripslashes|strip_tags}</div>
<div class="content_container">

<div class="content_block">
<table id="contacts"  border="0" width="100%" height="400" style="background:#DAE3EA; border:0px solid #252526;">
<tr>
	<td width="100%">
		<table width="100%" style="border:1px solid #B3C6D3;" cellpadding="0" cellspacing="0">
		<tr>
			<td height="30" class="pmenu" style="color:#666666; padding:16px 2px 2px 5px; font-size:12px; font-weight:bold; background:#F9FBFC;">
				<span id="p_menu0" style="padding:10px 10px 12px 10px; cursor:hand; cursor:pointer;" onclick="chooseMenu(0);" onmouseover="showSelect(0);" onmouseout="hideSelect(0);">{$settings.private_info|stripslashes|strip_tags}</span>&nbsp;&nbsp;&nbsp;
<!--				<span id="p_menu1" style="padding:10px 10px 12px 10px; cursor:hand; cursor:pointer;" onclick="chooseMenu(1);" onmouseover="showSelect(1);" onmouseout="hideSelect(1);">{$settings.commercial_inf|stripslashes|strip_tags}</span>-->
				<span id="p_menu1" style="padding:10px 10px 12px 10px; cursor:hand; cursor:pointer;" onclick="chooseMenu(1);" onmouseover="showSelect(1);" onmouseout="hideSelect(1);">{$settings.orders_status|stripslashes|strip_tags}</span>
			</td>
			<td height="30"  class="pmenu" align="right" style="color:#f9f9f9; padding:16px 5px 2px 5px; font-size:12px; font-weight:bold; background:#F9FBFC;">
				<span id="p_menu2" style="padding:10px 10px 12px 10px; cursor:hand; cursor:pointer;" onclick="chooseMenu(2);" onmouseover="showSelect(2);" onmouseout="hideSelect(2);">{$settings.logout|stripslashes|strip_tags}</span>			
			</td>
		</tr>
		<tr>
			<td height="3" style="line-height:3px;" colspan="2"></td>
		</tr>
		<tr>
			<td height="367" colspan="2" style="border:0px solid #444444; background:#F9FBFC;">
			<div style="width:100%; height:368px; background:#F7F9FA;" id="private">
			<table width="100%">
			<tr>
				<tr>
					<td width="230">
						<table>
						<tr>
							<tr>
								<td style="color:#ffffff; font-size:22px;" id="ps_menu0">&#8226;</td>
								<td style="padding-top:9px; cursor:hand; cursor:pointer;" class="psmenu" onclick="chooseSMenu(0);" onmouseover="showSSelect(0);" onmouseout="hideSSelect(0);"><span>{$settings.change_private_information|stripslashes|strip_tags}</span></td>
							</tr>
							<tr>
								<td colspan="2" style="height:5px;"></td>
							</tr>
							<tr>
								<td valign="top" style="color:#ffffff; font-size:22px;" id="ps_menu1">&#8226;</td>
								<td style="padding-top:9px; cursor:hand; cursor:pointer;" class="psmenu" onclick="chooseSMenu(1);" onmouseover="showSSelect(1);" onmouseout="hideSSelect(1);"><span>{$settings.change_the_password|stripslashes|strip_tags}</span></td>
							</tr>
						</tr>
						</table>
					</td>
					<td width="400" valign="top">
					<div id="chnage_box0" style="width:400px; display:block;">
						{include file='myaccount/change_info.tpl'}
					</div>
					<div id="chnage_box1" style="width:400px; display:none;">
						{include file='myaccount/change_password.tpl'}
					</div>
					</td>
				</tr>
			</tr>
			</table>
			</div>
			<div style="width:100%; height:668px; background:#F9FBFC; display:none;" id="comercial">
			<table width="100%">
			<tr>
				<td width="100%" style="padding:15px 10px 10px 10px;" align="center">
					<span class="content_title" style="text-decoration:none;">{$settings.current_orders|stripslashes|strip_tags}:</span>
				</td>
			</tr>
			<tr>	
				<td style="padding-left:10px;">
					<table style="color:#666666; width:550px; background:#DBE5EB; border:2px solid #B3C6D3;" border="0">
					<tr>
						<td width="50" align="center"><b>{$settings.date_key|stripslashes|strip_tags}</b></td>
						<td style="padding:2px 2px 2px 2px;" width="200" align="center"><b>{$settings.site_key|stripslashes|strip_tags}:</b></td>
						<td style="padding:2px 2px 2px 2px;" width="60" align="center"><b>{$settings.pricekey|stripslashes|strip_tags}</b></td>
						<td style="padding:2px 2px 2px 2px;" align="center"><b>{$settings.status_key|stripslashes|strip_tags}</b></td>
<!--						<td style="padding:2px 2px 2px 2px;" align="center"><b>{$settings.action_key|stripslashes|strip_tags}</b></td>-->
					</tr>
					</table>
					
					<div style="width:100%; height:570px; overflow:auto; color:#c5c5c5;padding-top:0px;">
					{if $orders_count>0}
						<table style="color:#7878A2; width:550px; font-size:11px;" border="0">
						{foreach from=$orders item=order_item}
						<tr bgcolor="{cycle values='#F1F4F7,#ffffff'}">
							<td width="52" align="center" style="padding:14px 2px 2px 2px;">{$order_item.post_date|date_format:"%d.%m.%Y"}</td>
							<td style="padding:2px 2px 2px 2px;" width="200">
								<b>{$settings.type_key|stripslashes|strip_tags}:</b> {$order_item.sitetype.title|stripslashes|strip_tags}<br />
								<b>CMS:</b> {$order_item.cms.title|stripslashes|strip_tags}<br />
								<b>{$settings.design_key|stripslashes|strip_tags}:</b> {$order_item.design.design_title|stripslashes|strip_tags}<br />
								<b>{$settings.sitename_key|stripslashes|strip_tags}:</b> {$order_item.sitename|stripslashes|strip_tags}<br />
								<b>{$settings.domain|stripslashes|strip_tags}:</b> {$order_item.domain|stripslashes|strip_tags}<br />
							</td>
							<td style="padding:14px 2px 2px 2px;" width="60" align="center" valign="middle">{$order_item.price|number_format:2:".":""}</td>
							<td style="padding:14px 2px 2px 2px; color:green; font-weight:bold;" align="center" valign="middle">
								{if $order_item.status==0} 
									{$frontendLangParams.ORDERS_ORDER_STATUS_S0}
								{elseif $order_item.status==1} 
									{$frontendLangParams.ORDERS_ORDER_STATUS_S1}
								{elseif $order_item.status==2} 
									{$frontendLangParams.ORDERS_ORDER_STATUS_S2}
								{elseif $order_item.status==3} 
									<span style="color:red;">{$frontendLangParams.ORDERS_ORDER_STATUS_S3}</span>
								{/if}	
							</td>
<!--							<td style="padding:14px 2px 2px 2px;" align="center">-->
<!--								<a href="#" style="text-decoration:underline;">{$settings.pay_key|stripslashes|strip_tags}</a>-->
<!--							</td>-->
						</tr>
						{/foreach}
						</table>
					{/if}
					</div>
				</td>
			</tr>
			</table>
			</div>
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>
</div>
</div>
{literal}
<script type="text/javascript">

// main menu
var p_menu_selected=0;

function showSelect(menu_id){
	$("#p_menu"+menu_id).css({backgroundColor: '#EAAA41', border: '1px solid #666666',color:'#ffffff'});
}
function hideSelect(menu_id){
	if(p_menu_selected!=menu_id){
		$("#p_menu"+menu_id).css({backgroundColor: '#DBE5EB', border: '1px solid #666666', color:'#666666'});
	}
}
function chooseMenu(menu_id){
	for(var i=0; i<3; i++){
		$("#p_menu"+i).css({backgroundColor: '#DBE5EB', border: '1px solid #666666', color:'#666666'});
	}
	if(menu_id==1){
		$("#private").hide();
		$("#comercial").show();
	}
	if(menu_id==0){
		$("#comercial").hide();
		$("#private").show();
	}
	$("#p_menu"+menu_id).css({backgroundColor: '#EAAA41', border: '1px solid #666666', color:'#ffffff'});
	p_menu_selected = menu_id;
	if(menu_id==2){
		document.location.href='/logout.html';
	}
}
chooseMenu(0);


//sub menu
var ps_menu_selected=0;

function showSSelect(menu_id){
	$("#ps_menu"+menu_id).css({color: '#52FB07'});
}
function hideSSelect(menu_id){
	if(ps_menu_selected!=menu_id){
		$("#ps_menu"+menu_id).css({color: '#ffffff'});
	}
}
function chooseSMenu(menu_id){
	for(var i=0; i<2; i++){
		$("#ps_menu"+i).css({color: '#ffffff'});
		$("#chnage_box"+i).hide();
	}
	$("#ps_menu"+menu_id).css({color: '#52FB07'});
	ps_menu_selected = menu_id;
	$("#chnage_box"+menu_id).show();
}
chooseSMenu(0);


//files
function selFile(id){
	$("#file"+id).css({color: '#52FB07'});
}
function hideFile(id){
	$("#file"+id).css({color: '#ffffff'});
}
</script>
{/literal}
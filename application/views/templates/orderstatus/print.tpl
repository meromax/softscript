<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
	<title>Pet Id Me - Order Status</title>
	<link rel="stylesheet" type="text/css" href="/css/styles.css"/>
</head>
<body style="background:#ffffff;" marginheight="0" marginwidth="0">
<table bgcolor="#ffffff" cellpadding="0" cellspacing="0">
<tr>
	<td valign="top">
			<div class="cleaner"><!--  --></div>
			<div class="cleaner"><!--  --></div>
			<div class="content orders" style="padding:5px 5px 5px 8px; background:none;">
			<div class="order-title">
				<div class="oleft"><!--  --></div>
				<div class="oright"><!--  --></div>
				<h4>Order history</h4>
			</div>
			<div class="order-content">
				<div class="col1 bluet">
					<p><span>O</span>rder <span>N</span>umber:</p>
					<p><span>O</span>rder <span>D</span>ate:</p>
					<p><span>O</span>rder <span>T</span>ype:</p>
					<p><span>O</span>rder <span>S</span>tatus:</p>
				</div>
				<div class="col2">
					<p>{$order_status.id}</p>
					<p>{$order_status.post_date|date_format:"%m/%d/%Y"}</p>
					<p>WEB</p>
					<p>
					{if $order_status.status==1}
						Processing
					{else}
						<span style="color:green; font-weight:bold;">Proccessed</span>
					{/if}
					</p>
				</div>
				<div class="cleaner"><!--  --></div>
				<div class="sub-title">
					<div class="col1 w226" style="width:226px;">Ship to:</div>
					<div class="col2">Bill to:</div>
					<div class="cleaner"><!--  --></div>
				</div>
				<div class="col1 w226" style="width:226px;">
					<p class="upp">{$order_status.member_info.member_firstname} {$order_status.member_info.member_lastname}</p>
					<p>{$order_status.member_info.billing_address}</p>
					<p>{$order_status.member_info.billing_city}<br/> {$order_status.member_info.billing_state} {$order_status.member_info.billing_zip}</p>
					<p>{$order_status.member_info.member_phone}</p>
				</div>
				<div class="col2">
					<p class="upp">{$order_status.member_info.member_firstname} {$order_status.member_info.member_lastname}</p>
					<p>{$order_status.member_info.member_address}</p>
					<p>{$order_status.member_info.member_city}<br/> {$order_status.member_info.member_state} {$order_status.member_info.member_zip}</p>
					<p>{$order_status.member_info.member_phone}</p>
				</div>
				<div class="cleaner"><!--  --></div>
				<div class="sub-title">
					<div class="col1 w226" style="width:226px;">Payment:</div>
					<div class="cleaner"><!--  --></div>
				</div>
				<div class="col1 w226" style="width:226px;">
					<p>CREDIT CARD ******{$order_status.member_info.credit_card_number}</p>
					<p>Amount Charged: ${$order_status.order_total_price}</p>
				</div>
				<div class="cleaner"><!--  --></div>
				<div class="sub-title">
					<ul>
						<li>Qty:</li>
						<li>Price:</li>
						<li>Total:</li>
					</ul>
					<div class="col1 w226" style="width:226px;">Order Summary:</div>
					<div class="cleaner"><!--  --></div>
				</div>
				{foreach key=key from=$order_status.products_info item=item}
				<div {if $key+1!=$order_status.products_count} class="item-col" {else} class="item-col last" {/if}>
					<ul>
						<li>{$item.product_count}</li>
						<li>${$item.product_info.product_price}</li>
						<li>${$item.product_amount_total}</li>
					</ul>
					<div><a href="/product{$item.product_info.product_id}.html" target="_blank">{$item.product_info.product_title}</a></div>
				</div>
				{/foreach}
				<div class="cleaner"><!--  --></div>

				<div class="total">
					<ul class="r-total">
						<li>${$order_status.order_total_price}</li>
						<li>$0.0</li>
						<li>$0.0</li>
						<li><span>${$order_status.order_total_price}</span></li>
					</ul>
					<ul class="t-total">
						<li>Sub Total:</li>
						<li>Shipping:</li>
						<li>Sales Tax:</li>
						<li>TOTAL:</li>
					</ul>
		
					<div class="cleaner"><!--  --></div>
				</div>
			</div>
			<div class="back-to-products marg" style="margin-left:315px;">
				<a href="#" id="print_id" onclick="printPage();">Print</a>
			</div>
			<div class="cleaner"><!--  --></div>
			<div class="cleaner"><!--  --></div>

	</td>
</tr>
</table>
{literal}
<script type="text/javascript">
function printPage(){
	document.getElementById('print_id').style.display = "none";
	print();
	window.close();
}
</script>
{/literal}
</body>
</html>

<div class="centercol">
	<div class="title">
		<div class="title-left"><!--  --></div>
		<h2><img src="/images/orderstatus.gif" title="Products Key" alt="Products Key"/></h2>
		<div class="title-right"><!--  --></div>
	</div>
	<div class="content orders">

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
			{if $order_status.status==0}
				order placed
			{elseif $order_status.status==1}
				order in process
			{elseif $order_status.status==2}
				order shipped
			{else}
				on hold
			{/if}
			</p>
		</div>
		<div class="cleaner"><!--  --></div>
		<div class="sub-title">
			<div class="col1 w226">Ship to:</div>
			<div class="col2">Bill to:</div>
			<div class="cleaner"><!--  --></div>
		</div>
		<div class="col1 w226">
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
			<div class="col1 w226">Payment:</div>
			<div class="cleaner"><!--  --></div>
		</div>
		<div class="col1 w226">
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
			<div class="col1 w226">Order Summary:</div>
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
	</div>
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
			<form action="/orderstatus/index/getorderstatus" name="trackingform">
			<input type="hidden" name="mode" value="{$order_status.mode}" />
			<input type="hidden" name="order_number" value="{$order_status.order_number}" />
			<input type="hidden" name="order_email" value="{$order_status.order_email}" />
			<input type="hidden" name="order_zip" value="{$order_status.order_zip}" />
			<div class="g-button">
				<a style="cursor:hand; cursor:pointer;" onclick="tracking();">Tracking</a>
			</div>
			</form>
			<div class="cleaner"><!--  --></div>
		</div>
		<div class="print">
			<div class="back-to-products marg">
				{literal}
				<!--<a href="#" onclick="openWindow('/orderstatus/index/print',{width:780,height:650,center:true, scrollbars:1});">Print</a>-->
				<script type="text/javascript">
				
				function popup(url)
				{
					var width = 726;
					var height = 550;
					var left = (screen.width - width)/2;
					var top = (screen.height - height)/2;
					var params = 'width='+width+', height='+height+', top='+top+', left='+left+', directories=no, location=no, menubar=no, resizable=no, scrollbars=yes, status=no, toolbar=no';
					var newwin= window.open(url,'Chat', params);
					if (window.focus) {newwin.focus()}
						return false;
				}
				
				function opWind(URL,width,height) {
					var left = screen.width/2-width/2;
					var top  = screen.height/2-height/2;
					var myWin=window.open(URL, "wind1", "width="+width+",height="+height+", top="+top+", left="+left+",resizable=no,scrollbars=yes,menubar=no");
				}
				
				
				</script>

				<a href="#" onclick="opWind('/orderstatus/index/print',728,500);">Print</a>
			{/literal}
			</div>
			<div class="cleaner"><!--  --></div>
		</div>
	<div class="cleaner"><!--  --></div>



		<div class="cleaner"><!--  --></div>
	</div>
	<div class="content-bottom"><!--  --></div>
</div>
{literal}
<script type="text/javascript">

function tracking(){
	document.forms.trackingform.submit();
}

</script>
{/literal}

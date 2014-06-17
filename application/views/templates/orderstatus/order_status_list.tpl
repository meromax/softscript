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
		<h4>Order Status List</h4>
	</div>
	<div class="order-content">

		<div class="cleaner"><!--  --></div>
		<div class="sub-title">
			<ul>
				<li>Action:</li>
			</ul>
			<div class="col1 w226">Order Date:</div>
			<div class="cleaner"><!--  --></div>
		</div>
		{if $orders_count>11}
		<div style="overflow:auto; height:350px;">
		{/if}
		{foreach key=key from=$order_status_list item=item}
		<div {if $key+1!=$orders_count} class="item-col" {else} class="item-col last" {/if}>
		<table width="100%" border="0" bgcolor="#ffffff">
		<tr>
			<td width="150">
				{$item.post_date|date_format:"%m/%d/%Y"}
			</td>
			<td align="right" style="padding-right:5px;">
				<a href="/orderstatus/index/vieworderstatus/order_number/{$item.id}">View Order Status</a>
			</td>
		</tr>
		</table>
		</div>
		{/foreach}
		{if $orders_count>11}
		</div>
		{/if}
		<div class="cleaner"><!--  --></div>
	</div>
		<div class="total">
			
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

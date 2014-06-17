<div class="header_txt3">{$frontendLangParams.ORDER_PAYMENT_HEADER}</div>
<div class="content_container">
<div class="content_block">
	{if $testmode==1}
		<div class="content_title" style="text-decoration:none;">
			{$frontendLangParams.ORDER_PAYMENT_TITLE}<br />
			<center><span style="color:red; font-size:11px;">({$frontendLangParams.ORDER_TESTMODE})</span></center>
		</div>
		<div>
			{include file='order/order_info.tpl'}
		</div>
		<form method="post" action="/pay.html">
			<input class="go_btn" type="image" src="/images/pay_{$lang_info.short_title|strtolower}.gif">
		</form>
	{else}
		<div class="content_title" style="text-decoration:none;">
			{$frontendLangParams.ORDER_PAYMENT_TITLE}
		</div>
		<div>
			{include file='order/order_info.tpl'}
		</div>
		{php}
			print "<script language=JavaScript src='".$_SESSION['rorboxchange_form']."' ></script>";
		{/php}	
		<script type="text/javascript">
		
		$("#IncCurrLabel").css('width','386px');
		</script>
	
	{/if}	
</div>
</div>
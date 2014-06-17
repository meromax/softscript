<div class="header_txt3">{$settings.registration|stripslashes|strip_tags}</div>
<div class="content_container">

<div class="content_block">
	<div style='line-height:16px; font-size:16px;'>
		<center><p>{$settings.registration_complete|stripslashes|strip_tags}</p></center>
	</div>
</div>
</div>
{if $payment_step==1}
	{literal}
	<script type="text/javascript">
		setTimeout(function () { document.location.href='/payment.html'; }, 3000);
	</script>
	{/literal}
{else}
	{literal}
	<script type="text/javascript">
		setTimeout(function () { document.location.href='/myaccount.html'; }, 5000);
	</script>
	{/literal}
{/if}

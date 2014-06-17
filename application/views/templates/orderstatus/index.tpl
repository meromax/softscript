<div class="centercol">

	<div class="title">
		<div class="title-left"><!--  --></div>

		<h2><img src="/images/orderstatus.gif" title="Order Status" alt="Order Status"/></h2>
		<div class="title-right"><!--  --></div>
	</div>
	
	<div class="content laf">
				
	<div class="haveordernumber">
		<img src="/images/haveyouordernumber.png" alt="Have your order number?" />
		<p>To look up an order enter in your email address and order number (found in order confirmation email and also on packing slip).</p>
	
	<form method="POST" action="/orderstatus/index/getorderstatus" name="orderform1">
	<div class="findorder">
	
		<label>Order number:</label>
		<div class="itxt"><input type="text" name="order_number" id="order_number" style="width: 155px;" maxlength="10" /></div>
		<div class="cleaner"><!-- --></div>
	
		<label>E-mail:</label>
		<div class="itxt"><input type="text" name="order_email" id="order_email" style="width: 180px;" /></div>
		<div class="cleaner"><!-- --></div>
	
	<label>Zip Code:</label>                        
	<div class="itxt"><input type="text" name="order_zip" id="order_zip" maxlength="5" style="width: 155px;" /></div>
	
	<div class="cleaner"><!-- --></div>
	<input type="hidden" name="mode" value="1" />
	<img src="/images/findorder.png" style="margin-right: 2px; cursor:hand; cursor:pointer;" border="0" onclick="checkOrderForm1();" />
	</div>
	</form>	
	
	</div>
	
	<div class="donthaveordernumber">
	<img src="/images/donthaveordernumber.png" alt="Don't have your order number?" />
	<p>You may also look up your order with your full name and the first AND last 4 digits of the credit card used to place your order.</p>
	
	<form method="POST" action="/orderstatus/index/getorderstatus"  name="orderform2">
	<div class="findorder">
	
	<label style="width: 105px">Name on card:</label>
	<div class="itxt"><input type="text" name="order_name" id="order_name" style="width: 155px;" /></div>
	<div class="cleaner"><!-- --></div>
	
	<label style="width: 280px; padding-bottom: 10px;">First & last 4 digits of credit card number:</label>
	<div style="padding-left: 115px; padding-bottom: 15px;">
	<div class="itxt" style="margin-right: 13px;"><input type="text" name="order_card3" id="order_card3" maxlength="4" style="width: 66px;" /></div>
	<div class="itxt"><input type="text" name="order_card4" id="order_card4" maxlength="4" style="width: 66px;" /></div>
	
	<div class="cleaner"><!-- --></div>
	</div>
	<input type="hidden" name="mode" value="2" />
	<img src="/images/findorder.png" style="margin-left: 18px; cursor:hand; cursor:pointer;" border="0" onclick="checkOrderForm2();" />
	</div>
	</form>	
	</div>
	
	</div>
	
	<div class="content-bottom"><!--  --></div>
</div>
<div id="message_box" style="position:absolute; margin-left:200px; margin-top:350px; color:#000000; background:#ffffff; width:360px; display:none; border:1px solid #D1E0FF; background:#ECF0FB; z-index:1000;">
	<div style="height:20px;  width:100%; height:30px; background:#ECF0FB;  position:relative; ">
		<table width="100%" height="100%">
		<tr>
			<td style="font-weight:bold; color:#7E8892; padding:3px 3px 3px 3px; font-size:14px;" align="left" valign="middle"><div id="titleBox">The Message Box</div></td>
		</tr>
		</table>
	</div>
	<div align="left" id="message_text" style="text-decoration:none; padding:3px 3px 3px 3px; background:#ffffff;  position:relative; ">
		{if $msg!=""}{$msg}{/if}
	</div>
</div>
{literal}
<script type="text/javascript">

function checkOrderForm1(){
	var msg='';
	var zip_us           = /^\d{5}$|^\d{5}-\d{4}$/;
	var number           = /^[0-9]{1,}$/;
	var mail             = /^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
	
	var order_number   = document.getElementById('order_number');
	var order_email    = document.getElementById('order_email');
	var order_zip      = document.getElementById('order_zip');	
	

    $("#message_box").fadeOut({"opacity": "show" }, { "duration": "slow", "easing": "easein" });        
    
    
	if(order_number.value==''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Order number'.</span><br />";
	} else if(order_number.value.match(number)==null){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter a valid 'Order number'.</span><br />";
	}
	
	if(order_email.value==''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'E-mail'.</span><br />";
	} else if(order_email.value.match(mail)==null){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter a valid 'E-mail'.</span><br />";
	}
	
	if(order_zip.value==''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Zip Code'.</span><br />";
	} else if(order_zip.value.match(zip_us)==null){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter a valid 'Zip Code'.</span><br />";
	}
	
	if(msg==''){
		$("#message_box").fadeOut({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
		document.forms.orderform1.submit();
	} else {
		$("#message_text").html(msg);
		$("#message_box").fadeIn({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
		setTimeout(function() {	$("#message_box").fadeOut("show"); }, 4000);
	}
}

function checkOrderForm2(){
	var msg='';
	var credit_number  = /^\d{4}$|^\d{4}$/;		
	
	var order_name     = document.getElementById('order_name');
	var order_card3    = document.getElementById('order_card3');
	var order_card4    = document.getElementById('order_card4');
	
	

    $("#message_box").fadeOut({"opacity": "show" }, { "duration": "slow", "easing": "easein" });        
    
    
	if(order_name.value==''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Name on card'.</span><br />";
	}
	
	if(order_card3.value==''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'First 4 digits of credit card number'.</span><br />";
	} else if(order_card3.value.match(credit_number)==null){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter a valid 'First 4 digits of credit card number'.</span><br />";
	}
	
	if(order_card4.value==''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Last 4 digits of credit card number'.</span><br />";
	} else if(order_card4.value.match(credit_number)==null){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter a valid 'Last 4 digits of credit card number'.</span><br />";
	}
	
	if(msg==''){
		$("#message_box").fadeOut({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
		document.forms.orderform2.submit();
	} else {
		$("#message_text").html(msg);
		$("#message_box").fadeIn({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
		setTimeout(function() {	$("#message_box").fadeOut("show"); }, 4000);
	}
}

function showworning(msg){
	if(msg!=""){
		$("#message_text").html("<center><span style='color:red;'>"+msg+"</span></center>");
		$("#message_box").fadeIn({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
		setTimeout(function() {	$("#message_box").fadeOut("show"); }, 5000);
	}
}

</script>
{/literal}
<script type="text/javascript">
	showworning('{$warning_message}');
</script>

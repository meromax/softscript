<div class="centercol">
	<div class="title">
		<div class="title-left"><!--  --></div>
		<h2><p style="font-family:Verdana; padding-top:3px; font-size:23px; font-weight:normal; color:#ffffff;">Order Proccess</p></h2>
		<div class="title-right"><!--  --></div>
	</div>
	

	<div class="content laf">
	

		<form method="post" action="/registration/index/checkoutproccesscomplete" name="account_form">
         <div class="billing">
         
         	<img src="/images/personal-information.png" class="header-img" alt="Personal Information" />
            <div class="cleaner"><!-- --></div>
            
         	<label>First name:</label>
         	{$member->member_firstname|stripslashes}
         	<input type="hidden" name="member_firstname" id="member_firstname" value="{$member->member_firstname|stripslashes}" class="text-input" />
            <div class="cleaner"><!-- --></div>
            
            <label>Last name:</label>
            {$member->member_lastname|stripslashes}
         	<input type="hidden" id="member_lastname" name="member_lastname" value="{$member->member_lastname|stripslashes}"  class="text-input" />
            <div class="cleaner"><!-- --></div>
            
            <label>E-mail:</label>
            {$member->member_email|stripslashes}
         	<input type="hidden" name="member_email" id="member_reg_email" class="text-input" value="{$member->member_email|stripslashes}" style="width: 200px;" />
            <div class="cleaner"><!-- --></div>
                         
            <label>Phone:</label>
            {$member->member_phone|stripslashes}
         	<input type="hidden" name="member_phone" id="member_phone" value="{$member->member_phone|stripslashes}" class="text-input" maxlength="12" style="width: 160px;" />
            <div class="cleaner"><!-- --></div>
            
            
            <img src="/images/billing-information.png" class="header-img" alt="Billing Information" />
            <div class="cleaner"><!-- --></div>
            
         	<label>Credit card type:</label>
			<select class="class="text-input"" name="credit_card_type" id="credit_card_type">
				<option value="Visa" {if  $member->credit_card_type == 'Visa'} selected {/if}>Visa</option>
				<option value="MasterCard" {if  $member->credit_card_type == 'MasterCard'} selected {/if}>Mastercard</option>
				<option value="Amex" {if  $member->credit_card_type == 'Amex'} selected {/if}>American Express</option>
				<option value="Discover" {if  $member->credit_card_type == 'Discover'} selected {/if}>Discover</option>
			</select>
            <div class="cleaner"><!-- --></div>
            
            <label>Name on card:</label>
         	<input type="text" name="credit_card_name" id="credit_card_name" value="{$member->credit_card_name|stripslashes}" maxlength="36" class="text-input" style="width: 200px;" />
            <div class="cleaner"><!-- --></div>
            
            <label>Credit card number:</label>
         	<input type="text" name="credit_card_number" id="credit_card_number"  value="{$member->credit_card_number|stripslashes}" maxlength="16" class="text-input" style="width: 200px;" />
            <div class="cleaner"><!-- --></div>
            
            <label>Card security code:</label>
         	<input type="text" class="text-input" name="credit_card_code" maxlength="4" id="credit_card_code"  value="{$member->credit_card_code|stripslashes}" style="width: 200px;" />
            <div class="cleaner"><!-- --></div>
            
            <label>Exp date:</label>
            
			<select name="credit_card_exp_month" id="credit_card_exp_month" style="width:100px;">
				<option value=""   {if  $member->credit_card_exp_month == ''} selected {/if}>Month</option>
				<option value="01" {if  $member->credit_card_exp_month == '01'} selected {/if}>January</option>
				<option value="02" {if  $member->credit_card_exp_month == '02'} selected {/if}>February</option>
				<option value="03" {if  $member->credit_card_exp_month == '03'} selected {/if}>March</option>
				<option value="04" {if  $member->credit_card_exp_month == '04'} selected {/if}>April</option>
				<option value="05" {if  $member->credit_card_exp_month == '05'} selected {/if}>May</option>
				<option value="06" {if  $member->credit_card_exp_month == '06'} selected {/if}>June</option>
				<option value="07" {if  $member->credit_card_exp_month == '07'} selected {/if}>July</option>
				<option value="08" {if  $member->credit_card_exp_month == '08'} selected {/if}>August</option>
				<option value="09" {if  $member->credit_card_exp_month == '09'} selected {/if}>September</option>
				<option value="10" {if  $member->credit_card_exp_month == '10'} selected {/if}>October</option>
				<option value="11" {if  $member->credit_card_exp_month == '11'} selected {/if}>November</option>
				<option value="12" {if  $member->credit_card_exp_month == '12'} selected {/if}>December</option>
			</select>
            
			<select name="credit_card_exp_year" id="credit_card_exp_year" style="width:86px;">
			    <option value="">Year</option>
				<option value="2009" {if  $member->credit_card_exp_year == '2009'} selected {/if}>2009</option>
				<option value="2010" {if  $member->credit_card_exp_year == '2010'} selected {/if}>2010</option>
				<option value="2011" {if  $member->credit_card_exp_year == '2011'} selected {/if}>2011</option>
				<option value="2012" {if  $member->credit_card_exp_year == '2012'} selected {/if}>2012</option>
				<option value="2013" {if  $member->credit_card_exp_year == '2013'} selected {/if}>2013</option>
				<option value="2014" {if  $member->credit_card_exp_year == '2014'} selected {/if}>2014</option>
				<option value="2015" {if  $member->credit_card_exp_year == '2015'} selected {/if}>2015</option>
				<option value="2016" {if  $member->credit_card_exp_year == '2016'} selected {/if}>2016</option>
				<option value="2017" {if  $member->credit_card_exp_year == '2017'} selected {/if}>2017</option>
				<option value="2018" {if  $member->credit_card_exp_year == '2018'} selected {/if}>2018</option>
				<option value="2019" {if  $member->credit_card_exp_year == '2019'} selected {/if}>2019</option>
				<option value="2020" {if  $member->credit_card_exp_year == '2020'} selected {/if}>2020</option>
			</select>
            
            <div class="cleaner"><!-- --></div>
            
            <label>Address:</label>
         	<input type="text" class="text-input" name="billing_address" id="billing_address"   value="{$member->billing_address|stripslashes}" style="width: 300px;" />
            <div class="cleaner"><!-- --></div>
            
            <input name="billing_country" id="billing_country" value="US" type="hidden">
            
            <label>City:</label>
         	<input type="text" class="text-input"  name="billing_city" id="billing_city"  value="{$member->billing_city|stripslashes}" style="width: 160px;" />
            <div class="cleaner"><!-- --></div>
            
            <label>State:</label>
         	
			<select class="text-input" name="billing_state" id="billing_state">
			 
			<option value="" selected> ---------- </option> 
			
			<option value="AL" {if $member->billing_state=="AL"} selected {/if}>Alabama</option> 
			
			<option value="AK" {if $member->billing_state=="AK"} selected {/if}>Alaska</option> 
			
			<option value="AZ" {if $member->billing_state=="AZ"} selected {/if}>Arizona</option> 
			
			<option value="AR" {if $member->billing_state=="AR"} selected {/if}>Arkansas</option> 
			
			<option value="CA" {if $member->billing_state=="CA"} selected {/if}>California</option> 
			
			<option value="CO" {if $member->billing_state=="CO"} selected {/if}>Colorado</option> 
			
			<option value="CT" {if $member->billing_state=="CT"} selected {/if}>Connecticut</option> 
			
			<option value="DE" {if $member->billing_state=="DE"} selected {/if}>Delaware</option> 
			
			<option value="DC" {if $member->billing_state=="DC"} selected {/if}>District Of Columbia</option> 
			
			<option value="FL" {if $member->billing_state=="FL"} selected {/if}>Florida</option> 
			
			<option value="GA" {if $member->billing_state=="GA"} selected {/if}>Georgia</option> 
			
			<option value="HI" {if $member->billing_state=="HI"} selected {/if}>Hawaii</option> 
			
			<option value="ID" {if $member->billing_state=="ID"} selected {/if}>Idaho</option> 
			
			<option value="IL" {if $member->billing_state=="IL"} selected {/if}>Illinois</option> 
			
			<option value="IN" {if $member->billing_state=="IN"} selected {/if}>Indiana</option> 
			
			<option value="IA" {if $member->billing_state=="IA"} selected {/if}>Iowa</option> 
			
			<option value="KS" {if $member->billing_state=="KS"} selected {/if}>Kansas</option> 
			
			<option value="KY" {if $member->billing_state=="KY"} selected {/if}>Kentucky</option> 
			
			<option value="LA" {if $member->billing_state=="LA"} selected {/if}>Louisiana</option> 
			
			<option value="ME" {if $member->billing_state=="ME"} selected {/if}>Maine</option> 
			
			<option value="MD" {if $member->billing_state=="MD"} selected {/if}>Maryland</option> 
			
			<option value="MA" {if $member->billing_state=="MA"} selected {/if}>Massachusetts</option> 
			
			<option value="MI" {if $member->billing_state=="MI"} selected {/if}>Michigan</option> 
			
			<option value="MN" {if $member->billing_state=="MN"} selected {/if}>Minnesota</option> 
			
			<option value="MS" {if $member->billing_state=="MS"} selected {/if}>Mississippi</option> 
			
			<option value="MO" {if $member->billing_state=="MO"} selected {/if}>Missouri</option> 
			
			<option value="MT" {if $member->billing_state=="MT"} selected {/if}>Montana</option> 
			
			<option value="NE" {if $member->billing_state=="NE"} selected {/if}>Nebraska</option> 
			
			<option value="NV" {if $member->billing_state=="NV"} selected {/if}>Nevada</option> 
			
			<option value="NH" {if $member->billing_state=="NH"} selected {/if}>New Hampshire</option> 
			
			<option value="NJ" {if $member->billing_state=="NJ"} selected {/if}>New Jersey</option> 
			
			<option value="NM" {if $member->billing_state=="NM"} selected {/if}>New Mexico</option> 
			
			<option value="NY" {if $member->billing_state=="NY"} selected {/if}>New York</option> 
			
			<option value="NC" {if $member->billing_state=="NC"} selected {/if}>North Carolina</option> 
			
			<option value="ND" {if $member->billing_state=="ND"} selected {/if}>North Dakota</option> 
			
			<option value="OH" {if $member->billing_state=="OH"} selected {/if}>Ohio</option> 
			
			<option value="OK" {if $member->billing_state=="OK"} selected {/if}>Oklahoma</option> 
			
			<option value="OR" {if $member->billing_state=="OR"} selected {/if}>Oregon</option> 
			
			<option value="PA" {if $member->billing_state=="PA"} selected {/if}>Pennsylvania</option> 
			
			<option value="RI" {if $member->billing_state=="RI"} selected {/if}>Rhode Island</option> 
			
			<option value="SC" {if $member->billing_state=="SC"} selected {/if}>South Carolina</option> 
			
			<option value="SD" {if $member->billing_state=="SD"} selected {/if}>South Dakota</option> 
			
			<option value="TN" {if $member->billing_state=="TN"} selected {/if}>Tennessee</option> 
			
			<option value="TX" {if $member->billing_state=="TX"} selected {/if}>Texas</option> 
			
			<option value="UT" {if $member->billing_state=="UT"} selected {/if}>Utah</option> 
			
			<option value="VT" {if $member->billing_state=="VT"} selected {/if}>Vermont</option> 
			
			<option value="VA" {if $member->billing_state=="VA"} selected {/if}>Virginia</option> 
			
			<option value="WA" {if $member->billing_state=="WA"} selected {/if}>Washington</option> 
			
			<option value="WV" {if $member->billing_state=="WV"} selected {/if}>West Virginia</option> 
			
			<option value="WI" {if $member->billing_state=="WI"} selected {/if}>Wisconsin</option> 
			
			<option value="WY" {if $member->billing_state=="WY"} selected {/if}>Wyoming</option>
			
			</select>
            
            <div class="cleaner"><!-- --></div>
            
            <label>Postal code:</label>
         	<input type="text" class="text-input" name="billing_zip" id="billing_zip"  value="{$member->billing_zip|stripslashes}" maxlength="6" style="width: 160px;" />
            <div class="cleaner"><!-- --></div>
            
            
            <img src="/images/shipping-information.png" class="header-img" alt="Billing Information" />
            <div class="cleaner"><!-- --></div>
            
            <label>Address:</label>
         	<input type="text" class="text-input" name="shipping_address" id="shipping_address"  value="{$member->member_address|stripslashes}" style="width: 300px;" />
            <div class="cleaner"><!-- --></div>
            
            <input name="shipping_country" id="shipping_country" value="US" type="hidden">
            
            <label>City:</label>
         	<input type="text" class="text-input"  name="shipping_city" id="shipping_city" value="{$member->member_city|stripslashes}" style="width: 160px;" />
            <div class="cleaner"><!-- --></div>
            
            <label>State:</label>
         	
			<select class="text-input" name="shipping_state" id="shipping_state">
			 
			<option value=""> ---------- </option> 
			
			<option value="AL" {if $member->member_state=="AL"} selected {/if}>Alabama</option> 
			
			<option value="AK" {if $member->member_state=="AK"} selected {/if}>Alaska</option> 
			
			<option value="AZ" {if $member->member_state=="AZ"} selected {/if}>Arizona</option> 
			
			<option value="AR" {if $member->member_state=="AR"} selected {/if}>Arkansas</option> 
			
			<option value="CA" {if $member->member_state=="CA"} selected {/if}>California</option> 
			
			<option value="CO" {if $member->member_state=="CO"} selected {/if}>Colorado</option> 
			
			<option value="CT" {if $member->member_state=="CT"} selected {/if}>Connecticut</option> 
			
			<option value="DE" {if $member->member_state=="DE"} selected {/if}>Delaware</option> 
			
			<option value="DC" {if $member->member_state=="DC"} selected {/if}>District Of Columbia</option> 
			
			<option value="FL" {if $member->member_state=="FL"} selected {/if}>Florida</option> 
			
			<option value="GA" {if $member->member_state=="GA"} selected {/if}>Georgia</option> 
			
			<option value="HI" {if $member->member_state=="HI"} selected {/if}>Hawaii</option> 
			
			<option value="ID" {if $member->member_state=="ID"} selected {/if}>Idaho</option> 
			
			<option value="IL" {if $member->member_state=="IL"} selected {/if}>Illinois</option> 
			
			<option value="IN" {if $member->member_state=="IN"} selected {/if}>Indiana</option> 
			
			<option value="IA" {if $member->member_state=="IA"} selected {/if}>Iowa</option> 
			
			<option value="KS" {if $member->member_state=="KS"} selected {/if}>Kansas</option> 
			
			<option value="KY" {if $member->member_state=="KY"} selected {/if}>Kentucky</option> 
			
			<option value="LA" {if $member->member_state=="LA"} selected {/if}>Louisiana</option> 
			
			<option value="ME" {if $member->member_state=="ME"} selected {/if}>Maine</option> 
			
			<option value="MD" {if $member->member_state=="MD"} selected {/if}>Maryland</option> 
			
			<option value="MA" {if $member->member_state=="MA"} selected {/if}>Massachusetts</option> 
			
			<option value="MI" {if $member->member_state=="MI"} selected {/if}>Michigan</option> 
			
			<option value="MN" {if $member->member_state=="MN"} selected {/if}>Minnesota</option> 
			
			<option value="MS" {if $member->member_state=="MS"} selected {/if}>Mississippi</option> 
			
			<option value="MO" {if $member->member_state=="MO"} selected {/if}>Missouri</option> 
			
			<option value="MT" {if $member->member_state=="MT"} selected {/if}>Montana</option> 
			
			<option value="NE" {if $member->member_state=="NE"} selected {/if}>Nebraska</option> 
			
			<option value="NV" {if $member->member_state=="NV"} selected {/if}>Nevada</option> 
			
			<option value="NH" {if $member->member_state=="NH"} selected {/if}>New Hampshire</option> 
			
			<option value="NJ" {if $member->member_state=="NJ"} selected {/if}>New Jersey</option> 
			
			<option value="NM" {if $member->member_state=="NM"} selected {/if}>New Mexico</option> 
			
			<option value="NY" {if $member->member_state=="NY"} selected {/if}>New York</option> 
			
			<option value="NC" {if $member->member_state=="NC"} selected {/if}>North Carolina</option> 
			
			<option value="ND" {if $member->member_state=="ND"} selected {/if}>North Dakota</option> 
			
			<option value="OH" {if $member->member_state=="OH"} selected {/if}>Ohio</option> 
			
			<option value="OK" {if $member->member_state=="OK"} selected {/if}>Oklahoma</option> 
			
			<option value="OR" {if $member->member_state=="OR"} selected {/if}>Oregon</option> 
			
			<option value="PA" {if $member->member_state=="PA"} selected {/if}>Pennsylvania</option> 
			
			<option value="RI" {if $member->member_state=="RI"} selected {/if}>Rhode Island</option> 
			
			<option value="SC" {if $member->member_state=="SC"} selected {/if}>South Carolina</option> 
			
			<option value="SD" {if $member->member_state=="SD"} selected {/if}>South Dakota</option> 
			
			<option value="TN" {if $member->member_state=="TN"} selected {/if}>Tennessee</option> 
			
			<option value="TX" {if $member->member_state=="TX"} selected {/if}>Texas</option> 
			
			<option value="UT" {if $member->member_state=="UT"} selected {/if}>Utah</option> 
			
			<option value="VT" {if $member->member_state=="VT"} selected {/if}>Vermont</option> 
			
			<option value="VA" {if $member->member_state=="VA"} selected {/if}>Virginia</option> 
			
			<option value="WA" {if $member->member_state=="WA"} selected {/if}>Washington</option> 
			
			<option value="WV" {if $member->member_state=="WV"} selected {/if}>West Virginia</option> 
			
			<option value="WI" {if $member->member_state=="WI"} selected {/if}>Wisconsin</option> 
			
			<option value="WY" {if $member->member_state=="WY"} selected {/if}>Wyoming</option>
			
			</select>
            
            <div class="cleaner"><!-- --></div>
            
            <label>Postal code:</label>
         	<input type="text" class="text-input" name="shipping_zip" id="shipping_zip"  value="{$member->member_zip|stripslashes}" maxlength="6" style="width: 160px;" />
            <div class="cleaner"><!-- --></div>
            
            <div style="padding: 5px 0 10px 150px;">
            	{if $member->billing_zip==$member->member_zip&&$member->billing_state==$member->member_state&&$member->billing_city==$member->member_city&&$member->billing_address==$member->member_address}
            		<input type="checkbox" name="same_as_billing" id="same_as_billing" checked onclick="fillOutShippingFields();" /> <strong>My shipping address is the same as billing</strong>
            	{else}
            		<input type="checkbox" name="same_as_billing" id="same_as_billing" onclick="fillOutShippingFields();" /> <strong>My shipping address is the same as billing</strong>
            	{/if}
            </div>
            
            <div style="padding: 15px 0 50px 150px; text-align:left;">
            	<div class="button-line" style="margin:0px 0px 0px 0px;">
            		<input type="hidden" name="checkout" value="1" />
	            	<input class="continuecheckout" type="button" value="" style="width:145px;" onclick="checkUpdateForm();" />
	                <input class="fcancel" type="button" value="" onclick="javascript:document.location.href='/cart.html'" />
	                <input type="hidden" id="amount" name="amount" value="{$subtotal}" />
                </div>
            </div>
            
         </div>
		</form>
	</div>
	<div class="content-bottom"></div>
</div>

<div id="message_box2" style="position:absolute; margin-left:495px; margin-top:100px; color:#000000; background:#ffffff; width:240px; display:none; border:1px solid #D1E0FF; background:#ECF0FB; z-index:1000;">
	<div style="height:20px;  width:100%; height:30px; background:#ECF0FB;  position:relative; ">
		<table width="100%" height="100%">
		<tr>
			<td style="font-weight:bold; color:#7E8892; padding:3px 3px 3px 3px; font-size:14px;" align="left" valign="middle"><div id="titleBox">The Message Box</div></td>
		</tr>
		</table>
	</div>
	<div align="left" id="message_text2" style="text-decoration:none; padding:3px 3px 3px 3px; background:#ffffff;  position:relative; ">
		{if $msg!=""}{$msg}{/if}
	</div>
</div>
<div id="progress1" style=" margin-left:495px; margin-top:587px; position:absolute; background:#ECF0FB; text-align:center; display:none; border:6px solid #D1E0FF;  z-index:1001;">
	<div style="background:#ffffff; padding:2px 10px 2px 10px;">
		<img src="/js/cropper/progress.gif" /><br />Loading...
	</div>
</div>
<div id="message_box" style="position:absolute; margin-left:495px; margin-top:537px; color:#000000; background:#ffffff; width:240px; display:none; border:1px solid #D1E0FF; background:#ECF0FB; z-index:1000;">
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
{if isset($mess)}
{literal}
	<script type="text/javascript">
	
		var	msg = "- <span style='padding:3px 3px 3px 3px; color:green; font-size:12px;'>The data were successfully saved!</span>";
		$("#message_text").html(msg);
		$("#message_box").fadeIn({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
		
		setTimeout(function(){
		
			$("#message_box").fadeOut("slow");
		}, 
		2000);
	
	</script>
{/literal}
{/if}

{literal}

<script type="text/javascript">

	
	var	shipping_address = document.getElementById('shipping_address').value;
	var shipping_country = document.getElementById('shipping_country').value;
	var shipping_city    = document.getElementById('shipping_city').value;
	var shipping_state   = document.getElementById('shipping_state').value;
	var shipping_zip     = document.getElementById('shipping_zip').value;

	function SetCheckButtonPress(){
		document.getElementById("check_button_press").value=1;
	}
	
	function fillOutShippingFields(){
		
		var check = document.getElementById('same_as_billing').checked;
		
		var objSel = document.getElementById("shipping_state");
		
		if(check==true){
			document.getElementById('shipping_address').value = document.getElementById('billing_address').value;
			document.getElementById('shipping_country').value = document.getElementById('billing_country').value;
			document.getElementById('shipping_city').value    =	document.getElementById('billing_city').value;
			
			
			for(var i=0; i<objSel.options.length; i++){
				if(objSel.options[i].value==document.getElementById('billing_state').value){
					objSel.options[i].selected = true;
				}
			}
			

			document.getElementById('shipping_zip').value   = document.getElementById('billing_zip').value;
		} else {  
			document.getElementById('shipping_address').value = shipping_address;
			document.getElementById('shipping_country').value = shipping_country;
			document.getElementById('shipping_city').value    = shipping_city;
			
			for(var i=0; i<objSel.options.length; i++){
				if(objSel.options[i].value==shipping_state){
					objSel.options[i].selected = true;
				}
			}
			
			document.getElementById('shipping_zip').value   = shipping_zip;
		}
	}

	function getStatesByCountryId(){
		
		var country_id = document.getElementById("country").value;
		//alert(country_id);
		var url = "country="+country_id;
	
		$.ajax({
		type: "POST",
		url: "/registration/index/getstatesbycountryid",
		data: url,
		success: function(msg){
			//alert(msg);
			if(msg!=0){
				$("#states_container").html(msg).fadeIn('slow');
			} else {
				$("#states_container").html("-- none --").fadeIn('slow');
			}
		}
		});
	}


function checkUpdateForm(){
	var msg='';
	var zip_us           = /^\d{5}$|^\d{5}-\d{4}$/;
	var number           = /^[0-9]{1,}$/;
	var mail             = /^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
	
	var ccnum     = /^\d{13}$|^\d{14}|^\d{15}|^\d{16}$/;
	var csc       = /^\d{3}$|^\d{4}$/;

	
	var member_firstname      = document.getElementById('member_firstname');
	var member_lastname       = document.getElementById('member_lastname');
	var member_email          = document.getElementById('member_reg_email');
	var member_phone          = document.getElementById('member_phone');
	
	var credit_card_type      = document.getElementById('credit_card_type');
	var credit_card_name      = document.getElementById('credit_card_name');
	var credit_card_number    = document.getElementById('credit_card_number');
	var credit_card_code      = document.getElementById('credit_card_code');
	var credit_card_exp_month = document.getElementById('credit_card_exp_month');
	var credit_card_exp_year  = document.getElementById('credit_card_exp_year');
	
	
	var billing_address       = document.getElementById('billing_address');
	var billing_country       = document.getElementById('billing_country');
	var billing_city          = document.getElementById('billing_city');
	var billing_state         = document.getElementById('billing_state');
	var billing_zip           = document.getElementById('billing_zip');
	
	
	var shipping_address       = document.getElementById('shipping_address');
	var shipping_country       = document.getElementById('shipping_country');
	var shipping_city          = document.getElementById('shipping_city');
	var shipping_state         = document.getElementById('shipping_state');
	var shipping_zip           = document.getElementById('shipping_zip');
	
    $("#message_box").fadeOut({"opacity": "show" }, { "duration": "slow", "easing": "easein" });      
    
	if(navigator.userAgent.indexOf("MSIE 6.0")!=-1){
		$("#message_box").css('margin-left','-480px');
	}   

	if(credit_card_name.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Name on card'.</span><br />";
	}
	
	
	if(credit_card_number.value==''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Credit card number'.</span><br />";
	} else if(credit_card_number.value.match(ccnum)==null){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter a valid 'Credit card number'.</span><br />";
	}
	
	if(credit_card_code.value==''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Card security code'.</span><br />";
	} else if(credit_card_code.value.match(csc)==null){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter a valid 'Card security code'.</span><br />";
	}
	
	
	if(credit_card_exp_month.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please choose 'Exp Month'.</span><br />";
	}
	
	if(credit_card_exp_year.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please choose 'Exp Year'.</span><br />";
	}
	
	
	if(billing_address.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Billing Address'.</span><br />";
	}
	
	if(billing_city.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Billing City'.</span><br />";
	}
	
	if(billing_state.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please choose 'Billing State'.</span><br />";
	}
	
	if(billing_zip.value==''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Billing Postal code'.</span><br />";
	} else if(billing_zip.value.match(zip_us)==null){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter a valid 'Billing Postal code'.</span><br />";
	}
	
	
	if(shipping_address.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Shipping Address'.</span><br />";
	}
	
	if(shipping_city.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Shipping City'.</span><br />";
	}
	
	if(shipping_state.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please choose 'Shipping State'.</span><br />";
	}
	
	if(shipping_zip.value==''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Shipping Postal code'.</span><br />";
	} else if(shipping_zip.value.match(zip_us)==null){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter a valid 'Shipping Postal code'.</span><br />";
	}
	
	
	if(msg==''){
		//alert("Asd1");
		$("#message_box").fadeOut({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
		
		$("#progress1").fadeIn({"opacity": "show" }, { "duration": "slow", "easing": "easein" });

		var url = "credit_card_number="+credit_card_number.value+
		 "&credit_card_code="+credit_card_code.value+
		 "&credit_card_exp_date="+credit_card_exp_month.value+credit_card_exp_year.value.substring(2, 4)+
		 "&firstname="+member_firstname.value+
		 "&lastname="+member_lastname.value+
		 "&address="+billing_address.value+
		 "&city="+billing_city.value+
		 "&state="+billing_state.value+
		 "&zip="+billing_zip.value+
		 "&email="+member_email.value+
		 "&phone="+member_phone.value+
		 "&amount="+amount.value; 
		 
		$.ajax({
		type: "POST",
		url: "/registration/index/checkpayment",
		data: url,
		success: function(msg){
			$("#progress1").hide();
			
			//alert(msg);
		
			if(msg!=1){
				//alert("!=1");
				//msg = "- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>"+msg+"</span>";	
				msg = "- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Incorrect Credit Cart Number or Code or expiration date!</span>";
				$("#message_text").html(msg);
				$("#message_box").fadeIn({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
			} else {
				msg = "- <span style='padding:3px 3px 3px 3px; color:green; font-size:12px;'>The transaction is completed!</span>";	
				$("#message_text").html(msg);
				$("#message_box").fadeIn({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
				document.forms.account_form.submit();
			}
		}
		});
		
		

	} else {
		//alert("Asd");
		$("#message_text").html(msg);
		$("#message_box").fadeIn({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
	}
	
	
}

</script>
{/literal}

<div class="centercol">
	<div class="title">
		<div class="title-left"><!--  --></div>
		<h2><p style="font-family:Verdana; padding-top:3px; font-size:23px; font-weight:normal; color:#ffffff;">Registration</p></h2>
		<div class="title-right"><!--  --></div>
	</div>
	

	<div class="content laf">
	

		<form method="post" action="/registration/index/registration" name="billing_form">
         <div class="billing">
         
         	<img src="/images/personal-information.png" class="header-img" alt="Personal Information" />
            <div class="cleaner"><!-- --></div>
            
         	<label>First name: <span>*</span></label>
         	<input type="text" name="member_firstname" id="member_firstname" class="text-input" />
            <div class="cleaner"><!-- --></div>
            
            <label>Last name: <span>*</span></label>
         	<input type="text" id="member_lastname" name="member_lastname"  class="text-input" />
            <div class="cleaner"><!-- --></div>
            
            <label>E-mail: <span>*</span></label>
         	<input type="text" name="member_email" id="member_reg_email" class="text-input" style="width: 200px;" />
            <div class="cleaner"><!-- --></div>
            
            <label>Password: <span>*</span></label>
         	<input type="password" name="member_password" id="member_reg_password" class="text-input" style="width: 160px;" />
            <div class="cleaner"><!-- --></div>
            
            <label>Password again: <span>*</span></label>
         	<input type="password" name="member_re_password" id="member_reg_re_password" class="text-input" style="width: 160px;" />
            <div class="cleaner"><!-- --></div>
            
                        
            <label>Phone: <span>*</span></label>
         	<input type="text" name="member_phone" id="member_phone" class="text-input" maxlength="12" style="width: 160px;" />
            <div class="cleaner"><!-- --></div>
            
            
            <img src="/images/billing-information.png" class="header-img" alt="Billing Information" />
            <div class="cleaner"><!-- --></div>
            
         	<label>Credit card type: <span>*</span></label>
			<select class="class="text-input"" name="credit_card_type" id="credit_card_type">
				<option value="Visa">Visa</option>
				<option value="MasterCard">Mastercard</option>
				<option value="Amex">American Express</option>
				<option value="Discover">Discover</option>
			</select>
            <div class="cleaner"><!-- --></div>
            
            <label>Name on card: <span>*</span></label>
         	<input type="text" name="credit_card_name" id="credit_card_name" class="text-input" style="width: 200px;" />
            <div class="cleaner"><!-- --></div>
            
            <label>Credit card number: <span>*</span></label>
         	<input type="text" name="credit_card_number" id="credit_card_number" maxlength="16" class="text-input" style="width: 200px;" />
            <div class="cleaner"><!-- --></div>
            
            <label>Card security code: <span>*</span></label>
         	<input type="text" class="text-input" name="credit_card_code" maxlength="4" id="credit_card_code" style="width: 200px;" />
            <div class="cleaner"><!-- --></div>
            
            <label>Exp date:</label>
            
			<select name="credit_card_exp_month" id="credit_card_exp_month" style="width:100px;">
				<option value="">Month</option>
				<option value="01">January</option>
				<option value="02">February</option>
				<option value="03">March</option>
				<option value="04">April</option>
				<option value="05">May</option>
				<option value="06">June</option>
				<option value="07">July</option>
				<option value="09">August</option>
				<option value="10">September</option>
				<option value="11">October</option>
				<option value="12">December</option>
			</select>
            
			<select name="credit_card_exp_year" id="credit_card_exp_year" style="width:86px;">
			    <option value="">Year</option>
				<option value="2009">2009</option>
				<option value="2010">2010</option>
				<option value="2011">2011</option>
				<option value="2012">2012</option>
				<option value="2013">2013</option>
				<option value="2014">2014</option>
				<option value="2015">2015</option>
				<option value="2016">2016</option>
				<option value="2017">2017</option>
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				<option value="2020">2020</option>
			</select>
            
            <div class="cleaner"><!-- --></div>
            
            <label>Address: <span>*</span></label>
         	<input type="text" class="text-input" name="billing_address" id="billing_address" style="width: 300px;" />
            <div class="cleaner"><!-- --></div>
            
            <input name="billing_country" id="billing_country" value="US" type="hidden">
            
            <label>City: <span>*</span></label>
         	<input type="text" class="text-input"  name="billing_city" id="billing_city" style="width: 160px;" />
            <div class="cleaner"><!-- --></div>
            
            <label>State: <span>*</span></label>
         	
			<select class="text-input" name="billing_state" id="billing_state">
			 
			<option value="" selected> ---------- </option> 
			
			<option value="AL" {if $member_state=="AL"} selected {/if}>Alabama</option> 
			
			<option value="AK" {if $member_state=="AK"} selected {/if}>Alaska</option> 
			
			<option value="AZ" {if $member_state=="AZ"} selected {/if}>Arizona</option> 
			
			<option value="AR" {if $member_state=="AR"} selected {/if}>Arkansas</option> 
			
			<option value="CA" {if $member_state=="CA"} selected {/if} selected>California</option> 
			
			<option value="CO" {if $member_state=="CO"} selected {/if}>Colorado</option> 
			
			<option value="CT" {if $member_state=="CT"} selected {/if}>Connecticut</option> 
			
			<option value="DE" {if $member_state=="DE"} selected {/if}>Delaware</option> 
			
			<option value="DC" {if $member_state=="DC"} selected {/if}>District Of Columbia</option> 
			
			<option value="FL" {if $member_state=="FL"} selected {/if}>Florida</option> 
			
			<option value="GA">Georgia</option> 
			
			<option value="HI">Hawaii</option> 
			
			<option value="ID">Idaho</option> 
			
			<option value="IL">Illinois</option> 
			
			<option value="IN">Indiana</option> 
			
			<option value="IA">Iowa</option> 
			
			<option value="KS">Kansas</option> 
			
			<option value="KY">Kentucky</option> 
			
			<option value="LA">Louisiana</option> 
			
			<option value="ME">Maine</option> 
			
			<option value="MD">Maryland</option> 
			
			<option value="MA">Massachusetts</option> 
			
			<option value="MI">Michigan</option> 
			
			<option value="MN">Minnesota</option> 
			
			<option value="MS">Mississippi</option> 
			
			<option value="MO">Missouri</option> 
			
			<option value="MT">Montana</option> 
			
			<option value="NE">Nebraska</option> 
			
			<option value="NV">Nevada</option> 
			
			<option value="NH">New Hampshire</option> 
			
			<option value="NJ">New Jersey</option> 
			
			<option value="NM">New Mexico</option> 
			
			<option value="NY">New York</option> 
			
			<option value="NC">North Carolina</option> 
			
			<option value="ND">North Dakota</option> 
			
			<option value="OH">Ohio</option> 
			
			<option value="OK">Oklahoma</option> 
			
			<option value="OR">Oregon</option> 
			
			<option value="PA">Pennsylvania</option> 
			
			<option value="RI">Rhode Island</option> 
			
			<option value="SC">South Carolina</option> 
			
			<option value="SD">South Dakota</option> 
			
			<option value="TN">Tennessee</option> 
			
			<option value="TX">Texas</option> 
			
			<option value="UT">Utah</option> 
			
			<option value="VT">Vermont</option> 
			
			<option value="VA">Virginia</option> 
			
			<option value="WA">Washington</option> 
			
			<option value="WV">West Virginia</option> 
			
			<option value="WI">Wisconsin</option> 
			
			<option value="WY">Wyoming</option>
			
			</select>
            
            <div class="cleaner"><!-- --></div>
            
            <label>Postal code: <span>*</span></label>
         	<input type="text" class="text-input" name="billing_zip" id="billing_zip" maxlength="6" style="width: 160px;" />
            <div class="cleaner"><!-- --></div>
            
            <div style="padding: 5px 0 10px 150px;">
            	<input type="checkbox" name="same_as_billing" id="same_as_billing" /> <strong>My shipping address is the same as billing</strong>
            </div>
            
            <div style="padding-left: 150px; padding-bottom: 15px;">
            	<input type="checkbox" name="agreement" id="agreement" /> Agree to terms <span style="color: #df0a07;">*</span>
            </div>
            
            <span style="color: #df0a07; font-size: 11px; padding-left: 150px;">All fields marked with an asterisk (*) are required</span>
            <div style="padding: 15px 0 50px 150px; text-align:left;">
            	<div class="button-line" style="margin:0px 0px 0px 0px;">
	            	<input class="submitb" type="button" value="" onclick="checkRegForm();" />
	                <input class="fcancel" type="button" value="" onclick="javascript:document.location.href='/cart.html'" />
                </div>
            </div>
            
         </div>
		</form>
	</div>
	<div class="content-bottom"></div>
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



{literal}
<script type="text/javascript">

	function SetCheckButtonPress(){
		document.getElementById("check_button_press").value=1;
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


function checkRegForm(){
	var msg='';
	var zip_us           = /^\d{5}$|^\d{5}-\d{4}$/;
	var number           = /^[0-9]{1,}$/;
	var mail             = /^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
	
	var ccnum     = /^\d{14}$|^\d{16}$/;
	var csc       = /^\d{3}$|^\d{4}$/;

	
	var member_firstname      = document.getElementById('member_firstname');
	var member_lastname       = document.getElementById('member_lastname');
	var member_email          = document.getElementById('member_reg_email');
	var member_password       = document.getElementById('member_reg_password');
	var member_re_password    = document.getElementById('member_reg_re_password');
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
	
	var agreement             = document.getElementById('agreement');

    $("#message_box").fadeOut({"opacity": "show" }, { "duration": "slow", "easing": "easein" });        

	if(member_firstname.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'First name'.</span><br />";
	}
	
	if(member_lastname.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Last name'.</span><br />";
	}
	
	if(member_email.value==''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'E-mail'.</span><br />";
	} else if(member_email.value.match(mail)==null){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter a valid 'E-mail'.</span><br />";
	}
	
	
	if(member_password.value == ''&&member_re_password.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Password'.</span><br />";
	} else if(member_password.value!=member_re_password.value){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>'Paswords' doesn't match.</span><br />";
	}  else if(member_password.value==member_re_password.value && member_password.value.length<6){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>'Password' should be more than 6 digits.</span><br />";
	}
	
	
	if(member_phone.value==''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Phone'.</span><br />";
	} else if(member_phone.value.match(number)==null){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter a valid 'Phone'.</span><br />";
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
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Address'.</span><br />";
	}
	
	if(billing_city.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'City'.</span><br />";
	}
	
	if(billing_state.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please choose 'State'.</span><br />";
	}
	
	if(billing_zip.value==''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter 'Postal code'.</span><br />";
	} else if(billing_zip.value.match(zip_us)==null){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter a valid 'Postal code'.</span><br />";
	}
	
	if(agreement.checked==false){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please agree to the terms and conditions.</span><br />";
	}
	
	if(msg==''){
		$("#message_box").fadeOut({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
		document.forms.billing_form.submit();
	} else {
		$("#message_text").html(msg);
		$("#message_box").fadeIn({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
	}
	
	
}

</script>
{/literal}
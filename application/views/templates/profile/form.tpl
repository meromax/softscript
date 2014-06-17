<form action="/getintouchsend.html" method="post" name="getintouchsendform">
<div class="fp-txt">
	<div class="ftitle">Your Name:</div>
	<div class="itxt"><input type="text" id="name" name="name" style="width:340px;" /></div>
	
	<div class="cleaner"><!--  --></div>
	
	<div class="ftitle">Your Email:</div>
	<div class="itxt"><input type="text" id="getintouch_email" name="email" style="width:340px;" /></div>

	<div class="cleaner"><!--  --></div>
	<div class="ftitle">Inguiry Type:</div>
	<div>
		<table>
		<tr>
			<td>
				<table>
				<tr>
					<td width="10" align="left"><input type="radio" name="inquiry_type" value="Order Inquiry" align="absmiddle" checked /></td><td align="left">Order Inquiry</td>
				</tr>
				<tr>
					<td width="10" align="left"><input type="radio" name="inquiry_type" value="Order Change" align="absmiddle" /></td><td align="left">Order Change</td>
				</tr>
				<tr>
					<td width="10" align="left"><input type="radio" name="inquiry_type" value="Verdon Inquiry" align="absmiddle" /></td><td align="left">Verdon Inquiry</td>
				</tr>
				</table>
			</td>
			
			<td width="50">&nbsp;</td>
						
			<td>
				<table>
				<tr>
					<td width="10" align="left"><input type="radio" name="inquiry_type" value="PetIDMe Pals Question" align="absmiddle" /></td><td align="left">PetIDMe Pals Question</td>
				</tr>
				<tr>
					<td width="10" align="left"><input type="radio" name="inquiry_type" value="General Comment" align="absmiddle" /></td><td align="left">General Comment</td>
				</tr>
				<tr>
					<td width="10" align="left"><input type="radio" name="inquiry_type" value="Other" align="absmiddle" /></td><td align="left">Other</td>
				</tr>
				</table>
			</td>
		</tr>
		</table>
	</div>
	
	<div class="cleaner"><!--  --></div>
	
	<div class="cleaner"><!--  --></div>
	
	<div class="ftitle">Order Number:</div>
	<div class="itxt"><input type="text" id="order_number" name="order_number" style="width:340px;" /></div>

	<div class="cleaner"><!--  --></div>
	
	<div class="ftitle">Your Message:</div>
	
	<div class="textarea w350">
		<div class="ta-bg">
			<div class="ta-top"><!--  --></div>
			<textarea id="message" name="message"></textarea>
			<div class="ta-bot"><!--  --></div>
		</div>
	</div>

	<div class="cleaner"><!--  --></div>
	
	<div class="button-line">
		<input type="button" class="submitb" value="" onclick="checkBeforeGetInTouchSend(); return false;" />
		<input type="button" class="fcancel" value="" onclick="javascript:document.location.href='/'" />
	
	</div>

	
	<center>
		<div id="message_box" style="left:20px; color:#000000; top:220px; background:#ffffff; width:240px; display:none; border:1px solid #26363D; background:#26363D;">
			<div style="height:20px;  width:100%; height:30px; background:#26363D;  position:relative; ">
				<table width="100%" height="100%">
				<tr>
					<td style="font-weight:bold; color:#ffffff; padding:3px 3px 3px 3px; font-size:14px;" align="left" valign="middle"><div id="titleBox">The Message Box</div></td>
				</tr>
				</table>
			</div>
			<div align="left" id="message_text" style="text-decoration:none; padding:3px 3px 3px 3px; background:#ffffff;  position:relative; ">
				{if $msg!=""}{$msg}{/if}
			</div>
		</div>
	</center>
</div>
</form>
{if $msg!=""}
	{literal}
		<script type="text/javascript">
			$("#titleBox").hide("fast");
			$("#message_box").show({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
			$("#titleBox").show({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
		</script>
	{/literal}
{/if}
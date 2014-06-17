<script type="text/javascript">
var domain_free = {$frontendLangParams.DOMAIN_FREE};
var domain_not_free = {$frontendLangParams.DOMAIN_IS_NOT_FREE};
var domain_input_check = {$frontendLangParams.DOMAIN_INPUT_CHECK};
var domain = '{$settings.domain|stripslashes|strip_tags}';
var fields_should_filled = '{$settings.fields_should_filled|stripslashes|strip_tags}';

</script>
<div class="header_txt3">{$settings.ordering|stripslashes|strip_tags}</div>
<div class="content_container">
<div class="content_block">
	<form action="/order/index/precomplete" method="post" name="order_form">
	<div class="content_title">
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td width="40%">
			{$item.design_title|stripslashes|strip_tags}<br />
			<img src="/images/design/{$item.design_image}_original.jpg" width="100%" border="0" />
			<span class="content_text" style="text-align:justify;">{$item.design_description|stripslashes}</span>
		</td>
		<td width="60%" style="padding-left:25px; padding-top:15px;" class="content_text">
			<p><label for="sitename"><b>{$settings.site_name|stripslashes|strip_tags}:</b></label><br />
			<input type="text" id="sitename" name="sitename" style="width:320px;" class="input_edit2">
			</p>
			<p style="font-size:11px;">{$settings.site_name_descr|stripslashes|strip_tags}</p>
			<br />
			<p>
				<label for="domain"><b>{$settings.domain|stripslashes|strip_tags}:</b></label>
				<span id="domain_notification_container"></span>
				<div id="progress" style="position:absolute; background:#ECF0FB; margin-left:50px; margin-top:-20px; text-align:center; display:none;  z-index:1001;">
					<img src="/images/loading.gif" width="260" height="12" />
				</div>
				<div id="news1"></div>	
					<table>
					<tr>
						<td>
							<input type="text" id="domain" name="domain" style="width:160px; font-size:13px; height:18px;" value="" class="input_select" />
						</td>
						<td>
							<select name="domain_zone" id="domain_zone" class="input_select" style="font-size:13px; height:20px;">
							<option value=".ru">.ru</option>
							<option value=".su">.su</option>
							<option value=".com">.com</option>
							<option value=".info">.info</option>
							<option value=".ney">.net</option>
							<option value=".org">.org</option>
							<option value=".biz">.biz</option>
							<option value=".ws">.ws</option>
							<option value=".name">.name</option>
							<option value=".in">.in</option>
							<option value=".us">.us</option>
							<option value=".eu">.eu</option>
							</select>
						</td>
						<td>
							<a href="#" id="check" class="button" onclick="checkDomain();">{$frontendLangParams.LINKS_CHECK}</a>		
						</td>
					</tr>
					</table>
				
				
				<p style="font-size:11px;">
					{$settings.domain_descr|stripslashes|strip_tags}
				</p>
				<center>
				<div id="message_box" style="position:absolute; color:#660000; background:#B3C6D3; text-align:center; padding:5px 5px 5px 5px; height:20px; margin-top:10px; width:330px; display:none; border:1px solid #B3C6D3;">
				</div>
				</center>
			</p>




		</td>
	</tr>
	</table>
	</div>
	<div class="content_text">
		<br />
		<p><img class="go_btn" style="cursor:hand; cursor:pointer;" src="/images/go_btn_{$lang_info.short_title|strtolower}.png" onclick="checkOrderForm();"></p>
	</div>
	</form>
</div>
</div>
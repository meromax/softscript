<table align="center" width="955" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="height:600px; background-image:url(images/content_bg.gif); background-position:top; background-repeat:repeat-x">
 <tr>
 	<td valign="top">
		<table width="100%" border="0" cellspacing="20" cellpadding="0">
  <tr>
    <td width="30%" valign="top" >{$ImageUploadMessage}
                            </div>
					        <table cellpadding="0" cellspacing="0" style="width:200px;">
                                <tr>
                                <td class="sample_profile">
                                {if $userData->image != ''}
                                <script>document.write("<a href=\"images/users/{$FullImage}?rnd="+Math.random()+"\" title=\"User: {$userData->username}\" rel=\"imagebox-bw\">")</script>
                                <script>document.write("<img src=\"images/users/{$userData->image}?rnd="+Math.random()+"\">")</script>
                                <script>document.write("</a>")</script>
                                {else}
                                <img src="images/dashboard_profile_img.jpg" alt="" onMouseOver="grey(this);" onMouseOut="white(this);"/>
                                {/if}                                </td>
                                <td class="opisanie" style="vertical-align:bottom;">
                                <p>&nbsp;</p>
                                </td>
                                </tr>
                  </table>&nbsp;</td>
    <td width="60%" valign="top"><div>
                                
      <div>                    
								<table cellpadding="0" cellspacing="0" style="width:100%;">
									<tr>
										<td nowrap="nowrap" style="padding:0 3px 0 0; text-align:right; vertical-align:middle;"><strong>First Name:</strong></td>
										<td style="width:36%;">{$userData->first_name}</td>
										<td nowrap="nowrap" style="padding:0 3px 0 0; text-align:right; vertical-align:middle;"><strong>Last Name:</strong></td>
										<td style="width:36%;">{$userData->last_name}</td>
									</tr>
									<tr>
										<td nowrap="nowrap" style="height:20px;">&nbsp;</td>
									</tr>
									<tr>
										<td nowrap="nowrap" style="padding:0 3px 0 0; text-align:right; vertical-align:middle;"><strong>Birthday:</strong></td>
										<td>
                                        		<table width="200" cellpadding="0" cellspacing="0" style="width:200px;;">
												<tr><td width="120">
												{$userData->birthday|date_format:"%m"} / 
												{$userData->birthday|date_format:"%d"} / 
												{$userData->birthday|date_format:"%Y"}
                                                </td></tr></table>                                      </td>
										<td style="padding:0 3px 0 0; text-align:right; vertical-align:middle;"><strong>AIM:</strong></td>
									  <td>{$userData->aim_msg}</td>
									</tr>
									<tr>
										<td nowrap="nowrap" style="height:10px;"></td>
									</tr>
									<tr>
										<td nowrap="nowrap" style="padding:0 3px 0 0; text-align:right; vertical-align:middle;"><strong>Gender:</strong></td>
										<td>{$userData->gender}&nbsp;</td>
										<td style="padding:0 3px 0 0; text-align:right; vertical-align:middle;"><strong>Yahoo:</strong></td>
										<td>{$userData->yahoo}</td>
									</tr>
									<tr>
										<td nowrap="nowrap" style="height:10px;"></td>
									</tr>
									<tr>
										<td nowrap="nowrap" style="padding:0 3px 0 0; text-align:right; vertical-align:middle;"><strong>Country:</strong></td>
										<td>&nbsp;</td>
										<td style="padding:0 3px 0 0; text-align:right; vertical-align:middle;"><strong>GTalk:</strong></td>
										<td>{$userData->gtalk}</td>
									</tr>
									<tr>
										<td nowrap="nowrap" style="height:10px;"></td>
									</tr>
									<tr>
										<td nowrap="nowrap" style="padding:0 3px 0 0; text-align:right; vertical-align:middle;"><strong>Region:</strong></td>
										<td>&nbsp;</td>
										<td style="padding:0 3px 0 0; text-align:right; vertical-align:middle;"><strong>MSN:</strong></td>
										<td>{$userData->msn_msg}</td>
									</tr>
									<tr>
										<td nowrap="nowrap" style="height:10px;"></td>
									</tr>
									<tr>
										<td nowrap="nowrap" style="padding:0 3px 0 0; text-align:right; vertical-align:middle;"><strong>City:</strong></td>
										<td>&nbsp;</td>
										<td style="padding:0 3px 0 0; text-align:right; vertical-align:middle;"><strong>ICQ:</strong></td>
										<td>{$userData->icq}</td>
									</tr>
									<tr>
										<td nowrap="nowrap" style="height:10px;"></td>
									</tr>
									<tr>
										<td nowrap="nowrap" style="padding:0 3px 0 0; text-align:right; vertical-align:middle;"><strong>Zip or Postal:</strong></td>
										<td>{$userData->zip}</td>
										<td style="padding:0 3px 0 0; text-align:right; vertical-align:middle;"><strong>Phone:</strong></td>
										<td>{$userData->phone}</td>
									</tr>
									<tr>
										<td nowrap="nowrap" style="height:10px;"></td>
									</tr>
									<tr>
										<td nowrap="nowrap" style="padding:0 3px 0 0; text-align:right; vertical-align:top;"><strong> Statement About Yourself:</strong></td>
										<td>{$userData->information|nl2br}</td>
										<td style="padding:0 3px 0 0; text-align:right;"><strong>Cell:</strong></td>
										<td>{$userData->cell_phone}</td>
									</tr>
									<tr>
										<td></td>
										<td colspan="2" style="padding:0 3px 0 0; text-align:right;"><strong>Current school:
									    </strong>
									  <td>{$userData->current_school}</td>
								  </tr>
									<tr>
									  <td></td>
									  <td colspan="2" style="padding:0 3px 0 0; text-align:right;"><strong>Past school: </strong></td>
									  <td>{$userData->past_school}</td>
								  </tr>
									<tr>
									  <td></td>
									  <td colspan="2" style="padding:0 3px 0 0; text-align:right;"><strong>Current occupation: </strong></td>
									  <td>{$userData->occupation}</td>
								  </tr>
									<tr>
									  <td></td>
									  <td colspan="2" valign="top" style="padding:0 3px 0 0; text-align:right;"><strong>My areas of interest: </strong></td>
									  <td valign="top">{$userData->interest|nl2br}</td>
								  </tr>
						</table>
</div>
    </div></td>
  </tr>
</table>	</td>
 <tr>
  <tr>
    <td  align="center" height="10px">
	<a href="/index">Home</a>   |   <a href="/area">Dashboard</a>   |    <a href="/registration">Registration </a></td>
  </tr>
</table>	</td>
  </tr>
</table>
{literal}            
<script type="text/javascript">
$('#country').change(
		function()
		{
			$('#region').attr('disabled', 'disabled');
			$('#city').attr('disabled', 'disabled');
			var cid = $(this).val();
			$.ajax({
				  type: "POST",
				  url: "/api/LocationExplorer/getRegions",
				  data: "ApiRequest=" + cid,
				  beforeSend: function(){ showPreloader();},
				  complete: function(){ hidePreloader();},
				  success: function(msg){
				  	$('#region > option').remove();
					$('#region').append(msg);
					$('#region').removeAttr("disabled");
					$('#region').val("");
					$('#city > option').remove();
				  }
			});
		}
);

$('#region').change(
		function()
		{
			$('#city').attr('disabled', 'disabled');
			var rid = $(this).val();
			$.ajax({
				  type: "POST",
				  url: "/api/LocationExplorer/getCities",
				  data: "ApiRequest=" + rid,
				  beforeSend: function(){ showPreloader();},
				  complete: function(){ hidePreloader();},
				  success: function(msg){
				  	$('#city > option').remove();
					$('#city').append(msg);
					$('#city').removeAttr("disabled");
					$('#city').val("");
				  }
			});
		}
);
</script>
{/literal}

</body>
</html>
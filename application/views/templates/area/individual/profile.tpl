{include file='area/extras/menu_level_one.tpl'}
<div class="high_school_bg">
  <div class="tools_full_lt">
               	<div class="tools_tit tt">Personal information</div>
                <div>{$warningBlock}</div>
                <form method="post" enctype="multipart/form-data">
                	<table cellpadding="0" cellspacing="0">
                    	<tr>
                        	<td style="width:122px; vertical-align:middle;"><strong>First Name:</strong></td>
                        	<td><input name="firstname" type="text" class="input" id="firstname" style="width:187px; padding:2px 3px; margin:0 0 4px 0;" value="{$userData->first_name}" /></td>
                        </tr>
                    	<tr>
                        	<td style="width:122px; vertical-align:middle;"><strong>Last Name:</strong></td>
                        	<td><input name="lastname" type="text" class="input" id="lastname" style="width:187px; padding:2px 3px; margin:0 0 4px 0;" value="{$userData->last_name}" /></td>
                        </tr>
                        <tr>
                        	<td style="width:122px; vertical-align:middle;"><strong>Gender:</strong></td>
                        	<td><select name="gender" style="width:195px; color:#6d6d6d; font-size:11px; margin:0 0 4px 0;" id="gender">
                              	<option value=""{if $userData->gender != 'Male' && $userData->gender != 'Female'} selected="selected"{/if}>-- Choose Gender --</option>
                                <option value="Male"{if $userData->gender == 'Male'} selected="selected"{/if}>Male</option>
                                <option value="Female"{if $userData->gender == 'Female'} selected="selected"{/if}>Female</option>>
                                </select>
                          </td>
                        </tr>
                    	<tr>
                        	<td style="width:122px; vertical-align:middle;"><strong>New Password:</strong></td>
                        	<td><input type="password" class="input" style="width:187px; padding:2px 3px; margin:0 0 4px 0;" /></td>
                        </tr>
                    	<tr>
                        	<td style="width:122px; vertical-align:middle;"><strong>Confirm Password:</strong></td>
                        	<td><input type="password" style="width:187px; padding:2px 3px; margin:0 0 4px 0;" class="input" /></td>
                        </tr>
                    	<tr>
                        	<td style="width:122px; vertical-align:middle;"><strong>Email:</strong></td>
                        	<td><p>{$userData->email}</p></td>
                        </tr>
                    	<tr>
                        	<td style="width:122px; vertical-align:middle;"><strong>Birth Date:</strong></td>
                        	<td>
                            	
                                <select name="month" style="width:77px; color:#6d6d6d; font-size:11px;">
                             		<option selected="selected">Month</option>
									{html_options options=$MonthSelect selected=$userData->birthday|date_format:"%m"}
								</select>
                                
                           		<select name="day" style="width:58px; color:#6d6d6d;  font-size:11px; margin:0 0 0 -3px;">
                           			<option selected="selected">Day</option>
									{html_options values=$DaySelect output=$DaySelect selected=$userData->birthday|date_format:"%d"}
                                </select>  
                                
                           		<select name="year" style="width:60px; color:#6d6d6d;font-size:11px;margin:0 0 0 -3px;">
                           			<option selected="selected">Year</option>
                                    {html_options values=$YearSelect output=$YearSelect selected=$userData->birthday|date_format:"%Y"}
								</select>
                                
                            </td>
                        </tr>
                    </table>
                      <p style="color:#455fff; font-weight:bold; padding:13px 0 7px 0;">Location</p>
                      <table cellpadding="0" cellspacing="0">
                      	<tr>
                        	<td style="width:73px; vertical-align:middle;"><strong>Country:</strong></td>
                            <td>
                            	<select name="country" style="width:238px; color:#6d6d6d;font-size:11px; margin:0 0 4px 0;" id="country">
                   			  <option value="" selected="selected">-- Select Country --</option>
									{html_options options=$ContryList selected=$userData->country}
                                </select>
                            </td>
                        </tr>
                        <tr>
                        	<td style="width:73px; vertical-align:middle;"><strong>State:</strong></td>
                            <td>
                            	<select name="region" id="region" {if $userData->country == ''} disabled="disabled"{/if} name="region" style="width:238px; color:#6d6d6d;font-size:11px; margin:0 0 4px 0;">
                   			  <option value="" selected="selected">-- Select Region --</option>
                                    {html_options options=$RegionList selected=$userData->region}
                                </select> 
                            </td>
                        </tr>
                        <tr>
                        	<td style="width:73px; vertical-align:middle;"><strong>City:</strong></td>
                            <td>
                            	<select name="city" id="city" {if $userData->country == ''} disabled="disabled"{/if} name="city" style="width:238px; color:#6d6d6d;font-size:11px; margin:0 0 4px 0;">
                   			  <option value="" selected="selected">-- Select City --</option>
                                    {html_options options=$CityList selected=$userData->city}
                                </select>
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="padding:5px 0 0px 0;"><input name="update_user_info" type="submit" id="update_user_info" style="background:#E3E3E3; color:#6D6D6D; font-weight:bold; width:auto; font-size:11px; border:1px solid #C2C2C2; padding:0 3px; float:right; cursor:pointer;" value="Submit" /></td>
                        </tr>
                      </table>
                      </form>
              </div>
                <div class="tools_full_rt">
                    <div class="tools_tit tt">Profile Image</div>
                    <div>{$ImageUploadMessage}</div>
                    <table cellpadding="0" cellspacing="0">
                    <form method="post" enctype="multipart/form-data">
						<tr>
                        	<td style="border:1px solid #d1d1d2;">
                            
                                <img {if $FullImage==""} src="images/no_image.gif" {else} src="images/members/avatars/{$FullImage}_big.jpg" {/if} alt="" />
                             </td>
                            
                            <td style="padding:0 0 0 14px;">
                            <input name="avatar" type="file" class="input" id="avatar" style="background:#E3E3E3; color:#6D6D6D; font-weight:bold; * width:180px; font-size:11px; border:1px solid #C2C2C2; padding:0 3px; margin:0 0 14px 0; float:right; cursor:pointer;" />
                              
                              <p style="clear:both;">Browse your new default photo or replace current one</p>
                              
                              {if $userData->image != ''}
                              	<p style="clear:both;">
                                <input type="submit" name="delete_avatar" id="button" style="background:#E3E3E3; color:#6D6D6D; font-weight:bold; width:auto; font-size:11px; border:1px solid #C2C2C2; padding:0 3px; margin:0 0 0px 0; float:left; cursor:pointer;" value="Delete image" />
                                </p>
                              {/if}
                              
                        </td>
                        </tr>
                        <tr>
                        	<td colspan="2"><input name="update_avatar" type="submit" id="update_avatar" style="background:#E3E3E3; color:#6D6D6D; font-weight:bold; width:70px; font-size:11px; border:1px solid #C2C2C2; padding:0 3px; margin:101px 0 0px 255px; cursor:pointer;" value="Upload" /></td>
                        </tr>
                    </form>                            
                    </table>       	
                </div>
                <div class="clear"></div>
            </div>
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
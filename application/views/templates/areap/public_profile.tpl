<div class="high_school_bg" align="center">
  <div class="tools_full_lt" style="width:500px;" align="center">
               	<div class="tools_tit tt">Information</div>
               	<table cellpadding="0" cellspacing="0" width="90%" align="center">
               	<tr>
               		<td align="right" style="padding-right:20px;">
						<table cellpadding="0" cellspacing="0">
							<tr>
	                        	<td style="border:1px solid #d1d1d2;">
	                            
	                                <img {if $userData->member_photo_filename==""} src="images/no_image.gif" {else} src="images/members/avatars/{$userData->member_photo_filename}_big.jpg" {/if} alt="" />
	                             </td>
	                            
	                        </tr>
	                    </table>
               		</td>
               		<td align="left">
						<table cellpadding="0" cellspacing="0">
						<tr><td colspan="2" style="height:20px;"></td></tr>
                    	<tr>
                        	<td style="width:122px; vertical-align:middle;" ><strong>First Name:</strong></td>
                        	<td>{$userData->first_name}</td>
                        </tr>
                        <tr><td colspan="2" style="height:10px;"></td></tr>
                    	<tr>
                        	<td style="width:122px; vertical-align:middle;"><strong>Last Name:</strong></td>
                        	<td>{$userData->last_name}</td>
                        </tr>
                        <tr><td colspan="2" style="height:10px;"></td></tr>
                    	<tr style="padding-bottom:10px;">
                        	<td style="width:122px; vertical-align:middle;"><strong>Email address:</strong></td>
                        	<td>{$userData->email}</td>
                        </tr>
                    	</table>
               		</td>
               	</tr>
               	<tr>
               		<td colspan="2" align="center">
               		<br />
						<table cellpadding="0" cellspacing="0">
                    	<tr>
                        	<td style="width:89px;"><strong>Resume:</strong></td>
                        	<td>
                        	    ------------------------------
                            </td>
                        </tr>
                        <tr><td colspan="2" style="height:10px;"></td></tr>
                    	<tr>
                        	<td style="width:89px;"><strong>Blog:</strong></td>
                        	<td>
 								------------------------------			
                            </td>
                        </tr>
                        <tr><td colspan="2" style="height:10px;"></td></tr>
                        <tr>
                        	<td><strong>About Me:</strong></td>
                        	<td>
                        		------------------------------
                        	</td>
                        </tr>
                    </table>
               		</td>
               	</tr>
               	</table>
              </div>
                <div class="clear"></div>
            </div>
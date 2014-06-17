            <table cellpadding="0" cellspacing="0" class="table">
                    <tr>
                      <td class="border_reg">                        
                        <div class="featured_video_reg" style="min-height:260px">
							<div class="featured_videos_title">Password Change</div>
						  <div class="reg_login">Please enter a new password for your account.</div>
                            {$warningBlock}
							<form method="post" enctype="multipart/form-data">
                            <div class="contentstyle2" style="width:400px;">
                      <div class="reg_form">
								<table cellpadding="0" cellspacing="0" style="width:100%; margin:0 auto;">
					  <tr>
										<td colspan="2" nowrap="nowrap" class="featured_videos_title" style="width:105px; border:1px solid #fff;"><strong>Your username is &quot;{$username}&quot;</strong></td>
			                      <tr>
						  <td width="107" nowrap="nowrap" class="vert"><span class="vert" style="width:105px; border:1px solid #fff;">Enter a New Password </span></td>
				        <td width="266"><span style="width:40%">
				          <input name="password" type="password" class="reg_input2" id="password" onfocus="ifan(this);" onblur="ifon(this);"/>
				        </span></td>
					    </tr>
									<tr>
										<td nowrap="nowrap" class="vert">Verify New Password</td>
									  <td><span style="width:40%">
									    <input name="re_password" type="password" class="reg_input2" id="re_password" onfocus="ifan(this);" onblur="ifon(this);"/>
									  </span></td>
							      </tr>
									<tr>
									  <td class="vert">&nbsp;</td>
									  <td style="padding-left:7px;"><input class="btn" type="submit" name="change_password_ok" id="change_password_ok" value="Done" /></td>
								  </tr>
								</table>
                      </div>
                            </div>
                          </form>
                          
						</div></td>
  </tr>
            </table>
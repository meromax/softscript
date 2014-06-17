{include file='area/extras/menu_level_one.tpl'}

<div id="listings_actions" style="display:none;" class="tools_full_lt">
<form method="post">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="prt2"><strong>External Link:</strong></td>
<td><input name="ext_link" type="text" class="input" id="ext_link" style="width:196px; padding:2px 3px; margin:0 0 4px 0;" /></td>
</tr>
<tr>
<td class="prt2"><strong>Title:</strong></td>
<td><input name="title" type="text" class="input" id="title" style="width:196px; padding:2px 3px; margin:0 0 4px 0;" /></td>
</tr>
<tr>
<td><strong>Description:</strong></td>
<td><textarea name="description" cols="" rows="" class="input" id="description" style="width:196px; padding:2px 3px; margin:0 0 4px 0; height:57px; overflow:auto;" type="text"></textarea></td>
</tr>
<tr>
<td><strong>Tags:</strong></td>
<td><textarea name="tags" cols="" rows="" class="input" id="tags" style="width:196px; padding:2px 3px; margin:0 0 4px 0; height:57px; overflow:auto;" type="text"></textarea></td>
</tr>
<tr>
<td class="prt2"><strong>Expire Date:</strong></td>
<td style="vertical-align:middle;">
<input name="date_expire" type="text" class="input" id="date_expire" style="width:122px; padding:2px 3px; margin:0 0 4px 0;" /></td>
</tr>
<tr>
<td colspan="2" style="height:25px;"></td>
</tr>
<tr>
<td class="prt2"><strong>Country:</strong></td>
<td>
<select name="country" style="width:202px; color:#6d6d6d;font-size:11px; margin:0 0 4px 0;" id="country">
<option>Choose Country</option>
</select></td>
</tr>
<tr>
<td class="prt2"><strong>Region:</strong></td>
<td>
<select name="region" style="width:202px; color:#6d6d6d;font-size:11px; margin:0 0 4px 0;" id="region">
<option>Choose State</option>
</select></td>
</tr>
<tr>
<td class="prt2"><strong>City:</strong></td>
<td>
<select name="city" style="width:202px; color:#6d6d6d;font-size:11px; margin:0 0 4px 0;" id="city">
<option>Choose City</option>
</select></td>
</tr>
<tr>
<td colspan="2" style="padding:20px 0 0 83px;">
<input name="add_listing" type="submit" id="add_listing" style="background:#E3E3E3; color:#6D6D6D; font-weight:bold; width:auto; font-size:11px; border:1px solid #C2C2C2; width:83px; cursor:pointer;" value="Add" />&nbsp;
<input name="Reset" type="reset" style="background:#E3E3E3; color:#6D6D6D; font-weight:bold; width:auto; font-size:11px; border:1px solid #C2C2C2; width:83px; cursor:pointer;" value="Reset" /></td>
</tr>
</table>
</form>
</div>

<div class="high_school_bg">
                <div class="tools full" style="margin-bottom:5px;"> <a href="#" onclick="ModalOpen('#listings_actions', 0.7); return false;" title="Add New" class="a" style="display:block; position:absolute; margin:11px 0 0 660px;">Add New</a>
                    <div class="tools_tit">listing managment</div>                    
                    <table cellpadding="0" cellspacing="0" style="border-width:1px 0 0 1px; border-style:solid; border-color:#d1d1d2; font-size:11px; margin:0 5px;">
                    	<tr>
                        	<td style="border-right:1px solid #d1d1d2; background:#e8e8e8; height:23px; vertical-align:middle; text-align:center; font-weight:bold; color:#8b8b8b; width:137px;">Title</td>
                            <td style="border-right:1px solid #d1d1d2; background:#e8e8e8; height:23px; vertical-align:middle; text-align:center; font-weight:bold; color:#8b8b8b; width:185px;">Description</td>
                            <td style="border-right:1px solid #d1d1d2; background:#e8e8e8; vertical-align:middle; text-align:center; font-weight:bold; color:#8b8b8b; width:92px;">Expiration Date</td>
                            <td style="border-right:1px solid #d1d1d2; background:#e8e8e8; vertical-align:middle; text-align:center; font-weight:bold; color:#8b8b8b; width:46px;">Views</td>
                            <td style="border-right:1px solid #d1d1d2; background:#e8e8e8; vertical-align:middle; text-align:center; font-weight:bold; color:#8b8b8b; width:90px;">Current Rating</td>
                            <td style="border-right:1px solid #d1d1d2; background:#e8e8e8; vertical-align:middle; text-align:center; font-weight:bold; color:#8b8b8b; width:85px;">Tags</td>
                            <td style="border-right:1px solid #d1d1d2; background:#e8e8e8; vertical-align:middle; text-align:center; font-weight:bold; color:#8b8b8b; width:75px;">Options</td>
                        </tr>
                        {foreach from=$Listings item=listing}
                        <tr>
                        	<td style="height:78px; border-right:1px solid #d1d1d2; border-bottom:1px solid #d1d1d2; color:#5e5e5e; text-align:center; vertical-align:middle; line-height:15px;">
                            	{$listing.title}                            
                            </td>
                        	<td style="border-right:1px solid #d1d1d2; border-bottom:1px solid #d1d1d2; color:#5e5e5e; padding:0 0 0 7px; text-align:left; vertical-align:middle; line-height:15px;">
								{$listing.description|replace:"\\":""|truncate:60:"..."}
                            </td>
                        	<td style="border-right:1px solid #d1d1d2; border-bottom:1px solid #d1d1d2; color:#5e5e5e; text-align:center; vertical-align:middle; line-height:15px;">
                            	{$listing.date_expire}
                            </td>
                            <td style="border-right:1px solid #d1d1d2; border-bottom:1px solid #d1d1d2; color:#5e5e5e; text-align:center; vertical-align:middle; line-height:15px;">
                            	{$listing.views}
                            </td>
                            <td style="border-right:1px solid #d1d1d2; border-bottom:1px solid #d1d1d2; color:#5e5e5e; text-align:center; vertical-align:middle; line-height:15px;">
                            	1 of 10                            </td>
                            <td style="border-right:1px solid #d1d1d2; border-bottom:1px solid #d1d1d2; color:#5e5e5e; text-align:center; vertical-align:middle; line-height:15px;">
                            	{$listing.tags|replace:"\\":""|truncate:40:"..."}
                            </td>
                            <td style="border-right:1px solid #d1d1d2; border-bottom:1px solid #d1d1d2; color:#5e5e5e; text-align:center; vertical-align:middle; line-height:15px;">
                            	<a href="#" title="Edit" class="a">Edit</a> | <a href="#" title="Delete" class="a">Delete</a>                            </td>
                        </tr>
                        {/foreach}
                    </table>
  </div>
</div>
            
            
            
<div class="jqmWindow" id="modal_video_window" align="center">
<div id="target">
Please wait... <img src="images/ajax/progress.gif" alt="loading" />
</div>
</div>
<table cellpadding="0" cellspacing="0" class="table">
                    <tr>
                        <td class="dashboard_profile_border">
						<!-- Personal Information -->                        
                        <div class="featured_video">
                        	<div class="dashboard_videos_title">Add Listing</div>
                            {$warningBlock}
						  <form name="videoForm" method="post">
                          <input type="hidden" name="allow_edit" id="allow_edit" value="0" />
                          <input type="hidden" name="listing_id" id="listing_id" value="" />
                            <div class="dash_profile">
								<div class="profile_tit">
									Add your Listing to expose yourself or attract potential employees
								</div>
								<div class="hint"></div>								
							</div>
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td id="listing_form" class="left_td">External Link:</td>
									<td class="right_td"><input name="ext_link" type="text" class="video_input2" id="ext_link" onfocus="ifan(this);" onblur="ifon(this);" value="{$smarty.post.ext_link|replace:"\\":""}" /></td>
								</tr>
                                <tr>
									<td class="left_td">Title:</td>
									<td class="right_td"><input name="title" type="text" class="video_input2" id="title" onfocus="ifan(this);" onblur="ifon(this);" value="{$smarty.post.title|replace:"\\":""}" /></td>
								</tr>
								<tr>
									<td class="left_td">Description:</td>
									<td class="right_td"><textarea name="description" cols="" wrap="physical" class="video_textarea" id="description" onfocus="ifan(this);" onblur="ifon(this);">{$smarty.post.description|replace:"\\":""}</textarea></td>
								</tr>
								<tr>
									<td class="left_td">Tags:</td>
									<td class="right_td"><textarea name="tags" cols="" rows="" wrap="physical" class="video_textarea" id="tags" onfocus="ifan(this);" onblur="ifon(this);">{$smarty.post.tags|replace:"\\":""}</textarea></td>
								</tr>
								<tr>
								  <td class="left_td">Expire date:</td>
								  <td class="right_td"><input name="date_expire" type="text" value="{$smarty.post.date_expire}" class="video_input" id="date_expire" onfocus="ifan(this);" onblur="ifon(this);" /></td>
							  </tr>
							</table>
						    <div class="dash_pt"></div>
							  <table cellpadding="0" cellspacing="0">
								<tr>
									<td class="left_td">Category:</td>
									<td class="right_td">
                                        <select name="category" class="video_select" id="category" onfocus="ifan(this)" onblur="ifon(this)">
                                        <option value="" selected="selected">-- Select Category --</option>
                                        {html_options options=$CategoryList selected=$smarty.post.category}
									    </select>									</td>
								</tr>
								<tr>
									<td class="left_td">Industry:</td>
									<td class="right_td">
										<select name="industry" class="video_select" id="industry" onfocus="ifan(this)" onblur="ifon(this)">
                                        <option value="" selected="selected">-- Select Category --</option>
                                        {html_options options=$IndustryList selected=$smarty.post.industry}
									    </select>									</td>
								</tr>
								<tr>
									<td class="left_td">Type:</td>
									<td class="right_td">
										<select name="type" class="video_select" id="type" onfocus="ifan(this)" onblur="ifon(this)">
                                        <option value="" selected="selected">-- Select Category --</option>
                                        {html_options options=$ListingType selected=$smarty.post.type}
									    </select>									</td>
								</tr>
								
                                {if $ProfileType == 'business'}
                                <tr>
									<td colspan="2" class="left_td">
                                    <div style="padding-bottom: 8px; white-space:nowrap;">
                                     <a class="dp-choose-date" id="job_posting_add" title="Check if applicable to Jop Posting" href="#"> Check if applicable to Jop Posting</a>
                                    </div>
                                    <div id="add_more" style="display:none;">
								      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td class="left_td">Position:</td>
                                          <td class="right_td">
                                          <select name="position" class="video_select" id="position" onfocus="ifan(this)" onblur="ifon(this)" disabled="disabled">
                                            <option value="" selected="selected">-- Select Category at first --</option>
                                          </select>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="left_td">Edu Level:</td>
                                          <td class="right_td"><select name="education" class="video_select" id="education" onfocus="ifan(this)" onblur="ifon(this)">
                                              <option value="" selected="selected">-- Select Edu Level --</option>
                                            
                                        {html_options options=$EducationLevel selected=$smarty.post.education}
									    
                                          </select>                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="left_td">Experience:</td>
                                          <td class="right_td"><select name="experience" class="video_select" id="experience" onfocus="ifan(this)" onblur="ifon(this)">
                                              <option value="" selected="selected">-- Select Experience --</option>
                                            
                                        {html_options options=$Experience selected=$smarty.post.experience}
									    
                                          </select>                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="left_td">Salary:</td>
                                          <td class="right_td"><select name="salary" class="video_select" id="salary" onfocus="ifan(this)" onblur="ifon(this)">
                                              <option value="" selected="selected">-- Select Salary --</option>
                                            
                                        {html_options options=$Salary selected=$smarty.post.salary}
									    
                                          </select></td>
                                        </tr>
                                      </table>
								    </div>
                                    </td>
								</tr>
                                {/if}
                                
								<tr>
								  <td colspan="2" style="text-align:center; padding:2px 0;">
									<input type="image" name="add_listing" value="1" src="images/add_video_button.jpg" onmouseover="change17(this)" onmouseout="change18(this)" id="add_listing" />
									<input name="reset" id="reset" type="image" src="images/reset_button.jpg" onmouseover="change19(this)" onmouseout="change20(this)" />
                                    <div id="edit_state" style="padding:2px; border:#CCCCCC 1px solid; font-size:11px; background-color:#009933; color:#ffffff; display:none;">
                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                        <td width="62%" align="right"><span><strong>Edit mode</strong></span></td>
                                        <td width="38%" align="right"><span style="text-align:right; font-size:10px;">[<a id="id_state_exit" style="color:#FFFFFF; text-decoration:none;" href="#">exit</a>]</span></td>
                                        </tr>
                                      </table>
                                        </div>                                    </td>
								</tr>
							</table>
                          
                          </form>
                        <!-- End Personal Information -->
                        </td>
                        <td class="border1">
                        {$warningBlockCenter}
                       	  <div class="dash_right_block">
<div class="dashboard_videos_title">
                                Listing Managment 
							</div>
							<table cellpadding="0" cellspacing="0" class="vtable">
					  	  <tr>
									<td id="tit"> Title </td>
									<td id="tit">
									Description									</td>
									<td id="tit">
									Expiration	date								</td>
									<td id="tit">
									Views									</td>
									<td id="tit">
									Current Rating									</td>
									<td id="tit">
									Tags									</td>
									<td id="tit" style="border-width:0 0 1px 0;">
									Options									</td>
							  </tr>
								{foreach from=$Listings item=listing}
                              <tr>
									<td class="title">{$listing.title|replace:"\\":""|truncate:40:"..."}</td>
									<td class="description">{$listing.description|replace:"\\":""|truncate:60:"..."}</td>                
									<td class="title">{$listing.date_expire}</td>
									<td class="view">{$listing.views}</td>
									<td class="cur_rating">1 of 10</td>
									<td class="tag">{$listing.tags|replace:"\\":""|truncate:40:"..."}</td>
								  <td nowrap="nowrap" style="border-width:0 0 1px 0;"><a id="edit_video" onclick="EditListing({$listing.id}, this); return false;" href="#">Edit</a> | <a href="/area/listings/deleteListing/id/{$listing.id}" onclick="return confirm('Delete Listing\nAre you sure?');">Delete</a></td>
								{/foreach}                              </tr>
							  </table>							
						  </div>
                                                  </td>
                    </tr>
            </table>
{literal}            
<script type="text/javascript">

$('#reset').click(
	function()
	{
		$('#ext_link').val('');
		$('#title').val('');
		$('#description').val('');
		$('#tags').val('');
		$('#date_expire').val('');
		$('#category').val('');
		$('#industry').val('');
		$('#type').val('');
		$('#allow_edit').val(0);
		
		return false;
	}
);

function OpenListingDialog()
{
	$('#listings_actions').modal({cloneContent: true,
								  onClose: false});
	
	return false;
}

function EditListing(id, el)
{
			$('#reset').click();
			
			$('#listing_form').ScrollTo(1000);
			
			$.ajax({
			  type: "POST",
			  url: "/api/listing/GetListing",
			  data: "ApiRequest=" + id,
			  dataType: 'xml',
			  beforeSend: function(){ showPreloader();},
			  complete: function(){ hidePreloader();},
			  success: function(xmltxt){
				var ext_link = $(xmltxt).find('root > ext_link').text();
				var title = $(xmltxt).find('root > title').text();
				var description = $(xmltxt).find('root > description').text();
				var tags = $(xmltxt).find('root > tags').text();
				var date_expire = $(xmltxt).find('root > date_expire').text();
				var category = $(xmltxt).find('root > category').text();
				var industry = $(xmltxt).find('root > industry').text();
				var type = $(xmltxt).find('root > type').text();
				$(el).TransferTo({to:'ext_link',className:'transfer', duration: 1000, easing: 'fadein', complete: function(){$('#ext_link').val(ext_link);}})
							.TransferTo({to:'title',className:'transfer', duration: 1000, easing: 'fadein', complete: function(){$('#title').val(title);}})
							.TransferTo({to:'description',className:'transfer', duration: 1000, complete: function(){$('#description').val(description);}})
							.TransferTo({to:'tags',className:'transfer', duration: 1000, complete: function(){$('#tags').val(tags);}})
							.TransferTo({to:'date_expire',className:'transfer', duration: 1000, complete: function(){$('#date_expire').val(date_expire);}})
							.TransferTo({to:'category',className:'transfer', duration: 1000, complete: function(){$('#category').val(category);}})
							.TransferTo({to:'industry',className:'transfer', duration: 1000, complete: function(){$('#industry').val(industry);}})
							.TransferTo({to:'type',className:'transfer', duration: 1000, complete: function(){$('#type').val(type);}});
					
			  				$('#allow_edit').val(1);
							$('#listing_id').val(id);
							$('#edit_state').slideDown(1000);
			  },
			  error: function()
			  {
				hidePreloader();
				alert("Wrong request!\nVideo with id:" + id + ' is not exists.');
			  }
			  
		});

	return false;
}


$('#warning_block').css('width', '93%');

$('#id_state_exit').click(
	function()
	{
		$('#edit_state').slideUp(1000);
		$('#allow_edit').val(0);
		$('#listing_id').val('');
		$('#reset').click();
		return false;
	}
);




$(function()
{
	$('#date_expire').datePicker();
});


$('#job_posting_add').click(
	function()
	{
		$('#add_more').animate({height: 'toggle', opacity: 'toggle'}, 'slow');
		return false;
	}
);
$('#category').change(
		function()
		{
			$('#position').attr('disabled', 'disabled');
			var catid = $(this).val();
			$.ajax({
				  type: "POST",
				  url: "/api/OptionsExplorer/getPositions",
				  data: "ApiRequest=" + catid,
				  beforeSend: function(){ showPreloader();},
				  complete: function(){ hidePreloader();},
				  success: function(msg){
				  	$('#position > option').remove();
					$('#position').append(msg);
					$('#position').removeAttr("disabled");
					$('#position').val("");
				  }
			});
		}
);
</script>
{/literal}
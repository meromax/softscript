{include file='blocks/globalLeft.tpl'}
<form method="post" action="registration/index/step2" enctype="multipart/form-data">
<div class="univers">
<div class="tools">
    <div class="tools_tit">You user must either select one of the 4 avatars, or select 'Upload an Image' and provide their own image in the file input!</div>
	{$warningBlock}
    <div class="reg" align="center">
        <!--<form action="/registration/step_2.html" method="post" enctype="multipart/form-data">-->
 			<table style="margin: 5px 5px 5px 5px;" border="1" align="center">
			<tr>
				<td><img src="images/avatars/default_avatar.jpg"></td>
				<td><img src="images/avatars/default_avatar.jpg"></td>
				<td><img src="images/avatars/default_avatar.jpg"></td>
				<td><img src="images/avatars/default_avatar.jpg"></td>
			</tr>
			<tr>
				<td width="91" align="center" bgcolor="#b5b5b5"><input type="radio" name="avator" align="absmiddle" value="1"></td>
				<td width="91" align="center" bgcolor="#b5b5b5"><input type="radio" name="avator" align="absmiddle" value="2"></td>
				<td width="91" align="center" bgcolor="#b5b5b5"><input type="radio" name="avator" align="absmiddle" value="3"></td>
				<td width="91" align="center" bgcolor="#b5b5b5"><input type="radio" name="avator" align="absmiddle" value="4"></td>
			</tr>
			<tr>
				<td colspan="4" width="370">
					<table style="border: 1px solid #b2b2b2;" width="370">
					<tr>
						<td align="center" width="100%" style="padding: 3px 0px 3px 0px;" colspan="2">
                        	<div class="tools_tit tt" align="center">Uploaded Image</div>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                    		<table >
                    		<tr>
                    			<td >
                    				<img {if $imgname!=""} src="images/members/avatars/{$imgname}" {else} src="images/avatars/default_avatar.jpg" {/if} alt="" width="91" style="border:1px solid #b2b2b2;" />
                    			</td>
                    		</tr>
                    		{if $imgname!=""}
                    		<tr>
                    			<td  width="91" align="center" bgcolor="#b5b5b5">
									<input type="radio" name="avator" align="left" value="5">
                    			</td>
                    		</tr>
                    		{/if}
                    		</table>
                    	</td>
                    	<td>
                    		<table width="100%">
                    		<tr>
                    			<td >
                    				<div>{$ImageUploadMessage}</div>
                    			</td>
                    		</tr>
                    		<tr>
                    			<td align="left">
									<input name="avatar" type="file" id="avatar" style="background:#E3E3E3; color:#6D6D6D; font-weight:bold; font-size:11px; border:1px solid #C2C2C2; " />
                    			</td>
                    		</tr>
                    		<tr>
                    			<td align="left">
                    				<input name="update_avatar" type="submit" id="update_avatar" style="background:#E3E3E3; color:#6D6D6D; font-weight:bold; width:70px; font-size:11px; border:1px solid #C2C2C2; padding:0 0px; margin:10px 0 0px 0px; cursor:pointer;" value="Upload" />
                    			</td>
                    		</tr>
                    		</table>
                    	</td>
                    </tr>    
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="4" align="center">
					<br />
		            <input name="complete_reg2" type="submit" value="Continue" style="background:#E3E3E3; color:#6D6D6D; font-weight:bold; width:auto; font-size:11px; border:1px solid #C2C2C2; padding:0 3px; margin:0 5px 0 0; cursor:pointer;" />
				</td>
			</tr>
			</table>
			<input type="hidden" name="choose_avator" value="">
            </form>
            
       
    </div>
</div>
</div>
 <iframe name="uploader" style="border:0px" width="0" height="0"></iframe>
{literal}            
<script type="text/javascript">
function SetAvatorVal(){
	
}
</script>
{/literal}
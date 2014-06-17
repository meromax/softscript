<form method="POST" enctype="multipart/form-data" action="/admin/portfolio/uploadPictures" name="upform">
<input type="hidden" name="portfolio_id" value="{$portfolio_id}">
<input type="hidden" name="step" value="2">
<table height="100%" style="width:100%; border: solid 1px #b2b2b2; margin: 4px 4px 4px 4px;" class="cont2">
<tr>
	<td class="innerformtemp">
		<table width="100%" height="100%" cellpadding="0" cellspacing="0" class="cont2">
		<tr>
		  <td style="width:90px;">Picture Title:</td>
		  <td align="left">
		  	<input type="text" size="41" class="input" name="image_title" id="image_title">
		  </td>
		</tr>
		<tr>
		  <td style="width:90px;">Upload picture:</td>
		  <td align="left">
		  	<input type="file" size="41" class="input" id="upload_id" name="image" onkeyup="BlockInputUpload()">
		  </td>
		</tr>
		
		<tr><td class="separator" colspan="2"></td></tr>
		<tr>
		  <td align="left" colspan="2">
			<input type="button" class="input" value="Upload" onclick="CheckUploadData();">
		  </td>
		</tr>
		</table>
	</td>
</tr>
</table>
</form>
<h2>{$settings.faq|stripslashes|strip_tags}</h2>
<div class="news_block" style='border-bottom:solid 0px #0d0d0d;'>
	{foreach from=$items item=item}
	<div class="news_title" style="font-size:13px;"><b>{$item.title|stripslashes}</b></div>
	<div class="news_body">
		<div class="news_txt"  style="width:90%;">
			<table style="color:#ffffff;">
			{foreach from=$item.content item=content}
			<tr>
				<td style="font-size:11px; width:10px; line-height:20px;" valign="middle">&#9674</td>
				<td>
					<span style="font-size:12px; cursor:pointer; cursor: hand; line-height:20px;" onclick="hideshow({$content.id});">
						{$content.title|stripslashes|strip_tags}
						<input type="hidden" name="closeflag{$content.id}" id="closeflag{$content.id}" value="1" />
					</span>
				</td>
			</tr>
			<tr>
				<td style="font-size:11px; width:10px;">&nbsp;</td>
				<td style="padding-bottom:11px;">
					<div  id="description{$content.id}" style="display:none; padding-bottom:10px;">
						<span style="font-size:12px; color:#0276b1;">{$content.description|stripslashes}</span>
					</div>
				</td>
			</tr>
			{/foreach}
			</table>
		</div>
	</div>
	<div class="news_title" style="font-size:14px;">&nbsp;</div>
	{/foreach}
</div>
{literal}
<script type="text/javascript">
function hideshow(id){
	var flag = $("#closeflag"+id).val();
	if(flag==1){
		$("#closeflag"+id).val(0);
		$("#description"+id).slideDown();
	} else {
		$("#closeflag"+id).val(1);
		$("#description"+id).slideUp();
		
	}
}
</script>
{/literal}


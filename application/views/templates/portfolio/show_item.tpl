<div class="header_txt3">{$settings.portfolio|stripslashes|strip_tags}</div><br />
<div class="content_container">
<div class="content_block">
	<div class="content_title">
		<img src="/images/portfolio/{$item.portfolio_image}_original.jpg" width="100%" border="0" />
	</div>
	<div class="content_text">
		<p>{$item.portfolio_description|stripslashes}<br /><span style="font-size:12px; color:#525252;">{$item.portfolio_title|stripslashes|strip_tags}</span></p>
		{if $item.portfolio_link!=""}
			<p><a href="{$item.portfolio_link}" target="_blank"  style="color:#b2b2b2;"><b>{$settings.go_to_site|stripslashes|strip_tags}</b></a></p>
		{/if}
	</div>
</div>
</div>
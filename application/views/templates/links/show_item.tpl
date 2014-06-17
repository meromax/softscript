<h2>{$settings.catalog|stripslashes|strip_tags}</h2>
<div class="news_block">
	<div class="news_title"><span class="blue_txt" style="color:#b2b2b2; font-weight:bold; font-size:12px;">{$item.title|stripslashes|strip_tags}</div>
	<div class="news_body">
		<div class="news_txt" style="width:400px;">
		<p>{$item.description|stripslashes}</p>
		<p><a href="{$item.url}" target="_blank"  style="color:#b2b2b2;"><b>{$settings.go_to_site|stripslashes|strip_tags}</b></a></p>
		</div>
	</div>
</div>


<!--<h2>{$item.new_title|stripslashes|strip_tags}</h2>-->
<!--<div class="news_block" style="color:#ffffff; font-size:11px; text-align: justify; line-height:18px;">-->
<!--	{$item.new_description|stripslashes}-->
<!--</div>-->
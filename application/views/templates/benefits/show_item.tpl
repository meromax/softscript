<h2>{$settings.companynews|stripslashes|strip_tags}</h2>
<div class="news_block">
	<div class="news_title">{$item.new_date|date_format:'%d.%m.%y'} <span class="blue_txt">{$item.new_title|stripslashes|strip_tags}</div>
	<div style='padding-left:0px; font-size:11px; color:#ffffff; line-height:16px;'><p>{$item.new_description|stripslashes}</p></div>
</div>
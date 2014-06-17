<div class="right_col">
	<h3>{$settings.trademarks|stripslashes|strip_tags}</h3>
	<div class="catalog">
		<div class="cat_header"> {$settings.catalog|stripslashes|strip_tags}</div>
		<ul class="cat_box">
			{foreach from=$links item=item}
<!--				<li><a href="{$item.url}" target="_blank">{$item.title|stripslashes}</a></li>-->
				<li><a href="/link{$item.id}.html">{$item.title|stripslashes}</a></li>
			{/foreach}
		</ul>
		<div style="text-align:left; padding:5px 15px 0px 20px;"><a href="/view_links1.html">{$settings.view_all_links|stripslashes|strip_tags}</a></div>
	</div>
</div>
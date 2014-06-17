<h2>{$settings.sitemap|stripslashes|strip_tags}</h2>
<div class="news_block" style='border-bottom:solid 0px #0d0d0d;'>
	<div class="news_title" style="font-size:13px; padding-top:0px; padding-left:40px;">
		<div class="search_text">
			<p>- <a href="/news_page1.html">{$settings.news|stripslashes|strip_tags}</a></p>
			<p>- <a href="/articles_page1.html">{$settings.articles|stripslashes|strip_tags}</a></p>
			<p>- <a href="/contacts.html">{$settings.contacts|stripslashes|strip_tags}</a></p>
			<p>- <a href="/service.html">{$settings.service|stripslashes|strip_tags}</a></p>
			<p>- <a href="/view_links1.html">{$settings.catalog|stripslashes|strip_tags}</a></p>
			<p>- <a href="/aboutus.html">{$settings.aboutus|stripslashes|strip_tags}</a></p>
			<p>- <a href="/links.html">{$settings.links|stripslashes|strip_tags}</a></p>
			<p>- <a href="/faq.html">{$settings.faq|stripslashes|strip_tags}</a></p>
			<p>- <a href="/coordinates.html">{$settings.coordinates|stripslashes|strip_tags}</a></p>
			<p>- <a href="/addressessc.html">{$settings.addressessc|stripslashes|strip_tags}</a></p>
			{if $static_pages_count>0}
			<p>- <a style="cursor:hand; cursor:pointer;" onclick="hideshow();">{$settings.static_pages|stripslashes|strip_tags}</a></p>
			<div id="container" style="padding-left:13px; display:none;" class="static_pages">
				{foreach from=$static_pages item=item}
					<p style="font-size:10px; color:#0276b1;">&#8226; <a href="/content/{$item.link}" style="font-size:11px;">{$item.title|stripslashes|strip_tags}</a></p>
				{/foreach}
			</div>
			{/if}
		</div>
	</div>
</div>
{literal}
<script type="text/javascript">
var flag = 1;
function hideshow(){
	if(flag==1){
		flag = 0;
		$("#container").slideDown();
	} else {
		flag = 1;
		$("#container").slideUp();
		
	}
}
</script>
{/literal}


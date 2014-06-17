<h2>{$frontendLangParams.NEWS_HEADER}</h2>
{foreach from=$lastnews item=item}
<div class="news_box">
	<a href="/new{$item.new_id}.html">{$item.new_title|stripslashes|strip_tags}</a>
	<br />
	{$item.new_description|stripslashes|strip_tags|replace:"&nbsp;":""|truncate:150}
</div>
{/foreach}
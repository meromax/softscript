<div id="content_top" style="margin-top:3px;">
	<div id="header3"><img src="/images/text_top.png" /></div>
</div>
<div id="content_middle">
	<h1 style="padding-left:20px; padding-top:5px;">{$frontendLangParams.LEFT_MENU_CATEGORIES}</h1>
	<div class="sections">
		<ul>
		{foreach from=$items item=item}
			<li><a href="/{$lang_title}/sections/{$item.link}">{$item.title|stripslashes|strip_tags}</a></li>
		{/foreach}
		</ul>	
	</div>
	<br /><br /><br /><br /><br /><br /><br /><br /><br />
	<div id="content_bottom"></div>
</div>
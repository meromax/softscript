<div style="position:absolute; width:99%; height:30px; padding-top:7px; font-weight:bold; font-size:11px;">
<div style="float:right;">
        <form method="post" action="/languages/index/index" name="form_lang">
        	{if $lang_id==1}
        		<span style="color:#ffffff;">RU</span>&nbsp;
        		<a style="cursor:hand; cursor:pointer;" onclick="changeLanguage(2);" title="{$cur_lang.title}">
        			<span style="color:#b2b2b2;">{$cur_lang.short_title}</span>
        		</a>
        		<input type="hidden" name="lang_id" value="2" />
        	{else}
        		<a style="cursor:hand; cursor:pointer;" onclick="changeLanguage(1);" title="{$cur_lang.title}">
        			<span style="color:#b2b2b2;">{$cur_lang.short_title}</span>
        		</a>
        		&nbsp;<span style="color:#ffffff;">EN</span>
        		<input type="hidden" name="lang_id" value="1" />
        	{/if}
        </form>
</div>
</div>
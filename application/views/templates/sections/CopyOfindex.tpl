<div id="content_top">
	{foreach key=key from=$sections item=sitem}
		{if $key==0}
			<span class="header1"><span class="header1_tail"><a href="/{$lang_title}/sections/{$sitem.link}" title="{$sitem.title|stripslashes}">{$sitem.title|stripslashes}</a></span></span>	
		{else}
			{if $key%2!=0}
				<span class="header2"><span class="header2_tail"><a href="/{$lang_title}/sections/{$sitem.link}" title="{$sitem.title|stripslashes}">{$sitem.title|stripslashes}</a></span></span>
			{else}
				<span class="header4"><span class="header4_tail"><a href="/{$lang_title}/sections/{$sitem.link}" title="{$sitem.title|stripslashes}">{$sitem.title|stripslashes}</a></span></span>
			{/if}
		{/if}
	{/foreach}
	<div id="header3"><img src="/images/text_top.png" /></div>
</div>
<div id="content_middle">
	<div class="alltext">
		<h1>{$item.title|stripslashes}</h1>
		{if $item.image!=""}
			<img src="/images/sections/{$item.image}_big.jpg" alt="{$item.title|stripslashes}" alt="{$item.title|stripslashes}" />
		{else}
			<hr />	
		{/if}
		{$item.description|stripslashes} 
	</div>
	<div id="content_bottom"></div>
</div>
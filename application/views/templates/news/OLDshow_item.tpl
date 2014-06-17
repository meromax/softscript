<div id="content_top" style="margin-top:3px;">
	<div id="header3"><img src="/images/text_top.png" /></div>
</div>
<div id="content_middle">
	<h1 style="padding-left:20px;  padding-top:5px;">{$frontendLangParams.NEWS__HEADER}</h1>
	<div class="alltext" style="padding:20px 0px 20px 0px; font-size:14px;">
		{if $item.new_image!=""}
			<img align="left" style="margin:0px 5px 0px 0px;" src="/images/news/{$item.new_image}_original.jpg?time={$smarty.now}" width="200" alt="" title="" border="0" />
		{else}	
			<img align="left" src="/images/default.jpg" style="margin:0px 5px 0px 0px;" alt=""  border="0" width="200" />
		{/if}
		<span style="font-weight:bold;">{$item.new_title|stripslashes|strip_tags}</span>
		<br />
		{$item.new_description|stripslashes|replace:"&nbsp;":""}	
		<br /><br /><br /><br /><br />
	</div>
	<div id="content_bottom"></div>
</div>
<h2>{$settings.companynews|stripslashes|strip_tags}</h2>
<div class="news_box">
	{if $item.new_image!=""}
		<img align="left" src="/images/news/{$item.new_image}_original.jpg?time={$smarty.now}" width="250" alt="" title="" border="0" style="margin-right:6px;" />
	{else}	
		<img align="left" src="/images/pic1.jpg" alt=""  border="0" width="250" style="margin-right:6px;" />
	{/if}
	<span style="font-weight:bold;">{$item.new_title|stripslashes|strip_tags}</span>
	<br /><br />
	{$item.new_description|stripslashes|strip_tags|replace:"&nbsp;":""}
</div>
<br /><br /><br /><br /><br />
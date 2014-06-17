<form action="/order/index/step1" method="post">
<div class="search_h">{$settings.site_type|stripslashes}:</div>
<div class="select">
	<select name="sitetype" id="sitetype" onchange="getCMSBySiteType()">
	{foreach from=$sitetypes item=item}
		<option value="{$item.id}" {if isset($sitetype_selected_id) && $item.id==$sitetype_selected_id} selected {/if}>{$item.title|stripslashes|strip_tags}</option>
	{/foreach}
	</select>
</div>
<div class="search_h">{$settings.system_management|stripslashes}:</div>
<div class="select" id="cms_container">
	<select name="cms" id="cms">
	{foreach from=$cms item=item}
		<option value="{$item.id}">{$item.title|stripslashes|strip_tags}</option>
	{/foreach}
	</select>
</div>
<input class="go_btn" type="image" src="/images/go_btn_{$lang_info.short_title|strtolower}.png">
</form>
<script type="text/javascript">
	getCMSBySiteType();
</script>

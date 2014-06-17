{literal}
<script type="text/javascript">
$(function(){
	$("select#lang_to_id").jqTransform({"/js/jqtransformplugin/img/"});
})
</script>
{/literal}
<select id="lang_to_id" name="lang_to_id">
<option value="0">{$frontendLangParams.TITLE__CHOOSE_LANGUAGE}</option>{foreach from=$languages_to item=lang_item}<option value="{$lang_item.lang_id}">{$lang_item.title|stripslashes|strip_tags}</option>{/foreach}
</select>
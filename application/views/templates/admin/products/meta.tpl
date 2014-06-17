<table style="border:1px solid #b2b2b2;" width="100%">
<tr>
	<td class="header" style="padding:10px 10px 10px 10px;" colspan="2" align="center">{$adminLangParams.META_HEADER}</td>
</tr>				
<tr>
	<td class="header" style="padding:10px 10px 10px 10px;">{$adminLangParams.META_TITLE}</td>
	<td>
		<input type="text" class="input"  id="meta_title" name="meta_title" value="{$item.meta_title|stripslashes}" style="width:710px;">
	</td>
</tr>
<tr>
	<td class="header" style="padding:10px 10px 10px 10px;">{$adminLangParams.META_DESCRIPTION}</td>
	<td>
		<input type="text" class="input"  id="meta_description" name="meta_description" value="{$item.meta_description|stripslashes}" style="width:710px;">
	</td>
</tr>
<tr>
	<td class="header" style="padding:10px 10px 10px 10px;">{$adminLangParams.META_KEYWORDS}</td>
	<td>
		<input type="text" class="input"  id="meta_keywords" name="meta_keywords" value="{$item.meta_keywords|stripslashes}" style="width:710px;">
	</td>
</tr>
<tr>
	<td class="header" style="padding:10px 10px 10px 10px;">{$adminLangParams.META_LINK_TITLE}</td>
	<td>
		<input type="text" class="input"  id="meta_link_title" name="meta_link_title" value="{$item.meta_link_title|stripslashes}" style="width:710px;">
	</td>
</tr>				
</table>
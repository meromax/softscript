<table style="border:1px solid #b2b2b2;">
<tr>
	<td class="header" style="padding:10px 10px 10px 10px;" colspan="2" align="center">{$adminLangParams.META_HEADER}</td>
</tr>				
<tr>
	<td class="header" style="padding:10px 10px 10px 10px;">{$adminLangParams.META_TITLE}</td>
	<td>
		<input type="text" class="input"  id="meta_title" name="meta_title" value="{$banner.meta_title|stripslashes}" style="width:730px;">
	</td>
</tr>
<tr>
	<td class="header" style="padding:10px 10px 10px 10px;">{$adminLangParams.META_DESCRIPTION}</td>
	<td>
		<input type="text" class="input"  id="meta_description" name="meta_description" value="{$banner.meta_description|stripslashes}" style="width:730px;">
	</td>
</tr>
<tr>
	<td class="header" style="padding:10px 10px 10px 10px;">{$adminLangParams.META_KEYWORDS}</td>
	<td>
		<input type="text" class="input"  id="meta_keywords" name="meta_keywords" value="{$banner.meta_keywords|stripslashes}" style="width:730px;">
	</td>
</tr>
<tr>
	<td class="header" style="padding:10px 10px 10px 10px;">{$adminLangParams.META_LINK_TITLE}</td>
	<td>
		<input type="text" class="input"  id="meta_link_title" name="meta_link_title" value="{$banner.meta_link_title|stripslashes}" style="width:730px;">
	</td>
</tr>				
</table>
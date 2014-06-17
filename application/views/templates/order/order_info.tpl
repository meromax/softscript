<table>
<tr>
		<td width="30%" style="font-size:12px;">
			{$design.design_title|stripslashes|strip_tags}<br />
			<img src="/images/design/{$design.design_image}_original.jpg" width="100%" border="0" />
		</td>
		<td width="70%" style="font-size:12px; padding-left:25px; padding-top:15px;" class="content_text">
			<p><b>{$frontendLangParams.ORDER_SITETYPE}:</b> {$sitetype.title|stripslashes|strip_tags}</p>
			<p><b>{$frontendLangParams.ORDER_CMS}:</b> {$cms.title|stripslashes|strip_tags}</p>
			<p><b>{$frontendLangParams.ORDER_SITENAME}:</b> {$order.sitename|stripslashes|strip_tags}</p>
			<p><b>{$frontendLangParams.ORDER_DOMAIN}:</b> {$order.domain|stripslashes|strip_tags}</p>
			<p><b>{$frontendLangParams.ORDER_PRICE}:</b> {$order.price|stripslashes|strip_tags}</p>
		</td>
</tr>
</table>
<br />
<table width="100%"  style="border:0px;">
<tr>
	<td align="center" style="border:0px; padding-bottom: 10px;">
		<span style="font-size:14px;">
            <a href="/admin/products/modify/id/{$product.id}" target="_blank">{$product.title|stripslashes}</a>
		</span>
	</td>
</tr>
<tr>
	<td style="border:0px;">
		<div style="overflow:auto; height:400px;">
            <img src="/images/products/{$product.image}_small.jpg" align="left" />
			{$product.description|stripslashes|strip_tags}
		</div>
	</td>
</tr>
</table>
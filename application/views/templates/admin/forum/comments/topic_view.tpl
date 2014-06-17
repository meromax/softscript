<table width="100%"  style="border:0px;">
<tr>
	<td align="center" style="border:0px; padding-bottom: 10px;">
		<span style="font-size:14px;">
            <a href="/admin/forum/modify-forum/id/{$forum.id}" target="_blank">{$forum.title|stripslashes}</a>
		</span>
	</td>
</tr>
<tr>
	<td style="border:0px;">
		<div style="overflow:auto; height:400px;">
			{$forum.description|stripslashes|strip_tags}
		</div>
	</td>
</tr>
</table>
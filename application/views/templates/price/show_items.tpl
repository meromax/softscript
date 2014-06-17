<link rel="stylesheet" href="/js/prettyPhoto_3.0b/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
<script src="/js/prettyPhoto_3.0b/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
{literal}
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$("a[rel^='prettyPhoto']").prettyPhoto();
	});
</script>	
{/literal}
<h2>{$frontendLangParams.PRICE_HEADER}</h2>

<table class="price" cellpadding="0" cellspacing="0">
<tr>
	<td class="price_td_name">{$frontendLangParams.PRICE_NAME}</td>
	<td class="price_td_file" align="center">{$frontendLangParams.PRICE_ADDFILE}</td>
	<td class="price_td_price">{$frontendLangParams.PRICE_PRICE}</td>
</tr>
{foreach from=$price item=item}
<tr>
	<td class="price_td_name_d">
		<div>{$item.description|stripslashes}</div>
	</td>
	<td class="price_td_file_d" align="center">
		{if $item.image!=""}
			<a href="/images/price/{$item.image}_middle.jpg?time={$smarty.now}" rel="prettyPhoto[mixed]">{$frontendLangParams.PRICE_IMAGE_SHOW}</a>
		{/if}
	</td>
	<td class="price_td_price_d">
		{$item.price}
	</td>
</tr>
{/foreach}
<tr>
	<td colspan="3" class="price_download_p">
		<table>
		{if $files_count>0}
		<tr>
			<td colspan="2" class="price_download">{$frontendLangParams.PRICE_DOWNLOAD}</td>
		</tr>
		{foreach from=$files item=file}
		<tr>
			<td width="15"><img src="/images/download.gif" width="15" alt="" /></td>
			<td><a href="/download{$file.id}.html">{$file.title|stripslashes|strip_tags}</a></td>
		</tr>
		{/foreach}
		{/if}		
		<tr>
			<td></td>
			<td></td>
		</tr>		
		</table>		
	</td>
</tr>
</table>

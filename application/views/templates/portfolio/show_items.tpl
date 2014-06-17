<link rel="stylesheet" href="/js/prettyPhoto_3.0b/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
<script src="/js/prettyPhoto_3.0b/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
{literal}
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto();
		});
	</script>
{/literal}

<table cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%"><h2>{$frontendLangParams.PORTFOLIO__HEADER}</h2></td>
	<td width="50%" align="right">
		<select name="category" id="category" onchange="changeSC();">
		<option value="s0-c0" {if $section_id==0 && $category_id==0}selected{/if}> - {$frontendLangParams.PORTFOLIO__CHOOSE_SEC_OR_CAT} - </option>
		{foreach from=$left_navigation item=item}
			<option value="s{$item.id}-c0" {if $section_id==$item.id && $category_id==0}selected{/if}>{$item.title|stripslashes|strip_tags}</option>
			{foreach from=$item.categories item=cat}
				<option value="s{$item.id}-c{$cat.id}" {if $section_id==$item.id && $category_id==$cat.id}selected{/if}> - {$cat.title|stripslashes|strip_tags}</option>
			{/foreach}
		{/foreach}
		</select>	
	</td>
</tr>
</table>

{if $items_count>0}
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td width="100%">
		<div>
			{foreach from=$items item=item key=key}
			<div class="portfolio_main_box">
<!--				<div class="diz"><span><a href="/portfolio{$item.portfolio_id}.html" title="{$settings.readmore|stripslashes|strip_tags}"><img src="/images/portfolio/{$item.portfolio_image}_middle.jpg" alt="" /></a></span></div>-->
				<div class="diz"><a href="/images/portfolio/{$item.portfolio_image}_big.jpg?time={$smarty.now}" rel="prettyPhoto[mixed]" title="{$item.portfolio_description|strip_tags|stripslashes}"><img src="/images/portfolio/{$item.portfolio_image}_middle.jpg" alt="" /></a></div>
				<div class="teg">{$item.portfolio_title|stripslashes}</div>
			</div>
			<div style="float:left; width:30px;">&nbsp;</div>
			{if $key%2==1}
			<div class="portfolio_separator">&nbsp;</div>
			{/if}
			{/foreach}
		</div>	
		<br />
		<div class="content_container" style="float:left; width:500px;">
			{if $page_count>1 }
			<span style="color:#323232; font-size:12px;">{$settings.pages|stripslashes|strip_tags}: </span>
			{section name=item start=1 loop=$page_count+1 }
			  {if $page_num eq $smarty.section.item.index }
			    <span style="color:#323232; font-size:12px; font-weight:bold;">{$page_num}</span>
			  {else}
			    <a href="/portfolio-page{$smarty.section.item.index}-s{$section_id}-c{$category_id}.html" style="color:#323232; font-size:12px;">{$smarty.section.item.index}</a>
			  {/if}
			  {if $smarty.section.item.index != $page_count }
			  {/if}
			{/section}
			{/if}
			<br />
		</div>		
	</td>
</tr>
</table>
{else}
<br /><br /><br /><br /><br /><br /><br />
{/if}
{literal}
<script type="text/javascript">

function changeSC(){
	document.location='/portfolio-page1-'+$("#category").val()+'.html';
}
</script>
{/literal}
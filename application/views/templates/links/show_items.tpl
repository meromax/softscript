<h2>{$settings.catalog|stripslashes|strip_tags}</h2>
{foreach from=$items item=item}
	<div class="news_block">
		<div class="news_title"><span class="blue_txt" style="color:#b2b2b2; font-weight:bold; font-size:12px;">
			{$item.title|stripslashes|strip_tags}
		</div>
		<div class="news_body">
		<div class="news_txt" style="width:400px;">
			<p>{$item.description|replace:"&nbsp;":""|stripslashes|strip_tags|strip|truncate:400}</p>
			<table width="100%">
			<tr>
				<td width="30%" align="left">
					<p><a href="/link{$item.id}.html">{$settings.readmore|stripslashes|strip_tags}</a></p>
				</td>
				<td width="70%" align="right">
					<p><a href="{$item.url}" target="_blank"  style="color:#b2b2b2;"><b>{$settings.go_to_site|stripslashes|strip_tags}</b></a></p>
				</td>
			</tr>
			</table>
		</div>
		</div>
	</div>
{/foreach}
<br />
{if $page_count>1 }
<span style="color:#0276b1; font-size:11px;">{$settings.pages|stripslashes|strip_tags}: </span>
{section name=item start=1 loop=$page_count+1 }
  {if $page_num eq $smarty.section.item.index }
    <span style="color:#000000; font-size:11px;" >{$page_num}</span>
  {else}
    <a href="/view_links{$smarty.section.item.index}.html" style="font-size:11px; text-decoration:none;">{$smarty.section.item.index}</a>
  {/if}
  {if $smarty.section.item.index != $page_count }
  {/if}
{/section}
{/if}
<br /><br />

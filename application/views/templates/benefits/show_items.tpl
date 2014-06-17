<h2>{$settings.companynews|stripslashes|strip_tags}</h2>
{foreach from=$items item=item}
	<div class="news_block">
		<div class="news_title">{$item.new_date|date_format:'%d.%m.%y'} <span class="blue_txt">{$item.new_title|stripslashes|strip_tags}</div>
			<div class="news_body">
			<div class="news_pic"><a href="#">
				{if $item.new_image!=""}
					<a href="/news/{$item.new_id}" rel="lightbox"><img align="absmiddle" src="/images/news/{$item.new_image}_small.jpg?time={$smarty.now}" alt="" title="" border="0" /></a>
				{else}	
					<a href="/news/{$item.new_id}" rel="lightbox"><img src="/images/pic1.jpg" alt=""  border="0" /></a>
				{/if}
				
			</div>
			<div class="news_txt">
				<p>{$item.new_description|stripslashes|strip_tags|truncate:280}</p>
				<p><a href="/new{$item.new_id}.html">{$settings.readmore|stripslashes|strip_tags}</a></p>
			</div>
		</div>
	</div>
{/foreach}
<br />
{if $page_count>1 }
<span style="color:#0276b1; font-size:11px;">{$settings.pages|stripslashes|strip_tags}: </span>
{section name=item start=1 loop=$page_count+1 }
  {if $page_num eq $smarty.section.item.index }
    <span style="color:#0276b1; font-size:11px;" >{$page_num}</span>
  {else}
    <a href="/news_page{$smarty.section.item.index}.html" style="font-size:11px; text-decoration:none;">{$smarty.section.item.index}</a>
  {/if}
  {if $smarty.section.item.index != $page_count }
  {/if}
{/section}
{/if}
<br /><br />

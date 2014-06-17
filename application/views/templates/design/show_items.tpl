{literal}

	<script type="text/javascript" src="/js/jquery-lightbox/js/jquery.lightbox-0.5.js"></script> 
    <link rel="stylesheet" type="text/css" href="/js/jquery-lightbox/css/jquery.lightbox-0.5.css" media="screen" />

    <!-- Ativando o jQuery lightBox plugin --> 
    <script type="text/javascript"> 

    $(function() {
        $('#gallery a').lightBox({
     	overlayBgColor: '#395874',
     	overlayOpacity: 0.7,
     	imageLoading:  '{/literal}{$site_url}{literal}/js/jquery-lightbox/images/lightbox-ico-loading.gif',
     	imageBtnClose: '{/literal}{$site_url}/js/jquery-lightbox/images/lightbox-btn-close.gif?time=11{literal}',
     	imageBtnPrev:  '{/literal}{$site_url}/js/jquery-lightbox/images/lightbox-btn-prev_{$cur_active_lang}.gif{literal}',
     	imageBtnNext:  '{/literal}{$site_url}/js/jquery-lightbox/images/lightbox-btn-next_{$cur_active_lang}.gif?dsdasd{literal}',
 		imageBlank:	   '{/literal}{$site_url}{literal}/js/jquery-lightbox/images/lightbox-blank.gif',
     	containerResizeSpeed: 350,
     	txtImage: '',
     	txtOf: {/literal}{$frontendLangParams.LIGHTNBOX_OF}{literal}
        });
     });
    </script> 

{/literal}

<div class="header_txt3">{$settings.design_choice|stripslashes|strip_tags}</div>
<div class="disignes" id="gallery">
	{foreach from=$items item=item}
	<div class="diz_box">
		<div class="diz">
			<a href="/images/design/{$item.design_image}_big.jpg" title="{$item.design_title|stripslashes|strip_tags|truncate:100}"> 
				<img src="/images/design/{$item.design_image}_middle.jpg" alt="" />
			</a>	
		
		</div>
		<div class="teg">{$item.design_title|stripslashes|strip_tags|truncate:100}</div>
		<div class="order_btn">
			<form action="/order/index/prestep3" method="post" name="order_design_form{$item.design_id}">
				<input type="hidden" name="design_id" value="{$item.design_id}" />
				<img src="/images/order_btn2_{$lang_info.short_title|strtolower}.png" alt="" style="cursor:hand; cursor:pointer;" onclick="orderDesign('order_design_form{$item.design_id}');" />
			</form>
		</div>
	</div>
	{/foreach}
</div>
<div class="content_container">
	{if $page_count>1 }
	<span style="color:#0095B3; font-size:12px;">{$settings.pages|stripslashes|strip_tags}: </span>
	{section name=item start=1 loop=$page_count+1 }
	  {if $page_num eq $smarty.section.item.index }
	    <span style="color:#0095B3; font-size:14px;">{$page_num}</span>
	  {else}
	    <a href="/step2_page{$smarty.section.item.index}.html">{$smarty.section.item.index}</a>
	  {/if}
	  {if $smarty.section.item.index != $page_count }
	  {/if}
	{/section}
	{/if} 
</div>

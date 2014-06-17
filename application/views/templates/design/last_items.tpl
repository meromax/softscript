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
<div class="header_txt_1">{$settings.new_designs|stripslashes}</div>
<div id="gallery">
{foreach from=$lastdesign item=item}
	<div class="diz">
			<a href="/images/design/{$item.design_image}_big.jpg" title="{$item.design_title|stripslashes|strip_tags|truncate:100}"> 
				<img src="/images/design/{$item.design_image}_middle.jpg" alt="" />
			</a>	
	</div>
{/foreach}
</div>
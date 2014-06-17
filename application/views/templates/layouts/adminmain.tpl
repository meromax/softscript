<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	{assign var=imgDir value="/images/admin"}
	<title>{$Title|stripslashes}</title>
    <link rel="shortcut icon" href="/images/favicon.ico?time={$smarty.now}" />
	<script src="/js/jquery-latest.js" type="text/javascript"></script>
    <script src="/js/admin.js" type="text/javascript"></script>
	<link href="{$site_url}/css/admin.css" type=text/css rel=stylesheet>
	<script language=javascript src="{$site_url}/js/transmenu.js" type="text/javascript"></script>
	<script language=javascript src="{$site_url}/js/dynamic.js" type="text/javascript"></script>

	<script type="text/javascript" src="/library/fckeditor/fckeditor.js"></script> 
	<script type="text/javascript" src="/js/lightbox.js"></script> 
	<script type="text/javascript" src="/js/jquery-lightbox/js/jquery.lightbox-0.5.js"></script> 
    <link rel="stylesheet" type="text/css" href="/js/jquery-lightbox/css/jquery.lightbox-0.5.css" media="screen" />

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	{literal}
    <script type="text/javascript"> 

    $(function() {
       $('#gallery span a').lightBox({
    	overlayBgColor: '#000000',
    	overlayOpacity: 0.7,
    	imageLoading:  '{/literal}{$site_url}{literal}/js/jquery-lightbox/images/lightbox-ico-loading.gif',
    	imageBtnClose: '{/literal}{$site_url}{literal}/js/jquery-lightbox/images/lightbox-btn-close.gif?time=11',
    	imageBtnPrev:  '{/literal}{$site_url}{literal}/js/jquery-lightbox/images/lightbox-btn-prev_RU.gif',
    	imageBtnNext:  '{/literal}{$site_url}{literal}/js/jquery-lightbox/images/lightbox-btn-next_RU.gif?dsdasd',
		imageBlank:	   '{/literal}{$site_url}{literal}/js/jquery-lightbox/images/lightbox-blank.gif',
    	containerResizeSpeed: 350,
    	fixedNavigation:true,
    	txtImage: '',
    	txtOf: {/literal}{$adminLangParams.TITLE_LIGHTBOX_FROM}{literal}

       });
    });
    </script>	
	<script type="text/javascript">
	
	function init() {
	
		if (TransMenu.isSupported()) {
			TransMenu.initialize();
		}
	}

	function hideover(id, image){
		document.getElementById(id).src="/images/admin/"+image;	
	}
	
	</script>
	<link rel="stylesheet" href="/js/prettyPhoto_3.0b/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
	<script src="/js/prettyPhoto_3.0b/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto();
		});
	</script>	
	{/literal}
</head>
<body style="margin: 0px; background-repeat: repeat-x;">
{if $loginAdmin}
<table style="margin: 0px" cellspacing="0" cellpadding="0" height="100%" width="100%" border=0 bgcolor="#efefef">
<tr>
	<td valign="top">
		<table style="margin: 0px" cellSpacing="0" cellPadding="0" width="100%" border=0>
		<tr>
			<td style="background-image: url({$imgDir}/hrule.gif); width: 100%; background-repeat: repeat-x; height: 5px"></td>
		</tr>
		<tr>
			<td valign="top">
			<form method="post" action="{$request_uri}" name="form_lang">
				<table class="top" cellSpacing="0" cellPadding="0" width="100%" bgcolor="#000000" border="0">
				<tr>
					<td style="color:#ffffff">
                        <img title="Administration Area" height="50px" width="448px" alt="Administration Area" src="{$imgDir}/adminarea_{$lang_short_title}.png">
                    </td>
					<td style="color:#ffffff; padding-right:5px;" align="right">
						<a href="{$site_url}/admin" style="color:#ffffff;" onmouseover="hideover('img_home', 'home_over_{$lang_short_title}.jpg');" onmouseout="hideover('img_home', 'home_{$lang_short_title}.jpg');"><img alt="Home" id="img_home" hspace="0" src="{$imgDir}/home_{$lang_short_title}.jpg" border="0"></a>&nbsp;&nbsp;
						<a href="{$site_url}/admin/pass" style="color:#ffffff;" onmouseover="hideover('img_password', 'changepassword-over_{$lang_short_title}.jpg');" onmouseout="hideover('img_password', 'changepassword_{$lang_short_title}.jpg');"><img id="img_password" alt="Change Password" hspace="0" src="{$imgDir}/changepassword_{$lang_short_title}.jpg" border="0"></a>&nbsp;&nbsp;
						<a href="{$site_url}/admin/logout.html" style="color:#ffffff;"  onmouseover="hideover('img_logout', 'logout_over_{$lang_short_title}.jpg');" onmouseout="hideover('img_logout', 'logout_{$lang_short_title}.gif');"><img id="img_logout" alt="Logout" hspace="0" src="{$imgDir}/logout_{$lang_short_title}.gif" border="0"></a>&nbsp;&nbsp;
					</td>
					<td width="5"></td>
				</tr>
				<tr>
					<td colspan="4" style="background:#48484C;" width="100%">
						<table cellpadding="0" cellspacing="0" border="0" style=" border:0px solid lime; height:30px;">
						<tr>
							<td nowrap="nowrap">
								<div id="topmenu">
									<div id="mtm_menu">
									{if $loginAdminInfo->status}
										<a id="mtm_CMS_Pages" href="#" {if $adminTopMenu=='content'}class="hover"{/if}>{$adminLangParams.MENU_CONTENT}</a>
                                        {*<a id="mtm_CMS_Forum" href="/admin/forum/index/page/1" {if $adminTopMenu=='forum'}class="hover"{/if}>Форум</a>*}
                                        <a id="mtm_CMS_Banners" href="/admin/banners/index/page/1">{$adminLangParams.BANNERS_HEADER}</a>
                                        <a id="mtm_CMS_Products" href="/admin/sections/index/page/1" {if $adminTopMenu=='sections'}class="hover"{/if}>Разделы товаров</a>
                                        <a id="mtm_CMS_Products" href="/admin/products/index/page/1" {if $adminTopMenu=='products'}class="hover"{/if}>{$adminLangParams.PRODUCTS__HEADER}</a>
                                        {*<a id="mtm_CMS_Options" href="/admin/options/index/page/1" {if $adminTopMenu=='options'}class="hover"{/if}>Опции товара</a>*}
                                        {*<a id="mtm_CMS_Delivery" href="/admin/delivery/index/page/1" {if $adminTopMenu=='delivery'}class="hover"{/if}>Доставка</a>*}
                                        {*<a id="mtm_CMS_Products" href="/admin/deals/index/type/0/page/1" {if $adminTopMenu=='deals'}class="hover"{/if}>Новинки / Акции / Горячие предложения</a>*}

                                        {*<a id="mtm_CMS_Brands" href="/admin/brands/index/page/1" {if $adminTopMenu=='brands'}class="hover"{/if}>Бренды</a>*}
                                        {*<a id="mtm_CMS_Files" href="/admin/files/index/page/1" {if $adminTopMenu=='files'}class="hover"{/if}>Документы</a>*}
										{*<a id="mtm_languages" href="/admin/languages/index/page/1">{$adminLangParams.MENU__LANGUAGES}</a>*}
									{/if}	
										<a id="mtm_orders" href="/admin/orders/index/page/1" {if $adminTopMenu=='orders'}class="hover"{/if}>{$adminLangParams.MENU__ORDERS}</a>
									{if $loginAdminInfo->status}
                                    <!--
										<a id="mtm_calculator" href="/admin/calculator">{$adminLangParams.MENU__CALCULATOR}</a>
										<a id="mtm_operators" href="/admin/operators/index/page/1">{$adminLangParams.MENU__OPERATORS}</a>
										-->
									{/if}	
									<a id="mtm_users" href="/admin/users/index/page/1">{$adminLangParams.MENU__USERS}</a>

									{if $loginAdminInfo->status}
                                        {*<a id="mtm_users" href="/admin/users/index/page/1" {if $adminTopMenu=='users'}class="hover"{/if}>{$adminLangParams.MENU__USERS}</a>*}
                                        {*<a id="mtm_Reviews" href="/admin/reviews/index/page/1" {if $adminTopMenu=='reviews'}class="hover"{/if}>Отзывы</a>*}
										<a id="mtm_Settings" href="/admin/settings/page" {if $adminTopMenu=='settings'}class="hover"{/if}>{$adminLangParams.MENU_SETTINGS}</a>
                                        {*<a id="mtm_Prices" href="/admin/price/index">{$adminLangParams.MENU__PRICES}</a>*}
                                        {*<a id="mtm_Prices" href="/admin/site/index">{$adminLangParams.MENU__SITES}</a>*}
									{/if}
									</div>
									{include file='layouts/admin_menu.tpl'}
									<script type="text/javascript">
										{literal}
											if (TransMenu.isSupported()) {
												
												var ms = new TransMenuSet(TransMenu.direction.down, 1, 0, TransMenu.reference.bottomLeft);
												
												var menu1 = ms.addMenu(document.getElementById("mtm_CMS_Pages"));
												menu1.addItem(menu_item_1_1, "/admin/content");
												menu1.addItem(menu_item_1_2, "/admin/news/page/1");
                                                //menu1.addItem("Новинки / Акции / Горячие предложения", "/admin/deals/index/type/0/page/1");
                                                //menu1.addItem(menu_item_1_3, "/admin/articles/page/1");
												//menu1.addItem(menu_item_1_5, "/admin/sections/index/page/1");
												//menu1.addItem(menu_item_1_4, "/admin/reviews/index/page/1");
												//menu1.addItem(menu_item_1_7, "/admin/tthemes/index/page/1");
												TransMenu.renderAll();
												
												
											}
										{/literal}
									</script>
									
								</div>
							</td>
							{if $loginAdminInfo->status}
                            <!--
							<td style="color:#ffffff; padding-left:8px">|&nbsp;&nbsp;
								{$adminLangParams.MENU_LANGUAGE}:
								<select name="admin_lang" id="admin_lang" onchange="javascript:document.forms.form_lang.submit();" style="height:20px; width:100px; background:#000000; *background:#ffffff;  color:#ffff00; *color:#000000; font-weight:bold;">
									{foreach from=$languages item=lang}
										<option value="{$lang.lang_id}" {if $lang.lang_id==$admin_lang_id} selected {/if} >{$lang.title|stripslashes|strip_tags}</option>
									{/foreach}
								</select>
							</td>
							
							<td style="padding-left:5px; *padding-top:2px;" valign="middle">
								<img src="/languages/{$activeLanguage.short_title_lower}/{$activeLanguage.flag_image}_flag.jpg" width="26" height="18"  />
							</td>
							{/if}
							-->
						</tr>
						</table>
					</td>
				</tr>
				</table>
				</form>
			</td>
		</tr>
		<tr>
			<td style="background-image: url({$imgDir}/hrule.gif); width: 100%; background-repeat: repeat-x; height: 5px"></td>
		</tr>
		</table>
		{include file="$PageBody"}
	</td>
</tr>
<tr>
	<td height="100" valign="bottom">
		<table class="bottom" cellSpacing="0" cellPadding="0" width="100%" bgColor="#000000" border="0">
		<tr>
			<td style="background-image: url({$imgDir}/hrule.gif); width: 100%; background-repeat: repeat-x; height: 5px" colspan="2"></td>
		</tr>
		<tr>
			<td width="190"><a href="#" target="_blank">http://{$smarty.server.SERVER_NAME}/</a></td>
			<td align="right">&copy;2012</td></tr>
		<tr>
			<td style="background-image: url({$imgDir}/hrule.gif); width: 100%; background-repeat: repeat-x; height: 5px; background-color: #ffffff" colSpan="2">
		</td>
		</tr>
		</table>
	</td>
</tr>
</table>
<script type="text/javascript">
	init();
</script>
{else}
<table cellpadding="0" cellspacing="0" width="100%" height="100%" bgcolor="#efefef">
<tr>
	<td valign="middle" align="center">{include file="$PageBody"}</td>
</tr>
</table>
{/if}
</body>
</html>
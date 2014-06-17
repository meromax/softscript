<?php /* Smarty version 2.6.18, created on 2014-02-03 17:59:42
         compiled from layouts/adminmain.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'layouts/adminmain.tpl', 5, false),array('modifier', 'strip_tags', 'layouts/adminmain.tpl', 156, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<?php $this->assign('imgDir', "/images/admin"); ?>
	<title><?php echo ((is_array($_tmp=$this->_tpl_vars['Title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</title>
    <link rel="shortcut icon" href="/images/favicon.ico?time=<?php echo time(); ?>
" />
	<script src="/js/jquery-latest.js" type="text/javascript"></script>
    <script src="/js/admin.js" type="text/javascript"></script>
	<link href="<?php echo $this->_tpl_vars['site_url']; ?>
/css/admin.css" type=text/css rel=stylesheet>
	<script language=javascript src="<?php echo $this->_tpl_vars['site_url']; ?>
/js/transmenu.js" type="text/javascript"></script>
	<script language=javascript src="<?php echo $this->_tpl_vars['site_url']; ?>
/js/dynamic.js" type="text/javascript"></script>

	<script type="text/javascript" src="/library/fckeditor/fckeditor.js"></script> 
	<script type="text/javascript" src="/js/lightbox.js"></script> 
	<script type="text/javascript" src="/js/jquery-lightbox/js/jquery.lightbox-0.5.js"></script> 
    <link rel="stylesheet" type="text/css" href="/js/jquery-lightbox/css/jquery.lightbox-0.5.css" media="screen" />

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<?php echo '
    <script type="text/javascript"> 

    $(function() {
       $(\'#gallery span a\').lightBox({
    	overlayBgColor: \'#000000\',
    	overlayOpacity: 0.7,
    	imageLoading:  \''; ?>
<?php echo $this->_tpl_vars['site_url']; ?>
<?php echo '/js/jquery-lightbox/images/lightbox-ico-loading.gif\',
    	imageBtnClose: \''; ?>
<?php echo $this->_tpl_vars['site_url']; ?>
<?php echo '/js/jquery-lightbox/images/lightbox-btn-close.gif?time=11\',
    	imageBtnPrev:  \''; ?>
<?php echo $this->_tpl_vars['site_url']; ?>
<?php echo '/js/jquery-lightbox/images/lightbox-btn-prev_RU.gif\',
    	imageBtnNext:  \''; ?>
<?php echo $this->_tpl_vars['site_url']; ?>
<?php echo '/js/jquery-lightbox/images/lightbox-btn-next_RU.gif?dsdasd\',
		imageBlank:	   \''; ?>
<?php echo $this->_tpl_vars['site_url']; ?>
<?php echo '/js/jquery-lightbox/images/lightbox-blank.gif\',
    	containerResizeSpeed: 350,
    	fixedNavigation:true,
    	txtImage: \'\',
    	txtOf: '; ?>
<?php echo $this->_tpl_vars['adminLangParams']['TITLE_LIGHTBOX_FROM']; ?>
<?php echo '

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
			$("a[rel^=\'prettyPhoto\']").prettyPhoto();
		});
	</script>	
	'; ?>

</head>
<body style="margin: 0px; background-repeat: repeat-x;">
<?php if ($this->_tpl_vars['loginAdmin']): ?>
<table style="margin: 0px" cellspacing="0" cellpadding="0" height="100%" width="100%" border=0 bgcolor="#efefef">
<tr>
	<td valign="top">
		<table style="margin: 0px" cellSpacing="0" cellPadding="0" width="100%" border=0>
		<tr>
			<td style="background-image: url(<?php echo $this->_tpl_vars['imgDir']; ?>
/hrule.gif); width: 100%; background-repeat: repeat-x; height: 5px"></td>
		</tr>
		<tr>
			<td valign="top">
			<form method="post" action="<?php echo $this->_tpl_vars['request_uri']; ?>
" name="form_lang">
				<table class="top" cellSpacing="0" cellPadding="0" width="100%" bgcolor="#000000" border="0">
				<tr>
					<td style="color:#ffffff">
                        <img title="Administration Area" height="50px" width="448px" alt="Administration Area" src="<?php echo $this->_tpl_vars['imgDir']; ?>
/adminarea_<?php echo $this->_tpl_vars['lang_short_title']; ?>
.png">
                    </td>
					<td style="color:#ffffff; padding-right:5px;" align="right">
						<a href="<?php echo $this->_tpl_vars['site_url']; ?>
/admin" style="color:#ffffff;" onmouseover="hideover('img_home', 'home_over_<?php echo $this->_tpl_vars['lang_short_title']; ?>
.jpg');" onmouseout="hideover('img_home', 'home_<?php echo $this->_tpl_vars['lang_short_title']; ?>
.jpg');"><img alt="Home" id="img_home" hspace="0" src="<?php echo $this->_tpl_vars['imgDir']; ?>
/home_<?php echo $this->_tpl_vars['lang_short_title']; ?>
.jpg" border="0"></a>&nbsp;&nbsp;
						<a href="<?php echo $this->_tpl_vars['site_url']; ?>
/admin/pass" style="color:#ffffff;" onmouseover="hideover('img_password', 'changepassword-over_<?php echo $this->_tpl_vars['lang_short_title']; ?>
.jpg');" onmouseout="hideover('img_password', 'changepassword_<?php echo $this->_tpl_vars['lang_short_title']; ?>
.jpg');"><img id="img_password" alt="Change Password" hspace="0" src="<?php echo $this->_tpl_vars['imgDir']; ?>
/changepassword_<?php echo $this->_tpl_vars['lang_short_title']; ?>
.jpg" border="0"></a>&nbsp;&nbsp;
						<a href="<?php echo $this->_tpl_vars['site_url']; ?>
/admin/logout.html" style="color:#ffffff;"  onmouseover="hideover('img_logout', 'logout_over_<?php echo $this->_tpl_vars['lang_short_title']; ?>
.jpg');" onmouseout="hideover('img_logout', 'logout_<?php echo $this->_tpl_vars['lang_short_title']; ?>
.gif');"><img id="img_logout" alt="Logout" hspace="0" src="<?php echo $this->_tpl_vars['imgDir']; ?>
/logout_<?php echo $this->_tpl_vars['lang_short_title']; ?>
.gif" border="0"></a>&nbsp;&nbsp;
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
									<?php if ($this->_tpl_vars['loginAdminInfo']->status): ?>
										<a id="mtm_CMS_Pages" href="#" <?php if ($this->_tpl_vars['adminTopMenu'] == 'content'): ?>class="hover"<?php endif; ?>><?php echo $this->_tpl_vars['adminLangParams']['MENU_CONTENT']; ?>
</a>
                                                                                <a id="mtm_CMS_Banners" href="/admin/banners/index/page/1"><?php echo $this->_tpl_vars['adminLangParams']['BANNERS_HEADER']; ?>
</a>
                                        <a id="mtm_CMS_Products" href="/admin/sections/index/page/1" <?php if ($this->_tpl_vars['adminTopMenu'] == 'sections'): ?>class="hover"<?php endif; ?>>Разделы товаров</a>
                                        <a id="mtm_CMS_Products" href="/admin/products/index/page/1" <?php if ($this->_tpl_vars['adminTopMenu'] == 'products'): ?>class="hover"<?php endif; ?>><?php echo $this->_tpl_vars['adminLangParams']['PRODUCTS__HEADER']; ?>
</a>
                                                                                                                        
                                                                                																			<?php endif; ?>	
										<a id="mtm_orders" href="/admin/orders/index/page/1" <?php if ($this->_tpl_vars['adminTopMenu'] == 'orders'): ?>class="hover"<?php endif; ?>><?php echo $this->_tpl_vars['adminLangParams']['MENU__ORDERS']; ?>
</a>
									<?php if ($this->_tpl_vars['loginAdminInfo']->status): ?>
                                    <!--
										<a id="mtm_calculator" href="/admin/calculator"><?php echo $this->_tpl_vars['adminLangParams']['MENU__CALCULATOR']; ?>
</a>
										<a id="mtm_operators" href="/admin/operators/index/page/1"><?php echo $this->_tpl_vars['adminLangParams']['MENU__OPERATORS']; ?>
</a>
										-->
									<?php endif; ?>	
									<a id="mtm_users" href="/admin/users/index/page/1"><?php echo $this->_tpl_vars['adminLangParams']['MENU__USERS']; ?>
</a>

									<?php if ($this->_tpl_vars['loginAdminInfo']->status): ?>
                                                                                										<a id="mtm_Settings" href="/admin/settings/page" <?php if ($this->_tpl_vars['adminTopMenu'] == 'settings'): ?>class="hover"<?php endif; ?>><?php echo $this->_tpl_vars['adminLangParams']['MENU_SETTINGS']; ?>
</a>
                                                                                									<?php endif; ?>
									</div>
									<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'layouts/admin_menu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
									<script type="text/javascript">
										<?php echo '
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
										'; ?>

									</script>
									
								</div>
							</td>
							<?php if ($this->_tpl_vars['loginAdminInfo']->status): ?>
                            <!--
							<td style="color:#ffffff; padding-left:8px">|&nbsp;&nbsp;
								<?php echo $this->_tpl_vars['adminLangParams']['MENU_LANGUAGE']; ?>
:
								<select name="admin_lang" id="admin_lang" onchange="javascript:document.forms.form_lang.submit();" style="height:20px; width:100px; background:#000000; *background:#ffffff;  color:#ffff00; *color:#000000; font-weight:bold;">
									<?php $_from = $this->_tpl_vars['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang']):
?>
										<option value="<?php echo $this->_tpl_vars['lang']['lang_id']; ?>
" <?php if ($this->_tpl_vars['lang']['lang_id'] == $this->_tpl_vars['admin_lang_id']): ?> selected <?php endif; ?> ><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
									<?php endforeach; endif; unset($_from); ?>
								</select>
							</td>
							
							<td style="padding-left:5px; *padding-top:2px;" valign="middle">
								<img src="/languages/<?php echo $this->_tpl_vars['activeLanguage']['short_title_lower']; ?>
/<?php echo $this->_tpl_vars['activeLanguage']['flag_image']; ?>
_flag.jpg" width="26" height="18"  />
							</td>
							<?php endif; ?>
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
			<td style="background-image: url(<?php echo $this->_tpl_vars['imgDir']; ?>
/hrule.gif); width: 100%; background-repeat: repeat-x; height: 5px"></td>
		</tr>
		</table>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['PageBody']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
<tr>
	<td height="100" valign="bottom">
		<table class="bottom" cellSpacing="0" cellPadding="0" width="100%" bgColor="#000000" border="0">
		<tr>
			<td style="background-image: url(<?php echo $this->_tpl_vars['imgDir']; ?>
/hrule.gif); width: 100%; background-repeat: repeat-x; height: 5px" colspan="2"></td>
		</tr>
		<tr>
			<td width="190"><a href="#" target="_blank">http://<?php echo $_SERVER['SERVER_NAME']; ?>
/</a></td>
			<td align="right">&copy;2012</td></tr>
		<tr>
			<td style="background-image: url(<?php echo $this->_tpl_vars['imgDir']; ?>
/hrule.gif); width: 100%; background-repeat: repeat-x; height: 5px; background-color: #ffffff" colSpan="2">
		</td>
		</tr>
		</table>
	</td>
</tr>
</table>
<script type="text/javascript">
	init();
</script>
<?php else: ?>
<table cellpadding="0" cellspacing="0" width="100%" height="100%" bgcolor="#efefef">
<tr>
	<td valign="middle" align="center"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['PageBody']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
</table>
<?php endif; ?>
</body>
</html>
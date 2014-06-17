<?php /* Smarty version 2.6.18, created on 2011-12-01 19:09:15
         compiled from orders/preview2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'orders/preview2.tpl', 18, false),array('modifier', 'strip_tags', 'orders/preview2.tpl', 18, false),)), $this); ?>
<div class="cont_sr"><div class="cont_s_pos">
		<div class="gl_block">
			<div class="t_line"><i class="t_l"></i><i class="t_r"></i></div>
			<div class="gl_block_pos">
					<h1><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__ORDER_DATA']; ?>
</h1>
					
					<div class="profile">
						<form method="POST" action="/registration/index/joinnowpage2" id="order_preview_form2">
								<div class="line"></div>
								
								<div class="profile_tbl">
									<table cellspacing="0" cellpadding="0">
									<tr>
										<td><span class="raque">*</span><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__YOUR_NAME']; ?>
</td>
										<th><input type="text" id="order_user_name" name="order_user_name" value="<?php echo $this->_tpl_vars['userInfo']['first_name']; ?>
"></th>
										
										<td><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__FROM_LANGUAGE']; ?>
</td>
										<th><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['langFrom']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</th>
									</tr>
									<tr>
										<td><span class="raque">*</span><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__EMAIL']; ?>
</td>
										<th><input type="text" id="order_user_email" name="order_user_email" value="<?php echo $this->_tpl_vars['userInfo']['email']; ?>
"></th>
										
										<td><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__TO_LANGUAGE']; ?>
</td>
										<th><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['langTo']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</th>
									</tr>
									<tr>
										<td><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__PHONE']; ?>
</td>
										<th><input type="text" id="order_user_phone" name="order_user_phone" value="<?php echo $this->_tpl_vars['userInfo']['phone']; ?>
"></th>
										
										<td><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__CATEGORY']; ?>
</td>
										<th><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order']['ttheme']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</th>
									</tr>
									</table>
                                    <div id="reg_errors_box" style="border:1px dotted #ffffff; background:#ff9999; display:none; text-align:center; margin-left:38px; margin-top:-30px; width:310px; padding:5px 5px 5px 5px; height:20px; color:#ffffff; position:absolute;"></div>
								</div>
								
								<div class="line"></div>
								<input type="hidden" name="reg_post" id="reg_post" value="0" />
								<a class="sbm_link" href="javascript:void(0);" id="order_link2"><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__ORDER']; ?>
</a>
								<p class="zakaz_cost"><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__COST']; ?>
<b>$<?php echo $this->_tpl_vars['order']['mainTotalPrice']; ?>
</b></p>

								<div class="clear_line"></div>
						</form>
					</div>
			</div>
			<i class="b_l"></i><i class="b_r"></i>
		</div>
	</div>
</div>
<?php /* Smarty version 2.6.18, created on 2012-02-01 17:32:29
         compiled from translateForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'translateForm.tpl', 23, false),array('modifier', 'strip_tags', 'translateForm.tpl', 23, false),)), $this); ?>
<div class="cont_l">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'profile/menu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div class="kalk">
			<div class="t_line"><i class="t_l"></i><i class="t_r"></i></div>
			<div class="kalk_pos">
				<form method="POST" action="" <?php if (! $this->_tpl_vars['UserLogedIn']): ?> name="translation_form2" id="translation_form2" <?php else: ?> name="translation_form" id="translation_form" <?php endif; ?> enctype="multipart/form-data">
					<div class="txt_pos">
						<div style="position:absolute; align:right; z-index:4; cursor:arrow;">
							<input type="file" name="file" id="file" style="z-index:4; -moz-opacity:0; filter:alpha(opacity: 0); cursor:arrow; overflow: hidden; width:118px; margin-left:168px; height:22px; opacity:0; border:1px solid #000000;" />
						</div>
						<span class="sbm_button" style="z-index:3;"><input type="button" id="add_file_button" value="<?php echo $this->_tpl_vars['frontendLangParams']['TITLE__ADD_FILE']; ?>
" onclick="$('input[type=file]').click();"></span>
						<?php echo $this->_tpl_vars['frontendLangParams']['TITLE__YOUR_TEXT']; ?>

					</div>
					<div class="txt_pos">
						<p class="t_area"><textarea name="translation_text" id="translation_text"></textarea></p>
					</div>
					<div class="txt_pos">
						<p class="txt_posr">
							<?php echo $this->_tpl_vars['frontendLangParams']['TITLE__LANGUAGE_TO']; ?>

							<select id="lang_to_id" name="lang_to_id">
								<option value="0"><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__CHOOSE_LANGUAGE']; ?>
</option>
								<?php $_from = $this->_tpl_vars['languages_from']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang_item']):
?>
									<option value="<?php echo $this->_tpl_vars['lang_item']['lang_id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
								<?php endforeach; endif; unset($_from); ?>								
							</select>
						</p>
						<p class="txt_posl">
							<?php echo $this->_tpl_vars['frontendLangParams']['TITLE__LANGUAGE_FROM']; ?>

							<select id="lang_from_id" name="lang_from_id">
								<option value="0"><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__CHOOSE_LANGUAGE']; ?>
</option>
								<?php $_from = $this->_tpl_vars['languages_from']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang_item']):
?>
									<option value="<?php echo $this->_tpl_vars['lang_item']['lang_id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
								<?php endforeach; endif; unset($_from); ?>
							</select>
						</p>
					</div>
					<div class="txt_pos">
						<?php echo $this->_tpl_vars['frontendLangParams']['TITLE__TRANSLATION_CATEGORY']; ?>

						<select id="ttheme_id" name="ttheme_id">
							<option value="0"><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__CHOOSE_CATEGORY']; ?>
</option>
							<?php $_from = $this->_tpl_vars['translations_themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tthemes_item']):
?>
								<option value="<?php echo $this->_tpl_vars['tthemes_item']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tthemes_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
							<?php endforeach; endif; unset($_from); ?>
						</select>
					</div>
					<div class="txt_pos">
						<span class="m_sbm">
						<?php if (! $this->_tpl_vars['UserLogedIn']): ?>
							<input type="button" id="calculate2" value="<?php echo $this->_tpl_vars['frontendLangParams']['TITLE__CALCULATE_THE_COST_OF']; ?>
">
						<?php else: ?>
							<input type="button" id="calculate" value="<?php echo $this->_tpl_vars['frontendLangParams']['TITLE__CALCULATE_THE_COST_OF']; ?>
">
						<?php endif; ?>
						</span>
						&nbsp;<br />
						<strong>&nbsp;</strong>
						<!--
						<?php echo $this->_tpl_vars['frontendLangParams']['TITLE__PRICE']; ?>
<br>
						<strong>0.00$</strong>
						-->
						<div id="tform_error0" style="display:none; width:100%; text-align:center; border:1px dotted #fff; margin-top:20px; color:#fff; text-alignfont-size:10px; font-weight:normal;"><?php echo $this->_tpl_vars['frontendLangParams']['VALIDATION__INPUT_TTEXT_OR_CHOOSE_FILE']; ?>
</div>
						<div id="tform_error1" style="display:none; width:100%; text-align:center; border:1px dotted #fff; margin-top:20px; color:#fff; text-alignfont-size:10px; font-weight:normal;"><?php echo $this->_tpl_vars['frontendLangParams']['VALIDATION__CHOOSE_LANGUAGE_FROM']; ?>
</div>
						<div id="tform_error2" style="display:none; width:100%; text-align:center; border:1px dotted #fff; margin-top:20px; color:#fff; text-alignfont-size:10px; font-weight:normal;"><?php echo $this->_tpl_vars['frontendLangParams']['VALIDATION__CHOOSE_LANGUAGE_TO']; ?>
</div>
						<div id="tform_error3" style="display:none; width:100%; text-align:center; border:1px dotted #fff; margin-top:20px; color:#fff; text-alignfont-size:10px; font-weight:normal;"><?php echo $this->_tpl_vars['frontendLangParams']['VALIDATION__CHOOSE_THEME']; ?>
</div>
						<div id="tform_error4" style="display:none; width:100%; text-align:center; border:1px dotted #fff; margin-top:20px; color:#fff; text-alignfont-size:10px; font-weight:normal;"><?php echo $this->_tpl_vars['frontendLangParams']['VALIDATION__LANGUAGES_SHOULD_BE_DIFFERENT']; ?>
</div>
                        <div id="tform_error5" style="display:none; width:100%; text-align:center; border:1px dotted #fff; margin-top:20px; color:#fff; text-alignfont-size:10px; font-weight:normal;"><?php echo $this->_tpl_vars['frontendLangParams']['VALIDATION__FILE_EXTENSION_ERROR']; ?>
</div>
						<input type="hidden" id="file-uploaded" value="<?php echo $this->_tpl_vars['frontendLangParams']['TITLE__FILE_UPLOADED']; ?>
" />
					</div>
					<div class="clear_line"></div>
				</form>
				<i class="b_l"></i><i class="b_r"></i>
			</div>
		</div>
		<?php if ($this->_tpl_vars['review']): ?>
		<div class="otzivi">
			<div class="otzivi_pos">
				<h3><a href=""><?php echo $this->_tpl_vars['frontendLangParams']['TITLE__REVIEWS']; ?>
</a></h3>
				<p><b><?php echo $this->_tpl_vars['review']['user_name']; ?>
</b> <?php echo $this->_tpl_vars['frontendLangParams']['TITLE__WROTE']; ?>
</p>
			</div>
			<div class="block">
				<i class="t_l"></i><i class="t_r"></i>
				<div class="block_pos">
						<div class="otzv_t"><div>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['review']['text'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

						</div></div>
				</div>
				<i class="b_l"></i><i class="b_r"></i>
			</div>
		</div>
		<?php endif; ?>
</div>
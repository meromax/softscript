<?php /* Smarty version 2.6.18, created on 2012-02-01 16:41:08
         compiled from admin/calculator/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/calculator/index.tpl', 13, false),array('modifier', 'strip_tags', 'admin/calculator/index.tpl', 13, false),array('modifier', 'trim', 'admin/calculator/index.tpl', 13, false),)), $this); ?>
<br />
<center><span style="font-size:16px;"><?php echo $this->_tpl_vars['adminLangParams']['CALCULATOR__HEADER']; ?>
</span></center>
<br />
<center>
<form method="POST" action="/admin/calculator/update" name="calc_form" id="calc_form">

<table width="98%">
<tr>
	<td width="100%" valign="top" align="center" style="padding:5px 5px 5px 5px; border:1px solid #b2b2b2; background:#ffffff;">
		<?php echo $this->_tpl_vars['adminLangParams']['CALCULATOR__FROM_LANGUAGE']; ?>
:
		<select id="lang_from" name="lang_from" onchange="changeLanguage();">
		<?php $_from = $this->_tpl_vars['calc_languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['calc']):
?>
			<option value="<?php echo $this->_tpl_vars['calc']['lang_id']; ?>
" <?php if ($this->_tpl_vars['calc']['lang_id'] == $this->_tpl_vars['lang_from']): ?> selected <?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['calc']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
</option>		
		<?php endforeach; endif; unset($_from); ?>
		</select>
	</td>
</tr>
</table>

<table width="98%">
<tr>
	<td width="100%" valign="top" style="padding:5px 5px 5px 15px; border:1px solid #b2b2b2; background:#ffffff;">
		<?php $_from = $this->_tpl_vars['calc_languages_to']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['calc_lang_to']):
?>
			<div style="border:1px solid #999; margin:10px 10px 10px 10px; width:280px; height:70px; float:left;">

				<table style="border:0px solid #b2b2b2;" width="100%">
				<tr>
					<td style="font-weight:bold; color:#595959;" width="60%" align="right">
						<?php echo ((is_array($_tmp=$this->_tpl_vars['adminLangParams']['CALCULATOR__TO_LANGUAGE'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
:
					</td>
					<td style="font-weight:bold; color:#595959;" width="40%" align="left">
						<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['calc_lang_to']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>

					</td>						
				</tr>
				<tr>
					<td style="font-weight:bold; color:#595959;" width="60%" align="right">
						<?php echo ((is_array($_tmp=$this->_tpl_vars['adminLangParams']['CALCULATOR__PRICE'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
:
					</td>
					<td style="font-weight:bold; color:#595959;" width="40%" align="left">
						<input type="text" class="inp2" style="width:80px;" name="calc_price<?php echo $this->_tpl_vars['calc_lang_to']['lang_id']; ?>
" id="calc_price<?php echo $this->_tpl_vars['calc_lang_to']['lang_id']; ?>
" autocomplete="off" value="<?php echo $this->_tpl_vars['calc_lang_to']['price']; ?>
" />
					</td>						
				</tr>
				<tr>
					<td style="font-weight:bold; color:#595959;" width="60%" align="right">
						<?php echo ((is_array($_tmp=$this->_tpl_vars['adminLangParams']['CALCULATOR__LETTERS_COUNT'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
:
					</td>
					<td style="font-weight:bold; color:#595959;" width="40%" align="left">
						<input type="text" class="inp2" style="width:80px;" name="calc_letters_count<?php echo $this->_tpl_vars['calc_lang_to']['lang_id']; ?>
" id="calc_letters_count<?php echo $this->_tpl_vars['calc_lang_to']['lang_id']; ?>
" autocomplete="off" value="<?php echo $this->_tpl_vars['calc_lang_to']['letters_count']; ?>
" />
					</td>						
				</tr>										
				</table>
		
			</div>	
		<?php endforeach; endif; unset($_from); ?>
	</td>
</tr>
<tr>
	<td width="100%" colspan="3" align="center" style="padding-top:20px;">
		<input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_SAVE']; ?>
" onclick="checkForm();">
	</td>
</tr>
</table>
</form>
</center>


<script type="text/javascript">
var message = '<?php echo $this->_tpl_vars['adminLangParams']['NOTYFICATION_FIELDS_CHOULD_FILLED_CORRECTLY']; ?>
';

<?php echo '
function checkForm(){
	document.forms.calc_form.submit();
}
function changeLanguage(){
	document.location.href="/admin/calculator/index?lang_from="+$("#lang_from").val();
}
'; ?>

</script>
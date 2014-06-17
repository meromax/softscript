<?php /* Smarty version 2.6.18, created on 2013-12-20 02:19:05
         compiled from admin/options/properties/add_modify_item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/options/properties/add_modify_item.tpl', 22, false),)), $this); ?>
<br />
<br />
<table width="98%" style="margin-top:20px;">
<tr>
	<td valign="top">
		<center><span style="font-size:16px;">Значения -> <?php if ($this->_tpl_vars['action'] == 'modify-property'): ?>Изменить значение<?php else: ?>Добавить значение<?php endif; ?></span></center>
		<br />
		<table width="99%" border="0">
		<tr>
			<td valign="top" align="right"">
				<form method="POST" action="/admin/options/<?php echo $this->_tpl_vars['action']; ?>
" name="property_form" enctype="multipart/form-data">
					<input type="hidden" name="step" value="2">
					<?php if ($this->_tpl_vars['item']['id']): ?>
						<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
					<?php endif; ?>
					<table class="cont2" align="center">
						<tr>
							<td colspan="2" class="header"><b><?php if ($this->_tpl_vars['action'] == 'modify-property'): ?>Изменить значение<?php else: ?>Добавить значение<?php endif; ?></b></td>
						</tr>
                        <tr>
                            <td class="header" width="100px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['SECTIONS_TITLE']; ?>
:</td>
                            <td><input type="text" id="title" class="input" style="width:800px;" name="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"  onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();"></td>
                        </tr>

                        <tr>
                            <td class="header" width="100px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['SECTIONS_LINK']; ?>
:</td>
                            <td><input type="text" id="link" class="input" style="width:800px; background: #efefef; border: 0px;" name="link" value="<?php echo $this->_tpl_vars['item']['link']; ?>
" readonly="readonly"></td>
                        </tr>
						<tr>
							<td class="header" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['CATEGORIES_DESCRIPTION']; ?>
:</td>
							<td style="padding-left:6px;">
								<textarea name="description" id="description"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
							</td>
						</tr>
						<tr>
							<td class="header" width="100px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['TITLE_POSITION']; ?>
:</td>
							<td><input type="text" id="position" class="input" style="width:40px;" maxlength="3" name="position" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['position'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"></td>
						</tr>

						<tr>
							<td colspan="2" align="center">
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/options/meta.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" class="header" align="center">
                                <input type="hidden" name="price" value="0" />
								<input type="hidden" name="option_id" value="<?php echo $this->_tpl_vars['option_id']; ?>
" />
								<input type="hidden" name="spage" value="<?php echo $this->_tpl_vars['spage']; ?>
" />
                                <input type="hidden" name="page" value="<?php echo $this->_tpl_vars['page']; ?>
" />
								<input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_SAVE']; ?>
" onclick="checkForm();">&nbsp;
								<input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_CANCEL']; ?>
" onclick="document.location='/admin/sections/index/page/1'">
							</td>
						</tr>
					</table>
				</form>
				<script>
					var oFCKeditor = new FCKeditor('description', 800, 300) ;
					//oFCKeditor.ToolbarSet = 'Basic' ;
					oFCKeditor.ReplaceTextarea();
				</script>
			</td>
		</tr>
		</table>
	
	</td>
</tr>
</table>
<?php echo '

<script type="text/javascript">

    function checkForm(){
        if ($("#title").val() == \'\') {
            alert(\'Вы должны заподнить поле заголовок...\');
        } else if ($("#position").val() == \'\') {
            alert(\'Вы должны заподнить поле позиция...\');
        } else {
            setLink();
            document.forms.property_form.submit();
        }
    }

    function setLink(){
        var link = createLinkFromTitle($("#title").val());
        $("#link").val(link);
    }

</script>
'; ?>
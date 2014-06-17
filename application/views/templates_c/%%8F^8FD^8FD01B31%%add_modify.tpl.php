<?php /* Smarty version 2.6.18, created on 2014-01-21 14:29:28
         compiled from admin/deals/add_modify.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/deals/add_modify.tpl', 19, false),)), $this); ?>
<br />
<center><span style="font-size:16px;">Новинки / Акции / Горячие предложения -> <?php if ($this->_tpl_vars['action'] == 'modify'): ?>Изменение<?php else: ?>Добавление<?php endif; ?></span></center>
<br />
<table width="99%" border="0">
<tr>
	<td valign="top" align="right"">
		<form method="POST" action="/admin/deals/<?php echo $this->_tpl_vars['action']; ?>
" name="deal_form" enctype="multipart/form-data">
			<input type="hidden" name="step" value="2">
			<?php if ($this->_tpl_vars['item']['id']): ?>
				<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
			<?php endif; ?>
			<table class="cont2" align="center">
				<tr>
					<td colspan="2" class="header"><b><?php if ($this->_tpl_vars['action'] == 'modify'): ?>Изменение<?php else: ?>Добавление<?php endif; ?></b></td>
				</tr>

				<tr>
					<td class="header" width="100px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['SECTIONS_TITLE']; ?>
:</td>
					<td><input type="text" id="title" class="input" style="width:800px;" name="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" onchange="setLink();" onkeyup="setLink();" onkeypress="setLink();"></td>
				</tr>

                <tr>
                    <td class="header" width="100px" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['SECTIONS_LINK']; ?>
:</td>
                    <td><input type="text" id="link" class="input" style="width:800px; background: #efefef; border: 0px;" name="link" value="<?php echo $this->_tpl_vars['item']['link']; ?>
" readonly="readonly"></td>
                </tr>

                <tr>
                    <td class="header" width="100px" style="padding:5px 5px 5px 5px;">Тип:</td>
                    <td>
                        <select name="type" id="type" class="input">
                            <option value="0" <?php if ($this->_tpl_vars['item']['type'] == 0): ?>selected="selected"<?php endif; ?>>Новинки</option>
                            <option value="1" <?php if ($this->_tpl_vars['item']['type'] == 1): ?>selected="selected"<?php endif; ?>>Акции</option>
                            <option value="2" <?php if ($this->_tpl_vars['item']['type'] == 2): ?>selected="selected"<?php endif; ?>>Горячие предложения</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="header" style="padding:5px 5px 5px 5px;">Короткое описание:</td>
                    <td style="padding-left:6px;">
                        <textarea name="description_short" id="description_short"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description_short'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
                    </td>
                </tr>

				<tr>
					<td class="header" style="padding:5px 5px 5px 5px;"><?php echo $this->_tpl_vars['adminLangParams']['SECTIONS_DESCRIPTION']; ?>
:</td>
					<td style="padding-left:6px;">
						<textarea name="description" id="description"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
                        <input type="hidden" name="position" id="position" value="0" />
					</td>
				</tr>

                <tr>
                    <td class="header" width="100px" style="padding:5px 5px 5px 5px;">Дата:</td>
                    <td>
                        <table>
                            <tr>
                                <td style="border:0px">
                                    <input type="text" readonly="readonly" class="input" style="width:130px; background: #efefef;" name="post_date" id="post_date" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['post_date'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
">
                                </td>
                                <td style="border:0px">
                                    <a href="javascript:void(0);"><img src="/js/jscalendar/calendar-ico.png" id="birth_date_btn1" height="20" /></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

																																						
									
                                                                                                                                                                                                    																		
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <?php if ($this->_tpl_vars['item']['image'] != ""): ?>
                    <tr>
                        <td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['BANNERS_IMAGE']; ?>
:</td>
                        <td align="left" style="padding-left:6px;"><img style="border:1px solid #b2b2b2;" align="left" src="/images/deals/<?php echo $this->_tpl_vars['item']['image']; ?>
_big.jpg?time=<?php echo time(); ?>
" alt="" title=""></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td class="header" width="100px"><?php echo $this->_tpl_vars['adminLangParams']['BANNERS_UPLOAD_IMAGE']; ?>
:</td>
                    <td><input type="file" size="103" style="*width:600px;" class="input" id="upload_id" name="image"></td>
                </tr>
				<tr>
					<td colspan="2" align="center">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/sections/meta.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="header" align="center">
                        <input type="hidden" name="section_type" value="1" />
                        <input type="hidden" name="template" value="0" />
						<input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_SAVE']; ?>
" <?php if ($this->_tpl_vars['action'] != 'modify'): ?> onclick="checkForm('')" <?php else: ?> onclick="checkForm('modify')" <?php endif; ?>>&nbsp;
						<input type="button" class="input" value="<?php echo $this->_tpl_vars['adminLangParams']['BUTTON_CANCEL']; ?>
" onclick="document.location='/admin/sections/index/page/1'">
					</td>
				</tr>
			</table>
		</form>
		<script>
			var oFCKeditor = new FCKeditor('description', 800, 500) ;
			//oFCKeditor.ToolbarSet = 'Basic' ;
			oFCKeditor.ReplaceTextarea();

            var oFCKeditor2 = new FCKeditor('description_short', 800, 300) ;
            //oFCKeditor.ToolbarSet = 'Basic' ;
            oFCKeditor2.ReplaceTextarea();
		</script>
	</td>
</tr>
</table>

<script src="/js/jscalendar/src/js/jscal2.js"></script>
<script src="/js/jscalendar/src/js/lang/ru.js"></script>
<link rel="stylesheet" type="text/css" href="/js/jscalendar/src/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="/js/jscalendar/src/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="/js/jscalendar/src/css/steel/steel.css" />

<?php echo '

<script type="text/javascript">

var cal = Calendar.setup({
    //time    : 1400,
    minuteStep: 1,
    onSelect: function(cal) { cal.hide() },
    showTime: true
});

var time = new Date();
if (time.getMinutes().toString().length==1) {setTime=\'0\';}
else {setTime=\'\';}
cal.setTime(time.getHours().toString()+setTime+time.getMinutes().toString());
cal.manageFields("birth_date_btn1", "post_date", "%Y-%m-%d %H:%M:%S");


function checkForm(type){
    if(type==\'\'){
        if ($("#title").val() == \'\') {
            alert(\'Вы должны заподнить поле заголовок...\');
        } else if ($("#position").val() == \'\') {
            alert(\'Вы должны заподнить поле позиция...\');
        } else if ($("#upload_id").val() == \'\') {
            alert(\'Вы должны выбрать картинку...\');
        } else {
            document.forms.deal_form.submit();
        }
    } else {
        if ($("#title").val() == \'\') {
            alert(\'Вы должны заподнить поле заголовок...\');
        } else if ($("#position").val() == \'\') {
            alert(\'Вы должны заподнить поле позиция...\');
        } else {
            document.forms.deal_form.submit();
        }
    }


}
function setLink(){
    var link = createLinkFromTitle($("#title").val());
    $("#link").val(link);
}
</script>
'; ?>
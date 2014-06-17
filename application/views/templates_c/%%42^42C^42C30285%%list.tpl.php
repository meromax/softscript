<?php /* Smarty version 2.6.18, created on 2012-03-19 02:16:57
         compiled from admin/price/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/price/list.tpl', 15, false),array('modifier', 'strip_tags', 'admin/price/list.tpl', 15, false),array('function', 'cycle', 'admin/price/list.tpl', 38, false),)), $this); ?>
<br />
<center>
    <span style="font-size:16px;"><?php echo $this->_tpl_vars['adminLangParams']['PRICES__HEADER']; ?>
</span><br />
</center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="7"  class="header" style="padding:5px 5px 5px 5px; border: 1px dashed #a2a2a2;">
        <table width="100%">
        <tr>
            <td width="100"><?php echo $this->_tpl_vars['adminLangParams']['PRICES__CHOOSE_SITE']; ?>
:</td>
            <td width="200">
                <select name="site" id="site" onchange="changeSite();">
                <?php $_from = $this->_tpl_vars['sites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['site']):
?>
                    <option value="<?php echo $this->_tpl_vars['site']['id']; ?>
" <?php if ($this->_tpl_vars['site']['id'] == $this->_tpl_vars['siteId']): ?> selected="selected" <?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['site']['domain'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
                </select>
            </td>
            <td align="right" style="padding-right:10px;">
                <div id="notification" style="display:none; color:green; font-weight:bold; font-size:14px;"><?php echo $this->_tpl_vars['adminLangParams']['NOTYFICATION_CHANGES_SAVED_SUCCESSFULLY']; ?>
...</div>
            </td>
        </tr>
        </table>
	</td>
</tr>

<tr><td colspan="7" height="12" style="line-height:12px;">&nbsp;</td></tr>
<tr>
	<td class="header"style="padding:3px 3px 3px 3px;"><b><?php echo $this->_tpl_vars['adminLangParams']['PRICES__TITLE_COUNTRY']; ?>
</b></td>
	<td class="header" width="99" align="center" style="padding:3px 3px 3px 3px;"><b><?php echo $this->_tpl_vars['adminLangParams']['PRICES__TITLE_COUNTRY_SHORT']; ?>
</b></td>
	<td class="header" width="50" align="center" style="padding:3px 3px 3px 3px;"><b><?php echo $this->_tpl_vars['adminLangParams']['PRICES__TITLE_CURRENCY']; ?>
</b></td>
    <td class="header" width="50" align="center" style="padding:3px 3px 3px 3px;"><b><?php echo $this->_tpl_vars['adminLangParams']['PRICES__TITLE_PRICE']; ?>
</b></td>
    <td class="header" width="50" align="center" style="padding:3px 3px 3px 3px;"><b><?php echo $this->_tpl_vars['adminLangParams']['PRICES__TITLE_DOSTAVKA']; ?>
</b></td>
	<td class="header" width="100" align="center" style="padding:3px 3px 3px 3px;"><b><?php echo $this->_tpl_vars['adminLangParams']['PRICES__TITLE_POSITION']; ?>
</b></td>
	<td class="header" width="150" align="center" style="padding:3px 3px 3px 3px;"><b><?php echo $this->_tpl_vars['adminLangParams']['PRICES__ACTIONS']; ?>
</b></td>
</tr>
<?php $_from = $this->_tpl_vars['price']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pages_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pages_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['pages_loop']['iteration']++;
?>
<tr bgcolor="<?php echo smarty_function_cycle(array('values' => '#FFEFAA,#ffffff'), $this);?>
" id="tr<?php echo $this->_tpl_vars['item']['id']; ?>
">
	<td style="padding:5px 5px 5px 5px;">
        <table cellpadding="0" cellspacing="0">
        <tr>
            <td><img src="/images/countries/<?php echo $this->_tpl_vars['item']['title_short']; ?>
.png" width="22" height="15" align="middle" style="border:1px solid #000;"></td>
            <td style="padding-left:5px;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
        </tr>
        </table>
	</td>
	<td align="center" style="padding:5px 5px 5px 5px;" width="120">
        <input style="color:red;" type="text" readonly="readonly" name="title_short<?php echo $this->_tpl_vars['item']['id']; ?>
" id="title_short<?php echo $this->_tpl_vars['item']['id']; ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title_short'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
    </td>
    <td align="center" style="padding:5px 5px 5px 5px;" width="120">
        <input type="text" name="symbol<?php echo $this->_tpl_vars['item']['id']; ?>
" id="symbol<?php echo $this->_tpl_vars['item']['id']; ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['symbol'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
    </td>
	<td align="center" style="padding:5px 5px 5px 5px;" width="120">
        <input type="text" name="price<?php echo $this->_tpl_vars['item']['id']; ?>
" id="price<?php echo $this->_tpl_vars['item']['id']; ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['price'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
    </td>
    <td align="center" style="padding:5px 5px 5px 5px;" width="120">
        <input type="text" name="dostavka<?php echo $this->_tpl_vars['item']['id']; ?>
" id="dostavka<?php echo $this->_tpl_vars['item']['id']; ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['dostavka'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
    </td>
    <td align="center" style="padding:5px 5px 5px 5px;" width="120">
        <input style="width:40px;" type="text" name="position<?php echo $this->_tpl_vars['item']['id']; ?>
" id="position<?php echo $this->_tpl_vars['item']['id']; ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['position'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
    </td>
	<td align="center" width="150">
		<a href="javascript:void(0);" id="link<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="saveItem(<?php echo $this->_tpl_vars['item']['id']; ?>
);"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_SAVE']; ?>
</a> |
		<a href="/admin/price/delete/price_id/<?php echo $this->_tpl_vars['item']['id']; ?>
/siteId/<?php echo $this->_tpl_vars['siteId']; ?>
"  onclick="return confirm(<?php echo $this->_tpl_vars['adminLangParams']['NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN']; ?>
)"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a>
	</td>
</tr>
<tr><td colspan="7" height="3" style="line-height:3px;">&nbsp;</td></tr>
<?php endforeach; else: ?>
<tr>
	<td colspan="7"><b></b></td>
</tr>	
<?php endif; unset($_from); ?>
<tr><td colspan="7" height="5" style="line-height:5px;">&nbsp;</td></tr>
<tr>
	<td colspan="7" class="header"  style="padding:7px 5px 7px 5px; border: 1px dashed #a2a2a2;">
        <form action="/admin/price/add-country" method="post" id="country_form">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td id="flag" width="22" height="15" style="padding:2px 5px 2px 0px;">
                    &nbsp;
                </td>
                <td>
                    <select name="country" id="country" onchange="changeCountry();">
                    <?php $_from = $this->_tpl_vars['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['country']):
?>
                        <option value="<?php echo $this->_tpl_vars['country']['id']; ?>
"><?php echo $this->_tpl_vars['country']['title']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
                <td>
                    <input type="hidden" name="curr_site" id="curr_site" value="" />
                    <input type="button" value="<?php echo $this->_tpl_vars['adminLangParams']['PRICES__ADD_COUNTRY']; ?>
" onclick="addCountry();" />
                </td>
            </tr>
        </table>
        </form>
    </td>
</tr>
</table>
<?php echo '
<script type="text/javascript">
function changeSite(){
    document.location.href="/admin/price/index/site/"+$("#site").val();
}

function saveItem(id){
    var prefBack = $("#tr"+id).attr(\'bgcolor\');
    $("#tr"+id).attr(\'bgcolor\',\'lime\');
    $("#notification").fadeIn();

    $.post("/admin/price/save-item", {itemId:id, title_short:$("#title_short"+id).val(), symbol:$("#symbol"+id).val(), price:$("#price"+id).val(), dostavka:$("#dostavka"+id).val(), position:$("#position"+id).val()},
            function(data) {
                if(data!=\'\'){
                    setTimeout(function(){
                        $("#notification").fadeOut();
                        $("#tr"+id).attr(\'bgcolor\',prefBack);
                    }, 3000);
                }
            }
    );
}

function addCountry(){
    $("#curr_site").val($("#site").val());
    $("#country_form").submit();
}

function changeCountry(){
    $.post("/admin/price/get-flag", {countryId:$("#country").val()},
            function(data) {
                if(data!=\'\'){
                    $(\'#flag\').html(data);
                }
            }
    );
}
changeCountry();
</script>
'; ?>
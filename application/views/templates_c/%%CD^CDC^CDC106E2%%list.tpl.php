<?php /* Smarty version 2.6.18, created on 2012-03-19 02:16:56
         compiled from admin/site/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/site/list.tpl', 15, false),array('modifier', 'strip_tags', 'admin/site/list.tpl', 17, false),array('modifier', 'stripslashes', 'admin/site/list.tpl', 17, false),)), $this); ?>
<br />
<center>
    <span style="font-size:16px;"><?php echo $this->_tpl_vars['adminLangParams']['SITES__HEADER']; ?>
</span><br />
</center>
<br />
<table align="center" width="97%">
<tr><td colspan="4" height="12" style="line-height:12px;">&nbsp;</td></tr>
<tr>
	<td class="header"style="padding:3px 3px 3px 3px;"><b><?php echo $this->_tpl_vars['adminLangParams']['SITES__LINK']; ?>
</b></td>
	<td class="header" width="180" align="center" style="padding:3px 3px 3px 3px;"><b><?php echo $this->_tpl_vars['adminLangParams']['SITES__COMPANY_ID']; ?>
</b></td>
	<td class="header" width="180" align="center" style="padding:3px 3px 3px 3px;"><b><?php echo $this->_tpl_vars['adminLangParams']['SITES__CEL']; ?>
</b></td>
	<td class="header" width="180" align="center" style="padding:3px 3px 3px 3px;"><b><?php echo $this->_tpl_vars['adminLangParams']['PRICES__ACTIONS']; ?>
</b></td>
</tr>
<?php $_from = $this->_tpl_vars['sites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pages_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pages_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['pages_loop']['iteration']++;
?>
<tr bgcolor="<?php echo smarty_function_cycle(array('values' => '#FFEFAA,#ffffff'), $this);?>
" id="tr<?php echo $this->_tpl_vars['item']['id']; ?>
">
	<td align="left" style="padding:5px 5px 5px 5px;" >
        <a href="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" target="_blank"><?php echo $this->_tpl_vars['item']['title']; ?>
</a>
    </td>
    <td align="center" style="padding:5px 5px 5px 5px;" width="180">
        <input type="text" name="companyid<?php echo $this->_tpl_vars['item']['id']; ?>
" id="companyid<?php echo $this->_tpl_vars['item']['id']; ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['company_id'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
    </td>
	<td align="center" style="padding:5px 5px 5px 5px;" width="180">
        <input type="text" name="cel<?php echo $this->_tpl_vars['item']['id']; ?>
" id="cel<?php echo $this->_tpl_vars['item']['id']; ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['cel'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
    </td>
	<td align="center" width="180">
		<a href="javascript:void(0);" id="link<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="saveItem(<?php echo $this->_tpl_vars['item']['id']; ?>
);"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_SAVE']; ?>
</a> |
		<a href="/admin/site/delete/id/<?php echo $this->_tpl_vars['item']['id']; ?>
"  onclick="return confirm(<?php echo $this->_tpl_vars['adminLangParams']['NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN']; ?>
)"><?php echo $this->_tpl_vars['adminLangParams']['ACTION_DELETE']; ?>
</a>
	</td>
</tr>
<tr><td colspan="4" height="3" style="line-height:3px;">&nbsp;</td></tr>
<?php endforeach; else: ?>
<tr>
	<td colspan="4"><b></b></td>
</tr>	
<?php endif; unset($_from); ?>
<tr><td colspan="4" height="5" style="line-height:5px;">&nbsp;</td></tr>
<tr>
	<td colspan="4" class="header"  style="padding:7px 5px 7px 5px; border: 1px dashed #a2a2a2;">
        <form action="/admin/site/add-site" method="post" id="site_form">
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td width="260">
                    <input type="text" name="site" id="site" style="width:250px;" />
                </td>
                <td width="150" align="left">
                    <input type="button" value="<?php echo $this->_tpl_vars['adminLangParams']['SITES__ADD_SITE']; ?>
" onclick="addSite();" />
                </td>
                <td align="right" colspan="7"  class="header" style="padding:5px 5px 5px 5px;">
                    <div id="notification" style="display:none; color:green; font-weight:bold; font-size:14px;"><?php echo $this->_tpl_vars['adminLangParams']['NOTYFICATION_CHANGES_SAVED_SUCCESSFULLY']; ?>
...</div>
                    <input type="hidden" name="save_notification" id="save_notification" value="<?php echo $this->_tpl_vars['adminLangParams']['NOTYFICATION_CHANGES_SAVED_SUCCESSFULLY']; ?>
..." />
                    <input type="hidden" name="site_error_notification" id="site_error_notification" value="<?php echo $this->_tpl_vars['adminLangParams']['NOTYFICATION_INVALID_SITENAME']; ?>
..." />
                </td>
            </tr>
        </table>
        </form>
    </td>
</tr>
</table>
<?php echo '
<script type="text/javascript">
function saveItem(id){
    var prefBack = $("#tr"+id).attr(\'bgcolor\');
    $("#tr"+id).attr(\'bgcolor\',\'lime\');
    $("#notification").fadeIn();

    $.post("/admin/site/save-item", {itemId:id, companyId:$("#companyid"+id).val(), cel:$("#cel"+id).val()},
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
function trim(string) {
    return string.replace (/(^s+)|(s+$)/g, "");
}

function validURL (url) { //https, http и ftp;
    var template = /^(?:(?:https?|ftp|telnet):\\/\\/(?:[a-z0-9_-]{1,32}(?::[a-z0-9_-]{1,32})?@)?)?(?:(?:[a-z0-9-]{1,128}\\.)+(?:com|net|org|mil|edu|arpa|ru|gov|biz|info|aero|inc|name|[a-z]{2})|(?!0)(?:(?!0[^.]|255)[0-9]{1,3}\\.){3}(?!0|255)[0-9]{1,3})(?:\\/[a-z0-9.,_@%&?+=\\~\\/-]*)?(?:#[^ \\\'\\"&<>]*)?$/i;
    var regex = new RegExp (template);
    return (regex.test(url) ? 1 : 0);
}

function CheckURL(url) {
    if (url.indexOf("://")==-1) return false;
    if (!validURL(trim(url))) return false;
    else return true;
}
function addSite(){

    if(!CheckURL($("#site").val())){
        $("#notification").html($("#site_error_notification").val());
        $("#notification").css(\'color\', \'red\');
        $("#notification").fadeIn();
        setTimeout(function(){
            $("#notification").fadeOut();
        }, 3000);
    } else {
        $("#notification").css(\'color\', \'green\');
        $("#notification").html($("#save_notification").val());
        $("#site_form").submit();
    }
}
</script>
'; ?>
<br />
<center>
    <span style="font-size:16px;">{$adminLangParams.SITES__HEADER}</span><br />
</center>
<br />
<table align="center" width="97%">
<tr><td colspan="4" height="12" style="line-height:12px;">&nbsp;</td></tr>
<tr>
	<td class="header"style="padding:3px 3px 3px 3px;"><b>{$adminLangParams.SITES__LINK}</b></td>
	<td class="header" width="180" align="center" style="padding:3px 3px 3px 3px;"><b>{$adminLangParams.SITES__COMPANY_ID}</b></td>
	<td class="header" width="180" align="center" style="padding:3px 3px 3px 3px;"><b>{$adminLangParams.SITES__CEL}</b></td>
	<td class="header" width="180" align="center" style="padding:3px 3px 3px 3px;"><b>{$adminLangParams.PRICES__ACTIONS}</b></td>
</tr>
{foreach name=pages_loop from=$sites item=item}
<tr bgcolor="{cycle values='#FFEFAA,#ffffff'}" id="tr{$item.id}">
	<td align="left" style="padding:5px 5px 5px 5px;" >
        <a href="{$item.title|strip_tags|stripslashes}" target="_blank">{$item.title}</a>
    </td>
    <td align="center" style="padding:5px 5px 5px 5px;" width="180">
        <input type="text" name="companyid{$item.id}" id="companyid{$item.id}" value="{$item.company_id|strip_tags|stripslashes}" />
    </td>
	<td align="center" style="padding:5px 5px 5px 5px;" width="180">
        <input type="text" name="cel{$item.id}" id="cel{$item.id}" value="{$item.cel|strip_tags|stripslashes}" />
    </td>
	<td align="center" width="180">
		<a href="javascript:void(0);" id="link{$item.id}" onclick="saveItem({$item.id});">{$adminLangParams.ACTION_SAVE}</a> |
		<a href="/admin/site/delete/id/{$item.id}"  onclick="return confirm({$adminLangParams.NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN})">{$adminLangParams.ACTION_DELETE}</a>
	</td>
</tr>
<tr><td colspan="4" height="3" style="line-height:3px;">&nbsp;</td></tr>
{foreachelse}
<tr>
	<td colspan="4"><b></b></td>
</tr>	
{/foreach}
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
                    <input type="button" value="{$adminLangParams.SITES__ADD_SITE}" onclick="addSite();" />
                </td>
                <td align="right" colspan="7"  class="header" style="padding:5px 5px 5px 5px;">
                    <div id="notification" style="display:none; color:green; font-weight:bold; font-size:14px;">{$adminLangParams.NOTYFICATION_CHANGES_SAVED_SUCCESSFULLY}...</div>
                    <input type="hidden" name="save_notification" id="save_notification" value="{$adminLangParams.NOTYFICATION_CHANGES_SAVED_SUCCESSFULLY}..." />
                    <input type="hidden" name="site_error_notification" id="site_error_notification" value="{$adminLangParams.NOTYFICATION_INVALID_SITENAME}..." />
                </td>
            </tr>
        </table>
        </form>
    </td>
</tr>
</table>
{literal}
<script type="text/javascript">
function saveItem(id){
    var prefBack = $("#tr"+id).attr('bgcolor');
    $("#tr"+id).attr('bgcolor','lime');
    $("#notification").fadeIn();

    $.post("/admin/site/save-item", {itemId:id, companyId:$("#companyid"+id).val(), cel:$("#cel"+id).val()},
            function(data) {
                if(data!=''){
                    setTimeout(function(){
                        $("#notification").fadeOut();
                        $("#tr"+id).attr('bgcolor',prefBack);
                    }, 3000);
                }
            }
    );
}
function trim(string) {
    return string.replace (/(^s+)|(s+$)/g, "");
}

function validURL (url) { //https, http и ftp;
    var template = /^(?:(?:https?|ftp|telnet):\/\/(?:[a-z0-9_-]{1,32}(?::[a-z0-9_-]{1,32})?@)?)?(?:(?:[a-z0-9-]{1,128}\.)+(?:com|net|org|mil|edu|arpa|ru|gov|biz|info|aero|inc|name|[a-z]{2})|(?!0)(?:(?!0[^.]|255)[0-9]{1,3}\.){3}(?!0|255)[0-9]{1,3})(?:\/[a-z0-9.,_@%&?+=\~\/-]*)?(?:#[^ \'\"&<>]*)?$/i;
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
        $("#notification").css('color', 'red');
        $("#notification").fadeIn();
        setTimeout(function(){
            $("#notification").fadeOut();
        }, 3000);
    } else {
        $("#notification").css('color', 'green');
        $("#notification").html($("#save_notification").val());
        $("#site_form").submit();
    }
}
</script>
{/literal}
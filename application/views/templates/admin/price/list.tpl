<br />
<center>
    <span style="font-size:16px;">{$adminLangParams.PRICES__HEADER}</span><br />
</center>
<br />
<table align="center" width="97%">
<tr>
	<td align="left" colspan="7"  class="header" style="padding:5px 5px 5px 5px; border: 1px dashed #a2a2a2;">
        <table width="100%">
        <tr>
            <td width="100">{$adminLangParams.PRICES__CHOOSE_SITE}:</td>
            <td width="200">
                <select name="site" id="site" onchange="changeSite();">
                {foreach from=$sites item=site}
                    <option value="{$site.id}" {if $site.id==$siteId} selected="selected" {/if}>{$site.domain|stripslashes|strip_tags}</option>
                {/foreach}
                </select>
            </td>
            <td align="right" style="padding-right:10px;">
                <div id="notification" style="display:none; color:green; font-weight:bold; font-size:14px;">{$adminLangParams.NOTYFICATION_CHANGES_SAVED_SUCCESSFULLY}...</div>
            </td>
        </tr>
        </table>
	</td>
</tr>

<tr><td colspan="7" height="12" style="line-height:12px;">&nbsp;</td></tr>
<tr>
	<td class="header"style="padding:3px 3px 3px 3px;"><b>{$adminLangParams.PRICES__TITLE_COUNTRY}</b></td>
	<td class="header" width="99" align="center" style="padding:3px 3px 3px 3px;"><b>{$adminLangParams.PRICES__TITLE_COUNTRY_SHORT}</b></td>
	<td class="header" width="50" align="center" style="padding:3px 3px 3px 3px;"><b>{$adminLangParams.PRICES__TITLE_CURRENCY}</b></td>
    <td class="header" width="50" align="center" style="padding:3px 3px 3px 3px;"><b>{$adminLangParams.PRICES__TITLE_PRICE}</b></td>
    <td class="header" width="50" align="center" style="padding:3px 3px 3px 3px;"><b>{$adminLangParams.PRICES__TITLE_DOSTAVKA}</b></td>
	<td class="header" width="100" align="center" style="padding:3px 3px 3px 3px;"><b>{$adminLangParams.PRICES__TITLE_POSITION}</b></td>
	<td class="header" width="150" align="center" style="padding:3px 3px 3px 3px;"><b>{$adminLangParams.PRICES__ACTIONS}</b></td>
</tr>
{foreach name=pages_loop from=$price item=item}
<tr bgcolor="{cycle values='#FFEFAA,#ffffff'}" id="tr{$item.id}">
	<td style="padding:5px 5px 5px 5px;">
        <table cellpadding="0" cellspacing="0">
        <tr>
            <td><img src="/images/countries/{$item.title_short}.png" width="22" height="15" align="middle" style="border:1px solid #000;"></td>
            <td style="padding-left:5px;">{$item.title|strip_tags|stripslashes}</td>
        </tr>
        </table>
	</td>
	<td align="center" style="padding:5px 5px 5px 5px;" width="120">
        <input style="color:red;" type="text" readonly="readonly" name="title_short{$item.id}" id="title_short{$item.id}" value="{$item.title_short|strip_tags|stripslashes}" />
    </td>
    <td align="center" style="padding:5px 5px 5px 5px;" width="120">
        <input type="text" name="symbol{$item.id}" id="symbol{$item.id}" value="{$item.symbol|strip_tags|stripslashes}" />
    </td>
	<td align="center" style="padding:5px 5px 5px 5px;" width="120">
        <input type="text" name="price{$item.id}" id="price{$item.id}" value="{$item.price|strip_tags|stripslashes}" />
    </td>
    <td align="center" style="padding:5px 5px 5px 5px;" width="120">
        <input type="text" name="dostavka{$item.id}" id="dostavka{$item.id}" value="{$item.dostavka|strip_tags|stripslashes}" />
    </td>
    <td align="center" style="padding:5px 5px 5px 5px;" width="120">
        <input style="width:40px;" type="text" name="position{$item.id}" id="position{$item.id}" value="{$item.position|strip_tags|stripslashes}" />
    </td>
	<td align="center" width="150">
		<a href="javascript:void(0);" id="link{$item.id}" onclick="saveItem({$item.id});">{$adminLangParams.ACTION_SAVE}</a> |
		<a href="/admin/price/delete/price_id/{$item.id}/siteId/{$siteId}"  onclick="return confirm({$adminLangParams.NOTYFICATION_DELETE_PAGE_CONFIRM_MAIN})">{$adminLangParams.ACTION_DELETE}</a>
	</td>
</tr>
<tr><td colspan="7" height="3" style="line-height:3px;">&nbsp;</td></tr>
{foreachelse}
<tr>
	<td colspan="7"><b></b></td>
</tr>	
{/foreach}
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
                    {foreach from=$countries item=country}
                        <option value="{$country.id}">{$country.title}</option>
                    {/foreach}
                    </select>
                </td>
                <td>
                    <input type="hidden" name="curr_site" id="curr_site" value="" />
                    <input type="button" value="{$adminLangParams.PRICES__ADD_COUNTRY}" onclick="addCountry();" />
                </td>
            </tr>
        </table>
        </form>
    </td>
</tr>
</table>
{literal}
<script type="text/javascript">
function changeSite(){
    document.location.href="/admin/price/index/site/"+$("#site").val();
}

function saveItem(id){
    var prefBack = $("#tr"+id).attr('bgcolor');
    $("#tr"+id).attr('bgcolor','lime');
    $("#notification").fadeIn();

    $.post("/admin/price/save-item", {itemId:id, title_short:$("#title_short"+id).val(), symbol:$("#symbol"+id).val(), price:$("#price"+id).val(), dostavka:$("#dostavka"+id).val(), position:$("#position"+id).val()},
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

function addCountry(){
    $("#curr_site").val($("#site").val());
    $("#country_form").submit();
}

function changeCountry(){
    $.post("/admin/price/get-flag", {countryId:$("#country").val()},
            function(data) {
                if(data!=''){
                    $('#flag').html(data);
                }
            }
    );
}
changeCountry();
</script>
{/literal}
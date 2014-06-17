<br />
<center><span style="font-size:16px;">{$adminLangParams.SITES__HEADER}</span></center>
<br />
<div id="gallery">
    <table align="center" width="97%">
        <tr>
            <td align="left" colspan="5" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
            {include file='admin/site/paging.tpl'}
            </td>
        </tr>

        <tr><td colspan="5" height="2" style="line-height:2px;">&nbsp;</td></tr>
        <tr>
            <td class="header" width="80" align="center" style="padding:2px 2px 2px 2px;"><b>ID</b></td>
            <td class="header" style="padding:2px 2px 2px 2px;"><b>{$adminLangParams.SITEST__LINK}</b></td>
            <td class="header" width="180" align="center" style="padding:2px 2px 2px 2px;"><b>{$adminLangParams.SITES__COMPANY_ID}</b></td>
            <td class="header" width="180" align="center" style="padding:2px 2px 2px 2px;"><b>{$adminLangParams.SITES__CEL}</b></td>
            <td class="header" width="180" align="center" style="padding:2px 2px 2px 2px;"><b>{$adminLangParams.LANGUAGES__ACTION}</b></td>
        </tr>
    {foreach from=$languageslist item=item}
        <tr bgcolor="{cycle values='#FFEFAA,#ffffff'}">
            <td style="padding:5px 5px 5px 5px;">{$item.title|stripslashes}</td>
            <td style="padding:5px 5px 5px 5px;">{$item.short_title|stripslashes}</td>
            <td style="padding:5px 5px 5px 5px; width:60px;" align="center" valign="middle">
                <img src="/languages/{$item.short_title_lower}/{$item.flag_image}_flag.jpg" height="19" width="28" />
            </td>
            <td style="padding:5px 5px 5px 5px; width:60px;" align="center">{$item.position}</td>
            <td align="center" style="padding:5px 5px 5px 5px; width:150px;">
                {if $item.lang_id!=100}
                    <a href="/admin/site/modify/id/{$item.lang_id}">{$adminLangParams.ACTION_EDIT}</a>
                    &nbsp;|&nbsp;
                    <a href="/admin/site/delete/id/{$item.lang_id}" onclick="return confirm({$adminLangParams.LANGUAGES__MESSAGE3})">{$adminLangParams.ACTION_DELETE}</a>
                {/if}
            </td>
        </tr>
        <tr><td colspan="5" height="2" style="line-height:2px;">&nbsp;</td></tr>
        {foreachelse}
        <tr>
            <td colspan="5"><b>{$adminLangParams.LANGUAGES__MESSAGE1}</b></td>
        </tr>
    {/foreach}
        <tr>
            <td align="left" colspan="5" style="border-top:0px; border-bottom:0px; border-left:0px; border-right:0px;">
            {include file='admin/site/paging.tpl'}
            </td>
        </tr>
    </table>
</div>
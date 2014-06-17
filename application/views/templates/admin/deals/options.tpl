{foreach from=$options item=option}
<div style="float:left; font-weight: bold; clear: both;">
    <table width="100%">
        <tr>
            <td align="left" width="200" style="font-weight: bold; height: 30px; border: 1px solid #dedede; background: #fff; padding: 5px 5px 5px 5px;">
                {$option.title|stripslashes|strip_tags}:
            </td>
            <td align="left" style="border: 0px; padding-left: 5px;">
                <select name="option[]">
                    <option value="0">&nbsp;--- выберите вариант ---</option>
                    {foreach from=$option.properties item=property}
                        <option value="{$option.id}-{$property.id}" {if $property.selected==1} selected="selected"{/if}>{$property.title|stripslashes|strip_tags}</option>
                    {/foreach}
                </select>
            </td>
        </tr>
    </table>

</div>
{/foreach}
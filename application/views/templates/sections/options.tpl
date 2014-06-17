<form method="post" action="/find.html" name="form_find" id="form_find">
<div class="optionsList">
        <div class="header">Фильтр по опциям</div>
        <table border="0" align="center">
        <tr>
            <td align="center">
                <div class="optionsCon">
                    {foreach from=$options item=option}
                        <div class="optionBlock">
                            <table>
                                <tr>
                                    <td width="180">
                                        {$option.title|strip_tags|stripslashes}<br />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="options[]">
                                            <option value="0"></option>
                                            {foreach from=$option.properties item=prop}
                                                <option value="{$option.id}:{$prop.id}" {if isset($prop.selected)&&$prop.selected==1}selected="selected" {/if}>{$prop.title|strip_tags|stripslashes}</option>
                                            {/foreach}
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    {/foreach}

                    <div class="findCon">
                        <div class="optionBlock" style="padding-top: 5px;">
                            Цена: от<br /><input type="text" id="price_from" name="price_from" style="width: 110px;" value="{$priceFrom}" />
                        </div>
                        <div class="optionBlock" style="padding-top: 5px;">
                            Цена: до<br /><input type="text" id="price_to" name="price_to" style="width: 110px;" value="{$priceTo}" />
                        </div>
                        <div class="optionBlock" style="padding-top: 5px;">
                            <input type="hidden" name="reset" id="reset" value="0" />
                            <input type="hidden" name="currSec" value="{$currSec}" />
                            <input type="hidden" name="prevUrl" value="{$smarty.server.REQUEST_URI}" />

                            <a href="javascript:void(0);" onclick="filterFind();">
                                <div class="buttonFind">Найти</div>
                            </a>
                            <a href="javascript:void(0);" onclick="resetFilter();">
                                <div class="buttonReset">Сбросить</div>
                            </a>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        </table>

</div>
</form>

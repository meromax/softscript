<div class="popProdBoxHeader">
    <div class="title">Также рекомендуем</div>
</div>
<div class="popProdBoxList">
{foreach key=pkey from=$relatedProducts item=pprod}
<div {if $pkey%2==0}class="popProdItemBox2"{else}class="popProdItemBox1"{/if}>
    <table cellpadding="0" cellspacing="0" width="220" border="0">
        <tr>
            <td height="66" width="70" style="text-align: center; vertical-align: middle; padding-left: 4px;">
                <a href="/images/products/{$pprod.image}_big.jpg" class="highslide" onclick="return hs.expand(this);">
                    <img class="pItemImg" src="/images/products/{$pprod.image}_small.jpg" width="66" height="66" style=" border: 1px solid #dadada;" />
                </a>
            </td>
            <td height="86" width="150" style="text-align: center; vertical-align: middle; padding-right: 4px;">
                <div>
                    <div class="pItemTitle" style="padding-left: 0px; padding-right: 7px;">
                        <a href="{$pprod.link}">{$pprod.title|strip_tags|stripslashes}</a>
                    </div>
                    <div class="pItemTitle" style="text-align: left; padding-left: 5px;">
                        <img src="/images/pline.png" height="1" width="136" />
                    </div>
                    <div class="pItemPrice">
                        <table cellpadding="0" cellspacing="0" width="150">
                            <tr>
                                <td align="left" valign="middle" style="text-align: left; padding-left: 5px; padding-top: 4px;">
                                    <img src="/images/icon1.png" style="margin-right: 4px;" />{$pprod.price|strip_tags|stripslashes} р.
                                </td>
                                <td width="60" style="padding-right: 7px;">
                                    <a href="/orders/add-to-cart/{$pprod.id}"><img src="/images/button-buy-small.png" /></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
{/foreach}
</div>
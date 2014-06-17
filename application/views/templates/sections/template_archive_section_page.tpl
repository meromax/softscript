<div class="topTextBlock" style="min-height: 120px;">
    <div class="pageTitle">Архив :: {$item.title|stripslashes|strip_tags}</div>
    {if $item.description!=""}
    <div class="pageText" id="textBox1" style="padding-bottom: 10px; padding-top: 0px;">
        {$item.description|stripslashes|truncate:200}
        <div style="text-align: center; padding: 5px 0px 5px 0px;">
            <a href="javascript:void(0)" onclick="showText(2);hideText(1);"><< развернуть >></a>
        </div>
    </div>

    <div class="pageText" id="textBox2" style="display: none; padding-bottom: 10px; padding-top: 0px;">
        {$item.description|stripslashes}
        <div style="text-align: center; padding: 5px 0px 5px 0px;">
            <a href="javascript:void(0)" onclick="showText(1);hideText(2);">>> свернуть <<</a>
        </div>
    </div>
    {/if}
</div>

{include file='sections/archive_brands.tpl'}
{include file='sections/options.tpl'}

<div class="highslide-gallery">
    <div class="productsList">
        {foreach key=pkey from=$products item=prod}

                <div class="productBox" id="pcon{$prod.id}" onmouseover="pActive('pcon{$prod.id}');" onmouseout="pPassive('pcon{$prod.id}');">
                    <table height="100%" border="0">
                        <tr>
                            <td class="productImg">
                                <div style="border: 0px solid #000;"  onmouseover="showZoomInfo('lupa{$prod.id}');" onmouseout="hideZoomInfo('lupa{$prod.id}');">
                                    <a href="/images/products/{$prod.image}_big.jpg" class="highslide" onclick="return hs.expand(this);">
                                        <img class="pItemImg2" src="/images/products/{$prod.image}_middle.jpg" style="" />
                                    </a>
                                    <div class="lupa" id="lupa{$prod.id}">
                                        <img src="/images/lupa.png"  style="border: 0px; width: 16px; height: 17px;" />
                                        <br />нажмите, чтобы увеличить...
                                    </div>
                                </div>
                            </td>
                            <td class="productInfo">

                                    <div class="header">
                                        <a href="{$prod.link}">{$prod.title|strip_tags|stripslashes}</a>
                                    </div>
                                    <div class="text">
                                        <a href="{$prod.link}">{$prod.addinfo|strip_tags|stripslashes}</a>
                                    </div>

                            </td>
                            <td class="productPriceButton">
                                <div class="price">
                                    {$prod.price|strip_tags|stripslashes} р.
                                </div>
                                <div class="button">
                                    <span style="color: #B70D0E;">нет в наличии</span>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="highslide-caption">
                    Caption for the second image.
                </div>
        {/foreach}
    </div>
</div>
    {if $page_count>1 }
    <div class="paginator">
        {section name=item start=1 loop=$page_count+1 }
            {if $page_num eq $smarty.section.item.index }
                <div class="pointActive">{$page_num}</div>
            {else}
                <a href="/archive/sec/{$activeLeftSection}/page/{$smarty.section.item.index}"><div class="point">{$smarty.section.item.index}</div></a>
            {/if}
        {/section}
    </div>
    {/if}

<div class="archive">
    <a href="/catalog/sec/{$secLink}/page/1">Каталог товаров</a>
</div>

</div>

{literal}
<script type="text/javascript">
    function pActive(id){
        $("#"+id).css("border-left-color","red");
        $("#"+id).css("box-shadow","0 0 7px rgba(0,0,0,0.5)");

    }
    function pPassive(id){
        $("#"+id).css("border-left-color","#0094d5");
        $("#"+id).css("box-shadow","0 0 4px rgba(0,0,0,0.5)");
    }

    function showZoomInfo(id){
        $("#"+id).show();
    }

    function hideZoomInfo(id){
        $("#"+id).hide();
    }

    function showText(id){
        $("#textBox"+id).show();
    }

    function hideText(id){
        $("#textBox"+id).hide();
    }

</script>
{/literal}
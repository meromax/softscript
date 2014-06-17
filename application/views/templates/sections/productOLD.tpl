<div class="topTextBlock" style="min-height: 120px;">
    <div class="pageTitle">{$product.title|stripslashes|strip_tags}</div>


    <div class="productMenuTabs">
        <div class="tabActive" id="tab1">
            <a href="javascript:void(0);" onclick="showProductPage1();">Информация</a>
        </div>
        {if $product.images_count>1}
        <div class="tab" id="tab2">
            <a href="javascript:void(0);" onclick="showProductPage2();">Фотогалерея</a>
        </div>
        {/if}
        {if $product.video|replace:"&nbsp;":""!=""}
        <div class="tab" id="tab3">
            <a href="javascript:void(0);" onclick="showProductPage3();">Видео</a>
        </div>
        {/if}
        {if $product.addinfo2|replace:"&nbsp;":""!=""||$product.files}
        <div class="tab" id="tab4" style="width: 174px; margin-right: 0px;">
            <a href="javascript:void(0);" onclick="showProductPage4();">Инструкции</a>
        </div>
        {/if}
    </div>
    <div class="productPage" id="productPageTab1">
        <div class="pageText2">
            <table>
                <tr>
                    <td height="183" width="160" style="text-align: left; vertical-align: top;">
                        <img class="pItemImg2" src="/images/products/{$product.image}_middle.jpg" style="width: 160px; height:183px;"  alt="{$product.image_title|strip_tags|stripslashes}" title="{$product.image_title|strip_tags|stripslashes}" />
                        <div class="zoomIn3">
                            <a href="/images/products/{$product.image}_big.jpg" class="highslide" onclick="return hs.expand(this);"><img src="/images/icon2.png"  style="border: 0px;" /></a>
                        </div>
                        <div class="pItemPrice3">
                            {$product.price|strip_tags|stripslashes} р.<br /><br />
                            {if $product.active==1}
                                <a href="/orders/add-to-cart/{$product.id}"><img src="/images/button-buy2.png" /></a>
                            {else}
                                <span style="color: #B70D0E;">нет в наличии</span>
                            {/if}
                        </div>
                    </td>
                    <td >
                    {$product.description|stripslashes}
                    </td>
                </tr>
            </table>
        </div>
        {include file='social.tpl'}
    </div>
    <div class="productPage" id="productPageTab2">
        <div class="pageText2">
            {foreach key=pikey from=$product.images item=pimage}
            <div style="float: left; {if ($pikey+1)%3!=0}margin-right: 10px;{/if} margin-bottom: 20px;">
                <a href="/images/products/{$pimage.image}_big.jpg" class="highslide" onclick="return hs.expand(this);">
                    <img class="pItemImg2" src="/images/products/{$pimage.image}_big.jpg" style="width: 190px; height: 217px;"  alt="{$pimage.title|strip_tags|stripslashes}" title="{$pimage.title|strip_tags|stripslashes}" />
                </a>
                {*<img class="pItemImg2" src="/images/products/{$pimage.image}_big.jpg" style="width: 190px; height: 217px;" />*}
                {*<div class="zoomIn4">*}
                    {*<a href="/images/products/{$pimage.image}_big.jpg" class="highslide" onclick="return hs.expand(this);"><img src="/images/icon2.png"  style="border: 0px;" /></a>*}
                {*</div>*}
            </div>
            {/foreach}
        </div>
    </div>

    <div class="productPage" id="productPageTab3">
        <div class="pageText2">
            {$product.video|stripslashes}
        </div>
    </div>

    <div class="productPage" id="productPageTab4">
        <div class="pageText2">
            {$product.addinfo2|stripslashes}
            {if $product.files}
                <div class="filesHeader">Файлы:</div>
                {foreach key=pfkey from=$product.files item=pfile}
                <div class="filesLinks">
                    <div class="fileNum">{$pfkey+1}</div>
                    <div class="fileLink"><a href="/sections/index/get-file/id/{$pfile.id}">{$pfile.title|stripslashes|strip_tags}</a></div>
                </div>
                {/foreach}
            {/if}
        </div>
    </div>


    {include file='sections/product_reviews.tpl'}

    <div>&nbsp;</div>
</div>
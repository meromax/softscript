
<div style="clear: both;"></div>

<div id="slides">
    <div class="slides_container">
        {foreach from=$mainBanners item=item}
            <div class="slide">
                <img src="/images/banners/{$item.image}_big.jpg" height="375" title="{$item.title|strip_tags|stripslashes}" />
            </div>
        {/foreach}
    </div>
    <a href="#" class="prev">
        <img src="/images/mail-left-arrow.png" width="32" height="376" alt="Arrow Prev">
    </a>
    <a href="#" class="next">
        <img src="/images/mail-right-arrow.png" width="32" height="376" alt="Arrow Prev">
    </a>
</div>


{*<div id="slides">*}
    {*<div class="slides_container">*}
        {*{foreach key=mpkey from=$productSlider item=pImagesItems}*}
            {*<div class="slide">*}
                {*{foreach key=pKey from=$pImagesItems item=pItem}*}
                    {*<div class="radarItemBox{if ($pKey+1)%4==0}Last{/if}">*}
                        {*<div class="radarItemHeaderBox">*}
                            {*<table>*}
                                {*<tr>*}
                                    {*<td>{$pItem.keywords|stripslashes|strip_tags}</td>*}
                                {*</tr>*}
                            {*</table>*}
                        {*</div>*}
                        {*<div class="radarItemPriceMilesBox">*}
                            {*<div class="priceBox typeface-js"></div>*}
                            {*<div class="milesBox typeface-js"></div>*}
                        {*</div>*}
                        {*<div style="clear: both;"></div>*}
                        {*<div class="radarItemButtonsBox">*}
                            {*<form action="/search.html" method="post" name="search_form{$mpkey}{$pKey}" id="search_form{$mpkey}{$pKey}">*}
                                {*<a href="javascript:void(0)" onclick="searchByRadar('search_form{$mpkey}{$pKey}');" style="text-decoration: none;">*}
                                {*<div class="buttonSearch">*}
                                    {*<input type="hidden" name="search_words" value="{$pItem.keywords|stripslashes|strip_tags}" />*}
                                    {*<input type="hidden" name="slidermode" value="1" />*}
                                {*</div>*}
                                {*</a>*}
                            {*</form>*}
                        {*</div>*}
                    {*</div>*}
                    {*{if ($pKey+1)%4==0}*}
                        {*<div style="clear: both;"></div>*}
                    {*{/if}*}
                {*{/foreach}*}
            {*</div>*}
        {*{/foreach}*}
    {*</div>*}
    {*<a href="#" class="prev">*}
        {*<img src="/images/left-arrow.png" width="15" height="58" alt="Arrow Prev">*}
    {*</a>*}
    {*<a href="#" class="next">*}
        {*<img src="/images/right-arrow.png" width="15" height="58" alt="Arrow Prev">*}
    {*</a>*}
{*</div>*}

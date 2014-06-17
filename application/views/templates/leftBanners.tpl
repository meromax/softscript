<div class="blok">
    {if $leftBanner1.link!=""}
        <a href="/"><img src="/images/banners/{$leftBanner1.image}_big.jpg" width="240" height="343" /></a>
    {else}
        <img src="/images/banners/{$leftBanner1.image}_big.jpg" width="240" height="343" />
    {/if}
    <div class="label nov">&nbsp;</div>
</div>
<div class="blok">
{if $leftBanner2.link!=""}
    <a href="/"><img src="/images/banners/{$leftBanner2.image}_big.jpg" width="240" height="343" /></a>
    {else}
    <img src="/images/banners/{$leftBanner2.image}_big.jpg" width="240" height="343" />
{/if}
    <div class="label action">&nbsp;</div>
</div>
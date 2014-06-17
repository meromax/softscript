<div class="main_content">
    {include file='sections/leftNavigation.tpl'}

    <div class="main_data">
        <img class="photo" src="images/main_foto.png" alt=""/>

        <div class="main_category">
            <a href="/novelty/page/1">
                <div class="title">
                    Новинки
                </div>
            </a>
            <a href="/novelty/view/{$mainNovelty.link}">
                {if $mainNovelty.image!=""}
                    <img src="/images/deals/{$mainNovelty.image}_big.jpg">
                {else}
                    <img src="/images/prod.jpg">
                {/if}
                <div class="text">
                    {$mainNovelty.description_short|stripslashes}
                </div>
            </a>
        </div>
        <div class="main_category">
            <a href="/actions/page/1">
                <div class="title">
                    Акции
                </div>
            </a>
            <a href="/actions/view/{$mainActions.link}">
                {if $mainActions.image!=""}
                    <img src="/images/deals/{$mainActions.image}_big.jpg">
                {else}
                    <img src="/images/prod.jpg">
                {/if}
                <div class="text">
                    {$mainActions.description_short|stripslashes}
                </div>
            </a>
        </div>

        <div class="main_category last">
            <a href="/deals/page/1">
                <div class="title">
                    Горячие предложения
                </div>
            </a>
            <a href="/deals/view/{$mainHotDeals.link}">
                {if $mainHotDeals.image!=""}
                    <img src="/images/deals/{$mainHotDeals.image}_big.jpg">
                {else}
                    <img src="/images/prod.jpg">
                {/if}
                <div class="text">
                    {$mainHotDeals.description_short|stripslashes}
                </div>
            </a>
        </div>


        <div class="clearfix"></div>

        <div class="about_company">
            <div class="title">
                {$mainAboutCompany.title|stripslashes|strip_tags}
            </div>
            <div class="text">
                {$mainAboutCompany.description_short|stripslashes}
            </div>
        </div>
    </div>
</div>
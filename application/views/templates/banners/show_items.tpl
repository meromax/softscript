<div class="banners mTop20">
    <div class="banner" {if $rightBannersMenu!='plus'} onmouseover="changeImage(3, 1);" onmouseout="changeImage(3, 0);" {/if}>
        <a href="/plus/">
            {if $rightBannersMenu!='plus'}
                <img id="b3" src="/images/banners/3.png" alt="" border="0" />
            {else}
                <img id="b3" src="/images/banners/3_pushed.png" alt="" border="0" />
            {/if}
        </a>
    </div>
    <div class="banner" onmouseover="changeImage(4, 1);" onmouseout="changeImage(4, 0);">
        <a href="/getfile1.html">
            <img id="b4" src="/images/banners/4.png" alt="" border="0" />
        </a>
    </div>
    <div class="clear"></div>
    <div class="banner_title" {if $rightBannersMenu!='plus'} onmouseover="changeImage(3, 1);" onmouseout="changeImage(3, 0);" {/if}>
        <a href="/plus/">
            Готовые предложения
        </a>
    </div>
    <div class="banner_title" onmouseover="changeImage(4, 1);" onmouseout="changeImage(4, 0);">
        <a href="/getfile1.html">
            Каталог нержаве-
            ющего крепежа
        </a>
    </div>



    <div class="banner" onmouseover="changeImage(5, 1);" onmouseout="changeImage(5, 0);">
        <a href="/getfile2.html">
            <img id="b5" src="/images/banners/5.png" alt="" border="0" />
        </a>
    </div>
    <div class="banner" {if $rightBannersMenu!='advantages'} onmouseover="changeImage(2, 1);" onmouseout="changeImage(2, 0);" {/if}>
        <a href="/advantages/">
            {if $rightBannersMenu!='advantages'}
                <img id="b2" src="/images/banners/2.png" alt="" border="0" />
            {else}
                <img id="b2" src="/images/banners/2_pushed.png" alt="" border="0" />
            {/if}
        </a>
    </div>
    <div class="clear"></div>
    <div class="banner_title"  onmouseover="changeImage(5, 1);" onmouseout="changeImage(5, 0);">
        <a href="/getfile2.html">
            Каталог такелажа
        </a>
    </div>
    <div class="banner_title" {if $rightBannersMenu!='advantages'} onmouseover="changeImage(2, 1);" onmouseout="changeImage(2, 0);" {/if}>
        <a href="/advantages/">
            Преимужества работы
        </a>
    </div>



    <div class="banner" {if $rightBannersMenu!='reviews'} onmouseover="changeImage(6, 1);" onmouseout="changeImage(6, 0);" {/if}>
        <a href="/reviews/">
            {if $rightBannersMenu!='reviews'}
                <img id="b6" src="/images/banners/6.png" alt="" border="0" />
            {else}
                <img id="b6" src="/images/banners/6_pushed.png" alt="" border="0" />
            {/if}
        </a>
    </div>
    <div class="banner" {if $rightBannersMenu!='payment'} onmouseover="changeImage(1, 1);" onmouseout="changeImage(1, 0);" {/if}>
        <a href="/payment/">
            {if $rightBannersMenu!='payment'}
                <img id="b1" src="/images/banners/1.png" alt="" border="0" />
            {else}
                <img id="b1" src="/images/banners/1_pushed.png" alt="" border="0" />
            {/if}
        </a>
    </div>
    <div class="clear"></div>
    <div class="banner_title" {if $rightBannersMenu!='reviews'} onmouseover="changeImage(6, 1);" onmouseout="changeImage(6, 0);" {/if}>
        <a href="/reviews/">
            Вопросы и предложения
        </a>
    </div>
    <div class="banner_title" {if $rightBannersMenu!='payment'} onmouseover="changeImage(1, 1);" onmouseout="changeImage(1, 0);" {/if}>
        <a href="/payment/">
            Доставка и оплата
        </a>
    </div>
</div>
{literal}
<script type="text/javascript">
    function changeImage(id, type){
        if(type){
            $("#b"+id).attr('src','/images/banners/'+id+'__selected.png');
        } else {
            $("#b"+id).attr('src','/images/banners/'+id+'.png');
        }
    }
</script>
        
{/literal}

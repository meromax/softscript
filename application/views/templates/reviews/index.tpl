<div class="staticPageBox">
    <div class="pageTitle">Отзывы</div>
    <div class="pageText">

        <div class="reviewForm">
            <form action="/reviews/index/send" method="post" id="reviews_form">
                <div class="inpBox">
                    <input type="text" name="name" id="name" placeholder="Ваше имя" value="{$userInfo.first_name|stripslashes|strip_tags}" />
                </div>
                <div class="inpBox">
                    <input type="text" name="email" id="email" placeholder="E-mail" value="{$userInfo.email|stripslashes|strip_tags}" />
                </div>
                <div class="inpBox2">
                    <textarea name="message" id="message" placeholder="Текст отзыва"></textarea>
                </div>
                {if !$UserLogedIn}
                    <a href="/loginpage.html" style="text-decoration: none;">
                        <div class="redButton" style="margin-left: 406px; float: left;">Оставить отзыв</div>
                    </a>
                    {else}
                    <a href="javascript:void(0);" id="reviews_send" style="text-decoration: none;">
                        <div class="redButton" style="margin-left: 406px; float: left;">Оставить отзыв</div>
                    </a>
                {/if}
                <div id="reviewWarning">&nbsp;</div>
            </form>
        </div>

        <div style="clear: both;"></div>

        <div class="pageText" style="padding-top: 47px;">
            <div class="reviewListBox">
            {foreach from=$items item=item}
                <div class="item">
                    <div class="name">{$item.first_name|stripslashes|strip_tags}</div>
                    <div class="date">{$item.post_date|date_format:"%d.%m.%Y"}</div>
                    <div class="text">{$item.text|stripslashes}</div>

                </div>
            {/foreach}

            {if $page_count>1 }
                <div class="item">
                    <div class="paginator">
                        {section name=item start=1 loop=$page_count+1 }
                            {if $page_num eq $smarty.section.item.index }
                                <div class="pointActive">{$page_num}</div>
                                {else}
                                <a href="/reviews/page/{$smarty.section.item.index}"><div class="point">{$smarty.section.item.index}</div></a>
                            {/if}
                            {if $smarty.section.item.index != $page_count }
                            {/if}
                        {/section}
                    </div>
                </div>
            {/if}
            </div>
        </div>

        <div style="clear: both;"></div>

    </div>
</div>
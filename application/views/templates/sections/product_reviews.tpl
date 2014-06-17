{*{if $productsReviews}*}
{*<div class="reviewHeaderBox" style="clear: both;">*}
    {*<div class="title">Отзывы</div>*}
    {*{if $UserLogedIn}*}
    {*<div class="addReview">*}
        {*<a href="javascript:void(0);" onclick="showReviewBox();">Добавить отзыв</a>*}
    {*</div>*}
    {*{/if}*}
{*</div>*}
{*{/if}*}
{if $UserLogedIn}
<div class="review_comment_box" id="review" style="padding-bottom: 40px; height: 100px;">
    <form method="post" name="reviewForm" id="reviewForm">
    <textarea class="review_comment_textarea" name="review" id="reviewid"></textarea>
    <input type="hidden" name="product_id" value="{$product.id}" />
    <div style="background: #fff;">
        <div class="reviewMessage" id="reviewMessage" style="font-size: 11px;">
            Отзыв отправлен и будет опубликован после проверки модератором!
        </div>
        <div class="review_sendButton">
            <a href="javascript:void(0);" onclick="addReview();">
                <div class="buttonRed">Отправить</div>
            </a>
        </div>
    </div>
    </form>
</div>
{/if}
{if $productsReviews}
{*<div class="reviewLine"></div>*}

{foreach from=$productsReviews item=ritem}
<div class="reviewBox">
    <div class="name">{$ritem.username}</div>
    <div class="comment">
        {$ritem.description|stripslashes|strip_tags}
    </div>
    {foreach from=$ritem.comments item=rcitem}
        <div class="forum_answer_con3">
            <div class="head" style="font-family: tahoma;">
                {$rcitem.username}
            </div>
            <div class="forum_answer">
                {$rcitem.description|stripslashes|strip_tags}
            </div>
        </div>
    {/foreach}

    {if $UserLogedIn}
    <div class="addComment" style="padding-left:30px;">
        <a href="javascript:void(0);" onclick="showReviewCommentBox({$ritem.id});">Оставить коментарий</a>
    </div>
    <div class="review_comment_box" id="review_comment{$ritem.id}" style="margin-left: 30px; margin-right: 0px; display:none;">
        <form method="post" name="reviewCoomentForm{$ritem.id}" id="reviewCoomentForm{$ritem.id}">
        <textarea class="review_comment_textarea" style="width: 572px;" name="review_comment" id="reviewComment{$ritem.id}"></textarea>
        <input type="hidden" name="review_id" value="{$ritem.id}" />
        <div style="background: #fff;">
            <div class="reviewMessage" id="reCommentMessage{$ritem.id}" style="font-size: 11px;">
                Отзыв отправлен и будет опубликован после проверки модератором!
            </div>
            <div class="review_sendButton" style="padding-right: 16px;">
                <a href="javascript:void(0);" onclick="addReviewComment({$ritem.id});">
                    <div class="buttonRed">Отправить</div>
                </a>
            </div>
        </div>
        </form>
    </div>
    {/if}
</div>

{*<div class="reviewLine2"></div>*}
{/foreach}
{else}
    пока нет ни одного отзыва...
{/if}
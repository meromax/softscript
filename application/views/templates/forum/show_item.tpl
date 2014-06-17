<div class="topTextBlock">
    <div class="pageTitle">{$item.title|stripslashes}</div>
    <div class="forum_text">
        {$item.description|stripslashes}
    </div>
    {if $answers}
        <div class="forum_comment_header">Комментарии:</div>
        {foreach key=faKey from=$answers item=fitem}
            <div {if ($faKey+1)%2==0}class="forum_answer_con1"{else}class="forum_answer_con2"{/if}>
                <div class="head" style="font-family: tahoma;">
                    {$fitem.username}
                </div>
                <div class="forum_answer_date" style="font-family: tahoma;">
                    {$fitem.post_date}
                </div>
                <div class="forum_answer" style="font-family: tahoma;">
                    {$fitem.description|stripslashes|strip_tags}
                </div>
            </div>
        {/foreach}
    {/if}

    {if $UserLogedIn}
        <div class="forum_comment_header">Ваш коментарий:</div>
        <div class="forum_comment_box" style="padding-left: 10px; margin-bottom: 20px;">
        <form method="post" name="forumCommentForm" id="forumCommentForm">
            <textarea class="forum_comment_textarea" name="comment" id="comment"></textarea>
            <input type="hidden" name="forum_id" value="{$item.id}" />
            <div>
                <div class="commentMessage" id="commentMessage" style="font-size: 11px; padding-left: 10px; display: none; float: left; color: green;">
                    Комментарий отправлен и будет опубликован после проверки модератором!
                </div>
                <div class="review_sendButton" style="padding-right: 10px; float: right; padding-top: 0px;">
                    <a href="javascript:void(0);" onclick="addForumComment();"><img src="/images/send-button.png"></a>
                </div>
            </div>
        </form>
        </div>
    {/if}
    <br /><br />
</div>
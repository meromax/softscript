<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Отзывы
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/products/index/page/1">Список товаров</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/admin/sections/categories/section_id/{$section_id}/spage/1/page/1">Категории товаров</a>
                </li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">


            <div class="span3">
                <div class="portlet box grey">


                    <div class="portlet-title">
                        <div class="caption"><i class="icon-info"></i>Текущий товар</div>
                    </div>
                    <div class="portlet-body">
                        <div class="scroller" data-height="300px">
                            <a href="/product/{$product.link}" target="_blank"><h4>{$product.title|stripslashes}</h4></a>
                            {$product.description|stripslashes|strip_tags}
                        </div>
                    </div>


                </div>
            </div>



            <div class="span9">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список отзывов</div>
                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;">#</th>
                                <th>Заголовок</th>
                                <th class="span2" style="text-align: center;">Дата</th>
                                <th class="span2" style="text-align: center;">Опубликован</th>
                                <th class="span1" style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach from=$productReviews item=item}
                                <tr>
                                    <td class="span1" style="text-align: center; vertical-align: middle;">{$item.id}</td>
                                    <td style="vertical-align: middle;">
                                        <b>{$item.username|stripslashes}</b><br />
                                        {$item.description|stripslashes|strip_tags}
                                        {if $item.comments}
                                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 10px; margin-top: 15px;">
                                            <thead>
                                            <tr>
                                                <th colspan="4" style="text-align: center;">Комментарии</th>
                                            </tr>
                                            <tr>
                                                <th style="font-size: 11px;">Заголовок</th>
                                                <th class="span2" style="text-align: center; font-size: 11px;">Дата</th>
                                                <th class="span1" style="text-align: center; font-size: 11px;">Опубликован</th>
                                                <th class="span2" style="text-align: center;">Действия</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                {foreach from=$item.comments item=prcomment}

                                                    <tr bgcolor="#EEEEEE">
                                                        <td style="font-size: 11px;">
                                                            <b>{$prcomment.username|stripslashes}</b><br />
                                                            {$prcomment.description|stripslashes|strip_tags}
                                                        </td>
                                                        <td style="text-align: center; vertical-align: middle; font-size: 11px;">{$item.post_date}</td>
                                                        <td style="text-align: center; vertical-align: middle;">
                                                            {if $prcomment.active==1}
                                                                <a href="javascript:void(0);" class="btn green" onclick="changeProductReviewCommentActive('{$prcomment.id}');" id="prc_status_link{$prcomment.id}" title="Опуликован"><i id="prc_status_icon{$prcomment.id}" class="icon-eye-open" style="font-size: 20px;"></i></a>
                                                            {else}
                                                                <a href="javascript:void(0);" class="btn red" onclick="changeProductReviewCommentActive('{$prcomment.id}');" id="prc_status_link{$prcomment.id}" title="Не опуликован"><i id="prc_status_icon{$prcomment.id}" class="icon-eye-close" style="font-size: 20px;"></i></a>
                                                            {/if}
                                                        </td>
                                                        <td style="text-align: center; vertical-align: middle;">
                                                            <a href="/admin/products/delete-review-comment/product_id/{$product.id}/comment_id/{$prcomment.id}" class="btn red" onclick="return confirm('Вы уверены, что хотите удалить комментарий?')"><i class="icon-remove"></i> {$adminLangParams.ACTION_DELETE}</a>
                                                        </td>
                                                    </tr>

                                                {/foreach}
                                            </tbody>
                                        </table>
                                        {/if}
                                    </td>

                                    <td class="hidden-480" style="text-align: center; max-width: 150px; vertical-align: middle;">
                                        {$item.post_date|stripslashes}
                                    </td>

                                    <td style="text-align: center; max-width: 150px; vertical-align: middle;">
                                        {if $item.active==1}
                                            <a href="javascript:void(0);" class="btn green" onclick="changeProductReviewActive('{$item.id}');" id="status_link{$item.id}" title="Опуликован"><i id="status_icon{$item.id}" class="icon-eye-open" style="font-size: 20px;"></i></a>
                                        {else}
                                            <a href="javascript:void(0);" class="btn red" onclick="changeProductReviewActive('{$item.id}');" id="status_link{$item.id}" title="Не опуликован"><i id="status_icon{$item.id}" class="icon-eye-close" style="font-size: 20px;"></i></a>
                                        {/if}
                                    </td>

                                    <td class="span3" style="text-align: center; vertical-align: middle;">
                                        <a href="/admin/products/delete-review/product_id/{$product.id}/review_id/{$item.id}" class="btn red" onclick="return confirm('Вы уверены, что хотите удалить отзыв?')"><i class="icon-remove"></i> Удалить</a>
                                    </td>
                                </tr>
                                {foreachelse}
                                <tr>
                                    <td colspan="6" style="text-align: center;">Нет ни одного отзыва...</td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                        {include file='admin/products/reviews/paging.tpl'}

                    </div>


                </div>
            </div>

        </div>

    </div>

</div>



{literal}
<script type="text/javascript">
    function chnagePage(){
        document.location.href="/admin/sections/index/content_page_id/"+$("#content_page_id").val()+"/page/1";
    }

    function changeProductReviewActive(reviewId){
        $("#status_icon"+reviewId).html("<div style='position: absolute; margin-left: -14px; margin-top: 3px;'><img src='/images/loading.gif' style='width: 48px; height: 8px;'></div>");
        $.post("/admin/products/change-review-active", {id:reviewId},
                function(data) {
                    $("#status_icon"+reviewId).html("");
                    if(data==1){
                        $("#status_link"+reviewId).attr('title','Опуликован');
                        $("#status_link"+reviewId).removeClass('btn red');
                        $("#status_link"+reviewId).addClass('btn green');
                        $("#status_icon"+reviewId).removeClass('icon-eye-close');
                        $("#status_icon"+reviewId).addClass('icon-eye-open');
                    } else {
                        $("#status_link"+reviewId).attr('title','Не опуликован');
                        $("#status_link"+reviewId).removeClass('btn green');
                        $("#status_link"+reviewId).addClass('btn red');
                        $("#status_icon"+reviewId).removeClass('icon-eye-open');
                        $("#status_icon"+reviewId).addClass('icon-eye-close');
                    }
                }
        );
    }

    function changeProductReviewCommentActive(commentId){
        $("#prc_status_icon"+commentId).html("<div style='position: absolute; margin-left: -14px; margin-top: 3px;'><img src='/images/loading.gif' style='width: 48px; height: 8px;'></div>");
        $.post("/admin/products/change-comment-active", {id:commentId},
                function(data) {
                    $("#prc_status_icon"+commentId).html("");
                    if(data==1){
                        $("#prc_status_link"+commentId).attr('title','Опуликован');
                        $("#prc_status_link"+commentId).removeClass('btn red');
                        $("#prc_status_link"+commentId).addClass('btn green');
                        $("#prc_status_icon"+commentId).removeClass('icon-eye-close');
                        $("#prc_status_icon"+commentId).addClass('icon-eye-open');
                    } else {
                        $("#prc_status_link"+commentId).attr('title','Не опуликован');
                        $("#prc_status_link"+commentId).removeClass('btn green');
                        $("#prc_status_link"+commentId).addClass('btn red');
                        $("#prc_status_icon"+commentId).removeClass('icon-eye-open');
                        $("#prc_status_icon"+commentId).addClass('icon-eye-close');
                    }
                }
        );
    }
</script>
{/literal}

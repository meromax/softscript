<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <h3 class="page-title">
                Акции
            </h3>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/admin">Главная</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/admin/deals/index/page/1">Список акций</a></li>
            </ul>

        </div>
    </div>

    <div id="dashboard">

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Фильтр</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    <div class="portlet-body" id="gallery">

                        <form action="#" class="form-horizontal" style="margin: 10px 0px 10px 0px;">

                        <div class="control-group" style="padding-top: 0px; margin-bottom: 0px;">
                            <div class="span3">
                                &nbsp;
                            </div>
                            <div class="span3">
                                <label class="control-label">Выберите раздел:</label>
                                <div class="controls">
                                    <select id="section" name="section" class="m-wrap chosen" tabindex="1" onchange="changeSection();">
                                        <option value="0" {if $curr_section==0}selected="selected"{/if}> ----------- </option>
                                        {foreach from=$sections item=sec}
                                            <option value="{$sec.id}" {if $curr_section==$sec.id}selected="selected"{/if}>{$sec.title|stripslashes|strip_tags}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="span3">
                                <label class="control-label">Выберите категорию:</label>
                                <div class="controls">
                                    <select id="category" name="category" class="m-wrap chosen" tabindex="1" onchange="changeCategory();">
                                        <option value="0" {if $curr_category==0}selected="selected"{/if}> ----------- </option>
                                        {foreach from=$categories item=cat}
                                            <option value="{$cat.id}" {if $curr_category==$cat.id}selected="selected"{/if}>{$cat.title|stripslashes|strip_tags}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="span3">
                                &nbsp;
                            </div>
                        </div>
                        </form>


                    </div>


                </div>


            </div>

        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box grey">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-list"></i>Список акций</div>
                        <div class="actions">
                            <a href="/admin/deals/add" class="btn blue"><i class="icon-plus"></i> Добавить</a>
                            <div class="btn-group">
                                <a class="btn green" href="#" data-toggle="dropdown">
                                    <i class="icon-cogs"></i> Инструменты
                                    <i class="icon-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-right" style="width: 250px;">
                                    <li><a href="javascript:void(0);" onclick="customAlertBox('Распечатать');"><i class="icon-print"></i> Распечатать</a></li>
                                    <li><a href="javascript:void(0);" onclick="customAlertBox('Удалить отмеченные');"><i class="icon-trash"></i> Удалить отмеченные</a></li>
                                    <li><a href="javascript:void(0);" onclick="customAlertBox('Экпортировать в Excel');"><i class="icon-sort-by-alphabet"></i> Экпортировать в Excel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body" id="gallery">

                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="span1" style="text-align: center;">#</th>
                                <th>Картинка</th>
                                <th>Заголовок</th>
                                <th class="hidden-480" style="text-align: center;">Цена</th>
                                <th class="hidden-480" style="text-align: center;">Позиция</th>
                                <th class="hidden-480" style="text-align: center;">Статус</th>
                                <th class="hidden-480" style="text-align: center;">Акция</th>
                                <th style="text-align: center;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach from=$products item=item}
                                <tr>
                                    <td class="span1" style="text-align: center; vertical-align: middle;">{$item.id}</td>
                                    <td class="span1" style="vertical-align: middle;">
                                        {if $item.image!=''}
                                            <span>
                                                <a href="/images/products/{$item.image}_big.jpg?time={$smarty.now}" rel="lightbox">
                                                    <img src="/images/products/{$item.image}_small.jpg"  width="88" height="62"  style="border:1px solid #b2b2b2;" />
                                                </a>
                                            </span>
                                        {/if}
                                    </td>
                                    <td style="vertical-align: middle;">
                                        {$item.title|stripslashes}
                                    </td>
                                    <td class="hidden-480 span2" style="text-align: center; vertical-align: middle;">
                                        {$item.price|strip_tags|stripslashes}
                                    </td>
                                    <td class="hidden-480 span2" style="text-align: center; vertical-align: middle;">
                                        {$item.position|strip_tags|stripslashes}
                                    </td>
                                    <td class="hidden-480 span2" style="text-align: center; vertical-align: middle;">
                                        {if $item.active==1}
                                            <a href="javascript:void(0);" onclick="changeRecommend('{$item.id}');" id="status_link{$item.id}" style="text-decoration: none;"><span style="color:green; font-weight: bold;">Активный</span></a>
                                        {else}
                                            <a href="javascript:void(0);" onclick="changeRecommend('{$item.id}');" id="status_link{$item.id}" style="text-decoration: none;"><span style="color:red; font-weight: bold;">Архив</span></a>
                                        {/if}
                                    </td>
                                    <td class="hidden-480 span2" style="text-align: center; vertical-align: middle;">
                                        {if $item.action==1}
                                            <a href="javascript:void(0);" onclick="changeAction('{$item.id}');" id="action_link{$item.id}" style="text-decoration: none;"><span style="color:green; font-weight: bold;">Акция</span></a>
                                        {else}
                                            <a href="javascript:void(0);" onclick="changeAction('{$item.id}');" id="action_link{$item.id}" style="text-decoration: none;">Продукт</a>
                                        {/if}
                                    </td>
                                    <td class="span4" style="text-align: center; vertical-align: middle;">
                                        <a href="/admin/products/modify/id/{$item.id}">{$adminLangParams.PRODUCTS__MODIFY}</a>
                                        &nbsp;|&nbsp;
                                        <a href="/admin/products/delete/id/{$item.id}" onclick="return confirm({$adminLangParams.PRODUCTS__DELETE_PRODUCT})">{$adminLangParams.PRODUCTS__DELETE}</a>
                                        &nbsp;|&nbsp;
                                        <a href="/admin/products/reviews/product_id/{$item.id}/page/1">Отзывы</a>
                                    </td>
                                </tr>
                                {foreachelse}
                                <tr>
                                    <td colspan="8" style="text-align: center;">Нет ни одной акции...</td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                        {include file='admin/products/paging.tpl'}

                    </div>


                </div>


            </div>

        </div>

    </div>

</div>

{literal}
<script type="text/javascript">
//    function changeSection(){
//        document.location.href="/admin/deals/index/section/"+$("#section").val()+"/brand/"+$("#brand").val()+"/page/1";
//    }
    function changeSection(){
        document.location.href="/admin/deals/index/section/"+$("#section").val()+"/category/"+$("#category").val()+"/page/1";
    }

    function changeCategory(){
        document.location.href="/admin/deals/index/section/"+$("#section").val()+"/category/"+$("#category").val()+"/page/1";
    }
    function getCategories(categoryId){
        var sectionId = $("#section").val();
        $.post("/admin/sections/ajax-get-categories", {section_id:sectionId, category_id:categoryId},
                function(data) {
                    if(data!=''){
                        $("#categories_container").html(data);
                    }
                }
        );
    }
    function changeBrand(){
        document.location.href="/admin/deals/index/section/"+$("#section").val()+"/brand/"+$("#brand").val()+"/page/1";
    }

    function changeRecommend(dealId){

        $.post("/admin/deals/change-recommend", {id:dealId},
                function(data) {
                    if(data==1){
                        $("#status_link"+dealId).html('<span style="color:green; font-weight: bold;">Активный</span>');
                    } else {
                        $("#status_link"+dealId).html('<span style="color:red; font-weight: bold;">Архив</span>');
                    }

                }
        );
    }

    function changeAction(dealId){

        $.post("/admin/deals/change-action", {id:dealId},
                function(data) {
                    if(data==1){
                        $("#action_link"+dealId).html('<span style="color:green; font-weight: bold;">Акция</span>');
                    } else {
                        $("#action_link"+dealId).html('Продукт');
                    }

                }
        );
    }

</script>
{/literal}
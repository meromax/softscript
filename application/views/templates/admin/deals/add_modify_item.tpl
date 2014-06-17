<div class="container-fluid">

<div class="row-fluid">
    <div class="span12">

        <h3 class="page-title">
            {if $action == 'modify'}Добавление{else}Изменение{/if} акции <small>&nbsp;</small>
        </h3>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="/admin">Главная</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="/admin/deals/index/page/1">Список акций</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="javascript:void(0);">{if $action == 'modify'}Добавление{else}Изменение{/if} акции</a>
            </li>
        </ul>

    </div>
</div>

<div id="dashboard">

    <div class="row-fluid ">
        <div class="span12">
            <!-- BEGIN INLINE TABS PORTLET-->
            <div class="portlet box grey">
                <div class="portlet-title">
                    <div class="caption">
                        {if $action == 'modify'}<i class="icon-pencil"></i> {$adminLangParams.PRODUCTS__PRODUCT_MODIFYING}{else}<i class="icon-plus"></i> {$adminLangParams.PRODUCTS__PRODUCT_ADDING}{/if}
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="row-fluid">
                        <div class="span12">
                            <form method="POST" action="/admin/products/{$action}" name="product_form" id="product_form" enctype="multipart/form-data">
                                <input type="hidden" name="step" value="2">
                                {if $item.id}
                                    <input type="hidden" name="id" value="{$item.id}">
                                {/if}

                                <!--BEGIN TABS-->
                                <div class="tabbable tabbable-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab_1_1" data-toggle="tab">ОСНОВНАЯ ИНФОРМАЦИЯ</a></li>
                                        <li><a href="#tab_1_2" data-toggle="tab">ЦЕНЫ И СКИДКИ</a></li>
                                        <li><a href="#tab_1_3" data-toggle="tab">СРОКИ ПРОВЕДЕНИЯ</a></li>
                                        <li><a href="#tab_1_4" data-toggle="tab">ОГРАНИЧЕНИЯ И БОНУСЫ</a></li>
                                        <li><a href="#tab_1_5" data-toggle="tab">ОПИСАНИЕ АКЦИИ</a></li>
                                        <li><a href="#tab_1_6" data-toggle="tab">ИНФОРМАЦИЯ О ПРОДАВЦЕ</a></li>
                                        <li><a href="#tab_1_7" data-toggle="tab">META ИНФОРМАЦИЯ</a></li>
                                        <li><a href="#tab_1_8" data-toggle="tab">КАРТИНКИ</a></li>
                                        {*<li><a href="#tab_1_9" data-toggle="tab">ФАЙЛЫ</a></li>*}
                                        <li><a href="#tab_1_10" data-toggle="tab">РЕКОМЕНДУЕМЫЕ АКЦИИ</a></li>
                                    </ul>
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_1_1" style="padding-left: 10px; padding-top: 20px;">
                                            {include file='admin/deals/tab_general.tpl'}
                                        </div>

                                        <div class="tab-pane active" id="tab_1_2" style="padding-left: 10px; padding-top: 20px;">
                                            {include file='admin/deals/tab_prices.tpl'}
                                        </div>

                                        <div class="tab-pane active" id="tab_1_3" style="padding-left: 10px; padding-top: 20px;">
                                            {include file='admin/deals/tab_datatime.tpl'}
                                        </div>

                                        <div class="tab-pane" id="tab_1_7" style="padding-left: 10px; padding-top: 20px;">

                                            {include file='admin/products/products_meta.tpl'}

                                        </div>


                                        <div class="tab-pane" id="tab_1_6" style="padding-left: 10px; padding-top: 20px;">

                                            {include file='admin/products/products_additional.tpl'}

                                        </div>

                                        <div class="tab-pane" id="tab_1_8" style="padding-left: 10px; padding-top: 20px;">
                                            {include file='admin/products/products_images.tpl'}
                                        </div>


                                        {*<div class="tab-pane" id="tab_1_9" style="padding-left: 10px; padding-top: 20px;">*}
                                            {*{include file='admin/products/products_files.tpl'}*}
                                        {*</div>*}

                                        <div class="tab-pane" id="tab_1_10" style="padding-left: 10px; padding-top: 20px;">

                                            {include file='admin/products/products_recommended_box.tpl'}

                                        </div>

                                    </div>
                                </div>
                                <!--END TABS-->

                                <div class="form-actions" style="padding-left: 12px;">
                                    <button type="button" class="btn blue" onclick="{if $action == 'modify'}checkForm(1){else}checkForm(0){/if};"><i class="icon-ok"></i> Сохранить</button>
                                    <button type="button" class="btn" onclick="document.location.href='/admin/products/index/page/1'"><i class="icon-undo"></i> Отмена</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END INLINE TABS PORTLET-->
        </div>
    </div>

</div>

</div>
{literal}

<script type="text/javascript">
    
function checkForm(type){
	var title = document.getElementById('title').value;
    if ($("#section").val() == 0) {
        alert('Вы должны указать раздел.');
    } else if ($("#title").val() == '') {
		alert('Вы должны указать заголовок.');
	} else if ($("#price").val() == '') {
        alert('Вы должны указать цену.');
    } else if ($("#position").val() == '') {
        alert('Вы должны указать позицию.');
    } else if(type==0 && $("#image_title1").val() == ''&&$("#image_title2").val() == ''&&$("#image_title3").val() == ''&&$("#image_title4").val() == ''&&$("#image_title5").val() == '') {
        alert('Вы должны выбрать заголовок картинки.');
    } else if(type==0 && $("#image1").val() == ''&&$("#image2").val() == ''&&$("#image3").val() == ''&&$("#image4").val() == ''&&$("#image5").val() == '') {
        alert('Вы должны выбрать картинку.');
    } else {
            document.forms.product_form.submit();
    }
}

function calculatePercents(){
    setTimeout(function() {
        var percents = 100-parseInt((parseInt($("#price").val())*100)/parseInt($("#old_price").val()));

        if(percents!=NaN&&percents>0){
            $("#discount").val(percents);
        } else {
            $("#discount").val(0);
        }


    }, 2000);
}

function getOptionsProperties(productId){
    var sectionId = $("#section").val();
    $.post("/admin/products/ajax-get-options-properties", {section_id:sectionId, product_id:productId},
            function(data) {
                if(data!=''){
                    $("#optionsContainer").html(data);
                }
            }
    );
}


function delFile(fileId){
    $("#setLink"+fileId).css('padding-top','0px');
    $("#setLink"+fileId).html("<h4>Удаление <span class='light'>файла...</span></h4><img src='/images/loading.gif' />");
    $.post("/admin/products/del-file", {id:fileId},
            function(data) {
                if(data!=''){
                    setTimeout(function() {
                        $("#fileCon"+fileId).fadeOut("slow");
                    }, 2000);
                }
            }
    );
}

function delRecommendedId(id){
    var idsArray = $("#recommendedIds").val().split(",");
    var idsArrayNew = new Array();

    j=0;
    for(i=0; i<idsArray.length; i++){
        if(idsArray[i]!=id){
            idsArrayNew[j] = idsArray[i];
            j++;
        }
    }

    var idsStr = idsArrayNew.join(",");
    $("#recommendedIds").val(idsStr);
}

function delImage(imageId){
    $("#setLink"+imageId).css('padding-top','0px');
    $("#setLink"+imageId).html("<h4>Удаление <span class='light'>картинки...</span></h4><img src='/images/loading.gif' />");
    $.post("/admin/products/del-image", {id:imageId},
            function(data) {
                if(data!=''){
                    setTimeout(function() {
                        $("#imageDataCon"+imageId).fadeOut("slow");
                    }, 2000);

                }
            }
    );
}

function searchRecommendedProducts(){

    var productSearch = $("#product_search").val();

    if(productSearch.length>1&&productSearch!=''){
        $("#recommendedContainer").html("<center><img src='/images/loading.gif'></center>");
        $.post("/admin/products/ajax-get-recommended-products", {product_search:productSearch, prSelIds:$("#recommendedIds").val()},
                function(data) {
                    if(data!=''){
                        $("#recommendedContainer").html(data);
                    }
                }
        );
    } else {
        $("#recommendedContainer").html("");
    }
}

function addRecommendedId(id){
    if($("#recommendedIds").val()!=''){
        var idsArray = $("#recommendedIds").val().split(",");
        idsArray[idsArray.length] = id;
        var idsStr = idsArray.join(",");
        $("#recommendedIds").val(idsStr);

        if(idsArray.length-1>0){
            return idsArray[idsArray.length-2];
        } else {
            return 0;
        }
    } else {
        $("#recommendedIds").val(id);
        return 0;
    }

}

function addPR(prId){
    $("#rLoader").html("<img src='/images/loading.gif'>");
    $.post("/admin/products/ajax-get-rec-prod-item", {pr_id:prId},
            function(data) {

                if(data!=""){
                    var prevId = addRecommendedId(prId);

                    if(prevId!=0){
                        $('#prConSel'+prevId).after(data);
                    } else {
                        $('#mainPRSCon').after(data);
                    }
                    $('#prCon'+prId).remove();

                    $("#rLoader").html("&nbsp;");

                } else {

                }
            }
    );
}

function delPR(prId){
    $("#recommendedContainer").html("<img src='/images/loading.gif'>");
    delRecommendedId(prId);
    $('#prConSel'+prId).remove();
    searchRecommendedProducts();
}

function setMainImageStatus(imageId, productId){
    $("#setLink"+imageId).css('padding-top','0px');
    $("#setLink"+imageId).html("<h4>Сохранение <span class='light'>данных...</span></h4><img src='/images/loading.gif' />");
    $.post("/admin/products/set-main-image", {id:imageId, product_id:productId},
            function(data) {
                if(data!=''){
                    //set main image
                    $("#innerImageDataCon"+imageId).css("border","1px solid #9dcc41");
                    $("#setLink"+imageId).html('<h4>Главная <span class="light">картинка</span></h4>');
                    $("#setLink"+imageId).css('padding-top','10px');

                    //reset image to default
                    $("#innerImageDataCon"+data).css("border","1px solid #dddddd");
                    $("#setLink"+data).css('padding-top','11px');
                    var button1 = '<button type="button" class="btn green" onclick="setMainImageStatus('+data+','+productId+');"><i class="icon-ok"></i> Сделать главной</button>';
                    var button2 = '<button type="button" class="btn red" onclick="delImage('+data+');"><i class="icon-remove white"></i> Удалить</button>';
                    $("#setLink"+data).html(button1+" "+button2);
                }
            }
    );
}



function setLink(){
    var link = createLinkFromTitle($("#title").val());
    $("#link").val(link);
}

function getCategories(categoryId){
    var sectionId = $("#section").val();
    $("#categories_container").html("<img src='/images/loading.gif'>");
    $.post("/admin/sections/ajax-get-categories", {section_id:sectionId, category_id:categoryId},
            function(data) {
                if(data!=''){
                    $("#categories_container").html(data);
                }
            }
    );
}


{/literal}
getCategories({$item.category_id});
getOptionsProperties({$item.id});
{literal}
</script>
{/literal}
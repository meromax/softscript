function getCategories(categoryId){
    var sectionId = $("#section").val();
    $("#categories_container").html("<img src='/images/loading.gif'>");
    $.post("/profile/index/ajax-get-categories", {section_id:sectionId, category_id:categoryId},
        function(data) {
            if(data!=''){
                $("#categories_container").html(data);
            }
        }
    );
}

function setLink(){
    var link = createLinkFromTitle($("#title").val());
    $("#link").val(link);
}

function createLinkFromTitle(title) {
    var link = title.replace(/([а-яё])|([\s_-])|([^a-z\d])/gi,
        function (all, ch, space, words, i) {
            if (space || words) {
                return space ? '-' : '';
            }
            var code = ch.charCodeAt(0),
                index = code == 1025 || code == 1105 ? 0 :
                    code > 1071 ? code - 1071 : code - 1039,
                t = ['yo', 'a', 'b', 'v', 'g', 'd', 'e', 'zh',
                    'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
                    'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh',
                    'shch', '', 'y', '', 'e', 'yu', 'ya'
                ];
            return t[index];
        });

    return link.toLowerCase();
}

function resetImage(id){
    alert(id);
    $(".fileupload-new").css('display', 'block');
    $(".fileupload-preview").css('display', 'none');
    $("#pic"+id).attr('src','/images/products/default-270x189.png');
    $("#image"+id).val('');
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

function checkForm(type){
    $("#profileWarning").addClass("hidden");

    if ($("#section").val() == 0) {
        alert('Вы должны указать раздел.');
    } else if ($("#title").val() == '') {
        $("#profileWarning").html("Вы должны указать заголовок.");
        $("#profileWarning").removeClass("hidden");
        //setTabToActive(1);
    } else if ($("#price").val() == '') {
        $("#profileWarning").html("Вы должны указать цену.");
        $("#profileWarning").removeClass("hidden");
    } else if ($("#old_price").val() == '') {
        $("#profileWarning").html("Вы должны указать старую цену.");
        $("#profileWarning").removeClass("hidden");
    } else if ($("#position").val() == '') {
        $("#profileWarning").html("Вы должны указать позицию.");
        $("#profileWarning").removeClass("hidden");
    } else if(type==0 && $("#image_title1").val() == ''&&$("#image_title2").val() == ''&&$("#image_title3").val() == ''&&$("#image_title4").val() == ''&&$("#image_title5").val() == '') {
        $("#profileWarning").html("Вы должны выбрать заголовок картинки.");
        $("#profileWarning").removeClass("hidden");
    } else if(type==0 && $("#image1").val() == ''&&$("#image2").val() == ''&&$("#image3").val() == ''&&$("#image4").val() == ''&&$("#image5").val() == '') {
        $("#profileWarning").html("Вы должны выбрать картинку.");
        $("#profileWarning").removeClass("hidden");
    } else {
        $("#product_add_form").submit();
    }
}

function setTabToActive(tabId){
    for(var i=1; i<7; i++){
        $("#tab"+i).removeClass('active');
        $("#tab1-"+i).removeClass('active in')
    }
    $("#tab"+tabId).addClass('active');
    $("#tab1-"+tabId).addClass('active in');
}

function searchRecommendedProducts(){
    var productSearch = $("#product_search").val();
    if(productSearch.length>1&&productSearch!=''){
        $("#recommendedContainer").html("<center><img src='/images/loading.gif'></center>");
        $.post("/profile/index/ajax-get-recommended-products", {product_search:productSearch, prSelIds:$("#recommendedIds").val()},
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

function addPR(prId){
    $("#rLoader").html("<img src='/images/loading.gif'>");
    $.post("/profile/index/ajax-get-rec-prod-item", {pr_id:prId},
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

function delFile(fileId){
    $("#setLink"+fileId).css('padding-top','0px');
    $("#setLink"+fileId).html("<h4>Удаление <span class='light'>файла...</span></h4><img src='/images/loading.gif' />");
    $.post("/profile/index/ajax-del-file", {id:fileId},
        function(data) {
            if(data!=''){
                setTimeout(function() {
                    $("#fileCon"+fileId).fadeOut("slow");
                }, 2000);
            }
        }
    );
}

function delImage(imageId){
    $("#setLink"+imageId).css('padding-top','0px');
    $("#setLink"+imageId).html("<h4>Удаление <span class='light'>картинки...</span></h4><img src='/images/loading.gif' />");
    $.post("/profile/index/ajax-del-image", {id:imageId},
        function(data) {
            if(data!=''){
                setTimeout(function() {
                    $("#imageDataCon"+imageId).fadeOut("slow");
                }, 2000);

            }
        }
    );
}

function setMainImageStatus(imageId, productId){
    $("#setLink"+imageId).css('padding-top','0px');
    $("#setLink"+imageId).html("<h4>Сохранение <span class='light'>данных...</span></h4><img src='/images/loading.gif' />");
    $.post("/profile/index/ajax-set-main-image", {id:imageId, product_id:productId},
        function(data) {
            if(data!=''){
                //set main image
                $("#innerImageDataCon"+imageId).css("border","1px solid #9dcc41");
                $("#setLink"+imageId).html('<h4>Главная <span class="light">картинка</span></h4>');
                $("#setLink"+imageId).css('padding-top','10px');

                //reset image to default
                $("#innerImageDataCon"+data).css("border","1px solid #dddddd");
                $("#setLink"+data).css('padding-top','23px');
                var button1 = '<button type="button" class="btn btn-success push-down-10" onclick="setMainImageStatus('+data+','+productId+');">Сделать главной</button>';
                var button2 = '<button type="button" class="btn btn-danger push-down-10" onclick="delImage('+data+');">Удалить</button>';
                $("#setLink"+data).html(button1+" "+button2);
            }
        }
    );
}
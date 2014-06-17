function changeRecommend(productId){
    $("#status_link"+productId).html("<img src='/images/loading.gif' style='width: 49px; height: 27px;'>");
    $.post("/profile/index/ajax-change-recommend", {id:productId},
        function(data) {
            if(data==1){
                $("#status_link"+productId).html('<span class="btn btn-success" style="width: 25px;">ДА</span>');
            } else {
                $("#status_link"+productId).html('<span class="btn btn-danger" style="width: 25px;">НЕТ</span>');
            }

        }
    );
}


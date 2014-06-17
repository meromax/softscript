var messageId;

/********************************************************************/
/************************ Authorize **********************************/
/********************************************************************/
var email_error   = 'Введите e-mail';
var email_error2  = 'Некорректный e-mail';
var password_error   = 'Введите пароль';

function checkLoginFormBeforeSend(){

    clearTimeout(messageId);

    var msg='';

    var mail      = /^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;

    var email          = document.getElementById('login_email');

    if($("#login_email").val()==''){
        msg = msg+email_error+"<br />";
    } else if(email.value.match(mail)==null){
        msg = msg+email_error2+"<br />";
    }

    if($("#login_password").val()==''){
        msg = msg+password_error+"<br />";
    }


    if(msg==''){
        $("#login_message_box").addClass("hidden");
        document.forms.form_login.submit();
    } else {
        $("#login_message_box").html(msg);
        $("#login_message_box").removeClass("hidden");
        messageId = setTimeout(function () {
            $("#login_message_box").addClass("hidden");
        }, 5000);

    }
}


/********************************************************************/
/************************ Registration ******************************/
/********************************************************************/
function checkBeforeRegister(){
    clearTimeout(messageId);
    $("#reg_message_box").html("<center><img src='/images/loading.gif'></center>");
    $("#reg_message_box").removeClass("hidden");
    $.post("/ajax/index/check-before-register", $("#regform").serialize(),
        function(data) {
            if(data!=''){
                $("#reg_message_box").html(data);
                $("#reg_message_box").removeClass("hidden");
            } else {
                $("#reg_post").val(1);
                $("#regform").submit();
            }
        }
    );
}


function saveProfile(){
    clearTimeout(messageId);

    $("#profile_message_box").removeClass("alert-danger");
    $("#profile_message_box").removeClass("alert-success");
    $("#profile_message_box").addClass("alert-info");

    $("#profile_message_box").html("<center><img src='/images/loading.gif'></center>");
    $("#profile_message_box").removeClass("hidden");


    $.post("/ajax/index/save-profile", $("#profile_form").serialize(),
        function(data) {
            if(data!=''){
                if(data=="1"){
                    $("#profile_message_box").removeClass("alert-danger");
                    $("#profile_message_box").removeClass("alert-info");
                    $("#profile_message_box").addClass("alert-success");

                    $("#profile_message_box").html("Данные сохранены успешно...");
                    $("#profile_message_box").removeClass("hidden");
                    messageId = setTimeout(function(){
                        $("#profile_message_box").addClass("hidden");
                    }, 5000);
                } else {
                    $("#profile_message_box").addClass("hidden");
                    $("#profile_message_box").removeClass("alert-info");
                    $("#profile_message_box").removeClass("alert-success");
                    $("#profile_message_box").addClass("alert-danger");

                    $("#profile_message_box").html(data);

                    $("#profile_message_box").removeClass("hidden");

//                    messageId = setTimeout(function(){
//                        $("#profile_message_box").addClass("hidden");
//                    }, 5000);
                }
            } else {
                //$("#reg_post").val(1);
                //$("#profile_form").submit();
            }
        }
    );
}



/********************************************************************/
/************************ Init element actions **********************/
/********************************************************************/
$(document).ready(function() {


    /* Init top cart */
    initTopCart();

//    $("#searchBtn").click(function () {
//        if($('#search_input').val()!=''){
//            $("#search_form").submit();
//        }
//    });

    $('#ddmenu li').hover(function () {
        clearTimeout($.data(this,'timer'));
        $('ul',this).stop(true,true).fadeIn(200);
    }, function () {
        $.data(this,'timer', setTimeout($.proxy(function() {
            $('ul',this).stop(true,true).fadeOut(200);
        }, this), 100));
    });

    $('.main_category').mouseenter(function(){
        $(this).find('.title').addClass('infoactive');
    });

    $('.main_category').mouseleave(function(){
        $(this).find('.title').removeClass('infoactive');
    });

    $("#searchBtn").click(function () {
        if($('#search_input').val()!=''){
            $("#search_form").submit();
        } else {
            $("#search_input").css('color','#ff0000');
            $("#search_input").css('font-weight','bold');
            $("#search_input").val($('#search_error').val());
            $("#searchBtn").attr('disabled',true);
            setTimeout(function(){
                $("#search_input").css('color','#000');
                $("#search_input").css('font-weight','normal');
                $("#search_input").val('');
                $("#searchBtn").attr('disabled',false);
            }, 3000);
            jQuery(this).blur();
            return false;
        }
    });

    $("#search").bind('keypress', function(e) {
        if(e.which == 13&&$('#search').val()=='') {
            $("#search_input").css('color','#ff0000');
            $("#search_input").css('font-weight','bold');
            $("#search_input").val($('#search_error').val());
            $("#searchBtn").attr('disabled',true);
            setTimeout(function(){
                $("#search_input").css('color','#000');
                $("#search_input").css('font-weight','normal');
                $("#search_input").val('');
                $("#searchBtn").attr('disabled',false);
            }, 3000);
            jQuery(this).blur();
            return false;
        } else {
            jQuery('#submit').focus().click();
        }
    });

    //reviews
    $("#reviews_send").click(function () {
        checkReviewBeforeSend();
    });
    //online order
    $("#contact_send").click(function () {
        checkOrderBeforeSend();
    });

    $("#button_order").click(function () {
        $("#status").val(0);
        $("#order_form").submit();
    });

    $("#button_refresh").click(function () {
        $("#status").val(1);
        $("#order_form").submit();
    });

    $("#button_order_do").click(function () {
        validateOrderForm();
    })

    $("#loginBoxButton").click(function () {
        $("#loginBoxForm").submit();
    })

    $("#payment_method_do").click(function () {
        $("#payment_form").submit();
    })

    $("#pay_button").click(function () {

        $.post("/orders/index/save-order-ajax",
            function(msg) {
                var payData = msg.split("|");
                $("#amount").val(payData[0]);
                $("#orderId").val(payData[1]);
                $("#pay").submit();
            }
        );
    });




//    $("#register").click(function () {
//        $("#reg_post").val(1);
//        $("#regform").submit();
//    })
//    $("#searchButton").click(function () {
//        $("#search_form").submit();
//    })

//    $("#save_profile").click(function () {
//        $("#profile_form").submit();
//    })
    //$("#email").val("");
    //$("#password").val("");


    $("#save_profile").click(function () {
        clearTimeout(messageId);
        $.post("/ajax/index/save-profile", $("#profile_form").serialize(),
            function(data) {
                if(data!=''){
                    if(data=="1"){
                        $("#message_box").html("Данные сохранены успешно...");
                        $("#message_box").fadeIn();
                        messageId = setTimeout(function(){
                            $("#message_box").fadeOut();
                        }, 5000);
                    } else {
                        $("#message_box").fadeOut();
                        $("#message_box").html(data);
                        $("#message_box").fadeIn();
                        messageId = setTimeout(function(){
                            $("#message_box").fadeOut();
                        }, 5000);
                    }
                } else {
                    //$("#reg_post").val(1);
                    //$("#profile_form").submit();
                }
            }
        );
    });

});







function checkReviewBeforeSend(){

    clearTimeout(messageId);
    var mail      = /^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
    var msg='';
    var email = $('#email').val();

    if($('#name').val()==''){
        msg = 'Поле "Ваше имя" должно быть заполнено...';
    } else if(email==''){
        msg = 'Поле "E-mail" должно быть заполнено...';
    } else if(email.match(mail)==null){
        msg = 'Введите правильный E-mail...';
    } else if($('#message').val()==''){
        msg = 'Введите отзыв...';
    }

    if(msg==''){
        $("#reviewWarning").fadeOut("slow");
        $("#reviews_form").submit();
    } else {
        $("#reviewWarning").html(msg);
        $("#reviewWarning").fadeIn('slow');
        messageId = setTimeout(function () { $("#reviewWarning").fadeOut("slow"); }, 5000);

    }
}

function checkOrderBeforeSend(){
    clearTimeout(messageId);
    var msg='';

    if($('#name').val()==''){
        msg = 'Поле "Ваше имя" должно быть заполнено';
    } else if($('#phone').val()==''){
        msg = 'Поле "Ваш телефон" должно быть заполнено';
    } else if($('#message').val()==''){
        msg = 'Поле "Необходимо" должно быть заполнено';
    }

    if(msg==''){
        $("#worning").fadeOut("slow");
        $("#contact_form").submit();
    } else {
        $("#worning").html(msg);
        $("#worning").fadeIn('slow');
        messageId = setTimeout(function () { $("#worning").fadeOut("slow"); }, 5000);

    }
}







function restorePassword(){
    var email = $("#restore_email").val();
    $.post("/ajax/index/restore-password", {restore_email:email},
        function(data) {

            if(data==1){
                $("#restore_message").css('color','#990000');
                $("#restore_message").css('font-weight','normal');
                $("#restore_message").html($("#restore_error1").val());
                $("#error_container").fadeIn();
                setTimeout(function(){
                    $("#error_container").fadeOut();
                }, 5000);
            } else if(data==2){
                $("#restore_message").css('color','#990000');
                $("#restore_message").css('font-weight','normal');
                $("#restore_message").html($("#restore_error2").val());
                $("#error_container").fadeIn();
                setTimeout(function(){
                    $("#error_container").fadeOut();
                }, 5000);
            } else {
                $("#restore_message").css('color','#006600');
                $("#restore_message").css('font-weight','bold');
                $("#restore_message").html($("#restore_error0").val());
                $("#error_container").fadeIn();
                setTimeout(function(){
                    $("#error_container").fadeOut();
                }, 5000);
            }
        }
    );
}





function validateOrderForm(){
    $("#warning").addClass("hidden");
    var errors = '';
    if($("#name").val()==''){
        errors += "- Поле 'Ваши имя' должно быть заполнено<br />";
    }

    if($("#email").val()==''){
        errors += "- Поле 'E-mail' должно быть заполнено<br />";
    }

//    if($("#phone").val()==''){
//        errors += "- Поле 'Контактный тел' должно быть заполнено<br />";
//    }

    if(errors!==''){
        $("#warning").html(errors);
        $("#warning").removeClass("hidden");
    } else {
        $("#order_form").submit();
    }

}



function checkOrderForm(){
	if($("#sitename").val()==""||$("#domain").val()==""){
   		$("#message_box").html(fields_should_filled);
		$("#message_box").fadeIn('slow');
		setTimeout(function () { $("#message_box").fadeOut("slow"); }, 5000);
	} else {
		
	  var domain_name = document.getElementById('domain').value;
	  var domain_zone = document.getElementById('domain_zone').value;
	  
	  var url = "domain="+domain_name+"&domain_zone="+domain_zone;
	  if(domain_name!=""){
		  
		  $("#progress").show("fast");
		  $("#domain_notification_container").html("");
		  $.ajax({
		   type: "POST",
		   url: "/order/index/whois",
		   data: url,
		   success: function(msg){
			 //alert(msg);
		   	    $("#progress").hide("fast");
			   	if(msg==1){
			   		document.forms.order_form.submit();
			   	} else {
			   		$("#message_box").html("http://"+domain_name+" "+domain_not_free);
					$("#message_box").fadeIn('slow');
					setTimeout(function () { $("#message_box").fadeOut("slow"); }, 4000);
			   	}
		   }
		 });	
	  }
	}
}

function getCMSBySiteType(){
	
	  var sitetype = document.getElementById('sitetype').value;
	  
	  var url = "sitetype_id="+sitetype;

	  $.ajax({
	   type: "POST",
	   url: "/order/index/getcms",
	   data: url,
	   success: function(msg){
	   	    //$("#preloader").fadeOut("fast");
		   	if(msg!=0){
		   		$("#cms_container").html(msg);
				//$("#comment_form").show({"opacity": "show" }, { "duration": "slow", "easing": "easein" });
		   	}
	   }
	 });	
}
function changeLanguage(lang_id){
	document.location.href="/languages/index/index/lang_id/"+lang_id;
}

function orderDesign(form_name){
	document.forms[form_name].submit();
}




function checkDomain(){
//alert("Ad");
  var domain_name = document.getElementById('domain').value;
  var domain_zone = document.getElementById('domain_zone').value;
  
  var url = "domain="+domain_name+"&domain_zone="+domain_zone;
  if(domain_name!=""){
	  $("#progress").show("fast");
	  $.ajax({
	   type: "POST",
	   url: "/order/index/whois",
	   data: url,
	   success: function(msg){
		 //alert(msg);
	   	    $("#progress").hide("fast");
		   	if(msg==1){
		   		$("#domain_notification_container").html("<span style='color:#006600; font-size:11px; font-weight:bold;'>http://"+domain_name+" "+domain_free+".</span>");
		   	} else {
		   		$("#domain_notification_container").html("<span style='color:#660000; font-size:11px; font-weight:bold;'>http://"+domain_name+" "+domain_not_free+".</span>");
		   	}
	   }
	 });	
  } else {
	  $("#domain_notification_container").html("<span style='color:#006600; font-size:11px; font-weight:bold;'>"+domain_input_check+".</span>");
  }
}



function checkBeforeSend(){
	var msg='';

	var number    = /^[0-9]$/;
	var mail      = /^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
	
	var fname          = document.getElementById('fname');
	var lname          = document.getElementById('lname');
	var email          = document.getElementById('email');
	var title          = document.getElementById('title');
	var message        = document.getElementById('message');

	if(fname.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter your 'First Name'.</span><br />";
	}
	
	if(lname.value == ''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter your 'Last Name'.</span><br />";
	}
	
	if(email.value==''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter your 'Email Address'.</span><br />";
	} else if(email.value.match(mail)==null){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter a valid 'Email Address'.</span><br />";
	}
	
	if(message.value==''){
		msg = msg+"- <span style='padding:3px 3px 3px 3px; color:black; font-size:12px;'>Please enter the 'Message'.</span><br />";
	}
	
	
	if(msg==''){
		$("#message_box").fadeOut("slow");
		document.forms[0].submit();
	} else {
		$("#message_text").html(msg);
		$("#message_box").fadeIn('slow');
		setTimeout(function () { $("#message_box").fadeOut("slow"); }, 5000);
		
	}
}

function showProfilePage1(){
    $("#tab1").attr("class","tabActive");
    $("#tab2").attr("class","tab");

    $("#pageTab1").css("display","block");
    $("#pageTab2").css("display","none");
}

function showProfilePage2(){
    $("#tab1").attr("class","tab");
    $("#tab2").attr("class","tabActive");

    $("#pageTab1").css("display","none");
    $("#pageTab2").css("display","block");
}

function showProductPage1(){
    $("#tab1").attr("class","tabActive");
    $("#tab2").attr("class","tab");
    $("#tab3").attr("class","tab");
    $("#tab4").attr("class","tab");

    $("#productPageTab1").css("display","block");
    $("#productPageTab2").css("display","none");
    $("#productPageTab3").css("display","none");
    $("#productPageTab4").css("display","none");
}

function showProductPage2(){
    $("#tab1").attr("class","tab");
    $("#tab2").attr("class","tabActive");
    $("#tab3").attr("class","tab");
    $("#tab4").attr("class","tab");

    $("#productPageTab1").css("display","none");
    $("#productPageTab2").css("display","block");
    $("#productPageTab3").css("display","none");
    $("#productPageTab4").css("display","none");
}

function showProductPage3(){
    $("#tab1").attr("class","tab");
    $("#tab2").attr("class","tab");
    $("#tab3").attr("class","tabActive");
    $("#tab4").attr("class","tab");

    $("#productPageTab1").css("display","none");
    $("#productPageTab2").css("display","none");
    $("#productPageTab3").css("display","block");
    $("#productPageTab4").css("display","none");
}

function showProductPage4(){
    $("#tab1").attr("class","tab");
    $("#tab2").attr("class","tab");
    $("#tab3").attr("class","tab");
    $("#tab4").attr("class","tabActive");

    $("#productPageTab1").css("display","none");
    $("#productPageTab2").css("display","none");
    $("#productPageTab3").css("display","none");
    $("#productPageTab4").css("display","block");
}
function showReviewBox(){
    $("#reviewMessage").hide();
    $("#reviewid").val('');
    $("#review").slideDown("slow");
}
function hideReviewBox(){
    $("#review").slideUp("slow");
}
function addReview(){
    clearTimeout(messageId);

    if($("#reviewid").val()==''){
        $("#reviewMessage").html("Введите какой-нибудь текст.");
        $("#reviewMessage").removeClass("hidden");

    } else {

        $("#reviewMessage").addClass("hidden");
        $("#reviewMessage").addClass("alert-info");
        $("#reviewMessage").removeClass("alert-danger");
        $("#reviewMessage").removeClass("alert-success");
        $("#reviewMessage").html("<center><img src='/images/loading.gif'></center>");
        $("#reviewMessage").removeClass("hidden");

        $.post("/sections/index/add-review", $("#reviewForm").serialize(),
            function(data) {
                $("#reviewMessage").removeClass("alert-info");
                if(data==1){
                    $("#reviewMessage").addClass("hidden");
                    $("#reviewMessage").addClass("alert-success");
                    $("#reviewMessage").removeClass("alert-danger");
                    $("#reviewid").val('');
                    $("#reviewMessage").html("Отзыв отправлен и будет опубликован после проверки модератором!");
                    $("#reviewMessage").removeClass("hidden");
                    messageId = setTimeout(function(){
                        $("#reviewMessage").addClass("hidden");
                    }, 5000);
                } else {
                    $("#reviewMessage").removeClass("alert-success");
                    $("#reviewMessage").addClass("alert-danger");
                    $("#reviewMessage").addClass("hidden");
                    $("#reviewMessage").html("Произошла ошибка! Попробуйте обновить страницу.");
                    $("#reviewMessage").removeClass("hidden");
                }
            }
        );
    }
}

function showReviewCommentBox(reviewId){
    $("#reCommentMessage"+reviewId).hide();
    $("#reviewComment"+reviewId).val('');
    $("#review_comment"+reviewId).slideDown("slow");
}

function hideReviewCommentBox(reviewId){
    $("#review_comment"+reviewId).slideUp("slow");
}

function addReviewComment(reviewId){

    if($("#reviewComment"+reviewId).val()==''){
        $("#reCommentMessage"+reviewId).html("<span style='color:red;'>Введите какой-нибудь текст.</span>");
        $("#reCommentMessage"+reviewId).show();
    } else {
        $.post("/sections/index/add-review-comment", $("#reviewCoomentForm"+reviewId).serialize(),
            function(data) {
                if(data==1){
                    $("#reviewComment"+reviewId).val('');
                    $("#reCommentMessage"+reviewId).html("Комментарий отправлен и будет опубликован после проверки модератором!");
                    $("#reCommentMessage"+reviewId).show();
                    setTimeout(function(){
                        //hideReviewCommentBox(reviewId);
                    }, 3000);
                } else {
                    $("#reCommentMessage"+reviewId).html("<span style='color:red;'>Произошла ошибка! Попробуйте обновить страницу.</span>");
                    $("#reCommentMessage"+reviewId).show();
                }
            }
        );
    }

}


function addForumComment(){
    if($("#comment").val()==''){
        $("#commentMessage").html("<span style='color:red;'>Введите какой-нибудь текст.</span>");
        $("#commentMessage").show();
    } else {
        $.post("/forum/index/add-comment", $("#forumCommentForm").serialize(),
            function(data) {
                if(data==1){
                    $("#comment").val('');
                    $("#commentMessage").html("Коментарий отправлен и будет опубликован после проверки модератором!");
                    $("#commentMessage").show();
                    setTimeout(function(){
                        $("#commentMessage").hide();
                    }, 3000);
                } else if(data==3) {
                    $("#commentMessage").html("<span style='color:red;'>Комментарий не должен превышать 500 символов.</span>");
                    $("#commentMessage").show();
                } else {
                    $("#commentMessage").html("<span style='color:red;'>Произошла ошибка! Попробуйте обновить страницу.</span>");
                    $("#commentMessage").show();
                }
            }
        );
    }
}

function filterFind(){
    $("#reset").val(0);
    $("#form_find").submit();
}

function resetFilter(){
    $("#reset").val(1);
    $("#form_find").submit();
}

function addToCart(prodId){

    var prodTitle = $("#prodTitle"+prodId).text();

    var prodCount = parseInt($("#prodCount"+prodId).val());
    var message =  'Продукт <b>'+ prodTitle + '</b> в количестве <b>'+prodCount+'</b> добавлен в корзину.';

    var currProdCount = parseInt($("#prodCount").text());

    $("#prodCount").text(currProdCount+prodCount);

    openMessageBox(message);

    $.post("/orders/index/add-to-cart-ajax", {product_count:prodCount, product_id:prodId},
        function(data) {
            //get top cart
            initTopCart();
        }
    );

}

function initTopCart(){
    $("#products_in_cart").html("<center><img src='/images/loading.gif'></center>");
    $.post("/orders/index/get-top-cart-ajax",
        function(msg) {
            $("#products_in_cart").html(msg);
        }
    );
}

function closeMessageBox(){
    $(".message").hide();
}

function openMessageBox(message){
    $("#prodTitle").html(message);
    $(".message").fadeIn();

    clearTimeout(messageId);
    messageId = setTimeout(function(){
        closeMessageBox();
    }, 5000);
}

function incProdCount(id){
    var currentCount = parseInt($("#prodCount"+id).val());
    if(currentCount<99){
        $("#prodCount"+id).val(currentCount+1);
    }
}

function decProdCount(id){
    var currentCount = parseInt($("#prodCount"+id).val());
    if(currentCount>1){
        $("#prodCount"+id).val(currentCount-1);
    }
}

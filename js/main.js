function checkLogin(){
	$.post("/ajax/index/index", $("#loginform").serialize(),
		function(data) {
   			if(data==0){
   				$("#login_error2").hide();
   				$("#login_error").fadeIn();
				setTimeout(function(){  
					$("#login_error").fadeOut();				       
				}, 3000);     				
   			} else if(data==-1){
   				$("#login_error").hide();
   				$("#login_error2").fadeIn();
				setTimeout(function(){  
					$("#login_error2").fadeOut();				       
				}, 3000);     				
   			} else {
   				$("#loginform").submit();
   			}
		}
	);	
}

function checkBeforeRegister(){
	$.post("/ajax/index/check-before-register", $("#regform").serialize(),
		function(data) {
   			if(data!=''){
   				$("#reg_errors_box").html(data);
   				$("#reg_errors_box").fadeIn();
				setTimeout(function(){  
					$("#reg_errors_box").fadeOut();				       
				}, 3000);     				
   			} else {
   				$("#reg_post").val(1);
   				$("#regform").submit();
   			}
		}
	);	
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

function getLanguagesByChoosedLangId(){
	var lang_from = $("#lang_from_id").val();

	$.post("/ajax/index/get-languages-by-choosed-lang-id", {lang_from_id:lang_from},
		function(data) {
			
   			if(data!=''){
   				alert(data);
   				$("#lang_id_to_container").html(data);
   			}
		}
	);	
}

function validateTranslationForm(){
	$("#tform_error1").hide();
	$("#tform_error2").hide();
	$("#tform_error3").hide();
	$("#tform_error4").hide();
	
	if($("#file").val()=='' && $("#translation_text").val()==''){
		$("#tform_error0").fadeIn("slow");
		setTimeout(function(){  
			$("#tform_error0").fadeOut();				       
		}, 3000);			
	} else if($("#lang_from_id").val()==0){
		$("#tform_error1").fadeIn("slow");
		setTimeout(function(){  
			$("#tform_error1").fadeOut();				       
		}, 3000);			
	} else if($("#lang_to_id").val()==0){
		$("#tform_error2").fadeIn("slow");
		setTimeout(function(){  
			$("#tform_error2").fadeOut();				       
		}, 3000);			
	} else if($("#ttheme_id").val()==0){
		$("#tform_error3").fadeIn("slow");
		setTimeout(function(){  
			$("#tform_error3").fadeOut();				       
		}, 3000);			
	} else if($("#lang_from_id").val()==$("#lang_to_id").val()){
		$("#tform_error4").fadeIn("slow");
		setTimeout(function(){  
			$("#tform_error4").fadeOut();				       
		}, 3000);			
	} else {
		$("#translation_form").attr('action','/order-preview.html');
		$("#translation_form").submit();
	}	
}

function validateTranslationForm2(){
	$("#tform_error1").hide();
	$("#tform_error2").hide();
	$("#tform_error3").hide();
	$("#tform_error4").hide();

	if($("#file").val()=='' && $("#translation_text").val()==''){
		$("#tform_error0").fadeIn("slow");
		setTimeout(function(){
			$("#tform_error0").fadeOut();
		}, 3000);
	} else if($("#lang_from_id").val()==0){
		$("#tform_error1").fadeIn("slow");
		setTimeout(function(){
			$("#tform_error1").fadeOut();
		}, 3000);
	} else if($("#lang_to_id").val()==0){
		$("#tform_error2").fadeIn("slow");
		setTimeout(function(){
			$("#tform_error2").fadeOut();
		}, 3000);
	} else if($("#ttheme_id").val()==0){
		$("#tform_error3").fadeIn("slow");
		setTimeout(function(){
			$("#tform_error3").fadeOut();
		}, 3000);
	} else if($("#lang_from_id").val()==$("#lang_to_id").val()){
		$("#tform_error4").fadeIn("slow");
		setTimeout(function(){
			$("#tform_error4").fadeOut();
		}, 3000);
	} else {
		$("#translation_form2").attr('action','/order-preview2.html');
		$("#translation_form2").submit();
	}
}

function checkFileExtension(filename_path, ext){
    var data = filename_path.split(".");
    if(data[data.length-1]== ext){
        return true;
    } else {
        return false;
    }
}

$(document).ready(function() {
	//login
	$("#login").click(function () {
		checkLogin();
    });
    
	$("#register").click(function () { 
		checkBeforeRegister();	
    });

    $("#restore").click(function () {
		restorePassword();
    });
    
    $("#calculate").click(function () { 
		validateTranslationForm();
    });

    $("#calculate2").click(function () {
		validateTranslationForm2();
    });
    
    $("#file").change(function () {
        if(!checkFileExtension($("#file").val(), "txt")&&!checkFileExtension($("#file").val(), "docx")){
            $("#tform_error5").fadeIn("slow");
            $("#file").val('');
            setTimeout(function(){
                $("#tform_error5").fadeOut();
            }, 3000);
        } else {
            $("#add_file_button span span").html($("#file-uploaded").val());
        }

    });    


    $("#order_link").click(function () {
		$("#order_preview_form").submit();
    });

    $("#order_link2").click(function () {
        $.post("/ajax/index/check-email", $("#order_preview_form2").serialize(),
            function(data) {
                if(data!=''){
                    $("#reg_errors_box").html(data);
                    $("#reg_errors_box").fadeIn();
                    setTimeout(function(){
                        $("#reg_errors_box").fadeOut();
                    }, 3000);
                } else {
                    $("#reg_post").val(1);
                    $("#order_preview_form2").submit();
                }
            }
        );
    });
    
    $("#save_profile").click(function () {
        $.post("/ajax/index/save-profile", $("#profile_form").serialize(),
            function(data) {
                if(data!=''){
                    if(data=='1'){
                        $("#profile_errors_box").hide("fast");
                        $("#profile_success_box").fadeIn();
                        setTimeout(function(){
                            $("#profile_success_box").fadeOut();
                        }, 3000);
                    } else {
                        $("#profile_success_box").hide("fast");
                        $("#profile_errors_box").html(data);
                        $("#profile_errors_box").fadeIn();
                        setTimeout(function(){
                            $("#profile_errors_box").fadeOut();
                        }, 3000);
                    }
                } else {
                    //$("#reg_post").val(1);
                    //$("#profile_form").submit();
                }
            }
        );
    });    
    
});
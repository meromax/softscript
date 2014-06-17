var modalLink = '/admin';
function customConfirmBox(message, link){
    customCloseBox();
    $("#customConfirmText").html("<p>"+message+"</p>");
    customShowButtons('Confirm');
    customOpenBox('Confirm');
    modalLink = link;
}

function customLoaderBox(message){
    $("#customConfirmClose").css('display','none');
    $("#customConfirmText").html("<p>"+message+"</p>");
    customShowLoader('Confirm');
    customOpenBox('Confirm');
}

function customLoaderBoxSetMessage(message){
    $("#customConfirmText").html("<p>"+message+"</p>");
}

function customAlertBox(message){
    customCloseBox();
    $("#customAlertText").html("<p>"+message+"</p>");
    customOpenBox('Alert');
}

function customOpenBox(boxType){
    $(".modal-backdrop").fadeIn();
    $("#custom"+boxType).fadeIn();
}

function customShowButtons(boxType){
    $("#custom"+boxType+"Close").prop('visibility',true);
    $("#custom"+boxType+"Loader").hide();
    $("#custom"+boxType+"Buttons").show();
}

function customShowLoader(boxType){
    $("#custom"+boxType+"Close").prop('visibility',false);
    $("#custom"+boxType+"Loader").show();
    $("#custom"+boxType+"Buttons").hide();
}

function customCloseBox(){
    $('#customConfirm, #customAlert').fadeOut();
    $(".modal-backdrop").fadeOut();
}

function modalAccept(){
    document.location.href= modalLink;
    customShowLoader('Confirm');
}

$(document).ready(function() {
    $('.modal-backdrop').click(function () {
        customCloseBox();
    });
});
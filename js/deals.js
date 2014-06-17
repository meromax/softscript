var dealsCitiesBoxOpened = 0;
function dealsOpenHideCitiesBox(){
    if(dealsCitiesBoxOpened){
        $("#dealsCitiesBox").slideUp();
        dealsCitiesBoxOpened = 0;
        $("#dealsChangeCityArrow").removeClass('icon-caret-up');
        $("#dealsChangeCityArrow").addClass('icon-caret-down');
    } else {
        $("#dealsCitiesBox").slideDown();
        dealsCitiesBoxOpened = 1;
        $("#dealsChangeCityArrow").removeClass('icon-caret-down');
        $("#dealsChangeCityArrow").addClass('icon-caret-up');
    }
}

$(document).ready(function() {

    $("#dealsChangeCityLink").click( function(){
        dealsOpenHideCitiesBox();
    });

});
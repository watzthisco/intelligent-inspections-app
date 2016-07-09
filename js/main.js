$(document).ready(function() {


    $("section div:first-child").show();


    $("section div:first-child").click(function(event){

        $(event.target).parent().children("div").toggleClass("active-section");

    })

});
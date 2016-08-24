$(document).ready(function() {
    var sectionHeads = $("section div:first-child");
    //show the section headers
    sectionHeads.show();

    //expand and collapse form sections
    sectionHeads.click(function(event) {
        $(event.target).siblings().toggleClass("active-section");
    });

    //bind the form
    var options = {
        target: '#output'
    }
    $('#newInspection').ajaxForm(options);

});
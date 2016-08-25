$(document).ready(function() {
    var sectionHeads = $("section div:first-child");
    //show the section headers
    sectionHeads.show();

    //expand and collapse form sections
    sectionHeads.click(function(event) {
        $(event.target).siblings().toggleClass("active-section");
    });
    
    var db = new Dexie('longForm');
    console.log ("new thing");
    db.version(1).stores({
        mainForm: '++id'
    });
    db.open().then(function() {
// populate form
        db.mainForm.toArray().then(function(fData) {
            fData = fData[0];
            $.each(fData, function(formEle, formEleVal) {
                $('[name=' + formEle + ']').val(formEleVal);
            });
        });
    });
// on blur of any form field, save the form data to indexedDB
    $('#newInspection input, #newInspection textarea').on('blur', function() {
        console.log('input blurred');
// this can be cleaned up better to save
// only the relevant form data
// I am saving the entire form data for simplicity
// convert Form data to Object
// http://stackoverflow.com/a/17784656/1015046
        var formObj = {};
        $('form').serializeArray().map(function(x) {
            formObj[x.name] = x.value;
        });
        //todo: figure out how to save the images
        //https://hacks.mozilla.org/2012/02/storing-images-and-files-in-indexeddb/
// make sure that we save the form data only once
        db.mainForm.clear().then(function() {
            db.mainForm.put(formObj);
        });
    });

// AJAX Call to server..
// Success
        //bind the form
        var options = {
            target: '#output',
            success:    function() {
                //db.delete();            
            }
        };
        $('#newInspection').ajaxForm(options);

});
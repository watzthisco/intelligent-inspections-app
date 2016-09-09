$(document).ready(function() {


    $("section div:first-child").show();


    $("section div:first-child").click(function(event){

        $(event.target).parent().children("div").toggleClass("active-section");

    });

// save data to local database

    var formObj = {};

    var db = new Dexie('intelligentInspections');
    console.log("db created");
    db.version(1).stores({
        inspections: '++id'
    });

    db.open().then(function () {
        db.inspections.toArray().then(function (fData) {

            if (fData.length===0) {
                db.inspections.put(formObj);
                console.log("its 0");
            }

            // populate form - need to figure out how to load radio buttons, or just scrap this
            fData = fData[fData.length-1];
            $.each(fData, function (formEle, formEleVal) {
                $('[name=' + formEle + ']').val(formEleVal);
            });
        });
    });

// on blur of any form field, save the form data to indexedDB
    $('#newInspection input, #newInspection textarea').on('blur', function () {
        console.log('input blurred');
// this can be cleaned up better to save
// only the relevant form data
// I am saving the entire form data for simplicity
// convert Form data to Object
// http://stackoverflow.com/a/17784656/1015046
        //todo: figure out how to save the images
        //https://hacks.mozilla.org/2012/02/storing-images-and-files-in-indexeddb/

        db.transaction("rw", db.inspections, function () {

            db.inspections.toArray().then(function (fData) {
                console.log("fdata length: " + fData.length);


                fData = fData[fData.length - 1];
                formObj = $('form').serializeObject();

                db.inspections.update(fData.id, formObj);
            });
        });
    });

    var options = {
        target: '#output',
        success: function () {
            db.delete();
            console.log("success saving to server and local db deleted");
        },
        failure: function () {
            console.log("could not save to server. Will try again when you're online");
        }
    };
    $('#newInspection').ajaxForm(options);

});
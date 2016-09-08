$(document).ready(function () {


    var db = new Dexie('intelligentInspections');
    console.log("db created");
    db.version(1).stores({
        inspections: '++id'
    });

    db.open().then(function () {
        // populate form - need to figure out how to load radio buttons, or just scrap this
        db.inspections.toArray().then(function (fData) {
            fData = fData[0];
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
        var formObj = $('form').serializeObject();
        //todo: figure out how to save the images
        //https://hacks.mozilla.org/2012/02/storing-images-and-files-in-indexeddb/
// make sure that we save the form data only once
        db.inspections.clear().then(function () {
            db.inspections.put(formObj);
        });
    });

});

jQuery.fn.serializeObject = function() {
    var arrayData, objectData;
    arrayData = this.serializeArray();
    objectData = {};

    $.each(arrayData, function() {
        var value;

        if (this.value != null) {
            value = this.value;
        } else {
            value = '';
        }

        if (objectData[this.name] != null) {
            if (!objectData[this.name].push) {
                objectData[this.name] = [objectData[this.name]];
            }

            objectData[this.name].push(value);
        } else {
            objectData[this.name] = value;
        }
    });

    return objectData;
};
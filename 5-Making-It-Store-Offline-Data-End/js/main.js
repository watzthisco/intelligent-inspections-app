$(document).ready(function () {
    var sectionHeads = $("section div:first-child");
    //show the section headers
    sectionHeads.show();

    //expand and collapse form sections
    sectionHeads.click(function (event) {
        $(event.target).siblings().toggleClass("active-section");
    });

// save data to local database

    var formObj = {};
    var fileObj = {};


    var db = new Dexie('intelligentInspections');
    db.version(1).stores({
        inspections: '++id'
    });

    db.open().then(function () {
        db.inspections.toArray().then(function (fData) {
            if (fData.length === 0) {
                db.inspections.put(formObj);
                console.log ("inserted blank record");
            }
            //populate form

            fData = fData[0];

            $.each (fData, function(formEle, formEleVal){
                if ($('input[name=' + formEle + ']').is(":radio")){

                    $('[name=' + formEle +']')[formEleVal].checked = true;
                } else {
                    if ($('input[name=' + formEle + ']').is(":file")) {
                        // do something
                    } else {
                        $('[name=' + formEle + ']').val(formEleVal);
                    }
                }
            });
        });
    });


    $('#newInspection input, #newInspection textarea').on('blur', function(){
        console.log('input blurred');

        db.transaction("rw", db.inspections, function() {
            db.inspections.toArray().then(function (fData) {

                fData = fData[fData.length - 1];

                formObj = $('form').serializeObject();

                db.inspections.update(fData.id, formObj);

            });
        });
    });

    $('input[type=file]').on('change', function() {
        var tmppath = URL.createObjectURL(this.files[0]);
        var filename = this.name;

            db.inspections.toArray().then(function (fData) {
                fData = fData[fData.length - 1];

                formObj = $('form').serializeObject();
                formObj[filename] = tmppath;
                console.log('temp path: ' + tmppath);
                console.log('file input changed: ' + filename + '\nvalue: ' + formObj[filename]);

                db.inspections.update(fData.id, formObj);

            });


    });







    //bind the form
    var options = {
        target: '#output',
        success: function () {
            //db.delete();
        }
    };
    $('#newInspection').ajaxForm(options);

});
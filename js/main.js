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
                        displayImage(formEleVal,formEle);
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
        var tmppath = window.URL.createObjectURL(this.files[0]);
        console.log('temp path: ' + tmppath);
        var filename = this.files[0].name;
        console.log('filename: ' + filename);
        var filekey = this.name;
        console.log('file key: ' + filekey);

        db.inspections.toArray().then(function (fData) {
            fData = fData[fData.length - 1];

            formObj[filekey] = filename;
            db.inspections.update(fData.id, formObj);
            $('#' + filekey + '_preview').attr('src',tmppath);


            storeImage(tmppath,filekey,filename);

        });


    });

    getImageFile = function (id,path) {
        // Create XHR
        var xhr = new XMLHttpRequest(),
            blob;

        xhr.open("GET", path, true);
        // Set the responseType to blob
        xhr.responseType = "blob";

        xhr.addEventListener("load", function () {
            if (xhr.status === 200) {
                console.log("Image retrieved");

                // Blob as response
                blob = xhr.response;
                console.log("Blob:" + blob);

                // Put the received blob into IndexedDB
                putElephantInDb(id,blob);
            }
        }, false);
        // Send XHR
        xhr.send();
    };

    putElephantInDb = function (id,blob) {
        console.log("Putting elephants in IndexedDB");

        // Open a transaction to the database
        //var transaction = db.transaction(["IntelligentInspections"], IDBTransaction.READ_WRITE);

        // Put the blob into the dabase
        //var put = transaction.objectStore("inspections").put(blob, "image");
        db.inspections.update(id, blob);
        // Retrieve the file that was just stored
        var imgFile = db.inspections.get(id);
        console.log("Got blob!" + imgFile);
        // Get window.URL object
        var URL = window.URL || window.webkitURL;

        // Create and revoke ObjectURL
        var imgURL = URL.createObjectURL(imgFile);

        // Set img src to ObjectURL
        var imgElephant = document.getElementById("elephant");
        imgElephant.setAttribute("src", imgURL);

        // Revoking ObjectURL
        URL.revokeObjectURL(imgURL);
        /*transaction.objectStore("inspections").get("image").onsuccess = function (event) {
            var imgFile = event.target.result;



        };*/
    };





    //bind the form
    var options = {
        target: '#output',
        success: function () {
            //db.delete();
        }
    };
    $('#newInspection').ajaxForm(options);

});
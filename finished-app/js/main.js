$(document).ready(function () {

    var imgBlobObj = {};

    var sectionHeads = $("section div:first-child");
    //show the section headers
    sectionHeads.show();

    //expand and collapse form sections
    sectionHeads.click(function (event) {
        $(event.target).siblings().toggleClass("active-section");
    });

    //make thumbs clickable

    var opt = {
        autoOpen: false,
        modal: true,
        show: {
            effect: 'fade',
            duration: 800
        }
    };

    $('.thumb').on('click', function(event){
        if($('#' + this.id).attr('src') != '') {
            console.log('thumbnail clicked: ' + this.src);
            $('#largeImage').attr('src', this.src);
            $('#large-image-modal').dialog(opt).dialog('open');
        }
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
                        displayImage(formEleVal, formEle, imgBlobObj);
                    } else {
                        $('[name=' + formEle + ']').val(formEleVal);
                    }
                }
            });
        });
    });


    $('#newInspection input, #newInspection textarea').not('input[type=submit]').on('blur', function(){
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

        db.inspections.toArray().then(function(fData) {
            fData = fData[fData.length - 1];

            formObj[filekey] = filename;
            db.inspections.update(fData.id, formObj);

            $('#' + filekey + '_preview').attr('src', tmppath);

            storeImage(tmppath, filename, imgBlobObj, filekey);
        });
    });



    var saveopt = {
        autoOpen: false,
        modal: true,
        show: {
            effect: 'fade',
            duration: 800
        },
        close: function() {
            location.reload();
        }
    };

    //bind the form
    var options = {
        target: '#output',
        beforeSubmit: function(arr){
          for (picture in imgBlobObj){
              arr.push({name: picture, type: "file", value: imgBlobObj[picture]});
          }
          console.log(arr);

        //progress bar stuff  
        $('#status').empty();
        var percentVal = '0%';
        $('.bar').width(percentVal)
        $('.percent').html(percentVal);
        $('.progress').css('display','block');
        $('input[type="submit"]').attr("disabled", true);
        },
        uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        $('.bar').width(percentVal)
        $('.percent').html(percentVal);
        //console.log(percentVal, position, total);
    },
        success: function () {
            var percentVal = '100%';
            $('.bar').width(percentVal)
            $('.percent').html(percentVal);

            $('#output').dialog(saveopt).dialog('open');
            console.log("success saving to server");
            clearData('intelligentInspections',10,'inspections');
            clearData('inspectionImages',1,'pictures');
        }

    };
    $('#newInspection').ajaxForm(options);

});
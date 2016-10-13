function displayImage(filename,element) {
    var indexedDB = window.indexedDB || window.webkitIndexedDB || window.mozIndexedDB || window.OIndexedDB || window.msIndexedDB,
        IDBTransaction = window.IDBTransaction || window.webkitIDBTransaction || window.OIDBTransaction || window.msIDBTransaction;

    var dbVersion = 1.0;

    var db;

    var request = indexedDB.open("inspectionImages", dbVersion);

    var createObjectStore = function(dataBase) {
        console.log ("Creating ObjectStore");
        dataBase.createObjectStore("pictures");
    };

    request.onupgradeneeded = function(event) {

        createObjectStore(event.target.result);
    };

    request.onerror = function(event) {
        console.log("Error creating / accessing IndexedDb database");
    };

    request.onsuccess = function(event) {
        console.log("Success creating / accessing IndexedDB database.");
        db = request.result;

        db.onerror = function (event) {
            console.log("Error creating / accessing objectstore");
        };

        displayThumb();

    };

    var displayThumb = function() {

        var transaction = db.transaction(["pictures"], "readonly");

        var objectStore = transaction.objectStore("pictures");

        var objectStoreRequest = objectStore.get(filename);

        objectStoreRequest.onsuccess = function(event) {
            console.log("looking for: " + filename);

            var imgFile = objectStoreRequest.result;

            console.log("got picture! " + imgFile);

            var imgURL = window.URL.createObjectURL(imgFile);


            var imgPicture = document.getElementById(element + "_preview");

            imgPicture.setAttribute("src", imgURL);


        }


    };

}
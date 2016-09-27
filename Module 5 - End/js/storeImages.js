function storeImage(image,filename) {
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

        getImageFile();

    };

    var getImageFile = function() {

        var xhr = new XMLHttpRequest();
        var blob;


        xhr.open("GET", image, true);
        xhr.responseType = "blob";

        xhr.addEventListener("load", function() {
            if (xhr.status === 200) {
                console.log("Image retrieved");

                blob = xhr.response;
                console.log("Blob: " + blob);

                putImageInDb(blob);
            }
        });

        xhr.send();



    };

    var putImageInDb = function (blob) {
        console.log("Putting picture in IndexedDB");

        var transaction = db.transaction(["pictures"], "readwrite");

        var put = transaction.objectStore("pictures").put(blob, filename);

    };

}
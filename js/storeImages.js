function storeImage(image,filename) {

    var indexedDB = window.indexedDB || window.webkitIndexedDB || window.mozIndexedDB || window.OIndexedDB || window.msIndexedDB,
        IDBTransaction = window.IDBTransaction || window.webkitIDBTransaction || window.OIDBTransaction || window.msIDBTransaction;

    var dbVersion = 1.0;

    var db;

    // Create/open database
    var request = indexedDB.open("inspectionImages", dbVersion);

    var createObjectStore = function (dataBase) {
        // Create an objectStore
        console.log("Creating objectStore")
        dataBase.createObjectStore("pictures");
    }

    request.onupgradeneeded = function (event) {
        createObjectStore(event.target.result);
    };

    request.onerror = function (event) {
        console.log("Error creating/accessing IndexedDB database");
    };

    request.onsuccess = function (event) {
        console.log("Success creating/accessing IndexedDB database");
        db = request.result;

        db.onerror = function (event) {
            console.log("Error creating/accessing IndexedDB database");
        };


        getImageFile();

    }



    var getImageFile = function () {
            // Create XHR
            var xhr = new XMLHttpRequest();
            var blob;

            xhr.open("GET", image, true);
            // Set the responseType to blob
            xhr.responseType = "blob";

            xhr.addEventListener("load", function () {
                if (xhr.status === 200) {
                    console.log("Image retrieved");

                    // Blob as response
                    blob = xhr.response;
                    console.log("Blob:" + blob);

                    // Put the received blob into IndexedDB*/
                    putImageInDb(blob);
                }
            }, false);
            // Send XHR
            xhr.send();
        }

        var putImageInDb = function (blob) {
            console.log("Putting picture in IndexedDB");

            // Open a transaction to the database
            var transaction = db.transaction(["pictures"], "readwrite");

            // Put the blob into the dabase
            var put = transaction.objectStore("pictures").put(blob, filename);


        };

}
var displayImage = function(filename,element) {

    // IndexedDB
    var indexedDB = window.indexedDB || window.webkitIndexedDB || window.mozIndexedDB || window.OIndexedDB || window.msIndexedDB,
        IDBTransaction = window.IDBTransaction || window.webkitIDBTransaction || window.OIDBTransaction || window.msIDBTransaction,
        dbVersion = 1.0;

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

        // Open a transaction to the database
        var transaction = db.transaction(["pictures"], "readonly");
        // Retrieve the file that was just stored
        transaction.objectStore("pictures").get(filename).onsuccess = function (event) {
            console.log("Looking for: " + filename);
            var imgFile = event.target.result;
            console.log("Got picture!" + imgFile);


            // Create ObjectURL
            var imgURL = window.URL.createObjectURL(imgFile);

            // Set img src to ObjectURL
            var imgPicture = document.getElementById(element + "_preview");
            imgPicture.setAttribute("src", imgURL);
        }
    };
};
function clearData(dbname,dbversion,store) {
    var db;
    var indexedDB = window.indexedDB || window.webkitIndexedDB || window.mozIndexedDB || window.OIndexedDB || window.msIndexedDB,
        IDBTransaction = window.IDBTransaction || window.webkitIDBTransaction || window.OIDBTransaction || window.msIDBTransaction;

    var DBOpenRequest = indexedDB.open(dbname,dbversion);
    DBOpenRequest.onsuccess = function(event) {

        db = DBOpenRequest.result;

        // open a read/write db transaction, ready for deleting the data
        var transaction = db.transaction([store], "readwrite");

        // report on the success of opening the transaction
        transaction.oncomplete = function (event) {
            console.log('Transaction completed: database modification finished.');
        };
        transaction.onerror = function (event) {
            console.log('Transaction not opened due to error: ' + transaction.error);
        };

        // create an object store on the transaction
        var clearData = transaction.objectStore(store).clear();
    };

}

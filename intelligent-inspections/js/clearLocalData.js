function clearData(dbname,dbversion,store) {
    var db;
    var indexedDB = window.indexedDB || window.webkitIndexedDB || window.mozIndexedDB || window.OIndexedDB || window.msIndexedDB,
        IDBTransaction = window.IDBTransaction || window.webkitIDBTransaction || window.OIDBTransaction || window.msIDBTransaction;

    var DBOpenRequest = indexedDB.open(dbname,dbversion);
    DBOpenRequest.onsuccess = function(event) {
        db = DBOpenRequest.result;

        var transaction = db.transaction([store], "readwrite");

        transaction.oncomplete = function(event) {
            console.log('Transaction competed');
        };
        transaction.onerror = function(event) {
            console.log('Transaction not opened due to error: ' + transaction.error);
        };
        var clearData = transaction.objectStore(store).clear();
    };
}
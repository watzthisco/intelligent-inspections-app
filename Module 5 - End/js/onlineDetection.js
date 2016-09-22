window.addEventListener('load', function(e) {
    if (navigator.onLine) {
        updateOnlineStatus(true);
    } else {
        updateOnlineStatus(false);
    }
}, false);

window.addEventListener('online', function(e) {
    updateOnlineStatus(true);
}, false);

window.addEventListener('offline', function(e) {
    updateOnlineStatus(false);
}, false);

function updateOnlineStatus(online) {
    var osm = document.getElementById('onlineStatusMessage');
    if (online) {
        osm.innerHTML = '<span class="green">*</span>';
    } else {
        osm.innerHTML = '<span class="red">*</span>';
    }
}
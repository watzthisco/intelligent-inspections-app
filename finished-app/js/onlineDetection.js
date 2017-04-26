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
        $('#save-button').removeAttr('disabled');
        $('#save-button').addClass('save-enabled');
    } else {
        osm.innerHTML = '<span class="red">*</span>';
        $('#save-button').attr('disabled',true);
        $('#save-button').removeClass('save-enabled');
    }
}
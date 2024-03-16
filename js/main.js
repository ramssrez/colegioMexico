document.getElementById('usuario').addEventListener('click', function() {
    if(window.location.search.includes('successful=1')){
        var cleanURL = window.location.href.split('?')[0];
        window.location.href = cleanURL;
    }
});
document.getElementById('usuario').addEventListener('click', function() {
    if(window.location.search.includes('successful=2')){
        var cleanURL = window.location.href.split('?')[0];
        window.location.href = cleanURL;
    }
});
var tooltipTriggerList = Array.prototype.slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})
document.getElementById('idUserInput').addEventListener('click', function() {
    if(window.location.search.includes('successful=1')){
        var cleanURL = window.location.href.split('?')[0];
        window.location.href = cleanURL;
    }
});
document.getElementById('idUserInput').addEventListener('click', function() {
    if(window.location.search.includes('successful=2')){
        var cleanURL = window.location.href.split('?')[0];
        window.location.href = cleanURL;
    }
});
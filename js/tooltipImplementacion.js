var tooltipTriggerList = Array.prototype.slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    console.log(tooltipList);
    return new bootstrap.Tooltip(tooltipTriggerEl)
})
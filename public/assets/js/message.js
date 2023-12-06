setTimeout(function() {
    var alertElements = document.querySelectorAll('.alert');
    alertElements.forEach(function(alertElement) {
        alertElement.remove();
    });
}, 10000);
$(document).ready(function() {
    var timeoutID = setTimeout(function() {
        $('.loader').fadeToggle();
    }, 2000);

    // clear the timeout and hide the loader immediately when the page finishes loading
    $(window).on('load', function() {
        clearTimeout(timeoutID);
        $('.loader').hide();
    });
});




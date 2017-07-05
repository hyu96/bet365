$(document).ready(function() {
    $('#hidden').addClass('active');
    $('tr:even').css('background-color', '#ffffff');
    $('.brand').css('background-color', '#4da6ff');
    $("#public_button").click(function() {
        confirm("Do you want to public this match");
    });
});
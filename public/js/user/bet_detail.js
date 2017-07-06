$(document).ready(function() {
    $('#bet').addClass('active');
    $('.brand').css('background-color', '#4da6ff');

    $("#home_bet").keyup(function() {
        var home_win = Math.ceil( $('#home_rate').data('home_rate') * $('#home_bet').val() );
        $('#home_win').val(home_win);
    });

    $("#draw_bet").keyup(function() 
    {
        var draw_win = Math.ceil( $('#draw_rate').data('draw_rate') * $('#draw_bet').val() );
        $('#draw_win').val(draw_win);
    });

    $("#away_bet").keyup(function() 
    {
        var away_win = Math.ceil( $('#away_rate').data('away_rate') * $('#away_bet').val() );
        $('#away_win').val(away_win);
    });
});
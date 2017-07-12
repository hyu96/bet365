$(document).ready(function() {
    $('#bet').addClass('active');
    $('.brand').css('background-color', '#4da6ff');

    $("#bet_money").keyup(function() {
        var value = $("[name='bet_choice']").val();
        console.log(value);
        var win_money = 0;
        if (value == 1) {
            win_money = Math.ceil( $('#home_rate').data('home_rate') * $('#bet_money').val() );
        } else if (value == 0) {
            win_money = Math.ceil( $('#draw_rate').data('draw_rate') * $('#bet_money').val() );
        } else {
            win_money = Math.ceil( $('#away_rate').data('away_rate') * $('#bet_money').val() );
        }
        $('#win_money').val(win_money);
    });

    $("[name='bet_choice']").change(function() {
        var value = $("[name='bet_choice']").val();
        console.log(value);
        var win_money = 0;
        if (value == 1) {
            win_money = Math.ceil( $('#home_rate').data('home_rate') * $('#bet_money').val() );
        } else if (value == 0) {
            win_money = Math.ceil( $('#draw_rate').data('draw_rate') * $('#bet_money').val() );
        } else {
            win_money = Math.ceil( $('#away_rate').data('away_rate') * $('#bet_money').val() );
        }
        $('#win_money').val(win_money);
    });
});
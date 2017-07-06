@extends('layouts.master')

@section('head.title')
    bet365
@stop

@section('head.css')
    <link href="{{ asset('/css/user/bet_detail.css') }}" rel="stylesheet">
@stop

@section('head.js')
    <script src="{{ asset('/js/user/bet_detail.js') }}"></script> 
@stop

@include('partials.user_navbar')

@section('body.content')
    {{ csrf_field() }}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table style="width:100%">
                    <tr class="brand">
                        <th colspan="3">Match Detail</th>
                    </tr>
                    <tr>
                        <th colspan="3">{{ $match->home_name }} vs {{ $match->away_name }}</th>
                    </tr>
                    <tr>
                        <th colspan="1">Time close bet</th>
                        <th colspan="1">Time Start</th>
                        <th colspan="1">Time End</th>
                    </tr>
                    <tr class="content">
                        <th colspan="1">{{ $match->time_close_bet }}</th>
                        <th colspan="1">{{ $match->time_start }}</th>
                        <th colspan="1">{{ $match->time_end }}</th>
                    </tr>
                    <tr>
                        <th colspan="3">Rate Bet and number of bets</th>
                    </tr>
                    <tr class="content">
                        <th colspan="1" id="home_rate" data-home_rate="{{$match->home_rate}}">Home: {{ $match->home_rate }}</th>
                        <th colspan="1" id="draw_rate" data-draw_rate="{{$match->draw_rate}}">Draw: {{ $match->draw_rate }}</th>
                        <th colspan="1" id="away_rate" data-away_rate="{{$match->away_rate}}">Away: {{ $match->away_rate }}</th>
                    </tr>
                    <tr class="content">
                        <th colspan="1">{{ $home_number }}</th>
                        <th colspan="1">{{ $draw_number }}</th>
                        <th colspan="1">{{ $away_number }}</th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" id="bet_form">
            <form action="{{ route('user.bet.store') }}" class="form-horizontal" method="POST">
                <input name="user_id" type="hidden" value="{{ Auth::id() }}">
                <input name="match_id" type="hidden" value='{{ $match->id }} '>
                {{csrf_field()}}
                <div class="row">  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-sm-offset-4 col-sm-2" for="home">Home:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="home_bet" placeholder="0" name="home_bet">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-offset-4 col-sm-2" for="draw">Draw:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="draw_bet" placeholder="0" name="draw_bet">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-offset-4 col-sm-2" for="away">Away:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="away_bet" placeholder="0" name="away_bet">
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="home_win">Win:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="home_win" placeholder="0" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="draw_win">Win:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="draw_win" placeholder="0" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="away">Win:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="away_win" placeholder="0" disabled="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" id="bet_button"> 
                            <div class="col-sm-offset-6 col-sm-3">
                                <button type="submit" class="btn btn-primary">Bet</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop
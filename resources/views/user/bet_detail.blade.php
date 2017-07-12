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
                    <thead>
                        <tr class="brand">
                            <th colspan="3">Match Detail</th>
                        </tr>
                    </thead>
                    <tbody>
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
                            <th colspan="1" id="home_rate" data-home_rate="{{$match->home_rate}}">
                                Home: {{ $match->home_rate }}
                            </th>
                            <th colspan="1" id="draw_rate" data-draw_rate="{{$match->draw_rate}}">
                                Draw: {{ $match->draw_rate }}
                            </th>
                            <th colspan="1" id="away_rate" data-away_rate="{{$match->away_rate}}">
                                Away: {{ $match->away_rate }}
                            </th>
                        </tr>
                        <tr class="content">
                            <th colspan="1">{{ $home_number }}</th>
                            <th colspan="1">{{ $draw_number }}</th>
                            <th colspan="1">{{ $away_number }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" id="bet_form">
            <div class="col-md-offset-4 col-md-6">
                <form action="{{ route('user.bet.store') }}" class="form-horizontal" method="POST">
                    <input name="user_id" type="hidden" value="{{ Auth::id() }}">
                    <input name="match_id" type="hidden" value='{{ $match->id }} '>
                    {{csrf_field()}}

                    <div class="form-group ">
                        <div class="col-sm-2" for="home" id="place_bet"><strong>Place:</strong></div>
                        <div class="col-sm-5">
                            <select name="bet_choice">
                                <option value = 1> {{ $match->home_name }} </option>
                                <option value = 0> Draw </option>
                                <option value = -1> {{ $match->away_name }} </option>
                            </select>
                        </div>
                    </div>
    
                    <div class="form-group {{ $errors->has('bet_money')?'has-error':''}}">
                        <label class="control-label col-sm-2" for="home">Money:</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" id="bet_money" placeholder="0" min=1 name="bet_money"         value="{{ old('home_bet') }}" >
                            @if ($errors->get('bet_money'))
                                <span class="text-danger">{{ $errors->first('bet_money') }}</span><br>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="home_win">Win:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="win_money" placeholder="0" disabled>
                        </div>
                    </div>
                  
                    <div class="form-group" id="bet_button"> 
                        <div class="col-sm-offset-2 col-sm-2">
                            <button type="submit" class="btn btn-primary">Bet</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
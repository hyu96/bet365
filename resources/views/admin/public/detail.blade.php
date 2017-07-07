@extends('layouts.master')

@section('head.title')
    bet365
@stop

@section('head.css')
    <link href="{{ asset('/css/public/detail.css') }}" rel="stylesheet">
@stop

@section('head.js')
    <script src="{{ asset('/js/public/detail.js') }}"></script> 
@stop

@include('partials.admin_navbar')

@section('body.content')
    {{ csrf_field() }}
    <div class="container match-detail">
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
                        @if($match->done == 1)
                        <tr class="content">
                            <th colspan="3">Score: {{ $match->home_score }} - {{ $match->away_score }}</th>
                        </tr>
                        @endif
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container user-bet">
        <div class="row">
            <div class="col-md-12">
                <table style="width: 100%">
                    <thead>
                        <tr class="brand">
                            <th colspan="6">User Bet</th>
                        </tr>
                        <tr class="brand">
                            <th colspan="1">User ID</th>
                            <th colspan="1">Name</th>
                            <th colspan="1">Bet</th>
                            <th colspan="1">Quantity</th>
                            <th colspan="1">Profit</th>
                            <th colspan="1">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bets as $bet)
                        <tr>
                            <th colspan="1">{{ $bet->user->id }}</th>
                            <th colspan="1">{{ $bet->user->name }}</th>
                            <th colspan="1">
                                @if ($bet->bet_choice == 1)
                                    Home
                                @elseif ($bet->bet_choice == 0)
                                    Draw
                                @else
                                    Away
                                @endif
                            </th>
                            <th colspan="1">{{ $bet->quantity }}</th>
                            <th colspan="1">{{ $bet->profit }}</th>
                            <th colspan="1">{{ $bet->created_at }}</th>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
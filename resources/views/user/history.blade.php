@extends('layouts.master')

@section('head.title')
    bet365
@stop

@section('head.css')
    <link href="{{ asset('/css/user/history.css') }}" rel="stylesheet">
@stop

@section('head.js')
    <script src="{{ asset('/js/user/history.js') }}"></script> 
@stop

@include('partials.user_navbar')

@section('body.content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table style="width: 100%">
                    <thead>
                        <tr class="brand">
                            <th colspan="7">Your bet</th>
                        </tr>
                        <tr class="brand">
                            <th colspan="1">Result</th>
                            <th colspan="1">Match</th>
                            <th colspan="1">Score</th>
                            <th colspan="1">Bet</th>
                            <th colspan="1">Rate</th>
                            <th colspan="1">Profit</th>
                            <th colspan="1">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bets as $bet)
                        <tr>
                            <th colspan="1">
                                @if ($bet->match->done == 1)    
                                    @if ($bet->bet_choice != $bet->match->result)
                                        Lose
                                    @else
                                        Win
                                    @endif
                                @endif
                            </th>
                            <th colspan="1">{{ $bet->match->home_name }} vs {{ $bet->match->away_name }}</th>
                            <th colspan="1">
                                @if ($bet->match->done == 1)
                                    {{ $bet->match->home_score }} - {{ $bet->match->away_score }}
                                @endif
                            </th>
                            <th colspan="1">
                                {{ $bet->quantity }} - 
                                @if ($bet->bet_choice == 1)
                                    Home
                                @elseif ($bet->bet_choice == 0)
                                    Draw
                                @else
                                    Away
                                @endif
                            </th>
                            <th colspan="1">{{ $bet->rate}}</th>
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
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
                    @foreach($bets as $bet)
                    
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop
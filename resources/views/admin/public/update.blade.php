@extends('layouts.master')

@section('head.title')
    bet365 Admin
@stop

@section('head.css')
    <link href="{{ asset('/css/public/update.css') }}" rel="stylesheet">
@stop

@section('head.js')
    <script src="{{ asset('/js/public/update.js') }}"></script> 
@stop

@include('partials.admin_navbar')

@section('body.content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <form action="{{ route('public.update',$match->id) }}" class='form-horizontal' method="POST">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}
                    <table style="width: 100%">
                        <tr class="title">
                            <th colspan="3">Update Score</th>
                        </tr>
                        <tr>
                            <th colspan="3">{{$match->home_name}} vs {{ $match->away_name }} - {{ $match->time_start }}</th>
                        </tr>
                        <tr id='team_name'>
                            <th colspan="1"></th>
                            <th colspan="1">{{ $match->home_name }}</th>
                            <th colspan="1">{{ $match->away_name }}</th>
                        </tr>
                        <tr id='score'>
                            <th colspan="1">Score</th>
                            <th colspan="1"><input type="text" name="home_score"></th>
                            <th colspan="1"><input type="text" name="away_score"></th>
                        </tr>
                        <tr id='submit'>
                            <th colspan="1"></th>
                            <th colspan="1">
                                <input type="submit" name="update_score" 
                                class="btn btn-primary submit_button" value="Update">
                            </th>
                            <th colspan="1"></th>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@stop
@extends('layouts.master')

@section('head.title')
    bet365 Admin
@stop

@section('head.css')
    <link href="{{ asset('/css/hidden/create.css') }}" rel="stylesheet">
@stop

@section('head.js')
    <script src="{{ asset('/js/hidden/create.js') }}"></script> 
@stop

@include('partials.admin_navbar')

@section('body.content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <h1 class="text-center title">Create Match</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <form action="{{ route('hidden.store') }}" class='form-horizontal' method='POST'>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-xs-3">Home Name</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='home_name'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Away Name</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='away_name'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Home Rate</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='home_rate'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Draw Rate</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='draw_rate'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Away Rate</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='away_rate'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Time Close Bet</label>
                        <div class="col-xs-9">
                            <input type="datetime='YYYY-MM-DDThh:mm:ss'" class="form-control" name='time_close_bet'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Time Start</label>
                        <div class="col-xs-9">
                            <input type="time" class="form-control" name='time_start'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Time End</label>
                        <div class="col-xs-9">
                            <input type="time" class="form-control" name='time_end'>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-10">    
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>    
                </form>
            </div>
        </div>  
    </div>
@stop
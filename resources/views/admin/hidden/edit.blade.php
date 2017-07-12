@extends('layouts.master')

@section('head.title')
    bet365 Admin
@stop

@section('head.css')
    <link href="{{ asset('/css/hidden/edit.css') }}" rel="stylesheet">
@stop

@section('head.js')
    <script src="{{ asset('/js/hidden/edit.js') }}"></script> 
@stop

@include('partials.admin_navbar')

@section('body.content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <h1 class="text-center title">Edit Match</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <form action="{{ route('hidden.update',$match->id) }}" class='form-horizontal' method="POST">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('home_name')?'has-error':''}}">
                        <label class="control-label col-xs-3">Home Name</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='home_name' value="{{ $match->home_name }}">
                            @foreach ( $errors->get('home_name') as $message )
                                <span class="text-danger">{{ $message }}</span><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('away_name')?'has-error':''}}">
                        <label class="control-label col-xs-3">Away Name</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='away_name' value="{{ $match->away_name }}">
                            @foreach ($errors->get('away_name') as $message)
                                <span class="text-danger">{{ $message }}</span><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('home_rate')?'has-error':''}}">
                        <label class="control-label col-xs-3">Home Rate</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='home_rate' value="{{ $match->home_rate }}">
                            @foreach ($errors->get('home_rate') as $message)
                                <span class="text-danger">{{ $message }}</span><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('draw_rate')?'has-error':''}}">
                        <label class="control-label col-xs-3">Draw Rate</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='draw_rate' value="{{ $match->draw_rate }}">
                            @foreach ($errors->get('draw_rate') as $message)
                                <span class="text-danger">{{ $message }}</span><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('away_rate')?'has-error':''}}">
                        <label class="control-label col-xs-3">Away Rate</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='away_rate' value="{{ $match->away_rate }}">
                            @foreach ($errors->get('away_rate') as $message)
                                <span class="text-danger">{{ $message }}</span><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('time_close_bet')?'has-error':''}}">
                        <label class="control-label col-xs-3">Time Close Bet</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='time_close_bet' 
                                value="{{ $match->time_close_bet }}">
                            @foreach ($errors->get('time_close_bet') as $message)
                                <span class="text-danger">{{ $message }}</span><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('time_start')?'has-error':''}}">
                        <label class="control-label col-xs-3">Time Start</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='time_start' value="{{ $match->time_start }}">
                            @foreach ($errors->get('time_start') as $message)
                                <span class="text-danger">{{ $message }}</span><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('time_end')?'has-error':''}}">
                        <label class="control-label col-xs-3">Time End</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='time_end' value="{{ $match->time_end }}">
                            @foreach ($errors->get('time_end') as $message)
                                <span class="text-danger">{{ $message }}</span><br>
                            @endforeach
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
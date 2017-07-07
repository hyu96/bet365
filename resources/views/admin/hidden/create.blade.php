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
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    </div>
                @endif
                <form action="{{ route('hidden.store') }}" class='form-horizontal' method='POST'>
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->first('home_name')?'has-error':''}}">
                        <label class="control-label col-xs-3">Home Name</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='home_name' value="{{ old('home_name') }}">
                            @foreach( $errors->get('home_name') as $message )
                                <span class="text-danger">{{ $message }}</span><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('away_name')?'has-error':''}}">
                        <label class="control-label col-xs-3">Away Name</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='away_name' value="{{ old('away_name') }}">
                            @foreach( $errors->get('away_name') as $message )
                                <span class="text-danger">{{ $message }}</span><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('home_rate')?'has-error':''}}">
                        <label class="control-label col-xs-3">Home Rate</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='home_rate' value="{{ old('home_rate') }}">
                            @foreach( $errors->get('home_rate') as $message )
                                <span class="text-danger">{{ $message }}</span><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('draw_rate')?'has-error':''}}">
                        <label class="control-label col-xs-3">Draw Rate</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='draw_rate' value="{{ old('draw_rate') }}">
                            @foreach( $errors->get('draw_rate') as $message )
                                <span class="text-danger">{{ $message }}</span><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('away_rate')?'has-error':''}}">
                        <label class="control-label col-xs-3">Away Rate</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name='away_rate' value="{{ old('away_rate') }}">
                            @foreach( $errors->get('away_rate') as $message )
                                <span class="text-danger">{{ $message }}</span><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('time_close_bet')?'has-error':''}}">
                        <label class="control-label col-xs-3">Time Close Bet</label>
                        <div class="col-xs-9">
                            <input type="datetime-local" class="form-control" name='time_close_bet' value="{{ old('time_close_bet') }}">
                            @foreach( $errors->get('time_close_bet') as $message )
                                <span class="text-danger">{{ $message }}</span><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('time_start')?'has-error':''}}">
                        <label class="control-label col-xs-3">Time Start</label>
                        <div class="col-xs-9">
                            <input type="datetime-local" class="form-control" name='time_start' value="{{ old('time_start') }}">
                            @foreach( $errors->get('time_start') as $message )
                                <span class="text-danger">{{ $message }}</span><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('time_end')?'has-error':''}}">
                        <label class="control-label col-xs-3">Time End</label>
                        <div class="col-xs-9">
                            <input type="datetime-local" class="form-control" name='time_end' value="{{ old('time_end') }}">
                            @foreach( $errors->get('time_end') as $message )
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
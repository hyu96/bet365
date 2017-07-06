@extends('layouts.master')

@section('head.title')
    bet365 Admin
@stop

@section('head.css')
    <link href="{{ asset('/css/public/index.css') }}" rel="stylesheet">
@stop

@section('head.js')
    <script src="{{ asset('/js/public/index.js') }}"></script> 
@stop

@include('partials.admin_navbar')

@section('body.content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table style="width:100%">
					<tr class="brand">
						<th colspan="10">Public match</th>
					</tr>
					<tr class="brand">
						<th colspan="1">Home</th>
						<th colspan="1">Away</th>
						<th colspan="1">Draw</th>
						<th colspan="1">Time Close Bet</th>
						<th colspan="1">Time Start</th>
						<th colspan="1">Time End</th>
						<th colspan="1">Score</th>
						<th colspan="1"></th>
						<th colspan="1"></th>
						<th colspan="1"></th>
					</tr>
					@foreach($matches as $match)
					<tr>
						<th colspan="1">{{ $match->home_name }} - rate: {{ $match->home_rate }}</th>
						<th colspan="1">{{ $match->away_name }} - rate: {{ $match->away_rate }}</th>
						<th colspan="1">{{ $match->draw_rate }}</th>
						<th colspan="1">{{ $match->time_close_bet }}</th>
						<th colspan="1">{{ $match->time_start }}</th>
						<th colspan="1">{{ $match->time_end }}</th>
						@if($match->done == 0)
							<th colspan="1"></th>
							<th colspan="1">
								<a href="{{route('public.show',$match->id)}}" class="btn btn-info" id='detail_button'>
									Detail
								</a>
							</th>
							<th colspan="1">
								<a href="{{route('public.edit',$match->id)}}" class="btn btn-info" id='update_button'>
									Update
								</a>
							</th>
							<th colspan="1">
								{{ Form::open([
										'route' => ['hidden.destroy',$match->id],
										'method' => 'delete',
										'class' => 'form-horizontal',
										'style' => 'display:inline'
									])}}
								{{Form::submit('Delete',['class' => 'btn btn-danger','id' => 'delete_button'])}}
								{{ Form::close() }}
							</th>
						@else
							<th colspan="1">{{ $match->home_score}} - {{ $match->away_score}}</th>
							<th colspan="1"><a href="{{route('hidden.edit',$match->id)}}" class="btn btn-info" id='detail_button'>Detail</a></th>
							<th colspan="1"></th>
							<th colspan="1"></th>
						@endif
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@stop
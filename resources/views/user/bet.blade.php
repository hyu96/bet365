@extends('layouts.master')

@section('head.title')
    bet365
@stop

@section('head.css')
    <link href="{{ asset('/css/user/bet.css') }}" rel="stylesheet">
@stop

@section('head.js')
    <script src="{{ asset('/js/user/bet.js') }}"></script> 
@stop

@include('partials.user_navbar')

@section('body.content')
	{{ csrf_field() }}
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table style="width:100%">
					<tr class="brand">
						<th colspan="3">Featured Betting</th>
					</tr>
					@foreach ($matches as $match)
					<tr>
						<th colspan="3">{{ $match->home_name }} vs {{ $match->away_name }} - {{ $match->time_start }} 
						@if (Auth::check())	
							>> <a href="{{ route('user.showMatch',$match->id) }}">Detail</a>
						@endif
						</th>
					</tr>
					<tr>
						<th colspan="1">Home: {{ $match->home_rate }}</th>
						<th colspan="1">Draw: {{ $match->draw_rate }}</th>
						<th colspan="1">Away: {{ $match->away_rate }}</th>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@stop
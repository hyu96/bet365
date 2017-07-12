@extends('layouts.master')

@section('head.title')
    bet365 Admin
@stop

@section('head.css')
    <link href="{{ asset('/css/hidden/index.css') }}" rel="stylesheet">
@stop

@section('head.js')
    <script src="{{ asset('/js/hidden/index.js') }}"></script> 
@stop

@include('partials.admin_navbar')

@section('body.content')
	{{ csrf_field() }}
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table style="width:100%">
					<thead>
						<tr class="brand">
							<th colspan="9">Hidden match</th>
						</tr>
						<tr class="brand">
							<th colspan="1">Home</th>
							<th colspan="1">Away</th>
							<th colspan="1">Draw</th>
							<th colspan="1">Time Close Bet</th>
							<th colspan="1">Time Start</th>
							<th colspan="1">Time End</th>
							<th colspan="1"></th>
							<th colspan="1"></th>
							<th colspan="1"></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($matches as $match)
						<tr>
							<th colspan="1">{{ $match->home_name }} - rate: {{ $match->home_rate }}</th>
							<th colspan="1">{{ $match->away_name }} - rate: {{ $match->away_rate }}</th>
							<th colspan="1">{{ $match->draw_rate }}</th>
							<th colspan="1">{{ $match->time_close_bet }}</th>
							<th colspan="1">{{ $match->time_start }}</th>
							<th colspan="1">{{ $match->time_end }}</th>
							<th colspan="1"><a href="{{route('hidden.edit',$match->id)}}" class="btn btn-info">Edit</a></th>
							<th colspan="1">
								{{ Form::open([
										'route' => ['hidden.public', $match->id],
										'method' => 'post',
										'class' => 'form-horizontal',
										'style' => 'display:inline',
										'onsubmit' => 'return confirm("Do you want to public this match")'
									])}}
								{{ Form::submit('Public',['class' => 'btn btn-primary public', 'id' => 'public_button']) }}
								{{ Form::close() }}
							</th>
							<th colspan="1">
								{{ Form::open([
										'route' => ['hidden.destroy', $match->id],
										'method' => 'delete',
										'class' => 'form-horizontal',
										'style' => 'display:inline',
										'onsubmit' => 'return confirm("Are you sure to delete this match")'
									])}}
								{{ Form::submit('Delete',['class' => 'btn btn-danger','id' => 'delete_button']) }}
								{{ Form::close() }}
							</th>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop
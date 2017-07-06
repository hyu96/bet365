<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="{{route('user.index')}}" class="navbar-brand"><i class="fa fa-futbol-o" aria-hidden="true"></i> bet365.com</a>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<div class="nav navbar-nav navbar-right">
				@if(\Auth::guest())
					<li><a href="{{ url('/login')}}">Login</a></li>s
					<li><a href="{{ url('/register')}}">Register</a></li>
				@else
					<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> {{ \Auth::user()->name }}</a></li>
					<li><a href="{{ url('/logout') }}">Logout</a></li>
				@endif
			</div>
		</div>
	</div>
	<div class="col-md-12">
	    <ul class="nav nav-tabs">
	        <li id='bet'><a href="{{ route('user.index') }}">Live Bet</a></li>
	        <li id='history'><a href="{{ route('user.bet.history')}}">History</a></li>
	    </ul>
	</div>
</nav>


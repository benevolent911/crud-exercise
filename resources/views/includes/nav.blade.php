<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			@if(!auth()->user() == null && auth()->user()->role == 'admin')
			<a class="navbar-brand" href="{{route('admin')}}"><span class="glyphicon glyphicon-book"></span> Rio's Library</a>
			@else
			<a class="navbar-brand" href="{{route('home')}}"><span class="glyphicon glyphicon-book"></span> Rio's Library</a>
			@endif
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			@if(auth()->check() && auth()->user()->role == 'user')         
			<ul class="nav navbar-nav">
				@yield('active')
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="navbar-text"><span class="glyphicon glyphicon-user"></span><strong> Hi {{ auth()->user()->name }}!</strong></li>
				<li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-off"></span><strong> Logout</strong></a></li>
			</ul>
			@elseif((auth()->check() && auth()->user()->role == 'admin'))
			@yield('active')
			<ul class="nav navbar-nav navbar-right">
				<li class="navbar-text"><span class="glyphicon glyphicon-user"></span><strong> Admin {{ auth()->user()->name }}</strong></li>
				<li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-off"></span><strong> Logout</strong></a></li>
			</ul>
			@else
			<ul class="nav navbar-nav navbar-left">
				<li class="active"><a href="{{route('home')}}"><strong><span class="badge">{{ session()->get('totalBooks') }}</span> Books</strong></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{route('register')}}"><strong><span class="glyphicon glyphicon-pencil"></span> Register</strong></a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" href="#" data-toggle="dropdown"><strong>Login</strong><strong class="caret"></strong></a>
					<div class="dropdown-menu" style="width:300px; padding: 15px; padding-bottom: 0px;">
						<form action="{{route('login')}}" method="POST">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="email">Email</label>                                      
								<input type="email" id="email" class="form-control" placeholder="rio@email.com" name="email" required>                                                                                                          
								<br>
								<label for="password">Password</label>
								<input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
								<br>
								<button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>                                                                                  
								@include('includes.errors')                   
							</div>
						</form>
					</div>
				</li>
			</ul>
			@endif
		</div>
		<!--/.nav-collapse -->
	</div>
</nav>
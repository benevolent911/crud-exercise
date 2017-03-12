@extends('master')
@section('nav')
@include('includes.nav')
@endsection
@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1 class="text-center text-primary"><span class="glyphicon glyphicon-pencil"></span> Register</h1>
		<form action="/register" method="POST" class="form-horizontal">
			<fieldset>
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" class="form-control" placeholder="John Locke">
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" id="email" name="email" class="form-control" placeholder="john@example.com" required>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
				</div>
				<div class="form-group">
					<label for="password_confirmation">Confirm Password:</label>
					<input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Re-enter password" required>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Register</button>
				</div>
			</fieldset>
		</form>
		@if(count($errors))
		<ul class="alert alert-danger list-unstyled" role="alert">
		@foreach($errors->all() as $error)                    
		<li><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {{ $error }}</li>
		@endforeach
	</div>
	@endif
</div>
</div>
@endsection
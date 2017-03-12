@extends('master')
@section('active')
<ul class="nav navbar-nav">
	<li><a href="{{route('admin')}}"><strong><span class="badge">{{ session()->get('totalBooks') }}</span> Books</strong></a></li>
	<li class="active"><a href="{{route('books.create')}}"><span class="glyphicon glyphicon-book"></span><strong> Create Book</strong></a></li>
</ul>
@endsection
@section('content')
<div class="row">
	@include('includes.search')
	<div class="col-md-9 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-10 col-xs-offset-1">
		<div class="row">
			<h1 class="text-center text-primary"><span class="glyphicon glyphicon-book"></span> Create Book</h1>
			<form action="{{route('books.store', ['id' => $book->id])}}" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
						<input type="title" class="form-control" id="title" name="title" placeholder="Are You Afraid of the Dark?" value="{{$book->title}}">
					</div>
				</div>
				<div class="form-group">
					<label for="author" class="col-sm-2 control-label">Author</label>
					<div class="col-sm-10">
						<input type="author" class="form-control" id="author" name="author" placeholder="John Peel" value="{{$book->author}}">
					</div>
				</div>
				<div class="form-group">
					<label for="genre" class="col-sm-2 control-label">Genre</label>
					<div class="col-sm-10">
						<select class="form-control" id="genre" name="genre">
							<option selected></option>
							<option>Horror</option>
							<option>Melodrama</option>
							<option>Urban</option>
							<option>Comedy</option>
							<option>Suspense</option>
							<option>Tragedy</option>
							<option>Thriller</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="library_section" class="col-sm-2 control-label">Library Section</label>
					<div class="col-sm-10">
						<select class="form-control" id="library_section" name="library_section">
							<option selected></option>
							<option>General Reference</option>
							<option>Fiction</option>
							<option>Circulation</option>
							<option>Children's Section</option>
							<option>Periodical Section</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="{{route('admin')}}" class="btn btn-info" role="button"><span class="glyphicon glyphicon-chevron-left"></span> Return To List</a>
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Save Book</button>
					</div>
				</div>
				@if(count($errors))
				<div class="col-xs-12">
					<ul class="alert alert-danger list-unstyled" role="alert">
						@foreach($errors->all() as $error)
						<li><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
			</form>
		</div>
	</div>
</div>
@endsection
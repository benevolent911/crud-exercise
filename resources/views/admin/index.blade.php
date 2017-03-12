@extends('master')
@section('active')
<ul class="nav navbar-nav">
	<li class="active"><a href="{{route('admin')}}"><strong><span class="badge">{{ session()->get('totalBooks') }}</span> Books</strong></a></li>
	<li><a href="{{route('books.create')}}"><span class="glyphicon glyphicon-book"></span><strong> Create Book</strong></a></li>
</ul>
@endsection
@section('content')
<div class="row">
	@include('includes.search')
	<div class="col-md-9 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-10 col-xs-offset-1">
		@include('includes.messages')
		<h1 class="text-center text-primary"><span class="glyphicon glyphicon-book"></span> Rio's Library <small>Book List</small></h1>
		@if(count($books))                        
		<br>                               
		<table class="table table-bordered table-hover table-condensed text-center">
			<tr class="active">
				<th class="text-center">Title</th>
				<th class="text-center">Author</th>
				<th class="text-center">Genre</th>
				<th class="text-center">Library Section</th>
				<th class="text-center">Status</th>
				<th class="text-center">Action</th>
			</tr>
			@foreach($books as $book)                     
			<tr>
				<td>{{ $book->title }}</td>
				<td>{{ $book->author }}</td>
				<td>{{ $book->genre }}</td>
				<td>{{ $book->library_section }}</td>
				<td>{!! $book->borrowed == 0 ? '<span class="label label-success">Available</span>' : '<span class="label label-default">Borrowed</span>' !!}</td>
				@if($book->borrowed == 0)
				<td width="10%">                    
					<a href="{{route('books.edit', ['id' => $book->id])}}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-wrench"></span></a>
					<button name="deleteButton" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal" data-id="{{$book->id}}"><span class="glyphicon glyphicon-trash"></span></button>
				</td>
				@endif                
			</tr>
			@endforeach
		</table>
		<div class="col-md-12 text-center">
			{{ $books->appends(['searchFilter' => request('searchFilter'), 'searchText' => request('searchText'), 'orderBy' => request('orderBy')])->render() }}
		</div>
		@else
		<h2 class="text-center">No books available.</h2>
		@endif               
		@include('includes.modal')
	</div>
</div>
@endsection
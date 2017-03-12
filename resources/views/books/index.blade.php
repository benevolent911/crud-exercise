@extends('master')
@section('active')    
<li class="active"><a href="{{route('home')}}"><strong><span class="badge">{{ session()->get('totalBooks') }}</span> Available Books</strong></a></li>
<li><a href="{{route('borrowed')}}"><strong><span class="badge">{{ session()->get('totalBooksBorrowed') }}</span> Borrowed Books</strong></a></li>
@endsection
@section('content')
<div class="row">
	@include('includes.messages')
	@include('includes.search')
	<div class="col-xs-8 col-md-9 col-sm-8">
		<div class="row">
			<h1 class="text-center text-primary"><span class="glyphicon glyphicon-book"></span> Rio's Library <small>Book Catalogue</small></h1>
			@if(count($books))                        
			<br>
			@foreach($books as $book)
			<div class="col-xs-6 col-md-4 col-sm-6">
				<div class="thumbnail">
					<span class="badge" style="position:absolute;"><span class="glyphicon glyphicon-star"></span> {{ $book->borrowed_count }}</span>                             
					<a href="{{route('books.show', ['id' => $book->id])}}"><img src="/img/sample.png" alt="sample image"></a>
					<div class="caption">
						<p class="text-center"><strong>{{ $book->title }}</strong></p>
						<ul class="list-unstyled">
							<li><strong>Author:</strong> {{ $book->author }}</small></li>
							<li><strong>Genre:</strong> {{ $book->genre }}</li>
							<li><strong>Library Section:</strong> {{ $book->library_section }}</li>
							<li><strong>Borrowed Count:</strong> {{ $book->borrowed_count }}</li>
							<li><strong>Last Borrowed By:</strong> {{ $book->last_user }}</li>
						</ul>
						@if(auth()->check())
						<a href="{{route('borrow', ['id' => $book->id])}}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-star"></span> Borrow Book</a>
						@endif                                                                                                                                                
					</div>
				</div>
			</div>
			@endforeach   			 
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				{{ $books->appends(['searchFilter' => request('searchFilter'), 'searchText' => request('searchText'), 'orderBy' => request('orderBy')])->render() }}
			</div>
			@else
			<h2 class="text-center">No books available.</h2>
			@endif           
		</div>   
	</div>
</div>
@endsection
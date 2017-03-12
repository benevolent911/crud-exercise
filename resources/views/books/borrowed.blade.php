@extends('master')
@section('active')
<li><a href="{{route('home')}}"><strong><span class="badge">{{ session()->get('totalBooks') }}</span> Available Books</strong></a></li>
<li class="active"><a href="{{route('borrowed')}}"><strong><span class="badge">{{ session()->get('totalBooksBorrowed') }}</span> Borrowed Books</strong></a></li>
@endsection
@section('content')
<div class="row">
	@include('includes.messages')
	<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
		<div class="row">
			<h1 class="text-center text-primary"><span class="glyphicon glyphicon-book"></span> Borrowed Books</h1>
			@if(count($books))                        
			<br>
			@foreach($books as $book)
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
				<div class="thumbnail">
					<span class="badge" style="position:absolute;"><span class="glyphicon glyphicon-star"></span> {{ $book->borrowed_count }}</span>                              
					<img src="/img/sample.png" alt="sample image">
					<div class="caption">
						<p class="text-left"><strong>{{ $book->title }}</strong></p>
						<ul class="list-unstyled">
							<li><strong>Author:</strong> {{ $book->author }}</small></li>
							<li><strong>Genre:</strong> {{ $book->genre }}</li>
							<li><strong>Library Section:</strong> {{ $book->library_section }}</li>
							<li><strong>Borrowed Count:</strong> {{ $book->borrowed_count }}</li>
						</ul>
						@if(auth()->check())
						<a href="{{route('return', ['id' => $book->id])}}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh"></span> Return Book</a>
						@endif
						</p>
					</div>
				</div>
			</div>
			@endforeach        
			@else
			<h2 class="text-center">No books borrowed.</h2>
			@endif
		</div>
	</div>
</div>
@endsection
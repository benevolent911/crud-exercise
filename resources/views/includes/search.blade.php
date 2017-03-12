<div class="col-md-3 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-6 col-xs-offset-3 well well-lg">
	<h1 class="text-center text-info">Search Books</h1>
	@if(auth()->user() == null || auth()->user()->role == 'user')
	<form action="{{route('books.search')}}" class="form-horizontal" method="GET"> 
		@else()                        
	<form action="{{route('admin.search')}}" class="form-horizontal" method="GET">
		@endif   
		<div class="form-group">
			<label for="searchFilter">Filter by </label>
			<select class="form-control" id="searchFilter" name="searchFilter">
				<option>Title</option>
				<option>Author</option>
				<option>Genre</option>
				<option>Library Section</option>
			</select>
		</div>
		<div class="form-group">
			<label for="orderBy">Order by </label>
			<select class="form-control" id="orderBy" name="orderBy">
				<option>Ascending</option>
				<option>Descending</option>
			</select>
		</div>
		<div class="form-group">                      
			<label for="searchText">Search</label>                                       
			<input type="text" class="form-control" id="searchText" name="searchText" placeholder="Search for..." required>                                                                     
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Search</button>
		</div>
	</form>
</div>
@if ($paginator->hasPages())
<ul class="pagination pagination-sm">
	{{-- Previous Page Link --}}
	@if ($paginator->onFirstPage())            
	@else                        
	<li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Prev</a></li>
	@endif
	{{-- Pagination Elements --}}
	@foreach ($elements as $element)
	{{-- Array Of Links --}}
	@if (is_array($element))
	@foreach ($element as $page => $url)
	@if ($page == $paginator->currentPage())
	<li class="active"><span><strong>{{ $page }}</strong></span></li>
	@else
	<li><a href="{{ $url }}">{{ $page }}</a></li>
	@endif
	@endforeach
	@endif
	@endforeach
	{{-- Next Page Link --}}
	@if ($paginator->hasMorePages())
	<li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next &raquo;</a></li>
	@else            
	@endif
</ul>
@endif
@if(session()->has('error'))
<div class="alert alert-danger" role="alert">
	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {{ session()->get('error') }}      
	<script>
		$(document).ready(function(){
		$(".dropdown-toggle").dropdown("toggle");
		});
	</script>
</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success" role="alert">                   
   <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {{ session()->get('success') }}      
</div>
@endif
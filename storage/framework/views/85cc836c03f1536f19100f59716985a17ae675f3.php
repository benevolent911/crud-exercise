<?php if(session()->has('success')): ?>
<div class="alert alert-success" role="alert">                   
   <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <?php echo e(session()->get('success')); ?>      
</div>
<?php endif; ?>
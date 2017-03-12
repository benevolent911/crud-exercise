<?php if($paginator->hasPages()): ?>
<ul class="pagination pagination-sm">
	
	<?php if($paginator->onFirstPage()): ?>            
	<?php else: ?>                        
	<li><a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">&laquo; Prev</a></li>
	<?php endif; ?>
	
	<?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	
	<?php if(is_array($element)): ?>
	<?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if($page == $paginator->currentPage()): ?>
	<li class="active"><span><strong><?php echo e($page); ?></strong></span></li>
	<?php else: ?>
	<li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
	<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
	<?php if($paginator->hasMorePages()): ?>
	<li><a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">Next &raquo;</a></li>
	<?php else: ?>            
	<?php endif; ?>
</ul>
<?php endif; ?>
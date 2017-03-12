<?php $__env->startSection('active'); ?>    
<li class="active"><a href="<?php echo e(route('home')); ?>"><strong><span class="badge"><?php echo e(session()->get('totalBooks')); ?></span> Available Books</strong></a></li>
<li><a href="<?php echo e(route('borrowed')); ?>"><strong><span class="badge"><?php echo e(session()->get('totalBooksBorrowed')); ?></span> Borrowed Books</strong></a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<?php echo $__env->make('includes.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('includes.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="col-xs-8 col-md-9 col-sm-8">
		<div class="row">
			<h1 class="text-center text-primary"><span class="glyphicon glyphicon-book"></span> Rio's Library <small>Book Catalogue</small></h1>
			<?php if(count($books)): ?>                        
			<br>
			<?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-xs-6 col-md-4 col-sm-6">
				<div class="thumbnail">
					<span class="badge" style="position:absolute;"><span class="glyphicon glyphicon-star"></span> <?php echo e($book->borrowed_count); ?></span>                             
					<a href="<?php echo e(route('books.show', ['id' => $book->id])); ?>"><img src="/img/sample.png" alt="sample image"></a>
					<div class="caption">
						<p class="text-center"><strong><?php echo e($book->title); ?></strong></p>
						<ul class="list-unstyled">
							<li><strong>Author:</strong> <?php echo e($book->author); ?></small></li>
							<li><strong>Genre:</strong> <?php echo e($book->genre); ?></li>
							<li><strong>Library Section:</strong> <?php echo e($book->library_section); ?></li>
							<li><strong>Borrowed Count:</strong> <?php echo e($book->borrowed_count); ?></li>
							<li><strong>Last Borrowed By:</strong> <?php echo e($book->last_user); ?></li>
						</ul>
						<?php if(auth()->check()): ?>
						<a href="<?php echo e(route('borrow', ['id' => $book->id])); ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-star"></span> Borrow Book</a>
						<?php endif; ?>                                                                                                                                                
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   			 
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<?php echo e($books->appends(['searchFilter' => request('searchFilter'), 'searchText' => request('searchText'), 'orderBy' => request('orderBy')])->render()); ?>

			</div>
			<?php else: ?>
			<h2 class="text-center">No books available.</h2>
			<?php endif; ?>           
		</div>   
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<?php if(!auth()->user() == null && auth()->user()->role == 'admin'): ?>
			<a class="navbar-brand" href="<?php echo e(route('admin')); ?>"><span class="glyphicon glyphicon-book"></span> Rio's Library</a>
			<?php else: ?>
			<a class="navbar-brand" href="<?php echo e(route('home')); ?>"><span class="glyphicon glyphicon-book"></span> Rio's Library</a>
			<?php endif; ?>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<?php if(auth()->check() && auth()->user()->role == 'user'): ?>         
			<ul class="nav navbar-nav">
				<?php echo $__env->yieldContent('active'); ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="navbar-text"><span class="glyphicon glyphicon-user"></span><strong> Hi <?php echo e(auth()->user()->name); ?>!</strong></li>
				<li><a href="<?php echo e(route('logout')); ?>"><span class="glyphicon glyphicon-off"></span><strong> Logout</strong></a></li>
			</ul>
			<?php elseif((auth()->check() && auth()->user()->role == 'admin')): ?>
			<?php echo $__env->yieldContent('active'); ?>
			<ul class="nav navbar-nav navbar-right">
				<li class="navbar-text"><span class="glyphicon glyphicon-user"></span><strong> Admin <?php echo e(auth()->user()->name); ?></strong></li>
				<li><a href="<?php echo e(route('logout')); ?>"><span class="glyphicon glyphicon-off"></span><strong> Logout</strong></a></li>
			</ul>
			<?php else: ?>
			<ul class="nav navbar-nav navbar-left">
				<li class="active"><a href="<?php echo e(route('home')); ?>"><strong><span class="badge"><?php echo e(session()->get('totalBooks')); ?></span> Books</strong></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo e(route('register')); ?>"><strong><span class="glyphicon glyphicon-pencil"></span> Register</strong></a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" href="#" data-toggle="dropdown"><strong>Login</strong><strong class="caret"></strong></a>
					<div class="dropdown-menu" style="width:300px; padding: 15px; padding-bottom: 0px;">
						<form action="<?php echo e(route('login')); ?>" method="POST">
							<?php echo e(csrf_field()); ?>

							<div class="form-group">
								<label for="email">Email</label>                                      
								<input type="email" id="email" class="form-control" placeholder="rio@email.com" name="email" required>                                                                                                          
								<br>
								<label for="password">Password</label>
								<input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
								<br>
								<button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>                                                                                  
								<?php echo $__env->make('includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                   
							</div>
						</form>
					</div>
				</li>
			</ul>
			<?php endif; ?>
		</div>
		<!--/.nav-collapse -->
	</div>
</nav>
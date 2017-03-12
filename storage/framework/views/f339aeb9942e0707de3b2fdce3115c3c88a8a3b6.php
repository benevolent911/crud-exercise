<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="CRUD Exercise">
		<meta name="author" content="Erick L. Rebadeo">
		<link rel="icon" href="../../favicon.ico">
		<title>Rio's Library</title>
		<!-- JQuery script -->
		<script src="/js/jquery-3.1.1.min.js"></script> 
		<script src="/js/jquery-ui.min.js"></script>  
		<script src="/js/main.js"></script>         
		<!-- Bootstrap core CSS -->
		<link href="/css/bootstrap-spacelab.min.css" rel="stylesheet">
		<link href="/css/jquery-ui.min.css" rel="stylesheet">
		<link href="/css/main.css" rel="stylesheet">
	</head>
	<body>
		<?php echo $__env->make('includes.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div class="container">
			<?php echo $__env->yieldContent('content'); ?>                     
			<hr>
		</div>
		<footer class="footer">
			<div class="container">
			<p class="text-muted text-left">&copy Rio's Library CRUD Exercise 2017 <a href="#"><span class="pull-right glyphicon glyphicon-menu-up"></span><span class="pull-right">Back to top </a></span></p>
		</footer>
		<script src="/js/bootstrap.min.js"></script>
	</body>
</html>
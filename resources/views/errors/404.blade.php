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
		<div class="container">
			<h2 class="text-center text-danger"><span class="glyphicon glyphicon-remove-sign"></span> <strong>Invalid URL</strong></h2>
			<div class="alert alert-warning" role="alert">
				<h4><span class="glyphicon glyphicon-remove-sign"></span> The page you are accessing is invalid. Unplug your power cord or click this <u><strong><a href="{{ redirect()->back()->getTargetUrl() }}" class="alert-link">link</a></strong></u> to go back.</h4>
			</div>
			<hr>
		</div>
		<script src="/js/bootstrap.min.js"></script>
	</body>
</html>
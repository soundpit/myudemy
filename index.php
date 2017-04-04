<!doctype hmtl>
<html>
<head>
	<title>Udemy Course List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--bootstrap -->
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
	<!-- custom styles -->
	<link rel="stylesheet" href="styles/styles.css">

</head>
<body>
	
<div class="container-fluid header ">
	<div class="row">
		<h1 id="title">My Udemy Courses</h1>
	</div>
</div> <!-- /container -->
	
<div class="container">
	<div class="row search">
		<?php include('includes/search.php'); ?>
	</div><!-- /search row -->
		
  	<div class="row main">
  	</div><!-- /main row -->
	
</div> <!--/container -->
	
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
	<script src="scripts/main.js"></script>
	
</body>
</html>
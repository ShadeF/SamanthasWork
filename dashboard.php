<?php
	require 'includes/connection.php';
	// session_start();
	// extract($_SESSION);
	// echo $_SESSION['username'];
	// var_dump($_SESSION);
	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Welcome to your dasboard</title>
 	<!-- bootstrap css -->
 	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
 	<!-- fonatawesome -->
 	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
 	<style type="text/css">
 		body {
 			background-color: #D6FBFF;
 		}

 		#two {
 			background-image: url(images/cute.jpg);
 			background-size: cover;
			width: 100%;
			height: 550px;
 		}

 		h2 {
			padding-top: 200px;
		}
 	</style>
 </head>
 <body>
 		<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #B4F2F7;">
		<!-- Brand -->
		<a class="navbar-brand text-dark" href="#"><i class="fa fa-mountain"></i>Nature walk</a>

		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Navbar links -->
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link text-dark" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-dark" href="#">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-dark" href="#">Contact Us</a>
				</li>
				<li class="nav-item">
					<form action="system.php" method="post">
						<input type="submit" name="submit" value="Log out" class="nav-link text-dark btn btn-danger btn-sm">
					</form>
				</li> 
			</ul>
		</div> 
	</nav>
	<div class="jumbotron text-center" id="two">
		<h2>Welcome to your dashboard!</h2>
		<p>Hope your having a good experience on our website</p>
		<p>To go to the 'to do list page'</p><a href="toDoList.php">Click here</a>
	</div>
	
 </body>
 </html>

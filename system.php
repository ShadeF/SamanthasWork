<?php 
	require 'includes/connection.php';
	// session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION AND LOGIN!</title>
	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<!-- jquery -->
	<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<!-- fontawesome -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	body {
		background-color: #DFF8FA;
	}

	.showcase {
		background-image: url(images/walk5.jpg);
		background-size: cover;
		padding: 200px;
		text-align: center;
		color: #283747;
		font-size: 1.4em;
		width: 100%;
	}
	h4 {
		color: #8EBEFE;
		font-weight: bold;
	}

	#one {
		background-image: url(images/walk1.jpg);
		background-size: cover;
		padding: 45px;
	}
	#two {
		background-image: url(images/walk3.jpg);
		background-size: cover;
		padding: 45px;
	}
</style>
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
			</ul>
		</div> 
	</nav>
	<div class="showcase">
		<h1><i>Welcome to a serene environment where you can walk in a space away from the hustle and bustle of the city life</i></h1>
	</div>
	<div class="container">
		<br>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#register">Register</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#login">Login</a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div id="register" class="container tab-pane active"><br>
				<h4><i>Want to join the wonderful experience of these nature walks? Register with us today and become part of the beautiful team.</i></h4>
				<div class="row">
						<div class="col-8" id="one">
							<form action="system.php" method="post">
								<legend>Register</legend>
								<div class="form-group">
									<label for="name">Username:</label>
									<input type="text" class="form-control" id="name" name="name" required>
								</div>
								<div class="form-group">
									<label for="pwd">Password:</label>
									<input type="password" class="form-control" id="pwd" name="pass" required>
								</div>
								<div class="form-group">
									<label for="num">Phone Number:</label>
									<input type="number" class="form-control" id="num" name="number" required>
								</div>
								<button type="submit" class="btn btn-block" name="register" style="background-color: #F9E79F;">Register</button>
							</form>
						</div>
					</div> 
			</div>
			<div id="login" class="container tab-pane fade"><br>
				<h4><i>Already a member? Login and continue your experience.</i></h4>
				<div class="row">
						<div class="col-8" id="two">
							<form action="dashboard.php" method="post">
								<legend style="color: black;">Login</legend>
								<div class="form-group">
									<label for="name" style="color: #76D7C4;">Username:</label>
									<input type="text" class="form-control" id="name" name="name" required>
								</div>
								<div class="form-group">
									<label for="pwd" style="color: #76D7C4;">Password:</label>
									<input type="password" class="form-control" id="pwd" name="pass" required>
								</div>
								<button type="submit" class="btn btn-block" name="login" style="background-color: #73C6B6;">Login</button>
							</form>
						</div>
					</div> 
					<!-- here we create the form which starts the password recovery process! -->
					<h2>Want to reset Password?</h2><a href="resetPassword.php" name="upt"> Click here</a>
			</div>
		</div>
	</div>
	<br><br><br>
</body>
</html>

<?php  
 if (isset($_POST['register'])) {
 	extract($_POST);
 		$passwordfromuser = $pass;
 		// $convertedpass = sha1($passwordfromuser);

 	$query = "INSERT INTO 6470users (username, password_hash, phone) VALUES ('$name', '$convertedpass', '$number')";

 	if (mysqli_query($conn, $query)) {
 		echo "<h3>Registration successful</h3>";

 		// header("location: system.php");
 	} else {
 		die("<b><i>That username is already taken. Choose another one :</i></b>" .mysqli_error($conn));
 	}
 } 
 if (isset($_POST['login'])) {
 	extract($_POST);
 	$passwordfromuser = $pass;
 	$convertedpass = sha1($passwordfromuser);

 	$query = "SELECT * FROM 6470users WHERE username = '$name' AND password_hash = '$convertedpass'";
 	$result = mysqli_query($conn, $query);

 	if (!$result) {
 		die ("Query Failed : " . mysqli_error($conn));

 	}
 	$count = mysqli_num_rows($result);

 	if ($count == 1) {
 		// extract($_POST);
 		echo "<h5><i>Your login is Successful</i></h5>";
 		// $_SESSION['username'] = $name;
 		// header("location: dashboard.php");
 	} else {
 		echo "<h4> Username or password you entered is very incorrect</h4>";
 	}
 }

 ?>
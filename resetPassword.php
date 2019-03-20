<?php require 'includes/connection.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Reset your password</title>
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<!-- fonawesome -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<style type="text/css">
		body {
			background-image: url(images/walk2.jpg);
			background-size: cover;
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
			</ul>
		</div> 
	</nav>

	<h1>Kindly fill in the information below in order for you to reset your password</h1>
	<div class="container-fluid">
		<form action = "resetPassword.php" method = "POST"> 
		<div class="row">
			<div class="col-6">
				<div class="form-group">
					<label style="color: yellow;"> Enter your username: 
						<input type="text" name="name" class="form-control">
					</label>
				</div>
				<div class="form-group">
					<label style="color: yellow;"> Phone number: 
						<input type="number" name="number" class="form-control">
					</label>
				</div>
				<div class="form-group">
					<label style="color: yellow;"> Enter your new password: 
						<input type="password" name="pass" class="form-control">
					</label>
				</div>
			</div>
		</div>
		<input type="submit" name="reset" value="Reset" class="btn btn-warning">
		<!-- Enter your username <br> <input type ="text" name = "name"> 
		<br>
		Enter your phone number <br> <input type="number" name="number">
		<br>
		Enter your new password <br> <input type="password" name="pass"> 
		<br>
		<input type="submit" name="reset" value="Reset"> -->
	</form>
	</div>




<?php 

if (isset($_POST['reset'])) {
	extract($_POST);
	$query = "SELECT * FROM `6470users` WHERE username = '$name' AND phone = '$number'";
	$run= mysqli_query($conn, $query);
	if (!isset($run)) {
		die("Query has failed" .mysqli_error($conn));
	}else{
		$count = mysqli_num_rows($run);
		if ($count == 1) {
			$passwordfromuser = $pass;
			$convertedpass = sha1($passwordfromuser);
			$update = "UPDATE 6470users SET password_hash = '$convertedpass' WHERE username = '$name' AND phone = '$number'";
			mysqli_query($conn, $update);
			echo "Password successfully changed";
			header('location: system.php');
		} else {
			echo "<p>Username or phone number you entered is incorrect!</p>";
		}
	}
	
}

?>
</body>
</html>








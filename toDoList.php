<?php require 'includes/connection.php';
	// session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>To do page</title>
	<!-- bootstrap css-->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<!-- fontawesome -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<style type="text/css">
		#one {
			background-image: url(images/sunset.jpg);
			background-size: cover;
			width: 100%;
			height: 400px;			
		}
		h3 {
			padding-top: 180px;
		}

		body {
			background-color: #FEAF79;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #EDBB99;">
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
					<a class="nav-link text-dark" href="#add">Add jobs</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-dark" href="#delete">Delete Jobs</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-dark" href="#edit">Edit Jobs</a>
				</li> 
				<li class="nav-item">
					<a class="nav-link text-dark" href="#view">View Jobs</a>
				</li> 
				<li class="nav-item">
					<a class="nav-link text-dark" href="#search">Search for jobs</a>
				</li> 
				<li class="nav-item">
					<form action="system.php" method="post">
						<input type="submit" name="submit" value="Log out" class="nav-link text-dark btn btn-danger btn-sm">
					</form>
				</li>
			</ul>
		</div> 
	</nav>
	<div class="text-center" id="one">
		<h3>On this page there are a couple of things that you can do!</h3>
		<h4>Such as....</h4>
		<h5><i>Add jobs, Delete Jobs, Edit Jobs, View Jobs and Search for jobs</i></h5>
	</div>
	<br>
	<div class="container" id="add">
		<h4><i>Add Job</i></h4>
		<form action="#add" method="post">
			<input type="text" name="add" required>
			<input type="submit" name="submit" class="btn btn-danger">
		</form>
		<?php 
			if (isset($_POST['submit'])) {
				extract($_POST);
				$addJob = "INSERT INTO 6470todo (Job) VALUES ('$add')";
				$run = mysqli_query($conn, $addJob);
				if (!isset($run)) {
					die("Query failed!!" . mysqli_error($conn));
				} else {
					echo "Your job has been added";
				}
			}
		 ?>
	</div>
	<br><br><hr>
	<div class="container" id="delete">
		<h4><i>Delete Job</i></h4>
		<form action="#delete" method="get">
			<input type="text" name="delete" required>
			<input type="submit" name="submit" class="btn btn-warning">
		</form>
		<?php 
			if (isset($_GET['submit'])) {
				extract($_GET);
 			$deleteJob = "DELETE FROM 6470todo WHERE Job = '$delete'";

 		$run = mysqli_query($conn, $deleteJob);

 		if (isset($run)) {
 			echo "<p>Job deleted</p>";
 		} else {
 			die("Delete failed, try again!" . mysqli_error($conn));
 		}
 	}
		 ?>
	</div>
	<br><hr>
	<div class="container" id="edit">
		<h4><i>Edit Job</i></h4>
		<form method="post" action="#edit">
			<label>Current name</label> <br>
			<input type="text" name="current" required> <br> <br>
			<label>New Job</label> <br>
			<input type="text" name="new"> <br> <br>
			<button class="btn btn-primary" name="edit">Edit job</button> 
		</form>
	</div>
	 <?php 
	 	if (isset($_POST['edit'])) {
	 		extract($_POST);
	 		$edit = "UPDATE 6470todo SET Job = '$new' WHERE Job ='$current'";
	 		$run = mysqli_query($conn, $edit);
	 		if (!isset($run)) {
	 			die("Edit failed! Try again" . mysqli_error($conn));
	 		}
	 			echo "Edit Successful";
	 	
	 	}
	  ?>
	   <br><hr>
	<div class="container" id="view">
		<h4><i>View Jobs</i></h4>
		<br>
			<form method="post" action="#view">
				<button class="btn btn-success" name="view">View jobs</button>
			</form>
	</div>
	<?php 
		if (isset($_POST['view'])) {
			extract($_POST);
			$view = "SELECT * FROM 6470todo";
			$run = mysqli_query($conn, $view);
			if (!isset($run)) {
				die("Failed!") .mysqli_error($conn);
			} else {
				echo "<ol>";
				while ($row = mysqli_fetch_assoc($run)) {
					echo "<li>$row[Job]</li>";
				}
				echo "</ol>";
			}
		}

	 ?>
	 <br><hr>
	 	<div class="container" id="search">
	 		<h4><i>Search Jobs</i></h4>
	 		<form method="post" action="#search">
	 			<input type="text" name="search" required>
	 			<button name="searchB" class="btn btn-dark">Search Jobs</button>
	 		</form>
	 		<?php 
	 			if (isset($_POST['searchB'])) {
	 				$search = $_POST['search'];
	 				$search = "%" .$search. "%";
	 				$searchJob = "SELECT Job FROM 6470todo WHERE Job LIKE '$search'";
	 				$run = mysqli_query($conn, $searchJob);
	 				if (!isset($run)) {
	 					die("Search failed!" .mysqli_error($conn));
	 				} else {
	 					echo "<ol>";
	 						while ($row = mysqli_fetch_assoc($run)) {
							echo "<li>$row[Job]</li>";
							}
								echo "</ol>";
	 				}
	 			}
	 		 ?>
	 	</div>
	
</body>
</html>
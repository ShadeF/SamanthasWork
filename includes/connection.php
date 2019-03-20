<?php 

	$server = "localhost";
	$user = "Samantha";
	$pass = "Samanthafolashade";
	$db = "6470";

	$conn = mysqli_connect($server, $user, $pass, $db);
	if (!$conn) {
		die("Your connection has failed : " . mysqli_connect_error());
	}
	echo "<h5><i>Your connecton is successful!</i></h5>";
 ?>
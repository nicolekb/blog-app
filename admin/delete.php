<?php 

	include("../includes/mysql_connect.php");
	$blog_id = $_GET['bid'];

	if (isset($blog_id)) {
		mysqli_query($con, "DELETE FROM blogapp WHERE bid = '$blog_id'") or die(mysqli_error());
		header("Location: edit.php");
	}


?>
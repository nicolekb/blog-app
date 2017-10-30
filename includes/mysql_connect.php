<?php
//connect to db
$con = mysqli_connect("localhost", "nbuloran1", "dO5WRtTV7OKIYmPy", "nbuloran1_2025");

//check db connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//stops sql POST injection
foreach ($_POST as $key => $value) {
	$_POST[$key] = mysqli_real_escape_string($con, $value);
}

//stops sql GET injection
foreach ($_GET as $key => $value) {
	$_GET[$key] = mysqli_real_escape_string($con, $value);
}

//resolve all absolute url
define("BASE_URL", "http://nbuloran1.dmitstudent.ca/dmit2025/lab06/");


//global error handling
error_reporting(E_ALL ^ E_NOTICE);
?>
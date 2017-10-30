<?php
include("../includes/header.php");

//clearing
session_start();
unset($_SESSION['nklb20175blog']);
header("Location:" . BASE_URL);
?>
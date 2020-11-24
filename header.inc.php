<?php
require 'connection.inc.php';
require 'functions.inc.php';
$msg = '';
if(isset($_REQUEST['submit']) && $_REQUEST['submit'] !== '') {
	if($_REQUEST['submit'] == 'Login') {
		echo 1;
	} else if($_REQUEST['submit'] == 'Register') {
			$name = $conn -> real_escape_string($_REQUEST['name']);
			$email = $conn -> real_escape_string($_REQUEST['email']);
			$mobile = $conn -> real_escape_string($_REQUEST['mobile']);
			$password = $conn -> real_escape_string($_REQUEST['password']);
			$re_password = $conn -> real_escape_string($_REQUEST['re-password']);
			if ($password !== $re_password) {
				$msg = 'Password didn\'t match!!!';
			} else {
				$user = new User($email, $name, $mobile, $password);
				$msg = $user -> register($conn);
				$user -> showData();
			}


	} else {
		echo "OOPs, Something Went wrong!!!";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CedCab</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<!-- Header -->
		<header id="header">
			<div class="logo">
				<img src="images/logo.png" alt="">
			</div>
			<nav>
				<a href="index.php#header" class="active">Home</a>
				<a href="index.php#about">About Us</a>
				<!-- <a href="#">Services</a>
				<a href="#">Our Cabs</a> -->
				<a href="login.php">Sign In</a>
				<a href="register.php">Sign Up</a>
				<a href="#book-now" class="btn btn-dark">Book Now</a>
			</nav>
		</header>
		<!-- //Header -->
		
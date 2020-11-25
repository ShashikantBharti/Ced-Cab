<?php
require 'functions.inc.php';
$msg = '';

if(isset($_REQUEST['submit']) && $_REQUEST['submit'] !== '') {
	if($_REQUEST['submit'] == 'Login') {
		$username = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		if($username == '' || $password == '') {
			$msg = "All fields required!";
		} else {
			$user = new User;
			$result = $user -> login($username, $password);
			if(!$result){
				$msg = "You are not active user!";
			}
		}

	} else if($_REQUEST['submit'] == 'Register') {
			$name = $_REQUEST['name'];
			$email = $_REQUEST['email'];
			$mobile = $_REQUEST['mobile'];
			$password = $_REQUEST['password'];
			$re_password = $_REQUEST['re-password'];
			if ($password !== $re_password) {
				$msg = "Password didn't match!!!";
			} else {
				$query = new Query;
				if($query->getData('tbl_user','',["user_name"=>$email])) {
					$msg = "You are already registered!";
					$register = 0;
				} else {
					$user = new User($email, $name, $mobile, $password);

					if($register = $user -> register()) {
						$msg = "Registration Successfull!!";
					} else {
						$msg = "Registration Failed!!";
					}
				}
			}
	} else {
		echo "OOPs, something went wrong!!!";
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
				<a href="index.php#ourcabs">Our Cabs</a>
				<?php 
					if(isset($_SESSION['IS_ADMIN'])) {
						if($_SESSION['IS_ADMIN']) {
							echo '<a href="login.php">Sign In</a>';
							echo '<a href="register.php">Sign Up</a>';
						} else {
							echo '<a href="logout.php">Logout</a>';
							echo '<a href="dashboard.php">Dashboard</a>'; 
						}
					} else {
						echo '<a href="login.php">Sign In</a>';
						echo '<a href="register.php">Sign Up</a>';
					}
				?>
				
				<a href="#book-now" class="btn btn-dark">Book Now</a>
			</nav>
		</header>
		<!-- //Header -->
		
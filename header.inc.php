<?php
require 'functions.inc.php';
$msg = ''; 

// Check Submit Request
if(isset($_REQUEST['submit']) && $_REQUEST['submit'] !== '') {
	if($_REQUEST['submit'] == 'Login') {
		$username = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$remme = isset($_REQUEST['remme'])?$_REQUEST['remme']:0;
		
		// Check if username and password is not empty
		if($username == '' || $password == '') {
			$msg = "All fields required!";
		} else {
			$user = new User;
			$result = $user -> login($username, $password, $remme); // Login
			if(!$result){
				$msg = "You are not registered or not active user!";
			}

		}

	} else if($_REQUEST['submit'] == 'Register') { // Register New User
			$name = $_REQUEST['name'];
			$email = $_REQUEST['email'];
			$mobile = $_REQUEST['mobile'];
			$password = $_REQUEST['password'];
			$re_password = $_REQUEST['re-password'];
			if ($password !== $re_password) {
				$msg = "Password didn't match!!!";
			} else {
				$query = new Query;

				// Check for Duplicate username.
				if($query->getData('tbl_user','',["user_name"=>$email])) {
					$msg = "You are already registered!";
					$register = 0;
				} else {
					// Register User
					$user = new User($email, $name, $mobile, $password);
					if($register = $user -> register()) {
						$msg = "Registration Successfull!!";
					} else {
						$msg = "Registration Failed!!";
					}
				}
			}
	// New Cab Booking.
	} elseif($_REQUEST['submit'] == 'Book_Now'){
		$query = new Query;
		$result = $query -> getData('tbl_location');
		$locations = array();
		foreach($result as $value) {
			$locations[$value['name']] = $value['distance'];
		}
		$user_id = $_REQUEST['user_id'];
		$pickup_loc = $_REQUEST['pickup'];
		$drop_loc = $_REQUEST['drop'];
		$cab_type = $_REQUEST['cab_type'];
		if($pickup_loc == '' || $drop_loc == '' || $cab_type == '')	{
			$msg = "Please choose options?";
			$result = 0;
		} else {
			$luggage = $_REQUEST['luggage'];
			if($luggage == '') {
				$luggage = 0;
			}
			$ride_date = date('d-m-Y h:i:s');
			$total_distance = abs($locations[$drop_loc]-$locations[$pickup_loc]);
			$cab = new Cab($cab_type, $total_distance, $luggage);
			$total_fare = $cab -> totalFare();
			if($cab_type == 1) {
				$cab_type = "CedMicro";
			} else if($cab_type == 2) {
				$cab_type = "CedMini";
			} else if($cab_type == 3) {
				$cab_type = "CedRoyal";
			} else {
				$cab_type = "CedSUV";
			}
			$result = $query -> insertData('tbl_ride',["ride_date"=>$ride_date,"pickup_loc"=>$pickup_loc,"drop_loc"=>$drop_loc,"total_distance"=>$total_distance,"luggage"=>$luggage,"cab_type"=>$cab_type,"total_fare"=>$total_fare,"status"=>0,"user_id"=>$user_id]);
			if($result) {
				$msg = "Your cab request has sent successfully! and Total Fare is <strong>Rs.{$total_fare}</strong>";
			} else {
				$msg = "Your cab is not booked! Something went wrong!";
			}
		}
	} else if($_REQUEST['submit'] == 'change_password') {
		$old_password = $_REQUEST['old_password'];
		$new_password = $_REQUEST['new_password'];
		$confirm_password = $_REQUEST['confirm_password'];
		if($old_password == '' || $new_password == '' || $confirm_password == '') {
			$msg = "All fields required!!";
			$result = 0;
		} else {
			$query = new Query;
			$user_id = $_SESSION['USER_ID'];
			$result = $query -> getData('tbl_user','',["user_id"=>$user_id]);
			if($result[0]['password'] == md5($old_password)) {
				$msg = "Old password not matched!!";
				$result = 0;
			} else {
				if($new_password == $confirm_password) {
					$result = $query->updateData('tbl_user',["password"=>md5($new_password)],["user_id"=>$user_id]);
					if($result){
						$msg = "Password Updated Successfully!";
					} else {
						$msg = "Password Updation Failed!";
					}
				} else {
					$msg = "New and Confirm password didn't matched!";
					$result = 0;
				}
			}
		}
	} else if($_REQUEST['submit'] == 'update_info') {
		$name = $_REQUEST['name'];
		$mobile = $_REQUEST['mobile'];
		$user_id = $_SESSION['USER_ID'];
		$query = new Query;
		$result = $query->updateData('tbl_user',["name"=>$name,"mobile"=>$mobile],["user_id"=>$user_id]);
		if($result){
			$msg = "Information Updated Successfully!";
		} else {
			$msg = "Information Updation Failed!";
		}
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
				<a href="index.php"><img src="images/logo.png" alt=""></a>
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
							echo '<a href="dashboard.php">Dashboard</a>'; 
						}
					} else {
						echo '<a href="login.php">Sign In</a>';
						echo '<a href="register.php">Sign Up</a>';
					}
				?>
				
				<a href="index.php#book-now" class="btn btn-dark">Book Now</a>
			</nav>
		</header>
		<!-- //Header -->
		
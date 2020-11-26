<?php
require '../functions.inc.php';
if(!isset($_SESSION['USER_ID'])){
	if(!$_SESSION['IS_ADMIN']){
	header('location: ../');
	}
}
$url = basename($_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="ha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/admin_style.css">
</head>
<body>

<!-- Header -->
<header>
	<div class="logo">
		<img src="images/logo.png" alt="">
	</div>
	<div class="links">
		<a href="logout.php" class="links"><i class="fa fa-power-off"></i> Logout</a>
	</div>
</header>
<!-- //Header -->
<!-- Main Content -->
<main>
	<!-- Sidebar -->
	<aside>
		<h1>Welcome Admin</h1>
		<div class="sidebar_link <?php  if($url == 'index.php' || $url=='admin'){echo "active_link"; }  ?>">
			<a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
		</div>
		<div class="seperator"></div>
		<div class="sidebar_link <?php  if($url == 'all_users.php'){echo "active_link"; }  ?>">
			<a href="all_users.php"><i class="fas fa-users"></i> All Users &raquo;</a>
		</div>
		<div class="sidebar_link <?php  if($url == 'active_users.php'){echo "active_link"; }  ?>">
			<a href="active_users.php"><i class="fas fa-user-friends"></i> Approved Users &raquo;</a>
		</div>
		<div class="sidebar_link <?php  if($url == 'blocked_users.php'){echo "active_link"; }  ?>">
			<a href="blocked_users.php"><i class="fas fa-users-slash"></i> Pending Users &raquo;</a>
		</div>
		<div class="seperator"></div>
		<div class="sidebar_link <?php  if($url == 'locations.php'){echo "active_link"; }  ?>">
			<a href="locations.php"><i class="fas fa-map-marker-alt"></i> Locations &raquo;</a>
		</div>
		<div class="sidebar_link <?php  if($url == 'add_location.php'){echo "active_link"; }  ?>">
			<a href="add_location.php"><i class="fas fa-map-marked-alt"></i> Add Location &raquo;</a>
		</div>
		
		<div class="seperator"></div>
		
		
		<div class="sidebar_link <?php  if($url == 'total_rides.php'){echo "active_link"; }  ?>">
			<a href="total_rides.php"> <i class="fas fa-taxi"></i> All Rides &raquo;</a>
		</div>
		<div class="sidebar_link <?php  if($url == 'new_requests.php'){echo "active_link"; }  ?>">
			<a href="new_requests.php"><i class="fas fa-comment-dots"></i> Pending Ride Requests &raquo;</a>
		</div>
		<div class="sidebar_link <?php  if($url == 'completed_rides.php'){echo "active_link"; }  ?>">
			<a href="completed_rides.php"><i class="fas fa-check"></i> Completed Rides &raquo;</a>
		</div>
		<div class="sidebar_link <?php  if($url == 'cancelled_rides.php'){echo "active_link"; }  ?>">
			<a href="cancelled_rides.php"><i class="fas fa-comment-slash"></i> Cancelled Rides &raquo;</a>
		</div>
		<div class="seperator"></div>
		<div class="sidebar_link <?php  if($url == 'change_password.php'){echo "active_link"; }  ?>">
			<a href="change_password.php"><i class="fas fa-key"></i> Change Password &raquo;</a>
		</div>
		<div class="sidebar_link <?php  if($url == 'logout.php'){echo "active_link"; }  ?>">
			<a href="logout.php"><i class="fa fa-power-off"></i> Logout &raquo;</a>
		</div>
	</aside>
	<!-- //Sidebar -->
	
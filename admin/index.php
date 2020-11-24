<?php 
session_start();

if(!(isset($_SESSION['USER_ID']) && $_SESSION['USER_ID'] == 1)) {
	header('location: ../');
}

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
		<h3>Welcome Admin</h3>
		<div class="seperator"></div>
		<div class="sidebar_link">
			<a href="#">Link1 &raquo;</a>
		</div>
		<div class="sidebar_link">
			<a href="#">Link1 &raquo;</a>
		</div>
		<div class="sidebar_link">
			<a href="#">Link1 &raquo;</a>
		</div>
		<div class="sidebar_link">
			<a href="#">Link1 &raquo;</a>
		</div>
		<div class="sidebar_link">
			<a href="#">Link1 &raquo;</a>
		</div>
		<div class="sidebar_link">
			<a href="#">Link1 &raquo;</a>
		</div>
		<div class="seperator"></div>
		<div class="sidebar_link">
			<a href="#">Link1 &raquo;</a>
		</div>
		<div class="sidebar_link">
			<a href="#">Link1 &raquo;</a>
		</div>
		<div class="sidebar_link">
			<a href="#">Link1 &raquo;</a>
		</div>
	</aside>
	<!-- //Sidebar -->
	<!-- Main Content -->
	<div class="main_content">
		<div class="main_header">
			<h4>Heading</h4>
		</div>
		<div class="content">
			<table>
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Shashikant</td>
						<td>surya.indian321@gmail.com</td>
						<td>7080281021</td>
						<td>Active</td>
						<td>
							<a href="#"><i class=" active fas fa-toggle-on"></i></a>
							<a href="#"><i class="fas fa-edit edit"></i></a>
							<a href="#"><i class="fas fa-trash-alt delete"></i></a>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Shashikant</td>
						<td>surya.indian321@gmail.com</td>
						<td>7080281021</td>
						<td>Active</td>
						<td>
							<a href="#"><i class=" active fas fa-toggle-on"></i></a>
							<a href="#"><i class="fas fa-edit edit"></i></a>
							<a href="#"><i class="fas fa-trash-alt delete"></i></a>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Shashikant</td>
						<td>surya.indian321@gmail.com</td>
						<td>7080281021</td>
						<td>Active</td>
						<td>
							<a href="#"><i class=" active fas fa-toggle-on"></i></a>
							<a href="#"><i class="fas fa-edit edit"></i></a>
							<a href="#"><i class="fas fa-trash-alt delete"></i></a>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Shashikant</td>
						<td>surya.indian321@gmail.com</td>
						<td>7080281021</td>
						<td>Active</td>
						<td>
							<a href="#"><i class=" active fas fa-toggle-on"></i></a>
							<a href="#"><i class="fas fa-edit edit"></i></a>
							<a href="#"><i class="fas fa-trash-alt delete"></i></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="main_footer">
			<div>Copyright &copy; CedCab</div>
			<div>Design & Developed By CEDCOSS</div>
		</div>
	</div>
</main>
<!-- //Main Content -->





</body>
</html>
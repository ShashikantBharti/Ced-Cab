<?php
	require 'header.inc.php';

	if(isset($_SESSION['USER_ID']) && $_SESSION['USER_ID'] != 1) {
		header('location: index.php');
	}
?>
		<!-- Breadcrumb -->
		<div id="breadcrumb" class="text-center">
			<h1>User Login</h1>
		</div>
		<!-- //Breadcrumb -->
		<!-- Login Form --> 
		<div id="input-form">
			<div id="message"></div>
			<form action="" method="POST">
				<p class="error"><?php echo $msg; ?></p>
				<label for="email">
					<span>Email ID</span>
					<input type="text" name="email" id="email">
				</label>
				<label for="password">
					<span>Password</span>
					<input type="password" name="password" id="password">
				</label>

				<input type="submit" class="btn btn-dark" name="submit" value="Login">

			</form>
		</div>
		<!-- //Login Form -->
<?php
	require 'footer.inc.php';
?>
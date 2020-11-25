<?php
	require 'header.inc.php';
?>
		<!-- Breadcrumb -->
		<div id="breadcrumb" class="text-center">
			<h1>User Registration</h1>
		</div>
		<!-- //Breadcrumb --> 
		<!-- Login Form -->
		<div id="input-form">
			<div id="message"></div>
			<form action="" method="POST">
				<label for="name">
					<span>Name</span>
					<input type="text" name="name" id="name">
					<p id="error-message" class="error"></p>
				</label>
				<label for="email">
					<span>User Name</span>
					<input type="email" name="email" id="email">
					<p id="error-message" class="error"></p>
				</label>
				<label for="mobile">
					<span>Mobile</span>
					<input type="text" name="mobile" id="mobile">
					<p id="error-message" class="error"></p>
				</label>
				<label for="password">
					<span>Password</span>
					<input type="password" name="password" id="password">
					<p id="error-message" class="error"></p>
				</label>
				<label for="password">
					<span>Re-Password</span>
					<input type="password" name="re-password" id="re-password">
					<p id="error-message" class="<?php if($register){ echo "success";} else {echo "error";} ?>"><?php echo $msg; ?></p>
				</label>
				<input type="submit" class="btn btn-dark" name="submit" value="Register">
			</form>
		</div>
		<!-- //Login Form -->
<?php
	require 'footer.inc.php';
?>		
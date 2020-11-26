<?php
	require 'header.inc.php';
	$url = basename($_SERVER['REQUEST_URI']);
	$query = new Query;
	$locations = $query -> getData('tbl_location');
?>

<main>
	<?php  
		require 'sidebar.inc.php';
	?>
	<div class="main_content">
		<h1>Chane Your Password</h1>
		<form action="" method="POST">
			<label for="pickup">
				<span>Old Password</span>
				<input type="password" name="old_password" id="" placeholder="Enter your old password...">
			</label>
			<label for="drop">
				<span>New Password</span>
				<input type="password" name="new_password" id="" placeholder="Enter your new password...">
			</label>
			<label for="cab_type">
				<span>Confirm Password</span>
				<input type="password" name="re_password" id="" placeholder="Confirm new password...">
			</label>
			
			<input type="text" value="<?php echo $_SESSION['USER_ID']; ?>" name="user_id" hidden>
			<button type="submit" name="submit" value="change_password" class="btn btn-light btn-block">Update Password</button>
			<p class="<?php if($result){ echo 'success'; } else{ echo 'error'; } ?>"><?php echo $msg; ?></p>
		</form>
	</div>
</main>

<?php
	require 'footer.inc.php';
?>
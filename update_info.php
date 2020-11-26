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
		<h1>Update Your Information</h1>
		<form action="" method="POST">
			<label for="pickup">
				<span>Name</span>
				<input type="text" name="name" value="" placeholder="Enter your name...">
			</label>
			<label for="drop">
				<span>Username</span>
				<input type="text" name="username" value="" placeholder="Enter your username...">
			</label>
			<label for="cab_type">
				<span>Mobile</span>
				<input type="text" name="mobile" value="" placeholder="Enter your mobile...">
			</label>
			<input type="text" value="<?php echo $_SESSION['USER_ID']; ?>" name="user_id" hidden>
			<button type="submit" name="submit" value="Book_Now" class="btn btn-light btn-block">Save Updates</button>
			<p class="<?php if($result){ echo 'success'; } else{ echo 'error'; } ?>"><?php echo $msg; ?></p>
		</form>
	</div>
</main>

<?php
	require 'footer.inc.php';
?>
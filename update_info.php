<?php
	require 'header.inc.php';
	if(isset($_SESSION['IS_ADMIN'])) {
		if($_SESSION['IS_ADMIN']) {
			header('location:index.php');
		}
	} else {
		header('location:index.php');
	}
	$url = basename($_SERVER['REQUEST_URI']);
	$query = new Query;
	$locations = $query -> getData('tbl_location');
	$user_id = $_SESSION['USER_ID'];
	$user = $query -> getData('tbl_user','',["user_id"=>$user_id]);

?>

<main>
	<?php  
		require 'sidebar.inc.php';
	?>
	<div class="main_content">
		<h1>Update Your Information</h1>
		<form action="" method="POST">
			<label for="">
				<span>Name</span>
				<input type="text" name="name" value="<?php echo $user[0]['name']; ?>" placeholder="Enter your name...">
			</label>
			<label for="cab_type">
				<span>Mobile</span>
				<input type="text" name="mobile" value="<?php echo $user[0]['mobile']; ?>" placeholder="Enter your mobile...">
			</label>
			
			<button type="submit" name="submit" value="update_info" class="btn btn-light btn-block">Save Updates</button>
			<p class="<?php if($result){ echo 'success'; } else{ echo 'error'; } ?>"><?php echo $msg; ?></p>
		</form>
	</div>
</main>

<?php
	require 'footer.inc.php';
?>
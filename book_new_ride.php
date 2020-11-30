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
?>

<main>
	<?php  
		require 'sidebar.inc.php';
	?>
	<div class="main_content">
		<h1>Book Your Cab</h1>
		<form action="" method="POST">
			<label for="pickup">
				<span>Pickup</span>
				<select name="pickup" id="pickup">
					<option value="">Current Location</option>
					<?php
					foreach($locations as $location) {
						echo '<option value="'.$location['name'].'">'.$location['name'].'</option>';
					}
					?>
				</select>
			</label>
			<label for="drop">
				<span>Drop</span>
				<select name="drop" id="drop">
					<option value="">Drop Location</option>
					<?php
					foreach($locations as $location) {
						echo '<option value="'.$location['name'].'">'.$location['name'].'</option>';
					}
					?>
				</select>
			</label>
			<label for="cab_type">
				<span>Cab Type</span>
				<select name="cab_type" id="cab_type">
					<option value="">Cab Type</option>
					<option value="1">CedMicro</option>
					<option value="2">CedMini</option>
					<option value="3">CedRoyal</option>
					<option value="4">CedSUV</option>
				</select>
			</label>
			<label for="luggage" class="luggage">
				<span>Luggage</span>
				<input type="text" name="luggage" id="luggage" placeholder="Enter Weight in KG">
			</label>
			<input type="text" value="<?php echo $_SESSION['USER_ID']; ?>" name="user_id" hidden>
			<button type="submit" name="submit" value="Book_Now" class="btn btn-light btn-block">Book Cab</button>
			<p class="<?php if($result){ echo 'success'; } else{ echo 'error'; } ?>"><?php echo $msg; ?></p>
		</form>
	</div>
</main>

<?php
	require 'footer.inc.php';
?>
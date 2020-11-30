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
	$user_id = $_SESSION['USER_ID'];
	$locations = $query -> getData('tbl_location');
	$result = $query -> getData('tbl_ride','',["user_id"=>$user_id]);

	if(isset($_REQUEST['action'])) {
		$query = new Query;
		$id = $_REQUEST['id'];
		if($_REQUEST['action'] == 'delete'){
			if($query -> deleteData('tbl_ride',["ride_id"=>$id])){
				header('location: all_rides.php');
			}
		} else if($_REQUEST['action'] == 0) {
			if($query->updateData('tbl_ride',["status"=>1],["ride_id"=>$id])){
				header('location: all_rides.php');
			}
		} else if($_REQUEST['action'] == 1) {
			if($query->updateData('tbl_ride',["status"=>0],["ride_id"=>$id])){
				header('location: all_rides.php');
			}
		} else if($_REQUEST['action'] == -1) {
			if($query->updateData('tbl_ride',["status"=>-1],["ride_id"=>$id])){
				header('location: all_rides.php');
			}
		} else {
			if($query->updateData('tbl_ride',["status"=>2],["ride_id"=>$id])){
				header('location: all_rides.php');
			}
		}

	} 	
?>

<main>
	<?php  
		require 'sidebar.inc.php';
	?>
	<div class="main_content">
		<h4>
			<select name="sort" id="sort">
				<option value="">--Sort By--</option>
				<option value="ride_date">Date</option>
				<option value="total_fare">Fare</option>
				<option value="total_distance">Distance</option>
				<option value="pickup_loc">Pickup Location</option>
			</select>
			<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['USER_ID']; ?>">
			<input type="hidden" name="status" id="status" value=''>
		</h4>
		<div class="rides">
			<table>
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Pickup Location</th>
						<th>Drop Location</th>
						<th>Total Distance</th>
						<th>Total Fare</th>
						<th>Date Time</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="showData">
					<?php 
					$sr = 1;
					if($result != 0) {
						foreach($result as $ride){

					?>
					<tr>
						<td><?php echo $sr; ?></td>
						<td><?php echo $ride['pickup_loc']; ?></td>
						<td><?php echo $ride['drop_loc']; ?></td>
						<td><?php echo $ride['total_distance']; ?> KM</td>
						<td>Rs. <?php echo $ride['total_fare']; ?>/-</td>
						<td><?php echo $ride['ride_date']; ?></td>
						<td>
							<?php 
								if($ride['status'] == -1){
									echo 'Cancelled';
								} else if($ride['status'] == 0){
									echo 'Inactive';
								} else if($ride['status'] == 1) {
									echo 'Approved';
								} else {
									echo 'Completed';
								}
							 ?>
						 </td>
						 <td>
							<?php
								if($ride['status'] == -1){
									echo ' <a href="?action=delete&id='.$ride['user_id'].'" title="Delete"><i class="fas fa-trash-alt delete"></i></a>';
								} else if($ride['status'] == 0){
									echo ' <a href="?action=-1&id='.$ride['ride_id'].'" title="Cancel"><i class="cancelled fas fa-thumbs-down"></i></a> ';
								} else if($ride['status'] == 1) {
									echo ' <a href="?action=2&id='.$ride['ride_id'].'" title="Completed"><i class="completed fas fa-thumbs-up"></i></a> ';
									echo ' <a href="?action=-1&id='.$ride['ride_id'].'" title="Cancel"><i class="cancelled fas fa-thumbs-down"></i></a> ';
								} else {
									echo ' <a href="?action=delete&id='.$ride['user_id'].'" title="Delete"><i class="fas fa-trash-alt delete"></i></a> ';
								}
							?>
							</td>
					</tr>
					<?php
							$sr++;
							}
						}else {
							echo "No Record Found!";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</main>

<?php
	require 'footer.inc.php';
?>
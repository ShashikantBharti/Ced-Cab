<?php
	require 'header.inc.php';
	$query = new Query;
	$result = $query -> getData('tbl_ride','',["status"=>2]);
	
	if(isset($_REQUEST['action'])) {
		$query = new Query;
		echo $_REQUEST['action'];
		$id = $_REQUEST['id'];
		if($_REQUEST['action'] == 'delete'){
			if($query -> deleteData('tbl_ride',["ride_id"=>$id])){
				header('location: completed_rides.php');
			}
		} else if($_REQUEST['action'] == 0) {
			if($query->updateData('tbl_ride',["status"=>1],["ride_id"=>$id])){
				header('location: completed_rides.php');
			}
		} else if($_REQUEST['action'] == 1) {
			if($query->updateData('tbl_ride',["status"=>0],["ride_id"=>$id])){
				header('location: completed_rides.php');
			}
		} else if($_REQUEST['action'] == -1) {
			if($query->updateData('tbl_ride',["status"=>-1],["ride_id"=>$id])){
				header('location: completed_rides.php');
			}
		} else {
			if($query->updateData('tbl_ride',["status"=>2],["ride_id"=>$id])){
				header('location: completed_rides.php');
			}
		}

	} 	
?> 
	<!-- Main Content -->
	<div class="main_content">
		<div class="main_header">
			<h4>Completed Rides</h4>
			<select name="filter" id="filter">
				<option value="">-- Filter By --</option>
				<option value="1">Last Week</option>
				<option value="2">Last Month</option>
			</select>
			<select name="sort" id="sort">
				<option value="">-- Sort By --</option>
				<option value="ride_date">Date</option>
				<option value="total_fare">Fare</option>
				<option value="total_distance">Distance</option>
			</select>
			<input type="hidden" name="status" id="status" value='2'>
		</div>
		<div class="content">
			<table>
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Pickup Location</th>
						<th>Drop Location</th>
						<th>Total Distance</th>
						<th>Luggage</th>
						<th>Total Fare</th>
						<th>Ride Date</th>
						<th>User Name</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody id="showData">
					<?php 
					$sr = 1;
					if($result != 0) {
						foreach($result as $ride) {
							$user = $query -> getData('tbl_user','',["user_id"=>$ride['user_id']]);
					?>
					<tr>
						<td><?php echo $sr; ?></td>
						<td><?php echo $ride['pickup_loc']; ?></td>
						<td><?php echo $ride['drop_loc']; ?></td>
						<td><?php echo $ride['total_distance']; ?></td>
						<td><?php echo $ride['luggage']; ?></td>
						<td><?php echo $ride['total_fare']; ?></td>
						<td><?php echo $ride['ride_date']; ?></td>
						<td><?php echo $user[0]['name']; ?></td>
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
									echo ' <a href="?action=0&id='.$ride['ride_id'].'" title="Approve"><i class="inactive fas fa-toggle-off"></i> </a> ';
									echo ' <a href="?action=delete&id='.$ride['user_id'].'" title="Delete"><i class="fas fa-trash-alt delete"></i></a> ';
								} else if($ride['status'] == 0){
									echo ' <a href="?action=0&id='.$ride['ride_id'].'" title="Approve"><i class="inactive fas fa-toggle-off"></i> </a>';
									echo ' <a href="?action=-1&id='.$ride['ride_id'].'" title="Cancel"><i class="cancelled fas fa-thumbs-down"></i></a> ';
								} else if($ride['status'] == 1) {
									echo ' <a href="?action=2&id='.$ride['ride_id'].'" title="Complete"><i class="completed fas fa-thumbs-up"></i></a> ';
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
						} else {
							echo "No Record Found!!";
						}
					?>
						
				</tbody>
			</table>
		</div>
		<div class="main_footer">
			<div>Copyright &copy; CedCab</div>
			<div>Designed & Developed By CEDCOSS</div>
		</div>
	</div>
</main>
<!-- //Main Content -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="js/sorting.js"></script>
</body>
</html>
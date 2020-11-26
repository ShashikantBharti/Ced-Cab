<?php
	require 'header.inc.php';
	$query = new Query;
	$result = $query -> getData('tbl_ride','',["status"=>0]);
	
	if(isset($_REQUEST['action'])) {
		$id = $_REQUEST['id'];
		if($_REQUEST['action'] == 'delete'){
			$query = new Query;
			if($query -> deleteData('tbl_ride',["ride_id"=>$id])){
				header('location: new_requests.php');
			}
		} else if($_REQUEST['action'] == 'active') {
			$query = new Query;
			if($query->updateData('tbl_ride',["status"=>0],["ride_id"=>$id])){
				header('location: anew_requests.php');
			}
		} else if($_REQUEST['action'] == 'inactive') {
			$query = new Query;
			if($query->updateData('tbl_ride',["status"=>1],["ride_id"=>$id])){
				header('location: new_requests.php');
			}
		}

	} 
?>
	<!-- Main Content -->
	<div class="main_content">
		<div class="main_header">
			<h4>Sort By</h4>
			<select name="sort_by" id="sort_by">
				<option value="">Choose Option--</option>
				<option value="">Name</option>
				<option value="">Date</option>
				<option value="">Total Fare</option>
			</select>
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
				<tbody>
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
								if($ride['status']){
									echo 'Active';
								} else {
									echo 'Inactive';
								}
							 ?>
						 </td>
						<td>
							<a href="?action=<?php if($ride['status']){echo 'active';} else {echo 'inactive';} ?>&id=<?php echo $ride['ride_id']; ?>"><i class="<?php 
								if(!$ride['status']){
									echo 'inactive fas fa-toggle-off';
								} else {
									echo 'active fas fa-toggle-on';
								}
							 ?> "></i></a>
							<a href="#"><i class="fas fa-edit edit"></i></a>
							<a href="#" title="Details"><i class="fas fa-eye details"></i></a>
							<a href="?action=delete&id=<?php echo $ride['ride_id']; ?>" title="Delete"><i class="fas fa-trash-alt delete"></i></a>
						</td>
					</tr>
					<?php
							$sr++;
							}
						} else {
							echo "No New Requests Found!";
						}
					?>
						
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
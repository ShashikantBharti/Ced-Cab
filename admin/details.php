<?php
	require 'header.inc.php';
	$query = new Query;
	$user_id = $_REQUEST['id'];
	$user = $query -> getData('tbl_user','',["user_id"=>$user_id]);
	$result = $query -> getData('tbl_ride','',["user_id"=>$user_id]);
	?>
	<!-- Main Content -->
	<div class="main_content">
		<div class="main_header">
			<h3><?php echo $user[0]['name']; ?></h3>
			<h4>Mob.: <?php echo $user[0]['mobile']; ?></h4>
		</div>
		<div class="content">
			<table>
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Pickup Location</th>
						<th>Drop Location</th>
						<th>Date Time</th>
						<th>Total Distance</th>
						<th>Total Fare</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$sr = 1;
					if($result != 0) {
						foreach($result as $ride) {
					?>
					<tr>
						<td><?php echo $sr; ?></td>
						<td><?php echo $ride['pickup_loc']; ?></td>
						<td><?php echo $ride['drop_loc']; ?></td>
						<td><?php echo $ride['ride_date']; ?></td>
						<td><?php echo $ride['total_distance']; ?> KM</td>
						<td>Rs. <?php echo $ride['total_fare']; ?> /-</td>
						<td>
							<?php 
								if($ride['status'] == -1){
									echo "Cancelled";
								} elseif($ride['status'] == 0) {
									echo "Pending";
								} elseif($ride['status'] == 1) {
									echo "Approved";
								} else {
									echo "Completed";
								}

							 ?>
						</td>
					</tr>
					<?php
							$sr++;
							}
						} else {
							echo "No Record Found!";
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
</body>
</html>
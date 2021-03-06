<?php
	require 'header.inc.php';
	$query = new Query;
	$result = $query -> getData('tbl_user');
	
	if(isset($_REQUEST['action'])) {
		 if($_REQUEST['action'] == 'delete'){
		 	$id = $_REQUEST['id'];
		 	$query = new Query;
		 	$result = $query -> deleteData('tbl_user',["id"=>$id]);
		 }
	} 
?>
	<!-- Main Content -->
	<div class="main_content">
		<div class="tiles">
			<a href="all_users.php">
			<div class="box box-1">
				<div class="box_top">
					<i class="fas fa-users"></i>	
					<span><?php echo count($result); ?></span>
				</div>
				<h4>Total Users</h4>
			</div>
			</a>
			<a href="active_users.php">
			<div class="box box-2">
				<div class="box_top">
					<i class="fas fa-user-friends"></i>
					<span>
						<?php 
							$result = $query->getData('tbl_user','',["is_block"=>0]);
							if($result){
								echo count($result);
							} else {
								echo $result;
							}
						 ?>
					 </span>					
				</div>
				<h4> Total Active Users</h4>
			</div>
			</a>
			<a href="blocked_users.php">
			<div class="box box-3">
				<div class="box_top">
					<i class="fas fa-users-slash"></i> 	
					<span>
						<?php 
							$result = $query->getData('tbl_user','',["is_block"=>1]);
							if($result) {
								echo count($result);
							} else {
								echo $result;
							}
						 ?>
					 </span>
				</div>
				<h4>Total Blocked users</h4>
			</div>
			</a>
			<a href="total_rides.php">
			<div class="box box-4">
				<div class="box_top">
					<i class="fas fa-taxi"></i>	
					<span>
						<?php 
							$result = $query -> getData('tbl_ride');
							if($result) {
								echo count($result);
							} else {
								echo $result;
							}
						 ?>
					 </span>
					</span>
				</div>
				<h4>Total Rides</h4>
			</div>
			</a>
			<a href="new_requests.php">
			<div class="box box-5">
				<div class="box_top">
					<i class="fas fa-comment-dots"></i>	
					<span>
						<?php 
							$result = $query->getData('tbl_ride','',["status"=>0]);
							if($result) {
								echo count($result);
							} else {
								echo $result;
							}
						 ?>
					</span>
				</div>
				<h4>Total New Ride Requests</h4>
			</div>
			</a>
			<div class="box box-6">
				<div class="box_top">
					<i class="fas fa-bacon"></i>	
					<span>
						<?php 
							$result = $query->getData('tbl_ride',["total_distance"]);
							if($result) {
								$sum = 0;
								foreach($result as $r){
									$sum += $r['total_distance'];
								}
								echo $sum;
							} else {
								echo $result;
							}
							
						 ?>
					</span>
				</div>
				<h4>Total Distance(KM)</h4>
			</div>
			 <div class="box box-7">
				<div class="box_top">
					<i class="fas fa-rupee-sign"></i>	
					<span>
						<?php 
							$result = $query->getData('tbl_ride',["total_fare"]);
							if($result) {
								$sum = 0;
								foreach($result as $r){
									$sum += $r['total_fare'];
								}
								echo $sum;
							} else {
								echo $result;
							}
							
						 ?>
					</span>
				</div>
				<h4>Total Earning (INR)</h4>
			</div>
		</div>
	</div>
</main>
<!-- //Main Content -->

</body>
</html>
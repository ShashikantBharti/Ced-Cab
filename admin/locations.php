<?php
	require 'header.inc.php';
	$query = new Query;
	$result = $query -> getData('tbl_location');

	if(isset($_REQUEST['action'])) {
		$id = $_REQUEST['id'];
		if($_REQUEST['action'] == 'delete'){
		 	if($query -> deleteData('tbl_location',["id"=>$id])){
		 		header('location: locations.php');
		 	}
		} else if($_REQUEST['action'] == 'active') {
			if($query->updateData('tbl_location',["is_available"=>1],["id"=>$id])){
				header('location: locations.php');
			}
		} else if($_REQUEST['action'] == 'inactive') {
			if($query->updateData('tbl_location',["is_available"=>0],["id"=>$id])){
				header('location: locations.php');
			}
		} else {
			echo "OOPs Something went wrong!";
		}
	} 
	
?>
	<!-- Main Content -->
	<div class="main_content">
		<div class="main_header">
			<h4>Locations</h4>
			<select name="sort_location" id="sort_location">
				<option value="">--Sort By--</option>
				<option value="name">Location</option>
				<option value="distance">Distance</option>
			</select>
			<input type="hidden" name="is_available" id="is_available" value="">
		</div>
		<div class="content">
			<table>
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Location</th>
						<th>Distance</th>
						<th>Available</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="showData">
					<?php 
					$sr = 1;
					if($result != 0){
						foreach($result as $location) {

					?>
					<tr>
						<td><?php echo $sr; ?></td>
						<td><?php echo $location['name']; ?></td>
						<td><?php echo $location['distance']; ?></td>
						<td>
							<?php 
								if($location['is_available']){
									echo 'Yes';
								} else {
									echo 'No';
								}
							 ?>
						 </td>
						<td>
							<?php

							if($location['is_available']){
									echo '<a href="?action=inactive&id='.$location['id'].'"><i class="active fas fa-toggle-on"></i></a>';
								} else {
									echo '<a href="?action=active&id='.$location['id'].'"><i class="inactive fas fa-toggle-off"></i></a>';
								}

							?>

							<a href="add_location.php?id=<?php echo $location['id']; ?>"><i class="fas fa-edit edit"></i></a>
							<a href="?action=delete&id=<?php echo $location['id']; ?>"><i class="fas fa-trash-alt delete"></i></a>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="js/sorting.js"></script>
</body>
</html>
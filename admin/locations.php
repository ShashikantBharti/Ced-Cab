<?php
	require 'header.inc.php';
	$query = new Query;
	$result = $query -> getData('tbl_location');

	if(isset($_REQUEST['action'])) {
		 if($_REQUEST['action'] == 'delete'){
		 	$id = $_REQUEST['id'];
		 	$query = new Query;
		 	if($query -> deleteData('tbl_location',["id"=>$id])){
		 		header('location: locations.php');
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
				<option value="">Distance</option>
				<option value="">Avaiable</option>
			</select>
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
				<tbody>
					<?php 
					$sr = 1;
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
							<a href="#" title="Block"><i class="active fas fa-toggle-on"></i></a>
							<a href="#"><i class="fas fa-edit edit"></i></a>
							<a href="?action=delete&id=<?php echo $location['id']; ?>"><i class="fas fa-trash-alt delete"></i></a>
						</td>
					</tr>
					<?php
						$sr++;
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
<?php
	require 'header.inc.php';
	$query = new Query;
	$result = $query -> getData('tbl_user','',["is_block"=>1]);
	
	if(isset($_REQUEST['action'])) {
		$id = $_REQUEST['id'];
		if($_REQUEST['action'] == 'delete'){
			if($query -> deleteData('tbl_user',["user_id"=>$id])){
				header('location: blocked_users.php');
			}
		} else if($_REQUEST['action'] == 'active') {
			if($query->updateData('tbl_user',["is_block"=>0],["user_id"=>$id])){
				header('location: blocked_users.php');
			}
		} else if($_REQUEST['action'] == 'inactive') {
			if($query->updateData('tbl_user',["is_block"=>1],["user_id"=>$id])){
				header('location: blocked_users.php');
			}
		}

	} 
?>
	<!-- Main Content -->
	<div class="main_content">
		<div class="main_header">
			<h4>Pending Users</h4>
			<select name="sort_user" id="sort_user">
				<option value="">--Sort By--</option>
				<option value="name">Name</option>
				<option value="date_of_signup">Date of Signup</option>
			</select>
			<input type="hidden" name="is_block" id="is_block" value='1'>
		</div>
		<div class="content">
			<table>
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Name</th>
						<th>User Name</th>
						<th>Mobile</th>
						<th>Date Of Signup</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="showData">
					<?php 
					$sr = 1;
					if($result != 0){
						foreach($result as $user) {

					?>
					<tr>
						<td><?php echo $sr; ?></td>
						<td><?php echo $user['name']; ?></td>
						<td><?php echo $user['user_name']; ?></td>
						<td><?php echo $user['mobile']; ?></td>
						<td><?php echo $user['date_of_signup']; ?></td>
						<td>
							<?php 
								if($user['is_block']){
									echo 'Inactive';
								} else {
									echo 'Active';
								}
							 ?>
						 </td>
						<td>
							<?php 
								if($user['is_block']){
									echo '<a href="?action=active&id='.$user['user_id'].'" title="Active"><i class="inactive fas fa-toggle-off"></i></a> ';
								} else {
									echo '<a href="?action=inactive&id='.$user['user_id'].'" title="Inactive"><i class="active fas fa-toggle-on"></i></a> ';
								}
								echo ' <a href="details.php?id='.$user['user_id'].'" title="Details"><i class="fas fa-eye details"></i></a> ';
							echo ' <a href="?action=delete&id='.$user['user_id'].'" title="Delete"><i class="fas fa-trash-alt delete"></i></a>';
							 ?>
						</td>

					</tr>
					<?php
							$sr++;
							}
						}else {
							echo 'No Record Found!';
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
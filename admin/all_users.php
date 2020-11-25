<?php
	require 'header.inc.php';
	$query = new Query;
	$result = $query -> getData('tbl_user');
	
	if(isset($_REQUEST['action'])) {
		$id = $_REQUEST['id'];
		if($_REQUEST['action'] == 'delete'){
			$query = new Query;
			if($query -> deleteData('tbl_user',["user_id"=>$id])){
				header('location: all_users.php');
			}
		} else if($_REQUEST['action'] == 'active') {
			$query = new Query;
			if($query->updateData('tbl_user',["is_block"=>0],["user_id"=>$id])){
				header('location: all_users.php');
			}
		} else if($_REQUEST['action'] == 'inactive') {
			$query = new Query;
			if($query->updateData('tbl_user',["is_block"=>1],["user_id"=>$id])){
				header('location: all_users.php');
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
						<th>Name</th>
						<th>User Name</th>
						<th>Mobile</th>
						<th>Date Of Signup</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$sr = 1;
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
							<a href="?action=<?php if($user['is_block']){echo 'active';} else {echo 'inactive';} ?>&id=<?php echo $user['user_id']; ?>"><i class="<?php 
								if($user['is_block']){
									echo 'inactive fas fa-toggle-off';
								} else {
									echo 'active fas fa-toggle-on';
								}
							 ?> "></i></a>
							<a href="#"><i class="fas fa-edit edit"></i></a>
							<a href="#" title="Details"><i class="fas fa-eye details"></i></a>
							<a href="?action=delete&id=<?php echo $user['user_id']; ?>" title="Delete"><i class="fas fa-trash-alt delete"></i></a>
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
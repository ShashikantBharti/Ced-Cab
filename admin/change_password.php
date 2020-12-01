<?php
require 'header.inc.php';

$msg = '';

if(isset($_REQUEST['submit'])) {
	$old_password = $_REQUEST['old_password'];
	$new_password = $_REQUEST['new_password'];
	$confirm_password = $_REQUEST['confirm_password'];
	if($old_password == '' || $new_password == '' || $confirm_password == '') {
		$msg = "All fields required!!";
		$result = 0;
	} else {
		$query = new Query;
		$user_id = $_SESSION['USER_ID'];
		$result = $query -> getData('tbl_user','',["user_id"=>$user_id]);
		if($result[0]['password'] != md5($old_password)) {
			$msg = "Old password not matched!!";
			$result = 0;
		} else {
			if($new_password == $confirm_password) {
				$result = $query->updateData('tbl_user',["password"=>md5($new_password)],["user_id"=>$user_id]);
				if($result){
					$msg = "Password Updated Successfully!";
				} else {
					$msg = "Password Updation Failed!";
				}
			} else {
				$msg = "New and Confirm password didn't matched!";
				$result = 0;
			}
		}
		
	}

}
?>
	<!-- Main Content -->
	<div class="main_content">
		<div class="main_header">
			<h4>Change Password</h4>
		</div>
		<div class="content">
			<form action="" method="POST">
				<label for="#">
					<span>Old Password</span>
					<input type="password" name="old_password" id="" placeholder="Enter your old password...">
				</label>
				<label for="#">
					<span>New Password</span>
					<input type="password" name="new_password" id="" placeholder="Enter your new password...">
				</label>
				<label for="#">
					<span>Confirm Password</span>
					<input type="password" name="confirm_password" id="" placeholder="Confirm your new password...">
				</label>
				<button type="submit" name="submit" value="add_loc" class="btn btn-dark btn-block">Save</button>
				<p class="<?php if($result){echo "success";} else{echo "error";} ?>"><?php echo $msg; ?></p>
			</form>
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
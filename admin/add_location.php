<?php
require 'header.inc.php';

$msg = '';

$btn_text = "Save Location";
$id = 0;
$location = '';
$distance = '';
if(isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
	$query = new Query;
	$result = $query -> getData('tbl_location','',["id"=>$id]);
	$location = $result[0]['name'];
	$distance = $result[0]['distance'];
	$btn_text = "Update Location";
}


if(isset($_REQUEST['submit'])) {
	$location = $_REQUEST['location'];
	$distance = $_REQUEST['distance'];
	if($location == '' || $distance == '') {
		$msg = "All fields required!!";
		$result = 0;
	} else {
		$query = new Query;
		if(!$id) {
			if($query -> getData('tbl_location','',["name"=>$location])){
				$msg = "Location Already Exists!!";
				$result = 0;
			} else {
				$result = $query -> insertData('tbl_location',["name"=>$location,"distance"=>$distance,"is_available"=>1]);
				if($result) {
					$msg = "Location Added!";
					$location = '';
					$distance = '';
				} else {
					$msg = "Adding new location failed!";
				} 
			}
		} else {
			$result = $query -> updateData('tbl_location',["name"=>$location,"distance"=>$distance,"is_available"=>1],["id"=>$id]);
			if($result) {
				$msg = "Location Updated!";
				$location = '';
				$distance = '';
			} else {
				$msg = "Updating location failed!";
			} 
		}
			
	}
}


?>
	<!-- Main Content -->
	<div class="main_content">
		<div class="main_header">
			<h4>Add Location</h4>
		</div>
		<div class="content">
			<form action="" method="POST">
				<label for="#">
					<span>Location Name</span>
					<input type="text" name="location" id="" placeholder="Enter Location Name..." value="<?php echo $location; ?>">
				</label>
				<label for="#">
					<span>Distance From Charbagh</span>
					<input type="text" name="distance" id="" placeholder="Enter Distance from Charbagh in KM..." value="<?php echo $distance; ?>">
				</label>
				<button type="submit" name="submit" value="add_loc" class="btn btn-dark btn-block"><?php echo $btn_text; ?></button>
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
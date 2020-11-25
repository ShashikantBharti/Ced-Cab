<?php
require 'header.inc.php';

$msg = '';

if(isset($_REQUEST['submit'])) {
	$location = $_REQUEST['location'];
	$distance = $_REQUEST['distance'];
	if($location == '' || $distance == '') {
		$msg = "All fields required!!";
		$result = 0;
	} else {
		$query = new Query;
		if($query -> getData('tbl_location','',["name"=>$location])){
			$msg = "Location Already Exists!!";
			$result = 0;
		} else {
			$result = $query -> insertData('tbl_location',["name"=>$location,"distance"=>$distance,"is_available"=>1]);
			if($result) {
				$msg = "Location Added!";
			} else {
				$msg = "OOPs Some error occured!";
			}
		}
	}

}

?>
	<!-- Main Content -->
	<div class="main_content">
		<div class="main_header">
			<h4>Enter Values</h4>
		</div>
		<div class="content">
			<form action="" method="POST">
				<label for="#">
					<span>Location Name</span>
					<input type="text" name="location" id="" placeholder="Enter Location Name...">
				</label>
				<label for="#">
					<span>Distance From Charbagh</span>
					<input type="text" name="distance" id="" placeholder="Enter Distance from Charbagh in KM...">
				</label>
				<button type="submit" name="submit" value="add_loc" class="btn btn-dark btn-block">Save Location</button>
				<p class="<?php if($result){echo "success";} else{echo "error";} ?>"><?php echo $msg; ?></p>
			</form>
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
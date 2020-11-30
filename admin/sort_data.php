<?php
require '../functions.inc.php';
$query = new Query;
  
// Sort Table Ride
if($_REQUEST['table'] == 1) {

	$field = $_REQUEST['field'];
	$status = $_REQUEST['status'];

	if($status != '') {
		$result = $query -> getData('tbl_ride','',["status"=>$status],$field,'DESC');	
	} else {
		$result = $query -> getData('tbl_ride','','',$field,'DESC');	
	}

	$name = array();
	foreach($result as $key=>$value) {
		$user = $query->getdata('tbl_user','',["user_id"=>$value['user_id']]);
		foreach($user as $u) {
			$name[] = $u['name'];
		}
	}  

	echo json_encode(array($result,$name));

// Sort Table User
} elseif($_REQUEST['table'] == 2) {

	$field = $_REQUEST['field'];
	$is_block = $_REQUEST['is_block'];

	if($is_block != '') {
		$result = $query -> getData('tbl_user','',["is_block"=>$is_block],$field,'ASC');
	} else {
		$result = $query -> getData('tbl_user','','',$field,'ASC');
	}

	echo json_encode($result);

// Sort Table Location
} elseif($_REQUEST['table'] == 3) {

	$field = $_REQUEST['field'];
	$is_available = $_REQUEST['is_available'];

	if($is_available != ''){
		$result = $query -> getData('tbl_location','',["is_available"=>$is_available],$field,'ASC');
	} else {
		$result = $query -> getData('tbl_location','','',$field,'ASC');
	}

	echo json_encode($result);

// Filter Table Ride
} elseif($_REQUEST['table'] == 4) {

	$duration = $_REQUEST['duration'];
	$status = $_REQUEST['status'];
	$today = date('d-m-Y h:i:s');

	if($duration == 1) {
		$date = date('d-m-Y h:i:s',strtotime('-1 week'));
	} else if($duration == 2) {
		$date = date('d-m-Y h:i:s',strtotime('-28 days'));
	} else {
		die('OOPs something went wrong!');
	}

	if($status != '') {
		$result = $query -> getData('tbl_ride','',["status"=>$status],'ride_date','DESC',[$today,$date]);
	} else {
		$result = $query -> getData('tbl_ride','','','ride_date','DESC',[$today,$date]);
	}

	$name = array();
	foreach($result as $key=>$value) {
		$user = $query->getdata('tbl_user','',["user_id"=>$value['user_id']]);
		foreach($user as $u) {
			$name[] = $u['name'];
		}
	}
	
	echo json_encode(array($result,$name));
}
?>
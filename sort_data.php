<?php
require 'functions.inc.php';
$query = new Query;
 
if($_REQUEST['type'] == 1) {

	$field = $_REQUEST['field'];
	$user_id = $_REQUEST['user_id'];
	$status = $_REQUEST['status'];

	if($status != '') {
		$result = $query -> getData('tbl_ride','',["user_id"=>$user_id,"status"=>$status],$field,'DESC');	
	} else {
		$result = $query -> getData('tbl_ride','',["user_id"=>$user_id],$field,'DESC');	
	}

	echo json_encode($result);

} else if($_REQUEST['type'] == 2) {

	$field = $_REQUEST['field'];
	$user_id = $_REQUEST['user_id'];
	$status = $_REQUEST['status'];
	$today = date('d-m-Y h:i:s');

	if($field == 1) {
		$date = date('d-m-Y h:i:s', strtotime('-1 week'));
	} else {
		$date = date('d-m-Y h:i:s', strtotime('-28 days'));
	}

	if($status != ''){
		$result = $query -> getData('tbl_ride','',["user_id"=>$user_id, "status"=>$status],'ride_date','DESC',[$today,$date]);
	} else {
		$result = $query -> getData('tbl_ride','',["user_id"=>$user_id],'ride_date','DESC',[$today,$date]);
	}
	
	echo json_encode($result);
}



?> 
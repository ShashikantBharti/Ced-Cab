<?php
require 'functions.inc.php';
$query = new Query;

$field = $_REQUEST['field'];
$user_id = $_REQUEST['user_id'];
$status = $_REQUEST['status'];
if($status != '') {
	$result = $query -> getData('tbl_ride','',["user_id"=>$user_id,"status"=>$status],$field,'DESC');	
} else {
	$result = $query -> getData('tbl_ride','',["user_id"=>$user_id],$field,'DESC');	
}

echo json_encode($result);

?>
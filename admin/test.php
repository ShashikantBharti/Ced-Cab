<?php
require '../functions.inc.php';
$query = new Query;

$field = 'total_fare';
$status = '';
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


echo '<pre>';
print_r(array($result,$name));

?>
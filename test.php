<?php
require 'functions.inc.php';

$conn = new mysqli('localhost','root','','citycab');

$sql = "SELECT `tbl_ride`.*,`tbl_user`.`name` FROM tbl_ride JOIN tbl_user ON `tbl_ride`.`user_id` = `tbl_user`.`user_id`";

$query = $conn -> query($sql);

$data = array();

while($result = $query->fetch_assoc()){
	$data[] = $result;
}

echo '<pre>';
print_r($data);

?>
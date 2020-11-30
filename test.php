<?php
require 'functions.inc.php';
$date1 = date('d-m-Y h:i:s');
$date2 = date('d-m-Y h:i:s', strtotime('-7 days'));

$query = new Query;
$result = $query -> getData('tbl_ride','','','ride_date','DESC',[$date1,$date2]);

echo '<pre>';
print_r($result);


?>
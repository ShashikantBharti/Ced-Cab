<?php

require 'functions.inc.php';
$pickup_loc = $_REQUEST['pickup'];
$drop_loc = $_REQUEST['drop'];
$cab_type = $_REQUEST['cab_type'];
$luggage = $_REQUEST['luggage'];
$query = new Query;
		$result = $query -> getData('tbl_location');
		$locations = array();
		foreach($result as $value) {
			$locations[$value['name']] = $value['distance'];
		}
$total_distance = abs($locations[$drop_loc]-$locations[$pickup_loc]);
$cab = new Cab($cab_type, $total_distance, $luggage);
$total_fare = $cab -> totalFare();

echo $total_fare;

?>
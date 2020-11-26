<?php 


$fare = 0;
$distance = abs($location[$drop] - $location[$pickup]);


function totalFare(){
switch($c_type) {
	case 1: 
		$fare = 50;
		if($distance <= 10) {
			$fare += $distance * 13.50;
		} else if($distance > 10 && $distance <= 60) {
			$fare += 10 * 13.50;
			$fare += ($distance - 10) * 12.00;
		} else if($distance > 60 && $distance <= 160) {
			$fare += 10 * 13.50;
			$fare += 50 * 12.00;
			$fare += ($distance - 50 - 10) * 10.20;
		} else {
			$fare += 10 * 13.50;
			$fare += 50 * 12.00;
			$fare += 100 * 10.20;
			$fare += ($distance - 100 - 50 - 10) * 8.50;
		}
	
	break;
	case 2: 
		$fare = 150;
		if($distance <= 10) {
			$fare += $distance * 14.50;
		} else if($distance > 10 && $distance <= 60) {
			$fare += 10 * 14.50;
			$fare += ($distance - 10) * 13.00;
		} else if($distance > 60 && $distance <= 160) {
			$fare += 10 * 14.50;
			$fare += 50 * 13.00;
			$fare += ($distance - 50 - 10) * 11.20;
		} else {
			$fare += 10 * 14.50;
			$fare += 50 * 13.00;
			$fare += 100 * 11.20;
			$fare += ($distance - 100 - 50 - 10) * 9.50;
		}

		if($luggage != 0 && $luggage <= 10) {
			$fare += 50;
		} else if ($luggage > 10 && $luggage <= 20) {
			$fare += 100;
		} else if($luggage > 20){
			$fare += 200;
		} else {
			$fare += 0;
		}
	
	break;
	case 3: 
		$fare = 200;
		if($distance <= 10) {
			$fare += $distance * 15.50;
		} else if($distance > 10 && $distance <= 60) {
			$fare += 10 * 15.50;
			$fare += ($distance - 10) * 14.00;
		} else if($distance > 60 && $distance <= 160) {
			$fare += 10 * 15.50;
			$fare += 50 * 14.00;
			$fare += ($distance - 50 - 10) * 12.20;
		} else {
			$fare += 10 * 15.50;
			$fare += 50 * 14.00;
			$fare += 100 * 12.20;
			$fare += ($distance - 100 - 50 - 10) * 10.50;
		}

		if($luggage != 0 && $luggage <= 10) {
			$fare += 50;
		} else if ($luggage > 10 && $luggage <= 20) {
			$fare += 100;
		} else if($luggage > 20){
			$fare += 200;
		} else {
			$fare += 0;
		}
	 
	break;
	case 4: 
		$fare = 250;
		if($distance <= 10) {
			$fare += $distance * 16.50;
		} else if($distance > 10 && $distance <= 60) {
			$fare += 10 * 16.50;
			$fare += ($distance - 10) * 15.00;
		} else if($distance > 60 && $distance <= 160) {
			$fare += 10 * 16.50;
			$fare += 50 * 15.00;
			$fare += ($distance - 50 - 10) * 13.20;
		} else {
			$fare += 10 * 16.50;
			$fare += 50 * 15.00;
			$fare += 100 * 13.20;
			$fare += ($distance - 100 - 50 - 10) * 11.50;
		}

		if($luggage != 0 && $luggage <= 10) {
			$fare += 50 * 2;
		} else if ($luggage > 10 && $luggage <= 20) {
			$fare += 100 * 2;
		} else if($luggage > 20){
			$fare += 200 * 2;
		} else {
			$fare += 0;
		}
	
	break;
}

return $fare;


?>
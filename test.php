<?php
require 'functions.inc.php';

$query = new Query;
$result = $query->getData('tbl_ride',["total_distance"]);
echo '<pre>';
print_r($result);

?>
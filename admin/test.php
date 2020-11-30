<?php
require '../functions.inc.php';
$query = new Query;

$date = date('d-m-Y h:i:s', strtotime('-1 week'));

echo $date;

?>
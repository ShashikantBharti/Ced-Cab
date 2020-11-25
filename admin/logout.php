<?php
require '../functions.inc.php';
$user = new User;
$user -> logout();
header('location: ../');
?>
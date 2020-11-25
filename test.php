<?php
require 'functions.inc.php';

$query = new Query;
$result = $query->getData('tbl_user','',["user_name"=>'admin',"password"=>'5cbcf07e36fe37142b407ace0211cbf7']);
echo '<pre>';
print_r($result);

?>
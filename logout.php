<?php
	session_start();
	unset($_SESSION['USER_ID']);
	unset($_SESSION['IS_ADMIN']);
	unset($_COOKIE['username']);
	session_destroy();
	header('location: index.php');
?>
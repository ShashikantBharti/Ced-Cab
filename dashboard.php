<?php
	require 'header.inc.php';
	if(isset($_SESSION['IS_ADMIN'])) {
		if($_SESSION['IS_ADMIN']) {
			header('location:index.php');
		}
	} else {
		header('location:index.php');
	}

	$url = basename($_SERVER['REQUEST_URI']);
?>

<main>
	<?php  
		require 'sidebar.inc.php';
	?>
	<div class="main_content">
		<div class="home_page">
			<h1>Enjoy Your Journey With CedCab</h1>
			<a href="book_new_ride.php" class="btn btn-light">Book New Cab</a>
		</div>
	</div>
</main>

<?php
	require 'footer.inc.php';
?>
<?php
	require 'header.inc.php';
	$url = basename($_SERVER['REQUEST_URI']);
?>

<main>
	<?php  
		require 'sidebar.inc.php';
	?>
	<div class="main_content">
		<div class="home_page">
			<h1>Enjoy Your Journey With CedCab</h1>
			<button class="btn btn-light">Book New Cab</button>
		</div>
	</div>
</main>

<?php
	require 'footer.inc.php';
?>
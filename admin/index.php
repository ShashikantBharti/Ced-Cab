<?php
	require 'header.inc.php';
	$query = new Query;
	$result = $query -> getData('tbl_user');
	
	if(isset($_REQUEST['action'])) {
		 if($_REQUEST['action'] == 'delete'){
		 	$id = $_REQUEST['id'];
		 	$query = new Query;
		 	$result = $query -> deleteData('tbl_user',["id"=>$id]);
		 }
	} 
?>
	<!-- Main Content -->
	<div class="main_content">
		<div class="tiles">
			
		</div>
	</div>
</main>
<!-- //Main Content -->
</body>
</html>
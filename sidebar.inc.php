<aside>
	<h1>
		<?php 
			$user_id = $_SESSION['USER_ID'];
			$query = new Query;
			$user1 = $query -> getData('tbl_user',["name"],["user_id"=>$user_id]);
			echo $user1[0]['name'];
		?>
	</h1>
	<div class="sidebar_link <?php  if($url == 'dashboard.php'){echo "active_link"; }  ?>">
		<a href="dashboard.php"><i class="fas fa-home"></i> Home</a>
	</div>
	<div class="sidebar_link <?php  if($url == 'book_new_ride.php'){echo "active_link"; }  ?>">
		<a href="book_new_ride.php"><i class="fas fa-taxi"></i> Book New Ride</a>
	</div>
	<div class="seperator"></div>
	<div class="sidebar_link <?php  if($url == 'all_rides.php'){echo "active_link"; }  ?>">
		<a href="all_rides.php"><i class="fas fa-car"></i> All Rides</a>
	</div>
	<div class="sidebar_link <?php  if($url == 'pending_rides.php'){echo "active_link"; }  ?>">
		<a href="pending_rides.php"><i class="fas fa-comment-dots"></i> Pending Rides</a>
	</div>
	<div class="sidebar_link <?php  if($url == 'completed_rides.php'){echo "active_link"; }  ?>">
		<a href="completed_rides.php"><i class="fas fa-check"></i> Completed Rides</a>
	</div>
	<div class="sidebar_link <?php  if($url == 'cancelled_rides.php'){echo "active_link"; }  ?>">
		<a href="cancelled_rides.php"><i class="fas fa-comment-slash"></i> Cancelled Rides</a>
	</div>
	<div class="seperator"></div>
	<div class="sidebar_link <?php  if($url == 'update_info.php'){echo "active_link"; }  ?>">
		<a href="update_info.php"><i class="fas fa-edit"></i> Update Information</a>
	</div>
	<div class="sidebar_link <?php  if($url == 'change_password.php'){echo "active_link"; }  ?>">
		<a href="change_password.php"><i class="fas fa-key"></i> Change Password</a>
	</div>
	<div class="sidebar_link">
		<a href="logout.php"><i class="fas fa-power-off"></i> Logout</a>
	</div>
</aside>
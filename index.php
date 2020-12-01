<?php
	require 'header.inc.php';
	$query = new Query;
	$locations = $query -> getData('tbl_location','',["is_available"=>1]);

?>
		<!-- Showcase -->
		<div id="showcase">
			<h1>
			<?php
				if(isset($_SESSION['USER_ID'])) {
					if(!$_SESSION['IS_ADMIN']) {
						$user_id = $_SESSION['USER_ID'];
						$query = new Query;
						$user1 = $query -> getData('tbl_user',["name"],["user_id"=>$user_id]);
						echo '<h1>Welcome '.$user1[0]['name'].'</h1><br>';
					}
				}
			?>
			</h1>
			<h1>Book a City Taxi to Your Destination in Town</h1>
			<p>Choose from a range of categories and price</p>
			<a href="#book-now" class="btn btn-dark">Book Now</a>
		</div>
		<!-- //Showcase --> 
		<!-- Book Now -->
		<div id="book-now">
			<div class="container">
				<div class="book-now-img">
					<img src="images/taxi-img.png" alt="">
				</div>
				<div class="book-now-form text-center">
					<span>City Taxi</span>
					<h1>Your Everyday Travel Partener</h1>
					<p>AC Cabs for point to point travel</p>
					<form action="#" method="POST">
						<label for="pickup">
							<span>Pickup</span>
							<select name="pickup" id="pickup">
								<option value="">Current Location</option>
								<?php
								foreach($locations as $location) {
									echo '<option value="'.$location['name'].'">'.$location['name'].'</option>';
								}
								?>
							</select>
						</label>
						<label for="drop">
							<span>Drop</span>
							<select name="drop" id="drop">
								<option value="">Drop Location</option>
								<?php
								foreach($locations as $location) {
									echo '<option value="'.$location['name'].'">'.$location['name'].'</option>';
								}
								?>
							</select>
						</label>
						<label for="cab_type">
							<span>Cab Type</span>
							<select name="cab_type" id="cab_type">
								<option value="">Cab Type</option>
								<option value="1">CedMicro</option>
								<option value="2">CedMini</option>
								<option value="3">CedRoyal</option>
								<option value="4">CedSUV</option>
							</select>
						</label>
						<label for="luggage" class="luggage">
							<span>Luggage</span>
							<input type="text" name="luggage" id="luggage" placeholder="Enter Weight in KG">
						</label>
						<div id="calculateFare"><a href="javasript:void(0)" id="calFare">Calculate Fare</a></div>
						<?php 
							if(isset($_SESSION['IS_ADMIN'])) {
								if($_SESSION['IS_ADMIN']) {
									echo '<div id="bookCab"><a href="login.php">Book Cab</a></div>';
								} else {
									echo '<input type="text" value="'.$_SESSION['USER_ID'].'" name="user_id" hidden>';
									echo '<button type="submit" name="submit" value="Book_Now" class="btn btn-dark btn-block">Book Cab</button>';
								}
							} else {
								echo '<div id="bookCab"><a href="login.php" class="btn btn-dark btn-block">Book Cab</a></div>';
							}
						?>
						
						<p class="<?php if($result){ echo 'success'; } else{ echo 'error'; } ?>"><?php echo $msg; ?></p>
					</form>
				</div>
			</div>
		</div>
		<!-- //Book Now -->
		<!-- About Us -->
		<div id="about">
			<div class="container">
				<div>
					<div class="text-center">
						<h1>About Us</h1>
						<p>Lorem ipsum dolor, sit.</p>
					</div>
					<p>Lorem ipsum dolor sit amet  necessitatibus cumque libero voluptate, rem quis laborum maiores neque expedita voluptatibus blanditiis, consequuntur unde saepe rerum ipsa? Autem dolorum sed praesentium officia eius tenetur.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, quod asperiores aspernatur placeat enim iste, facere quam? Iste, voluptatibus, voluptates.</p>
					<button class="btn btn-dark">Learn More</button>
				</div>
				<div>
					<img src="images/taxi_1.png" alt="">
				</div>
			</div>
		</div>
		<!-- //About Us -->
		<!-- Our Cabs -->
		<div id="ourcabs">
			<h1>Our Cabs</h1>
			<div class="container">
				<div class="card">
					<img src="images/taxi1.png" alt="">
					<h3>CedMicro</h3>
					<p>Booking Amount - <span>Rs. 50/-</span></p>
					<p>For 0 to 10KM - <span>Rs. 13.50/km</span></p>
					<p>For Next 50KM - <span>Rs. 12.00/km</span></p>
					<p>For Next 100KM - <span>Rs. 10.20/km</span></p>
					<p>For Rest Above - <span>Rs. 8.50/km</span></p>
				</div>
				<div class="card">
					<img src="images/taxi2.png" alt="">
					<h3>CedMini</h3>
					<p>Booking Amount - <span>Rs. 150/-</span></p>
					<p>For first 10 KM – <span>Rs. 14.50/km</span></p>
					<p>For next 50 KM – <span>Rs. 13.00/km</span></p>
					<p>For next 100 Km – <span>Rs. 11.20/km</span></p>
					<p>For rest above km – <span>Rs. 9.50/km</span></p>
				</div>
				<div class="card">
					<img src="images/taxi3.png" alt="">
					<h3>CedRoyal</h3>
					<p>Booking Amount - <span>Rs. 200/-</span></p>
					<p>For first 10 KM – <span>Rs. 15.50/km</span></p>
					<p>For next 50 KM – <span>Rs. 14.00/km</span></p>
					<p>For next 100 Km – <span>Rs. 12.20/km</span></p>
					<p>For rest above km – <span>Rs. 10.50/km</span></p>
				</div>
				<div class="card">
					<img src="images/taxi4.png" alt="">
					<h3>CedSUV</h3>
					<p>Booking Amount - <span>Rs. 250/-</span></p>
					<p>For first 10 KM – <span>Rs. 16.50/km</span></p>
					<p>For next 50 KM – <span>Rs. 15.00/km</span></p>
					<p>For next 100 Km – <span>Rs. 13.20/km</span></p>
					<p>For rest above km – <span>Rs. 11.50/km</span></p>
				</div>
			</div>
		</div>
		<!-- //Our Cabs -->
<?php
	require 'footer.inc.php';
?>
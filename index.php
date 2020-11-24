<?php
	require 'header.inc.php';
?>
		<!-- Showcase -->
		<div id="showcase">
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
					<form action="#">
						<label for="pickup">
							<span>Pickup</span>
							<select name="pickup" id="pickup">
								<option value="">Current Location</option>
								<option value="">Charbagh</option>
							</select>
						</label>
						<label for="drop">
							<span>Drop</span>
							<select name="drop" id="drop">
								<option value="">Current Location</option>
								<option value="">Charbagh</option>
							</select>
						</label>
						<label for="cab_type">
							<span>Cab type</span>
							<select name="cab_type" id="cab_type">
								<option value="">Current Location</option>
								<option value="">Charbagh</option>
							</select>
						</label>
						<label for="luggage">
							<span>Luggage</span>
							<input type="text" name="luggage" id="luggage" placeholder="Enter Weight in KG">
						</label>
						<button class="btn btn-dark btn-block">Book</button>
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
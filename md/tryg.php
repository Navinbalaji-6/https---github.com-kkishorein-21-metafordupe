<?php 
require 'connection.php';
if(isset($_POST["submit"])){
	$num = uniqid();
	$name = $_POST["name"];
	$email = $_POST["email"];
	$mobile = $_POST["mobile"];
	$password = $_POST["password"];

	$query = "INSERT INTO users VALUES('$num', '$name', '$email', '$mobile', '$password')";
	mysqli_query($conn,$query);
	echo"
	<script>
	alert('Successfully Added');
	</script>
	";
}
?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="styles1.css">
 <script src="https://kit.fontawesome.com/61b5bd9a69.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<div class="header">
		<h2>Contact Us</h2>
	</div>
	<form id="form" class="form" method="post" autocomplete="off" enctype="multipart/form-data">
		<div class="form-control">
			<label for="username">Username</label>
			<input type="text" name="name" id="name" placeholder="Enter the Username" required value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Email</label>
			<input type="email" name="email" id="email" placeholder="xyz@gmail.com" required value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Mobile</label>
			<input type="text" name="mobile" id="mobile" placeholder="Enter the Mobile Number" required value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Password</label>
			<input type="password" name="password" id="password" placeholder="Enter the Password">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<button type="submit" name="submit">Submit</button>
	</form>
</div>


<!-- SOCIAL PANEL HTML -->
<div class="social-panel-container">
	<div class="social-panel">
		<p>Connect through <i class="fa fa-heart"></i>
			<a target="_blank" href="www.google.com">these platforms</a></p>
		<button class="close-btn"><i class="fab fa-times"></i></button>
		<h4>Get in touch on</h4>
		<ul>
			<li>
				<a href="https://www.patreon.com/florinpop17" target="_blank">
					<i class="fab fa-discord"></i>
				</a>
			</li>
			<li>
				<a href="https://twitter.com/florinpop1705" target="_blank">
					<i class="fab fa-twitter"></i>
				</a>
			</li>
			<li>
				<a href="https://linkedin.com/in/florinpop17" target="_blank">
					<i class="fab fa-linkedin"></i>
				</a>
			</li>
			<li>
				<a href="https://facebook.com/florinpop17" target="_blank">
					<i class="fab fa-facebook"></i>
				</a>
			</li>
			<li>
				<a href="https://instagram.com/kkishorecj" target="_blank">
					<i class="fa-brands fa-instagram"></i>
				</a>
			</li>
		</ul>
	</div>
</div>
<button class="floating-btn">
	Get in Touch
</button>

<div class="floating-text">
	 <a href="https://florin-pop.com/blog/2019/09/100-days-100-projects" target="_blank">Login/Signup</a>
</div>
 <script src="script1.js"></script>
</body>
</html>
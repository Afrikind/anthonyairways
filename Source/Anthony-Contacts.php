<!DOCTYPE html>
<html>

<head>
	<title>Anthony Airways - Contact</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Anthony-ContactsCSS.css">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Paytone+One" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand"><img src="images/4b5d99c4-2f06-45be-88b2-5e4bb39f9885.png" id="logo"> Anthony AIRWAYS</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class=" nav navbar-nav">
				<li><a href="index.php"><strong>Home</strong></a></li>
				<li><a href="Anthony-About.php"><strong>About</strong></a></li>
				<li class="active"><a href="#"><strong>Contacts</strong></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">


					<li><a href="#" data-toggle="modal" data-target="#signup"><strong>Sign up </strong><i class="fas fa-user-plus"></i></a></li>
					<li><a href="#" data-toggle="modal" data-target="#login"><strong>Login </strong><i class="fas fa-user"></i></a></li>
				</ul>
			</div>
		</div>
	</nav>


	<div id="signup" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">SignUp</h4>
				</div>
				<div class="modal-body">
					<label for="username">Username:</label>
					<input type="text" name="username" placeholder="Username" id="username">
					<br>
					<label for="email">Email ID:</label>
					<input type="email" name="emailid" placeholder="Email Id" id="email">
					<br>
					<label for="pass">Password:</label>
					<input type="password" name="password" id="pass">
					<br>
					<label for="confpass">Confirm Password:</label>
					<input type="password" name="confpassword" id="confpass">
					<br>
					<input type="Submit" name="submit">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


	<div id="login" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Login</h4>
				</div>
				<div class="modal-body">
					<label for="username">Username:</label>
					<input type="text" name="username" placeholder="Username" id="username">
					<br>
					<label for="pass">Password:</label>
					<input type="password" name="password" id="pass">
					<br>
					<input type="Submit" name="submit">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<h1>Contacts</h1>

	<div id="first">
		<h2>Contact Us</h2>
		<p>Should you need to reach out to the Customer Relations team for any grievance redressal.</p>
		<p>Email us at: custrelations@Anthony.com</p>
		<p>Call Us at: +233.com</p>
		<p id="space">Or</p>
		<p>Call Us at: +233 8888899999</p>
		<hr>
		<h2>Grievance Redressal Procedure</h2>
		<p>For any grievance or query please fill the Grievance Redressal Procedure Form</p>
		<hr>
		<h2>Related Links</h2>
		<p>Travel Agency - Africa Tours And Travels</p>
	</div>
	<div id="second">
		<h2 id="space2">Grievance Redressal Procedure Form</h2>
		<form method="POST" action="Anthony-Contacts.php">
			<input type="text" name="name" placeholder="Name" size="55">
			<br><br>
			<input type="email" name="email" placeholder="Email-Id" size="55">
			<br><br>
			<input type="text" name="subject" placeholder="Subject" size="55">
			<br><br>
			<textarea name="message" rows="8" cols="54" placeholder="Message"></textarea>
			<br><br>
			<button type="submit" name="submit" class="btn btn-danger btn-lg">Send</button>
		</form>
	</div>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$conn = mysqli_connect("localhost", "root", "", "anthonyairways");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Function to sanitize user input
	function sanitizeInput($input)
	{
		global $conn;
		return mysqli_real_escape_string($conn, htmlspecialchars($input));
	}

	if (isset($_POST["submit"])) {
		$name = sanitizeInput($_POST["name"]);
		$email = sanitizeInput($_POST["email"]);
		$subject = sanitizeInput($_POST["subject"]);
		$message = sanitizeInput($_POST["message"]);

		// Insert data into the database
		$insertQuery = "INSERT INTO contact_form (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

		if (mysqli_query($conn, $insertQuery)) {
			echo "<div style='text-align: center; margin-top: 50px;'><p style='color: Yellow;'>Contact accepted successfully!</p></div>";
		} else {
			echo "Error inserting data: " . mysqli_error($conn);
		}
	}

	mysqli_close($conn);
}
?>
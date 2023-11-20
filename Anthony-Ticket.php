<!DOCTYPE html>
<html>

<head>
<head>
  <title>Anthony Airways</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Pacifico|Paytone+One" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Anthony-TicketCSS.css">
</head>

<body>

	<div class="container">
		<h1 id="headst">Ticket</h1>
		<table id="tabtk" width="600" border="1" cellpadding="1" cellspacing="1">
			<thead>
				<tr>
					<th>Ticket Number</th>
					<th>Passenger ID</th>
					<th>Passenger Name</th>
					<th>Gender</th>
					<th>Flight ID</th>
					<th>Class</th>
					<th>Terminal</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$dbhost = "localhost";
				$dbuser = "root";
				$dbpass = "";
				$db = "anthonyairways";
				$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
				if (!$conn) {
					echo "Connection was failed".mysqli_connect_error();
				}
				$ticketno = $_POST['$ticketno'];
				$ticketno = mysqli_real_escape_string($conn, $ticketno);
				if($_POST['submit'])
				{

					$sql = "SELECT * FROM ticket WHERE TickNo = '".$ticketno."'";

					if (mysqli_query($conn, $sql)) {
						$print = mysqli_query($conn,$sql);
						while ($row = mysqli_fetch_assoc($print)) {
							echo "<tr>";
							echo "<td>" . $row['TickNo'] . "</td>";
							echo "<td>" . $row['PassengerID'] . "</td>";
							$pass=$row['PassengerID'];
							$pass=mysqli_real_escape_string($conn,$pass);
							$sqlpass="Select Name, Gender from passenger where PassengerID='".$pass."'";
							if (mysqli_query($conn,$sqlpass)) {
								
								$p=mysqli_query($conn,$sqlpass);
								while ($r = mysqli_fetch_assoc($p)) {
									echo "<td>". $r['Name'] ."</td>";
									echo "<td>". $r['Gender'] ."</td>";
							} }else {
								echo "Something went wrong";
							}

							echo "<td>" . $row['FlightID'] . "</td>";
							echo "<td>" . $row['Type'] . "</td>";
							echo "<td>" . $row['Terminal'] . "</td>";
							echo "</tr>";
						}
					} else {
						echo "Something Went Wrong";
					}
				}
				?>
			</tbody>
		</table>
	</div>

</body>

</html>
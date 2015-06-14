<?php
	function displayAccountInfo() {
		try {
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$userID = $_COOKIE['userID'];

			$userSQL = "SELECT UserID, Name, Address, PhoneNum
						FROM User
						WHERE UserID = '$userID'";

			if(!$userSQL) {
				echo "An error has happened!";
			}

			// Only 1 iteration should happen

			echo '<table class="table table-striped">';
			foreach($db->query($userSQL) as $row) {

				echo "<th>Username</th><td>";
				echo $row['UserID'];
				echo "</td></tr><tr><th>Name</th><td>";
				echo $row['Name'];
				echo "</td></tr><tr><th>Address</th><td>";
				echo $row['Address'];
				echo "</td></tr><tr><th>Phone Number</th><td>";
				echo $row['PhoneNum'];
				echo "</td></tr></table>";
			}
		}
		catch(Exception $e) {
			echo "Could not connect to the database to display account info";
			exit;
		}
	}

	function displayPetInfo() {

		try {
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$userID = $_COOKIE['userID'];

			$petSQL = "SELECT PetName, Size, Species, PetID
						FROM OwnsPet p, User u
						WHERE p.OwnerID = u.UserID 
						AND u.UserID = '$userID'";
			if(!$petSQL) {
				echo "An error has happened!";
			}

			// Display each pet's information
			echo '<table class="table table-striped">';
			echo "<th>Name</th><th>Size</th><th>Species</th><th>ID</th></tr>";
			foreach($db->query($petSQL) as $row) {
				echo '<tr>';

				echo '<td>'; echo $row['PetName']; echo'</td>';
				echo '<td>'; echo $row['Size']; echo'</td>';
				echo '<td>'; echo $row['Species']; echo'</td>';
				echo '<td>'; echo $row['PetID']; echo'</td>';

				echo '</tr>';
			}
		}
		catch(Exception $e) {
			echo "Could not connect to the database to display pet info";
			exit;
		}
		echo "</table>";
	}

	function displayAvailInfo() {

		try {
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$userID = $_COOKIE['userID'];

			$availSQL = "SELECT s.StartDate, s.EndDate, c.Size, c.Species
						FROM SitterAvailability s, CanTakeCareOf c
						WHERE s.SitterID = '$userID'
						AND s.AvailabilityID = c.AvailabilityID";
	
			if(!$availSQL) {
				echo "An error has happened!";
			}

			// Display each availability
			echo '<table class="table table-striped">';
			echo '<tr><th>Pet Type</th><th>Size</th><th>Start Date</th><th>End Date</th></tr>';
			foreach($db->query($availSQL) as $row) {
				echo '<tr>';

				echo '<td>';
				echo $row['StartDate'];
				echo '</td><td>';
				echo $row['EndDate'];
				echo '</td><td>';
				echo $row['Size'];
				echo '</td><td>' ;
				echo $row['Species'];
				echo '</td>';

				echo '</tr>';
			}
		}
		catch(Exception $e) {
			echo "Could not connect to the database to display availability info";
			exit;
		}
		echo "</table>";
	}
?>

<head>

<link rel="stylesheet" href="bootstrap.min.css">
<style type="text/css">

#personalInfo td,th {
	padding-left: 20px;
	padding-top: 8px;
}

</style>
<title>My Account</title>

</head>


<body>
	<?php include './include/header.php'; ?>

	<div style="padding: 25px 0; background-color:951152; !important" class="jumbotron">
  		<h1 style="color:white">My Account</h1>
	</div>
	<div class="container">


		<?php if(isset($_COOKIE['userID'])): ?>
			<div style="height:110px">
				<div style="margin-left:10%;float:left;width:55%;overflow:hidden">
					<h2>Personal Information</h2>
					<?php 
						displayAccountInfo();
					?>					
					<a href="editPersonalInfo.php" class="btn btn-primary" role="button">Edit</a>
				</div>
				<div id="editinfo" style="overflow:hidden">
				</div>
			</div>
			<div>
				<div style="margin-left:10%;float:left;width:55%;overflow:hidden">
					<h2>My Pets</h2>
					<?php
						displayPetInfo();
					?>
					<a href="newpet.php" class="btn btn-primary" role="button">Add Pet</a>
				</div>
				<div style="overflow:hidden">
					<h2>My Availabilities</h2>
					<?php
						displayAvailInfo();
					?>
					<a href="user/sitterAddAvailability.php" class="btn btn-primary" role="button">Add Availability</a>
				</div>
			</div>
		<?php else : ?>
				<p>Please login to view your account.</p>
		<?php endif; ?>
			
		
	</div>
			
</body>

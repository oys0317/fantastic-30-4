<?php
	function displayAccountInfo() {
		try {
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			session_start();
			$_SESSION['editPwdWrongPwd'] = FALSE;
			$_SESSION['editPwdNoMatch'] = FALSE;
			$userID = $_COOKIE['userID'];

			$userSQL = "SELECT UserID, Name, Address, PhoneNum
						FROM User
						WHERE UserID = '$userID'";


			// Only 1 iteration should happen
			echo '<table class="table table-striped"><tr>';
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

			$petExists = FALSE;

			// Display each pet's information
			foreach($db->query($petSQL) as $row) {
				if(!$petExists) {
					echo '<table class="table table-striped">';
					echo "<th>Name</th><th>Size</th><th>Species</th><th>Remove</th></tr>";
					$petExists = TRUE;
				}

				echo "<tr>";
				echo 	"<td>" . $row['PetName']."</td>";
				echo 	"<td>" . $row['Size'] . "</td>";
				echo 	"<td>" . $row['Species'] . "</td>";
				echo 	"<td>";
				echo 		"<form action='./removePet.php' method='post'>";
				echo 			"<input type='image' name='petid' alt='Remove pet'";
				echo 			"src='./remove.png' width='18px' type='submit' value='";
				echo 			$row['PetID'] . "'/>";
				echo 		"</form>";
				echo 	"</td>";
				echo "</tr>";
			}
		}
		catch(Exception $e) {
			echo "Could not connect to the database to display pet info";
			exit;
		}

		if($petExists) 
			echo "</table>";
		else
			echo "<p class='noItemsInList'>You have no pets.</p>";
	}

	function displayAvailInfo() {

		try {
			$dbc = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$userID = $_COOKIE['userID'];

			$availSQL = "SELECT s.StartDate, s.EndDate, c.Size, c.Species, c.AvailabilityID
						FROM SitterAvailability s, CanTakeCareOf c
						WHERE s.SitterID = '$userID'
						AND s.AvailabilityID = c.AvailabilityID
						AND NOT EXISTS (SELECT * FROM ContractToSitter cs WHERE Status=1 and cs.AvailabilityID = s.AvailabilityID and c.SitterID = s.SitterID);";

			$availExists = FALSE;

			// Display each availability
			foreach($dbc->query($availSQL) as $arow) {

				if(!$availExists) {
					echo '<table class="table table-striped"><tr>';
					echo 	"<th>Start Date</th>";
					echo 	"<th>End Date</th>";
					echo 	"<th>Size</th>";
					echo 	"<th>Species</th>";
					echo 	"<th>Remove</th>";
					echo 	"<th>Edit</th></tr>";
					$availExists = TRUE;
				}

				$availExists = TRUE;
				echo "<tr>";
				echo 	"<td>" . $arow['StartDate'] . "</td>";
				echo 	"<td>" . $arow['EndDate'] . "</td>";
				echo 	"<td>" . $arow['Size'] . "</td>";
				echo 	"<td>" . $arow['Species'] . "</td>";
				echo 	"<td>";
				echo 		"<form action='./removeAvailability.php' method='post'>";
				echo 			"<input type='image' name='AvailID' alt='Remove availability'";
				echo 			"src='./remove.png' width='18px' type='submit' value='";
				echo 			$arow['AvailabilityID'] . "'/>";
				echo 		"</form>";
				echo 	"</td>";
				echo 	"<td>";
				echo 		"<a href='./user/editAvailability.php?From=myaccount";
				echo 		"&AvailabilityID=" . $arow['AvailabilityID'] . "'>";
				echo 			"<img src='./edit.png' width='18px'>";
				echo 		"</a>";
				echo 	"</td>";
				echo "</tr>";
			}

			if($availExists) 
				echo "</table>";
			else
				echo "<p class='noItemsInList'>You have no availabilities.</p>";


		}
		catch(Exception $e) {
			echo "Could not connect to the database to display availability info";
			exit;
		}
		if($availExists)	echo "</table>";
	}

	function displayAccommodationRequestInfo() {
		
		try {
			$dbc = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$userID = $_COOKIE['userID'];

			$accomSQL = "SELECT p.PetName, r.StartDate, r.EndDate, r.RequestID, p.PetID
						FROM OwnsPet p INNER JOIN AccommodationRequest r
						ON p.OwnerID = r.OwnerID
						WHERE p.PetID = r.PetID
						AND p.OwnerID = '$userID'
						AND NOT EXISTS (SELECT * FROM ContractToOwner c WHERE Status=1 and c.RequestID = r.RequestID and c.PetID = r.PetID);";

			$requestExists = FALSE;
			// Display each availability
			echo '<table class="table table-striped">';
			foreach($dbc->query($accomSQL) as $row) {
				if(!$requestExists) {
					echo '<table class="table table-striped">';
					echo "<tr><th>Request</th><th>Remove</th><th>Edit</th></tr>";
					$requestExists = TRUE;
				}
				
				echo "<tr>";
				echo	"<td>" . $row['PetName'] . " needs a home from ";
				echo 	$row['StartDate'] . " to " . $row['EndDate'];
				echo 	".</td>";
				echo 	"<td>";
				echo 		"<form action='./removeAccomRequest.php' method='post'>";
				echo 			"<input type='image' name='reqID' alt='Remove availability'";
				echo 			" src='./remove.png' width='18px' type='submit' value='" . $row['RequestID'] . "'/>";
				echo 		"</form>";
				echo 	"</td>";
				echo 	"<td>";
				echo 		"<a href='./user/editAccommodationRequest.php?From=myaccount&RequestID=" . $row['RequestID'];
				echo 		"&PetID=" . $row['PetID'];
				echo 		"' type='image' src='./edit.png' width='18px'>";
				echo 			"<input type='image' name='RequestID' alt='Edit Request'";
				echo 			" src='./edit.png' width='18px' type='submit' value='";
				echo 			$arow['RequestID'] . "'/>";
				echo 		"</a>";
				echo 	"</td>";
				echo "</tr>";
			}
		
			if($requestExists)
				echo "</table>";
			else
				echo "<p class='noItemsInList'>You have no accommodation requests.</p>";
		}
		catch(Exception $e) {
			echo "Could not connect to the database to display availability info";
			exit;
		}
	}

?>

<head>
	<link rel="stylesheet" href="bootstrap.min.css">
	<title>PetCare</title>
	<style type='text/css'>
	.noItemsInList {
		font-size: 20;
		color: #999999;
		font-color: #999999;
	}
	</style>
</head>
<?php if(!isset($_COOKIE['userID'])){header('Location: ./index.php');} ;?>

<body>
	<?php include './include/header.php'; ?>

	<div style="padding: 80px 0 40px 0; background-color:23974a; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">
  				<?php
  					echo $_COOKIE['userID'];
  					echo "'s account";
  				?>

  			</h1>
  		</div>
	</div>
	<?php if(isset($_COOKIE['userID'])): ?>
		<div class="container" style="margin-top:40px;">
			<?php displayAccountInfo(); ?>					
			<a href="editPersonalInfo.php" class="btn btn-warning" role="button" style="margin-bottom: 20px">Edit</a>
		</div>
		<!-- Pets -->
		<div class="container">
			<h2>My Pets</h2>
			<?php displayPetInfo(); ?>
			<a href="newpet.php" class="btn btn-warning" role="button" style="margin-bottom: 20px">Add Pet</a>
		</div>
		<!-- Accommodation requests -->
		<div style="overflow:hidden" class="container">
			<h2>My Accommodation Requests</h2>
			<?php displayAccommodationRequestInfo() ?>
			<a href="user/accomodationRequest.php?From=myaccount" class="btn btn-warning" role="button" style="margin-bottom: 20px">Add Accommodation Request</a>
		</div>
		<!-- Availabilities -->
		<div style="overflow:hidden" class="container">
			<h2>My Availabilities</h2>
			<?php displayAvailInfo();?>
			<a href="user/sitterAddAvailability.php?From=myaccount" class="btn btn-warning" role="button" style="margin-bottom: 20px">Add Availability</a>
		</div>
		<!-- Contracts -->
		<div style="overflow:hidden" class="container">
			<a href="user/myContracts.php" class="btn btn-primary" role="button" style="margin-bottom: 20px">View Contracts</a>
		</div>
		<br><br>
	<?php else : ?>
		<div class="container">
			<p>Please login to view your account.</p>
		</div>
	<?php endif; ?>
			
		
	</div>
			
</body>

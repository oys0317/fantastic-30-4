<?php 	
	
	function getAccommodationRequest() {
		try{
			$db = new PDO("mysql:host=localhost;dbname=fantastic304;port=3306","root");
			$sql = 'SELECT Name, PetName, Species, Size, Address, WithinDistance, StartDate, EndDate, a.RequestID as RequestID, a.PetID as PetID, a.OwnerID as OwnerID
					FROM AccommodationRequest a, OwnsPet op, PetOwner po, User u 
					WHERE a.OwnerID = op.OwnerID and op.OwnerID = po.OwnerID and po.OwnerID = u.UserID and a.PetID = op.PetID and NOT EXISTS (SELECT * FROM ContractToOwner c WHERE Status=1 and c.RequestID = a.RequestID and c.PetID = a.PetID)';

			// If there are no sitters, display a different message.

			if($db->query($sql) == FALSE) {
				echo "<p align='center' style='font-size:20'>There are no pets that need sitters right now.<br>Does your pet need a sitter?  Click the button below!</p>";
				return;
			}

			echo '<table class="table table-striped">';

			echo '<th>name</th>';

			echo '<th>';
			echo "Pet Name";
			echo '</th>';

			echo '<th>';
			echo "species";
			echo '</th>';

			echo '<th>';
			echo "Size";
			echo '</th>';

			echo '<th>';
			echo "Address";
			echo '</th>';

			echo '<th>';
			echo "Within Distance";
			echo '</th>';

			echo '<th>';
			echo "Start date";
			echo '</th>';

			echo '<th>';
			echo "End date";
			echo '</th>';

			if (isset($_COOKIE['userID'])) {
				echo '<th>';
				echo "&nbsp;";
				echo '</th>';
			}

			foreach($db->query($sql) as $row){
				echo '<tr>';

				echo '<td>';
				echo $row['Name'];
				echo '</td>';

				echo '<td>';
				echo $row['PetName'];
				echo '</td>';

				echo '<td>';
				echo $row['Species'];
				echo '</td>';

				echo '<td>';
				echo $row['Size'];
				echo '</td>';

				echo '<td>';
				echo $row['Address'];
				echo '</td>';

				echo '<td>';
				echo $row['WithinDistance'];
				echo ' km</td>';

				echo '<td>';
				echo $row['StartDate'];
				echo '</td>';

				echo '<td>';
				echo $row['EndDate'];
				echo '</td>';
				
				if (isset($_COOKIE['userID'])) {
					echo '<td>';
					if ($row['OwnerID']==$_COOKIE['userID']) {
						echo '<a href="editAccommodationRequest.php?RequestID='.$row['RequestID'].'&PetID='.$row['PetID'].'" role="button">';
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='../edit.png' width='18px'></a>";
					}
					else {
						echo '<a href="contractToOwner.php?RequestID='.$row['RequestID'].'&PetID='.$row['PetID'].'" class="btn btn-warning btn-sm" role="button">Sit this pet!</a>';
					}

					echo '</td>';
					echo '</tr>';
				}
			}
			echo '</table>';
		} catch(Exception $e){
		echo "Could not connect to the database";
		exit;
		}
	}
?>
<head>
	<link rel="stylesheet" href="../bootstrap.min.css">
	<title>Pet Owners</title>
</head>
<body>
	<?php include '../include/header.php' ?>
	<div style="padding: 80px 0; background-color:337ab7; !important" class="jumbotron">
  		<div class="container">
  			<h1 style="color:white">Pet Owners</h1>
  			<p style="color:white">Where you can view all the pets who need sitters! </br>
  									See a pet on the list you want to look after? &nbsp; 
  									Want to list your own pet?<br>Then you've come to the right place!</p>
  		</div>
	</div>
	<div class="container">
		<?php getAccommodationRequest(); ?>
		<?php if(isset($_COOKIE['userID'])): ?>
			<a href="accomodationRequest.php" class="btn btn-primary" role="button">Add Accomodation Request</a>
		<?php endif; ?>
	</div>
</body>
